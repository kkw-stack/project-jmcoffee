<?php
/**
 * Modules 문의하기 서비스
 */

defined( 'ABSPATH' ) || die( http_response_code( 404 ) );

final class JT_Inquiry_Service {
	private $wpdb;
	private $table;
	private $rpp = 50;
	private $mail_template = __DIR__ . '/mail/mail-template.php';
	private $delete_privacy_interval = '3 years';

	public static function instance() {
		static $instance;

		if ( ! $instance instanceof self ) {
			global $wpdb;
			$instance = new self( $wpdb );
		}

		return $instance;
	}

	private function __construct( $wpdb ) {
		$this->wpdb = $wpdb;
		$this->table = $this->wpdb->prefix . 'inquiry';

		$this->wpdb->show_errors();
	}

	public function get_rpp() {
		return $this->rpp;
	}

	public function escape_text($text, $is_name = false) {
		// 이름인 경우 따옴표 제거
		if ( $is_name ) {
			$text = str_replace(['"', "'"], '', $text);
		}
	
		// \ 제거한 후 HTML 엔티티 변환
		return htmlspecialchars( stripslashes( $text ), ENT_QUOTES, 'UTF-8' );
	}
	
	public function get_type_options() {
		$option_data = get_field( 'inquiry_type', 'option' );

		if ( is_array( $option_data ) ) {
			return $option_data;
		}

		return [];
	}

	public function get_type_values() {
		return array_map( function ($item) {
			return $item['type'];
		}, $this->get_type_options() );
	}

	public function type_options_string() {
		return implode("','", array_map('esc_sql', $this->get_type_values()));
	}

	public function get_types() {
		return array_column( $this->wpdb->get_results( "SELECT DISTINCT(type) FROM {$this->table}", ARRAY_A ), 'type' );
	}

	public function validate_data( $params ) {
		$errors = [];

		// 이름
		if ( empty( $params['name'] ) ) {
			$errors['message'] = '이름을 입력해주세요.';
		} elseif ( preg_match( '/^\s+$/u', $params['name'] ) ) {
			$errors['message'] = '필수항목을 입력해 주세요.';
		}

		// 연락처
		if ( empty( $params['phone'] ) ) {
			$errors['message'] = '연락처를 입력해주세요.';
		}

		// 이메일
		if ( empty( $params['email'] ) ) {
			$errors['message'] = '이메일을 입력해주세요.';
		} elseif ( ! filter_var( $params['email'], FILTER_VALIDATE_EMAIL ) ) {
			$errors['message'] = '유효한 이메일을 입력해주세요.';
		}

		// 문의내용
		if ( empty( $params['content'] ) ) {
			$errors['message'] = '문의내용을 입력해주세요.';
		} elseif ( preg_match( '/^\s+$/u', $params['content'] ) ) {
			$errors['message'] = '필수항목을 입력해 주세요.';
		}

		// 문의유형
		if ( $params['type'] === '' ) {
			$errors['message'] = '문의유형을 선택해주세요.';
		}

		// 약관동의
		if ( empty( $params['agree'] ) ) {
			$errors['message'] = '개인정보 수집 및 이용에 동의해주세요.';
		} else {
			$params['agree'] = 1;
		}

		if ( ! empty( $errors ) ) {
			return new WP_Error( 400, 'Error', $errors );
		}

		return array_filter( $params, fn( $key ) => in_array( $key, [ 'name', 'phone', 'email', 'company', 'content', 'type', 'agree' ] ), ARRAY_FILTER_USE_KEY );
	}

	public function search( $args, $paged = 1 ) {
		$start = max( 0, $paged - 1 ) * $this->rpp;
		$query = "SELECT * FROM {$this->table} WHERE {$this->get_search_where( $args )} AND type IN ('{$this->type_options_string()}') ORDER BY id DESC LIMIT {$start}, {$this->rpp}";

		return $this->wpdb->get_results( $query, ARRAY_A );
	}

	public function count_search( $args ) {
		$query = "SELECT COUNT(*) FROM {$this->table} WHERE {$this->get_search_where( $args )} AND type IN ('{$this->type_options_string()}')";
		return (int) $this->wpdb->get_var( $query );
	}

	public function count_total() {
		return (int) $this->wpdb->get_var( "SELECT COUNT(*) FROM {$this->table} WHERE deleted = 0 AND type IN ('{$this->type_options_string()}')" );
	}

	public function count_trashed() {
		return (int) $this->wpdb->get_var( "SELECT COUNT(*) FROM {$this->table} WHERE deleted = 1 AND type IN ('{$this->type_options_string()}')" );
	}

	public function save( $data ) {
		$data['ip'] ??= $_SERVER['REMOTE_ADDR'];
		$data['created'] ??= date_i18n( 'Y-m-d H:i:s' );
		$data['updated'] ??= date_i18n( 'Y-m-d H:i:s' );
		$data['deleted'] ??= 0;

		if ( ! empty( $data['id'] ) ) {
			$this->wpdb->update( $this->table, array_filter( $data, fn( $key ) => 'id' !== $key, ARRAY_FILTER_USE_KEY ), [ 'id' => $data['id'] ] );
		}

		$this->wpdb->insert( $this->table, $data );

		if ( ! empty( $this->wpdb->last_error ) ) {
			throw new Exception( $this->wpdb->last_error );
		}

		return true;
	}

	public function delete( $status, $id ) {
		if ( 'trash' === $status ) {
			return $this->wpdb->delete( $this->table, [ 'id' => $id ] );
		} else {
			return $this->wpdb->update( $this->table, [ 'deleted' => 1, 'updated' => date_i18n( 'Y-m-d H:i:s' ) ], [ 'id' => $id ] );
		}
	}

	public function delete_multi( $ids ) {
		$this->wpdb->query(
			$this->wpdb->prepare(
				"UPDATE SET deleted = 1, updated = %s FROM {$this->table} WHERE id IN (" . implode( ',', $ids ) . ")",
				date_i18n( 'Y-m-d H:i:s' )
			)
		);
	}

	public function send_mail( $data ) {
		if ( ! file_exists( $this->mail_template ) ) {
			return false;
		}

		$name = $this->escape_text($data['name'], true);
        $company = $this->escape_text($data['company']);
        $content = $this->escape_text($data['content']);

		$options = $this->get_type_options();
		$to = [];

		foreach ( $options as $option ) {
			if ( $option['type'] === $data['type'] && ! empty( $option['send'] ) ) {
				$to = array_merge( $to, array_column( $option['send'], 'email' ) );
			}
		}

		ob_start();
		include $this->mail_template;
		$content = (string) ob_get_clean();
		
		// 고객용
		/*
		wp_mail( $data['email'], '[JMCOFFEE] 문의하기 접수 알림', $content, [ 
			'Content-Type: text/html; charset=UTF-8',
		] );
		*/

		return wp_mail( $to, '[JMCOFFEE] 문의하기 접수 알림', $content, [ 
			'Content-Type: text/html; charset=UTF-8',
		] );
	}

	public function delete_privacy_cron_job() {
		$target_date = date( 'Y-m-d', strtotime( date_i18n( 'Y-m-d' ) . ' -3 years' ) );

		$this->wpdb->query( $this->wpdb->prepare( "DELETE FROM {$this->table} WHERE deleted = 1 AND created <= %s", $target_date . ' 23:59:59' ) );
	}

	private function get_search_where( $args ) {
		$arr_where = [];

		if ( 'trash' === ( $args['status'] ?? '' ) ) {
			$arr_where[] = ' deleted = 1 ';
		} else {
			$arr_where[] = ' deleted = 0 ';
		}

		if ( ! empty( $args['type'] ) ) {
			$arr_where[] = $this->wpdb->prepare( ' type = %s ', $args['type'] );
		}

		if ( ! empty( $args['search'] ) ) {
			$arr_where[] = $this->wpdb->prepare(
				'(
                    name LIKE %s
                    OR phone LIKE %s
                    OR email LIKE %s
                    OR company LIKE %s
                    OR content LIKE %s
					OR type LIKE %s
                )',
				array_fill( 0, 6, '%' . str_replace( ' ', '%', $args['search'] ) . '%' )
			);
		}

		return empty( $arr_where ) ? '1=1' : implode( ' AND ', $arr_where );
	}
}

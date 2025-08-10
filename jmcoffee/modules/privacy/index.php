<?php
/**
 * Name       : PRIVACY
 * namespace  : privacy
 * File       : /modules/privacy/index.php
 * Author     : STUDIO-JT (Nico)
 * Guideline  : JTstyle.2.0 (beta : add wp comment code standard)
 * Guideline  : https://codex.studio-jt.co.kr/dev/?p=2109
 *              https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/
 *
 * SUMMARY:
 * 01) PRIVACY 프로그램 실행.
 * 02) Extend Jt_Module Class.
 */

defined('ABSPATH') || die(http_response_code(404));



/**
 * PRIVACY 프로그램 실행
 */
$jt_privacy = new JT_Privacy();



/**
 * JT_Privacy Class
 *
 * Extend Jt_Module class, note that folder location is important
 * Available template : last.php, list.php, single.php
 *
 * @see Jt_Module
 */
class JT_Privacy extends Jt_Module
{

    public function __construct()
    {

        parent::__construct(
            array(
                'namespace' => 'privacy',
                'name' => '개인정보 처리방침',
                'menu' => '개인정보 처리방침',
                'slug' => 'privacy',
                'support' => array('title', 'revisions', 'editor'),
                'support_cat' => false,
                'is_statuscolumns' => true,
                'pageid' => 3,
            )
        );

        add_filter('manage_' . $this->_namespace . '_posts_columns', array($this, 'admin_column_form'));
        add_action('manage_' . $this->_namespace . '_posts_custom_column', array($this, 'admin_column_form_value'), 10, 2);
        add_action('wp_ajax_jt_privacy_action', array($this, 'ajax_action'));
        add_action('wp_ajax_nopriv_jt_privacy_action', array($this, 'ajax_action'));
    }



    public function ajax_action()
    {
        $post = get_post($_POST['post_id']);

        try {
            if (!$post) {
                wp_send_json_error('Post not found');
                exit;
            }

            $content = apply_filters('the_content', $post->post_content);

            wp_send_json_success($content);
        } catch (Exception $e) {
            wp_send_json_error($e->getMessage());
            exit;
        }
    }



    public function recent_posts()
    {
        $posts = get_posts(
            array(
                'post_type' => $this->_namespace,
                'post_status' => 'publish',
                'order' => 'DESC',
                'fields' => 'ids'
            )
        );

        if (empty($posts)) {
            return '';
        }

        return get_post($posts[0])->post_content;
    }

    public function recent_posts_count()
    {
        $posts = get_posts(
            array(
                'post_type' => $this->_namespace,
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'fields' => 'ids'
            )
        );

        if (empty($posts)) {
            return 0;
        }

        return count($posts);
    }

    public function admin_column_form($columns)
    {
        $new_columns = array();

        foreach ($columns as $key => $val) {
            $new_columns[$key] = $val;
            if ('title' === $key) {
                $new_columns['status'] = '노출';
            }
        }

        return $new_columns;
    }



    public function admin_column_form_value($column, $post_id)
    {
        if ('status' === $column) {
            if ('publish' === get_post_status($post_id)) {
                echo "공개";
            } else {
                echo "비공개";
            }
        }
    }
}

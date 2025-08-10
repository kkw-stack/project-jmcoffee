<?php
/**
 * Modules Faqs
 */

defined('ABSPATH') || die(http_response_code(404));

/*
 * Name       : FAQs
 * namespace  : faqs
 * File       : /modules/faqs/index.php
 * Author     : STUDIO-JT (Nico)
 * Guideline  : JTstyle.2.0 (beta : add wp comment code standard)
 * Guideline  : https://codex.studio-jt.co.kr/dev/?p=2109
 *              https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/
 *
 * SUMMARY:
 * 01) FAQs 프로그램 실행.
 * 02) Extend Jt_Module Class.
 *
 */



/**
 * FAQs 프로그램 실행
 */
$jt_faqs = new JT_Faqs();



/**
 * JT_Faqs Class
 *
 * Extend Jt_Module class, note that folder location is important
 * Available template : last.php, list.php, single.php
 *
 * @see Jt_Module
 */
class JT_Faqs extends Jt_Module
{

	public function __construct()
	{

		parent::__construct(
			array(
				'namespace' => 'faqs',
				'name' => 'FAQs',
				'menu' => 'FAQs',
				'slug' => 'faqs',
				'support' => array('title'),
				'support_cat' => true,
				'use_single' => false,
				'is_sticky' => false,
				'pageid' => 35,
			)
		);
	}

	/**
     * Add Category Selector For Admin List View Filter
     *
     * @author STUDIO-JT ( 201 )
     * @since 1.0.0
     * @access public
     *
     * @param array $columns
     */
    public function admin_filter_category_selector() {

        $post_type  = esc_attr( isset( $_REQUEST[ 'post_type' ] ) ? $_REQUEST[ 'post_type' ] : 'post' );
        $namespace  = $this->_namespace;

        if ( $post_type == $namespace ) {
            $jt_cat = urldecode( isset( $_REQUEST[ $namespace . '_categories' ] ) ? esc_attr($_REQUEST[ $namespace . '_categories' ]) : '' );
            $terms  = get_terms( array( 'taxonomy' => $namespace . '_categories', 'hide_empty' => false ) );

            echo '<select name="' . $namespace . '_categories">';
                echo '<option value="">모든 카테고리</option>';

                foreach ( $terms as $term ) {

                    echo '<option value="' . $term->slug . '" ' . selected($jt_cat, $term->slug, false) . '>' . $term->name . '</option>';

                }
				
            echo '</select>';
        }
    }
}

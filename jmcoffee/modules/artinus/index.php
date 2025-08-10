<?php
/**
 * Name       : ARTINUS
 * namespace  : artinus
 * File       : /modules/artinus/index.php
 * Author     : STUDIO-JT (Nico)
 * Guideline  : JTstyle.2.0 (beta : add wp comment code standard)
 * Guideline  : https://codex.studio-jt.co.kr/dev/?p=2109
 *              https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/
 *
 * SUMMARY:
 * 01) ARTINUS 프로그램 실행.
 * 02) Extend Jt_Module Class.
 */


defined('ABSPATH') || die(http_response_code(404));



/**
 * ARTINUS 프로그램 실행
 */
$jt_artinus = new JT_Artinus();



/**
 * JT_Artinus Class
 *
 * Extend Jt_Module class, note that folder location is important
 * Available template : last.php, list.php, single.php
 *
 * @see Jt_Module
 */
class JT_Artinus extends Jt_Module
{

	public function __construct()
	{

		parent::__construct(
			array(
				'namespace' => 'artinus',
				'name' => 'ARTINUS',
				'menu' => 'ARTINUS',
				'slug' => 'artinus',
				'support' => array('title'),
				'is_sticky' => false,
				'pageid' => 27,
			)
		);

		add_filter('post_row_actions', function($actions) {
			$keep_actions = ['edit', 'inline hide-if-no-js', 'trash', 'view'];
			
			return array_intersect_key($actions, array_flip($keep_actions));
		}, 10, 2);
	}
}

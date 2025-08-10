<?php
/**
 * Custom Image size
 */

defined( 'ABSPATH' ) || die( http_response_code( 404 ) );

function jt_custom_image_sizes() {

	// JT_Module
	add_image_size( 'jt_thumbnail_380x200', 380, 200, array( 'center', 'top' ) ); // Grid

	// Common
	add_image_size( 'jt_thumbnail_875x492', 875, 492, false ); // Artinus Visual, Coffee Beans Image
	//add_image_size( 'jt_thumbnail_892x692', 892, 692, false ); // Thumbnail Big, Coffee Beans Thumbnail Big
	add_image_size( 'jt_thumbnail_1200x931', 1200, 931, false ); // Thumbnail Big, Coffee Beans Thumbnail Big
	add_image_size( 'jt_thumbnail_320x240', 320, 240, false ); // Thumbnail Small, Coffee Beans Thumbnail Small
	add_image_size( 'jt_thumbnail_1903x953', 1903, 953, false ); // Visual Pc, Consulting

	// Coffee Beans
	add_image_size( 'jt_thumbnail_2342x1908', 2342, 1908, false ); // image

	// About us
	add_image_size( 'jt_thumbnail_780x1000', 780, 1000, false ); // Visual Mobile

	// News
	add_image_size( 'news-list-thumb', 280, 193, false ); // News
	add_image_size( 'jt_thumbnail_433x433', 433, 433, false ); // Thumbnail

	// Business
	add_image_size( 'jt_thumbnail_398x300', 398, 300, false ); // Trade
	add_image_size( 'jt_thumbnail_1903x954', 1903, 954, false ); // Brand, Trade, Consulting
	add_image_size( 'jt_thumbnail_780x1000', 780, 1000, false ); // Trade, Consulting, Brand
	add_image_size( 'jt_thumbnail_449x350', 449, 350, false ); // Manufacturing
}
add_action( 'after_setup_theme', 'jt_custom_image_sizes' );

<?php
/**
 * Custom Shortcodes
 */

 defined( 'ABSPATH' ) || die( http_response_code( 404 ) );



/**
 ************************************** *
 * EMAIL SPACE
 * USAGE : [email]support@studio-jt.co.kr[/email]
 * ************************************** */
function jt_shortcode_email( $atts, $content = null ) {
	if ( ! is_email( $content ) ) {
		return;
	}
	return '<a href="mailto:' . esc_attr( antispambot( $content ) ) . '">' . esc_html( antispambot( $content ) ) . '</a>';
}
add_shortcode( 'email', 'jt_shortcode_email' );



/**
 ************************************** *
 * SHORTCODE ABOUT US LIST HIGHlIGHT
 * USAGE : [hl]content[/hl]
 * ************************************** */
function jt_shortcode_abus_hl( $atts, $content = null ) {

    $content = do_shortcode($content);

    $lines = array_filter( array_map( 'trim', explode( "\n", $content ) ) );

    $formatted_content = '';
    foreach ( $lines as $line ) {
        if ( $line ) {
            $formatted_content .= '<li><span class="jt-typo--05">' . $line . '</span></li>';
        }
    }

    return $formatted_content;
}
add_shortcode( 'hl', 'jt_shortcode_abus_hl' );



/**
 ************************************** *
 * SHORTCODE ABOUT US LIST DESC
 * USAGE : [ds]content[/ds]
 * ************************************** */
function jt_shortcode_abus_desc( $atts, $content = null ) {

	$lines = array_filter( array_map( 'trim', explode( "\n", str_replace( array( '<br>', '<br />' ), '', $content ) ) ) );

	$formatted_content = '';
	foreach ( $lines as $line ) {
		if ( $line ) {
			$formatted_content .= '<li><span class="jt-typo--07">' . esc_html( $line ) . '</span></li>';
		}
	}

	return $formatted_content;
}
add_shortcode( 'ds', 'jt_shortcode_abus_desc' );



/**
 ************************************** *
 * SHORTCODE ARTINUS CORE TECHNOLOGY
 * USAGE : [ch]content[/ch]
 * ************************************** */
function jt_shortcode_artinus_char( $atts, $content = null ) {

	$lines = array_filter( array_map( 'trim', explode( "\n", str_replace( array( '<br>', '<br />' ), '', $content ) ) ) );

	$formatted_content = '';
	foreach ( $lines as $line ) {
		if ( $line ) {
			$formatted_content .= '<li><span class="jt-typo--06">' . esc_html( $line ) . '</span></li>';
		}
	}

	return $formatted_content;
}
add_shortcode( 'ch', 'jt_shortcode_artinus_char' );



/**
 ************************************** *
 * SHORTCODE BR
 * USAGE : [br]
 * ************************************** */
function jt_shortcode_br(){

	return '<br />';

}
add_shortcode('br','jt_shortcode_br');
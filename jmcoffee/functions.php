<?php

/* ************************************** *
 * Block Robots
 * ************************************** */
function jt_block_robots_for_dev($value, $option)
{
    $home_url = home_url();

    return (strpos($home_url, '.studio-jt.co.kr') !== false ? '0' : $value);
}
add_filter('option_blog_public', 'jt_block_robots_for_dev', 9999, 2);
add_filter('pre_option_blog_public', 'jt_block_robots_for_dev', 9999, 2);



/* ************************************** *
 * functions
 * ************************************** */
// VERSION
require_once locate_template('/version.php');

// CLEAN UP
require_once locate_template('/functions/admin.php'); // Custom admin (clean up the admin)
require_once locate_template('/functions/front.php'); // Custom front (clean up the head)

// SECURITY
require_once locate_template('/functions/security.php');

// FUNCTIONS
require_once locate_template('/functions/image-sizes.php'); // CUSTOM IMAGE SIZES
require_once locate_template('/functions/JT_Session.class.php'); // SESSION
require_once locate_template('/functions/helpers.php'); // HELPERS
require_once locate_template('/functions/redirect.php'); // REDIRECT
require_once locate_template('/functions/languages.php'); // 다국어 함수
require_once locate_template('/functions/sns.php'); // SNS SHARE
require_once locate_template('/functions/shortcodes.php'); // SHORTCODES
require_once locate_template('/functions/blocks.php'); // BLOCKS CUSTOM

// MODULES
require_once locate_template('/modules/JT_Module.class.php');
require_once locate_template('/modules/inquiry/index.php'); // 문의
require_once locate_template('/modules/artinus/index.php'); // ARTINUS
require_once locate_template('/modules/coffee_beans/index.php'); // COFFEE BEANS
require_once locate_template('/modules/privacy/index.php'); // 개인정보 처리방침

if (is_main_site()) {
    require_once locate_template('/modules/news/index.php'); // 뉴스
    require_once locate_template('/modules/faqs/index.php'); // FAQs
}

/* ************************************** *
 * ENQUEUE STYLE & SCRIPT
 * ************************************** */
function jt_enqueue_script_before()
{

    // First load browser selector before style (avoid fouc)
    echo '<script src="' . get_template_directory_uri() . '/js/vendors/browser/browser-selector.js"></script>';

}
add_action('wp_head', 'jt_enqueue_script_before', 1);



function jt_enqueue_style_script()
{
    
    $version = '1.0.3';

    // STYLE
    wp_enqueue_style('style', get_stylesheet_uri(), array(), $version); // style.css (wp 필수)
    wp_enqueue_style('font', get_template_directory_uri() . '/css/font.css', array(), $version);
    wp_enqueue_style('choices', get_template_directory_uri() . '/css/vendors/select/choices.min.css', array(), '10.2.0');
    wp_enqueue_style('swiper', get_template_directory_uri() . '/css/vendors/slider/swiper/swiper-bundle.min.css', array(), '8.4.2');
    wp_enqueue_style('variables', get_template_directory_uri() . '/css/var.css', array(), $version);
    wp_enqueue_style('reset', get_template_directory_uri() . '/css/reset.css', array(), $version);
    wp_enqueue_style('layout', get_template_directory_uri() . '/css/layout.css', array(), $version);
    wp_enqueue_style('jt-strap', get_template_directory_uri() . '/css/jt-strap.css', array(), $version);
    wp_enqueue_style('blocks', get_template_directory_uri() . '/css/blocks.css', array(), $version);
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), $version);
    wp_enqueue_style('sub-hee', get_template_directory_uri() . '/css/sub-hee.css', array(), $version);
    wp_enqueue_style('sub-hree', get_template_directory_uri() . '/css/sub-hree.css', array(), $version);
    wp_enqueue_style('rwd-layout', get_template_directory_uri() . '/css/rwd-layout.css', array(), $version);
    wp_enqueue_style('rwd-strap', get_template_directory_uri() . '/css/rwd-strap.css', array(), $version);
    wp_enqueue_style('rwd-blocks', get_template_directory_uri() . '/css/rwd-blocks.css', array(), $version);
    wp_enqueue_style('rwd-main', get_template_directory_uri() . '/css/rwd-main.css', array(), $version);
    wp_enqueue_style('rwd-hee', get_template_directory_uri() . '/css/rwd-hee.css', array(), $version);
    wp_enqueue_style('rwd-hree', get_template_directory_uri() . '/css/rwd-hree.css', array(), $version);

    // Languages
    if( jt_get_lang() == 'en' ) {
        wp_enqueue_style( 'lang-en', get_template_directory_uri() . '/css/lang-en.css', array(), $version);
    }

    // SCRIPT
    //wp_deregister_script('jquery');
    wp_enqueue_script('gsap', get_template_directory_uri() . '/js/vendors/greensock/gsap.min.js', array(), '3.10.3', true);
    wp_enqueue_script('scrolltoplugin', get_template_directory_uri() . '/js/vendors/greensock/ScrollToPlugin.min.js', array(), '3.10.3', true);
    wp_enqueue_script('scrolltrigger', get_template_directory_uri() . '/js/vendors/greensock/ScrollTrigger.min.js', array(), '3.10.3', true);
    wp_enqueue_script('SplitText', get_template_directory_uri() . '/js/vendors/greensock/SplitText.min.js', array(), '3.10.3', true);
    wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/js/vendors/utilities/imagesloaded.pkgd.min.js', array(), '3.1.8', true);
    wp_enqueue_script('jtlazyload', get_template_directory_uri() . '/js/vendors/jt/jt-unveil.js', array(), '1.0.0', true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/js/vendors/slider/swiper/swiper-bundle.min.js', array(), '8.4.2', true);
    wp_enqueue_script('choices', get_template_directory_uri() . '/js/vendors/select/choices.min.js', array(), '10.2.0', true);
    wp_enqueue_script('jt-autocomplete', get_template_directory_uri() . '/js/vendors/jt/jt-autocomplete.min.js', array(), '1.0.0', true);
    wp_enqueue_script('parallax', get_template_directory_uri() . '/js/vendors/parallax/parallax.min.js', array(), '3.1.0', true);
    wp_enqueue_script('jt', get_template_directory_uri() . '/js/jt.js', array(), '1.0.0', true);
    wp_enqueue_script('jt-strap', get_template_directory_uri() . '/js/jt-strap.js', array(), $version, true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), $version, true);
    wp_enqueue_script('script-hee', get_template_directory_uri() . '/js/script-hee.js', array(), $version, true);
    wp_enqueue_script('script-hree', get_template_directory_uri() . '/js/script-hree.js', array(), $version, true);
    wp_enqueue_script('motion', get_template_directory_uri() . '/js/motion.js', array(), $version, true);

}
add_action('wp_enqueue_scripts', 'jt_enqueue_style_script');



/* ************************************** *
 * REMOVE JS TYPE ATTR (w3c validation)
 * ************************************** */
function jt_remove_type_attr($tag, $handle)
{

    return preg_replace("/type=['\"]text\/(javascript)['\"]/", '', $tag);

}
add_filter('script_loader_tag', 'jt_remove_type_attr', 10, 2);



/* ************************************** *
 * REGISTER MENU
 * ************************************** */
function jt_register_menus()
{

    register_nav_menus(
        array(
            'main-menu' => __('메인메뉴')
        )
    );

}
add_action('init', 'jt_register_menus');



/* ************************************** *
 * 옵션페이지 설정 변경시 자동으로 캐쉬 지우기
 * ************************************** */
function jt_clear_cache_on_option_page_updated()
{

    global $file_prefix;

    if (function_exists('wp_cache_clean_cache') && $file_prefix) {

        $screen = get_current_screen();

        if (strpos($screen->id, 'toplevel_page_') !== false && isset($_POST['_acf_changed']) && $_POST['_acf_changed']) {

            wp_cache_clean_cache($file_prefix, true);

        }

    }

}
add_action('acf/save_post', 'jt_clear_cache_on_option_page_updated', 20);



/* ************************************** *
 * full 이미지와 동일한 image size 호출할시 원본을 리턴 :: 2021-09-08 [201]
 * ************************************** */
function jt_wp_get_attachment_image_src($image, $attachment_id)
{
    list($img_url, $img_width, $img_height, $img_intermediate) = $image;
    $meta = wp_get_attachment_metadata($attachment_id);

    if (!empty($meta['width']) && !empty($meta['height']) && $img_width == $meta['width'] && $img_height == $meta['height']) {
        return array(
            wp_get_attachment_url($attachment_id),
            $meta['width'],
            $meta['height'],
            $img_intermediate
        );
    }

    return $image;
}
add_filter('wp_get_attachment_image_src', 'jt_wp_get_attachment_image_src', 10, 2);



/* ************************************** *
 * Add module type attribute
 * ************************************** */
function jt_add_type_attr_module($tag, $handle, $src)
{

    if ('motion' === $handle) {
        $tag = '<script type="module" src="' . esc_url($src) . '" id="' . $handle . '-js"></script>';
    }

    return $tag;

}
add_filter('script_loader_tag', 'jt_add_type_attr_module', 10, 3);



/**
 * 이전 예약글 모두 발행 처리
 */
function jt_publish_past_future_posts()
{
    global $wpdb;

    $args = array(
        'post_type' => get_post_types(),
        'post_status' => 'future',
        'fields' => 'ids',
        'date_query' => array(
            array(
                'column' => 'post_date',
                'before' => date_i18n('Y-m-d H:i:s'),
            ),
        ),

    );
    $post_ids = get_posts($args);

    if (!empty($post_ids)) {
        foreach ($post_ids as $post_id) {
            wp_publish_post($post_id);
        }
    }
}
add_action('init', 'jt_publish_past_future_posts');



/**
 * 문의 3년 보관 후 삭제
 */
function run_inquiry_cron() {
    if (false === get_transient('inquiry_cron_daily_run')) {
        wp_remote_get(home_url('/inquiry-cron.php'));

        set_transient('inquiry_cron_daily_run', true, strtotime('tomorrow') - time());
    }
}
add_action('init', 'run_inquiry_cron');
<?php
/**
 * Modules 문의하기
 */

defined('ABSPATH') || die(http_response_code(404));

load_template(__DIR__ . '/class-jt-inquiry-service.php');

add_action(
    'admin_menu',
    function () {
        add_menu_page(
            '문의하기',
            '문의하기',
            'edit_posts',
            'jt-inquiry'
        );

        add_submenu_page(
            'jt-inquiry',
            '문의하기 내역',
            '문의하기 내역',
            'edit_posts',
            'jt-inquiry',
            function () {
                include __DIR__ . '/list.php';
            }
        );
    }
);

add_action('wp_ajax_jm_inquiry_delete', function () {
    $service = JT_Inquiry_Service::instance();

    if ($service->delete($_POST['status'], $_POST['id'])) {
        wp_send_json_success();
    } else {
        wp_send_json_error();
    }

    exit;
});

function ajax_jm_inquiry_action()
{
    $service = JT_Inquiry_Service::instance();

    $data = $service->validate_data($_POST);

    if (is_wp_error($data)) {
        wp_send_json_error($data->get_error_data());
        exit;
    }

    $result = $service->save($data);

    if ($result) {
        $service->send_mail($data);

        wp_send_json_success($data);
        exit;
    }

    wp_send_json_error($result);
    exit;
}
add_action('wp_ajax_jm_inquiry', 'ajax_jm_inquiry_action');
add_action('wp_ajax_nopriv_jm_inquiry', 'ajax_jm_inquiry_action');

<?php
/**
 * Decision Engine
 *
 * Module: K86 Pro
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Kiểm tra Decision Engine đã sẵn sàng.
 *
 * @return bool
 */
function k86_decision_engine_ready() {
    return true;
}
/**
 * Lấy cài đặt Decision Engine.
 *
 * @return array
 */
function k86_get_decision_settings() {

    $settings = k86_get_settings();

    return wp_parse_args(
        $settings,
        array(
            'show_decision_box' => 1,
        )
    );
}

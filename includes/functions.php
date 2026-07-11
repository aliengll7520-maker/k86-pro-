<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Lấy tên bảng sản phẩm
 */
function k86_get_table() {

    global $wpdb;

    return $wpdb->prefix . 'k86_products';

}

/**
 * Lấy một sản phẩm theo ID
 */
function k86_get_product( $id ) {

    global $wpdb;

    return $wpdb->get_row(

        $wpdb->prepare(

            "SELECT * FROM " . k86_get_table() . " WHERE id=%d",

            absint( $id )

        )

    );

}

/**
 * Lấy toàn bộ sản phẩm
 */
function k86_get_products() {

    global $wpdb;

    return $wpdb->get_results(

        "SELECT * FROM " . k86_get_table() . " ORDER BY id DESC"

    );

}

/**
 * Kiểm tra quyền quản trị
 */
function k86_is_admin() {

    return current_user_can( 'manage_options' );

}

/**
 * Làm sạch dữ liệu nhập
 */
function k86_clean( $value ) {

    return sanitize_text_field( $value );

}

/**
 * Làm sạch URL
 */
function k86_clean_url( $url ) {

    return esc_url_raw( $url );

}

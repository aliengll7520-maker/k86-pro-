<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'k86_edit_product_page');

function k86_edit_product_page() {

    add_submenu_page(
        null,
        'Sửa sản phẩm',
        'Sửa sản phẩm',
        'manage_options',
        'k86-edit-product',
        'k86_edit_product_form'
    );
}

function k86_edit_product_form() {
?>

<div class="wrap">
    <h1>Sửa sản phẩm</h1>

    <p>Chức năng chỉnh sửa sản phẩm đang được phát triển.</p>
</div>

<?php
}

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

    if (!current_user_can('manage_options')) {
        wp_die('Bạn không có quyền.');
    }

    global $wpdb;

    $table = $wpdb->prefix . 'k86_products';

    $id = isset($_GET['id']) ? absint($_GET['id']) : 0;

    if (!$id) {
        echo '<div class="notice notice-error"><p>ID sản phẩm không hợp lệ.</p></div>';
        return;
    }

    $product = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM {$table} WHERE id = %d",
            $id
        )
    );

    if (!$product) {
        echo '<div class="notice notice-error"><p>Không tìm thấy sản phẩm.</p></div>';
        return;
    }

?>

<div class="wrap">

    <h1>Sửa sản phẩm</h1>

    <table class="form-table">

        <tr>
            <th>ID</th>
            <td><?php echo esc_html($product->id); ?></td>
        </tr>

        <tr>
            <th>Tên sản phẩm</th>
            <td><?php echo esc_html($product->name); ?></td>
        </tr>

        <tr>
            <th>Giá</th>
            <td><?php echo esc_html($product->price); ?></td>
        </tr>

        <tr>
            <th>Link Shopee</th>
            <td><?php echo esc_html($product->shopee); ?></td>
        </tr>

        <tr>
            <th>Link TikTok</th>
            <td><?php echo esc_html($product->tiktok); ?></td>
        </tr>

        <tr>
            <th>Link Lazada</th>
            <td><?php echo esc_html($product->lazada); ?></td>
        </tr>

        <tr>
            <th>Trạng thái</th>
            <td><?php echo esc_html($product->status); ?></td>
        </tr>

    </table>

    <p>
        <strong>Giai đoạn tiếp theo:</strong>
        Chúng ta sẽ biến bảng thông tin này thành biểu mẫu để cập nhật dữ liệu.
    </p>

</div>

<?php
}

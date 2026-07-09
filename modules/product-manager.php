<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'k86_product_menu');

function k86_product_menu() {

    add_submenu_page(
        'k86-pro',
        'Sản phẩm',
        'Sản phẩm',
        'manage_options',
        'k86-products',
        'k86_products_page'
    );
}

function k86_products_page() {

    global $wpdb;

    $table = $wpdb->prefix . 'k86_products';
    $products = $wpdb->get_results("SELECT * FROM $table ORDER BY id DESC");
?>

<div class="wrap">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h1>Quản lý sản phẩm</h1>

        <a href="<?php echo esc_url(admin_url('admin.php?page=k86-add-product')); ?>" class="page-title-action">
            + Thêm sản phẩm
        </a>

    </div>

    <p>Đây là nơi quản lý các sản phẩm Affiliate của K86 Pro.</p>

    <table class="widefat striped">

        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Trạng thái</th>
            </tr>
        </thead>

        <tbody>

        <?php if (!empty($products)) : ?>

            <?php foreach ($products as $product) : ?>

                <tr>
                    <td><?php echo esc_html($product->name); ?></td>
                    <td><?php echo esc_html($product->price); ?></td>
                    <td><?php echo esc_html($product->status); ?></td>
                </tr>

            <?php endforeach; ?>

        <?php else : ?>

            <tr>
                <td colspan="3">Chưa có sản phẩm nào.</td>
            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

<?php
}

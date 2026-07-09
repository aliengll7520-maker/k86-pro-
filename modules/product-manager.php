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
?>

<div class="wrap">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">

        <h1>Quản lý sản phẩm</h1>

        <a href="<?php echo admin_url('admin.php?page=k86-add-product'); ?>" class="page-title-action">
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
            <tr>
                <td>Camera Wifi TP-Link Tapo C220</td>
                <td>699.000đ</td>
                <td>Hoạt động</td>
            </tr>
        </tbody>

    </table>

</div>

<?php
}

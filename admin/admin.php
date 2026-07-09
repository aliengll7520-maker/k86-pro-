<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'admin_menu', 'k86_pro_admin_menu' );

function k86_pro_admin_menu() {

    add_menu_page(
        'K86 Pro',
        'K86 Pro',
        'manage_options',
        'k86-pro',
        'k86_pro_dashboard',
        'dashicons-admin-generic',
        25
    );

}

function k86_pro_dashboard() {
?>
<div class="wrap">

    <h1>🚀 K86 Pro Dashboard</h1>

    <p><strong>Phiên bản:</strong> 1.0.0</p>

    <p>Chào mừng bạn đến với plugin <strong>K86 Pro</strong>.</p>

    <hr>

    <h2>Trạng thái Plugin</h2>

    <ul>
        <li>✅ Affiliate Box: Hoạt động</li>
        <li>✅ Shortcode: <code>[k86_box]</code></li>
        <li>✅ CSS: Đã tải</li>
        <li>✅ Cài đặt: Sẵn sàng</li>
    </ul>

</div>
<?php
}

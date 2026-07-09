<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'admin_menu', 'k86_pro_settings_menu' );

function k86_pro_settings_menu() {

    add_submenu_page(
        'k86-pro',
        'Cài đặt',
        'Cài đặt',
        'manage_options',
        'k86-settings',
        'k86_settings_page'
    );
}

function k86_settings_page() {
?>
<div class="wrap">
    <h1>Cài đặt K86 Pro</h1>

    <p>Phiên bản: <strong>1.0.0</strong></p>

    <h2>Plugin đang hoạt động bình thường.</h2>

    <p>Các chức năng cấu hình sẽ được bổ sung ở phiên bản tiếp theo.</p>
</div>
<?php
}

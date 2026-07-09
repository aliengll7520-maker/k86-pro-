<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'k86_pro_admin_menu');

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
        <h1>K86 Pro</h1>
        <p>Chào mừng đến với plugin K86 Pro.</p>
    </div>
    <?php
}

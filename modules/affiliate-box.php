<?php
if (!defined('ABSPATH')) {
    exit;
}

function k86_affiliate_box() {
    return '
    <div style="border:1px solid #ddd;padding:20px;border-radius:10px">
        <h3>K86 Affiliate Box</h3>
        <p>Đây là hộp sản phẩm đầu tiên của K86 Pro.</p>
        <a href="#" style="background:#ff6600;color:#fff;padding:10px 20px;text-decoration:none;border-radius:5px;">
            Mua ngay
        </a>
    </div>';
}

add_shortcode('k86_box', 'k86_affiliate_box');

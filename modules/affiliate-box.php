<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function k86_affiliate_box() {

    return '
    <div class="k86-box">
        <h3 class="k86-title">K86 Affiliate Box</h3>

        <p>Đây là hộp sản phẩm đầu tiên của K86 Pro.</p>

        <a href="#" class="k86-buy">
            Mua ngay
        </a>
    </div>';

}

add_shortcode( 'k86_box', 'k86_affiliate_box' );

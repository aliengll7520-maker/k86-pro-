<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function k86_affiliate_box() {

    ob_start();
    ?>

    <div class="k86-box">
        <h3 class="k86-title">Camera Wifi TP-Link Tapo C220</h3>

        <p>
            Camera AI 4MP, quay 360°, đàm thoại 2 chiều,
            phát hiện chuyển động thông minh.
        </p>

        <div class="k86-price">
            Giá tham khảo: <strong>699.000đ</strong>
        </div>

        <a class="k86-buy" href="#" target="_blank">
            🛒 Mua ngay
        </a>
    </div>

    <?php
    return ob_get_clean();
}

add_shortcode( 'k86_box', 'k86_affiliate_box' );

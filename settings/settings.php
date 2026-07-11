<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Trang cài đặt K86 Pro
 */
function k86_settings_page() {
?>
<div class="wrap">

    <h1>Cài đặt K86 Pro</h1>

    <p>Phiên bản:
        <strong><?php echo esc_html( K86_PRO_VERSION ); ?></strong>
    </p>

    <h2>Plugin đang hoạt động bình thường.</h2>

    <p>Các chức năng cấu hình sẽ được bổ sung ở các phiên bản tiếp theo.</p>

</div>
<?php
}

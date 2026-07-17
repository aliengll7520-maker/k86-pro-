<?php
/**
 * Affiliate Link Manager
 *
 * @package K86_Pro
 * @since 2.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Lấy link Affiliate theo sàn.
 *
 * @param array  $product Dữ liệu sản phẩm.
 * @param string $platform shopee|tiktok|lazada.
 *
 * @return string
 */
function k86_get_affiliate_link( $product, $platform ) {

    switch ( $platform ) {

        case 'shopee':
            return $product['shopee_link'] ?? '';

        case 'tiktok':
            return $product['tiktok_link'] ?? '';

        case 'lazada':
            return $product['lazada_link'] ?? '';

        default:
            return '';

    }

}

<?php
/**
 * Decision Render
 * Module: K86 Pro
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Hiển thị Decision Box.
 *
 * @param object $product
 * @return string
 */
function k86_render_decision_box( $product ) {

    if ( empty( $product ) ) {
        return '';
    }

    if ( ! function_exists( 'k86_decision_box_enabled' ) ) {
        return '';
    }

    if ( ! k86_decision_box_enabled() ) {
        return '';
    }

    ob_start();

    $template_path = K86_PRO_MODULES . 'decision-box/';

    $templates = array(
        'header.php',
        'content.php',
        'pros-cons.php',
        'cta.php',
        'footer.php',
    );

    foreach ( $templates as $template ) {

        $file = $template_path . $template;

        if ( file_exists( $file ) ) {
            require $file;
        }

    }

    return ob_get_clean();
}

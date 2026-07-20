<?php
/**
 * K86 Pro Next Core
 * Frontend Shortcodes
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Frontend_Shortcodes')) {

    class K86_Frontend_Shortcodes {

        /**
         * Constructor.
         */
        public function __construct() {
            add_shortcode('k86_product', array($this, 'product_shortcode'));
        }

        /**
         * Product shortcode.
         *
         * Usage:
         * [k86_product]
         * [k86_product id="123"]
         *
         * @param array $atts
         * @return string
         */
        public function product_shortcode($atts) {

            $atts = shortcode_atts(
                array(
                    'id' => 0,
                ),
                $atts,
                'k86_product'
            );

            $product_id = absint($atts['id']);

            return sprintf(
                '<div class="k86-product-placeholder">K86 Product Box (Product ID: %d)</div>',
                $product_id
            );
        }
    }

    // Khởi tạo shortcode.
    new K86_Frontend_Shortcodes();
}

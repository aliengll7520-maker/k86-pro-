<?php
/**
 * K86 Pro Next Core
 * Product Renderer
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Product_Renderer')) {

    class K86_Product_Renderer {

        /**
         * Product Service.
         *
         * @var K86_Product_Service
         */
        protected $service;

        /**
         * Constructor.
         *
         * @param K86_Product_Service $service
         */
        public function __construct($service) {
            $this->service = $service;
        }

        /**
         * Render product.
         *
         * @return string
         */
        public function render() {

            $price = $this->service->price();
            $stock = $this->service->in_stock();

            ob_start();
            ?>

            <div class="k86-product-box">

                <div class="k86-product-price">
                    <?php echo esc_html($price); ?>
                </div>

                <div class="k86-product-stock">
                    <?php echo $stock ? 'Còn hàng' : 'Hết hàng'; ?>
                </div>

            </div>

            <?php

            return ob_get_clean();
        }
    }

}

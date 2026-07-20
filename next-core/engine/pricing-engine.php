<?php
/**
 * K86 Pro Next Core
 * Pricing Engine
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Pricing_Engine')) {

    class K86_Pricing_Engine extends K86_Engine_Base {

        /**
         * Giá gốc.
         */
        public function set_regular_price($price) {
            return $this->register('regular_price', (float) $price);
        }

        public function regular_price() {
            return $this->get('regular_price', 0);
        }

        /**
         * Giá khuyến mãi.
         */
        public function set_sale_price($price) {
            return $this->register('sale_price', (float) $price);
        }

        public function sale_price() {
            return $this->get('sale_price', 0);
        }

        /**
         * Tiền tệ.
         */
        public function set_currency($currency) {
            return $this->register('currency', strtoupper($currency));
        }

        public function currency() {
            return $this->get('currency', 'VND');
        }

        /**
         * Có đang giảm giá hay không.
         */
        public function on_sale() {
            return $this->sale_price() > 0 &&
                   $this->sale_price() < $this->regular_price();
        }

        /**
         * Giá đang áp dụng.
         */
        public function current_price() {

            if ($this->on_sale()) {
                return $this->sale_price();
            }

            return $this->regular_price();
        }

        /**
         * Phần trăm giảm giá.
         */
        public function discount_percent() {

            if (!$this->on_sale()) {
                return 0;
            }

            return round(
                (($this->regular_price() - $this->sale_price()) / $this->regular_price()) * 100
            );
        }

        /**
         * Số tiền giảm.
         */
        public function discount_amount() {

            if (!$this->on_sale()) {
                return 0;
            }

            return $this->regular_price() - $this->sale_price();
        }
    }

}

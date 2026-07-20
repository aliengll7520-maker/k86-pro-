<?php
/**
 * K86 Pro Next Core
 * Shipping Engine
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Shipping_Engine')) {

    class K86_Shipping_Engine extends K86_Engine_Base {

        /**
         * Set shipping method.
         *
         * @param string $method
         */
        public function set_method($method) {
            $this->set('shipping_method', sanitize_text_field($method));
        }

        /**
         * Get shipping method.
         *
         * @return string
         */
        public function method() {
            return $this->get('shipping_method', '');
        }

        /**
         * Set shipping fee.
         *
         * @param float $fee
         */
        public function set_fee($fee) {
            $this->set('shipping_fee', (float) $fee);
        }

        /**
         * Get shipping fee.
         *
         * @return float
         */
        public function fee() {
            return (float) $this->get('shipping_fee', 0);
        }

        /**
         * Set free shipping.
         *
         * @param bool $enabled
         */
        public function set_free_shipping($enabled) {
            $this->set('free_shipping', (bool) $enabled);
        }

        /**
         * Check free shipping.
         *
         * @return bool
         */
        public function is_free_shipping() {
            return (bool) $this->get('free_shipping', false);
        }

        /**
         * Set estimated delivery.
         *
         * @param string $estimate
         */
        public function set_estimate($estimate) {
            $this->set('delivery_estimate', sanitize_text_field($estimate));
        }

        /**
         * Get estimated delivery.
         *
         * @return string
         */
        public function estimate() {
            return $this->get('delivery_estimate', '');
        }

    }

}

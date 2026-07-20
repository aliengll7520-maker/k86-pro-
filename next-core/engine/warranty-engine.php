<?php
/**
 * K86 Pro Next Core
 * Warranty Engine
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Warranty_Engine')) {

    class K86_Warranty_Engine extends K86_Engine_Base {

        /**
         * Set warranty period.
         *
         * @param string $period
         */
        public function set_period($period) {
            $this->set('warranty_period', sanitize_text_field($period));
        }

        /**
         * Get warranty period.
         *
         * @return string
         */
        public function period() {
            return $this->get('warranty_period', '');
        }

        /**
         * Set warranty type.
         *
         * @param string $type
         */
        public function set_type($type) {
            $this->set('warranty_type', sanitize_text_field($type));
        }

        /**
         * Get warranty type.
         *
         * @return string
         */
        public function type() {
            return $this->get('warranty_type', '');
        }

        /**
         * Set warranty provider.
         *
         * @param string $provider
         */
        public function set_provider($provider) {
            $this->set('warranty_provider', sanitize_text_field($provider));
        }

        /**
         * Get warranty provider.
         *
         * @return string
         */
        public function provider() {
            return $this->get('warranty_provider', '');
        }

        /**
         * Check if warranty exists.
         *
         * @return bool
         */
        public function has_warranty() {
            return $this->period() !== '';
        }

    }

}

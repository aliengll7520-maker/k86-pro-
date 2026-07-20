<?php
/**
 * K86 Pro Next Core
 * Return Policy Engine
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Return_Policy_Engine')) {

    class K86_Return_Policy_Engine extends K86_Engine_Base {

        /**
         * Set return period.
         *
         * @param string $period
         */
        public function set_period($period) {
            $this->set('return_period', sanitize_text_field($period));
        }

        /**
         * Get return period.
         *
         * @return string
         */
        public function period() {
            return $this->get('return_period', '');
        }

        /**
         * Set return conditions.
         *
         * @param string $conditions
         */
        public function set_conditions($conditions) {
            $this->set('return_conditions', sanitize_textarea_field($conditions));
        }

        /**
         * Get return conditions.
         *
         * @return string
         */
        public function conditions() {
            return $this->get('return_conditions', '');
        }

        /**
         * Set return contact.
         *
         * @param string $contact
         */
        public function set_contact($contact) {
            $this->set('return_contact', sanitize_text_field($contact));
        }

        /**
         * Get return contact.
         *
         * @return string
         */
        public function contact() {
            return $this->get('return_contact', '');
        }

        /**
         * Check if returns are supported.
         *
         * @return bool
         */
        public function is_returnable() {
            return $this->period() !== '';
        }

    }

}

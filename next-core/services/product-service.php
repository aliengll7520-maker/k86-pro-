<?php
/**
 * K86 Pro Next Core
 * Product Service
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Product_Service')) {

    class K86_Product_Service {

        /**
         * Engine Manager.
         *
         * @var K86_Engine_Manager
         */
        protected $manager;

        /**
         * Constructor.
         *
         * @param K86_Engine_Manager $manager
         */
        public function __construct($manager) {
            $this->manager = $manager;
        }

        /**
         * Get engine.
         *
         * @param string $name
         *
         * @return object|null
         */
        public function engine($name) {
            return $this->manager->get($name);
        }

        /**
         * Get current product price.
         *
         * @return float
         */
        public function price() {

            $pricing = $this->engine('pricing');

            if (!$pricing) {
                return 0;
            }

            return $pricing->current_price();
        }

        /**
         * Check stock.
         *
         * @return bool
         */
        public function in_stock() {

            $inventory = $this->engine('inventory');

            return $inventory ? $inventory->in_stock() : false;
        }

        /**
         * Get shipping engine.
         *
         * @return K86_Shipping_Engine|null
         */
        public function shipping() {
            return $this->engine('shipping');
        }

        /**
         * Get warranty engine.
         *
         * @return K86_Warranty_Engine|null
         */
        public function warranty() {
            return $this->engine('warranty');
        }

        /**
         * Get return policy engine.
         *
         * @return K86_Return_Policy_Engine|null
         */
        public function return_policy() {
            return $this->engine('return_policy');
        }

        /**
         * Get review engine.
         *
         * @return K86_Review_Engine|null
         */
        public function review() {
            return $this->engine('review');
        }
    }

}

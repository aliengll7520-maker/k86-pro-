<?php
/**
 * K86 Pro Next Core
 * Health Check
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Health_Check')) {

    class K86_Health_Check {

        /**
         * Check required classes.
         *
         * @return array
         */
        public function check() {

            $classes = array(
                'K86_Registry',
                'K86_Container',
                'K86_Engine_Manager',
                'K86_Product_Engine',
                'K86_Product_Service',
            );

            $result = array();

            foreach ($classes as $class) {
                $result[$class] = class_exists($class);
            }

            return $result;
        }

    }

}

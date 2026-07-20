<?php
/**
 * K86 Pro Next Core
 * Service Provider
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Service_Provider')) {

    class K86_Service_Provider {

        /**
         * Register all framework services.
         *
         * @param K86_Container      $container
         * @param K86_Engine_Manager $manager
         */
        public function register($container, $manager) {

            // Product Engine
            $container->singleton('product', function () {
                return new K86_Product_Engine();
            });

            // Media Engine
            $container->singleton('media', function () {
                return new K86_Media_Engine();
            });

            // Pricing Engine
            $container->singleton('pricing', function () {
                return new K86_Pricing_Engine();
            });

            // Review Engine
            $container->singleton('review', function () {
                return new K86_Review_Engine();
            });

            // Inventory Engine
            $container->singleton('inventory', function () {
                return new K86_Inventory_Engine();
            });

            // Voucher Engine
            $container->singleton('voucher', function () {
                return new K86_Voucher_Engine();
            });

            // Shipping Engine
            $container->singleton('shipping', function () {
                return new K86_Shipping_Engine();
            });

            // Warranty Engine
            $container->singleton('warranty', function () {
                return new K86_Warranty_Engine();
            });

            // Return Policy Engine
            $container->singleton('return_policy', function () {
                return new K86_Return_Policy_Engine();
            });

            // Register engines
            $manager->register('product', $container->get('product'));
            $manager->register('media', $container->get('media'));
            $manager->register('pricing', $container->get('pricing'));
            $manager->register('review', $container->get('review'));
            $manager->register('inventory', $container->get('inventory'));
            $manager->register('voucher', $container->get('voucher'));
            $manager->register('shipping', $container->get('shipping'));
            $manager->register('warranty', $container->get('warranty'));
            $manager->register('return_policy', $container->get('return_policy'));
        }

    }

}

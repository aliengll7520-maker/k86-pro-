<?php
/**
 * K86 Pro Next Core
 * Bootstrap
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Bootstrap')) {

    class K86_Bootstrap {

        /**
         * Bootstrap Framework.
         */
        public function boot() {

            // Load framework.
            $loader = new K86_Loader();
            $loader->load();

            // Core services.
            $registry  = new K86_Registry();
            $container = new K86_Container();
            $manager   = new K86_Engine_Manager();

            /*
             * Register services.
             */
            $container->singleton('product', function () {
                return new K86_Product_Engine();
            });

            $container->singleton('media', function () {
                return new K86_Media_Engine();
            });

            $container->singleton('pricing', function () {
                return new K86_Pricing_Engine();
            });

            $container->singleton('review', function () {
                return new K86_Review_Engine();
            });

            $container->singleton('inventory', function () {
                return new K86_Inventory_Engine();
            });

            $container->singleton('voucher', function () {
                return new K86_Voucher_Engine();
            });

            $container->singleton('shipping', function () {
                return new K86_Shipping_Engine();
            });

            $container->singleton('warranty', function () {
                return new K86_Warranty_Engine();
            });

            $container->singleton('return_policy', function () {
                return new K86_Return_Policy_Engine();
            });

            $container->singleton('product_service', function () use ($manager) {
                return new K86_Product_Service($manager);
            });

            $container->singleton('health_check', function () {
                return new K86_Health_Check();
            });

            /*
             * Module Registry
             */
            $container->singleton('module_registry', function () {
                return new K86_Module_Registry();
            });

            /*
             * WordPress Compatibility
             */
            $container->singleton('wordpress_hooks', function () {
                return new K86_WordPress_Hooks();
            });

            /*
             * Event Dispatcher
             */
            $container->singleton('event_dispatcher', function () {
                return new K86_Event_Dispatcher();
            });

            /*
             * Register engines.
             */
            $manager->register('product', $container->get('product'));
            $manager->register('media', $container->get('media'));
            $manager->register('pricing', $container->get('pricing'));
            $manager->register('review', $container->get('review'));
            $manager->register('inventory', $container->get('inventory'));
            $manager->register('voucher', $container->get('voucher'));
            $manager->register('shipping', $container->get('shipping'));
            $manager->register('warranty', $container->get('warranty'));
            $manager->register('return_policy', $container->get('return_policy'));

            /*
             * Store services.
             */
            $registry->set('container', $container);
            $registry->set('engine_manager', $manager);
            $registry->set('product_service', $container->get('product_service'));
            $registry->set('health_check', $container->get('health_check'));
            $registry->set('module_registry', $container->get('module_registry'));
            $registry->set('wordpress_hooks', $container->get('wordpress_hooks'));
            $registry->set('event_dispatcher', $container->get('event_dispatcher'));
        }
    }

}

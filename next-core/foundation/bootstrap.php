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
            $registry = new K86_Registry();
            $container = new K86_Container();
            $manager = new K86_Engine_Manager();

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

            /*
             * Register engines.
             */
            $manager->register('product', $container->get('product'));
            $manager->register('media', $container->get('media'));
            $manager->register('pricing', $container->get('pricing'));
            $manager->register('review', $container->get('review'));
            $manager->register('inventory', $container->get('inventory'));
            $manager->register('voucher', $container->get('voucher'));

            /*
             * Store services.
             */
            $registry->set('container', $container);
            $registry->set('engine_manager', $manager);
        }
    }

}

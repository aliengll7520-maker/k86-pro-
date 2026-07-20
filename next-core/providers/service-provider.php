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
         * Register framework services.
         *
         * @param K86_Container      $container
         * @param K86_Engine_Manager $manager
         */
        public function register($container, $manager) {

            /*
             * Engines
             */
            $container->singleton('product', fn() => new K86_Product_Engine());
            $container->singleton('media', fn() => new K86_Media_Engine());
            $container->singleton('pricing', fn() => new K86_Pricing_Engine());
            $container->singleton('review', fn() => new K86_Review_Engine());
            $container->singleton('inventory', fn() => new K86_Inventory_Engine());
            $container->singleton('voucher', fn() => new K86_Voucher_Engine());
            $container->singleton('shipping', fn() => new K86_Shipping_Engine());
            $container->singleton('warranty', fn() => new K86_Warranty_Engine());
            $container->singleton('return_policy', fn() => new K86_Return_Policy_Engine());

            /*
             * Core Services
             */
            $container->singleton('product_service', fn() => new K86_Product_Service($manager));
            $container->singleton('health_check', fn() => new K86_Health_Check());
            $container->singleton('module_registry', fn() => new K86_Module_Registry());
            $container->singleton('wordpress_hooks', fn() => new K86_WordPress_Hooks());
            $container->singleton('event_dispatcher', fn() => new K86_Event_Dispatcher());

            /*
             * Register Engines
             */
            foreach ([
                'product',
                'media',
                'pricing',
                'review',
                'inventory',
                'voucher',
                'shipping',
                'warranty',
                'return_policy'
            ] as $engine) {
                $manager->register($engine, $container->get($engine));
            }
        }

    }

}

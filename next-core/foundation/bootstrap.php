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
         *
         * @return K86_Registry
         */
        public function boot() {

            // Load framework.
            $loader = new K86_Loader();
            $loader->load();

            // Core objects.
            $registry  = new K86_Registry();
            $container = new K86_Container();
            $manager   = new K86_Engine_Manager();

            /*
             * Register all framework services.
             */
            $provider = new K86_Service_Provider();
            $provider->register($container, $manager);

            /*
             * Store shared services.
             */
            $registry->set('container', $container);
            $registry->set('engine_manager', $manager);
            $registry->set('product_service', $container->get('product_service'));
            $registry->set('health_check', $container->get('health_check'));
            $registry->set('module_registry', $container->get('module_registry'));
            $registry->set('wordpress_hooks', $container->get('wordpress_hooks'));
            $registry->set('event_dispatcher', $container->get('event_dispatcher'));

            return $registry;
        }
    }

}

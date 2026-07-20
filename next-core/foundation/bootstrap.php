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
         * Registry.
         *
         * @var K86_Registry
         */
        protected $registry;

        /**
         * Container.
         *
         * @var K86_Container
         */
        protected $container;

        /**
         * Engine Manager.
         *
         * @var K86_Engine_Manager
         */
        protected $engine_manager;

        /**
         * Khởi động Next Core.
         */
        public function boot() {

            // Nạp toàn bộ class
            $loader = new K86_Loader();
            $loader->load();

            // Registry
            $this->registry = new K86_Registry();

            // Container
            $this->container = new K86_Container();

            // Engine Manager
            $this->engine_manager = new K86_Engine_Manager();

            // Đăng ký Engine
            $this->engine_manager->register(
                'product',
                new K86_Product_Engine()
            );

            $this->engine_manager->register(
                'media',
                new K86_Media_Engine()
            );

            $this->engine_manager->register(
                'pricing',
                new K86_Pricing_Engine()
            );

            $this->engine_manager->register(
                'review',
                new K86_Review_Engine()
            );

            $this->engine_manager->register(
                'inventory',
                new K86_Inventory_Engine()
            );

            $this->engine_manager->register(
                'voucher',
                new K86_Voucher_Engine()
            );

            // Đưa vào Registry
            $this->registry->set('container', $this->container);
            $this->registry->set('engine_manager', $this->engine_manager);

            return $this;
        }

        /**
         * Lấy Registry.
         */
        public function registry() {
            return $this->registry;
        }

        /**
         * Lấy Container.
         */
        public function container() {
            return $this->container;
        }

        /**
         * Lấy Engine Manager.
         */
        public function engine_manager() {
            return $this->engine_manager;
        }
    }

}

<?php
/**
 * K86 Pro Next Core
 * Loader
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Loader')) {

    class K86_Loader {

        /**
         * Đường dẫn Next Core.
         *
         * @var string
         */
        protected $base_path;

        public function __construct() {
            $this->base_path = dirname(__DIR__);
        }

        /**
         * Nạp một file nếu tồn tại.
         *
         * @param string $file
         */
        protected function require_file($file) {

            if (is_file($file)) {
                require_once $file;
            }
        }

        /**
         * Nạp toàn bộ Framework.
         */
        public function load() {

            /*
             * Foundation
             */
            $this->require_file($this->base_path . '/foundation/registry.php');
            $this->require_file($this->base_path . '/foundation/container.php');

            /*
             * Data Layer
             */
            foreach (glob($this->base_path . '/data/*.php') as $file) {
                $this->require_file($file);
            }

            /*
             * Engine Core
             */
            $this->require_file($this->base_path . '/engine/engine-base.php');
            $this->require_file($this->base_path . '/engine/engine-manager.php');

            /*
             * Các Engine còn lại
             */
            foreach (glob($this->base_path . '/engine/*.php') as $file) {

                $name = basename($file);

                if (
                    $name === 'engine-base.php' ||
                    $name === 'engine-manager.php'
                ) {
                    continue;
                }

                $this->require_file($file);
            }
        }
    }

}

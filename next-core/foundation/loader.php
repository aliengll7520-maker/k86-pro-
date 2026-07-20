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
         * Danh sách file cần nạp.
         *
         * @var array
         */
        protected $files = array();

        /**
         * Khởi tạo danh sách file.
         */
        public function __construct() {

            $base = dirname(__DIR__);

            $this->files = array(

                // Foundation
                $base . '/foundation/registry.php',
                $base . '/foundation/container.php',

                // Data
                $base . '/data/database.php',
                $base . '/data/model.php',
                $base . '/data/repository.php',
                $base . '/data/options.php',
                $base . '/data/metadata.php',
                $base . '/data/cache.php',
                $base . '/data/migration.php',

                // Engine
                $base . '/engine/engine-base.php',
                $base . '/engine/engine-manager.php',
                $base . '/engine/product-engine.php',
                $base . '/engine/media-engine.php',
                $base . '/engine/pricing-engine.php',
                $base . '/engine/review-engine.php',
                $base . '/engine/inventory-engine.php',
                $base . '/engine/voucher-engine.php',
            );
        }

        /**
         * Nạp tất cả file.
         *
         * @return void
         */
        public function load() {

            foreach ($this->files as $file) {

                if (file_exists($file)) {
                    require_once $file;
                }
            }
        }

        /**
         * Thêm file mới.
         *
         * @param string $file
         * @return $this
         */
        public function add($file) {

            if (!in_array($file, $this->files, true)) {
                $this->files[] = $file;
            }

            return $this;
        }

        /**
         * Lấy danh sách file.
         *
         * @return array
         */
        public function files() {

            return $this->files;
        }
    }

}

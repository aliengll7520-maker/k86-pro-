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
         * Thư mục gốc của Next Core.
         *
         * @var string
         */
        protected $base_path;

        /**
         * Các thư mục cần nạp.
         *
         * @var array
         */
        protected $directories = array();

        /**
         * Khởi tạo.
         */
        public function __construct() {

            $this->base_path = dirname(__DIR__);

            $this->directories = array(
                'foundation',
                'data',
                'engine',
            );
        }

        /**
         * Nạp toàn bộ class.
         *
         * @return void
         */
        public function load() {

            foreach ($this->directories as $directory) {

                $path = $this->base_path . '/' . $directory;

                if (!is_dir($path)) {
                    continue;
                }

                $files = glob($path . '/*.php');

                if (empty($files)) {
                    continue;
                }

                sort($files, SORT_NATURAL);

                foreach ($files as $file) {

                    if (is_file($file)) {
                        require_once $file;
                    }
                }
            }
        }

        /**
         * Thêm thư mục cần nạp.
         *
         * @param string $directory
         * @return $this
         */
        public function add_directory($directory) {

            if (!in_array($directory, $this->directories, true)) {
                $this->directories[] = $directory;
            }

            return $this;
        }

        /**
         * Lấy danh sách thư mục.
         *
         * @return array
         */
        public function directories() {

            return $this->directories;
        }
    }

}

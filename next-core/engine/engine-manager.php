<?php
/**
 * K86 Pro Next Core
 * Engine Manager
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Engine_Manager')) {

    class K86_Engine_Manager {

        /**
         * Danh sách Engine.
         *
         * @var array
         */
        protected $engines = array();

        /**
         * Đăng ký Engine.
         */
        public function register($name, $engine) {

            $this->engines[$name] = $engine;

            return $this;
        }

        /**
         * Lấy Engine.
         */
        public function get($name) {

            return isset($this->engines[$name])
                ? $this->engines[$name]
                : null;
        }

        /**
         * Kiểm tra Engine.
         */
        public function has($name) {

            return isset($this->engines[$name]);
        }

        /**
         * Lấy toàn bộ Engine.
         */
        public function all() {

            return $this->engines;
        }

        /**
         * Xóa Engine.
         */
        public function remove($name) {

            if ($this->has($name)) {

                unset($this->engines[$name]);

                return true;
            }

            return false;
        }

        /**
         * Xóa toàn bộ Engine.
         */
        public function clear() {

            $this->engines = array();

            return $this;
        }

        /**
         * Đếm số Engine.
         */
        public function count() {

            return count($this->engines);
        }
    }

}

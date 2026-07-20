<?php
/**
 * K86 Pro Next Core
 * Container
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Container')) {

    class K86_Container {

        /**
         * Danh sách factory.
         *
         * @var array
         */
        protected $bindings = array();

        /**
         * Danh sách instance.
         *
         * @var array
         */
        protected $instances = array();

        /**
         * Đăng ký factory.
         *
         * @param string   $key
         * @param callable $factory
         * @return $this
         */
        public function bind($key, callable $factory) {

            $this->bindings[$key] = $factory;

            return $this;
        }

        /**
         * Đăng ký instance có sẵn.
         *
         * @param string $key
         * @param mixed  $instance
         * @return $this
         */
        public function instance($key, $instance) {

            $this->instances[$key] = $instance;

            return $this;
        }

        /**
         * Lấy đối tượng.
         *
         * @param string $key
         * @return mixed|null
         */
        public function get($key) {

            if (isset($this->instances[$key])) {
                return $this->instances[$key];
            }

            if (!isset($this->bindings[$key])) {
                return null;
            }

            $this->instances[$key] = call_user_func(
                $this->bindings[$key],
                $this
            );

            return $this->instances[$key];
        }

        /**
         * Kiểm tra tồn tại.
         *
         * @param string $key
         * @return bool
         */
        public function has($key) {

            return isset($this->bindings[$key])
                || isset($this->instances[$key]);
        }

        /**
         * Xóa binding và instance.
         *
         * @param string $key
         * @return bool
         */
        public function remove($key) {

            unset($this->bindings[$key]);
            unset($this->instances[$key]);

            return true;
        }

        /**
         * Xóa toàn bộ.
         *
         * @return $this
         */
        public function clear() {

            $this->bindings = array();
            $this->instances = array();

            return $this;
        }
    }

}

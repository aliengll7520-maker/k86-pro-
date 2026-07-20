<?php
/**
 * K86 Pro Next Core
 * Registry
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Registry')) {

    class K86_Registry {

        /**
         * Danh sách đối tượng đã đăng ký.
         *
         * @var array
         */
        protected $items = array();

        /**
         * Đăng ký một đối tượng.
         *
         * @param string $key
         * @param mixed  $value
         * @return $this
         */
        public function set($key, $value) {

            $this->items[$key] = $value;

            return $this;
        }

        /**
         * Lấy đối tượng.
         *
         * @param string $key
         * @param mixed  $default
         * @return mixed
         */
        public function get($key, $default = null) {

            return array_key_exists($key, $this->items)
                ? $this->items[$key]
                : $default;
        }

        /**
         * Kiểm tra tồn tại.
         *
         * @param string $key
         * @return bool
         */
        public function has($key) {

            return array_key_exists($key, $this->items);
        }

        /**
         * Xóa một đối tượng.
         *
         * @param string $key
         * @return bool
         */
        public function remove($key) {

            if ($this->has($key)) {
                unset($this->items[$key]);
                return true;
            }

            return false;
        }

        /**
         * Lấy toàn bộ Registry.
         *
         * @return array
         */
        public function all() {

            return $this->items;
        }

        /**
         * Xóa toàn bộ Registry.
         *
         * @return $this
         */
        public function clear() {

            $this->items = array();

            return $this;
        }

        /**
         * Đếm số lượng.
         *
         * @return int
         */
        public function count() {

            return count($this->items);
        }
    }

}

<?php
/**
 * K86 Pro Next Core
 * Engine Base
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Engine_Base')) {

    abstract class K86_Engine_Base {

        /**
         * Dữ liệu đang quản lý.
         *
         * @var array
         */
        protected $items = array();

        /**
         * Khởi tạo Engine.
         */
        public function init() {
            $this->items = array();
        }

        /**
         * Đăng ký dữ liệu.
         */
        public function register($key, $value) {
            $this->items[$key] = $value;
            return $this;
        }

        /**
         * Kiểm tra tồn tại.
         */
        public function has($key) {
            return array_key_exists($key, $this->items);
        }

        /**
         * Lấy dữ liệu.
         */
        public function get($key, $default = null) {
            return $this->has($key)
                ? $this->items[$key]
                : $default;
        }

        /**
         * Lấy toàn bộ dữ liệu.
         */
        public function all() {
            return $this->items;
        }

        /**
         * Ghi đè dữ liệu.
         */
        public function set(array $items) {
            $this->items = $items;
            return $this;
        }

        /**
         * Xóa một phần tử.
         */
        public function remove($key) {

            if ($this->has($key)) {
                unset($this->items[$key]);
                return true;
            }

            return false;
        }

        /**
         * Xóa toàn bộ.
         */
        public function clear() {
            $this->items = array();
            return $this;
        }

        /**
         * Đếm số lượng.
         */
        public function count() {
            return count($this->items);
        }

        /**
         * Kiểm tra rỗng.
         */
        public function is_empty() {
            return empty($this->items);
        }
    }
}

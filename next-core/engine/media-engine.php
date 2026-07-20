<?php
/**
 * K86 Pro Next Core
 * Media Engine
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Media_Engine')) {

    class K86_Media_Engine extends K86_Engine_Base {

        /**
         * Thêm media.
         */
        public function attach($type, $item) {

            if (!isset($this->items[$type])) {
                $this->items[$type] = array();
            }

            $this->items[$type][] = $item;

            return $this;
        }

        /**
         * Xóa media.
         */
        public function detach($type, $index) {

            if (isset($this->items[$type][$index])) {
                unset($this->items[$type][$index]);
                $this->items[$type] = array_values($this->items[$type]);
                return true;
            }

            return false;
        }

        /**
         * Lấy thư viện ảnh.
         */
        public function gallery() {
            return $this->get('gallery', array());
        }

        /**
         * Lấy danh sách video.
         */
        public function videos() {
            return $this->get('videos', array());
        }

        /**
         * Lấy tài liệu.
         */
        public function documents() {
            return $this->get('documents', array());
        }

        /**
         * Lấy audio.
         */
        public function audio() {
            return $this->get('audio', array());
        }

        /**
         * Lấy ảnh đại diện.
         */
        public function featured() {
            return $this->get('featured');
        }

        /**
         * Đặt ảnh đại diện.
         */
        public function set_featured($image) {

            $this->register('featured', $image);

            return $this;
        }
    }

}

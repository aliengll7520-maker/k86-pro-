<?php
/**
 * K86 Pro Next Core
 * Voucher Engine
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Voucher_Engine')) {

    class K86_Voucher_Engine extends K86_Engine_Base {

        /**
         * Thiết lập mã voucher.
         */
        public function set_code($code) {
            return $this->register('code', strtoupper(trim($code)));
        }

        /**
         * Lấy mã voucher.
         */
        public function code() {
            return $this->get('code', '');
        }

        /**
         * Thiết lập giá trị giảm.
         */
        public function set_value($value) {
            return $this->register('value', (float) $value);
        }

        /**
         * Lấy giá trị giảm.
         */
        public function value() {
            return $this->get('value', 0);
        }

        /**
         * Thiết lập loại voucher.
         * percent | fixed
         */
        public function set_type($type) {

            $allowed = array('percent', 'fixed');

            if (!in_array($type, $allowed, true)) {
                $type = 'fixed';
            }

            return $this->register('type', $type);
        }

        /**
         * Lấy loại voucher.
         */
        public function type() {
            return $this->get('type', 'fixed');
        }

        /**
         * Kiểm tra voucher có hợp lệ.
         */
        public function is_valid() {
            return $this->code() !== '' && $this->value() > 0;
        }

        /**
         * Tính số tiền được giảm.
         */
        public function calculate_discount($price) {

            if (!$this->is_valid()) {
                return 0;
            }

            if ($this->type() === 'percent') {
                return ($price * $this->value()) / 100;
            }

            return min($price, $this->value());
        }
    }

}

<?php
/**
 * K86 Pro Next Core
 * Inventory Engine
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Inventory_Engine')) {

    class K86_Inventory_Engine extends K86_Engine_Base {

        /**
         * Đặt số lượng tồn kho.
         */
        public function set_stock($quantity) {
            return $this->register('stock', max(0, (int) $quantity));
        }

        /**
         * Lấy số lượng tồn kho.
         */
        public function stock() {
            return $this->get('stock', 0);
        }

        /**
         * Đặt trạng thái tồn kho.
         */
        public function set_status($status) {
            return $this->register('stock_status', $status);
        }

        /**
         * Trạng thái tồn kho.
         */
        public function status() {
            return $this->get('stock_status', 'instock');
        }

        /**
         * Có hàng hay không.
         */
        public function in_stock() {
            return $this->stock() > 0;
        }

        /**
         * Giảm tồn kho.
         */
        public function decrease($quantity = 1) {

            $stock = max(0, $this->stock() - (int) $quantity);

            $this->set_stock($stock);

            return $stock;
        }

        /**
         * Tăng tồn kho.
         */
        public function increase($quantity = 1) {

            $stock = $this->stock() + (int) $quantity;

            $this->set_stock($stock);

            return $stock;
        }
    }

}

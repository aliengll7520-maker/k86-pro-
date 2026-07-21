<?php
/**
 * K86 Pro Next Core
 * Inventory Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Inventory_Engine' ) ) {

	class K86_Inventory_Engine extends K86_Engine_Base {

		/**
		 * Đặt số lượng tồn kho.
		 *
		 * @param int $quantity
		 * @return $this
		 */
		public function set_stock( $quantity ) {
			return $this->register( 'stock', max( 0, (int) $quantity ) );
		}

		/**
		 * Lấy số lượng tồn kho.
		 *
		 * @return int
		 */
		public function get_stock() {
			return $this->get( 'stock', 0 );
		}

		/**
		 * Đặt trạng thái tồn kho.
		 *
		 * @param string $status
		 * @return $this
		 */
		public function set_status( $status ) {
			return $this->register( 'stock_status', $status );
		}

		/**
		 * Lấy trạng thái tồn kho.
		 *
		 * @return string
		 */
		public function get_status() {
			return $this->get( 'stock_status', 'instock' );
		}

		/**
		 * Kiểm tra còn hàng.
		 *
		 * @return bool
		 */
		public function is_in_stock() {
			return $this->get_stock() > 0;
		}

		/**
		 * Giảm tồn kho.
		 *
		 * @param int $quantity
		 * @return int
		 */
		public function decrease( $quantity = 1 ) {

			$stock = max( 0, $this->get_stock() - (int) $quantity );

			$this->set_stock( $stock );

			return $stock;
		}

		/**
		 * Tăng tồn kho.
		 *
		 * @param int $quantity
		 * @return int
		 */
		public function increase( $quantity = 1 ) {

			$stock = $this->get_stock() + (int) $quantity;

			$this->set_stock( $stock );

			return $stock;
		}
	}
}

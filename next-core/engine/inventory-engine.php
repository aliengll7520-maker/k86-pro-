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
		 * Set stock quantity.
		 *
		 * @param int $quantity Stock quantity.
		 *
		 * @return $this
		 */
		public function set_stock( $quantity ) {

			return $this->register( 'stock', max( 0, (int) $quantity ) );

		}

		/**
		 * Get stock quantity.
		 *
		 * @return int
		 */
		public function get_stock() {

			return (int) $this->get( 'stock', 0 );

		}

		/**
		 * Set stock status.
		 *
		 * @param string $status Stock status.
		 *
		 * @return $this
		 */
		public function set_stock_status( $status ) {

			$status = in_array(
				$status,
				array( 'instock', 'outofstock', 'onbackorder' ),
				true
			) ? $status : 'instock';

			return $this->register( 'stock_status', $status );

		}

		/**
		 * Get stock status.
		 *
		 * @return string
		 */
		public function get_stock_status() {

			return (string) $this->get( 'stock_status', 'instock' );

		}

		/**
		 * Check whether product is in stock.
		 *
		 * @return bool
		 */
		public function is_in_stock() {

			return $this->get_stock() > 0;

		}

		/**
		 * Decrease stock.
		 *
		 * @param int $quantity Quantity.
		 *
		 * @return int
		 */
		public function decrease( $quantity = 1 ) {

			$quantity = max( 0, (int) $quantity );

			$stock = max(
				0,
				$this->get_stock() - $quantity
			);

			$this->set_stock( $stock );
			$this->sync_stock_status();

			return $stock;

		}

		/**
		 * Increase stock.
		 *
		 * @param int $quantity Quantity.
		 *
		 * @return int
		 */
		public function increase( $quantity = 1 ) {

			$quantity = max( 0, (int) $quantity );

			$stock = $this->get_stock() + $quantity;

			$this->set_stock( $stock );
			$this->sync_stock_status();

			return $stock;

		}

		/**
		 * Sync stock status.
		 *
		 * @return void
		 */
		public function sync_stock_status() {

			if ( $this->get_stock() > 0 ) {
				$this->set_stock_status( 'instock' );
			} else {
				$this->set_stock_status( 'outofstock' );
			}

		}

	}

}

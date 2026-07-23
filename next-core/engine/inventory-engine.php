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
/**
 * Set low stock threshold.
 *
 * @param int $quantity Threshold.
 *
 * @return $this
 */
public function set_low_stock_threshold( $quantity ) {

	return $this->register(
		'low_stock_threshold',
		max( 0, (int) $quantity )
	);

}

/**
 * Get low stock threshold.
 *
 * @return int
 */
public function get_low_stock_threshold() {

	return (int) $this->get(
		'low_stock_threshold',
		5
	);

}

/**
 * Check low stock.
 *
 * @return bool
 */
public function is_low_stock() {

	$stock = $this->get_stock();

	return $stock > 0 &&
		$stock <= $this->get_low_stock_threshold();

}

/**
 * Set max stock.
 *
 * @param int $quantity Max stock.
 *
 * @return $this
 */
public function set_max_stock( $quantity ) {

	return $this->register(
		'max_stock',
		max( 0, (int) $quantity )
	);

}

/**
 * Get max stock.
 *
 * @return int
 */
public function get_max_stock() {

	return (int) $this->get(
		'max_stock',
		0
	);

}
		/**
 * Get stock progress percentage.
 *
 * @return int
 */
public function get_stock_progress() {

	$max = $this->get_max_stock();

	if ( $max <= 0 ) {
		return 0;
	}

	return (int) min(
		100,
		round( ( $this->get_stock() / $max ) * 100 )
	);

}

/**
 * Get stock message.
 *
 * @return string
 */
public function get_stock_message() {

	if ( ! $this->is_in_stock() ) {
		return __( 'Hết hàng', 'k86-pro' );
	}

	if ( $this->is_low_stock() ) {
		return sprintf(
			__( 'Chỉ còn %d sản phẩm', 'k86-pro' ),
			$this->get_stock()
		);
	}

	return sprintf(
		__( 'Còn %d sản phẩm', 'k86-pro' ),
		$this->get_stock()
	);

}

/**
 * Can purchase.
 *
 * @return bool
 */
public function can_purchase() {

	return $this->is_in_stock()
		&& 'outofstock' !== $this->get_stock_status();

}

/**
 * Is backorder.
 *
 * @return bool
 */
public function is_backorder() {

	return 'onbackorder' === $this->get_stock_status();

}

/**
 * Reset stock.
 *
 * @return void
 */
public function reset_stock() {

	$this->set_stock( 0 );
	$this->sync_stock_status();

}
	}

}

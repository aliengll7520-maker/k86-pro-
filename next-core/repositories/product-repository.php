<?php
/**
 * K86 Pro Next Core
 * Product Repository
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Repository' ) ) {

	class K86_Product_Repository {

		/**
		 * Save product.
		 *
		 * @param array $product Product data.
		 * @return bool
		 */
		public function save( array $product ) {

			return false;

		}

		/**
		 * Update product.
		 *
		 * @param int   $id Product ID.
		 * @param array $product Product data.
		 * @return bool
		 */
		public function update( $id, array $product ) {

			return false;

		}

		/**
		 * Delete product.
		 *
		 * @param int $id Product ID.
		 * @return bool
		 */
		public function delete( $id ) {

			return false;

		}

		/**
		 * Find one product.
		 *
		 * @param int $id Product ID.
		 * @return array
		 */
		public function find( $id ) {

			return array();

		}

		/**
		 * Find all products.
		 *
		 * @return array
		 */
		public function find_all() {

			return array();

		}

	}
}

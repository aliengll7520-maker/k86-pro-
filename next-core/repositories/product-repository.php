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
		 * Get schema.
		 *
		 * @return array
		 */
		protected function schema() {

			return k86_product_schema();

		}

		/**
		 * Get Product Contract.
		 *
		 * @return array
		 */
		protected function contract() {

			$schema = $this->schema();

			return isset( $schema['contract'] )
				? $schema['contract']
				: array();

		}

		/**
		 * Get table name.
		 *
		 * @return string
		 */
		protected function table() {

			$schema = $this->schema();

			return $schema['table'];

		}

		/**
		 * Get primary key.
		 *
		 * @return string
		 */
		protected function primary_key() {

			$schema = $this->schema();

			return isset( $schema['primary_key'] )
				? $schema['primary_key']
				: 'id';

		}

		/**
		 * Get columns.
		 *
		 * @return array
		 */
		protected function columns() {

			$schema = $this->schema();

			return isset( $schema['columns'] )
				? $schema['columns']
				: array();

		}

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
		 * Find product.
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

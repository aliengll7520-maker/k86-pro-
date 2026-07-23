<?php
/**
 * K86 Pro Next Core
 * Product Database Storage
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Database_Storage' ) ) {

	class K86_Product_Database_Storage implements K86_Product_Storage_Interface {

		/**
		 * WordPress Database.
		 *
		 * @var wpdb
		 */
		protected $db;

		/**
		 * Product table.
		 *
		 * @var string
		 */
		protected $table;

		/**
		 * Constructor.
		 */
		public function __construct() {

			global $wpdb;

			$this->db    = $wpdb;
			$this->table = $wpdb->prefix . 'k86_products';

		}

		/**
		 * Find by ID.
		 */
		public function find( $id ) {

			return new K86_Product_Model();

		}

		/**
		 * Find by slug.
		 */
		public function find_by_slug( $slug ) {

			return null;

		}

		/**
		 * Find by SKU.
		 */
		public function find_by_sku( $sku ) {

			return null;

		}

		/**
		 * Get all products.
		 */
		public function all() {

			return array();

		}

		/**
		 * Pagination.
		 */
		public function paginate( $page = 1, $per_page = 20 ) {

			return array(
				'items'    => array(),
				'total'    => 0,
				'page'     => max( 1, absint( $page ) ),
				'per_page' => max( 1, absint( $per_page ) ),
			);

		}

		/**
		 * Save product.
		 */
		public function save( K86_Product_Model $product ) {

			return true;

		}

		/**
		 * Delete product.
		 */
		public function delete( $id ) {

			return true;

		}

	}

}

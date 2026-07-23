<?php
/**
 * Product Storage Interface
 *
 * Storage contract for Product Engine.
 *
 * @package K86_Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! interface_exists( 'K86_Product_Storage_Interface' ) ) {

	interface K86_Product_Storage_Interface {

		/**
		 * Find product by ID.
		 *
		 * @param int $id Product ID.
		 * @return K86_Product_Model|null
		 */
		public function find( $id );

		/**
		 * Find product by slug.
		 *
		 * @param string $slug Product slug.
		 * @return K86_Product_Model|null
		 */
		public function find_by_slug( $slug );

		/**
		 * Find product by SKU.
		 *
		 * @param string $sku Product SKU.
		 * @return K86_Product_Model|null
		 */
		public function find_by_sku( $sku );

		/**
		 * Get all products.
		 *
		 * @return array
		 */
		public function all();

		/**
		 * Get paginated products.
		 *
		 * @param int $page Current page.
		 * @param int $per_page Items per page.
		 * @return array
		 */
		public function paginate( $page = 1, $per_page = 20 );

		/**
		 * Save product.
		 *
		 * @param K86_Product_Model $product Product model.
		 * @return bool|int
		 */
		public function save( K86_Product_Model $product );

		/**
		 * Delete product.
		 *
		 * @param int $id Product ID.
		 * @return bool
		 */
		public function delete( $id );

	}
}

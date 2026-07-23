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

	$id = absint( $id );

	if ( ! $id ) {
		return null;
	}

	$row = $this->db->get_row(
		$this->db->prepare(
			"SELECT * FROM {$this->table} WHERE id = %d LIMIT 1",
			$id
		),
		ARRAY_A
	);

	if ( empty( $row ) ) {
		return null;
	}

	return K86_Product_Mapper::to_model( $row );

		}

		/**
		 * Find by slug.
		 */
		public function find_by_slug( $slug ) {

	$slug = sanitize_title( $slug );

	if ( '' === $slug ) {
		return null;
	}

	$row = $this->db->get_row(
		$this->db->prepare(
			"SELECT * FROM {$this->table} WHERE slug = %s LIMIT 1",
			$slug
		),
		ARRAY_A
	);

	if ( empty( $row ) ) {
		return null;
	}

	return K86_Product_Mapper::to_model( $row );

		}

		/**
		 * Find by SKU.
		 */
		public function find_by_sku( $sku ) {

	$sku = sanitize_text_field( $sku );

	if ( '' === $sku ) {
		return null;
	}

	$row = $this->db->get_row(
		$this->db->prepare(
			"SELECT * FROM {$this->table} WHERE sku = %s LIMIT 1",
			$sku
		),
		ARRAY_A
	);

	if ( empty( $row ) ) {
		return null;
	}

	return K86_Product_Mapper::to_model( $row );

		}

		/**
		 * Get all products.
		 */
		public function all() {

	$rows = $this->db->get_results(
		"SELECT * FROM {$this->table} ORDER BY id DESC",
		ARRAY_A
	);

	if ( empty( $rows ) ) {
		return array();
	}

	$products = array();

	foreach ( $rows as $row ) {
		$products[] = K86_Product_Mapper::to_model( $row );
	}

	return $products;

		}

		/**
		 * Pagination.
		 */
		public function paginate( $page = 1, $per_page = 20 ) {

	$page     = max( 1, absint( $page ) );
	$per_page = max( 1, absint( $per_page ) );
	$offset   = ( $page - 1 ) * $per_page;

	$total = (int) $this->db->get_var(
		"SELECT COUNT(*) FROM {$this->table}"
	);

	$rows = $this->db->get_results(
		$this->db->prepare(
			"SELECT * FROM {$this->table} ORDER BY id DESC LIMIT %d OFFSET %d",
			$per_page,
			$offset
		),
		ARRAY_A
	);

	$items = array();

	foreach ( $rows as $row ) {
		$items[] = K86_Product_Mapper::to_model( $row );
	}

	return array(
		'items'    => $items,
		'total'    => $total,
		'page'     => $page,
		'per_page' => $per_page,
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

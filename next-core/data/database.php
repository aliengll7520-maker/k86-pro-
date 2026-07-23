<?php
/**
 * K86 Pro Next Core
 * Database Manager
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Database {

	/**
	 * WordPress Database
	 *
	 * @var wpdb
	 */
	protected $db;

	/**
	 * Tên bảng
	 *
	 * @var string
	 */
	protected $table;

	/**
	 * Khởi tạo
	 */
	public function __construct() {

		global $wpdb;

		$this->db    = $wpdb;
		$this->table = $wpdb->prefix . 'k86_products';

	}

	/**
	 * Lấy đối tượng wpdb
	 *
	 * @return wpdb
	 */
	public function db() {

		return $this->db;

	}

	/**
	 * Lấy tên bảng
	 *
	 * @return string
	 */
	public function table() {

		return $this->table;

	}

	/**
	 * Charset và Collation.
	 *
	 * @return string
	 */
	public function charset_collate() {

		return $this->db->get_charset_collate();

	}

	/**
	 * Kiểm tra bảng có tồn tại.
	 *
	 * @return bool
	 */
	public function table_exists() {

		$table = $this->table();

		return $this->db->get_var(
			$this->db->prepare(
				"SHOW TABLES LIKE %s",
				$table
			)
		) === $table;

	}

}
if ( ! class_exists( 'K86_Product_Database_Storage' ) ) {

	class K86_Product_Database_Storage implements K86_Product_Storage_Interface {

		/**
		 * Database manager.
		 *
		 * @var K86_Database
		 */
		protected $database;

		/**
		 * Constructor.
		 *
		 * @param K86_Database|null $database Database manager.
		 */
		public function __construct( K86_Database $database = null ) {

			$this->database = $database ? $database : new K86_Database();

		}

		/**
		 * Find by ID.
		 *
		 * @param int $id Product ID.
		 * @return K86_Product_Model|null
		 */
		public function find( $id ) {

			return null;

		}

		/**
		 * Find by slug.
		 *
		 * @param string $slug Product slug.
		 * @return K86_Product_Model|null
		 */
		public function find_by_slug( $slug ) {

			return null;

		}

		/**
		 * Find by SKU.
		 *
		 * @param string $sku Product SKU.
		 * @return K86_Product_Model|null
		 */
		public function find_by_sku( $sku ) {

			return null;

		}

		/**
		 * Get all products.
		 *
		 * @return array
		 */
		public function all() {

			return array();

		}

		/**
		 * Pagination.
		 *
		 * @param int $page Current page.
		 * @param int $per_page Items per page.
		 * @return array
		 */
		public function paginate( $page = 1, $per_page = 20 ) {

			return array();

		}

		/**
		 * Save product.
		 *
		 * @param K86_Product_Model $product Product model.
		 * @return bool|int
		 */
		public function save( K86_Product_Model $product ) {

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

	}
}

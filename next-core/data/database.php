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

		$this->db = $wpdb;

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

}

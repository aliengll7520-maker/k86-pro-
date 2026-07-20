<?php
/**
 * K86 Pro Next Core
 * Database Migration
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Migration {

	/**
	 * Thực hiện tạo/cập nhật bảng
	 */
	public static function migrate() {

		global $wpdb;

		$table = $wpdb->prefix . 'k86_products';

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE {$table} (

			id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

			post_id BIGINT UNSIGNED NOT NULL DEFAULT 0,

			product_name VARCHAR(255) NOT NULL,

			price DECIMAL(15,2) NOT NULL DEFAULT 0,

			sale_price DECIMAL(15,2) NOT NULL DEFAULT 0,

			stock INT NOT NULL DEFAULT 0,

			rating DECIMAL(3,2) NOT NULL DEFAULT 0,

			review_count INT NOT NULL DEFAULT 0,

			created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

			updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

			PRIMARY KEY (id),

			KEY post_id (post_id)

		) {$charset_collate};";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		dbDelta( $sql );
	}

}

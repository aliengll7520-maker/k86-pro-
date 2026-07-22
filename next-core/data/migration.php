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
	 * Thực hiện tạo/cập nhật bảng.
	 */
	public static function migrate() {

		global $wpdb;

		$table = $wpdb->prefix . 'k86_products';

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE {$table} (

			id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,

			post_id BIGINT UNSIGNED NOT NULL DEFAULT 0,

			title varchar(255) NOT NULL,

			slug VARCHAR(255) NOT NULL DEFAULT '',

			sku VARCHAR(100) NOT NULL DEFAULT '',

			description LONGTEXT NULL,

			short_description TEXT NULL,

			price DECIMAL(15,2) NOT NULL DEFAULT 0,

			sale_price DECIMAL(15,2) NOT NULL DEFAULT 0,

			status VARCHAR(30) NOT NULL DEFAULT 'draft',

			stock INT NOT NULL DEFAULT 0,

			gallery LONGTEXT NULL,

			video TEXT NULL,

			voucher TEXT NULL,

			shipping TEXT NULL,

			warranty TEXT NULL,

			return_policy TEXT NULL,

			affiliate_links LONGTEXT NULL,

			rating DECIMAL(3,2) NOT NULL DEFAULT 0,

			review_count INT NOT NULL DEFAULT 0,

			created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

			updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

			PRIMARY KEY (id),

			KEY post_id (post_id),

			KEY slug (slug),

			KEY sku (sku),

			KEY status (status)

		) {$charset_collate};";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		dbDelta( $sql );
	}

}

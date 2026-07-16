<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Core: Install
 * Version: 1.5.2
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Cài đặt hoặc cập nhật Database
 *
 * Được gọi khi Plugin được kích hoạt.
 *
 * @return void
 */
function k86_install_database() {

	global $wpdb;

	$table = $wpdb->prefix . 'k86_products';

	$charset_collate = $wpdb->get_charset_collate();

	// Kiểm tra hằng số Database Version.
	if ( ! defined( 'K86_DB_VERSION' ) ) {
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	$sql = "
	CREATE TABLE {$table} (

		id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,

		name VARCHAR(255) NOT NULL,

		slug VARCHAR(255) NOT NULL,

		brand VARCHAR(255) DEFAULT '',

		price VARCHAR(50) DEFAULT '',

		sale_price VARCHAR(50) DEFAULT '',

		rating DECIMAL(2,1) DEFAULT '5.0',

		review_count INT DEFAULT 0,

		shopee TEXT,

		tiktok TEXT,

		lazada TEXT,

		image TEXT,

		description LONGTEXT,

		status VARCHAR(20) DEFAULT 'active',

		created DATETIME DEFAULT CURRENT_TIMESTAMP,

		PRIMARY KEY (id)

	) {$charset_collate};
	";
	
	dbDelta( $sql );

	/**
	 * Cập nhật phiên bản Database
	 */
	update_option(
		'k86_db_version',
		K86_DB_VERSION
	);

	/**
	 * Hook sau khi cài đặt Database
	 *
	 * Cho phép các Module mở rộng
	 * thực hiện cài đặt dữ liệu riêng.
	 */
	do_action( 'k86_database_installed' );
}

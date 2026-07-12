<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Core: Upgrade Engine
 * Version: 1.0.0
 * Status: Stable
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Kiểm tra và nâng cấp Database
 */
function k86_upgrade_database() {

	$current_db_version = get_option( 'k86_db_version', '0.0.0' );

	if ( version_compare( $current_db_version, K86_DB_VERSION, '<' ) ) {

		// Chạy lại dbDelta để cập nhật cấu trúc bảng
		k86_install_database();

		// Cập nhật phiên bản Database
		update_option( 'k86_db_version', K86_DB_VERSION );
	}
}

/**
 * Tự động kiểm tra nâng cấp Database
 */
add_action(
	'plugins_loaded',
	'k86_upgrade_database'
);

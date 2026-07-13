<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Core: Upgrade Engine
 * Version: 1.5.2
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Kiểm tra và nâng cấp Database
 *
 * @return void
 */
function k86_upgrade_database() {

	if ( ! defined( 'K86_DB_VERSION' ) ) {
		return;
	}

	$current_db_version = get_option(
		'k86_db_version',
		'0.0.0'
	);

	if ( version_compare( $current_db_version, K86_DB_VERSION, '<' ) ) {

		/**
		 * Chạy lại Database Installer
		 */
		k86_install_database();

		/**
		 * Hook sau khi nâng cấp Database
		 */
		do_action( 'k86_database_upgraded' );

	}

}

/**
 * Tự động kiểm tra Database
 */
add_action(
	'plugins_loaded',
	'k86_upgrade_database'
);

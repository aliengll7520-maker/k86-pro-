<?php
/**
 * ------------------------------------------------------------------------
 * K86 Pro
 * Database Upgrade Engine
 * ------------------------------------------------------------------------
 *
 * Chịu trách nhiệm nâng cấp cấu trúc Database.
 *
 * @package K86_Pro
 * @since   2.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Kiểm tra và nâng cấp Database.
 *
 * @return void
 */
function k86_upgrade_database() {

	if ( ! defined( 'K86_DB_VERSION' ) ) {
		return;
	}

	$current_version = get_option(
		'k86_db_version',
		'0.0.0'
	);

	if ( version_compare( $current_version, K86_DB_VERSION, '>=' ) ) {
		return;
	}

	/*
	|--------------------------------------------------------------------------
	| Upgrade Database
	|--------------------------------------------------------------------------
	*/

	if ( function_exists( 'k86_install_database' ) ) {
		k86_install_database();
	}

	update_option(
		'k86_db_version',
		K86_DB_VERSION
	);

	do_action(
		'k86_database_upgraded',
		$current_version,
		K86_DB_VERSION
	);

}

/**
 * Khởi tạo Upgrade Engine.
 */
function k86_init_upgrade() {

	k86_upgrade_database();

	do_action( 'k86_upgrade_init' );

}

/**
 * Framework Upgrade Engine đã sẵn sàng.
 */
do_action( 'k86_upgrade_ready' );

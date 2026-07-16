<?php
/**
 * ------------------------------------------------------------------------
 * K86 Pro
 * Database Installer
 * ------------------------------------------------------------------------
 *
 * Điều phối quá trình cài đặt và nâng cấp Database.
 *
 * Trách nhiệm:
 * - Kiểm tra Database đã tồn tại hay chưa.
 * - Gọi Install Engine.
 * - Gọi Upgrade Engine.
 *
 * Không chứa:
 * - SQL
 * - dbDelta()
 * - CRUD
 *
 * @package K86_Pro
 * @since   2.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Kiểm tra Database đã cài chưa.
 *
 * @return bool
 */
function k86_database_installed() {

	$current = get_option( 'k86_db_version', '' );

	return ! empty( $current );

}

/**
 * Khởi tạo Database Installer.
 *
 * @return void
 */
function k86_run_database_installer() {

	if ( ! k86_database_installed() ) {

		if ( function_exists( 'k86_install_database' ) ) {
			k86_install_database();
		}

	} else {

		if ( function_exists( 'k86_upgrade_database' ) ) {
			k86_upgrade_database();
		}

	}

	do_action( 'k86_database_installer_complete' );

}

/**
 * Framework Ready
 */
do_action( 'k86_database_installer_ready' );

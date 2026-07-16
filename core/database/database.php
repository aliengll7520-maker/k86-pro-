<?php
/**
 * ------------------------------------------------------------------------
 * K86 Pro
 * Database Repository
 * ------------------------------------------------------------------------
 *
 * Chỉ quản lý Database API và CRUD.
 * Không chứa Install.
 * Không chứa Upgrade.
 *
 * @package K86_Pro
 * @since   2.0.0
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Database CRUD Helper API
|--------------------------------------------------------------------------
*/

/**
 * Thêm một bản ghi.
 */
function k86_db_insert( $table, $data ) {

	global $wpdb;

	$result = $wpdb->insert(
		k86_table( $table ),
		(array) $data
	);

	if ( false === $result ) {
		return false;
	}

	return (int) $wpdb->insert_id;
}

/**
 * Cập nhật một bản ghi.
 */
function k86_db_update( $table, $data, $where ) {

	global $wpdb;

	return $wpdb->update(
		k86_table( $table ),
		(array) $data,
		(array) $where
	);

}

/**
 * Xóa một bản ghi.
 */
function k86_db_delete( $table, $where ) {

	global $wpdb;

	return $wpdb->delete(
		k86_table( $table ),
		(array) $where
	);

}

/*
|--------------------------------------------------------------------------
| Database Framework Hooks
|--------------------------------------------------------------------------
*/

do_action( 'k86_database_loaded' );

/**
 * Filter dữ liệu trước khi lưu Database.
 */
function k86_database_filter_data( $data, $table ) {

	return apply_filters(
		'k86_database_data',
		(array) $data,
		$table
	);

}

/**
 * Filter kết quả Database.
 */
function k86_database_filter_result( $result ) {

	return apply_filters(
		'k86_database_result',
		$result
	);

}

/*
|--------------------------------------------------------------------------
| Database Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Database Engine.
 */
function k86_init_database() {

	if ( function_exists( 'k86_database_installed' ) &&
		! k86_database_installed() &&
		function_exists( 'k86_install_database' ) ) {

		k86_install_database();
	}

	if ( function_exists( 'k86_upgrade_database' ) ) {
		k86_upgrade_database();
	}

	do_action( 'k86_database_init' );

}

/**
 * Framework Database Engine đã sẵn sàng.
 */
do_action( 'k86_database_ready' );

/**
 * Nâng cấp Database nếu cần.
 *
 * @return void
 */
function k86_upgrade_database() {

	$current_version = get_option( 'k86_database_version', '0.0.0' );

	if ( version_compare( $current_version, k86_database_version(), '<' ) ) {

		k86_create_database_tables();

		update_option(
			'k86_database_version',
			k86_database_version()
		);

		do_action(
			'k86_database_upgraded',
			$current_version,
			k86_database_version()
		);

	}

}

/**
 * Lấy phiên bản Database hiện tại.
 *
 * @return string
 */
function k86_get_database_version() {

	return get_option(
		'k86_database_version',
		'0.0.0'
	);

}
/*
|--------------------------------------------------------------------------
| Database CRUD Helper API
|--------------------------------------------------------------------------
*/

/**
 * Thêm một bản ghi.
 *
 * @param string $table
 * @param array  $data
 * @return int|false
 */
function k86_db_insert( $table, $data ) {

	global $wpdb;

	$result = $wpdb->insert(
		k86_table( $table ),
		$data
	);

	if ( false === $result ) {
		return false;
	}

	return (int) $wpdb->insert_id;

}

/**
 * Cập nhật một bản ghi.
 *
 * @param string $table
 * @param array  $data
 * @param array  $where
 * @return int|false
 */
function k86_db_update( $table, $data, $where ) {

	global $wpdb;

	return $wpdb->update(
		k86_table( $table ),
		$data,
		$where
	);

}

/**
 * Xóa một bản ghi.
 *
 * @param string $table
 * @param array  $where
 * @return int|false
 */
function k86_db_delete( $table, $where ) {

	global $wpdb;

	return $wpdb->delete(
		k86_table( $table ),
		$where
	);

}
/*
|--------------------------------------------------------------------------
| Database Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Database Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Database Engine đã tải.
 */
do_action( 'k86_database_loaded' );

/**
 * Filter dữ liệu trước khi lưu Database.
 *
 * @param array  $data
 * @param string $table
 * @return array
 */
function k86_database_filter_data( $data, $table ) {

	return apply_filters(
		'k86_database_data',
		$data,
		$table
	);

}

/**
 * Filter kết quả Database.
 *
 * @param mixed $result
 * @return mixed
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
 *
 * @return void
 */
function k86_init_database() {

	if ( ! k86_database_installed() ) {
		k86_install_database();
	}

	k86_upgrade_database();

	do_action( 'k86_database_init' );

}

/**
 * Framework Database Engine đã sẵn sàng.
 */
do_action( 'k86_database_ready' );

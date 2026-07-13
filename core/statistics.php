<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Statistics Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Statistics Configuration
|--------------------------------------------------------------------------
*/

/**
 * Danh sách các loại thống kê.
 *
 * @return array
 */
function k86_statistics_types() {

	return array(
		'views',
		'likes',
		'reactions',
		'clicks',
		'shares',
		'comments',
	);

}

/**
 * Kiểm tra loại thống kê hợp lệ.
 *
 * @param string $type
 * @return bool
 */
function k86_statistics_type_exists( $type ) {

	return in_array(
		$type,
		k86_statistics_types(),
		true
	);

}
/*
|--------------------------------------------------------------------------
| Statistics Counter API
|--------------------------------------------------------------------------
*/

/**
 * Tăng bộ đếm thống kê.
 *
 * @param string $type
 * @param int    $object_id
 * @return bool
 */
function k86_statistics_increment( $type, $object_id ) {

	if ( ! k86_statistics_type_exists( $type ) ) {
		return false;
	}

	do_action(
		'k86_statistics_increment',
		$type,
		absint( $object_id )
	);

	return true;

}

/**
 * Giảm bộ đếm thống kê.
 *
 * @param string $type
 * @param int    $object_id
 * @return bool
 */
function k86_statistics_decrement( $type, $object_id ) {

	if ( ! k86_statistics_type_exists( $type ) ) {
		return false;
	}

	do_action(
		'k86_statistics_decrement',
		$type,
		absint( $object_id )
	);

	return true;

}

/**
 * Khởi tạo bộ đếm thống kê.
 *
 * @param string $type
 * @param int    $object_id
 * @return bool
 */
function k86_statistics_initialize( $type, $object_id ) {

	if ( ! k86_statistics_type_exists( $type ) ) {
		return false;
	}

	do_action(
		'k86_statistics_initialize',
		$type,
		absint( $object_id )
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Statistics Read API
|--------------------------------------------------------------------------
*/

/**
 * Lấy giá trị thống kê.
 *
 * @param string $type
 * @param int    $object_id
 * @return int
 */
function k86_get_statistics( $type, $object_id ) {

	if ( ! k86_statistics_type_exists( $type ) ) {
		return 0;
	}

	return (int) apply_filters(
		'k86_get_statistics',
		0,
		$type,
		absint( $object_id )
	);

}

/**
 * Lấy toàn bộ thống kê của một đối tượng.
 *
 * @param int $object_id
 * @return array
 */
function k86_get_all_statistics( $object_id ) {

	$data = array();

	foreach ( k86_statistics_types() as $type ) {
		$data[ $type ] = k86_get_statistics(
			$type,
			$object_id
		);
	}

	return $data;

}

/**
 * Kiểm tra đối tượng có thống kê hay không.
 *
 * @param int $object_id
 * @return bool
 */
function k86_has_statistics( $object_id ) {

	foreach ( k86_statistics_types() as $type ) {

		if ( k86_get_statistics( $type, $object_id ) > 0 ) {
			return true;
		}

	}

	return false;

}
/*
|--------------------------------------------------------------------------
| Statistics Update API
|--------------------------------------------------------------------------
*/

/**
 * Cập nhật giá trị thống kê.
 *
 * @param string $type
 * @param int    $object_id
 * @param int    $value
 * @return bool
 */
function k86_update_statistics( $type, $object_id, $value ) {

	if ( ! k86_statistics_type_exists( $type ) ) {
		return false;
	}

	do_action(
		'k86_update_statistics',
		$type,
		absint( $object_id ),
		absint( $value )
	);

	return true;

}

/**
 * Đặt lại giá trị thống kê.
 *
 * @param string $type
 * @param int    $object_id
 * @return bool
 */
function k86_reset_statistics( $type, $object_id ) {

	return k86_update_statistics(
		$type,
		$object_id,
		0
	);

}

/**
 * Đặt lại toàn bộ thống kê của đối tượng.
 *
 * @param int $object_id
 * @return bool
 */
function k86_reset_all_statistics( $object_id ) {

	foreach ( k86_statistics_types() as $type ) {
		k86_reset_statistics(
			$type,
			$object_id
		);
	}

	return true;

}
/*
|--------------------------------------------------------------------------
| Statistics Summary API
|--------------------------------------------------------------------------
*/

/**
 * Lấy thống kê tổng hợp.
 *
 * @param int $object_id
 * @return array
 */
function k86_statistics_summary( $object_id ) {

	$summary = k86_get_all_statistics( $object_id );

	$summary['total'] = array_sum( $summary );

	return apply_filters(
		'k86_statistics_summary',
		$summary,
		absint( $object_id )
	);

}

/**
 * Lấy tổng của một loại thống kê.
 *
 * @param string $type
 * @return int
 */
function k86_statistics_total( $type ) {

	if ( ! k86_statistics_type_exists( $type ) ) {
		return 0;
	}

	return (int) apply_filters(
		'k86_statistics_total',
		0,
		$type
	);

}

/**
 * Lấy tổng tất cả thống kê.
 *
 * @return int
 */
function k86_statistics_grand_total() {

	$total = 0;

	foreach ( k86_statistics_types() as $type ) {
		$total += k86_statistics_total( $type );
	}

	return $total;

}
/*
|--------------------------------------------------------------------------
| Statistics Storage API
|--------------------------------------------------------------------------
*/

/**
 * Lưu dữ liệu thống kê.
 *
 * @param int    $object_id
 * @param string $type
 * @param int    $value
 * @return bool
 */
function k86_statistics_store( $object_id, $type, $value ) {

	if ( ! k86_statistics_type_exists( $type ) ) {
		return false;
	}

	do_action(
		'k86_statistics_store',
		absint( $object_id ),
		$type,
		absint( $value )
	);

	return true;

}

/**
 * Đồng bộ dữ liệu thống kê.
 *
 * @param int $object_id
 * @return bool
 */
function k86_statistics_sync( $object_id ) {

	do_action(
		'k86_statistics_sync',
		absint( $object_id )
	);

	return true;

}

/**
 * Kiểm tra Storage đã sẵn sàng.
 *
 * @return bool
 */
function k86_statistics_storage_ready() {

	return apply_filters(
		'k86_statistics_storage_ready',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Statistics Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Statistics Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Statistics Engine đã tải.
 */
do_action( 'k86_statistics_loaded' );

/**
 * Filter dữ liệu Statistics.
 *
 * @param array $data
 * @return array
 */
function k86_statistics_filter_data( $data ) {

	return apply_filters(
		'k86_statistics_data',
		$data
	);

}

/**
 * Filter kết quả Statistics.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_statistics_filter_result( $result ) {

	return apply_filters(
		'k86_statistics_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Statistics Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Statistics Engine.
 *
 * @return void
 */
function k86_init_statistics() {

	do_action( 'k86_statistics_init' );

}

/**
 * Framework Statistics Engine đã sẵn sàng.
 */
do_action( 'k86_statistics_ready' );

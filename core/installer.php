<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Installer Engine
 * Version: 1.6.0
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Installer Configuration
|--------------------------------------------------------------------------
*/

/**
 * Phiên bản Database hiện tại.
 *
 * @return string
 */
function k86_database_version() {

	return '1.6.0';

}

/**
 * Tên Option lưu Database Version.
 *
 * @return string
 */
function k86_database_version_option() {

	return 'k86_database_version';

}
/*
|--------------------------------------------------------------------------
| Activation API
|--------------------------------------------------------------------------
*/

/**
 * Kích hoạt K86 Pro.
 *
 * @return bool
 */
function k86_activate_plugin() {

	do_action(
		'k86_activate_plugin'
	);

	return true;

}

/**
 * Khởi tạo Database Version.
 *
 * @return bool
 */
function k86_initialize_database_version() {

	update_option(
		k86_database_version_option(),
		k86_database_version()
	);

	return true;

}

/**
 * Kiểm tra Plugin đã được kích hoạt.
 *
 * @return bool
 */
function k86_plugin_activated() {

	return (bool) apply_filters(
		'k86_plugin_activated',
		true
	);

}
/*
|--------------------------------------------------------------------------
| Upgrade API
|--------------------------------------------------------------------------
*/

/**
 * Nâng cấp Database.
 *
 * @return bool
 */
function k86_upgrade_database() {

	do_action(
		'k86_upgrade_database'
	);

	return true;

}

/**
 * Lấy Database Version hiện tại.
 *
 * @return string
 */
function k86_get_database_version() {

	return (string) get_option(
		k86_database_version_option(),
		k86_database_version()
	);

}

/**
 * Kiểm tra có cần nâng cấp Database.
 *
 * @return bool
 */
function k86_database_upgrade_required() {

	return version_compare(
		k86_get_database_version(),
		k86_database_version(),
		'<'
	);

}
/*
|--------------------------------------------------------------------------
| Uninstall API
|--------------------------------------------------------------------------
*/

/**
 * Gỡ cài đặt K86 Pro.
 *
 * @return bool
 */
function k86_uninstall_plugin() {

	do_action(
		'k86_uninstall_plugin'
	);

	return true;

}

/**
 * Kiểm tra có được phép xóa dữ liệu khi gỡ cài đặt.
 *
 * @return bool
 */
function k86_allow_data_removal() {

	return (bool) apply_filters(
		'k86_allow_data_removal',
		false
	);

}

/**
 * Thực hiện xóa dữ liệu Plugin.
 *
 * @return bool
 */
function k86_remove_plugin_data() {

	do_action(
		'k86_remove_plugin_data'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Cleanup API
|--------------------------------------------------------------------------
*/

/**
 * Dọn dẹp dữ liệu tạm.
 *
 * @return bool
 */
function k86_cleanup_temp() {

	do_action(
		'k86_cleanup_temp'
	);

	return true;

}

/**
 * Dọn dẹp bộ nhớ đệm.
 *
 * @return bool
 */
function k86_cleanup_cache() {

	do_action(
		'k86_cleanup_cache'
	);

	return true;

}

/**
 * Dọn dẹp toàn bộ tài nguyên.
 *
 * @return bool
 */
function k86_cleanup_all() {

	do_action(
		'k86_cleanup_all'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Installer Helper API
|--------------------------------------------------------------------------
*/

/**
 * Kiểm tra Installer Engine sẵn sàng.
 *
 * @return bool
 */
function k86_installer_ready() {

	return apply_filters(
		'k86_installer_ready',
		true
	);

}

/**
 * Lấy cấu hình Installer.
 *
 * @return array
 */
function k86_installer_settings() {

	return apply_filters(
		'k86_installer_settings',
		array(
			'database_version' => k86_database_version(),
			'option_name'      => k86_database_version_option(),
		)
	);

}

/**
 * Đồng bộ Installer.
 *
 * @return bool
 */
function k86_installer_sync() {

	do_action(
		'k86_installer_sync'
	);

	return true;

}
/*
|--------------------------------------------------------------------------
| Installer Framework Hooks
|--------------------------------------------------------------------------
|
| Các module khác nên Hook vào Installer Engine
| thay vì sửa trực tiếp Core.
|
*/

/**
 * Thông báo Installer Engine đã tải.
 */
do_action( 'k86_installer_loaded' );

/**
 * Filter dữ liệu Installer.
 *
 * @param array $data
 * @return array
 */
function k86_installer_filter_data( $data ) {

	return apply_filters(
		'k86_installer_data',
		(array) $data
	);

}

/**
 * Filter kết quả Installer.
 *
 * @param mixed $result
 * @return mixed
 */
function k86_installer_filter_result( $result ) {

	return apply_filters(
		'k86_installer_result',
		$result
	);

}
/*
|--------------------------------------------------------------------------
| Installer Final API
|--------------------------------------------------------------------------
*/

/**
 * Khởi tạo Installer Engine.
 *
 * @return void
 */
function k86_init_installer() {

	do_action( 'k86_installer_init' );

}

/**
 * Framework Installer Engine đã sẵn sàng.
 */
do_action( 'k86_installer_ready' );

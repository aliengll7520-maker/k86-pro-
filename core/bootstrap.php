<?php
/**
 * ------------------------------------------------------------------------
 * K86 Pro
 * Bootstrap Engine
 * ------------------------------------------------------------------------
 *
 * Bootstrap là Kernel của K86 Pro.
 *
 * Nhiệm vụ:
 * - Khởi tạo Framework.
 * - Nạp Core Engine.
 * - Kiểm tra quá trình khởi động.
 * - Phát tín hiệu Framework Ready.
 *
 * Bootstrap không chứa Business Logic.
 *
 * @package K86_Pro
 * @since   1.6.0
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Bootstrap Constants
|--------------------------------------------------------------------------
*/

/**
 * Phiên bản Bootstrap Engine.
 */
if ( ! defined( 'K86_BOOTSTRAP_VERSION' ) ) {
	define( 'K86_BOOTSTRAP_VERSION', '1.6.0' );
}
/*
|--------------------------------------------------------------------------
| Bootstrap Startup
|--------------------------------------------------------------------------
*/

/**
 * Khởi động Bootstrap Engine.
 *
 * @return void
 */
/*
|--------------------------------------------------------------------------
| Core Loader
|--------------------------------------------------------------------------
*/

/**
 * Nạp Core Loader.
 *
 * @return void
 */
function k86_bootstrap_load_core() {

	$core_loader = K86_PRO_PATH . 'core/loader.php';

	if ( file_exists( $core_loader ) ) {
		require_once $core_loader;
	}

}
/*
|--------------------------------------------------------------------------
| Bootstrap Startup Sequence
|--------------------------------------------------------------------------
*/

/**
 * Thực thi quá trình khởi động Bootstrap.
 *
 * @return void
 */
function k86_bootstrap_run() {

	/**
	 * Thông báo Bootstrap bắt đầu khởi động.
	 */
	do_action( 'k86_bootstrap_before_init' );

	/**
	 * Nạp Core Engine.
	 */
	k86_bootstrap_load_core();

	/**
	 * Thông báo Bootstrap đã hoàn tất.
	 */
	do_action( 'k86_bootstrap_after_init' );

}
/*
|--------------------------------------------------------------------------
| Bootstrap Execute
|--------------------------------------------------------------------------
*/

/**
 * Khởi động Bootstrap Engine.
 *
 * Bootstrap chỉ chạy một lần khi plugin được nạp.
 */
k86_bootstrap_run();
/*
|--------------------------------------------------------------------------
| Framework Ready
|--------------------------------------------------------------------------
*/

/**
 * Thông báo Bootstrap đã hoàn thành.
 *
 * Từ thời điểm này các Engine có thể bắt đầu
 * hoạt động thông qua các Hook của K86 Pro.
 */
do_action( 'k86_framework_ready' );

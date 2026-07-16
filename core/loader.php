<?php
/**
 * ------------------------------------------------------------------------
 * K86 Pro
 * Core Loader
 * ------------------------------------------------------------------------
 *
 * Loader là trung tâm điều phối của Foundation Engine.
 *
 * Nhiệm vụ:
 * - Nạp các thành phần Core.
 * - Không chứa Business Logic.
 * - Không Render giao diện.
 *
 * @package K86_Pro
 * @since   1.6.0
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Core Components
|--------------------------------------------------------------------------
*/

$core_components = array(

	'version.php',
	'install.php',
	'installer.php',
	'update.php',
	'upgrade.php',

	'database.php',
	'backup.php',
	'export.php',
	'import.php',

	'security.php',
	'license.php',

	'cache.php',
	'logger.php',
	'notification.php',
	'scheduler.php',
	'statistics.php',

	'ajax.php',
	'rest-api.php',

	'assets.php',
	'dashboard.php',

);

/*
|--------------------------------------------------------------------------
| Load Core Components
|--------------------------------------------------------------------------
*/

foreach ( $core_components as $component ) {

$lifecycle_file = K86_PRO_PATH . 'core/lifecycle/' . $component;
$core_file      = K86_PRO_PATH . 'core/' . $component;

if ( file_exists( $lifecycle_file ) ) {
	require_once $lifecycle_file;
} elseif ( file_exists( $core_file ) ) {
	require_once $core_file;
}

}

/*
|--------------------------------------------------------------------------
| Loader Ready
|--------------------------------------------------------------------------
*/

do_action( 'k86_loader_ready' );
/*
|--------------------------------------------------------------------------
| Load Business Engine
|--------------------------------------------------------------------------
*/

$business_loader = K86_PRO_PATH . 'business/loader.php';

if ( file_exists( $business_loader ) ) {
	require_once $business_loader;
}

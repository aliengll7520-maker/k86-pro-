<?php
/**
 * ------------------------------------------------------------------------
 * K86 Pro
 * Database Engine Loader
 * ------------------------------------------------------------------------
 *
 * Chịu trách nhiệm nạp toàn bộ Database Engine.
 *
 * @package K86_Pro
 * @since   1.6.0
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Database Components
|--------------------------------------------------------------------------
*/

$database_components = array(

	'database.php',
	'install.php',
	'installer.php',
	'update.php',
	'upgrade.php',

);

/*
|--------------------------------------------------------------------------
| Load Database Components
|--------------------------------------------------------------------------
*/

foreach ( $database_components as $component ) {

	$database_file = __DIR__ . '/' . $component;

	if ( file_exists( $database_file ) ) {
		require_once $database_file;
	}

}

/*
|--------------------------------------------------------------------------
| Database Loader Ready
|--------------------------------------------------------------------------
*/

do_action( 'k86_database_loader_ready' );

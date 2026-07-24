<?php
/**
 * ------------------------------------------------------------------------
 * K86 Pro
 * Bridge Core Loader
 * ------------------------------------------------------------------------
 *
 * Foundation Loader của K86 Pro.
 *
 * Giai đoạn Sprint 01:
 * - Legacy Compatible
 * - Bridge Ready
 * - Next Core Detection
 *
 * Chưa Boot Kernel.
 *
 * @package K86_Pro
 * @since   2.0.0
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Loader Information
|--------------------------------------------------------------------------
*/

if ( ! defined( 'K86_LOADER_VERSION' ) ) {
	define( 'K86_LOADER_VERSION', '2.0.0' );
}

if ( ! defined( 'K86_LOADER_MODE' ) ) {
	define( 'K86_LOADER_MODE', 'legacy' );
}

/*
|--------------------------------------------------------------------------
| Loader Boot
|--------------------------------------------------------------------------
*/

do_action( 'k86_loader_booting' );

/*
|--------------------------------------------------------------------------
| Bridge Helper
|--------------------------------------------------------------------------
*/

if ( ! function_exists( 'k86_next_core_exists' ) ) {

	function k86_next_core_exists() {

		return is_dir(
			K86_PRO_PATH . 'next-core'
		);

	}

}

if ( ! function_exists( 'k86_kernel_exists' ) ) {

	function k86_kernel_exists() {

		return file_exists(
			K86_PRO_PATH . 'next-core/kernel/kernel.php'
		);

	}

}

/*
|--------------------------------------------------------------------------
| Bridge Status
|--------------------------------------------------------------------------
*/

$bridge_available = false;

if (
	k86_next_core_exists()
	&&
	k86_kernel_exists()
) {

	$bridge_available = true;

}

/*
|--------------------------------------------------------------------------
| Core Components
|--------------------------------------------------------------------------
*/

$core_components = array(

	'functions',

	'hooks',

	'assets',

	'admin',

	'ajax',

	'shortcodes',

	'blocks',

	'api',

);

/*
|--------------------------------------------------------------------------
| Allow Extensions
|--------------------------------------------------------------------------
*/

$core_components = apply_filters(
	'k86_core_components',
	$core_components
);

/*
|--------------------------------------------------------------------------
| Load Legacy Components
|--------------------------------------------------------------------------
*/

foreach ( $core_components as $component ) {

	$file = K86_PRO_PATH .
		'core/' .
		$component .
		'.php';

	if ( file_exists( $file ) ) {

		require_once $file;

	}

}

/*
|--------------------------------------------------------------------------
| Bridge Layer
|--------------------------------------------------------------------------
*/

if ( $bridge_available ) {

	require_once K86_PRO_PATH . 'next-core/kernel/kernel.php';

	// Boot thử Next Core
	if ( file_exists( K86_PRO_PATH . 'next-core/kernel/kernel-loader.php' ) ) {

		require_once K86_PRO_PATH . 'next-core/kernel/kernel-loader.php';

		if ( class_exists( 'K86_Kernel' ) && class_exists( 'K86_Kernel_Loader' ) ) {

			try {

				$kernel = new K86_Kernel();

				$loader = new K86_Kernel_Loader( $kernel );

				if ( method_exists( $loader, 'boot' ) ) {
					$loader->boot();
				}

			} catch ( Throwable $e ) {

				error_log(
					'K86 Next Core Boot: ' . $e->getMessage()
				);

			}

		}

	}

	do_action( 'k86_bridge_loaded' );

}

/*
|--------------------------------------------------------------------------
| Legacy Ready
|--------------------------------------------------------------------------
*/

do_action(
	'k86_legacy_loaded'
);
/*
|--------------------------------------------------------------------------
| Loader Status
|--------------------------------------------------------------------------
*/

if ( ! defined( 'K86_BRIDGE_AVAILABLE' ) ) {
	define( 'K86_BRIDGE_AVAILABLE', $bridge_available );
}

if ( ! defined( 'K86_NEXT_CORE_READY' ) ) {
	define(
		'K86_NEXT_CORE_READY',
		$bridge_available
	);
}

/*
|--------------------------------------------------------------------------
| Loader Finished
|--------------------------------------------------------------------------
*/

do_action(
	'k86_loader_ready',
	array(
		'version' => K86_LOADER_VERSION,
		'mode'    => K86_LOADER_MODE,
		'bridge'  => K86_BRIDGE_AVAILABLE,
	)
);

/*
|--------------------------------------------------------------------------
| End Of Loader
|--------------------------------------------------------------------------
*/

return true;

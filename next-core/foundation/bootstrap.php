<?php
/**
 * K86 Pro Next Core
 * Bootstrap
 *
 * @package K86Pro
 * @since 1.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Bootstrap' ) ) {

	class K86_Bootstrap {

		/**
		 * Bootstrap framework.
		 *
		 * @return K86_Registry|null
		 */
		public function boot() {

			// Load Loader class.
			if ( ! class_exists( 'K86_Loader' ) ) {

				$loader_file = dirname( __FILE__ ) . '/loader.php';

				if ( file_exists( $loader_file ) ) {
					require_once $loader_file;
				}
			}

			if ( ! class_exists( 'K86_Loader' ) ) {
				return null;
			}

			// Load framework.
			$loader = new K86_Loader();
			$loader->load();

			// Verify core classes.
			if (
				! class_exists( 'K86_Registry' ) ||
				! class_exists( 'K86_Container' ) ||
				! class_exists( 'K86_Engine_Manager' ) ||
				! class_exists( 'K86_Service_Provider' )
			) {
				return null;
			}

			// Create core objects.
			$registry  = new K86_Registry();
			$container = new K86_Container();
			$manager   = new K86_Engine_Manager();
			$registry->set( 'container', $container );
$registry->set( 'engine_manager', $manager );

			// Register framework services.
			$provider = new K86_Service_Provider();
			$provider->register( $container, $manager );
			$provider->boot();

			$services = array(
				'container'       => $container,
				'engine_manager'  => $manager,
				'config'          => 'config',
				'registry'        => 'registry',
				'helpers'         => 'helpers',
				'logger'          => 'logger',
				'event_manager'   => 'event_manager',
				'error_handler'   => 'error_handler',
				'product_service' => 'product_service',
				'health_check'    => 'health_check',
				'module_registry' => 'module_registry',
				'wordpress_hooks' => 'wordpress_hooks',
			);

			foreach ( $services as $key => $service ) {

				if ( is_object( $service ) ) {
					$registry->set( $key, $service );
					continue;
				}

				if (
					method_exists( $container, 'has' ) &&
					$container->has( $service )
				) {
					$registry->set( $key, $container->get( $service ) );
					continue;
				}

				if ( method_exists( $container, 'get' ) ) {

					$value = $container->get( $service );

					if ( null !== $value ) {
						$registry->set( $key, $value );
					}
				}
			}

			if ( $registry->has( 'module_registry' ) ) {

				$module_registry = $registry->get( 'module_registry' );

				if ( method_exists( $module_registry, 'boot' ) ) {
					$module_registry->boot();
				}
			}

			if ( $registry->has( 'wordpress_hooks' ) ) {

				$wp_hooks = $registry->get( 'wordpress_hooks' );

				if ( method_exists( $wp_hooks, 'boot' ) ) {
					$wp_hooks->boot();
				}
			}

			do_action( 'k86_next_core_booted', $registry );

			return $registry;
		}
	}

}

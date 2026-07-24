<?php
/**
 * K86 Pro Next Core
 * Bootstrap
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Bootstrap' ) ) {

	class K86_Bootstrap {

		/**
		 * Bootstrap framework.
		 *
		 * @return K86_Registry
		 */
		public function boot() {

			// Load framework.
			$loader = new K86_Loader();
			$loader->load();

			// Create core objects.
			$registry  = new K86_Registry();
			$container = new K86_Container();
			$manager   = new K86_Engine_Manager();

			// Register framework services.
			$provider = new K86_Service_Provider();
			$provider->register( $container, $manager );
			$provider->boot();

			// Shared services.
			$services = array(

				// Core.
				'container'       => $container,
				'engine_manager'  => $manager,

				// Foundation.
				'config'          => 'config',
				'registry'        => 'registry',
				'helpers'         => 'helpers',
				'logger'          => 'logger',
				'event_manager'   => 'event_manager',
				'error_handler'   => 'error_handler',

				// Services.
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

					$registry->set(
						$key,
						$container->get( $service )
					);

					continue;
				}

				if ( method_exists( $container, 'get' ) ) {

					$value = $container->get( $service );

					if ( null !== $value ) {
						$registry->set( $key, $value );
					}
				}
			}

			// Boot Module Registry.
			if ( $registry->has( 'module_registry' ) ) {

				$module_registry = $registry->get( 'module_registry' );

				if ( method_exists( $module_registry, 'boot' ) ) {
					$module_registry->boot();
				}
			}

			// Boot WordPress Hooks.
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

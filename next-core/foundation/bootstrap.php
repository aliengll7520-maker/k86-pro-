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

			// Shared services.
			$services = array(
				'container'         => $container,
				'engine_manager'    => $manager,
				'product_service'   => 'product_service',
				'health_check'      => 'health_check',
				'module_registry'   => 'module_registry',
				'wordpress_hooks'   => 'wordpress_hooks',
				'event_dispatcher'  => 'event_dispatcher',
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

			return $registry;

		}

	}

}

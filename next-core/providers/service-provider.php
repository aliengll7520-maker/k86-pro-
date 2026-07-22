<?php
/**
 * K86 Pro Next Core
 * Service Provider
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Service_Provider' ) ) {

	class K86_Service_Provider {

		/**
		 * Register services.
		 *
		 * @param K86_Container      $container Container.
		 * @param K86_Engine_Manager $manager   Engine manager.
		 *
		 * @return void
		 */
		public static function register(
			K86_Container $container,
			K86_Engine_Manager $manager
		) {

			/**
			 * Foundation Services
			 */

			$container->singleton(
				'loader',
				fn() => new K86_Loader()
			);

			$container->singleton(
				'registry',
				fn() => new K86_Registry()
			);

			/**
			 * Engine Services
			 */

			$container->singleton(
				'engine_manager',
				fn() => $manager
			);

			/**
			 * Core Services
			 */

			$container->singleton(
				'product_repository',
				fn() => new K86_Product_Repository()
			);
			$container->singleton(
    'product_manager',
    fn() => new K86_Product_Manager()
);

			$container->singleton(
				'product_service',
				fn() => new K86_Product_Service(
					$manager,
					$container->get( 'product_repository' )
				)
			);
						/**
			 * Bootstrap Services
			 */

			$container->singleton(
				'bootstrap',
				fn() => new K86_Bootstrap(
					$container,
					$manager
				)
			);

		}

	}

}

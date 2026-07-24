<?php
/**
 * K86 Pro Next Core Loader
 *
 * @package K86Pro
 * @since 1.6.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Loader' ) ) {

	class K86_Loader {

		/**
		 * Base path of Next Core.
		 *
		 * @var string
		 */
		protected $base_path;

		/**
		 * Constructor.
		 */
		public function __construct() {
			$this->base_path = dirname( __DIR__ );
		}

		/**
		 * Require a file if it exists.
		 *
		 * @param string $file File path.
		 * @return void
		 */
		protected function require_file( $file ) {

			if ( is_string( $file ) && is_file( $file ) ) {
				require_once $file;
			}
		}

		/**
		 * Require all PHP files in a directory.
		 *
		 * @param string $directory Directory path.
		 * @param array  $exclude   Excluded filenames.
		 * @return void
		 */
		protected function require_directory( $directory, array $exclude = array() ) {

			if ( ! is_dir( $directory ) ) {
				return;
			}

			$files = glob( $directory . '/*.php' );

			if ( empty( $files ) ) {
				return;
			}

			sort( $files, SORT_STRING );

			foreach ( $files as $file ) {

				if ( in_array( basename( $file ), $exclude, true ) ) {
					continue;
				}

				$this->require_file( $file );
			}
		}

		/**
		 * Load Next Core framework.
		 *
		 * @return void
		 */
		public function load() {

			// Foundation.
			$this->require_file( $this->base_path . '/foundation/registry.php' );
			$this->require_file( $this->base_path . '/foundation/container.php' );

			// Data.
			$this->require_directory( $this->base_path . '/data' );

			// Engine core.
			$this->require_file( $this->base_path . '/engine/engine-base.php' );
			$this->require_file( $this->base_path . '/engine/engine-manager.php' );

			// Remaining engines.
			$this->require_directory(
				$this->base_path . '/engine',
				array(
					'engine-base.php',
					'engine-manager.php',
				)
			);

			// Kernel.
			$this->require_directory( $this->base_path . '/kernel' );

			// Framework layers.
			$this->require_directory( $this->base_path . '/repositories' );
			$this->require_directory( $this->base_path . '/managers' );
			$this->require_directory( $this->base_path . '/services' );
			$this->require_directory( $this->base_path . '/providers' );
			$this->require_directory( $this->base_path . '/support' );
			$this->require_directory( $this->base_path . '/render' );
			$this->require_directory( $this->base_path . '/ui' );
			$this->require_directory( $this->base_path . '/modules' );
			$this->require_directory( $this->base_path . '/compatibility' );
			$this->require_directory( $this->base_path . '/frontend' );
		}
	}

}

<?php
/**
 * K86 Pro Next Core
 * WordPress Hooks
 *
 * Bridge between WordPress lifecycle and Next Core.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_WordPress_Hooks' ) ) {

	class K86_WordPress_Hooks {

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->register_hooks();

		}

		/**
		 * Register WordPress hooks.
		 *
		 * @return void
		 */
		protected function register_hooks() {

			add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
			add_action( 'init', array( $this, 'init' ) );
			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'wp_loaded', array( $this, 'wp_loaded' ) );

		}

		/**
		 * WordPress plugins_loaded.
		 *
		 * @return void
		 */
		public function plugins_loaded() {

			do_action( 'k86/core/plugins_loaded' );

		}

		/**
		 * WordPress init.
		 *
		 * @return void
		 */
		public function init() {

			do_action( 'k86/core/init' );

		}

		/**
		 * WordPress admin_init.
		 *
		 * @return void
		 */
		public function admin_init() {

			do_action( 'k86/core/admin_init' );

		}

		/**
		 * WordPress wp_loaded.
		 *
		 * @return void
		 */
		public function wp_loaded() {

			do_action( 'k86/core/wp_loaded' );

		}

	}

}

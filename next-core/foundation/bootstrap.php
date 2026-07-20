<?php
/**
 * K86 Pro Next Core
 *
 * Foundation Bootstrap
 *
 * Khởi tạo toàn bộ Foundation của Framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Bootstrap' ) ) {

	class K86_Bootstrap {

		/**
		 * Loader.
		 *
		 * @var K86_Loader|null
		 */
		protected $loader = null;

		/**
		 * Khởi tạo Bootstrap.
		 *
		 * @return void
		 */
		public function init() {

			$this->loader = null;

		}

		/**
		 * Thiết lập Loader.
		 *
		 * @param K86_Loader $loader Đối tượng Loader.
		 * @return void
		 */
		public function set_loader( $loader ) {

			$this->loader = $loader;

		}

		/**
		 * Khởi động Foundation.
		 *
		 * @return void
		 */
		public function boot() {

			if ( $this->loader instanceof K86_Loader ) {
				$this->loader->load();
			}

		}

	}

}

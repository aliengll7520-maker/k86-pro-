<?php
/**
 * K86 Pro Next Core
 *
 * Product Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Engine' ) ) {

	class K86_Product_Engine extends K86_Engine_Base {

		/**
		 * Khởi tạo Product Engine.
		 */
		public function init() {
			parent::init();
		}

		/**
		 * Nạp sản phẩm từ Repository.
		 */
		public function load( $id ) {

			if ( ! class_exists( 'K86_Product_Repository' ) ) {
				return null;
			}

			$repository = new K86_Product_Repository();

			return $repository->find( $id );
		}

		/**
		 * Lưu sản phẩm.
		 */
		public function save( K86_Product_Model $product ) {

			if ( ! class_exists( 'K86_Product_Repository' ) ) {
				return false;
			}

			$repository = new K86_Product_Repository();

			return $repository->save( $product );
		}

		/**
		 * Xóa sản phẩm.
		 */
		public function delete( $id ) {

			if ( ! class_exists( 'K86_Product_Repository' ) ) {
				return false;
			}

			$repository = new K86_Product_Repository();

			return $repository->delete( $id );
		}

		/**
		 * Làm mới cache.
		 */
		public function refresh_cache( $key ) {

			if ( class_exists( 'K86_Cache' ) ) {
				K86_Cache::delete( $key );
			}
		}
	}

}

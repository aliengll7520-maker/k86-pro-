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

	class K86_Product_Engine {

		/**
		 * Danh sách sản phẩm.
		 *
		 * @var array
		 */
		protected $products = array();

		/**
		 * Khởi tạo.
		 */
		public function init() {
			$this->products = array();
		}

		/**
		 * Đăng ký sản phẩm.
		 */
		public function register( $key, $product ) {
			$this->products[ $key ] = $product;
		}

		/**
		 * Kiểm tra tồn tại.
		 */
		public function has( $key ) {
			return array_key_exists( $key, $this->products );
		}

		/**
		 * Lấy sản phẩm.
		 */
		public function get( $key, $default = null ) {

			if ( $this->has( $key ) ) {
				return $this->products[ $key ];
			}

			return $default;
		}

		/**
		 * Lấy toàn bộ sản phẩm.
		 */
		public function all() {
			return $this->products;
		}

		/**
		 * Xóa một sản phẩm.
		 */
		public function remove( $key ) {

			if ( $this->has( $key ) ) {
				unset( $this->products[ $key ] );
				return true;
			}

			return false;
		}

		/**
		 * Xóa toàn bộ.
		 */
		public function clear() {
			$this->products = array();
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

<?php
/**
 * K86 Pro Next Core
 *
 * Product Engine
 *
 * Engine quản lý sản phẩm của Framework.
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
		 * Khởi tạo Product Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->products = array();

		}

		/**
		 * Đăng ký sản phẩm.
		 *
		 * @param string $key
		 * @param mixed  $product
		 * @return void
		 */
		public function register( $key, $product ) {

			$this->products[ $key ] = $product;

		}

		/**
		 * Lấy sản phẩm.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->products ) ) {
				return $this->products[ $key ];
			}

			return $default;

		}

	}

}

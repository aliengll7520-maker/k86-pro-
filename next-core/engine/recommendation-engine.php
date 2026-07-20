<?php
/**
 * K86 Pro Next Core
 *
 * Recommendation Engine
 *
 * Engine quản lý hệ thống gợi ý.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Recommendation_Engine' ) ) {

	class K86_Recommendation_Engine {

		/**
		 * Danh sách bộ gợi ý.
		 *
		 * @var array
		 */
		protected $recommenders = array();

		/**
		 * Khởi tạo Recommendation Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->recommenders = array();

		}

		/**
		 * Đăng ký bộ gợi ý.
		 *
		 * @param string $key
		 * @param mixed  $recommender
		 * @return void
		 */
		public function register( $key, $recommender ) {

			$this->recommenders[ $key ] = $recommender;

		}

		/**
		 * Lấy bộ gợi ý.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->recommenders ) ) {
				return $this->recommenders[ $key ];
			}

			return $default;

		}

	}

}

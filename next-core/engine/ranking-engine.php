<?php
/**
 * K86 Pro Next Core
 *
 * Ranking Engine
 *
 * Engine quản lý hệ thống xếp hạng.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Ranking_Engine' ) ) {

	class K86_Ranking_Engine {

		/**
		 * Danh sách bộ xếp hạng.
		 *
		 * @var array
		 */
		protected $rankers = array();

		/**
		 * Khởi tạo Ranking Engine.
		 *
		 * @return void
		 */
		public function init() {

			$this->rankers = array();

		}

		/**
		 * Đăng ký bộ xếp hạng.
		 *
		 * @param string $key
		 * @param mixed  $ranker
		 * @return void
		 */
		public function register( $key, $ranker ) {

			$this->rankers[ $key ] = $ranker;

		}

		/**
		 * Lấy bộ xếp hạng.
		 *
		 * @param string $key
		 * @param mixed  $default
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			if ( array_key_exists( $key, $this->rankers ) ) {
				return $this->rankers[ $key ];
			}

			return $default;

		}

	}

}

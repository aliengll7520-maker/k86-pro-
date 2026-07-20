<?php
/**
 * K86 Pro Next Core
 *
 * Template Manager
 *
 * Quản lý các Template của UI System.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Template_Manager' ) ) {

	class K86_Template_Manager {

		/**
		 * Danh sách Template.
		 *
		 * @var array
		 */
		protected $templates = array();

		/**
		 * Template mặc định.
		 *
		 * @var string
		 */
		protected $default_template = '';

		/**
		 * Khởi tạo.
		 *
		 * @return void
		 */
		public function init() {

			$this->templates = array();
			$this->default_template = '';

		}

		/**
		 * Đăng ký Template.
		 *
		 * @param string $key
		 * @param array  $template
		 * @return void
		 */
		public function register( $key, $template ) {

			$this->templates[ $key ] = $template;

		}

		/**
		 * Lấy Template.
		 *
		 * @param string $key
		 * @return array|null
		 */
		public function get( $key ) {

			if ( isset( $this->templates[ $key ] ) ) {
				return $this->templates[ $key ];
			}

			return null;

		}

		/**
		 * Thiết lập Template mặc định.
		 *
		 * @param string $key
		 * @return void
		 */
		public function set_default( $key ) {

			if ( isset( $this->templates[ $key ] ) ) {
				$this->default_template = $key;
			}

		}

		/**
		 * Lấy Template mặc định.
		 *
		 * @return string
		 */
		public function get_default() {

			return $this->default_template;

		}

	}
}

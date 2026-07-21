<?php
/**
 * K86 Pro Next Core
 * Layout Manager
 *
 * Quản lý các Layout của Product UI.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Layout_Manager' ) ) {

	class K86_Layout_Manager {

		/**
		 * Layout hiện tại.
		 *
		 * @var string
		 */
		protected $layout = 'default';

		/**
		 * Danh sách Layout.
		 *
		 * @var array
		 */
		protected $layouts = array();

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->register_default_layouts();

		}

		/**
		 * Đăng ký Layout mặc định.
		 *
		 * @return void
		 */
		protected function register_default_layouts() {

			$this->layouts = array(

				'default' => array(
					'header',
					'main',
					'sidebar',
					'footer',
				),

				'compact' => array(
					'header',
					'main',
				),

				'review' => array(
					'header',
					'main',
					'sidebar',
					'footer',
				),

				'landing' => array(
					'header',
					'main',
					'footer',
				),

				'mobile' => array(
					'main',
				),

			);

		}

		/**
		 * Chọn Layout.
		 *
		 * @param string $layout Layout name.
		 *
		 * @return void
		 */
		public function set_layout( $layout ) {

			if ( isset( $this->layouts[ $layout ] ) ) {
				$this->layout = $layout;
			}

		}

		/**
		 * Lấy tên Layout hiện tại.
		 *
		 * @return string
		 */
		public function get_layout() {

			return $this->layout;

		}

		/**
		 * Lấy Sections của Layout hiện tại.
		 *
		 * @return array
		 */
		public function get_sections() {

			return $this->layouts[ $this->layout ];

		}

		/**
		 * Lấy toàn bộ Layout.
		 *
		 * @return array
		 */
		public function get_layouts() {

			return $this->layouts;

		}

		/**
		 * Đăng ký Layout mới.
		 *
		 * @param string $name Layout name.
		 * @param array  $sections Sections.
		 *
		 * @return void
		 */
		public function register_layout(
			$name,
			array $sections
		) {

			$this->layouts[ $name ] = $sections;

		}

	}
}

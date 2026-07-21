<?php
/**
 * K86 Pro Next Core
 * Section Manager
 *
 * Quản lý các Section trong từng Layout.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Section_Manager' ) ) {

	class K86_Section_Manager {

		/**
		 * Danh sách Section.
		 *
		 * @var array
		 */
		protected $sections = array();

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->register_default_sections();

		}

		/**
		 * Đăng ký Section mặc định.
		 *
		 * @return void
		 */
		protected function register_default_sections() {

			$this->sections = array(

				'header' => array(),

				'main' => array(),

				'sidebar' => array(),

				'footer' => array(),

			);

		}

		/**
		 * Đăng ký Section.
		 *
		 * @param string $name Section name.
		 * @param array  $slots Slot list.
		 *
		 * @return void
		 */
		public function register_section(
			$name,
			array $slots = array()
		) {

			$this->sections[ $name ] = $slots;

		}

		

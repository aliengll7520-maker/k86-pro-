<?php
/**
 * K86 Pro Next Core
 * Template Manager
 *
 * Quản lý Product Templates.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Template_Manager' ) ) {

	class K86_Template_Manager {

		/**
		 * Template hiện tại.
		 *
		 * @var string
		 */
		protected $template = 'default';

		/**
		 * Danh sách Template.
		 *
		 * @var array
		 */
		protected $templates = array();

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->register_default_templates();

		}

		/**
		 * Đăng ký Template mặc định.
		 *
		 * @return void
		 */
		protected function register_default_templates() {

			$this->templates = array(

				'default' => array(
					'layout' => 'default',
					'label'  => 'Default',
				),

				'review' => array(
					'layout' => 'review',
					'label'  => 'Review',
				),

				'compact' => array(
					'layout' => 'compact',
					'label'  => 'Compact',
				),

				'landing' => array(
					'layout' => 'landing',
					'label'  => 'Landing',
				),

				'mobile' => array(
					'layout' => 'mobile',
					'label'  => 'Mobile',
				),

			);

		}

		/**
		 * Chọn Template.
		 *
		 * @param string $template Template name.
		 *
		 * @return void
		 */
		public function set_template( $template ) {

			if ( isset( $this->templates[ $template ] ) ) {
				$this->template = $template;
			}

		}

		/**
		 * Lấy Template hiện tại.
		 *
		 * @return string
		 */
		public function get_template() {

			return $this->template;

		}

		/**
		 * Lấy Layout của Template.
		 *
		 * @return string
		 */
		public function get_layout() {

			return $this->templates[ $this->template ]['layout'];

		}

		/**
		 * Lấy toàn bộ Template.
		 *
		 * @return array
		 */
		public function get_templates() {

			return $this->templates;

		}

		/**
		 * Đăng ký Template mới.
		 *
		 * @param string $name Template name.
		 * @param array  $config Template config.
		 *
		

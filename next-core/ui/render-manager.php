<?php
/**
 * K86 Pro Next Core
 *
 * Render Manager
 *
 * Điều phối quá trình render giao diện.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Render_Manager' ) ) {

	class K86_Render_Manager {

		/**
		 * Dữ liệu render.
		 *
		 * @var array
		 */
		protected $data = array();

		/**
		 * Render Context.
		 *
		 * @var K86_Render_Context|null
		 */
		protected $context = null;
		protected $media_manager = null;

		/**
		 * HTML Builder.
		 *
		 * @var K86_HTML_Builder|null
		 */
		protected $builder = null;

		/**
		 * Khởi tạo.
		 */
		public function __construct() {

			$this->init();

		}

		/**
		 * Khởi tạo.
		 *
		 * @return void
		 */
		public function init() {

			$this->data = array();

			if ( class_exists( 'K86_Render_Context' ) ) {
				$this->context = new K86_Render_Context();
			}

			if ( class_exists( 'K86_HTML_Builder' ) ) {
				$this->builder = new K86_HTML_Builder(
					$this->context
				);
			}

		}

		/**
		 * Thiết lập dữ liệu.
		 *
		 * @param array $data Dữ liệu render.
		 *
		 * @return void
		 */
		public function set_data( array $data ) {

			$this->data = $data;

		}

		/**
		 * Lấy dữ liệu.
		 *
		 * @return array
		 */
		public function get_data() {

			return $this->data;

		}

		/**
		 * Lấy Render Context.
		 *
		 * @return K86_Render_Context|null
		 */
		public function get_context() {

			return $this->context;

		}

		/**
		 * Lấy HTML Builder.
		 *
		 * @return K86_HTML_Builder|null
		 */
		public function get_builder() {

			return $this->builder;

		}

		/**
		 * Render giao diện.
		 *
		 * @return string
		 */
		public function render() {

			if ( ! $this->context || ! $this->builder ) {
				$this->init();
			}

			if ( ! $this->context || ! $this->builder ) {
				return '';
			}

			if ( method_exists( $this->context, 'replace' ) ) {
				$this->context->replace( $this->data );
			}

			if ( method_exists( $this->builder, 'build' ) ) {
				return $this->builder->build();
			}

			if ( method_exists( $this->builder, 'render' ) ) {
				return $this->builder->render();
			}

			return '';

		}

	}

}

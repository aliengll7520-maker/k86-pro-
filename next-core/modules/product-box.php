<?php
/**
 * K86 Pro Next Core
 * Product Box Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Box_Module' ) ) {

	class K86_Product_Box_Module {

		/**
		 * Product Service.
		 *
		 * @var K86_Product_Service
		 */
		protected $service;

		/**
		 * Product Renderer.
		 *
		 * @var K86_Product_Renderer
		 */
		protected $renderer;

		/**
		 * Constructor.
		 *
		 * @param K86_Product_Service  $service  Product service.
		 * @param K86_Product_Renderer $renderer Product renderer.
		 */
		public function __construct(
			K86_Product_Service $service,
			K86_Product_Renderer $renderer
		) {

			$this->service  = $service;
			$this->renderer = $renderer;

		}

		/**
		 * Render Product Box.
		 *
		 * Nếu truyền dữ liệu sản phẩm thì render trực tiếp.
		 * Nếu không truyền thì Product Renderer sẽ tự lấy
		 * dữ liệu từ Product Service.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			return $this->renderer->render( $product );

		}

	}
}

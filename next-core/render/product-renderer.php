<?php
/**
 * K86 Pro Next Core
 * Product Renderer
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Renderer' ) ) {

	class K86_Product_Renderer {

		/**
		 * Product Service.
		 *
		 * @var K86_Product_Service
		 */
		protected $service;

		/**
		 * Module Registry.
		 *
		 * @var K86_Module_Registry|null
		 */
		protected $registry;

		/**
		 * Render Pipeline.
		 *
		 * @var K86_Render_Pipeline|null
		 */
		protected $pipeline;

		/**
		 * Render Manager.
		 *
		 * @var K86_Render_Manager|null
		 */
		protected $render_manager;

		/**
		 * Constructor.
		 *
		 * @param K86_Product_Service      $service        Product service.
		 * @param K86_Module_Registry|null $registry       Module registry.
		 * @param K86_Render_Pipeline|null $pipeline       Render pipeline.
		 * @param K86_Render_Manager|null  $render_manager Render manager.
		 */
		public function __construct(
			K86_Product_Service $service,
			K86_Module_Registry $registry = null,
			K86_Render_Pipeline $pipeline = null,
			K86_Render_Manager $render_manager = null
		) {

			$this->service        = $service;
			$this->registry       = $registry;
			$this->pipeline       = $pipeline;
			$this->render_manager = $render_manager;

		}

		/**
		 * Render Product Box.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			/*
			 * Lấy dữ liệu sản phẩm.
			 */
			if ( empty( $product ) ) {

				if ( method_exists( $this->service, 'get_product_data' ) ) {

					$product = $this->service->get_product_data();

				} else {

					$product = array(
						'price'    => $this->service->get_current_price(),
						'in_stock' => $this->service->is_in_stock(),
					);

				}

			}

			if ( ! is_array( $product ) ) {
				$product = array();
			}
						/*
			 * Xây dựng Render Pipeline.
			 */
			$pipeline = null;

			if (
				$this->pipeline instanceof K86_Render_Pipeline &&
				method_exists( $this->pipeline, 'build' )
			) {

				$pipeline = $this->pipeline->build();

			}

			/*
			 * Ưu tiên Render Manager (Next Core).
			 */
			if ( $this->render_manager instanceof K86_Render_Manager ) {

				$this->render_manager->set_data(
					array(
						'product'  => $product,
						'pipeline' => $pipeline,
					)
				);

				return $this->render_manager->render();

			}

			/*
			 * Registry V2 (tương thích ngược).
			 */
			if (
				$this->registry instanceof K86_Module_Registry &&
				method_exists( $this->registry, 'render_pipeline' ) &&
				$pipeline
			) {

				return $this->registry->render_pipeline(
					$pipeline,
					$product
				);

			}
						/*
			 * Registry hiện tại (tương thích ngược).
			 */
			if (
				$this->registry instanceof K86_Module_Registry &&
				! $this->registry->is_empty()
			) {

				return $this->registry->render_all( $product );

			}

			/*
 * Fallback.
 */
ob_start();

$product = is_array( $product ) ? $product : array();

require __DIR__ . '/product-layout.php';

return ob_get_clean();
					}

	}

		);

	}
	}

}

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
		 * Constructor.
		 *
		 * @param K86_Product_Service        $service  Product service.
		 * @param K86_Module_Registry|null   $registry Module registry.
		 * @param K86_Render_Pipeline|null   $pipeline Render pipeline.
		 */
		public function __construct(
			K86_Product_Service $service,
			K86_Module_Registry $registry = null,
			K86_Render_Pipeline $pipeline = null
		) {

			$this->service  = $service;
			$this->registry = $registry;
			$this->pipeline = $pipeline;

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
			 * Registry V2 (tương lai).
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
			 * Registry hiện tại.
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
			?>

			<div class="k86-product-box">

				<div class="k86-product-price">

					<?php echo esc_html( $product['price'] ?? '' ); ?>

				</div>

				<div class="k86-product-stock">

					<?php
					echo ! empty( $product['in_stock'] )
						? esc_html__( 'Còn hàng', 'k86-pro' )
						: esc_html__( 'Hết hàng', 'k86-pro' );
					?>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

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
		 * Constructor.
		 *
		 * @param K86_Product_Service      $service  Product service.
		 * @param K86_Module_Registry|null $registry Module registry.
		 */
		public function __construct(
			K86_Product_Service $service,
			K86_Module_Registry $registry = null
		) {

			$this->service  = $service;
			$this->registry = $registry;

		}

		/**
		 * Render Product Box.
		 *
		 * @return string
		 */
		public function render() {

			/*
			 * Lấy toàn bộ dữ liệu sản phẩm.
			 * Nếu Product Service chưa hỗ trợ thì fallback.
			 */
			if ( method_exists( $this->service, 'get_product_data' ) ) {

				$product = $this->service->get_product_data();

			} else {

				$product = array(
					'price'     => $this->service->get_current_price(),
					'in_stock'  => $this->service->is_in_stock(),
				);

			}

			if ( ! is_array( $product ) ) {
				$product = array();
			}

			/*
			 * Render bằng Module Registry.
			 */
			if (
				$this->registry instanceof K86_Module_Registry &&
				! $this->registry->is_empty()
			) {
				return $this->registry->render_all( $product );
			}

			/*
			 * Fallback cho phiên bản cũ.
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

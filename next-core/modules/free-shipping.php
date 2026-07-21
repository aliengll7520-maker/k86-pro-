<?php
/**
 * K86 Pro Next Core
 *
 * Free Shipping Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Free_Shipping_Module' ) ) {

	class K86_Free_Shipping_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 110;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$shipping = array();

			if (
				isset( $product['free_shipping'] ) &&
				is_array( $product['free_shipping'] )
			) {
				$shipping = $product['free_shipping'];
			}

			$enabled = ! empty( $shipping['enabled'] );
			$message = $shipping['message'] ?? '';

			ob_start();
			?>

			<div class="k86-product-free-shipping">

				<?php if ( $enabled ) : ?>

					<div class="k86-free-shipping-box">

						<span class="k86-free-shipping-icon">🚚</span>

						<span class="k86-free-shipping-text">

							<?php
							echo esc_html(
								! empty( $message )
									? $message
									: __( 'Free shipping available.', 'k86-pro' )
							);
							?>

						</span>

					</div>

				<?php else : ?>

					<div class="k86-free-shipping-placeholder">
						Free shipping unavailable.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

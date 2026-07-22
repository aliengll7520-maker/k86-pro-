<?php
/**
 * K86 Pro Next Core
 *
 * Product Shipping Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Shipping_Module' ) ) {

	class K86_Product_Shipping_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 110;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$shipping = ! empty( $product['shipping'] ) && is_array( $product['shipping'] )
				? $product['shipping']
				: array();

			if ( empty( $shipping ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-shipping">

				<h3>🚚 Thông tin giao hàng</h3>

				<ul class="k86-shipping-list">

					<?php foreach ( $shipping as $item ) : ?>

						<li><?php echo esc_html( $item ); ?></li>

					<?php endforeach; ?>

				</ul>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

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
		 * Render shipping information.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$title = ! empty( $product['shipping_title'] )
				? sanitize_text_field( $product['shipping_title'] )
				: __( 'Thông tin vận chuyển', 'k86-pro' );

			$items = ! empty( $product['shipping'] ) && is_array( $product['shipping'] )
				? $product['shipping']
				: array();

			if ( empty( $items ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-shipping">

				<h3 class="k86-shipping-title">
					<?php echo esc_html( $title ); ?>
				</h3>

				<ul class="k86-shipping-list">

					<?php foreach ( $items as $item ) : ?>

						<li class="k86-shipping-item">
							✔ <?php echo esc_html( $item ); ?>
						</li>

					<?php endforeach; ?>

				</ul>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

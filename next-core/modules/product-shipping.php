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
		 * Get shipping items.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		protected function get_shipping_items( array $product ) {

			if ( ! empty( $product['shipping'] ) && is_array( $product['shipping'] ) ) {
				return $product['shipping'];
			}

			return array();

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

			$items = $this->get_shipping_items( $product );

			if ( empty( $items ) ) {
				return '';
			}

			$carrier = ! empty( $product['shipping_carrier'] )
				? sanitize_text_field( $product['shipping_carrier'] )
				: '';

			$tracking = ! empty( $product['tracking_number'] )
				? sanitize_text_field( $product['tracking_number'] )
				: '';

			$estimate = ! empty( $product['shipping_estimate'] )
				? sanitize_text_field( $product['shipping_estimate'] )
				: '';

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

				<?php if ( $carrier ) : ?>

					<div class="k86-shipping-carrier">
						<strong><?php esc_html_e( 'Đơn vị vận chuyển:', 'k86-pro' ); ?></strong>
						<?php echo esc_html( $carrier ); ?>
					</div>

				<?php endif; ?>

				<?php if ( $estimate ) : ?>

					<div class="k86-shipping-estimate">
						<strong><?php esc_html_e( 'Dự kiến giao:', 'k86-pro' ); ?></strong>
						<?php echo esc_html( $estimate ); ?>
					</div>

				<?php endif; ?>

				<?php if ( $tracking ) : ?>

					<div class="k86-shipping-tracking">
						<strong><?php esc_html_e( 'Mã vận đơn:', 'k86-pro' ); ?></strong>
						<?php echo esc_html( $tracking ); ?>
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

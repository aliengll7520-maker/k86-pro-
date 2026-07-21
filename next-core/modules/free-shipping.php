<?php
/**
 * K86 Pro Next Core
 * Free Shipping Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Free_Shipping_Module' ) ) {

	class K86_Free_Shipping_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 110;

		}

		/**
		 * Render free shipping.
		 *
		 * @param array $product Product data.
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

			/*
			 * Current fields
			 */
			$enabled = ! empty( $shipping['enabled'] );
			$message = $shipping['message'] ?? '';

			/*
			 * Future fields
			 */
			$title              = $shipping['title'] ?? '';
			$subtitle           = $shipping['subtitle'] ?? '';
			$description        = $shipping['description'] ?? '';

			$is_free            = isset( $shipping['is_free'] )
				? (bool) $shipping['is_free']
				: $enabled;

			$fee                = $shipping['fee'] ?? '';
			$currency           = $shipping['currency'] ?? 'VND';

			$minimum_order      = isset( $shipping['minimum_order'] )
				? (float) $shipping['minimum_order']
				: 0;

			$estimated_delivery = $shipping['estimated_delivery'] ?? '';
			$delivery_from      = $shipping['delivery_from'] ?? '';
			$delivery_to        = $shipping['delivery_to'] ?? '';

			$carrier            = $shipping['carrier'] ?? '';
			$carrier_logo       = $shipping['carrier_logo'] ?? '';

			$shipping_method    = $shipping['shipping_method'] ?? '';
			$shipping_zone      = $shipping['shipping_zone'] ?? '';

			$tracking_supported = ! empty( $shipping['tracking_supported'] );

			$status             = $shipping['status'] ?? '';
			$icon               = $shipping['icon'] ?? '🚚';
			$badge              = $shipping['badge'] ?? '';
			$css_class          = $shipping['css_class'] ?? '';

			$attributes = isset( $shipping['attributes'] ) && is_array( $shipping['attributes'] )
				? $shipping['attributes']
				: array();

			ob_start();
			?>

			<div class="k86-product-free-shipping <?php echo esc_attr( $css_class ); ?>">

				<?php if ( $enabled ) : ?>

					<div
						class="k86-free-shipping-box"
						data-carrier="<?php echo esc_attr( $carrier ); ?>"
						data-method="<?php echo esc_attr( $shipping_method ); ?>"
						data-zone="<?php echo esc_attr( $shipping_zone ); ?>"
					>

						<div class="k86-free-shipping-header">

							<span class="k86-free-shipping-icon">
								<?php echo esc_html( $icon ); ?>
							</span>

							<?php if ( ! empty( $title ) ) : ?>

								<span class="k86-free-shipping-title">
									<?php echo esc_html( $title ); ?>
								</span>

							<?php endif; ?>

							<?php if ( ! empty( $badge ) ) : ?>

								<span class="k86-free-shipping-badge">
									<?php echo esc_html( $badge ); ?>
								</span>

							<?php endif; ?>

						</div>

						<?php if ( ! empty( $subtitle ) ) : ?>

							<div class="k86-free-shipping-subtitle">
								<?php echo esc_html( $subtitle ); ?>
							</div>

						<?php endif; ?>

						<div class="k86-free-shipping-text">

							<?php
							echo esc_html(
								! empty( $message )
									? $message
									: __( 'Miễn phí vận chuyển.', 'k86-pro' )
							);
							?>

						</div>

						<?php if ( ! empty( $description ) ) : ?>

							<div class="k86-free-shipping-description">
								<?php echo esc_html( $description ); ?>
							</div>

						<?php endif; ?>

						<?php if ( $minimum_order > 0 ) : ?>

							<div class="k86-free-shipping-minimum-order">

								<?php
								printf(
									esc_html__( 'Đơn tối thiểu: %1$s %2$s', 'k86-pro' ),
									number_format_i18n( $minimum_order ),
									esc_html( $currency )
								);
								?>

							</div>

						<?php endif; ?>

						<?php if ( ! empty( $estimated_delivery ) ) : ?>

							<div class="k86-free-shipping-delivery">
								<?php echo esc_html( $estimated_delivery ); ?>
							</div>

						<?php endif; ?>

						<?php if ( ! empty( $status ) ) : ?>

							<div class="k86-free-shipping-status">
								<?php echo esc_html( $status ); ?>
							</div>

						<?php endif; ?>

					</div>

				<?php else : ?>

					<div class="k86-free-shipping-placeholder">

						<?php esc_html_e(
							'Sản phẩm hiện chưa hỗ trợ miễn phí vận chuyển.',
							'k86-pro'
						); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

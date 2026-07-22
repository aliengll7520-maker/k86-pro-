<?php
/**
 * K86 Pro Next Core
 *
 * Product Voucher Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Voucher_Module' ) ) {

	class K86_Product_Voucher_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 80;

		}

		/**
		 * Render voucher section.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$title = ! empty( $product['voucher_title'] )
				? sanitize_text_field( $product['voucher_title'] )
				: __( 'Ưu đãi dành cho bạn', 'k86-pro' );

			$vouchers = array();

			if ( ! empty( $product['vouchers'] ) && is_array( $product['vouchers'] ) ) {
				$vouchers = $product['vouchers'];
			}

			if ( empty( $vouchers ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-voucher">

				<h3 class="k86-voucher-title">
					<?php echo esc_html( $title ); ?>
				</h3>

				<div class="k86-voucher-list">

					<?php foreach ( $vouchers as $voucher ) : ?>

						<div class="k86-voucher-item">

							<strong>
								<?php echo esc_html( $voucher['code'] ?? '' ); ?>
							</strong>

							<?php if ( ! empty( $voucher['description'] ) ) : ?>

								<div class="k86-voucher-description">
									<?php echo esc_html( $voucher['description'] ); ?>
								</div>

							<?php endif; ?>

						</div>

					<?php endforeach; ?>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

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
		 * Get vouchers.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		protected function get_vouchers( array $product ) {

			if ( ! empty( $product['vouchers'] ) && is_array( $product['vouchers'] ) ) {
				return $product['vouchers'];
			}

			return array();

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

			$vouchers = $this->get_vouchers( $product );

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

							<div class="k86-voucher-code">
								<strong><?php echo esc_html( $voucher['code'] ?? '' ); ?></strong>
							</div>

							<?php if ( ! empty( $voucher['discount'] ) ) : ?>

								<div class="k86-voucher-discount">
									<?php echo esc_html( $voucher['discount'] ); ?>
								</div>

							<?php endif; ?>

							<?php if ( ! empty( $voucher['description'] ) ) : ?>

								<div class="k86-voucher-description">
									<?php echo esc_html( $voucher['description'] ); ?>
								</div>

							<?php endif; ?>

							<?php if ( ! empty( $voucher['expiry'] ) ) : ?>

								<div class="k86-voucher-expiry">
									<?php
									printf(
										esc_html__( 'Hết hạn: %s', 'k86-pro' ),
										esc_html( $voucher['expiry'] )
									);
									?>
								</div>

							<?php endif; ?>

							<button
								type="button"
								class="k86-copy-voucher"
								data-code="<?php echo esc_attr( $voucher['code'] ?? '' ); ?>">

								<?php esc_html_e( 'Sao chép mã', 'k86-pro' ); ?>

							</button>

						</div>

					<?php endforeach; ?>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

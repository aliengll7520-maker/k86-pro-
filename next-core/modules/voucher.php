<?php
/**
 * K86 Pro Next Core
 *
 * Voucher Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Voucher_Module' ) ) {

	class K86_Voucher_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 80;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$voucher = array();

			if (
				isset( $product['voucher'] ) &&
				is_array( $product['voucher'] )
			) {
				$voucher = $product['voucher'];
			}

			$code = $voucher['code'] ?? '';
			$text = $voucher['text'] ?? '';

			ob_start();
			?>

			<div class="k86-product-voucher">

				<?php if ( ! empty( $voucher ) ) : ?>

					<div class="k86-voucher-box">

						<?php if ( ! empty( $text ) ) : ?>

							<div class="k86-voucher-text">
								<?php echo esc_html( $text ); ?>
							</div>

						<?php endif; ?>

						<?php if ( ! empty( $code ) ) : ?>

							<div class="k86-voucher-code">
								<?php echo esc_html( $code ); ?>
							</div>

						<?php endif; ?>

					</div>

				<?php else : ?>

					<div class="k86-voucher-placeholder">
						No voucher available.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

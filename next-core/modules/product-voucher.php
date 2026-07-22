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
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$vouchers = array();

			if ( ! empty( $product['vouchers'] ) && is_array( $product['vouchers'] ) ) {
				$vouchers = $product['vouchers'];
			}

			if ( empty( $vouchers ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-vouchers">

				<h3>Ưu đãi</h3>

				<ul class="k86-voucher-list">

					<?php foreach ( $vouchers as $voucher ) : ?>

						<li class="k86-voucher-item">
							🎁 <?php echo esc_html( $voucher ); ?>
						</li>

					<?php endforeach; ?>

				</ul>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

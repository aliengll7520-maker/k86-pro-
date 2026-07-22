<?php
/**
 * K86 Pro Next Core
 *
 * Product Stock Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Stock_Module' ) ) {

	class K86_Product_Stock_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 100;

		}

		/**
		 * Render stock information.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$stock = isset( $product['stock'] ) ? (int) $product['stock'] : 0;

			if ( $stock <= 0 ) {
				return '';
			}

			$title = ! empty( $product['stock_title'] )
				? sanitize_text_field( $product['stock_title'] )
				: __( 'Tình trạng kho', 'k86-pro' );

			ob_start();
			?>

			<div class="k86-product-stock">

				<h3 class="k86-stock-title">
					<?php echo esc_html( $title ); ?>
				</h3>

				<div class="k86-stock-content">

					<span class="k86-stock-label">
						<?php esc_html_e( 'Còn lại:', 'k86-pro' ); ?>
					</span>

					<strong class="k86-stock-value">
						<?php echo esc_html( number_format_i18n( $stock ) ); ?>
					</strong>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

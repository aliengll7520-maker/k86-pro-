<?php
/**
 * K86 Pro Next Core
 *
 * Product Countdown Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Countdown_Module' ) ) {

	class K86_Product_Countdown_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 90;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$end_time = ! empty( $product['countdown_end'] ) ? esc_attr( $product['countdown_end'] ) : '';

			if ( '' === $end_time ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-countdown">

				<h3>⏰ Kết thúc sau</h3>

				<div
					class="k86-countdown"
					data-end="<?php echo $end_time; ?>">
				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

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
		 * Render countdown.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$end_time = ! empty( $product['countdown_end'] )
				? sanitize_text_field( $product['countdown_end'] )
				: '';

			if ( '' === $end_time ) {
				return '';
			}

			$title = ! empty( $product['countdown_title'] )
				? sanitize_text_field( $product['countdown_title'] )
				: __( 'Ưu đãi kết thúc sau', 'k86-pro' );

			ob_start();
			?>

			<div class="k86-product-countdown"
			     data-end="<?php echo esc_attr( $end_time ); ?>">

				<h3 class="k86-countdown-title">

					<?php echo esc_html( $title ); ?>

				</h3>

				<div class="k86-countdown-timer">

					<span class="k86-days">00</span> :

					<span class="k86-hours">00</span> :

					<span class="k86-minutes">00</span> :

					<span class="k86-seconds">00</span>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

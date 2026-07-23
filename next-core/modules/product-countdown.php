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
		 * Get countdown end.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		protected function get_end_time( array $product ) {

			return ! empty( $product['countdown_end'] )
				? sanitize_text_field( $product['countdown_end'] )
				: '';

		}

		/**
		 * Render countdown.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$end_time = $this->get_end_time( $product );

			if ( '' === $end_time ) {
				return '';
			}

			$title = ! empty( $product['countdown_title'] )
				? sanitize_text_field( $product['countdown_title'] )
				: __( 'Ưu đãi kết thúc sau', 'k86-pro' );

			$status = ! empty( $product['countdown_status'] )
				? sanitize_text_field( $product['countdown_status'] )
				: __( 'Đang diễn ra', 'k86-pro' );

			ob_start();
			?>

			<div class="k86-product-countdown"
				data-end="<?php echo esc_attr( $end_time ); ?>">

				<h3 class="k86-countdown-title">
					<?php echo esc_html( $title ); ?>
				</h3>

				<div class="k86-countdown-status">
					<?php echo esc_html( $status ); ?>
				</div>

				<div class="k86-countdown-timer">

					<span class="k86-days">00</span>d :

					<span class="k86-hours">00</span>h :

					<span class="k86-minutes">00</span>m :

					<span class="k86-seconds">00</span>s

				</div>

				<div class="k86-countdown-expired" style="display:none;">

					<?php esc_html_e( 'Chương trình khuyến mãi đã kết thúc.', 'k86-pro' ); ?>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

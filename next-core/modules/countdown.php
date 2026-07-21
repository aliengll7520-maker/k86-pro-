<?php
/**
 * K86 Pro Next Core
 *
 * Countdown Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Countdown_Module' ) ) {

	class K86_Countdown_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 90;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$countdown = array();

			if (
				isset( $product['countdown'] ) &&
				is_array( $product['countdown'] )
			) {
				$countdown = $product['countdown'];
			}

			$enabled = ! empty( $countdown['enabled'] );
			$title   = $countdown['title'] ?? '';
			$end_time = $countdown['end_time'] ?? '';

			ob_start();
			?>

			<div class="k86-product-countdown">

				<?php if ( $enabled && ! empty( $end_time ) ) : ?>

					<?php if ( ! empty( $title ) ) : ?>
						<div class="k86-countdown-title">
							<?php echo esc_html( $title ); ?>
						</div>
					<?php endif; ?>

					<div
						class="k86-countdown-timer"
						data-end-time="<?php echo esc_attr( $end_time ); ?>"
					>
						<?php echo esc_html( $end_time ); ?>
					</div>

				<?php else : ?>

					<div class="k86-countdown-placeholder">
						No active countdown.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

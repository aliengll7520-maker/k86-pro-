<?php
/**
 * K86 Pro Next Core
 * Countdown Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Countdown_Module' ) ) {

	class K86_Countdown_Module {

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
		public function render( array $product = array() ) {

			$countdown = array();

			if (
				isset( $product['countdown'] ) &&
				is_array( $product['countdown'] )
			) {
				$countdown = $product['countdown'];
			}

			/*
			 * Current fields
			 */
			$enabled  = ! empty( $countdown['enabled'] );
			$title    = $countdown['title'] ?? '';
			$subtitle = $countdown['subtitle'] ?? '';
			$end_time = $countdown['end_time'] ?? '';

			/*
			 * Future fields
			 */
			$timezone         = $countdown['timezone'] ?? '';
			$status           = $countdown['status'] ?? '';
			$campaign_id      = $countdown['campaign_id'] ?? '';
			$campaign_type    = $countdown['campaign_type'] ?? '';
			$priority         = isset( $countdown['priority'] )
				? absint( $countdown['priority'] )
				: 0;
			$auto_hide        = ! empty( $countdown['auto_hide'] );
			$expired_message  = $countdown['expired_message'] ?? '';
			$replacement_text = $countdown['replacement_text'] ?? '';
			$css_class        = $countdown['css_class'] ?? '';
			$attributes       = isset( $countdown['attributes'] ) && is_array( $countdown['attributes'] )
				? $countdown['attributes']
				: array();

			ob_start();
			?>

			<div class="k86-product-countdown <?php echo esc_attr( $css_class ); ?>">

				<?php if ( $enabled && ! empty( $end_time ) ) : ?>

					<?php if ( ! empty( $title ) ) : ?>

						<div class="k86-countdown-title">
							<?php echo esc_html( $title ); ?>
						</div>

					<?php endif; ?>

					<?php if ( ! empty( $subtitle ) ) : ?>

						<div class="k86-countdown-subtitle">
							<?php echo esc_html( $subtitle ); ?>
						</div>

					<?php endif; ?>

					<div
						class="k86-countdown-timer"
						data-end-time="<?php echo esc_attr( $end_time ); ?>"
						data-timezone="<?php echo esc_attr( $timezone ); ?>"
						data-campaign-id="<?php echo esc_attr( $campaign_id ); ?>"
						data-campaign-type="<?php echo esc_attr( $campaign_type ); ?>"
						data-priority="<?php echo esc_attr( $priority ); ?>"
						data-auto-hide="<?php echo $auto_hide ? '1' : '0'; ?>"
					>
						<?php echo esc_html( $end_time ); ?>
					</div>

					<?php if ( ! empty( $status ) ) : ?>

						<div class="k86-countdown-status">
							<?php echo esc_html( $status ); ?>
						</div>

					<?php endif; ?>

					<?php if ( ! empty( $replacement_text ) ) : ?>

						<div class="k86-countdown-replacement-text">
							<?php echo esc_html( $replacement_text ); ?>
						</div>

					<?php endif; ?>

				<?php else : ?>

					<div class="k86-countdown-placeholder">

						<?php
						echo ! empty( $expired_message )
							? esc_html( $expired_message )
							: esc_html__( 'Hiện không có chương trình đếm ngược.', 'k86-pro' );
						?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

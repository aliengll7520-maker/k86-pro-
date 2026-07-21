<?php
/**
 * K86 Pro Next Core
 * Warranty Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Warranty_Module' ) ) {

	class K86_Warranty_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 130;

		}

		/**
		 * Render warranty.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$warranty = array();

			if (
				isset( $product['warranty'] ) &&
				is_array( $product['warranty'] )
			) {
				$warranty = $product['warranty'];
			}

			/*
			 * Current fields.
			 */
			$enabled = ! empty( $warranty['enabled'] );
			$message = $warranty['message'] ?? '';

			/*
			 * Future fields.
			 */
			$title          = $warranty['title'] ?? '';
			$subtitle       = $warranty['subtitle'] ?? '';
			$description    = $warranty['description'] ?? '';

			$period         = $warranty['period'] ?? '';
			$unit           = $warranty['unit'] ?? 'month';

			$type           = $warranty['type'] ?? '';
			$provider       = $warranty['provider'] ?? '';

			$policy_url     = $warranty['policy_url'] ?? '';
			$claim_url      = $warranty['claim_url'] ?? '';

			$support_phone  = $warranty['support_phone'] ?? '';
			$support_email  = $warranty['support_email'] ?? '';

			$onsite         = ! empty( $warranty['onsite'] );
			$international  = ! empty( $warranty['international'] );

			$status         = $warranty['status'] ?? '';
			$badge          = $warranty['badge'] ?? '';
			$icon           = $warranty['icon'] ?? '🛡️';
			$css_class      = $warranty['css_class'] ?? '';

			$attributes = isset( $warranty['attributes'] ) && is_array( $warranty['attributes'] )
				? $warranty['attributes']
				: array();

			ob_start();
			?>

			<div class="k86-product-warranty <?php echo esc_attr( $css_class ); ?>">

				<?php if ( $enabled ) : ?>

					<div
						class="k86-warranty-box"
						data-provider="<?php echo esc_attr( $provider ); ?>"
						data-type="<?php echo esc_attr( $type ); ?>"
					>

						<div class="k86-warranty-header">

							<span class="k86-warranty-icon">
								<?php echo esc_html( $icon ); ?>
							</span>

							<?php if ( ! empty( $title ) ) : ?>
								<span class="k86-warranty-title">
									<?php echo esc_html( $title ); ?>
								</span>
							<?php endif; ?>

							<?php if ( ! empty( $badge ) ) : ?>
								<span class="k86-warranty-badge">
									<?php echo esc_html( $badge ); ?>
								</span>
							<?php endif; ?>

						</div>

						<?php if ( ! empty( $subtitle ) ) : ?>
							<div class="k86-warranty-subtitle">
								<?php echo esc_html( $subtitle ); ?>
							</div>
						<?php endif; ?>

						<div class="k86-warranty-text">
							<?php
							echo esc_html(
								! empty( $message )
									? $message
									: __( 'Warranty available.', 'k86-pro' )
							);
							?>
						</div>

						<?php if ( ! empty( $description ) ) : ?>
							<div class="k86-warranty-description">
								<?php echo esc_html( $description ); ?>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $period ) ) : ?>
							<div class="k86-warranty-period">
								<?php
								printf(
									esc_html__( '%1$s %2$s warranty', 'k86-pro' ),
									esc_html( $period ),
									esc_html( $unit )
								);
								?>
							</div>
						<?php endif; ?>

						<?php if ( ! empty( $status ) ) : ?>
							<div class="k86-warranty-status">
								<?php echo esc_html( $status ); ?>
							</div>
						<?php endif; ?>

					</div>

				<?php else : ?>

					<div class="k86-warranty-placeholder">
						<?php esc_html_e(
							'Không có thông tin bảo hành.',
							'k86-pro'
						); ?>
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

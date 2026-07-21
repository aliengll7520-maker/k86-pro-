<?php
/**
 * K86 Pro Next Core
 * CTA Buttons Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_CTA_Buttons_Module' ) ) {

	class K86_CTA_Buttons_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 150;

		}

		/**
		 * Render CTA buttons.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$cta = array();

			if (
				isset( $product['cta_buttons'] ) &&
				is_array( $product['cta_buttons'] )
			) {
				$cta = $product['cta_buttons'];
			}

			$buttons = isset( $cta['buttons'] ) && is_array( $cta['buttons'] )
				? $cta['buttons']
				: $cta;

			$css_class = $cta['css_class'] ?? '';

			ob_start();
			?>

			<div class="k86-product-cta <?php echo esc_attr( $css_class ); ?>">

				<?php if ( ! empty( $buttons ) ) : ?>

					<div class="k86-cta-buttons">

						<?php foreach ( $buttons as $button ) : ?>

							<?php

							$enabled = ! empty( $button['enabled'] );

							if ( ! $enabled ) {
								continue;
							}

							$label  = $button['label'] ?? '';
							$url    = $button['url'] ?? '';

							if ( empty( $label ) || empty( $url ) ) {
								continue;
							}

							$class  = $button['class'] ?? 'primary';
							$icon   = $button['icon'] ?? '';
							$target = $button['target'] ?? '_blank';
							$rel    = $button['rel'] ?? 'noopener noreferrer';

							$type   = $button['type'] ?? '';
							$vendor = $button['vendor'] ?? '';
							$badge  = $button['badge'] ?? '';

							?>

							<a
								class="k86-cta-button <?php echo esc_attr( $class ); ?>"
								href="<?php echo esc_url( $url ); ?>"
								target="<?php echo esc_attr( $target ); ?>"
								rel="<?php echo esc_attr( $rel ); ?>"
								data-type="<?php echo esc_attr( $type ); ?>"
								data-vendor="<?php echo esc_attr( $vendor ); ?>"
							>

								<?php if ( ! empty( $icon ) ) : ?>

									<span class="k86-cta-icon">
										<?php echo esc_html( $icon ); ?>
									</span>

								<?php endif; ?>

								<span class="k86-cta-label">
									<?php echo esc_html( $label ); ?>
								</span>

								<?php if ( ! empty( $badge ) ) : ?>

									<span class="k86-cta-badge">
										<?php echo esc_html( $badge ); ?>
									</span>

								<?php endif; ?>

							</a>

						<?php endforeach; ?>

					</div>

				<?php else : ?>

					<div class="k86-cta-placeholder">
						<?php esc_html_e(
							'Không có nút hành động.',
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

<?php
/**
 * K86 Pro Next Core
 *
 * Product Highlights Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Highlights_Module' ) ) {

	class K86_Product_Highlights_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 40;

		}

		/**
		 * Render highlights.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			if ( empty( $product['highlights'] ) || ! is_array( $product['highlights'] ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-highlights">

				<?php foreach ( $product['highlights'] as $item ) : ?>

					<?php
					$icon  = '';
					$title = '';
					$text  = '';

					if ( is_array( $item ) ) {

						$icon  = ! empty( $item['icon'] ) ? $item['icon'] : '';
						$title = ! empty( $item['title'] ) ? $item['title'] : '';
						$text  = ! empty( $item['text'] ) ? $item['text'] : '';

					} else {

						$title = (string) $item;

					}
					?>

					<div class="k86-highlight-item">

						<?php if ( $icon ) : ?>

							<div class="k86-highlight-icon">

								<span class="<?php echo esc_attr( $icon ); ?>"></span>

							</div>

						<?php endif; ?>

						<div class="k86-highlight-content">

							<?php if ( $title ) : ?>

								<div class="k86-highlight-title">

									<?php echo esc_html( $title ); ?>

								</div>

							<?php endif; ?>

							<?php if ( $text ) : ?>

								<div class="k86-highlight-text">

									<?php echo esc_html( $text ); ?>

								</div>

							<?php endif; ?>

						</div>

					</div>

				<?php endforeach; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

<?php
/**
 * K86 Pro Next Core
 *
 * Product Description Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Description_Module' ) ) {

	class K86_Product_Description_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 65;

		}

		/**
		 * Get description title.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		protected function get_title( array $product ) {

			return ! empty( $product['description_title'] )
				? sanitize_text_field( $product['description_title'] )
				: __( 'Mô tả sản phẩm', 'k86-pro' );

		}

		/**
		 * Get short description.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		protected function get_short_description( array $product ) {

			return ! empty( $product['short_description'] )
				? wp_kses_post( $product['short_description'] )
				: '';

		}

		/**
		 * Get full description.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		protected function get_description( array $product ) {

			return ! empty( $product['description'] )
				? wp_kses_post( $product['description'] )
				: '';

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$title       = $this->get_title( $product );
			$summary     = $this->get_short_description( $product );
			$description = $this->get_description( $product );

			if ( '' === $summary && '' === $description ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-description">

				<h3 class="k86-description-title">
					<?php echo esc_html( $title ); ?>
				</h3>

				<?php if ( '' !== $summary ) : ?>

					<div class="k86-description-summary">
						<?php echo $summary; ?>
					</div>

				<?php endif; ?>

				<?php if ( '' !== $description ) : ?>

					<div class="k86-description-content">
						<?php echo $description; ?>
					</div>

				<?php endif; ?>

				<?php if ( strlen( wp_strip_all_tags( $description ) ) > 500 ) : ?>

					<div class="k86-description-toggle">

						<button
							type="button"
							class="k86-toggle-description">

							<?php esc_html_e( 'Xem thêm', 'k86-pro' ); ?>

						</button>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

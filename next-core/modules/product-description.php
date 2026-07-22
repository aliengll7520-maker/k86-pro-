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
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$title = ! empty( $product['description_title'] )
				? sanitize_text_field( $product['description_title'] )
				: __( 'Mô tả sản phẩm', 'k86-pro' );

			$short_description = ! empty( $product['short_description'] )
				? wp_kses_post( $product['short_description'] )
				: '';

			$description = ! empty( $product['description'] )
				? wp_kses_post( $product['description'] )
				: '';

			if ( '' === $short_description && '' === $description ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-description">

				<h3 class="k86-description-title">
					<?php echo esc_html( $title ); ?>
				</h3>

				<?php if ( '' !== $short_description ) : ?>

					<div class="k86-description-summary">
						<?php echo $short_description; ?>
					</div>

				<?php endif; ?>

				<?php if ( '' !== $description ) : ?>

					<div class="k86-description-content">
						<?php echo $description; ?>
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

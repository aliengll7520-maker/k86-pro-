<?php
/**
 * K86 Pro Next Core
 *
 * CTA Buttons Module
 *
 * Hiển thị các nút kêu gọi hành động.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_CTA_Buttons_Module' ) ) {

	class K86_CTA_Buttons_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 150;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
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

			ob_start();
			?>

			<div class="k86-product-cta">

				<?php if ( ! empty( $cta ) ) : ?>

					<?php foreach ( $cta as $button ) : ?>

						<?php
						$label = isset( $button['label'] ) ? $button['label'] : '';
						$url   = isset( $button['url'] ) ? $button['url'] : '';
						$class = isset( $button['class'] ) ? $button['class'] : 'primary';

						if ( empty( $label ) || empty( $url ) ) {
							continue;
						}
						?>

						<a
							class="k86-cta-button <?php echo esc_attr( $class ); ?>"
							href="<?php echo esc_url( $url ); ?>"
							target="_blank"
							rel="noopener noreferrer"
						>
							<?php echo esc_html( $label ); ?>
						</a>

					<?php endforeach; ?>

				<?php else : ?>

					<div class="k86-cta-placeholder">
						No call-to-action buttons.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

<?php
/**
 * K86 Pro Next Core
 * Product Video Module
 *
 * Hiển thị video sản phẩm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Video_Module' ) ) {

	class K86_Product_Video_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 20;

		}

		/**
		 * Render video.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$video = $product['video'] ?? '';

			ob_start();
			?>

			<div class="k86-product-video">

				<?php if ( ! empty( $video ) ) : ?>

					<div class="k86-product-video__embed">
						<?php echo wp_kses_post( $video ); ?>
					</div>

				<?php else : ?>

					<div class="k86-product-video__placeholder">
						<?php esc_html_e( 'Chưa có video sản phẩm.', 'k86-pro' ); ?>
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

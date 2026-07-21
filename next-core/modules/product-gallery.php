<?php
/**
 * K86 Pro Next Core
 * Product Gallery Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Gallery_Module' ) ) {

	class K86_Product_Gallery_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 30;

		}

		/**
		 * Render product gallery.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$gallery = array();
			$alt     = $product['title'] ?? '';

			if (
				isset( $product['gallery'] ) &&
				is_array( $product['gallery'] )
			) {
				$gallery = $product['gallery'];
			}

			ob_start();
			?>

			<div class="k86-product-gallery">

				<?php if ( ! empty( $gallery ) ) : ?>

					<div class="k86-gallery-main">

						<img
							src="<?php echo esc_url( $gallery[0] ); ?>"
							alt="<?php echo esc_attr( $alt ); ?>"
							class="k86-gallery-main-image"
						>

					</div>

					<div class="k86-gallery-thumbnails">

						<?php foreach ( $gallery as $image ) : ?>

							<div class="k86-gallery-thumb">

								<img
									src="<?php echo esc_url( $image ); ?>"
									alt="<?php echo esc_attr( $alt ); ?>"
									class="k86-gallery-thumbnail-image"
								>

							</div>

						<?php endforeach; ?>

					</div>

				<?php else : ?>

					<div class="k86-gallery-placeholder">

						<?php esc_html_e( 'Chưa có hình ảnh sản phẩm.', 'k86-pro' ); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

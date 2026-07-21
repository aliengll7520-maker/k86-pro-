<?php
/**
 * K86 Pro Next Core
 *
 * Product Gallery Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Gallery_Module' ) ) {

	class K86_Product_Gallery_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 30;

		}

		/**
		 * Render Gallery.
		 *
		 * @param array $product Dữ liệu sản phẩm.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$gallery = array();

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
							alt=""
							class="k86-gallery-main-image"
						>

					</div>

					<div class="k86-gallery-thumbnails">

						<?php foreach ( $gallery as $image ) : ?>

							<div class="k86-gallery-thumb">

								<img
									src="<?php echo esc_url( $image ); ?>"
									alt=""
								>

							</div>

						<?php endforeach; ?>

					</div>

				<?php else : ?>

					<div class="k86-gallery-placeholder">
						No product images.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

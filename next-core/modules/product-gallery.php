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
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 30;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$gallery = array();

			if ( class_exists( 'K86_Media_Manager' ) ) {

				$media = ( new K86_Media_Manager() )->get_product_media( $product );

				if ( ! empty( $media['gallery'] ) && is_array( $media['gallery'] ) ) {
					$gallery = $media['gallery'];
				}

			}

			if ( empty( $gallery ) && ! empty( $product['gallery'] ) && is_array( $product['gallery'] ) ) {
				$gallery = $product['gallery'];
			}

			if ( empty( $gallery ) && ! empty( $product['image'] ) ) {
				$gallery[] = $product['image'];
			}

			if ( empty( $gallery ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-gallery">

				<div class="k86-gallery-main">

					<img
						src="<?php echo esc_url( $gallery[0] ); ?>"
						alt=""
						class="k86-gallery-image"
					/>

				</div>

				<?php if ( count( $gallery ) > 1 ) : ?>

					<div class="k86-gallery-thumbnails">

						<?php foreach ( $gallery as $image ) : ?>

							<img
								src="<?php echo esc_url( $image ); ?>"
								alt=""
								class="k86-gallery-thumb"
							/>

						<?php endforeach; ?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

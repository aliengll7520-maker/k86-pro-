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
		 * Get gallery images.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		protected function get_gallery( array $product ) {

			$gallery = array();

			if ( class_exists( 'K86_Media_Manager' ) ) {

				$media = ( new K86_Media_Manager() )->get_product_media( $product );

				if ( ! empty( $media['gallery'] ) && is_array( $media['gallery'] ) ) {
					$gallery = $media['gallery'];
				}

				if ( empty( $gallery ) && ! empty( $media['featured'] ) ) {
					$gallery[] = $media['featured'];
				}

			}

			if ( empty( $gallery ) && ! empty( $product['gallery'] ) && is_array( $product['gallery'] ) ) {
				$gallery = $product['gallery'];
			}

			if ( empty( $gallery ) && ! empty( $product['image'] ) ) {
				$gallery[] = $product['image'];
			}

			return array_values( array_unique( $gallery ) );

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$gallery = $this->get_gallery( $product );

			if ( empty( $gallery ) ) {
				return '';
			}

			$product_name = ! empty( $product['name'] )
				? esc_attr( $product['name'] )
				: esc_attr__( 'Product Image', 'k86-pro' );

			ob_start();
			?>

			<div class="k86-product-gallery">

				<div class="k86-gallery-main">

					<img
						src="<?php echo esc_url( $gallery[0] ); ?>"
						alt="<?php echo $product_name; ?>"
						class="k86-gallery-image active"
						loading="lazy"
						width="800"
						height="800"
					/>

				</div>

				<?php if ( count( $gallery ) > 1 ) : ?>

					<div class="k86-gallery-thumbnails">

						<?php foreach ( $gallery as $index => $image ) : ?>

							<img
								src="<?php echo esc_url( $image ); ?>"
								alt="<?php echo $product_name; ?>"
								class="k86-gallery-thumb<?php echo 0 === $index ? ' active' : ''; ?>"
								loading="lazy"
								width="120"
								height="120"
								data-index="<?php echo esc_attr( $index ); ?>"
							/>

						<?php endforeach; ?>

					</div>

				<?php endif; ?>

				<div class="k86-gallery-count">
					<?php echo esc_html( count( $gallery ) ); ?> ảnh
				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

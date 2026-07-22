<?php
/**
 * K86 Pro Next Core
 *
 * Product Video Module
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
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$video = '';
			$image = '';

			if ( class_exists( 'K86_Media_Manager' ) ) {

				$media = ( new K86_Media_Manager() )->get_product_media( $product );

				if ( ! empty( $media['video'] ) ) {
					$video = esc_url( $media['video'] );
				}

				if ( ! empty( $media['featured'] ) ) {
					$image = esc_url( $media['featured'] );
				}

			}

			if ( empty( $video ) && ! empty( $product['video'] ) ) {
				$video = esc_url( $product['video'] );
			}

			if ( empty( $image ) && ! empty( $product['image'] ) ) {
				$image = esc_url( $product['image'] );
			}

			ob_start();
			?>

			<div class="k86-product-video">

				<?php if ( $video ) : ?>

					<video
						class="k86-video-player"
						controls
						preload="metadata"
						playsinline
					>
						<source src="<?php echo esc_url( $video ); ?>">
					</video>

				<?php elseif ( $image ) : ?>

					<img
						class="k86-video-placeholder"
						src="<?php echo esc_url( $image ); ?>"
						alt=""
					/>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

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

			$video = ! empty( $product['video'] ) ? esc_url( $product['video'] ) : '';
			$image = ! empty( $product['image'] ) ? esc_url( $product['image'] ) : '';

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
						<source src="<?php echo $video; ?>">
					</video>

				<?php elseif ( $image ) : ?>

					<img
						class="k86-video-placeholder"
						src="<?php echo $image; ?>"
						alt=""
					/>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

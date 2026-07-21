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
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 20;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$video = '';

			if ( ! empty( $product['video'] ) ) {
				$video = esc_url( $product['video'] );
			}

			ob_start();
			?>

			<div class="k86-product-video">

				<?php if ( ! empty( $video ) ) : ?>

					<video
						class="k86-video-player"
						controls
						preload="metadata"
						playsinline
					>
						<source src="<?php echo esc_url( $video ); ?>" type="video/mp4">
					</video>

				<?php else : ?>

					<div class="k86-video-placeholder">
						No product video.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

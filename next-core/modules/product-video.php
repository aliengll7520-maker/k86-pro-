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
		 * Detect video type.
		 *
		 * @param string $url Video URL.
		 *
		 * @return string
		 */
		protected function detect_video_type( $url ) {

			if ( strpos( $url, 'youtube.com' ) !== false || strpos( $url, 'youtu.be' ) !== false ) {
				return 'youtube';
			}

			if ( strpos( $url, 'tiktok.com' ) !== false ) {
				return 'tiktok';
			}

			return 'mp4';

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

			$type = $this->detect_video_type( $video );

			ob_start();
			?>

			<div class="k86-product-video">

				<?php if ( $video && 'mp4' === $type ) : ?>

					<video
						class="k86-video-player"
						controls
						preload="metadata"
						playsinline>
						<source src="<?php echo esc_url( $video ); ?>">
					</video>

				<?php elseif ( $video && ( 'youtube' === $type || 'tiktok' === $type ) ) : ?>

					<iframe
						class="k86-video-player"
						src="<?php echo esc_url( $video ); ?>"
						loading="lazy"
						allowfullscreen>
					</iframe>

				<?php elseif ( $image ) : ?>

					<img
						class="k86-video-placeholder"
						src="<?php echo esc_url( $image ); ?>"
						alt=""
						loading="lazy"
					/>

				<?php else : ?>

					<div class="k86-video-empty">
						Chưa có video sản phẩm
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

<?php
/**
 * K86 Pro Next Core
 *
 * Media Manager
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Media_Manager' ) ) {

	class K86_Media_Manager {

		/**
		 * Get all media for a product.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		public function get_product_media( array $product ) {

			$media = array(
				'featured'  => '',
				'gallery'   => array(),
				'video'     => '',
				'downloads' => array(),
			);

			// Featured image.
			if ( ! empty( $product['image'] ) ) {
				$media['featured'] = $product['image'];
			}

			// Gallery.
			if ( ! empty( $product['gallery'] ) && is_array( $product['gallery'] ) ) {
				$media['gallery'] = $product['gallery'];
			}

			// Video.
			if ( ! empty( $product['video'] ) ) {
				$media['video'] = $product['video'];
			}

			// Downloads.
			if ( ! empty( $product['downloads'] ) && is_array( $product['downloads'] ) ) {
				$media['downloads'] = $product['downloads'];
			}

			// Fallback gallery.
			if ( empty( $media['gallery'] ) && ! empty( $media['featured'] ) ) {
				$media['gallery'][] = $media['featured'];
			}

			return $media;

		}

		/**
		 * Get featured image.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function get_featured_image( array $product ) {

			return $this->get_product_media( $product )['featured'];

		}

		/**
		 * Get gallery.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		public function get_gallery( array $product ) {

			return $this->get_product_media( $product )['gallery'];

		}

		/**
		 * Get video.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function get_video( array $product ) {

			return $this->get_product_media( $product )['video'];

		}

		/**
		 * Get downloads.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		public function get_downloads( array $product ) {

			return $this->get_product_media( $product )['downloads'];

		}

	}

}

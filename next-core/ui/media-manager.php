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
		 * @return array
		 */
		public function get_product_media( array $product ) {

			$media = array(
				'featured'  => '',
				'gallery'   => array(),
				'video'     => '',
				'youtube'   => '',
				'tiktok'    => '',
				'pdf'       => '',
				'document'  => array(),
				'audio'     => array(),
				'icon'      => '',
				'downloads' => array(),
			);

			// Featured.
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

			// YouTube.
			if ( ! empty( $product['youtube'] ) ) {
				$media['youtube'] = $product['youtube'];
			}

			// TikTok.
			if ( ! empty( $product['tiktok'] ) ) {
				$media['tiktok'] = $product['tiktok'];
			}

			// PDF.
			if ( ! empty( $product['pdf'] ) ) {
				$media['pdf'] = $product['pdf'];
			}

			// Documents.
			if ( ! empty( $product['documents'] ) && is_array( $product['documents'] ) ) {
				$media['document'] = $product['documents'];
			}

			// Audio.
			if ( ! empty( $product['audio'] ) && is_array( $product['audio'] ) ) {
				$media['audio'] = $product['audio'];
			}

			// Icon.
			if ( ! empty( $product['icon'] ) ) {
				$media['icon'] = $product['icon'];
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

		public function get_featured_image( array $product ) {
			return $this->get_product_media( $product )['featured'];
		}

		public function get_gallery( array $product ) {
			return $this->get_product_media( $product )['gallery'];
		}

		public function get_video( array $product ) {
			return $this->get_product_media( $product )['video'];
		}

		public function get_youtube( array $product ) {
			return $this->get_product_media( $product )['youtube'];
		}

		public function get_tiktok( array $product ) {
			return $this->get_product_media( $product )['tiktok'];
		}

		public function get_pdf( array $product ) {
			return $this->get_product_media( $product )['pdf'];
		}

		public function get_documents( array $product ) {
			return $this->get_product_media( $product )['document'];
		}

		public function get_audio( array $product ) {
			return $this->get_product_media( $product )['audio'];
		}

		public function get_icon( array $product ) {
			return $this->get_product_media( $product )['icon'];
		}

		public function get_downloads( array $product ) {
			return $this->get_product_media( $product )['downloads'];
		}
	}
}

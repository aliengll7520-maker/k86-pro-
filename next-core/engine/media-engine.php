<?php
/**
 * K86 Pro Next Core
 * Media Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Media_Engine' ) ) {

	class K86_Media_Engine extends K86_Engine_Base {

		/* ==========================
		 * Media Types
		 * ========================== */

		const TYPE_FEATURED = 'featured';
		const TYPE_GALLERY  = 'gallery';
		const TYPE_VIDEO    = 'video';
		const TYPE_YOUTUBE  = 'youtube';
		const TYPE_TIKTOK   = 'tiktok';
		const TYPE_DOCUMENT = 'document';
		const TYPE_PDF      = 'pdf';
		const TYPE_AUDIO    = 'audio';
		const TYPE_ICON     = 'icon';
		const TYPE_DOWNLOAD = 'download';

		/**
		 * Kiểm tra Media Type.
		 *
		 * @param string $type
		 * @return bool
		 */
		public function is_supported_type( $type ) {

			return in_array(
				$type,
				array(
					self::TYPE_FEATURED,
					self::TYPE_GALLERY,
					self::TYPE_VIDEO,
					self::TYPE_YOUTUBE,
					self::TYPE_TIKTOK,
					self::TYPE_DOCUMENT,
					self::TYPE_PDF,
					self::TYPE_AUDIO,
					self::TYPE_ICON,
					self::TYPE_DOWNLOAD,
				),
				true
			);
		}

		/**
		 * Thêm Media.
		 *
		 * @param string $type
		 * @param mixed  $item
		 * @return $this
		 */
		public function attach( $type, $item ) {

			if ( ! $this->is_supported_type( $type ) ) {
				return $this;
			}

			if ( ! isset( $this->items[ $type ] ) ) {
				$this->items[ $type ] = array();
			}

			$this->items[ $type ][] = $item;

			return $this;
		}

		/**
		 * Xóa Media.
		 *
		 * @param string $type
		 * @param int    $index
		 * @return bool
		 */
		public function detach( $type, $index ) {

			if ( isset( $this->items[ $type ][ $index ] ) ) {

				unset( $this->items[ $type ][ $index ] );

				$this->items[ $type ] = array_values(
					$this->items[ $type ]
				);

				return true;
			}

			return false;
		}

		public function get_gallery() {
			return $this->get( self::TYPE_GALLERY, array() );
		}

		public function get_videos() {
			return $this->get( self::TYPE_VIDEO, array() );
		}

		public function get_youtube() {
			return $this->get( self::TYPE_YOUTUBE, array() );
		}

		public function get_tiktok() {
			return $this->get( self::TYPE_TIKTOK, array() );
		}

		public function get_documents() {
			return $this->get( self::TYPE_DOCUMENT, array() );
		}

		public function get_pdf() {
			return $this->get( self::TYPE_PDF, array() );
		}

		public function get_audio() {
			return $this->get( self::TYPE_AUDIO, array() );
		}

		public function get_icons() {
			return $this->get( self::TYPE_ICON, array() );
		}

		public function get_downloads() {
			return $this->get( self::TYPE_DOWNLOAD, array() );
		}

		public function get_featured() {
			return $this->get( self::TYPE_FEATURED );
		}

		public function set_featured( $image ) {

			$this->register( self::TYPE_FEATURED, $image );

			return $this;
		}
	}
}

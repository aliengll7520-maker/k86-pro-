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

		/**
		 * Thêm Media.
		 *
		 * @param string $type
		 * @param mixed  $item
		 * @return $this
		 */
		public function attach( $type, $item ) {

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

		/**
		 * Lấy thư viện ảnh.
		 *
		 * @return array
		 */
		public function get_gallery() {
			return $this->get( 'gallery', array() );
		}

		/**
		 * Lấy video.
		 *
		 * @return array
		 */
		public function get_videos() {
			return $this->get( 'videos', array() );
		}

		/**
		 * Lấy tài liệu.
		 *
		 * @return array
		 */
		public function get_documents() {
			return $this->get( 'documents', array() );
		}

		/**
		 * Lấy audio.
		 *
		 * @return array
		 */
		public function get_audio() {
			return $this->get( 'audio', array() );
		}

		/**
		 * Lấy ảnh đại diện.
		 *
		 * @return mixed
		 */
		public function get_featured() {
			return $this->get( 'featured' );
		}

		/**
		 * Đặt ảnh đại diện.
		 *
		 * @param mixed $image
		 * @return $this
		 */
		public function set_featured( $image ) {

			$this->register( 'featured', $image );

			return $this;
		}
	}
}

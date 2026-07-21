<?php
/**
 * K86 Pro Next Core
 * Warranty Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Warranty_Engine' ) ) {

	class K86_Warranty_Engine extends K86_Engine_Base {

		/**
		 * Thiết lập thời gian bảo hành.
		 *
		 * @param string $period
		 * @return $this
		 */
		public function set_period( $period ) {
			return $this->register( 'warranty_period', sanitize_text_field( $period ) );
		}

		/**
		 * Lấy thời gian bảo hành.
		 *
		 * @return string
		 */
		public function get_period() {
			return $this->get( 'warranty_period', '' );
		}

		/**
		 * Thiết lập loại bảo hành.
		 *
		 * @param string $type
		 * @return $this
		 */
		public function set_type( $type ) {
			return $this->register( 'warranty_type', sanitize_text_field( $type ) );
		}

		/**
		 * Lấy loại bảo hành.
		 *
		 * @return string
		 */
		public function get_type() {
			return $this->get( 'warranty_type', '' );
		}

		/**
		 * Thiết lập đơn vị bảo hành.
		 *
		 * @param string $provider
		 * @return $this
		 */
		public function set_provider( $provider ) {
			return $this->register( 'warranty_provider', sanitize_text_field( $provider ) );
		}

		/**
		 * Lấy đơn vị bảo hành.
		 *
		 * @return string
		 */
		public function get_provider() {
			return $this->get( 'warranty_provider', '' );
		}

		/**
		 * Kiểm tra sản phẩm có bảo hành.
		 *
		 * @return bool
		 */
		public function has_warranty() {
			return '' !== $this->get_period();
		}

		/**
		 * Lấy thông tin bảo hành.
		 *
		 * @return array
		 */
		public function get_warranty_info() {
			return array(
				'period'   => $this->get_period(),
				'type'     => $this->get_type(),
				'provider' => $this->get_provider(),
			);
		}
	}

}

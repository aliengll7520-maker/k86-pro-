<?php
/**
 * K86 Pro Next Core
 * Return Policy Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Return_Policy_Engine' ) ) {

	class K86_Return_Policy_Engine extends K86_Engine_Base {

		/**
		 * Thiết lập thời gian đổi trả.
		 *
		 * @param string $period
		 * @return $this
		 */
		public function set_period( $period ) {
			return $this->register( 'return_period', sanitize_text_field( $period ) );
		}

		/**
		 * Lấy thời gian đổi trả.
		 *
		 * @return string
		 */
		public function get_period() {
			return $this->get( 'return_period', '' );
		}

		/**
		 * Thiết lập điều kiện đổi trả.
		 *
		 * @param string $conditions
		 * @return $this
		 */
		public function set_conditions( $conditions ) {
			return $this->register(
				'return_conditions',
				sanitize_textarea_field( $conditions )
			);
		}

		/**
		 * Lấy điều kiện đổi trả.
		 *
		 * @return string
		 */
		public function get_conditions() {
			return $this->get( 'return_conditions', '' );
		}

		/**
		 * Thiết lập thông tin liên hệ đổi trả.
		 *
		 * @param string $contact
		 * @return $this
		 */
		public function set_contact( $contact ) {
			return $this->register(
				'return_contact',
				sanitize_text_field( $contact )
			);
		}

		/**
		 * Lấy thông tin liên hệ đổi trả.
		 *
		 * @return string
		 */
		public function get_contact() {
			return $this->get( 'return_contact', '' );
		}

		/**
		 * Kiểm tra sản phẩm có hỗ trợ đổi trả.
		 *
		 * @return bool
		 */
		public function is_returnable() {
			return '' !== $this->get_period();
		}

		/**
		 * Lấy toàn bộ thông tin chính sách đổi trả.
		 *
		 * @return array
		 */
		public function get_return_policy() {
			return array(
				'period'     => $this->get_period(),
				'conditions' => $this->get_conditions(),
				'contact'    => $this->get_contact(),
				'available'  => $this->is_returnable(),
			);
		}
	}

}

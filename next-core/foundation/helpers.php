<?php
/**
 * K86 Pro Next Core
 *
 * Foundation Helpers
 *
 * Chứa các hàm hỗ trợ dùng chung cho toàn bộ Framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Helpers' ) ) {

	class K86_Helpers {

		/**
		 * Khởi tạo Helpers.
		 *
		 * @return void
		 */
		public function init() {

			// Khởi tạo Helpers.
			return;

		}

		/**
		 * Kiểm tra chuỗi rỗng.
		 *
		 * @param mixed $value Giá trị cần kiểm tra.
		 * @return bool
		 */
		public function is_empty( $value ) {

			return empty( $value );

		}

		/**
		 * Kiểm tra giá trị có phải mảng hay không.
		 *
		 * @param mixed $value Giá trị cần kiểm tra.
		 * @return bool
		 */
		public function is_array( $value ) {

			return is_array( $value );

		}

		/**
		 * Kiểm tra giá trị có phải chuỗi hay không.
		 *
		 * @param mixed $value Giá trị cần kiểm tra.
		 * @return bool
		 */
		public function is_string( $value ) {

			return is_string( $value );

		}

		/**
		 * Kiểm tra giá trị có phải số hay không.
		 *
		 * @param mixed $value Giá trị cần kiểm tra.
		 * @return bool
		 */
		public function is_numeric( $value ) {

			return is_numeric( $value );

		}

		/**
		 * Chuyển giá trị thành chuỗi an toàn.
		 *
		 * @param mixed $value Giá trị đầu vào.
		 * @return string
		 */
		public function to_string( $value ) {

			if ( is_null( $value ) ) {
				return '';
			}

			if ( is_scalar( $value ) ) {
				return (string) $value;
			}

			return wp_json_encode( $value );

		}

		/**
		 * Chuyển giá trị thành mảng.
		 *
		 * @param mixed $value Giá trị đầu vào.
		 * @return array
		 */
		public function to_array( $value ) {

			if ( is_array( $value ) ) {
				return $value;
			}

			if ( is_null( $value ) ) {
				return array();
			}

			return (array) $value;

		}

	}

}

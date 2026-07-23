<?php
/**
 * K86 Pro Next Core
 * Product Data Mapper
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Mapper' ) ) {

	class K86_Product_Mapper {

		/**
		 * Chuyển dữ liệu DB thành Product Model.
		 *
		 * @param array $row
		 * @return K86_Product_Model|null
		 */
		public static function to_model( array $row ) {

			if ( empty( $row ) ) {
				return null;
			}

			return new K86_Product_Model( $row );

		}

		/**
		 * Chuyển Product Model thành mảng.
		 *
		 * @param K86_Product_Model $product
		 * @return array
		 */
		public static function to_array( K86_Product_Model $product ) {

			if ( method_exists( $product, 'to_array' ) ) {
				return $product->to_array();
			}

			return get_object_vars( $product );

		}

	}

}

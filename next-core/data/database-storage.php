<?php
/**
 * K86 Pro Next Core
 * Product Database Storage
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Database_Storage' ) ) {

	class K86_Product_Database_Storage implements K86_Product_Storage_Interface {

		public function find( $id ) {

			return new K86_Product_Model();

		}

		public function find_by_slug( $slug ) {

			return null;

		}

		public function find_by_sku( $sku ) {

			return null;

		}

		public function all() {

			return array();

		}

		public function paginate( $page = 1, $per_page = 20 ) {

			return array(
				'items'    => array(),
				'total'    => 0,
				'page'     => max( 1, absint( $page ) ),
				'per_page' => max( 1, absint( $per_page ) ),
			);

		}

		public function save( K86_Product_Model $product ) {

			return true;

		}

		public function delete( $id ) {

			return true;

		}

	}

}

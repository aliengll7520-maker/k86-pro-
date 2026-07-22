<?php
/**
 * K86 Pro Next Core
 * Product Repository
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Repository' ) ) {

	class K86_Product_Repository {

		public function find( $id ) {

			$data = array(
				'id' => absint( $id ),
			);

			$data = apply_filters( 'k86_repository_find', $data, $id );

			return new K86_Product_Model( $data );
		}

		public function find_by_slug( $slug ) {

			$slug = sanitize_title( $slug );

			do_action( 'k86_repository_find_by_slug', $slug );

			return null;
		}

		public function find_by_sku( $sku ) {

			$sku = sanitize_text_field( $sku );

			do_action( 'k86_repository_find_by_sku', $sku );

			return null;
		}

		public function exists( $id ) {

			return $this->find( $id )->get( 'id' ) > 0;
		}

		public function all() {

			$products = array();

			return apply_filters(
				'k86_repository_all',
				$products
			);
		}

		public function paginate( $page = 1, $per_page = 20 ) {

			$result = array(
				'items'    => array(),
				'total'    => 0,
				'page'     => max( 1, absint( $page ) ),
				'per_page' => max( 1, absint( $per_page ) ),
			);

			return apply_filters(
				'k86_repository_paginate',
				$result,
				$page,
				$per_page
			);
		}

		public function save( K86_Product_Model $product ) {

			if ( method_exists( $product, 'to_array' ) ) {
				$data = $product->to_array();
			} else {
				$data = array();
			}

			$data = apply_filters(
				'k86_before_repository_save',
				$data,
				$product
			);

			do_action(
				'k86_repository_save',
				$data,
				$product
			);

			return true;
		}

		public function delete( $id ) {

			$id = absint( $id );

			do_action(
				'k86_repository_delete',
				$id
			);

			return true;
		}
	}

}

<?php
/**
 * K86 Pro Next Core
 * Product Repository
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Product_Repository {

	/**
	 * Lấy sản phẩm theo ID
	 *
	 * @param int $id
	 * @return K86_Product_Model
	 */
	public function find( $id ) {

		$data = array(
			'id' => absint( $id ),
		);

		return new K86_Product_Model( $data );
	}

	/**
	 * Lưu sản phẩm
	 *
	 * @param K86_Product_Model $product
	 * @return bool
	 */
	public function save( K86_Product_Model $product ) {

		// TODO:
		// Build tiếp theo sẽ ghi vào Database.

		return true;
	}

	/**
	 * Xóa sản phẩm
	 *
	 * @param int $id
	 * @return bool
	 */
	public function delete( $id ) {

		// TODO:
		// Build tiếp theo sẽ xóa khỏi Database.

		return true;
	}

}

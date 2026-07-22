<?php
/**
 * Product Manager
 */

defined( 'ABSPATH' ) || exit;

class K86_Product_Manager {

	protected $repository;

	public function __construct() {

		$this->repository = new K86_Product_Repository();

	}

	/**
	 * Create product.
	 *
	 * @param array $product Product data.
	 * @return bool
	 */
	public function create_product( array $product ) {

	if ( ! $this->validate_product( $product ) ) {
		return false;
	}

	return $this->repository->save( $product );

	}

	/**
	 * Update product.
	 *
	 * @param int   $id      Product ID.
	 * @param array $product Product data.
	 * @return bool
	 */
	public function update_product( int $id, array $product ) {

	if ( ! $this->validate_product( $product ) ) {
		return false;
	}

	return $this->repository->update( $id, $product );

	}

	/**
	 * Delete product.
	 *
	 * @param int $id Product ID.
	 * @return bool
	 */
	public function delete_product( int $id ) {

		return $this->repository->delete( $id );

	}

	/**
	 * Get product.
	 *
	 * @param int $id Product ID.
	 * @return array
	 */
	public function get_product( int $id ) {

		return $this->repository->find( $id );

	}

	/**
	 * Get products.
	 *
	 * @return array
	 */
	public function get_products() {

		return $this->repository->find_all();

	}
		/**
	 * Validate product data.
	 *
	 * @param array $product Product data.
	 * @return bool
	 */
	public function validate_product( array $product ) {

		if ( empty( $product['title'] ) ) {
			return false;
		}

		return true;

	}

}

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

		return $this->repository->save( $product );

	}

}

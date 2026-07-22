<?php
/**
 * Product Controller
 */

defined( 'ABSPATH' ) || exit;

class K86_Product_Controller {

	protected $manager;

	public function __construct() {

		$this->manager = new K86_Product_Manager();

	}

}
	/**
	 * Create product.
	 *
	 * @param array $product Product data.
	 * @return bool
	 */
	public function create( array $product ) {

		return $this->manager->create_product( $product );

  }

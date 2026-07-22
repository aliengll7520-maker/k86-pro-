<?php
/**
 * K86 Pro
 * Product Controller
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

class K86_Product_Controller {

	/**
	 * Product Manager.
	 *
	 * @var K86_Product_Manager
	 */
	protected $manager;

	/**
	 * Constructor.
	 */
	public function __construct() {

		$this->manager = new K86_Product_Manager();

	}

	/**
	 * Create product.
	 *
	 * @param array $product Product data.
	 * @return mixed
	 */
	public function create( array $product ) {

		return $this->manager->create_product( $product );

	}

}

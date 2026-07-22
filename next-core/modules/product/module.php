<?php
/**
 * Product Module
 */

defined( 'ABSPATH' ) || exit;

class K86_Product_Module {

	protected $manager;

	public function __construct() {

		$this->manager = new K86_Product_Manager();

	}

}
	/**
	 * Get Product Manager.
	 *
	 * @return K86_Product_Manager
	 */
	public function manager() {

		return $this->manager;

  }

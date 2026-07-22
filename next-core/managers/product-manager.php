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

}

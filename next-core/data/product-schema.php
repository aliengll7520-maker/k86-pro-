<?php
/**
 * K86 Pro Next Core
 * Product Schema
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'k86_product_schema' ) ) {

	/**
	 * Return Product schema definition.
	 *
	 * @return array
	 */
	function k86_product_schema() {

		global $wpdb;

		$contract = array();

		if ( class_exists( 'K86_Product_Contract' ) ) {
			$contract = K86_Product_Contract::fields();
		}

		return array(

			'table' => $wpdb->prefix . 'k86_products',

			'primary_key' => 'id',

			'contract' => $contract,

			'columns' => array(

				'id'         => 'BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT',
				'title'      => 'TEXT NOT NULL',
				'price'      => 'DECIMAL(18,2) NOT NULL DEFAULT 0',
				'sale_price' => 'DECIMAL(18,2) NOT NULL DEFAULT 0',
				'status'     => 'VARCHAR(20) NOT NULL DEFAULT "draft"',

				'created_at' => 'DATETIME NULL',
				'updated_at' => 'DATETIME NULL',

			),

		);

	}

}

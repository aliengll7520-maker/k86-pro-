<?php
/**
 * K86 Pro Next Core
 * Product Service
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Service' ) ) {

	class K86_Product_Service {

		/**
		 * Engine Manager.
		 *
		 * @var K86_Engine_Manager
		 */
		protected $manager;

		/**
		 * Constructor.
		 *
		 * @param K86_Engine_Manager $manager Engine manager.
		 */
		public function __construct( K86_Engine_Manager $manager ) {

			$this->manager = $manager;

		}

		/**
		 * Get engine by name.
		 *
		 * @param string $name Engine name.
		 *
		 * @return object|null
		 */
		public function engine( $name ) {

			return $this->manager->get( $name );

		}

		/**
		 * Get complete product data.
		 *
		 * @return array
		 */
		public function get_product_data() {

			return array(
				'price'            => $this->get_current_price(),
				'in_stock'         => $this->is_in_stock(),
				'free_shipping'    => array(),
				'warranty'         => array(),
				'return_policy'    => array(),
				'voucher'          => array(),
				'countdown'        => array(),
				'stock_progress'   => array(),
				'trust'            => array(),
				'gallery'          => array(),
				'highlights'       => array(),
				'comparison'       => array(),
				'cta_buttons'      => array(),
				'rating'           => 0,
				'review_count'     => 0,
				'description'      => '',
				'video'            => '',
				'title'            => '',
			);

		}

		/**
		 * Get current price.
		 *
		 * @return float
		 */
		public function get_current_price() {

			$pricing = $this->pricing();

			if ( ! $pricing ) {
				return 0;
			}

			return $pricing->get_current_price();

		}

		/**
		 * Check stock.
		 *
		 * @return bool
		 */
		public function is_in_stock() {

			$inventory = $this->inventory();

			if ( ! $inventory ) {
				return false;
			}

			return $inventory->is_in_stock();

		}

		/**
		 * Shipping Engine.
		 *
		 * @return object|null
		 */
		public function shipping() {

			return $this->engine( 'shipping' );

		}

		/**
		 * Warranty Engine.
		 *
		 * @return object|null
		 */
		public function warranty() {

			return $this->engine( 'warranty' );

		}

		/**
		 * Return Policy Engine.
		 *
		 * @return object|null
		 */
		public function return_policy() {

			return $this->engine( 'return_policy' );

		}

		/**
		 * Review Engine.
		 *
		 * @return object|null
		 */
		public function review() {

			return $this->engine( 'review' );

		}

		/**
		 * Pricing Engine.
		 *
		 * @return object|null
		 */
		public function pricing() {

			return $this->engine( 'pricing' );

		}

		/**
		 * Inventory Engine.
		 *
		 * @return object|null
		 */
		public function inventory() {

			return $this->engine( 'inventory' );

		}

	}

}

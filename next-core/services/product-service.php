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
		 * @param K86_Engine_Manager $manager
		 */
		public function __construct( K86_Engine_Manager $manager ) {
			$this->manager = $manager;
		}

		/**
		 * Lấy Engine theo tên.
		 *
		 * @param string $name
		 * @return object|null
		 */
		public function engine( $name ) {
			return $this->manager->get( $name );
		}

		/**
		 * Lấy giá hiện tại.
		 *
		 * @return float
		 */
		public function get_current_price() {

			$pricing = $this->engine( 'pricing' );

			if ( ! $pricing ) {
				return 0;
			}

			return $pricing->get_current_price();
		}

		/**
		 * Kiểm tra còn hàng.
		 *
		 * @return bool
		 */
		public function is_in_stock() {

			$inventory = $this->engine( 'inventory' );

			if ( ! $inventory ) {
				return false;
			}

			return $inventory->is_in_stock();
		}

		/**
		 * Lấy Shipping Engine.
		 *
		 * @return K86_Shipping_Engine|null
		 */
		public function shipping() {
			return $this->engine( 'shipping' );
		}

		/**
		 * Lấy Warranty Engine.
		 *
		 * @return K86_Warranty_Engine|null
		 */
		public function warranty() {
			return $this->engine( 'warranty' );
		}

		/**
		 * Lấy Return Policy Engine.
		 *
		 * @return K86_Return_Policy_Engine|null
		 */
		public function return_policy() {
			return $this->engine( 'return_policy' );
		}

		/**
		 * Lấy Review Engine.
		 *
		 * @return K86_Review_Engine|null
		 */
		public function review() {
			return $this->engine( 'review' );
		}

		/**
		 * Lấy Pricing Engine.
		 *
		 * @return K86_Pricing_Engine|null
		 */
		public function pricing() {
			return $this->engine( 'pricing' );
		}

		/**
		 * Lấy Inventory Engine.
		 *
		 * @return K86_Inventory_Engine|null
		 */
		public function inventory() {
			return $this->engine( 'inventory' );
		}
	}
}

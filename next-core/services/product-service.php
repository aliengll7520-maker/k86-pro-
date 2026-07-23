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
		 * Product Repository.
		 *
		 * @var K86_Product_Repository
		 */
		protected $repository;

		/**
		 * Constructor.
		 *
		 * @param K86_Engine_Manager $manager Engine manager.
		 * @param K86_Product_Repository $repository Product repository.
		 */
		public function __construct(
			K86_Engine_Manager $manager,
			K86_Product_Repository $repository
		) {

			$this->manager    = $manager;
			$this->repository = $repository;

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
		 * Get repository.
		 *
		 * @return K86_Product_Repository
		 */
		public function repository() {

			return $this->repository;

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
	/**
	 * Get product rating.
	 *
	 * @return float
	 */
	public function get_rating() {

		$review = $this->review();

		return $review
			? $review->get_rating()
			: 0;

	}

	/**
	 * Get review count.
	 *
	 * @return int
	 */
	public function get_review_count() {

		$review = $this->review();

		return $review
			? $review->get_review_count()
			: 0;

	}

	/**
	 * Get shipping information.
	 *
	 * @return array
	 */
	public function get_shipping_data() {

		$shipping = $this->shipping();

		if ( ! $shipping ) {
			return array();
		}

		return array(
			'fee'      => $shipping->calculate_shipping_fee(),
			'free'     => $shipping->is_free_shipping(),
			'estimate' => $shipping->get_estimate(),
			'label'    => $shipping->get_shipping_label(),
		);

	}
			/**
	 * Get warranty information.
	 *
	 * @return array
	 */
	public function get_warranty_data() {

		$warranty = $this->warranty();

		return $warranty
			? $warranty->get_warranty_info()
			: array();

	}

	/**
	 * Get return policy information.
	 *
	 * @return array
	 */
	public function get_return_policy_data() {

		$return = $this->return_policy();

		return $return
			? $return->get_return_policy()
			: array();

	}

	/**
	 * Get inventory information.
	 *
	 * @return array
	 */
	public function get_inventory_data() {

		$inventory = $this->inventory();

		if ( ! $inventory ) {
			return array();
		}

		return array(
			'stock'    => $inventory->get_stock(),
			'status'   => $inventory->get_stock_status(),
			'in_stock' => $inventory->is_in_stock(),
		);

	}

	/**
	 * Check whether the product is available for sale.
	 *
	 * @return bool
	 */
	public function is_available_for_sale() {

		return $this->is_in_stock()
			&& $this->get_current_price() > 0;

	}
	}
}

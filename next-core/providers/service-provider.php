<?php
/**
 * K86 Pro Next Core
 * Service Provider
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Service_Provider' ) ) {

class K86_Service_Provider {

	/**
	 * Service Engine.
	 *
	 * @var Service_Engine
	 */
	protected $engine;

	/**
	 * Registered services.
	 *
	 * @var array
	 */
	protected $services = array();

	/**
	 * Constructor.
	 *
	 * @param Service_Engine $engine Service engine.
	 */
	public function __construct( $engine ) {

		$this->engine = $engine;

	}

	/**
	 * Register all services.
	 *
	 * @return void
	 */
	public function register() {

		$this->register_product_service();

		$this->register_pricing_service();

		$this->register_inventory_service();

		$this->register_shipping_service();

		$this->register_warranty_service();

		$this->register_return_service();

		$this->register_review_service();

	}

	/**
	 * Register Product Service.
	 *
	 * @return void
	 */
	protected function register_product_service() {

		$this->engine->register(
			'product',
			new Product_Service()
		);

	}

	/**
	 * Register Pricing Service.
	 *
	 * @return void
	 */
	protected function register_pricing_service() {

		$this->engine->register(
			'pricing',
			new Pricing_Service()
		);

	}

	/**
	 * Register Inventory Service.
	 *
	 * @return void
	 */
	protected function register_inventory_service() {

		$this->engine->register(
			'inventory',
			new Inventory_Service()
		);

	}

	/**
	 * Register Shipping Service.
	 *
	 * @return void
	 */
	protected function register_shipping_service() {

		$this->engine->register(
			'shipping',
			new Shipping_Service()
		);

	}

	/**
	 * Register Warranty Service.
	 *
	 * @return void
	 */
	protected function register_warranty_service() {

		$this->engine->register(
			'warranty',
			new Warranty_Service()
		);

	}

	/**
	 * Register Return Policy Service.
	 *
	 * @return void
	 */
	protected function register_return_service() {

		$this->engine->register(
			'return',
			new Return_Service()
		);

	}

	/**
	 * Register Review Service.
	 *
	 * @return void
	 */
	protected function register_review_service() {

		$this->engine->register(
			'review',
			new Review_Service()
		);

	}

	/**
	 * Register custom services.
	 *
	 * @return void
	 */
	protected function register_custom_services() {

		do_action(
			'k86_register_services',
			$this->engine,
			$this
		);

	}

	/**
	 * Boot provider.
	 *
	 * @return void
	 */
	public function boot() {

		$this->register();

		$this->register_custom_services();

		if ( method_exists( $this->engine, 'boot' ) ) {

			$this->engine->boot();

		}

		do_action(
			'k86_service_provider_boot',
			$this->engine,
			$this
		);

	}

	/**
	 * Shutdown provider.
	 *
	 * @return void
	 */
	public function shutdown() {

		if ( method_exists( $this->engine, 'shutdown' ) ) {

			$this->engine->shutdown();

		}

		do_action(
			'k86_service_provider_shutdown',
			$this->engine,
			$this
		);

	}

	/**
	 * Get Service Engine.
	 *
	 * @return Service_Engine
	 */
	public function engine() {

		return $this->engine;

	}

	/**
	 * Get Provider Version.
	 *
	 * @return string
	 */
	public function version() {

		return '2.0.0';

	}

}

}

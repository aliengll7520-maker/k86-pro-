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
	 * @var object|null
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
 * @param Service_Engine|null $engine Service engine.
 */
public function __construct( $engine = null ) {

	$this->engine = $engine;

}

/**
 * Register all services.
 *
 * @param object|null $container Container.
 * @param object|null $manager   Manager.
 *
 * @return void
 */
public function register( $container = null, $manager = null ) {

	if ( ! $this->engine && $manager ) {
		$this->engine = $manager;
	}

	if ( ! $this->engine ) {
		return;
	}

	$this->register_product_service();
	$this->register_pricing_service();
	$this->register_inventory_service();
	$this->register_shipping_service();
	$this->register_warranty_service();
	$this->register_return_service();
	$this->register_review_service();

}
	/**
 * Register a Service.
 *
 * @param string $name    Service name.
 * @param object $service Service instance.
 *
 * @return void
 */
protected function register_service( $name, $service ) {

	$this->engine->register(
		$name,
		$service
	);

	$this->services[ $name ] = $service;

}
/**
 * Register Product Service.
 */
protected function register_product_service() {

	$this->register_service(
		'product',
		new K86_Product_Service()
	);
$product_service = $this->services['product'];

$container = $this->registry->get( 'container' );

if ( $container ) {
    $container->instance( 'product_service', $product_service );
}
}

/**
 * Register Pricing Service.
 */
protected function register_pricing_service() {

	$this->register_service(
		'pricing',
		new K86_Pricing_Service()
	);

}

/**
 * Register Inventory Service.
 */
protected function register_inventory_service() {

	$this->register_service(
		'inventory',
		new K86_Inventory_Service()
	);

}

/**
 * Register Shipping Service.
 */
protected function register_shipping_service() {

	$this->register_service(
		'shipping',
		new K86_Shipping_Service()
	);

}

/**
 * Register Warranty Service.
 */
protected function register_warranty_service() {

	$this->register_service(
		'warranty',
		new K86_Warranty_Service()
	);

}

/**
 * Register Return Service.
 */
protected function register_return_service() {

	$this->register_service(
		'return',
		new K86_Return_Service()
	);

}

/**
 * Register Review Service.
 */
protected function register_review_service() {

	$this->register_service(
		'review',
		new K86_Review_Service()
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
 * Get registered services.
 *
 * @return array
 */
public function get_services() {

	return $this->services;

}

/**
 * Boot Service Provider.
 *
 * @return void
 */
public function boot() {

	if ( ! $this->engine ) {
		return;
	}


	$this->register_custom_services();

	do_action( 'k86_service_provider_boot', $this );

}

/**
 * Shutdown Service Provider.
 *
 * @return void
 */
public function shutdown() {

	do_action( 'k86_service_provider_shutdown', $this );

}

/**
 * Get Service Engine.
 *
 * @return object|null
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

} // End class.

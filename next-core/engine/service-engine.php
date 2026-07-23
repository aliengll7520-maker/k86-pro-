<?php
/**
 * Registered services.
 *
 * @var array
 */
protected $services = array();

/**
 * Constructor.
 */
public function __construct() {

	$this->register_default_services();

}

/**
 * Register default services.
 *
 * @return void
 */
protected function register_default_services() {

	$this->services = array(

		'product'   => null,
		'pricing'   => null,
		'inventory' => null,
		'shipping'  => null,
		'warranty'  => null,
		'return'    => null,
		'review'    => null,

	);

}

/**
 * Register service.
 *
 * @param string $name
 * @param object $service
 *
 * @return void
 */
public function register( $name, $service ) {

	$this->services[ $name ] = $service;

}

/**
 * Get service.
 *
 * @param string $name
 *
 * @return object|null
 */
public function get( $name ) {

	return $this->services[ $name ] ?? null;

}

/**
 * Check service exists.
 *
 * @param string $name
 *
 * @return bool
 */
public function has( $name ) {

	return isset( $this->services[ $name ] );

}
/**
 * Resolve service.
 *
 * @param string $name Service name.
 *
 * @return object|null
 */
public function resolve( $name ) {

	if ( ! $this->has( $name ) ) {
		return null;
	}

	$service = $this->get( $name );

	if ( is_object( $service ) ) {
		return $service;
	}

	/**
	 * Allow services to be created lazily.
	 */
	$service = apply_filters(
		'k86_service_engine_resolve',
		null,
		$name
	);

	if ( is_object( $service ) ) {

		$this->register(
			$name,
			$service
		);

		return $service;

	}

	return null;

}

/**
 * Remove service.
 *
 * @param string $name Service name.
 *
 * @return void
 */
public function unregister( $name ) {

	if ( isset( $this->services[ $name ] ) ) {

		unset(
			$this->services[ $name ]
		);

	}

}

/**
 * Get all services.
 *
 * @return array
 */
public function all() {

	return $this->services;

}

/**
 * Reset registry.
 *
 * @return void
 */
public function reset() {

	$this->services = array();

	$this->register_default_services();

}

/**
 * Count services.
 *
 * @return int
 */
public function count() {

	return count(
		$this->services
	);

}
/**
 * Get Product Service.
 *
 * @return object|null
 */
public function product() {

	return $this->resolve( 'product' );

}

/**
 * Get Pricing Service.
 *
 * @return object|null
 */
public function pricing() {

	return $this->resolve( 'pricing' );

}

/**
 * Get Inventory Service.
 *
 * @return object|null
 */
public function inventory() {

	return $this->resolve( 'inventory' );

}

/**
 * Get Shipping Service.
 *
 * @return object|null
 */
public function shipping() {

	return $this->resolve( 'shipping' );

}

/**
 * Get Warranty Service.
 *
 * @return object|null
 */
public function warranty() {

	return $this->resolve( 'warranty' );

}

/**
 * Get Return Policy Service.
 *
 * @return object|null
 */
public function returns() {

	return $this->resolve( 'return' );

}

/**
 * Get Review Service.
 *
 * @return object|null
 */
public function review() {

	return $this->resolve( 'review' );

}

/**
 * Check whether a service is ready.
 *
 * @param string $name Service name.
 *
 * @return bool
 */
public function ready( $name ) {

	return is_object(
		$this->resolve( $name )
	);

}

/**
 * Magic getter.
 *
 * @param string $name Service name.
 *
 * @return object|null
 */
public function __get( $name ) {

	return $this->resolve( $name );

}
/**
 * Bootstrap services.
 *
 * @return void
 */
public function boot() {

	foreach ( $this->services as $name => $service ) {

		if ( is_object( $service ) && method_exists( $service, 'boot' ) ) {

			$service->boot();

		}

	}

	/**
	 * Fires after all services have booted.
	 */
	do_action(
		'k86_service_engine_boot',
		$this
	);

}

/**
 * Shutdown services.
 *
 * @return void
 */
public function shutdown() {

	foreach ( $this->services as $service ) {

		if ( is_object( $service ) && method_exists( $service, 'shutdown' ) ) {

			$service->shutdown();

		}

	}

	do_action(
		'k86_service_engine_shutdown',
		$this
	);

}

/**
 * Export registered services.
 *
 * @return array
 */
public function export() {

	return apply_filters(
		'k86_service_engine_export',
		$this->services,
		$this
	);

}

/**
 * Import registered services.
 *
 * @param array $services Services.
 *
 * @return void
 */
public function import( array $services ) {

	foreach ( $services as $name => $service ) {

		$this->register(
			$name,
			$service
		);

	}

}

/**
 * Get engine version.
 *
 * @return string
 */
public function version() {

	return '2.0.0';

}

}

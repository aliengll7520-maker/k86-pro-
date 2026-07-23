<?php
/**
 * Service Engine instance.
 *
 * @var Service_Engine|null
 */
protected static $engine = null;

/**
 * Set Service Engine.
 *
 * @param Service_Engine $engine Engine.
 *
 * @return void
 */
public static function set_engine( $engine ) {

	self::$engine = $engine;

}

/**
 * Get Service Engine.
 *
 * @return Service_Engine|null
 */
public static function engine() {

	return self::$engine;

}

/**
 * Check engine.
 *
 * @return bool
 */
public static function ready() {

	return self::$engine instanceof Service_Engine;

}
/**
 * Get Product Service.
 *
 * @return object|null
 */
public static function product() {

	return self::ready()
		? self::engine()->product()
		: null;

}

/**
 * Get Pricing Service.
 *
 * @return object|null
 */
public static function pricing() {

	return self::ready()
		? self::engine()->pricing()
		: null;

}

/**
 * Get Inventory Service.
 *
 * @return object|null
 */
public static function inventory() {

	return self::ready()
		? self::engine()->inventory()
		: null;

}

/**
 * Get Shipping Service.
 *
 * @return object|null
 */
public static function shipping() {

	return self::ready()
		? self::engine()->shipping()
		: null;

}

/**
 * Get Warranty Service.
 *
 * @return object|null
 */
public static function warranty() {

	return self::ready()
		? self::engine()->warranty()
		: null;

}

/**
 * Get Return Policy Service.
 *
 * @return object|null
 */
public static function returns() {

	return self::ready()
		? self::engine()->returns()
		: null;

}

/**
 * Get Review Service.
 *
 * @return object|null
 */
public static function review() {

	return self::ready()
		? self::engine()->review()
		: null;

}
/**
 * Get service by name.
 *
 * @param string $name Service name.
 * @return object|null
 */
public static function get( $name ) {

	if ( ! self::ready() ) {
		return null;
	}

	return self::engine()->get( $name );

}

/**
 * Resolve service.
 *
 * @param string $name Service name.
 * @return object|null
 */
public static function resolve( $name ) {

	if ( ! self::ready() ) {
		return null;
	}

	return self::engine()->resolve( $name );

}

/**
 * Check service exists.
 *
 * @param string $name Service name.
 * @return bool
 */
public static function has( $name ) {

	if ( ! self::ready() ) {
		return false;
	}

	return self::engine()->has( $name );

}

/**
 * Register service.
 *
 * @param string $name    Service name.
 * @param object $service Service instance.
 *
 * @return void
 */
public static function register( $name, $service ) {

	if ( ! self::ready() ) {
		return;
	}

	self::engine()->register(
		$name,
		$service
	);

}

/**
 * Remove service.
 *
 * @param string $name Service name.
 *
 * @return void
 */
public static function unregister( $name ) {

	if ( ! self::ready() ) {
		return;
	}

	self::engine()->unregister( $name );

}
/**
 * Get all registered services.
 *
 * @return array
 */
public static function all() {

	if ( ! self::ready() ) {
		return array();
	}

	return self::engine()->all();

}

/**
 * Reset Service Engine.
 *
 * @return void
 */
public static function reset() {

	if ( ! self::ready() ) {
		return;
	}

	self::engine()->reset();

}

/**
 * Boot Service Engine.
 *
 * @return void
 */
public static function boot() {

	if ( ! self::ready() ) {
		return;
	}

	self::engine()->boot();

}

/**
 * Shutdown Service Engine.
 *
 * @return void
 */
public static function shutdown() {

	if ( ! self::ready() ) {
		return;
	}

	self::engine()->shutdown();

}

/**
 * Get SDK version.
 *
 * @return string
 */
public static function version() {

	return '2.0.0';

}

/**
 * Magic static service resolver.
 *
 * @param string $name
 * @param array  $arguments
 *
 * @return mixed|null
 */
public static function __callStatic( $name, $arguments ) {

	if ( ! self::ready() ) {
		return null;
	}

	if ( self::has( $name ) ) {
		return self::resolve( $name );
	}

	return null;

}

}

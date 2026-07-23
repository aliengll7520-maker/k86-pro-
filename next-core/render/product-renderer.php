<?php
/**
 * Registered modules.
 *
 * @var array
 */
protected $modules = array();

/**
 * Product Service.
 *
 * @var Product_Service|null
 */
protected $service = null;

/**
 * Constructor.
 *
 * @param Product_Service $service Product service.
 */
public function __construct( $service = null ) {

	$this->service = $service;

	$this->register_default_modules();

}

/**
 * Register default modules.
 *
 * @return void
 */
protected function register_default_modules() {

	$this->modules = array(

		'title',
		'video',
		'gallery',
		'highlights',
		'rating',
		'reviews',
		'description',
		'compare',
		'voucher',
		'countdown',
		'stock',
		'shipping',
		'return-policy',
		'warranty',

	);

}

/**
 * Get Product Service.
 *
 * @return Product_Service|null
 */
public function service() {

	return $this->service;

}
/**
 * Render product.
 *
 * @param int $product_id Product ID.
 *
 * @return string
 */
public function render( $product_id ) {

	if ( ! $this->service ) {
		return '';
	}

	$data = $this->service->get_product_data( $product_id );

	ob_start();

	echo '<div class="k86-product-renderer">';

	foreach ( $this->modules as $module ) {

		$this->render_module(
			$module,
			$product_id,
			$data
		);

	}

	echo '</div>';

	return ob_get_clean();

}

/**
 * Render module.
 *
 * @param string $module
 * @param int    $product_id
 * @param array  $data
 *
 * @return void
 */
protected function render_module(
	$module,
	$product_id,
	array $data
) {

	do_action(
		'k86_render_product_module',
		$module,
		$product_id,
		$data,
		$this
	);

}
/**
 * Register module.
 *
 * @param string $module Module name.
 *
 * @return void
 */
public function register_module( $module ) {

	if ( ! in_array( $module, $this->modules, true ) ) {

		$this->modules[] = $module;

	}

}

/**
 * Remove module.
 *
 * @param string $module Module name.
 *
 * @return void
 */
public function unregister_module( $module ) {

	$key = array_search(
		$module,
		$this->modules,
		true
	);

	if ( false !== $key ) {

		unset( $this->modules[ $key ] );

		$this->modules = array_values(
			$this->modules
		);

	}

}

/**
 * Check module exists.
 *
 * @param string $module Module name.
 *
 * @return bool
 */
public function has_module( $module ) {

	return in_array(
		$module,
		$this->modules,
		true
	);

}

/**
 * Get all modules.
 *
 * @return array
 */
public function get_modules() {

	return $this->modules;

}

/**
 * Set modules.
 *
 * @param array $modules Module list.
 *
 * @return void
 */
public function set_modules( array $modules ) {

	$this->modules = array_values(
		array_unique( $modules )
	);

}

/**
 * Get module count.
 *
 * @return int
 */
public function module_count() {

	return count(
		$this->modules
	);

}
/**
 * Boot renderer.
 *
 * @return void
 */
public function boot() {

	do_action(
		'k86_product_renderer_boot',
		$this
	);

}

/**
 * Shutdown renderer.
 *
 * @return void
 */
public function shutdown() {

	do_action(
		'k86_product_renderer_shutdown',
		$this
	);

}

/**
 * Render before hook.
 *
 * @param int $product_id Product ID.
 *
 * @return void
 */
protected function before_render( $product_id ) {

	do_action(
		'k86_before_product_render',
		$product_id,
		$this
	);

}

/**
 * Render after hook.
 *
 * @param int $product_id Product ID.
 *
 * @return void
 */
protected function after_render( $product_id ) {

	do_action(
		'k86_after_product_render',
		$product_id,
		$this
	);

}

/**
 * Get renderer version.
 *
 * @return string
 */
public function version() {

	return '2.0.0';

}

}

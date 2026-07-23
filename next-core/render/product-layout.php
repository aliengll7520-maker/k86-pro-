<?php
/**
 * Layout ID.
 *
 * @var string
 */
protected $layout = 'default';

/**
 * Layout sections.
 *
 * @var array
 */
protected $sections = array();

/**
 * Constructor.
 *
 * @param string $layout Layout name.
 */
public function __construct( $layout = 'default' ) {

	$this->layout = $layout;

	$this->register_default_sections();

}

/**
 * Register default sections.
 *
 * @return void
 */
protected function register_default_sections() {

	$this->sections = array(

		'header',
		'media',
		'summary',
		'pricing',
		'promotion',
		'purchase',
		'service',
		'description',
		'extra',

	);

}

/**
 * Get current layout.
 *
 * @return string
 */
public function get_layout() {

	return $this->layout;

}

/**
 * Set current layout.
 *
 * @param string $layout Layout name.
 *
 * @return void
 */
public function set_layout( $layout ) {

	$this->layout = sanitize_key( $layout );

}
/**
 * Register section.
 *
 * @param string $section Section name.
 *
 * @return void
 */
public function register_section( $section ) {

	if ( ! in_array( $section, $this->sections, true ) ) {
		$this->sections[] = sanitize_key( $section );
	}

}

/**
 * Remove section.
 *
 * @param string $section Section name.
 *
 * @return void
 */
public function unregister_section( $section ) {

	$key = array_search( $section, $this->sections, true );

	if ( false !== $key ) {

		unset( $this->sections[ $key ] );

		$this->sections = array_values( $this->sections );

	}

}

/**
 * Check section exists.
 *
 * @param string $section Section name.
 *
 * @return bool
 */
public function has_section( $section ) {

	return in_array( $section, $this->sections, true );

}

/**
 * Get all sections.
 *
 * @return array
 */
public function get_sections() {

	return $this->sections;

}

/**
 * Set sections.
 *
 * @param array $sections Section list.
 *
 * @return void
 */
public function set_sections( array $sections ) {

	$this->sections = array_values(
		array_unique(
			array_map( 'sanitize_key', $sections )
		)
	);

}

/**
 * Get section count.
 *
 * @return int
 */
public function section_count() {

	return count( $this->sections );

}
/**
 * Render layout.
 *
 * @param int   $product_id Product ID.
 * @param array $data       Product data.
 *
 * @return string
 */
public function render( $product_id, array $data = array() ) {

	ob_start();

	echo '<div class="k86-product-layout k86-layout-' . esc_attr( $this->layout ) . '">';

	foreach ( $this->sections as $section ) {

		$this->render_section(
			$section,
			$product_id,
			$data
		);

	}

	echo '</div>';

	return ob_get_clean();

}

/**
 * Render section.
 *
 * @param string $section
 * @param int    $product_id
 * @param array  $data
 *
 * @return void
 */
protected function render_section(
	$section,
	$product_id,
	array $data
) {

	do_action(
		'k86_before_layout_section',
		$section,
		$product_id,
		$data,
		$this
	);

	do_action(
		'k86_render_layout_section',
		$section,
		$product_id,
		$data,
		$this
	);

	do_action(
		'k86_after_layout_section',
		$section,
		$product_id,
		$data,
		$this
	);

}
/**
 * Boot layout.
 *
 * @return void
 */
public function boot() {

	do_action(
		'k86_product_layout_boot',
		$this
	);

}

/**
 * Shutdown layout.
 *
 * @return void
 */
public function shutdown() {

	do_action(
		'k86_product_layout_shutdown',
		$this
	);

}

/**
 * Get layout version.
 *
 * @return string
 */
public function version() {

	return '2.0.0';

}

/**
 * Magic getter.
 *
 * @param string $name Property name.
 *
 * @return mixed|null
 */
public function __get( $name ) {

	if ( property_exists( $this, $name ) ) {
		return $this->$name;
	}

	return null;

}

/**
 * Export layout configuration.
 *
 * @return array
 */
public function to_array() {

	return array(
		'layout'  => $this->layout,
		'sections' => $this->sections,
		'version' => $this->version(),
	);

}

}

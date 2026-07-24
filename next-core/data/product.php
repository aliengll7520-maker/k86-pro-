<?php
/**
 * K86 Product Model
 *
 * @package K86Pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Product {

	/**
	 * Product data.
	 *
	 * @var array
	 */
	protected $data = array();

	/**
	 * Constructor.
	 *
	 * @param array $data Initial product data.
	 */
	public function __construct( array $data = array() ) {
		$this->data = $data;
	}

	/**
	 * Get a field.
	 *
	 * @param string $field Field name.
	 * @param mixed  $default Default value.
	 * @return mixed
	 */
	public function get( $field, $default = null ) {
		return isset( $this->data[ $field ] ) ? $this->data[ $field ] : $default;
	}

	/**
	 * Set a field.
	 *
	 * @param string $field Field name.
	 * @param mixed  $value Value.
	 * @return self
	 */
	public function set( $field, $value ) {
		$this->data[ $field ] = $value;
		return $this;
	}

	/**
	 * Check field exists.
	 *
	 * @param string $field Field name.
	 * @return bool
	 */
	public function has( $field ) {
		return array_key_exists( $field, $this->data );
	}

	/**
	 * Export to array.
	 *
	 * @return array
	 */
	public function to_array() {
		return $this->data;
	}

	/**
	 * Create from array.
	 *
	 * @param array $data Product data.
	 * @return self
	 */
	public static function from_array( array $data ) {
		return new self( $data );
	}

	/**
	 * Basic validation.
	 *
	 * @return bool
	 */
	public function validate() {
		return ! empty( $this->data );
	}
}

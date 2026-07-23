<?php
/**
 * K86 Pro - Kernel Registry
 *
 * Registry dedicated to Kernel runtime data.
 *
 * @package K86Pro
 * @since 1.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Kernel_Registry {

	/**
	 * Registry items.
	 *
	 * @var array
	 */
	protected $items = array();

	/**
	 * Store a value.
	 *
	 * @param string $key
	 * @param mixed  $value
	 *
	 * @return void
	 */
	public function set( $key, $value ) {
		$this->items[ $key ] = $value;
	}

	/**
	 * Get a value.
	 *
	 * @param string $key
	 * @param mixed  $default
	 *
	 * @return mixed
	 */
	public function get( $key, $default = null ) {

		if ( array_key_exists( $key, $this->items ) ) {
			return $this->items[ $key ];
		}

		return $default;
	}

	/**
	 * Check if a key exists.
	 *
	 * @param string $key
	 *
	 * @return bool
	 */
	public function has( $key ) {
		return array_key_exists( $key, $this->items );
  }
  	/**
	 * Remove an item.
	 *
	 * @param string $key Registry key.
	 *
	 * @return void
	 */
	public function remove( $key ) {

		if ( isset( $this->items[ $key ] ) ) {
			unset( $this->items[ $key ] );
		}
	}

	/**
	 * Get all registry items.
	 *
	 * @return array
	 */
	public function all() {
		return $this->items;
	}

	/**
	 * Count registry items.
	 *
	 * @return int
	 */
	public function count() {
		return count( $this->items );
	}

	/**
	 * Clear registry.
	 *
	 * @return void
	 */
	public function clear() {
		$this->items = array();
	}

	/**
	 * Check whether registry is empty.
	 *
	 * @return bool
	 */
	public function isEmpty() {
		return empty( $this->items );
	}

	/**
	 * Get all registry keys.
	 *
	 * @return array
	 */
	public function keys() {
		return array_keys( $this->items );
	}
}

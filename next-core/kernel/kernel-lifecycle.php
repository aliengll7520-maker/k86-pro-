<?php
/**
 * K86 Pro - Kernel Lifecycle
 *
 * Manages the lifecycle state of the Kernel.
 *
 * @package K86Pro
 * @since 1.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Kernel_Lifecycle {

	/**
	 * Lifecycle states.
	 */
	const CREATED       = 'created';
	const BOOTING       = 'booting';
	const BOOTED        = 'booted';
	const RUNNING       = 'running';
	const SHUTTING_DOWN = 'shutting_down';
	const SHUTDOWN      = 'shutdown';

	/**
	 * Current state.
	 *
	 * @var string
	 */
	protected $state = self::CREATED;

	/**
	 * Get current state.
	 *
	 * @return string
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Set state.
	 *
	 * @param string $state Lifecycle state.
	 *
	 * @return void
	 */
	public function setState( $state ) {

		$this->state = $state;

		do_action(
			'k86_kernel_state_changed',
			$state,
			$this
		);
	}

	/**
	 * Check current state.
	 *
	 * @param string $state State to compare.
	 *
	 * @return bool
	 */
	public function is( $state ) {
		return $this->state === $state;
  }
  	/**
	 * Check if state is CREATED.
	 *
	 * @return bool
	 */
	public function isCreated() {
		return $this->state === self::CREATED;
	}

	/**
	 * Check if state is BOOTING.
	 *
	 * @return bool
	 */
	public function isBooting() {
		return $this->state === self::BOOTING;
	}

	/**
	 * Check if state is BOOTED.
	 *
	 * @return bool
	 */
	public function isBooted() {
		return $this->state === self::BOOTED;
	}

	/**
	 * Check if state is RUNNING.
	 *
	 * @return bool
	 */
	public function isRunning() {
		return $this->state === self::RUNNING;
	}

	/**
	 * Check if state is SHUTTING_DOWN.
	 *
	 * @return bool
	 */
	public function isShuttingDown() {
		return $this->state === self::SHUTTING_DOWN;
	}

	/**
	 * Check if state is SHUTDOWN.
	 *
	 * @return bool
	 */
	public function isShutdown() {
		return $this->state === self::SHUTDOWN;
	}

	/**
	 * Reset lifecycle to CREATED state.
	 *
	 * @return void
	 */
	public function reset() {

		$this->state = self::CREATED;

		do_action(
			'k86_kernel_lifecycle_reset',
			$this
		);
	}
}

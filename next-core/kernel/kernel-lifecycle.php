<?php
/**
 * K86 Pro - Kernel Lifecycle
 *
 * Manages the lifecycle state of the Kernel.
 *
 * @package K86Pro
 * @since   1.6.0
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
	 * Current lifecycle state.
	 *
	 * @var string
	 */
	protected $state = self::CREATED;

	/**
	 * Get current lifecycle state.
	 *
	 * @return string
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * Set lifecycle state.
	 *
	 * @param string $state New lifecycle state.
	 *
	 * @return void
	 */
	public function setState( $state ) {

		$previous_state = $this->state;

		$this->state = $state;

		do_action(
			'k86_kernel_state_changed',
			$state,
			$previous_state,
			$this
		);
	}
		/**
	 * Check whether the lifecycle is in a specific state.
	 *
	 * @param string $state Lifecycle state.
	 *
	 * @return bool
	 */
	public function is( $state ) {
		return $this->state === $state;
	}

	/**
	 * Check whether the lifecycle has been created.
	 *
	 * @return bool
	 */
	public function isCreated() {
		return $this->is( self::CREATED );
	}

	/**
	 * Check whether the lifecycle is booting.
	 *
	 * @return bool
	 */
	public function isBooting() {
		return $this->is( self::BOOTING );
	}

	/**
	 * Check whether the lifecycle has booted.
	 *
	 * @return bool
	 */
	public function isBooted() {
		return $this->is( self::BOOTED );
	}

	/**
	 * Check whether the lifecycle is running.
	 *
	 * @return bool
	 */
	public function isRunning() {
		return $this->is( self::RUNNING );
	}

	/**
	 * Check whether the lifecycle is shutting down.
	 *
	 * @return bool
	 */
	public function isShuttingDown() {
		return $this->is( self::SHUTTING_DOWN );
	}

	/**
	 * Check whether the lifecycle has shutdown.
	 *
	 * @return bool
	 */
	public function isShutdown() {
		return $this->is( self::SHUTDOWN );
	}

	/**
	 * Reset lifecycle.
	 *
	 * @return void
	 */
	public function reset() {
		$this->setState( self::CREATED );
	}

}

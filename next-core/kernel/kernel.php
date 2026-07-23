<?php
/**
 * K86 Pro - Next Core Kernel
 *
 * Central coordinator for the Next Core framework.
 *
 * @package K86Pro
 * @since 1.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Kernel {

	/**
	 * Service Container.
	 *
	 * @var K86_Container
	 */
	protected $container;

	/**
	 * Global Registry.
	 *
	 * @var K86_Registry
	 */
	protected $registry;

	/**
	 * Engine Manager.
	 *
	 * @var K86_Engine_Manager
	 */
	protected $engine_manager;

	/**
	 * Module Registry.
	 *
	 * @var K86_Module_Registry
	 */
	protected $module_registry;

	/**
	 * Kernel boot status.
	 *
	 * @var bool
	 */
	protected $booted = false;

	/**
	 * Kernel running status.
	 *
	 * @var bool
	 */
	protected $running = false;

	/**
	 * Constructor.
	 *
	 * @param K86_Container       $container
	 * @param K86_Registry        $registry
	 * @param K86_Engine_Manager  $engine_manager
	 * @param K86_Module_Registry $module_registry
	 */
	public function __construct(
		K86_Container $container,
		K86_Registry $registry,
		K86_Engine_Manager $engine_manager,
		K86_Module_Registry $module_registry
	) {
		$this->container       = $container;
		$this->registry        = $registry;
		$this->engine_manager  = $engine_manager;
		$this->module_registry = $module_registry;
  }

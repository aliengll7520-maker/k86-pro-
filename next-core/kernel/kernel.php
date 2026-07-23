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

	/**
	 * Boot Kernel.
	 *
	 * @return void
	 */
	public function boot() {

		if ( $this->booted ) {
			return;
		}

		do_action( 'k86_kernel_before_boot', $this );

		$this->initialize();

		$this->register_managers();

		$this->booted = true;

		do_action( 'k86_kernel_booted', $this );

		$this->start();
	}

	/**
	 * Initialize kernel dependencies.
	 *
	 * @throws RuntimeException When a required component is missing.
	 *
	 * @return void
	 */
	protected function initialize() {

		if ( ! $this->container ) {
			throw new RuntimeException( 'K86 Kernel: Container is missing.' );
		}

		if ( ! $this->registry ) {
			throw new RuntimeException( 'K86 Kernel: Registry is missing.' );
		}

		if ( ! $this->engine_manager ) {
			throw new RuntimeException( 'K86 Kernel: Engine Manager is missing.' );
		}

		if ( ! $this->module_registry ) {
			throw new RuntimeException( 'K86 Kernel: Module Registry is missing.' );
		}

		do_action( 'k86_kernel_initialized', $this );
	}
		/**
	 * Register core managers into Registry.
	 *
	 * @return void
	 */
	protected function register_managers() {

		if ( ! $this->registry->has( 'container' ) ) {
			$this->registry->set( 'container', $this->container );
		}

		if ( ! $this->registry->has( 'engine_manager' ) ) {
			$this->registry->set( 'engine_manager', $this->engine_manager );
		}

		if ( ! $this->registry->has( 'module_registry' ) ) {
			$this->registry->set( 'module_registry', $this->module_registry );
		}

		do_action( 'k86_kernel_managers_registered', $this );
	}

	/**
	 * Start Kernel.
	 *
	 * @return void
	 */
	protected function start() {

		if ( $this->running ) {
			return;
		}

		do_action( 'k86_kernel_before_start', $this );

		/*
		 * Engine và Module sẽ tự khởi động thông qua
		 * Engine Manager và Module Registry.
		 * Kernel chỉ đóng vai trò điều phối.
		 */

		$this->running = true;

		do_action( 'k86_kernel_running', $this );
	}

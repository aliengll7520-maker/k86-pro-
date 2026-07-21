<?php
/**
 * K86 Pro Next Core
 * Module Registry
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Module_Registry' ) ) {

	class K86_Module_Registry {

		/**
		 * Registered modules.
		 *
		 * @var array
		 */
		protected $modules = array();

		/**
		 * Register a module.
		 *
		 * @param string $name   Module name.
		 * @param object $module Module instance.
		 *
		 * @return $this
		 */
		public function register( $name, $module ) {

			$this->modules[ $name ] = $module;

			return $this;

		}

		/**
		 * Get a module.
		 *
		 * @param string $name Module name.
		 *
		 * @return object|null
		 */
		public function get( $name ) {

			return $this->modules[ $name ] ?? null;

		}

		/**
		 * Check whether a module exists.
		 *
		 * @param string $name Module name.
		 *
		 * @return bool
		 */
		public function has( $name ) {

			return isset( $this->modules[ $name ] );

		}

		/**
		 * Get all registered modules.
		 *
		 * @return array
		 */
		public function all() {

			return $this->modules;

		}

		/**
		 * Get module names.
		 *
		 * @return array
		 */
		public function names() {

			return array_keys( $this->modules );

		}

		/**
		 * Remove a module.
		 *
		 * @param string $name Module name.
		 *
		 * @return bool
		 */
		public function remove( $name ) {

			if ( ! $this->has( $name ) ) {
				return false;
			}

			unset( $this->modules[ $name ] );

			return true;

		}

		/**
		 * Remove all modules.
		 *
		 * @return $this
		 */
		public function clear() {

			$this->modules = array();

			return $this;

		}

		/**
		 * Count modules.
		 *
		 * @return int
		 */
		public function count() {

			return count( $this->modules );

		}

		/**
		 * Check whether registry is empty.
		 *
		 * @return bool
		 */
		public function is_empty() {

			return empty( $this->modules );

		}

		/**
		 * Check whether module can render.
		 *
		 * @param object $module Module instance.
		 *
		 * @return bool
		 */
		public function can_render( $module ) {

			return is_object( $module )
				&& method_exists( $module, 'render' );

		}

		/**
		 * Check whether module supports priority().
		 *
		 * @param object $module Module instance.
		 *
		 * @return bool
		 */
		public function has_priority( $module ) {

			return is_object( $module )
				&& method_exists( $module, 'priority' );

		}

		/**
		 * Get module priority.
		 *
		 * @param object $module Module instance.
		 *
		 * @return int
		 */
		public function get_priority( $module ) {

			if ( ! $this->has_priority( $module ) ) {
				return PHP_INT_MAX;
			}

			return (int) $module->priority();

		}

		/**
		 * Get modules sorted by priority.
		 *
		 * @return array
		 */
		public function ordered() {

			$modules = $this->modules;

			uasort(
				$modules,
				function ( $a, $b ) {

					return $this->get_priority( $a ) <=> $this->get_priority( $b );

				}
			);

			return $modules;

		}
				/**
		 * Render modules using pipeline.
		 *
		 * @param array $pipeline Pipeline definition.
		 * @param array $product  Product data.
		 *
		 * @return string
		 */
		public function render_pipeline(
			array $pipeline,
			array $product = array()
		) {

			$this->before_render();

			$output = '';

			if ( empty( $pipeline['sections'] ) ) {

				$this->after_render();

				return $output;

			}

			foreach ( $pipeline['sections'] as $section => $slots ) {

				$output .= $this->render_section(
					$section,
					$slots,
					$product
				);

			}

			$this->after_render();

			return $output;

		}

		/**
		 * Render a section.
		 *
		 * @param string $section Section name.
		 * @param array  $slots   Slot definitions.
		 * @param array  $product Product data.
		 *
		 * @return string
		 */
		public function render_section(
			$section,
			array $slots,
			array $product = array()
		) {

			$this->before_section( $section );

			$output = '';

			foreach ( $slots as $slot => $module ) {

				$output .= $this->render_slot(
					$slot,
					$module,
					$product
				);

			}

			$this->after_section( $section );

			return $output;

		}

		/**
		 * Render a slot.
		 *
		 * @param string $slot    Slot name.
		 * @param mixed  $module  Module instance.
		 * @param array  $product Product data.
		 *
		 * @return string
		 */
		public function render_slot(
			$slot,
			$module,
			array $product = array()
		) {

			$this->before_slot( $slot );

			if ( ! $this->can_render( $module ) ) {

				$this->after_slot( $slot );

				return '';

			}

			$output = $module->render( $product );

			$this->after_slot( $slot );

			return $output;

		}

		/**
		 * Render all registered modules.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render_all(
			array $product = array()
		) {

			$output = '';

			foreach ( $this->ordered() as $module ) {

				if ( ! $this->can_render( $module ) ) {
					continue;
				}

				$output .= $module->render( $product );

			}

			return $output;

		}
			/**
		 * Before render hook.
		 *
		 * Reserved for future extensions.
		 *
		 * @return void
		 */
		protected function before_render() {}

		/**
		 * After render hook.
		 *
		 * Reserved for future extensions.
		 *
		 * @return void
		 */
		protected function after_render() {}

		/**
		 * Before section hook.
		 *
		 * @param string $section Section name.
		 *
		 * @return void
		 */
		protected function before_section( $section ) {}

		/**
		 * After section hook.
		 *
		 * @param string $section Section name.
		 *
		 * @return void
		 */
		protected function after_section( $section ) {}

		/**
		 * Before slot hook.
		 *
		 * @param string $slot Slot name.
		 *
		 * @return void
		 */
		protected function before_slot( $slot ) {}

		/**
		 * After slot hook.
		 *
		 * @param string $slot Slot name.
		 *
		 * @return void
		 */
		protected function after_slot( $slot ) {}

	}

}

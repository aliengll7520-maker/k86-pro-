<?php
/**
 * K86 Pro Next Core
 *
 * HTML Builder
 *
 * Builds HTML output from Render Context,
 * Wrapper and UI components.
 *
 * @package K86Pro
 * @since 2.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_HTML_Builder' ) ) {

	class K86_HTML_Builder {

		/**
		 * Render Context.
		 *
		 * @var K86_Render_Context|null
		 */
		protected $context = null;

		/**
		 * Wrapper.
		 *
		 * @var K86_Wrapper|null
		 */
		protected $wrapper = null;

		/**
		 * HTML Attributes.
		 *
		 * @var K86_HTML_Attributes|null
		 */
		protected $attributes = null;

		/**
		 * CSS Class Manager.
		 *
		 * @var K86_CSS_Class_Manager|null
		 */
		protected $classes = null;

		/**
		 * Constructor.
		 *
		 * @param K86_Render_Context    $context    Render context.
		 * @param K86_Wrapper           $wrapper    Wrapper.
		 * @param K86_HTML_Attributes   $attributes Attributes.
		 * @param K86_CSS_Class_Manager $classes    CSS classes.
		 */
		public function __construct(
			$context = null,
			$wrapper = null,
			$attributes = null,
			$classes = null
		) {

			$this->context    = $context;
			$this->wrapper    = $wrapper;
			$this->attributes = $attributes;
			$this->classes    = $classes;

		}

		/**
		 * Render.
		 *
		 * @return string
		 */
		public function render() {

			$output = '';

			$output .= $this->render_layout();

			return $output;

		}

		/**
		 * Render layout.
		 *
		 * @return string
		 */
		public function render_layout() {

			$content = '';

			$content .= $this->render_sections();

			return $this->wrapper->container(
				$content
			);

		}

		/**
		 * Render all sections.
		 *
		 * @return string
		 */
		protected function render_sections() {

			$output = '';

			$sections = $this->context->get(
				'sections',
				array()
			);

			foreach ( $sections as $section ) {

				$output .= $this->render_section(
					$section
				);

			}

			return $output;

    }
    		/**
		 * Render section.
		 *
		 * @param string $section Section name.
		 *
		 * @return string
		 */
		protected function render_section( $section ) {

			$output = '';

			$slots = $this->context->get(
				'section.' . $section . '.slots',
				array()
			);

			foreach ( $slots as $slot ) {

				$output .= $this->render_slot(
					$slot
				);

			}

			return $this->wrapper->section(
				$output
			);

		}

		/**
		 * Render slot.
		 *
		 * @param string $slot Slot name.
		 *
		 * @return string
		 */
		protected function render_slot( $slot ) {

			$output = '';

			$modules = $this->context->get(
				'slot.' . $slot . '.modules',
				array()
			);

			foreach ( $modules as $module ) {

				$output .= $this->render_module(
					$module
				);

			}

			return $this->wrapper->build(
				$output
			);

		}

		/**
		 * Render module.
		 *
		 * @param object $module Module instance.
		 *
		 * @return string
		 */
		protected function render_module( $module ) {

			if ( ! is_object( $module ) ) {
				return '';
			}

			if ( ! method_exists( $module, 'render' ) ) {
				return '';
			}

			return $module->render(
				$this->context->all()
			);

    }
    		/**
		 * Before render.
		 *
		 * Reserved for future extensions.
		 *
		 * @return void
		 */
		protected function before_render() {}

		/**
		 * After render.
		 *
		 * Reserved for future extensions.
		 *
		 * @return void
		 */
		protected function after_render() {}

		/**
		 * Before section.
		 *
		 * @param string $section Section name.
		 *
		 * @return void
		 */
		protected function before_section( $section ) {}

		/**
		 * After section.
		 *
		 * @param string $section Section name.
		 *
		 * @return void
		 */
		protected function after_section( $section ) {}

		/**
		 * Before slot.
		 *
		 * @param string $slot Slot name.
		 *
		 * @return void
		 */
		protected function before_slot( $slot ) {}

		/**
		 * After slot.
		 *
		 * @param string $slot Slot name.
		 *
		 * @return void
		 */
		protected function after_slot( $slot ) {}

		/**
		 * Before module.
		 *
		 * @param object $module Module instance.
		 *
		 * @return void
		 */
		protected function before_module( $module ) {}

		/**
		 * After module.
		 *
		 * @param object $module Module instance.
		 *
		 * @return void
		 */
		protected function after_module( $module ) {}

		/**
		 * Convert builder to HTML.
		 *
		 * @return string
		 */
		public function build() {

			$this->before_render();

			$html = $this->render();

			$this->after_render();

			return $html;

		}

	}

}

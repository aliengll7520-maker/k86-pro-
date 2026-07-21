<?php
/**
 * K86 Pro Next Core
 * Render Pipeline
 *
 * Điều phối toàn bộ quá trình dựng giao diện Product.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Render_Pipeline' ) ) {

	class K86_Render_Pipeline {

		/**
		 * Template Manager.
		 *
		 * @var K86_Template_Manager
		 */
		protected $template_manager;

		/**
		 * Layout Manager.
		 *
		 * @var K86_Layout_Manager
		 */
		protected $layout_manager;

		/**
		 * Section Manager.
		 *
		 * @var K86_Section_Manager
		 */
		protected $section_manager;

		/**
		 * Slot Manager.
		 *
		 * @var K86_Slot_Manager
		 */
		protected $slot_manager;

		/**
		 * Module Registry.
		 *
		 * @var object
		 */
		protected $module_registry;

		/**
		 * Constructor.
		 */
		public function __construct(
			$template_manager,
			$layout_manager,
			$section_manager,
			$slot_manager,
			$module_registry
		) {

			$this->template_manager = $template_manager;
			$this->layout_manager   = $layout_manager;
			$this->section_manager  = $section_manager;
			$this->slot_manager     = $slot_manager;
			$this->module_registry  = $module_registry;

		}

		/**
		 * Xây dựng Pipeline.
		 *
		 * @return array
		 */
		public function build() {

			$pipeline = array();

			$template = $this->template_manager->get_template();

			$layout = $this->template_manager->get_layout();

			$this->layout_manager->set_layout( $layout );

			$sections = $this->

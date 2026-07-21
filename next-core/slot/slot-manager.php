<?php
/**
 * K86 Pro Next Core
 * Slot Manager
 *
 * Quản lý Slot và Module trong từng Section.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Slot_Manager' ) ) {

	class K86_Slot_Manager {

		/**
		 * Danh sách Slot.
		 *
		 * @var array
		 */
		protected $slots = array();

		/**
		 * Constructor.
		 */
		public function __construct() {

			$this->register_default_slots();

		}

		/**
		 * Đăng ký Slot mặc định.
		 *
		 * @return void
		 */
		protected function register_default_slots() {

			$this->slots = array(

				'header' => array(
					'title',
					'rating',
				),

				'main'

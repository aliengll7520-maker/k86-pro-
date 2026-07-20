<?php
/**
 * K86 Pro Next Core
 *
 * Foundation Event Manager
 *
 * Quản lý sự kiện nội bộ của Framework.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Event_Manager' ) ) {

	class K86_Event_Manager {

		/**
		 * Danh sách sự kiện.
		 *
		 * @var array
		 */
		protected $events = array();

		/**
		 * Khởi tạo Event Manager.
		 *
		 * @return void
		 */
		public function init() {

			$this->events = array();

		}

		/**
		 * Đăng ký sự kiện.
		 *
		 * @param string   $event
		 * @param callable $callback
		 * @return void
		 */
		public function add_listener( $event, $callback ) {

			if ( ! isset( $this->events[ $event ] ) ) {
				$this->events[ $event ] = array();
			}

			$this->events[ $event ][] = $callback;

		}

		/**
		 * Kích hoạt sự kiện.
		 *
		 * @param string $event
		 * @param array  $arguments
		 * @return void
		 */
		public function dispatch( $event, array $arguments = array() ) {

			if ( empty( $this->events[ $event ] ) ) {
				return;
			}

			foreach ( $this->events[ $event ] as $callback ) {

				if ( is_callable( $callback ) ) {
					call_user_func_array( $callback, $arguments );
				}

			}

		}

	}

}

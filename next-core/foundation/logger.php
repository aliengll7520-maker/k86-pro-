<?php
/**
 * K86 Pro Next Core
 * Foundation Logger
 *
 * Framework logging service.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Logger' ) ) {

	class K86_Logger {

		/**
		 * Initialize logger.
		 *
		 * @return $this
		 */
		public function init() {

			return $this;

		}

		/**
		 * Write a log record.
		 *
		 * @param mixed  $data  Log data.
		 * @param string $level Log level.
		 *
		 * @return array
		 */
		public function log( $data, $level = 'info' ) {

			$allowed_levels = array(
				'debug',
				'info',
				'notice',
				'warning',
				'error',
				'critical',
			);

			if ( ! in_array( $level, $allowed_levels, true ) ) {
				$level = 'info';
			}

			$record = array(
				'time'  => current_time( 'mysql' ),
				'level' => $level,
				'data'  => $data,
			);

			// Logger storage will be implemented later.

			return $record;

		}

		/**
		 * Clear all log records.
		 *
		 * @return bool
		 */
		public function clear() {

			// Logger cleanup will be implemented later.

			return true;

		}

	}
}

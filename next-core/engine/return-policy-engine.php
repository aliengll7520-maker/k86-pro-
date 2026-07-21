<?php
/**
 * K86 Pro Next Core
 * Return Policy Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Return_Policy_Engine' ) ) {

	class K86_Return_Policy_Engine extends K86_Engine_Base {

		/**
		 * Set return period.
		 *
		 * @param string $period Return period.
		 *
		 * @return $this
		 */
		public function set_period( $period ) {

			return $this->register(
				'return_period',
				sanitize_text_field( $period )
			);

		}

		/**
		 * Get return period.
		 *
		 * @return string
		 */
		public function get_period() {

			return (string) $this->get( 'return_period', '' );

		}

		/**
		 * Set return conditions.
		 *
		 * @param string $conditions Return conditions.
		 *
		 * @return $this
		 */
		public function set_conditions( $conditions ) {

			return $this->register(
				'return_conditions',
				sanitize_textarea_field( $conditions )
			);

		}

		/**
		 * Get return conditions.
		 *
		 * @return string
		 */
		public function get_conditions() {

			return (string) $this->get( 'return_conditions', '' );

		}

		/**
		 * Set return contact.
		 *
		 * @param string $contact Return contact.
		 *
		 * @return $this
		 */
		public function set_contact( $contact ) {

			return $this->register(
				'return_contact',
				sanitize_text_field( $contact )
			);

		}

		/**
		 * Get return contact.
		 *
		 * @return string
		 */
		public function get_contact() {

			return (string) $this->get( 'return_contact', '' );

		}

		/**
		 * Check whether returns are supported.
		 *
		 * @return bool
		 */
		public function is_returnable() {

			return '' !== trim( $this->get_period() );

		}

		/**
		 * Get return policy information.
		 *
		 * @return array
		 */
		public function get_return_policy() {

			return array(
				'period'     => $this->get_period(),
				'conditions' => $this->get_conditions(),
				'contact'    => $this->get_contact(),
				'available'  => $this->is_returnable(),
			);

		}

	}

}

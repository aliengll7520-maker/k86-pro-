<?php
/**
 * K86 Pro Next Core
 * Warranty Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Warranty_Engine' ) ) {

	class K86_Warranty_Engine extends K86_Engine_Base {

		/**
		 * Set warranty period.
		 *
		 * @param string $period Warranty period.
		 *
		 * @return $this
		 */
		public function set_period( $period ) {

			return $this->register(
				'warranty_period',
				sanitize_text_field( $period )
			);

		}

		/**
		 * Get warranty period.
		 *
		 * @return string
		 */
		public function get_period() {

			return (string) $this->get( 'warranty_period', '' );

		}

		/**
		 * Set warranty type.
		 *
		 * @param string $type Warranty type.
		 *
		 * @return $this
		 */
		public function set_type( $type ) {

			return $this->register(
				'warranty_type',
				sanitize_text_field( $type )
			);

		}

		/**
		 * Get warranty type.
		 *
		 * @return string
		 */
		public function get_type() {

			return (string) $this->get( 'warranty_type', '' );

		}

		/**
		 * Set warranty provider.
		 *
		 * @param string $provider Warranty provider.
		 *
		 * @return $this
		 */
		public function set_provider( $provider ) {

			return $this->register(
				'warranty_provider',
				sanitize_text_field( $provider )
			);

		}

		/**
		 * Get warranty provider.
		 *
		 * @return string
		 */
		public function get_provider() {

			return (string) $this->get( 'warranty_provider', '' );

		}

		/**
		 * Check whether warranty exists.
		 *
		 * @return bool
		 */
		public function has_warranty() {

			return '' !== trim( $this->get_period() );

		}

		/**
		 * Get warranty information.
		 *
		 * @return array
		 */
		public function get_warranty_info() {

			return array(
				'period'   => $this->get_period(),
				'type'     => $this->get_type(),
				'provider' => $this->get_provider(),
			);

		}
	/**
	 * Set warranty policy.
	 *
	 * @param string $policy Warranty policy.
	 *
	 * @return $this
	 */
	public function set_policy( $policy ) {

		return $this->register(
			'warranty_policy',
			sanitize_text_field( $policy )
		);

	}

	/**
	 * Get warranty policy.
	 *
	 * @return string
	 */
	public function get_policy() {

		return (string) $this->get(
			'warranty_policy',
			''
		);

	}

	/**
	 * Set warranty contact.
	 *
	 * @param string $contact Contact information.
	 *
	 * @return $this
	 */
	public function set_contact( $contact ) {

		return $this->register(
			'warranty_contact',
			sanitize_text_field( $contact )
		);

	}

	/**
	 * Get warranty contact.
	 *
	 * @return string
	 */
	public function get_contact() {

		return (string) $this->get(
			'warranty_contact',
			''
		);

	}

	/**
	 * Set warranty note.
	 *
	 * @param string $note Warranty note.
	 *
	 * @return $this
	 */
	public function set_note( $note ) {

		return $this->register(
			'warranty_note',
			sanitize_text_field( $note )
		);

	}

	/**
	 * Get warranty note.
	 *
	 * @return string
	 */
	public function get_note() {

		return (string) $this->get(
			'warranty_note',
			''
		);

	}

	/**
	 * Check official warranty.
	 *
	 * @return bool
	 */
	public function is_official_warranty() {

		return 'official' === strtolower( $this->get_type() );

	}

	/**
	 * Get warranty label.
	 *
	 * @return string
	 */
	public function get_warranty_label() {

		if ( ! $this->has_warranty() ) {
			return __( 'Không có bảo hành', 'k86-pro' );
		}

		return sprintf(
			__( 'Bảo hành %s', 'k86-pro' ),
			$this->get_period()
		);

	}
	}

}

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
	/**
	 * Set refund support.
	 *
	 * @param bool $enabled Refund support.
	 *
	 * @return $this
	 */
	public function set_refund_support( $enabled ) {

		return $this->register(
			'refund_support',
			(bool) $enabled
		);

	}

	/**
	 * Check refund support.
	 *
	 * @return bool
	 */
	public function has_refund_support() {

		return (bool) $this->get(
			'refund_support',
			false
		);

	}

	/**
	 * Set return shipping fee.
	 *
	 * @param float $fee Return shipping fee.
	 *
	 * @return $this
	 */
	public function set_return_fee( $fee ) {

		return $this->register(
			'return_fee',
			max( 0, (float) $fee )
		);

	}

	/**
	 * Get return shipping fee.
	 *
	 * @return float
	 */
	public function get_return_fee() {

		return (float) $this->get(
			'return_fee',
			0
		);

	}

	/**
	 * Set return note.
	 *
	 * @param string $note Return note.
	 *
	 * @return $this
	 */
	public function set_return_note( $note ) {

		return $this->register(
			'return_note',
			sanitize_textarea_field( $note )
		);

	}

	/**
	 * Get return note.
	 *
	 * @return string
	 */
	public function get_return_note() {

		return (string) $this->get(
			'return_note',
			''
		);

	}

	/**
	 * Get return label.
	 *
	 * @return string
	 */
	public function get_return_label() {

		if ( ! $this->is_returnable() ) {
			return __( 'Không hỗ trợ đổi trả', 'k86-pro' );
		}

		return sprintf(
			__( 'Đổi trả trong %s', 'k86-pro' ),
			$this->get_period()
		);

	}
	}

}

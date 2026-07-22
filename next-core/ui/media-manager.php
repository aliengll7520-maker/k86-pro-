<?php
/**
 * Media Manager.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Media_Manager' ) ) {

	class K86_Media_Manager {

		/**
		 * Constructor.
		 */
		public function __construct() {
		}

		/**
		 * Get product media.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		public function get_product_media( $product ) {

			return array(
				'featured'  => '',
				'gallery'   => array(),
				'video'     => '',
				'downloads' => array(),
			);

		}

	}

}

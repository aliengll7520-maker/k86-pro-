<?php
/**
 * K86 Pro Next Core
 * Product Model
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Model' ) ) {

	class K86_Product_Model {

		/**
		 * Product data.
		 *
		 * @var array
		 */
		protected $data = array();

		/**
		 * Constructor.
		 *
		 * @param array $data Product data.
		 */
		public function __construct( $data = array() ) {

			$this->data = wp_parse_args(
				$data,
				array(
					'id'                => 0,
					'title'             => '',
					'slug'              => '',
					'sku'               => '',
					'description'       => '',
					'short_description' => '',

					'price'             => 0,
					'sale_price'        => 0,

					'status'            => 'draft',
					'stock'             => 0,
					'in_stock'          => false,

					'image'             => '',
					'gallery'           => array(),
					'video'             => '',
					'youtube'           => '',
					'tiktok'            => '',
					'pdf'               => '',
					'documents'         => array(),
					'audio'             => array(),
					'icon'              => '',
					'downloads'         => array(),

					'highlights'        => array(),

					'rating'            => 0,
					'review_count'      => 0,

					'voucher'           => array(),
					'countdown'         => array(),
					'stock_progress'    => array(),
					'free_shipping'     => array(),
					'warranty'          => array(),
					'return_policy'     => array(),
					'trust'             => array(),
					'comparison'        => array(),

					'affiliate_links'   => array(),
					'cta_buttons'       => array(),
				)
			);

		}

		/**
		 * Get all product data.
		 *
		 * @return array
		 */
		public function get_data() {

			return $this->data;

		}

		/**
		 * Convert model to array.
		 *
		 * @return array
		 */
		public function to_array() {

			return $this->data;

		}

		/**
		 * Set data from array.
		 *
		 * @param array $data Product data.
		 * @return $this
		 */
		public function from_array( array $data ) {

			$this->set_data( $data );

			return $this;

		}

		/**
		 * Merge multiple fields.
		 *
		 * @param array $data Product data.
		 * @return $this
		 */
		public function set_data( array $data ) {

			$this->data = wp_parse_args(
				$data,
				$this->data
			);

			return $this;

		}

		/**
		 * Check field exists.
		 *
		 * @param string $key Field name.
		 * @return bool
		 */
		public function has( $key ) {

			return isset( $this->data[ $key ] );

		}

		/**
		 * Get a product field.
		 *
		 * @param string $key Field name.
		 * @param mixed  $default Default value.
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			return isset( $this->data[ $key ] )
				? $this->data[ $key ]
				: $default;

		}

		/**
		 * Set a product field.
		 *
		 * @param string $key Field name.
		 * @param mixed  $value Field value.
		 * @return $this
		 */
		public function set( $key, $value ) {

			$this->data[ $key ] = $value;

			return $this;

		}

	}

}

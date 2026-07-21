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

					'gallery'           => array(),
					'video'             => '',
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
		 * Get a product field.
		 *
		 * @param string $key     Field name.
		 * @param mixed  $default Default value.
		 *
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
		 * @param string $key   Field name.
		 * @param mixed  $value Field value.
		 *
		 * @return $this
		 */
		public function set( $key, $value ) {

			$this->data[ $key ] = $value;

			return $this;

		}

	}
}

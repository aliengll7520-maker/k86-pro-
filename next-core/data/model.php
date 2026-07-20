<?php
/**
 * K86 Pro Next Core
 * Product Model
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class K86_Product_Model {

	/**
	 * Dữ liệu sản phẩm
	 *
	 * @var array
	 */
	protected $data = array();

	/**
	 * Khởi tạo
	 *
	 * @param array $data
	 */
	public function __construct( $data = array() ) {
		$this->data = wp_parse_args(
			$data,
			array(
				'id'            => 0,
				'title'         => '',
				'slug'          => '',
				'description'   => '',
				'short_description' => '',
				'price'         => 0,
				'sale_price'    => 0,
				'gallery'       => array(),
				'video'         => '',
				'rating'        => 0,
				'review_count'  => 0,
				'stock'         => 0,
				'voucher'       => '',
				'shipping'      => '',
				'warranty'      => '',
				'return_policy' => '',
			)
		);
	}

	/**
	 * Lấy toàn bộ dữ liệu
	 */
	public function get_data() {
		return $this->data;
	}

	/**
	 * Lấy một trường dữ liệu
	 */
	public function get( $key, $default = null ) {
		return isset( $this->data[ $key ] ) ? $this->data[ $key ] : $default;
	}

	/**
	 * Gán dữ liệu
	 */
	public function set( $key, $value ) {
		$this->data[ $key ] = $value;
	}

}

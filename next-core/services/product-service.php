<?php	
defined( 'ABSPATH' ) || exit;
require_once K86_PRO_PATH . 'next-core/repositories/product-repository.php';

if ( ! class_exists( 'K86_Product_Service' ) ) {

class K86_Product_Service {
/**
 * Cached product data.
 *
 * @var array
 */
protected $cache = array();

/**
 * Registered engines.
 *
 * @var array
 */
	protected $repository;
protected $engines = array();

/**
 * Constructor.
 */
public function __construct() {
	$this->repository = new K86_Product_Repository();

	$this->register_engines();

}

/**
 * Register engines.
 *
 * @return void
 */
protected function register_engines() {

	$this->engines = array(
		'pricing'  => null,
		'inventory'=> null,
		'shipping' => null,
		'warranty' => null,
		'return'   => null,
		'review'   => null,
	);

}

/**
 * Get engine.
 *
 * @param string $engine Engine name.
 * @return object|null
 */
protected function engine( $engine ) {

	return isset( $this->engines[ $engine ] )
		? $this->engines[ $engine ]
		: null;

}

/**
 * Get cached product.
 *
 * @param int $product_id Product ID.
 * @return array|null
 */
protected function cache_get( $product_id ) {

	return $this->cache[ $product_id ] ?? null;

}

/**
 * Store cache.
 *
 * @param int   $product_id Product ID.
 * @param array $data Product data.
 *
 * @return void
 */
protected function cache_set( $product_id, array $data ) {

	$this->cache[ $product_id ] = $data;

}
/**
 * Get Pricing Engine.
 *
 * @return object|null
 */
protected function pricing_engine() {

	return $this->engine( 'pricing' );

}

/**
 * Get Inventory Engine.
 *
 * @return object|null
 */
protected function inventory_engine() {

	return $this->engine( 'inventory' );

}

/**
 * Get Shipping Engine.
 *
 * @return object|null
 */
protected function shipping_engine() {

	return $this->engine( 'shipping' );

}

/**
 * Get Warranty Engine.
 *
 * @return object|null
 */
protected function warranty_engine() {

	return $this->engine( 'warranty' );

}

/**
 * Get Return Policy Engine.
 *
 * @return object|null
 */
protected function return_engine() {

	return $this->engine( 'return' );

}

/**
 * Get Review Engine.
 *
 * @return object|null
 */
protected function review_engine() {

	return $this->engine( 'review' );

}

/**
 * Check engine availability.
 *
 * @param string $engine Engine name.
 *
 * @return bool
 */
protected function has_engine( $engine ) {

	return null !== $this->engine( $engine );

}
public function all() {
    return $this->repository->find_all();
}
public function all() {
    return $this->repository->find_all();
}
protected function call_engine( $engine, $method, array $args = array() ) {

	$instance = $this->engine( $engine );

	if ( ! $instance ) {
		return null;
	}

	if ( ! method_exists( $instance, $method ) ) {
		return null;
	}

	return call_user_func_array(
		array( $instance, $method ),
		$args
	);

}
/**
 * Get complete product data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_product_data( $product_id ) {

	$product_id = absint( $product_id );

	if ( ! $product_id ) {
		return array();
	}

	$cached = $this->cache_get( $product_id );

	if ( null !== $cached ) {
		return $cached;
	}

	$data = array(

		'id'          => $product_id,

		'title'       => $this->get_title( $product_id ),

		'description' => $this->get_description( $product_id ),

		'gallery'     => $this->get_gallery( $product_id ),

		'video'       => $this->get_video( $product_id ),

		'highlights'  => $this->get_highlights( $product_id ),

		'pricing'     => $this->get_pricing_data( $product_id ),

		'inventory'   => $this->get_inventory_data( $product_id ),

		'shipping'    => $this->get_shipping_data( $product_id ),

		'warranty'    => $this->get_warranty_data( $product_id ),

		'return'      => $this->get_return_policy_data( $product_id ),

		'reviews'     => $this->get_review_data( $product_id ),

		'voucher'     => $this->get_voucher_data( $product_id ),

		'countdown'   => $this->get_countdown_data( $product_id ),

		'stock'       => $this->get_stock_data( $product_id ),

		'compare'     => $this->get_compare_data( $product_id ),

		'actions'     => $this->get_action_data( $product_id ),

	);

	$data = apply_filters(
		'k86_product_service_data',
		$data,
		$product_id
	);

	$this->cache_set(
		$product_id,
		$data
	);

	return $data;

}
/**
 * Get product title.
 *
 * @param int $product_id Product ID.
 * @return string
 */
public function get_title( $product_id ) {

	return get_the_title( $product_id );

}

/**
 * Get product description.
 *
 * @param int $product_id Product ID.
 * @return string
 */
public function get_description( $product_id ) {

	$post = get_post( $product_id );

	if ( ! $post ) {
		return '';
	}

	return apply_filters(
		'the_content',
		$post->post_content
	);

}

/**
 * Get gallery.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_gallery( $product_id ) {

	$gallery = get_post_meta(
		$product_id,
		'_k86_gallery',
		true
	);

	return is_array( $gallery )
		? $gallery
		: array();

}

/**
 * Get product video.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_video( $product_id ) {

	return array(
		'type' => get_post_meta(
			$product_id,
			'_k86_video_type',
			true
		),
		'url' => get_post_meta(
			$product_id,
			'_k86_video_url',
			true
		),
		'thumbnail' => get_post_meta(
			$product_id,
			'_k86_video_thumbnail',
			true
		),
	);

}

/**
 * Get highlights.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_highlights( $product_id ) {

	$items = get_post_meta(
		$product_id,
		'_k86_highlights',
		true
	);

	return is_array( $items )
		? $items
		: array();

}
/**
 * Get pricing data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_pricing_data( $product_id ) {

	if ( $this->has_engine( 'pricing' ) ) {

		$data = $this->call_engine(
			'pricing',
			'get_pricing_data',
			array( $product_id )
		);

		if ( is_array( $data ) ) {
			return $data;
		}
	}

	return array(
		'price'          => get_post_meta( $product_id, '_k86_price', true ),
		'regular_price'  => get_post_meta( $product_id, '_k86_regular_price', true ),
		'sale_price'     => get_post_meta( $product_id, '_k86_sale_price', true ),
		'discount'       => get_post_meta( $product_id, '_k86_discount', true ),
		'currency'       => get_post_meta( $product_id, '_k86_currency', true ),
	);

}

/**
 * Get voucher data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_voucher_data( $product_id ) {

	return array(
		'code'        => get_post_meta( $product_id, '_k86_voucher_code', true ),
		'title'       => get_post_meta( $product_id, '_k86_voucher_title', true ),
		'description' => get_post_meta( $product_id, '_k86_voucher_description', true ),
		'expire'      => get_post_meta( $product_id, '_k86_voucher_expire', true ),
	);

}

/**
 * Get countdown data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_countdown_data( $product_id ) {

	return array(
		'start' => get_post_meta( $product_id, '_k86_countdown_start', true ),
		'end'   => get_post_meta( $product_id, '_k86_countdown_end', true ),
		'label' => get_post_meta( $product_id, '_k86_countdown_label', true ),
	);

}

/**
 * Get stock data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_stock_data( $product_id ) {

	return array(
		'quantity'   => get_post_meta( $product_id, '_k86_stock_quantity', true ),
		'sold'       => get_post_meta( $product_id, '_k86_stock_sold', true ),
		'remaining'  => get_post_meta( $product_id, '_k86_stock_remaining', true ),
		'status'     => get_post_meta( $product_id, '_k86_stock_status', true ),
		'progress'   => get_post_meta( $product_id, '_k86_stock_progress', true ),
	);

}
/**
 * Get shipping data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_shipping_data( $product_id ) {

	if ( $this->has_engine( 'shipping' ) ) {

		$data = $this->call_engine(
			'shipping',
			'get_shipping_data',
			array( $product_id )
		);

		if ( is_array( $data ) ) {
			return $data;
		}
	}

	return array(
		'title'      => get_post_meta( $product_id, '_k86_shipping_title', true ),
		'items'      => get_post_meta( $product_id, '_k86_shipping_items', true ),
		'free'       => get_post_meta( $product_id, '_k86_free_shipping', true ),
		'estimate'   => get_post_meta( $product_id, '_k86_shipping_estimate', true ),
		'carrier'    => get_post_meta( $product_id, '_k86_shipping_carrier', true ),
	);

}

/**
 * Get warranty data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_warranty_data( $product_id ) {

	if ( $this->has_engine( 'warranty' ) ) {

		$data = $this->call_engine(
			'warranty',
			'get_warranty_data',
			array( $product_id )
		);

		if ( is_array( $data ) ) {
			return $data;
		}
	}

	return array(
		'title'          => get_post_meta( $product_id, '_k86_warranty_title', true ),
		'period'         => get_post_meta( $product_id, '_k86_warranty_period', true ),
		'type'           => get_post_meta( $product_id, '_k86_warranty_type', true ),
		'provider'       => get_post_meta( $product_id, '_k86_warranty_provider', true ),
		'policy_url'     => get_post_meta( $product_id, '_k86_warranty_policy_url', true ),
		'claim_url'      => get_post_meta( $product_id, '_k86_warranty_claim_url', true ),
	);

}

/**
 * Get return policy data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_return_policy_data( $product_id ) {

	if ( $this->has_engine( 'return' ) ) {

		$data = $this->call_engine(
			'return',
			'get_return_policy_data',
			array( $product_id )
		);

		if ( is_array( $data ) ) {
			return $data;
		}
	}

	return array(
		'title'         => get_post_meta( $product_id, '_k86_return_title', true ),
		'return_days'   => get_post_meta( $product_id, '_k86_return_days', true ),
		'exchange_days' => get_post_meta( $product_id, '_k86_exchange_days', true ),
		'condition'     => get_post_meta( $product_id, '_k86_return_condition', true ),
		'policy_url'    => get_post_meta( $product_id, '_k86_return_policy_url', true ),
	);

}

/**
 * Get review data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_review_data( $product_id ) {

	if ( $this->has_engine( 'review' ) ) {

		$data = $this->call_engine(
			'review',
			'get_review_data',
			array( $product_id )
		);

		if ( is_array( $data ) ) {
			return $data;
		}
	}

	return array(
		'rating' => $this->get_rating( $product_id ),
		'count'  => $this->get_review_count( $product_id ),
		'items'  => get_post_meta( $product_id, '_k86_reviews', true ),
	);

}
/**
 * Get action data.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function get_action_data( $product_id ) {

	return array(

		'affiliate' => $this->get_affiliate_data( $product_id ),

		'buy'       => $this->get_buy_button_data( $product_id ),

		'wishlist'  => $this->get_wishlist_data( $product_id ),

		'compare'   => $this->get_compare_data( $product_id ),

		'share'     => $this->get_share_data( $product_id ),

	);

}

/**
 * Get affiliate data.
 */
public function get_affiliate_data( $product_id ) {

	return array(

		'shopee' => get_post_meta( $product_id, '_k86_shopee_url', true ),

		'lazada' => get_post_meta( $product_id, '_k86_lazada_url', true ),

		'tiktok' => get_post_meta( $product_id, '_k86_tiktok_url', true ),

	);

}

/**
 * Buy button.
 */
public function get_buy_button_data( $product_id ) {

	return array(

		'label' => get_post_meta(
			$product_id,
			'_k86_buy_button_label',
			true
		),

		'style' => get_post_meta(
			$product_id,
			'_k86_buy_button_style',
			true
		),

		'target' => '_blank',

	);

}

/**
 * Wishlist.
 */
public function get_wishlist_data( $product_id ) {

	return array(

		'enabled' => (bool) get_post_meta(
			$product_id,
			'_k86_enable_wishlist',
			true
		),

	);

}

/**
 * Compare.
 */
public function get_compare_data( $product_id ) {

	return array(

		'enabled' => (bool) get_post_meta(
			$product_id,
			'_k86_enable_compare',
			true
		),

	);

}

/**
 * Share.
 */
public function get_share_data( $product_id ) {

	return array(

		'facebook' => true,

		'x'         => true,

		'telegram' => true,

		'copy_link'=> true,

	);

}
/**
 * Check whether a product exists.
 *
 * @param int $product_id Product ID.
 * @return bool
 */
public function product_exists( $product_id ) {

	return (bool) get_post( absint( $product_id ) );

}

/**
 * Clear product cache.
 *
 * @param int $product_id Product ID.
 * @return void
 */
public function clear_cache( $product_id = 0 ) {

	if ( $product_id ) {

		unset( $this->cache[ absint( $product_id ) ] );

		return;

	}

	$this->cache = array();

}

/**
 * Normalize array.
 *
 * @param mixed $data Data.
 * @return array
 */
protected function normalize_array( $data ) {

	return is_array( $data ) ? $data : array();

}

/**
 * Get product field safely.
 *
 * @param array  $data    Product data.
 * @param string $key     Field key.
 * @param mixed  $default Default value.
 * @return mixed
 */
public function get( array $data, $key, $default = null ) {

	return array_key_exists( $key, $data )
		? $data[ $key ]
		: $default;

}

/**
 * Build final product payload.
 *
 * @param int $product_id Product ID.
 * @return array
 */
public function build( $product_id ) {

	return apply_filters(
		'k86_product_service_build',
		$this->get_product_data( $product_id ),
		$product_id
	);

}

}

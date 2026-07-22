<?php
/**
 * K86 Pro Next Core
 *
 * Product Field Registry
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

return array(

	'basic' => array(

		'title' => array(
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),

		'slug' => array(
			'type'     => 'text',
			'sanitize' => 'sanitize_title',
		),

		'sku' => array(
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),

		'brand' => array(
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),

		'status' => array(
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),

	),

	'media' => array(

		'image' => array(
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),

		'gallery' => array(
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),

		'video' => array(
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),

	),

	'pricing' => array(

		'price' => array(
			'type'     => 'number',
			'sanitize' => 'floatval',
		),

		'sale_price' => array(
			'type'     => 'number',
			'sanitize' => 'floatval',
		),

		'currency' => array(
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),

		'discount' => array(
			'type'     => 'number',
			'sanitize' => 'floatval',
		),

		'saved' => array(
			'type'     => 'number',
			'sanitize' => 'floatval',
		),

	),

	'actions' => array(

		'buy_url' => array(
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),

		'shopee_url' => array(
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),

		'tiktok_url' => array(
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),

		'lazada_url' => array(
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),

	),

	'rating' => array(),

	'description' => array(),

	'compare' => array(),

	'voucher' => array(),

	'countdown' => array(),

	'stock' => array(),

	'shipping' => array(),

	'policy' => array(),

	'faq' => array(),

);

<?php
/**
 * K86 Pro - Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Lấy toàn bộ cài đặt của Plugin.
 *
 * @return array
 */
function k86_get_settings() {

	$options = wp_parse_args(
		get_option( 'k86_settings', array() ),
		array(

			/* Product Box */

			'show_shopee'      => 1,
			'show_tiktok'      => 1,
			'show_lazada'      => 1,
			'show_amazon'      => 1,

			'show_discount'    => 1,
			'show_save_money'  => 1,
			'show_description' => 1,

			/* CTA */

			'link_target'      => '_blank',
			'link_rel'         => 'nofollow sponsored',

			/* Engagement */

			'show_engagement'  => 1,
			'show_like'        => 1,
			'show_share'       => 1,

			/* Icon Bar */

			'show_icon_bar'    => 1,
			'icon_bar_position'=> 'after_content',
			'icon_bar_post'    => 1,
			'icon_bar_product' => 1,

			/* Auto Insert */

			'auto_insert'      => 1,
			'insert_position'  => 'after_content',
			'auto_product_box' => 1,
			'auto_cta'         => 1,
			'auto_engagement'  => 1,

		)
	);

	return $options;
}


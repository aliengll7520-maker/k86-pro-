<?php
/**
 * Decision Hooks
 *
 * Kết nối Decision Box với Product Box.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render Decision Header.
 */
add_action(
	'k86_product_box_header',
	function ( $product ) {

		if ( function_exists( 'k86_render_decision_box' ) ) {
			echo k86_render_decision_box( $product );
		}

	},
	10,
	1
);

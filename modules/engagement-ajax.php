<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*
|--------------------------------------------------------------------------
| Engagement Data Helpers
|--------------------------------------------------------------------------
*/

/**
 * Lấy dữ liệu Engagement của bài viết.
 *
 * @param int $post_id
 * @return array
 */
function k86_get_engagement_data( $post_id ) {

	$data = get_post_meta( $post_id, '_k86_engagement', true );

	if ( ! is_array( $data ) ) {

		$data = array(
			'reactions' => array(
				'like'  => 0,
				'love'  => 0,
				'haha'  => 0,
				'wow'   => 0,
				'sad'   => 0,
				'angry' => 0,
			),
			'shares' => 0,
			'copies' => 0,
		);

	}

	return $data;

}

/**
 * Lưu dữ liệu Engagement.
 *
 * @param int   $post_id
 * @param array $data
 * @return void
 */
function k86_save_engagement_data( $post_id, array $data ) {

	update_post_meta(
		$post_id,
		'_k86_engagement',
		$data
	);

}
/*
|--------------------------------------------------------------------------
| AJAX Registration
|--------------------------------------------------------------------------
*/

add_action(
	'k86_ajax_init',
	'k86_register_engagement_ajax'
);

function k86_register_engagement_ajax() {

	k86_register_ajax_action(
		'k86_save_reaction',
		'k86_ajax_save_reaction'
	);

}

/*
|--------------------------------------------------------------------------
| Reaction Callback
|--------------------------------------------------------------------------
*/

function k86_ajax_save_reaction() {

	k86_verify_ajax_nonce();

	$post_id = k86_ajax_object_id();

	if ( ! $post_id ) {
		k86_ajax_error(
			__( 'Invalid post.', 'k86-pro' )
		);
	}

	$reaction = sanitize_key(
		k86_ajax_post( 'reaction' )
	);

	$data = k86_get_engagement_data( $post_id );

	if ( ! isset( $data['reactions'][ $reaction ] ) ) {

		k86_ajax_error(
			__( 'Invalid reaction.', 'k86-pro' )
		);

	}

	$data['reactions'][ $reaction ]++;

	k86_save_engagement_data(
		$post_id,
		$data
	);

	k86_ajax_success(
		array(
			'post_id'   => $post_id,
			'reaction'  => $reaction,
			'total'     => $data['reactions'][ $reaction ],
			'statistics'=> $data,
		)
	);

}
/*
|--------------------------------------------------------------------------
| Share Callback
|--------------------------------------------------------------------------
*/

function k86_ajax_save_share() {

	k86_verify_ajax_nonce();

	$post_id = k86_ajax_object_id();

	if ( ! $post_id ) {
		k86_ajax_error(
			__( 'Invalid post.', 'k86-pro' )
		);
	}

	$data = k86_get_engagement_data( $post_id );

	$data['shares']++;

	k86_save_engagement_data(
		$post_id,
		$data
	);

	k86_ajax_success(
		array(
			'post_id'    => $post_id,
			'shares'     => $data['shares'],
			'statistics' => $data,
		)
	);

}

/*
|--------------------------------------------------------------------------
| Copy Link Callback
|--------------------------------------------------------------------------
*/

function k86_ajax_save_copy() {

	k86_verify_ajax_nonce();

	$post_id = k86_ajax_object_id();

	if ( ! $post_id ) {
		k86_ajax_error(
			__( 'Invalid post.', 'k86-pro' )
		);
	}

	$data = k86_get_engagement_data( $post_id );

	$data['copies']++;

	k86_save_engagement_data(
		$post_id,
		$data
	);

	k86_ajax_success(
		array(
			'post_id'    => $post_id,
			'copies'     => $data['copies'],
			'statistics' => $data,
		)
	);

}
/*
|--------------------------------------------------------------------------
| Engagement AJAX Hooks
|--------------------------------------------------------------------------
*/

/**
 * Cho phép module khác mở rộng dữ liệu thống kê trước khi trả về.
 *
 * @param array $data
 * @param int   $post_id
 */
function k86_engagement_ajax_filter_statistics( $data, $post_id ) {

	return apply_filters(
		'k86_engagement_statistics',
		$data,
		$post_id
	);

}

/**
 * Thông báo module Engagement AJAX đã sẵn sàng.
 */
do_action( 'k86_engagement_ajax_ready' );

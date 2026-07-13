<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Module: Product Shortcode
 * Version: 1.5.2
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Đăng ký Product Shortcode.
 */
add_shortcode(
	'k86_product',
	'k86_product_shortcode'
);

/**
 * Hiển thị Product Box.
 *
 * Shortcode:
 * [k86_product id="1"]
 *
 * @param array $atts Thuộc tính Shortcode.
 * @return string
 */
function k86_product_shortcode( $atts ) {

	$atts = shortcode_atts(
		array(
			'id' => 0,
		),
		$atts,
		'k86_product'
	);

	$product_id = absint( $atts['id'] );

	if ( ! $product_id ) {
		return '';
	}

	/**
	 * Lấy sản phẩm.
	 */
	$product = k86_get_product( $product_id );

	if ( ! $product ) {
		return '';
	}

	/**
	 * Cài đặt K86 Pro.
	 */
	$settings = wp_parse_args(
		get_option(
			'k86_settings',
			array()
		),
		array(
			'show_shopee'      => 1,
			'show_tiktok'      => 1,
			'show_lazada'      => 1,
			'show_discount'    => 1,
			'show_save_money'  => 1,
			'show_description' => 1,
		)
	);

	$show_shopee      = ! empty( $settings['show_shopee'] );
	$show_tiktok      = ! empty( $settings['show_tiktok'] );
	$show_lazada      = ! empty( $settings['show_lazada'] );
	$show_discount    = ! empty( $settings['show_discount'] );
	$show_save_money  = ! empty( $settings['show_save_money'] );
	$show_description = ! empty( $settings['show_description'] );
		/**
	 * --------------------------------------------------------
	 * Tính giá
	 * --------------------------------------------------------
	 */

	$price = (float) preg_replace(
		'/[^0-9]/',
		'',
		$product->price
	);

	$sale_price = (float) preg_replace(
		'/[^0-9]/',
		'',
		$product->sale_price
	);

	$discount_percent = 0;
	$saving_money     = 0;

	if (
		$sale_price > 0 &&
		$sale_price < $price
	) {

		$discount_percent = round(
			(
				( $price - $sale_price ) /
				$price
			) * 100
		);

		$saving_money = $price - $sale_price;

	}

	/**
	 * Hook trước khi hiển thị Product Box.
	 */
	do_action(
		'k86_product_box_before',
		$product
	);

	ob_start();
?>

<div
	class="k86-product-box"
	style="
		border:1px solid #e5e5e5;
		border-radius:12px;
		padding:20px;
		margin:20px 0;
		background:#ffffff;
		box-shadow:0 2px 10px rgba(0,0,0,.05);
	">

	<?php if ( $show_discount && $discount_percent > 0 ) : ?>

		<div
			style="
				display:inline-block;
				background:#e53935;
				color:#ffffff;
				padding:6px 12px;
				border-radius:30px;
				font-size:14px;
				font-weight:bold;
				margin-bottom:15px;
			">

			🔥
			<?php
			printf(
				esc_html__( 'Giảm %d%%', 'k86-pro' ),
				$discount_percent
			);
			?>

		</div>

	<?php endif; ?>

	<?php if ( ! empty( $product->image ) ) : ?>

		<div
			style="
				text-align:center;
				margin-bottom:20px;
			">

			<img
				src="<?php echo esc_url( $product->image ); ?>"
				alt="<?php echo esc_attr( $product->name ); ?>"
				style="
					max-width:260px;
					width:
		<h2
		style="
			margin:0 0 10px;
			font-size:24px;
			line-height:1.5;
		">

		<?php echo esc_html( $product->name ); ?>

	</h2>

	<?php if ( ! empty( $product->brand ) ) : ?>

		<div
			style="
				margin-bottom:18px;
				font-size:15px;
				color:#666666;
				font-weight:600;
			">

			<?php esc_html_e( 'Thương hiệu:', 'k86-pro' ); ?>

			<?php echo esc_html( $product->brand ); ?>

		</div>

	<?php endif; ?>

	<div style="margin-bottom:20px;">

		<?php if ( $sale_price > 0 && $sale_price < $price ) : ?>

			<div
				style="
					font-size:18px;
					color:#888888;
					text-decoration:line-through;
					margin-bottom:5px;
				">

				<?php echo esc_html( number_format( $price, 0, ',', '.' ) ); ?> ₫

			</div>

			<div
				style="
					font-size:32px;
					font-weight:bold;
					color:#e53935;
					margin-bottom:8px;
				">

				<?php echo esc_html( number_format( $sale_price, 0, ',', '.' ) ); ?> ₫

			</div>

			<?php if ( $show_save_money ) : ?>

				<div
					style="
						color:#2e7d32;
						font-weight:bold;
					">

					<?php esc_html_e( '💰 Tiết kiệm', 'k86-pro' ); ?>

					<?php
					echo esc_html(
						number_format(
							$saving_money,
							0,
							',',
							'.'
						)
					);
					?>

					₫

				</div>

			<?php endif; ?>

		<?php else : ?>

			<div
				style="
					font-size:32px;
					font-weight:bold;
					color:#e53935;
				">

				<?php echo esc_html( number_format( $price, 0, ',', '.' ) ); ?> ₫

			</div>

		<?php endif; ?>

	</div>
		<?php if ( $show_description && ! empty( $product->description ) ) : ?>

		<div
			style="
				line-height:1.8;
				margin-bottom:20px;
				font-size:15px;
				color:#444444;
			">

			<?php echo wpautop( esc_html( $product->description ) ); ?>

		</div>

	<?php endif; ?>

	<?php if ( $show_shopee && ! empty( $product->shopee ) ) : ?>

		<p style="margin-bottom:12px;">

			<a
				href="<?php echo esc_url( $product->shopee ); ?>"
				target="_blank"
				rel="nofollow sponsored"
				style="
					display:block;
					text-align:center;
					background:#ee4d2d;
					color:#ffffff;
					padding:14px;
					border-radius:8px;
					text-decoration:none;
					font-weight:bold;
					font-size:16px;
				">

				<?php esc_html_e( '🛒 Mua trên Shopee', 'k86-pro' ); ?>

			</a>

		</p>

	<?php endif; ?>

	<?php if ( $show_tiktok && ! empty( $product->tiktok ) ) : ?>

		<p style="margin-bottom:12px;">

			<a
				href="<?php echo esc_url( $product->tiktok ); ?>"
				target="_blank"
				rel="nofollow sponsored"
				style="
					display:block;
					text-align:center;
					background:#000000;
					color:#ffffff;
					padding:14px;
					border-radius:8px;
					text-decoration:none;
					font-weight:bold;
					font-size:16px;
				">

				<?php esc_html_e( '🎵 Mua trên TikTok Shop', 'k86-pro' ); ?>

			</a>

		</p>

	<?php endif; ?>
		<?php if ( $show_lazada && ! empty( $product->lazada ) ) : ?>

		<p style="margin-bottom:12px;">

			<a
				href="<?php echo esc_url( $product->lazada ); ?>"
				target="_blank"
				rel="nofollow sponsored"
				style="
					display:block;
					text-align:center;
					background:#0f6fff;
					color:#ffffff;
					padding:14px;
					border-radius:8px;
					text-decoration:none;
					font-weight:bold;
					font-size:16px;
				">

				<?php esc_html_e( '🟦 Mua trên Lazada', 'k86-pro' ); ?>

			</a>

		</p>

	<?php endif; ?>

	<?php
	/**
	 * Hook sau khi hiển thị Product Box.
	 *
	 * Cho phép các module mở rộng
	 * bổ sung nội dung mà không cần
	 * chỉnh sửa Product Shortcode.
	 */
	do_action(
		'k86_product_box_after',
		$product
	);
	?>

		</div>
	<?php
	/**
	 * --------------------------------------------------------
	 * Kết thúc Product Box
	 * --------------------------------------------------------
	 */

	$output = ob_get_clean();

	/**
	 * Cho phép các Module khác
	 * thay đổi HTML trước khi trả về.
	 */
	return apply_filters(
		'k86_product_box_output',
		$output,
		$product,
		$settings
	);

}

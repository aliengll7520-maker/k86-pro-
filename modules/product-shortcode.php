<?php
/**
 * K86 Pro
 *
 * Module: Product Shortcode
 * Version: 1.2.0
 * Author: Liểng Sang
 *
 * Shortcode:
 * [k86_product id="1"]
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_shortcode( 'k86_product', 'k86_product_shortcode' );

function k86_product_shortcode( $atts ) {

	global $wpdb;

	$atts = shortcode_atts(
		array(
			'id' => 0,
		),
		$atts
	);

	$product_id = absint( $atts['id'] );

	if ( ! $product_id ) {
		return '';
	}

	$table = $wpdb->prefix . 'k86_products';

	$product = $wpdb->get_row(
		$wpdb->prepare(
			"SELECT * FROM {$table} WHERE id = %d",
			$product_id
		)
	);

	if ( ! $product ) {
		return '';
	}

	/*
	|--------------------------------------------------------------------------
	| Tính giá
	|--------------------------------------------------------------------------
	*/

	$price       = (float) preg_replace( '/[^0-9]/', '', $product->price );
	$sale_price  = (float) preg_replace( '/[^0-9]/', '', $product->sale_price );

	$discount_percent = 0;
	$saving_money     = 0;

	if ( $sale_price > 0 && $sale_price < $price ) {

		$discount_percent = round(
			( ( $price - $sale_price ) / $price ) * 100
		);

		$saving_money = $price - $sale_price;

	}

	ob_start();

?>
    <div class="k86-product-box" style="
border:1px solid #e5e5e5;
border-radius:12px;
padding:20px;
margin:20px 0;
background:#fff;
box-shadow:0 2px 10px rgba(0,0,0,.05);
">

<?php if ( $discount_percent > 0 ) : ?>

<div style="
display:inline-block;
background:#e53935;
color:#fff;
padding:6px 12px;
border-radius:30px;
font-size:14px;
font-weight:bold;
margin-bottom:15px;
">

🔥 Giảm <?php echo esc_html( $discount_percent ); ?>%

</div>

<?php endif; ?>

<?php if ( ! empty( $product->image ) ) : ?>

<div style="text-align:center;margin-bottom:20px;">

<img
src="<?php echo esc_url( $product->image ); ?>"
alt="<?php echo esc_attr( $product->name ); ?>"
style="
max-width:260px;
width:100%;
height:auto;
border-radius:10px;
">

</div>

<?php endif; ?>

<h2 style="
margin:0 0 15px;
font-size:24px;
line-height:1.5;
">

<?php echo esc_html( $product->name ); ?>

</h2>
    <div style="margin-bottom:20px;">

<?php if ( $sale_price > 0 && $sale_price < $price ) : ?>

    <div style="
    font-size:18px;
    color:#888;
    text-decoration:line-through;
    margin-bottom:5px;
    ">

        <?php echo esc_html( number_format( $price, 0, ',', '.' ) ); ?> ₫

    </div>

    <div style="
    font-size:32px;
    font-weight:bold;
    color:#e53935;
    margin-bottom:8px;
    ">

        <?php echo esc_html( number_format( $sale_price, 0, ',', '.' ) ); ?> ₫

    </div>

    <div style="
    color:#2e7d32;
    font-weight:bold;
    ">

        💰 Tiết kiệm
        <?php echo esc_html( number_format( $saving_money, 0, ',', '.' ) ); ?> ₫

    </div>

<?php else : ?>

    <div style="
    font-size:32px;
    font-weight:bold;
    color:#e53935;
    ">

        <?php echo esc_html( number_format( $price, 0, ',', '.' ) ); ?> ₫

    </div>

<?php endif; ?>

    </div>
    <?php if ( ! empty( $product->description ) ) : ?>

<div style="
line-height:1.8;
margin-bottom:20px;
font-size:15px;
color:#444;
">

<?php echo wpautop( esc_html( $product->description ) ); ?>

</div>

<?php endif; ?>
    <?php if ( ! empty( $product->shopee ) ) : ?>

<p style="margin-bottom:12px;">

<a
href="<?php echo esc_url( $product->shopee ); ?>"
target="_blank"
rel="nofollow sponsored"
style="
display:block;
text-align:center;
background:#ee4d2d;
color:#fff;
padding:14px;
border-radius:8px;
text-decoration:none;
font-weight:bold;
font-size:16px;
">

🛒 Mua trên Shopee

</a>

</p>

<?php endif; ?>

<?php if ( ! empty( $product->tiktok ) ) : ?>

<p style="margin-bottom:12px;">

<a
href="<?php echo esc_url( $product->tiktok ); ?>"
target="_blank"
rel="nofollow sponsored"
style="
display:block;
text-align:center;
background:#000;
color:#fff;
padding:14px;
border-radius:8px;
text-decoration:none;
font-weight:bold;
font-size:16px;
">

🎵 Mua trên TikTok Shop

</a>

</p>

<?php endif; ?>

<?php if ( ! empty( $product->lazada ) ) : ?>

<p>

<a
href="<?php echo esc_url( $product->lazada ); ?>"
target="_blank"
rel="nofollow sponsored"
style="
display:block;
text-align:center;
background:#0f6fff;
color:#fff;
padding:14px;
border-radius:8px;
text-decoration:none;
font-weight:bold;
font-size:16px;
">

🟦 Mua trên Lazada

</a>

</p>

<?php endif; ?>
    </div>

<?php

	return ob_get_clean();

}

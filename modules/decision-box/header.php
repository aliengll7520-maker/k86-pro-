<?php
/**
 * Decision Box Header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( empty( $product ) ) {
	return;
}

$image = '';

if ( ! empty( $product->image ) ) {
	$image = $product->image;
} elseif ( ! empty( $product->image_url ) ) {
	$image = $product->image_url;
}
?>

<div class="k86-decision-header">

	<?php if ( ! empty( $image ) ) : ?>
		<div class="k86-product-image">
			<img
				src="<?php echo esc_url( $image ); ?>"
				alt="<?php echo esc_attr( $product->name ?? '' ); ?>"
				loading="lazy"
			/>
		</div>
	<?php endif; ?>

	<h2 class="k86-product-title">
		<?php echo esc_html( $product->name ?? '' ); ?>
	</h2>

	<?php if ( ! empty( $product->brand ) ) : ?>
		<div class="k86-product-brand">
			<?php echo esc_html( $product->brand ); ?>
		</div>
	<?php endif; ?>

	<?php if ( ! empty( $product->sale_price ) ) : ?>

		<div class="k86-product-price">

			<?php if ( ! empty( $product->price ) ) : ?>
				<del><?php echo esc_html( $product->price ); ?></del>
			<?php endif; ?>

			<strong>
				<?php echo esc_html( $product->sale_price ); ?>
			</strong>

		</div>

	<?php elseif ( ! empty( $product->price ) ) : ?>

		<div class="k86-product-price">
			<strong><?php echo esc_html( $product->price ); ?></strong>
		</div>

	<?php endif; ?>

</div>

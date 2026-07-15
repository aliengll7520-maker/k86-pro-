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
?>

<div class="k86-decision-header">

    <h2 class="k86-product-title">
        <?php echo esc_html( $product->name ?? '' ); ?>
    </h2>

    <?php if ( ! empty( $product->brand ) ) : ?>
        <div class="k86-product-brand">
            <?php echo esc_html( $product->brand ); ?>
        </div>
    <?php endif; ?>

    <?php if ( ! empty( $product->price ) ) : ?>
        <div class="k86-product-price">
            <?php echo esc_html( $product->price ); ?>
        </div>
    <?php endif; ?>

</div>

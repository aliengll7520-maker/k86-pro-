<?php

if (!defined('ABSPATH')) {
    exit;
}

add_shortcode('k86_product', 'k86_product_shortcode');

function k86_product_shortcode($atts)
{
    global $wpdb;

    $atts = shortcode_atts(array(
        'id' => 0,
    ), $atts);

    $id = intval($atts['id']);

    if (!$id) {
        return '';
    }

    $table = $wpdb->prefix . 'k86_products';

    $product = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM {$table} WHERE id = %d",
            $id
        )
    );

    if (!$product) {
        return '';
    }

    ob_start();
    ?>

    <div class="k86-product-box">

        <h3><?php echo esc_html($product->name); ?></h3>

        <?php if (!empty($product->image)) : ?>

            <img src="<?php echo esc_url($product->image); ?>"
                 style="max-width:220px;border-radius:10px;">

        <?php endif; ?>

        <p><strong>Giá:</strong> <?php echo esc_html($product->price); ?> đ</p>

        <p><?php echo nl2br(esc_html($product->description)); ?></p>

        <a href="<?php echo esc_url($product->shopee); ?>"
           target="_blank"
           rel="nofollow sponsored"
           style="display:inline-block;background:#ee4d2d;color:#fff;padding:12px 22px;border-radius:8px;text-decoration:none;">
            Mua trên Shopee
        </a>

    </div>

    <?php

    return ob_get_clean();
}

<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'k86_edit_product_page');

function k86_edit_product_page() {

    add_submenu_page(
        null,
        'Sửa sản phẩm',
        'Sửa sản phẩm',
        'manage_options',
        'k86-edit-product',
        'k86_edit_product_form'
    );
}

function k86_edit_product_form() {

    global $wpdb;

    $table = $wpdb->prefix . 'k86_products';

    $id = isset($_GET['id']) ? absint($_GET['id']) : 0;

    $product = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM {$table} WHERE id = %d",
            $id
        )
    );

    if (!$product) {
        echo '<div class="notice notice-error"><p>Không tìm thấy sản phẩm.</p></div>';
        return;
    }

?>

<div class="wrap">

    <h1>Sửa sản phẩm Affiliate</h1>

    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

        <input type="hidden" name="action" value="k86_update_product">

        <input type="hidden" name="id" value="<?php echo absint($product->id); ?>">

        <?php wp_nonce_field('k86_update_product', 'k86_nonce'); ?>

        <table class="form-table">

            <tr>
                <th><label for="name">Tên sản phẩm</label></th>
                <td>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="regular-text"
                        value="<?php echo esc_attr($product->name); ?>"
                        required>
                </td>
            </tr>

            <tr>
                <th><label for="price">Giá</label></th>
                <td>
                    <input
                        type="text"
                        id="price"
                        name="price"
                        class="regular-text"
                        value="<?php echo esc_attr($product->price); ?>">
                </td>
            </tr>

            <tr>
                <th><label for="shopee">Link Shopee</label></th>
                <td>
                    <input
                        type="url"
                        id="shopee"
                        name="shopee"
                        class="large-text"
                        value="<?php echo esc_attr($product->shopee); ?>">
                </td>
            </tr>

            <tr>
                <th><label for="tiktok">Link TikTok Shop</label></th>
                <td>
                    <input
                        type="url"
                        id="tiktok"
                        name="tiktok"
                        class="large-text"
                        value="<?php echo esc_attr($product->tiktok); ?>">
                </td>
            </tr>

            <tr>
                <th><label for="lazada">Link Lazada</label></th>
                <td>
                    <input
                        type="url"
                        id="lazada"
                        name="lazada"
                        class="large-text"
                        value="<?php echo esc_attr($product->lazada); ?>">
                </td>
            </tr>

            <tr>
                <th><label for="image">Ảnh sản phẩm</label></th>
                <td>
                    <input
                        type="url"
                        id="image"
                        name="image"
                        class="large-text"
                        value="<?php echo esc_attr($product->image); ?>">

                    <button
    type="button"
    id="k86-upload-image"
    class="button">
    Chọn ảnh
</button>

<div id="k86-image-preview" style="margin-top:10px;">
    <?php if (!empty($product->image)) : ?>
        <img src="<?php echo esc_url($product->image); ?>" style="max-width:200px;">
    <?php endif; ?>
</div>
                </td>
            </tr>

            <tr>
                <th><label for="description">Mô tả</label></th>
                <td>
                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        class="large-text"><?php echo esc_textarea($product->description); ?></textarea>
                </td>
            </tr>

        </table>

        <p>
            <input
                type="submit"
                class="button button-primary"
                value="Cập nhật sản phẩm">
        </p>

    </form>

</div>

<?php
}

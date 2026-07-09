
<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'k86_add_product_page');

function k86_add_product_page() {

    add_submenu_page(
        null,
        'Thêm sản phẩm',
        'Thêm sản phẩm',
        'manage_options',
        'k86-add-product',
        'k86_add_product_form'
    );
}

function k86_add_product_form() {
?>

<div class="wrap">

    <h1>Thêm sản phẩm Affiliate</h1>

    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

        <input type="hidden" name="action" value="k86_save_product">

        <?php wp_nonce_field('k86_save_product', 'k86_nonce'); ?>

        <table class="form-table">

            <tr>
                <th><label for="name">Tên sản phẩm</label></th>
                <td>
                    <input type="text" id="name" name="name" class="regular-text" required>
                </td>
            </tr>

            <tr>
                <th><label for="price">Giá</label></th>
                <td>
                    <input type="text" id="price" name="price" class="regular-text" required>
                </td>
            </tr>

            <!-- Thêm trường Ảnh sản phẩm -->

            <tr>
                <th><label for="image">Ảnh sản phẩm</label></th>
                <td>

                    <input
                        type="text"
                        id="image"
                        name="image"
                        class="regular-text"
                        placeholder="https://..."
                    >

                    <p class="description">
                        Tạm thời nhập URL ảnh. Phiên bản tiếp theo sẽ dùng Media Library.
                    </p>

                </td>
            </tr>

            <tr>
                <th><label for="shopee">Link Shopee</label></th>
                <td>
                    <input type="url" id="shopee" name="shopee" class="regular-text">
                </td>
            </tr>

            <tr>
                <th><label for="tiktok">Link TikTok Shop</label></th>
                <td>
                    <input type="url" id="tiktok" name="tiktok" class="regular-text">
                </td>
            </tr>

            <tr>
                <th><label for="lazada">Link Lazada</label></th>
                <td>
                    <input type="url" id="lazada" name="lazada" class="regular-text">
                </td>
            </tr>

            <tr>
                <th><label for="description">Mô tả</label></th>
                <td>
                    <textarea id="description" name="description" rows="5" class="large-text"></textarea>
                </td>
            </tr>

        </table>

        <p>
            <input type="submit" class="button button-primary" value="Lưu sản phẩm">
        </p>

    </form>

</div>

<?php
}

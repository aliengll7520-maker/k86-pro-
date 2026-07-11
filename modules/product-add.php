<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * K86 Pro
 * Module: Product Add
 * Version: 1.2.0
 */

add_action( 'admin_menu', 'k86_add_product_page' );

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

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

?>

<div class="wrap">

<h1>Thêm sản phẩm Affiliate</h1>

<form method="post"
action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">

<input
type="hidden"
name="action"
value="k86_save_product">

<?php wp_nonce_field( 'k86_save_product', 'k86_nonce' ); ?>

<table class="form-table">

<tr>

<th>

<label for="name">

Tên sản phẩm

</label>

</th>

<td>

<input
type="text"
id="name"
name="name"
class="regular-text"
required>

</td>

</tr>

<tr>

<th>

<label for="price">

Giá bán

</label>

</th>

<td>

<input
type="text"
id="price"
name="price"
class="regular-text">

</td>

</tr>

<tr>

<th>

<label for="sale_price">

Giá khuyến mãi

</label>

</th>

<td>

<input
type="text"
id="sale_price"
name="sale_price"
class="regular-text">

</td>

</tr>
    <tr>

<th>

<label for="shopee">

Link Shopee

</label>

</th>

<td>

<input
type="url"
id="shopee"
name="shopee"
class="large-text">

</td>

</tr>

<tr>

<th>

<label for="tiktok">

Link TikTok Shop

</label>

</th>

<td>

<input
type="url"
id="tiktok"
name="tiktok"
class="large-text">

</td>

</tr>

<tr>

<th>

<label for="lazada">

Link Lazada

</label>

</th>

<td>

<input
type="url"
id="lazada"
name="lazada"
class="large-text">

</td>

</tr>

<tr>

<th>

<label for="image">

Ảnh sản phẩm

</label>

</th>

<td>

<input
type="url"
id="image"
name="image"
class="large-text">

<p style="margin-top:10px;">

<button
type="button"
id="k86-upload-image"
class="button button-secondary">

📷 Chọn ảnh

</button>

<button
type="button"
id="k86-remove-image"
class="button">

❌ Xóa ảnh

</button>

</p>

<div
id="k86-image-preview"
style="margin-top:15px;">

</div>

<p class="description">

Bạn có thể chọn ảnh từ Media Library hoặc dán URL.

</p>

</td>

</tr>
    <tr>

    <th>

        <label for="description">

            Mô tả sản phẩm

        </label>

    </th>

    <td>

        <textarea
            id="description"
            name="description"
            rows="8"
            class="large-text"></textarea>

        <p class="description">

            Mô tả ngắn về sản phẩm, ưu điểm, thông số kỹ thuật...

        </p>

    </td>

</tr>

<tr>

    <th>

        <label for="status">

            Trạng thái

        </label>

    </th>

    <td>

        <select
            id="status"
            name="status">

            <option value="active" selected>

                Hoạt động

            </option>

            <option value="inactive">

                Tạm ẩn

            </option>

        </select>

    </td>

</tr>

</table>

<p class="submit">

    <input
        type="submit"
        class="button button-primary button-large"
        value="💾 Lưu sản phẩm">

    <a
        href="<?php echo admin_url( 'admin.php?page=k86-products' ); ?>"
        class="button button-large">

        Hủy

    </a>

</p>

</form>

</div>

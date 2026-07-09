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

<form method="post" action="<?php echo admin_url('admin-post.php'); ?>">

<input type="hidden" name="action" value="k86_save_product">

<table class="form-table">

<tr>
<th>Tên sản phẩm</th>
<td>
    <input type="text" name="name" class="regular-text" required>
</td>
</tr>

<tr>
<th>Giá</th>
<td>
    <input type="text" name="price" class="regular-text">
</td>
</tr>

<tr>
<th>Link Shopee</th>
<td>
    <input type="url" name="shopee" class="regular-text">
</td>
</tr>

<tr>
<th>Link TikTok Shop</th>
<td>
    <input type="url" name="tiktok" class="regular-text">
</td>
</tr>

<tr>
<th>Link Lazada</th>
<td>
    <input type="url" name="lazada" class="regular-text">
</td>
</tr>

<tr>
<th>Mô tả</th>
<td>
    <textarea name="description" rows="5" class="large-text"></textarea>
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

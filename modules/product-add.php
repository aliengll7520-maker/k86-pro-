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

<form method="post">

<table class="form-table">

<tr>
<th>Tên sản phẩm</th>
<td><input type="text" class="regular-text"></td>
</tr>

<tr>
<th>Giá</th>
<td><input type="text" class="regular-text"></td>
</tr>

<tr>
<th>Link Shopee</th>
<td><input type="url" class="regular-text"></td>
</tr>

<tr>
<th>Link TikTok Shop</th>
<td><input type="url" class="regular-text"></td>
</tr>

<tr>
<th>Link Lazada</th>
<td><input type="url" class="regular-text"></td>
</tr>

<tr>
<th>Mô tả</th>
<td><textarea rows="5" class="large-text"></textarea></td>
</tr>

</table>

<p>
<button class="button button-primary">
Lưu sản phẩm
</button>
</p>

</form>

</div>

<?php
}

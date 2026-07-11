<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'admin_menu', 'k86_product_manager_menu' );

function k86_product_manager_menu() {

    add_submenu_page(
        'k86-dashboard',
        'Quản lý sản phẩm',
        'Sản phẩm',
        'manage_options',
        'k86-products',
        'k86_product_manager_page'
    );
}

function k86_product_manager_page() {

    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $products = k86_get_products();

?>
<div class="wrap">

    <h1 class="wp-heading-inline">Quản lý sản phẩm</h1>

    <a href="<?php echo admin_url( 'admin.php?page=k86-add-product' ); ?>"
       class="page-title-action">
        Thêm mới
    </a>

    <hr class="wp-header-end">

    <table class="widefat striped">

        <thead>

        <tr>

            <th width="60">ID</th>

            <th>Ảnh</th>

            <th>Tên sản phẩm</th>

            <th>Giá</th>

            <th>Shopee</th>

            <th>TikTok</th>

            <th>Lazada</th>

            <th width="180">Thao tác</th>

        </tr>

        </thead>

        <tbody>

        <?php if ( $products ) : ?>

            <?php foreach ( $products as $product ) : ?>

                <tr>

                    <td><?php echo $product->id; ?></td>

                    <td>

                        <?php if ( ! empty( $product->image ) ) : ?>

                            <img
                                src="<?php echo esc_url( $product->image ); ?>"
                                width="70">

                        <?php endif; ?>

                    </td>

                    <td>

                        <strong>

                            <?php echo esc_html( $product->name ); ?>

                        </strong>

                    </td>

                    <td>

                        <?php echo esc_html( $product->price ); ?>

                    </td>

                    <td>

                        <?php echo ! empty( $product->shopee ) ? '✔' : '-'; ?>

                    </td>

                    <td>

                        <?php echo ! empty( $product->tiktok ) ? '✔' : '-'; ?>

                    </td>

                    <td>

                        <?php echo ! empty( $product->lazada ) ? '✔' : '-'; ?>

                    </td>

                    <td>

                        <a
                        class="button button-primary"
                        href="<?php echo admin_url( 'admin.php?page=k86-edit-product&id=' . $product->id ); ?>">
                            Sửa
                        </a>

                        <a
                        class="button button-secondary"
                        onclick="return confirm('Bạn có chắc muốn xóa?')"
                        href="<?php echo wp_nonce_url(
                            admin_url( 'admin-post.php?action=k86_delete_product&id=' . $product->id ),
                            'k86_delete_product'
                        ); ?>">
                            Xóa
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else : ?>

            <tr>

                <td colspan="8">

                    Chưa có sản phẩm nào.

                </td>

            </tr>

        <?php endif; ?>

        </tbody>

    </table>

</div>

<?php

}         

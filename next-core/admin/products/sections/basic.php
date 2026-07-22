<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="k86-admin-section">

    <h2><?php esc_html_e( 'Thông tin cơ bản', 'k86-pro' ); ?></h2>

    <table class="form-table">

        <tr>

            <th>
                <label for="k86_title">
                    <?php esc_html_e( 'Tên sản phẩm', 'k86-pro' ); ?>
                </label>
            </th>

            <td>

                <input
                    type="text"
                    id="k86_title"
                    name="k86_title"
                    class="regular-text"
                    value="<?php echo esc_attr( $product['title'] ?? '' ); ?>">

            </td>

        </tr>

        <tr>

            <th>
                <label for="k86_slug">
                    <?php esc_html_e( 'Slug', 'k86-pro' ); ?>
                </label>
            </th>

            <td>

                <input
                    type="text"
                    id="k86_slug"
                    name="k86_slug"
                    class="regular-text"
                    value="<?php echo esc_attr( $product['slug'] ?? '' ); ?>">

            </td>

        </tr>

        <tr>

            <th>
                <label for="k86_sku">
                    <?php esc_html_e( 'SKU', 'k86-pro' ); ?>
                </label>
            </th>

            <td>

                <input
                    type="text"
                    id="k86_sku"
                    name="k86_sku"
                    class="regular-text"
                    value="<?php echo esc_attr( $product['sku'] ?? '' ); ?>">

            </td>

        </tr>

        <tr>

            <th>
                <label for="k86_brand">
                    <?php esc_html_e( 'Thương hiệu', 'k86-pro' ); ?>
                </label>
            </th>

            <td>

                <input
                    type="text"
                    id="k86_brand"
                    name="k86_brand"
                    class="regular-text"
                    value="<?php echo esc_attr( $product['brand'] ?? '' ); ?>">

            </td>

        </tr>

        <tr>

            <th>
                <label for="k86_status">
                    <?php esc_html_e( 'Trạng thái', 'k86-pro' ); ?>
                </label>
            </th>

            <td>

                <select
                    id="k86_status"
                    name="k86_status">

                    <option value="draft">
                        Bản nháp
                    </option>

                    <option value="publish">
                        Xuất bản
                    </option>

                </select>

            </td>

        </tr>

    </table>

</div>

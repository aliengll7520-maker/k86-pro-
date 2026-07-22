<?php
defined( 'ABSPATH' ) || exit;
?>

<div class="k86-admin-section">

    <h2><?php esc_html_e( 'Media', 'k86-pro' ); ?></h2>

    <table class="form-table">

        <tr>

            <th>
                <label for="k86_image">
                    <?php esc_html_e( 'Ảnh đại diện', 'k86-pro' ); ?>
                </label>
            </th>

            <td>

                <input
                    type="text"
                    id="k86_image"
                    name="k86_image"
                    class="regular-text"
                    value="<?php echo esc_attr( $product['image'] ?? '' ); ?>">

                <p class="description">
                    URL ảnh đại diện sản phẩm.
                </p>

            </td>

        </tr>

        <tr>

            <th>
                <label for="k86_gallery">
                    <?php esc_html_e( 'Gallery', 'k86-pro' ); ?>
                </label>
            </th>

            <td>

                <textarea
                    id="k86_gallery"
                    name="k86_gallery"
                    rows="4"
                    class="large-text"><?php echo esc_textarea( $product['gallery'] ?? '' ); ?></textarea>

                <p class="description">
                    Mỗi URL một dòng.
                </p>

            </td>

        </tr>

        <tr>

            <th>
                <label for="k86_video">
                    <?php esc_html_e( 'Video', 'k86-pro' ); ?>
                </label>
            </th>

            <td>

                <input
                    type="text"
                    id="k86_video"
                    name="k86_video"
                    class="regular-text"
                    value="<?php echo esc_attr( $product['video'] ?? '' ); ?>">

                <p class="description">
                    URL YouTube, TikTok hoặc video trực tiếp.
                </p>

            </td>

        </tr>

    </table>

</div>

<?php
/**
 * K86 Pro Next Core
 *
 * Product Compare Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Compare_Module' ) ) {

	class K86_Product_Compare_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 70;

		}

		/**
		 * Get compare items.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		protected function get_compare_items( array $product ) {

			if ( ! empty( $product['compare_items'] ) && is_array( $product['compare_items'] ) ) {
				return $product['compare_items'];
			}

			return array();

		}

		/**
		 * Render compare section.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$title = ! empty( $product['compare_title'] )
				? sanitize_text_field( $product['compare_title'] )
				: __( 'So sánh sản phẩm', 'k86-pro' );

			$items = $this->get_compare_items( $product );

			if ( empty( $items ) ) {
				return '';
			}

			$product_id = ! empty( $product['id'] )
				? absint( $product['id'] )
				: 0;

			ob_start();
			?>

			<div class="k86-product-compare">

				<h3 class="k86-compare-title">
					<?php echo esc_html( $title ); ?>
				</h3>

				<table class="k86-compare-table">

					<tbody>

					<?php foreach ( $items as $item ) : ?>

						<tr>

							<th>
								<?php echo esc_html( $item['label'] ?? '' ); ?>
							</th>

							<td>
								<?php echo esc_html( $item['value'] ?? '' ); ?>
							</td>

						</tr>

					<?php endforeach; ?>

					</tbody>

				</table>

				<div class="k86-compare-actions">

					<button
						type="button"
						class="k86-compare-button"
						data-product-id="<?php echo esc_attr( $product_id ); ?>">

						<?php esc_html_e( 'Thêm vào so sánh', 'k86-pro' ); ?>

					</button>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

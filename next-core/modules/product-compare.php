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
		 * Render module.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$specs = array();

			if ( ! empty( $product['specifications'] ) && is_array( $product['specifications'] ) ) {
				$specs = $product['specifications'];
			}

			if ( empty( $specs ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-compare">

				<h3>Thông số kỹ thuật</h3>

				<table class="k86-specifications">

					<tbody>

					<?php foreach ( $specs as $label => $value ) : ?>

						<tr>

							<th>
								<?php echo esc_html( $label ); ?>
							</th>

							<td>
								<?php echo esc_html( $value ); ?>
							</td>

						</tr>

					<?php endforeach; ?>

					</tbody>

				</table>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

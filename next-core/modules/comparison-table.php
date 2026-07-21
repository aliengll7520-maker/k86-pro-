<?php
/**
 * K86 Pro Next Core
 * Comparison Table Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Comparison_Table_Module' ) ) {

	class K86_Comparison_Table_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 70;

		}

		/**
		 * Render comparison table.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$rows = array();

			if (
				isset( $product['comparison'] ) &&
				is_array( $product['comparison'] )
			) {
				$rows = $product['comparison'];
			}

			ob_start();
			?>

			<div class="k86-product-comparison">

				<?php if ( ! empty( $rows ) ) : ?>

					<table class="k86-comparison-table">

						<tbody>

							<?php foreach ( $rows as $label => $value ) : ?>

								<tr>

									<th scope="row">
										<?php echo esc_html( $label ); ?>
									</th>

									<td>
										<?php echo esc_html( $value ); ?>
									</td>

								</tr>

							<?php endforeach; ?>

						</tbody>

					</table>

				<?php else : ?>

					<div class="k86-comparison-placeholder">

						<?php esc_html_e( 'Chưa có thông tin so sánh.', 'k86-pro' ); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

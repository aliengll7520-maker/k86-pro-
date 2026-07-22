<?php
/**
 * K86 Pro Next Core
 *
 * Comparison Table Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Comparison_Table_Module' ) ) {

	class K86_Comparison_Table_Module {

		/**
		 * Render comparison table.
		 *
		 * @param array $items Comparison items.
		 *
		 * @return string
		 */
		public function render( array $items ) {

			if ( empty( $items ) ) {
				return '';
			}

			ob_start();
			?>

			<table class="k86-comparison-table">

				<thead>

					<tr>

						<th><?php esc_html_e( 'Thuộc tính', 'k86-pro' ); ?></th>

						<th><?php esc_html_e( 'Giá trị', 'k86-pro' ); ?></th>

					</tr>

				</thead>

				<tbody>

				<?php foreach ( $items as $item ) : ?>

					<tr>

						<td>
							<?php echo esc_html( $item['label'] ?? '' ); ?>
						</td>

						<td>
							<?php echo esc_html( $item['value'] ?? '' ); ?>
						</td>

					</tr>

				<?php endforeach; ?>

				</tbody>

			</table>

			<?php

			return ob_get_clean();

		}

	}

}

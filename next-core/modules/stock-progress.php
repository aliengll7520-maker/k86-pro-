<?php
/**
 * K86 Pro Next Core
 * Stock Progress Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Stock_Progress_Module' ) ) {

	class K86_Stock_Progress_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 100;

		}

		/**
		 * Render stock progress.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$stock = array();

			if (
				isset( $product['stock_progress'] ) &&
				is_array( $product['stock_progress'] )
			) {
				$stock = $product['stock_progress'];
			}

			$total = isset( $stock['total'] ) ? absint( $stock['total'] ) : 0;
			$sold  = isset( $stock['sold'] ) ? absint( $stock['sold'] ) : 0;

			$percent = 0;

			if ( $total > 0 ) {
				$percent = min( 100, round( ( $sold / $total ) * 100 ) );
			}

			ob_start();
			?>

			<div class="k86-product-stock-progress">

				<?php if ( $total > 0 ) : ?>

					<div class="k86-stock-bar">

						<div
							class="k86-stock-bar-fill"
							style="width: <?php echo esc_attr( $percent ); ?>%;"
						></div>

					</div>

					<div class="k86-stock-text">

						<?php
						printf(
							esc_html__( 'Đã bán %1$d / %2$d', 'k86-pro' ),
							$sold,
							$total
						);
						?>

					</div>

				<?php else : ?>

					<div class="k86-stock-placeholder">

						<?php esc_html_e( 'Chưa có thông tin tồn kho.', 'k86-pro' ); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

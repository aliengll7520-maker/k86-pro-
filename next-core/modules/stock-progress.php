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
		 * Get stock data.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		protected function get_stock( array $product ) {

			if (
				! empty( $product['stock_progress'] ) &&
				is_array( $product['stock_progress'] )
			) {
				return $product['stock_progress'];
			}

			return array();

		}

		/**
		 * Render stock progress.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$stock = $this->get_stock( $product );

			$total = isset( $stock['total'] ) ? absint( $stock['total'] ) : 0;
			$sold = isset( $stock['sold'] ) ? absint( $stock['sold'] ) : 0;
			$remaining = isset( $stock['remaining'] )
				? absint( $stock['remaining'] )
				: max( 0, $total - $sold );

			$status = ! empty( $stock['status'] )
				? sanitize_text_field( $stock['status'] )
				: __( 'Còn hàng', 'k86-pro' );

			$percent = 0;

			if ( $total > 0 ) {
				$percent = min( 100, round( ( $sold / $total ) * 100 ) );
			}

			$low_stock = (
				$remaining > 0 &&
				$remaining <= 5
			);

			ob_start();
			?>

			<div class="k86-product-stock-progress">

				<?php if ( $total > 0 ) : ?>

					<div class="k86-stock-bar">

						<div
							class="k86-stock-bar-fill"
							style="width: <?php echo esc_attr( $percent ); ?>%;">
						</div>

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

					<div class="k86-stock-remaining">

						<?php
						printf(
							esc_html__( 'Còn lại: %d', 'k86-pro' ),
							$remaining
						);
						?>

					</div>

					<div class="k86-stock-status">
						<?php echo esc_html( $status ); ?>
					</div>

					<?php if ( $low_stock ) : ?>

						<div class="k86-low-stock-warning">

							<?php
							printf(
								esc_html__( 'Chỉ còn %d sản phẩm!', 'k86-pro' ),
								$remaining
							);
							?>

						</div>

					<?php endif; ?>

				<?php else : ?>

					<div class="k86-stock-placeholder">

						<?php esc_html_e(
							'Chưa có thông tin tồn kho.',
							'k86-pro'
						); ?>

					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

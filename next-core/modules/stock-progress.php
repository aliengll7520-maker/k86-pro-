<?php
/**
 * K86 Pro Next Core
 *
 * Stock Progress Module
 *
 * Module hiển thị tiến độ tồn kho.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Stock_Progress_Module' ) ) {

	class K86_Stock_Progress_Module {

		/**
		 * Dữ liệu module.
		 *
		 * @var array
		 */
		protected $data = array();

		/**
		 * Khởi tạo module.
		 *
		 * @param array $data Dữ liệu sản phẩm.
		 */
		public function __construct( $data = array() ) {

			$this->data = $data;

		}

		/**
		 * Render module.
		 *
		 * @return string
		 */
		public function render() {

			$total = 0;
			$sold  = 0;

			if ( isset( $this->data['stock_total'] ) ) {
				$total = absint( $this->data['stock_total'] );
			}

			if ( isset( $this->data['stock_sold'] ) ) {
				$sold = absint( $this->data['stock_sold'] );
			}

			$percent = 0;

			if ( $total > 0 ) {
				$percent = min( 100, round( ( $sold / $total ) * 100 ) );
			}

			ob_start();
			?>

			<div class="k86-stock-progress">

				<div class="k86-stock-bar">

					<div
						class="k86-stock-bar-fill"
						style="width: <?php echo esc_attr( $percent ); ?>%;">
					</div>

				</div>

				<div class="k86-stock-text">

					<?php
					printf(
						/* translators: 1: sold quantity, 2: total quantity */
						esc_html__( 'Đã bán %1$d/%2$d', 'k86-pro' ),
						$sold,
						$total
					);
					?>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

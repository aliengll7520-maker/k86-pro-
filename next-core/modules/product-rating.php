<?php
/**
 * K86 Pro Next Core
 *
 * Product Rating Module
 *
 * Module hiển thị đánh giá sản phẩm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Rating_Module' ) ) {

	class K86_Product_Rating_Module {

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

			$rating = 0;
			$count  = 0;

			if ( isset( $this->data['rating'] ) ) {
				$rating = floatval( $this->data['rating'] );
			}

			if ( isset( $this->data['rating_count'] ) ) {
				$count = absint( $this->data['rating_count'] );
			}

			ob_start();
			?>

			<div class="k86-product-rating">

				<span class="k86-rating-score">
					<?php echo esc_html( number_format( $rating, 1 ) ); ?>/5
				</span>

				<span class="k86-rating-count">
					(<?php echo esc_html( $count ); ?>)
				</span>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

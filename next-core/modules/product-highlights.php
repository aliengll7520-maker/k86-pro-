<?php
/**
 * K86 Pro Next Core
 *
 * Product Highlights Module
 *
 * Module hiển thị các điểm nổi bật của sản phẩm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Highlights_Module' ) ) {

	class K86_Product_Highlights_Module {

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

			$highlights = array();

			if ( isset( $this->data['highlights'] ) && is_array( $this->data['highlights'] ) ) {
				$highlights = $this->data['highlights'];
			}

			ob_start();
			?>

			<div class="k86-product-highlights">

				<?php if ( ! empty( $highlights ) ) : ?>

					<ul>

						<?php foreach ( $highlights as $item ) : ?>

							<li><?php echo esc_html( $item ); ?></li>

						<?php endforeach; ?>

					</ul>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

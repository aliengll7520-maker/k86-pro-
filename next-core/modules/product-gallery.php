<?php
/**
 * K86 Pro Next Core
 *
 * Product Gallery Module
 *
 * Module hiển thị thư viện ảnh sản phẩm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Gallery_Module' ) ) {

	class K86_Product_Gallery_Module {

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

			$images = array();

			if ( isset( $this->data['images'] ) && is_array( $this->data['images'] ) ) {
				$images = $this->data['images'];
			}

			ob_start();
			?>

			<div class="k86-product-gallery">

				<?php foreach ( $images as $image ) : ?>

					<div class="k86-gallery-item">
						<img src="<?php echo esc_url( $image ); ?>" alt="">
					</div>

				<?php endforeach; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

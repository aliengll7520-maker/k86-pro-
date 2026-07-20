<?php
/**
 * K86 Pro Next Core
 *
 * Product Video Module
 *
 * Module hiển thị video sản phẩm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Video_Module' ) ) {

	class K86_Product_Video_Module {

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

			$video = '';

			if ( isset( $this->data['video'] ) ) {
				$video = esc_url( $this->data['video'] );
			}

			ob_start();
			?>

			<div class="k86-product-video">

				<?php if ( ! empty( $video ) ) : ?>

					<video controls preload="metadata">
						<source src="<?php echo $video; ?>" type="video/mp4">
					</video>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

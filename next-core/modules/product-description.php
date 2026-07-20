<?php
/**
 * K86 Pro Next Core
 *
 * Product Description Module
 *
 * Module hiển thị mô tả sản phẩm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Description_Module' ) ) {

	class K86_Product_Description_Module {

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

			$description = '';

			if ( isset( $this->data['description'] ) ) {
				$description = wp_kses_post( $this->data['description'] );
			}

			ob_start();
			?>

			<div class="k86-product-description">

				<?php echo $description; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

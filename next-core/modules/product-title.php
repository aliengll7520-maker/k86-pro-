<?php
/**
 * K86 Pro Next Core
 *
 * Product Title Module
 *
 * Module hiển thị tiêu đề sản phẩm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Title_Module' ) ) {

	class K86_Product_Title_Module {

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

			$title = '';

			if ( isset( $this->data['title'] ) ) {
				$title = esc_html( $this->data['title'] );
			}

			ob_start();
			?>

			<div class="k86-product-title">
				<h1><?php echo $title; ?></h1>
			</div>

			<?php

			return ob_get_clean();

		}

	}

}

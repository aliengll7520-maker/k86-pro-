<?php
/**
 * K86 Pro Next Core
 *
 * Free Shipping Module
 *
 * Module hiển thị thông tin miễn phí vận chuyển.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Free_Shipping_Module' ) ) {

	class K86_Free_Shipping_Module {

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

			$message = '';

			if ( isset( $this->data['free_shipping'] ) ) {
				$message = sanitize_text_field( $this->data['free_shipping'] );
			}

			ob_start();
			?>

			<div class="k86-free-shipping">

				<?php if ( ! empty( $message ) ) : ?>

					<div class="k86-free-shipping-text">
						<?php echo esc_html( $message ); ?>
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

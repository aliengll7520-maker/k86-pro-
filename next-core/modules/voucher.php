<?php
/**
 * K86 Pro Next Core
 *
 * Voucher Module
 *
 * Module hiển thị voucher và mã giảm giá.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Voucher_Module' ) ) {

	class K86_Voucher_Module {

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

			$code = '';
			$text = '';

			if ( isset( $this->data['voucher_code'] ) ) {
				$code = sanitize_text_field( $this->data['voucher_code'] );
			}

			if ( isset( $this->data['voucher_text'] ) ) {
				$text = sanitize_text_field( $this->data['voucher_text'] );
			}

			ob_start();
			?>

			<div class="k86-voucher">

				<?php if ( ! empty( $text ) ) : ?>
					<div class="k86-voucher-text">
						<?php echo esc_html( $text ); ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $code ) ) : ?>
					<div class="k86-voucher-code">
						<?php echo esc_html( $code ); ?>
					</div>
				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

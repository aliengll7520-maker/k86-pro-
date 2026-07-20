<?php
/**
 * K86 Pro Next Core
 *
 * Warranty Module
 *
 * Module hiển thị thông tin bảo hành.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Warranty_Module' ) ) {

	class K86_Warranty_Module {

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

			$period = '';
			$policy = '';

			if ( isset( $this->data['warranty_period'] ) ) {
				$period = sanitize_text_field( $this->data['warranty_period'] );
			}

			if ( isset( $this->data['warranty_policy'] ) ) {
				$policy = sanitize_text_field( $this->data['warranty_policy'] );
			}

			ob_start();
			?>

			<div class="k86-warranty">

				<?php if ( ! empty( $period ) ) : ?>
					<div class="k86-warranty-period">
						<?php echo esc_html( $period ); ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $policy ) ) : ?>
					<div class="k86-warranty-policy">
						<?php echo esc_html( $policy ); ?>
					</div>
				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

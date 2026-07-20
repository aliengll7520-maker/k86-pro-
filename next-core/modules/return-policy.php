<?php
/**
 * K86 Pro Next Core
 *
 * Return Policy Module
 *
 * Module hiển thị chính sách đổi trả.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Return_Policy_Module' ) ) {

	class K86_Return_Policy_Module {

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

			if ( isset( $this->data['return_period'] ) ) {
				$period = sanitize_text_field( $this->data['return_period'] );
			}

			if ( isset( $this->data['return_policy'] ) ) {
				$policy = sanitize_text_field( $this->data['return_policy'] );
			}

			ob_start();
			?>

			<div class="k86-return-policy">

				<?php if ( ! empty( $period ) ) : ?>
					<div class="k86-return-period">
						<?php echo esc_html( $period ); ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $policy ) ) : ?>
					<div class="k86-return-policy-text">
						<?php echo esc_html( $policy ); ?>
					</div>
				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

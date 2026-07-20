<?php
/**
 * K86 Pro Next Core
 *
 * Countdown Module
 *
 * Module hiển thị đồng hồ đếm ngược chương trình khuyến mãi.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Countdown_Module' ) ) {

	class K86_Countdown_Module {

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

			$end_time = '';

			if ( isset( $this->data['countdown_end'] ) ) {
				$end_time = sanitize_text_field( $this->data['countdown_end'] );
			}

			ob_start();
			?>

			<div class="k86-countdown">

				<?php if ( ! empty( $end_time ) ) : ?>

					<div class="k86-countdown-timer"
						data-end="<?php echo esc_attr( $end_time ); ?>">
						<?php echo esc_html( $end_time ); ?>
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

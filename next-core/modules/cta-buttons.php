<?php
/**
 * K86 Pro Next Core
 *
 * CTA Buttons Module
 *
 * Module hiển thị các nút kêu gọi hành động.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_CTA_Buttons_Module' ) ) {

	class K86_CTA_Buttons_Module {

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

			$buttons = array();

			if ( isset( $this->data['buttons'] ) && is_array( $this->data['buttons'] ) ) {
				$buttons = $this->data['buttons'];
			}

			ob_start();
			?>

			<div class="k86-cta-buttons">

				<?php foreach ( $buttons as $button ) : ?>

					<?php
					$label = isset( $button['label'] ) ? sanitize_text_field( $button['label'] ) : '';
					$url   = isset( $button['url'] ) ? esc_url( $button['url'] ) : '';

					if ( empty( $label ) || empty( $url ) ) {
						continue;
					}
					?>

					<a class="k86-cta-button"
					   href="<?php echo $url; ?>"
					   target="_blank"
					   rel="noopener noreferrer">
						<?php echo esc_html( $label ); ?>
					</a>

				<?php endforeach; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

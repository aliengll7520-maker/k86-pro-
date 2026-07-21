<?php
/**
 * K86 Pro Next Core
 *
 * Warranty Module
 *
 * Hiển thị thông tin bảo hành.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Warranty_Module' ) ) {

	class K86_Warranty_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 130;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$warranty = array();

			if (
				isset( $product['warranty'] ) &&
				is_array( $product['warranty'] )
			) {
				$warranty = $product['warranty'];
			}

			$enabled = ! empty( $warranty['enabled'] );
			$message = $warranty['message'] ?? '';

			ob_start();
			?>

			<div class="k86-product-warranty">

				<?php if ( $enabled ) : ?>

					<div class="k86-warranty-box">

						<span class="k86-warranty-icon">🛡️</span>

						<span class="k86-warranty-text">
							<?php
							echo esc_html(
								! empty( $message )
									? $message
									: __( 'Warranty available.', 'k86-pro' )
							);
							?>
						</span>

					</div>

				<?php else : ?>

					<div class="k86-warranty-placeholder">
						No warranty information.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

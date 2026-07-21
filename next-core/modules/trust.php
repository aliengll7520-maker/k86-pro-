<?php
/**
 * K86 Pro Next Core
 *
 * Trust Module
 *
 * Hiển thị các yếu tố tạo niềm tin.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Trust_Module' ) ) {

	class K86_Trust_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 120;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$trust = array();

			if (
				isset( $product['trust'] ) &&
				is_array( $product['trust'] )
			) {
				$trust = $product['trust'];
			}

			ob_start();
			?>

			<div class="k86-product-trust">

				<?php if ( ! empty( $trust ) ) : ?>

					<ul class="k86-trust-list">

						<?php foreach ( $trust as $item ) : ?>

							<li class="k86-trust-item">

								<span class="k86-trust-icon">✔</span>

								<span class="k86-trust-text">
									<?php echo esc_html( $item ); ?>
								</span>

							</li>

						<?php endforeach; ?>

					</ul>

				<?php else : ?>

					<div class="k86-trust-placeholder">
						No trust information.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

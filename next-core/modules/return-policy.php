<?php
/**
 * K86 Pro Next Core
 *
 * Return Policy Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Return_Policy_Module' ) ) {

	class K86_Return_Policy_Module {

		/**
		 * Thứ tự hiển thị.
		 *
		 * @return int
		 */
		public function priority() {

			return 140;

		}

		/**
		 * Render module.
		 *
		 * @param array $product Dữ liệu sản phẩm.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$return = array();

			if (
				isset( $product['return_policy'] ) &&
				is_array( $product['return_policy'] )
			) {
				$return = $product['return_policy'];
			}

			$enabled = ! empty( $return['enabled'] );
			$period  = $return['period'] ?? '';
			$message = $return['message'] ?? '';

			ob_start();
			?>

			<div class="k86-product-return-policy">

				<?php if ( $enabled ) : ?>

					<div class="k86-return-policy-box">

						<span class="k86-return-policy-icon">↩️</span>

						<div class="k86-return-policy-content">

							<?php if ( ! empty( $period ) ) : ?>
								<div class="k86-return-period">
									<?php echo esc_html( $period ); ?>
								</div>
							<?php endif; ?>

							<?php if ( ! empty( $message ) ) : ?>
								<div class="k86-return-policy-text">
									<?php echo esc_html( $message ); ?>
								</div>
							<?php endif; ?>

						</div>

					</div>

				<?php else : ?>

					<div class="k86-return-policy-placeholder">
						No return policy available.
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

<?php
/**
 * K86 Pro Next Core
 *
 * Trust Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Trust_Module' ) ) {

	class K86_Trust_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 60;

		}

		/**
		 * Render trust badges.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$items = array();

			if ( ! empty( $product['trust'] ) && is_array( $product['trust'] ) ) {

				$items = $product['trust'];

			} else {

				$items = array(
					'Chính hãng 100%',
					'Giao hàng nhanh',
					'Đổi trả dễ dàng',
					'Bảo hành chính hãng',
				);

			}

			ob_start();
			?>

			<div class="k86-product-trust">

				<?php foreach ( $items as $item ) : ?>

					<div class="k86-trust-item">

						<span class="k86-trust-icon">✔</span>

						<span class="k86-trust-text">

							<?php echo esc_html( $item ); ?>

						</span>

					</div>

				<?php endforeach; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

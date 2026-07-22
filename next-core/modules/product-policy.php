<?php
/**
 * K86 Pro Next Core
 *
 * Product Policy Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Policy_Module' ) ) {

	class K86_Product_Policy_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 130;

		}

		/**
		 * Render policy.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$title = ! empty( $product['policy_title'] )
				? sanitize_text_field( $product['policy_title'] )
				: __( 'Chính sách & Bảo hành', 'k86-pro' );

			$items = ! empty( $product['policies'] ) && is_array( $product['policies'] )
				? $product['policies']
				: array();

			if ( empty( $items ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-policy">

				<h3 class="k86-policy-title">
					<?php echo esc_html( $title ); ?>
				</h3>

				<ul class="k86-policy-list">

					<?php foreach ( $items as $item ) : ?>

						<li class="k86-policy-item">
							✔ <?php echo esc_html( $item ); ?>
						</li>

					<?php endforeach; ?>

				</ul>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

<?php
/**
 * K86 Pro Next Core
 *
 * Product FAQ Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_FAQ_Module' ) ) {

	class K86_Product_FAQ_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 140;

		}

		/**
		 * Render FAQ.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			$title = ! empty( $product['faq_title'] )
				? sanitize_text_field( $product['faq_title'] )
				: __( 'Câu hỏi thường gặp', 'k86-pro' );

			$items = ! empty( $product['faq'] ) && is_array( $product['faq'] )
				? $product['faq']
				: array();

			if ( empty( $items ) ) {
				return '';
			}

			ob_start();
			?>

			<div class="k86-product-faq">

				<h3 class="k86-faq-title">
					<?php echo esc_html( $title ); ?>
				</h3>

				<div class="k86-faq-list">

					<?php foreach ( $items as $item ) : ?>

						<details class="k86-faq-item">

							<summary>
								<?php echo esc_html( $item['question'] ?? '' ); ?>
							</summary>

							<div class="k86-faq-answer">

								<?php
								echo wp_kses_post(
									$item['answer'] ?? ''
								);
								?>

							</div>

						</details>

					<?php endforeach; ?>

				</div>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

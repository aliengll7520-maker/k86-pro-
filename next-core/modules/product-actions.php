<?php
/**
 * K86 Pro Next Core
 *
 * Product Actions Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Actions_Module' ) ) {

	class K86_Product_Actions_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 120;

		}

		/**
		 * Render action buttons.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product ) {

			ob_start();
			?>

			<div class="k86-product-actions">

				<?php if ( ! empty( $product['buy_url'] ) ) : ?>

					<a class="k86-btn k86-btn-buy"
					   href="<?php echo esc_url( $product['buy_url'] ); ?>"
					   target="_blank"
					   rel="nofollow sponsored noopener">

						Mua ngay

					</a>

				<?php endif; ?>

				<?php if ( ! empty( $product['shopee_url'] ) ) : ?>

					<a class="k86-btn k86-btn-shopee"
					   href="<?php echo esc_url( $product['shopee_url'] ); ?>"
					   target="_blank"
					   rel="nofollow sponsored noopener">

						Shopee

					</a>

				<?php endif; ?>

				<?php if ( ! empty( $product['tiktok_url'] ) ) : ?>

					<a class="k86-btn k86-btn-tiktok"
					   href="<?php echo esc_url( $product['tiktok_url'] ); ?>"
					   target="_blank"
					   rel="nofollow sponsored noopener">

						TikTok Shop

					</a>

				<?php endif; ?>

				<?php if ( ! empty( $product['lazada_url'] ) ) : ?>

					<a class="k86-btn k86-btn-lazada"
					   href="<?php echo esc_url( $product['lazada_url'] ); ?>"
					   target="_blank"
					   rel="nofollow sponsored noopener">

						Lazada

					</a>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

<?php
/**
 * K86 Pro Next Core
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

			return 120;

		}

		/**
		 * Render trust module.
		 *
		 * @param array $product Product data.
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

			/*
			 * Current fields.
			 */
			$enabled = ! empty( $trust['enabled'] );

			/*
			 * Future fields.
			 */
			$title            = $trust['title'] ?? '';
			$subtitle         = $trust['subtitle'] ?? '';

			$verified         = ! empty( $trust['verified'] );
			$official_store   = ! empty( $trust['official_store'] );
			$genuine_product  = ! empty( $trust['genuine_product'] );
			$secure_payment   = ! empty( $trust['secure_payment'] );
			$fast_shipping    = ! empty( $trust['fast_shipping'] );
			$high_rating      = ! empty( $trust['high_rating'] );

			$seller_level     = $trust['seller_level'] ?? '';
			$trust_score      = isset( $trust['trust_score'] ) ? absint( $trust['trust_score'] ) : 0;

			$badges           = isset( $trust['badges'] ) && is_array( $trust['badges'] )
				? $trust['badges']
				: array();

			$css_class        = $trust['css_class'] ?? '';

			$attributes = isset( $trust['attributes'] ) && is_array( $trust['attributes'] )
				? $trust['attributes']
				: array();

			ob_start();
			?>

			<div class="k86-product-trust <?php echo esc_attr( $css_class ); ?>">

				<?php if ( $enabled ) : ?>

					<?php if ( ! empty( $title ) ) : ?>
						<div class="k86-trust-title">
							<?php echo esc_html( $title ); ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $subtitle ) ) : ?>
						<div class="k86-trust-subtitle">
							<?php echo esc_html( $subtitle ); ?>
						</div>
					<?php endif; ?>

					<ul class="k86-trust-list">

						<?php if ( $verified ) : ?>
							<li class="k86-trust-item">✔ <?php esc_html_e( 'Đã xác minh', 'k86-pro' ); ?></li>
						<?php endif; ?>

						<?php if ( $official_store ) : ?>
							<li class="k86-trust-item">🏪 <?php esc_html_e( 'Cửa hàng chính hãng', 'k86-pro' ); ?></li>
						<?php endif; ?>

						<?php if ( $genuine_product ) : ?>
							<li class="k86-trust-item">🛡 <?php esc_html_e( 'Hàng chính hãng', 'k86-pro' ); ?></li>
						<?php endif; ?>

						<?php if ( $secure_payment ) : ?>
							<li class="k86-trust-item">🔒 <?php esc_html_e( 'Thanh toán an toàn', 'k86-pro' ); ?></li>
						<?php endif; ?>

						<?php if ( $fast_shipping ) : ?>
							<li class="k86-trust-item">🚚 <?php esc_html_e( 'Giao hàng nhanh', 'k86-pro' ); ?></li>
						<?php endif; ?>

						<?php if ( $high_rating ) : ?>
							<li class="k86-trust-item">⭐ <?php esc_html_e( 'Đánh giá cao', 'k86-pro' ); ?></li>
						<?php endif; ?>

					</ul>

					<?php if ( ! empty( $seller_level ) ) : ?>
						<div class="k86-seller-level">
							<?php echo esc_html( $seller_level ); ?>
						</div>
					<?php endif; ?>

					<?php if ( $trust_score > 0 ) : ?>
						<div class="k86-trust-score">
							<?php
							printf(
								esc_html__( 'Điểm uy tín: %d', 'k86-pro' ),
								$trust_score
							);
							?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $badges ) ) : ?>
						<div class="k86-trust-badges">
							<?php foreach ( $badges as $badge ) : ?>
								<span class="k86-trust-badge">
									<?php echo esc_html( $badge ); ?>
								</span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				<?php else : ?>

					<div class="k86-trust-placeholder">
						<?php esc_html_e(
							'Không có thông tin xác thực.',
							'k86-pro'
						); ?>
					</div>

				<?php endif; ?>

			</div>

			<?php

			return ob_get_clean();

		}

	}

}

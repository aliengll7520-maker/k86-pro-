<?php
/**
 * K86 Pro Next Core
 * Return Policy Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Return_Policy_Module' ) ) {

	class K86_Return_Policy_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {
			return 140;
		}

		/**
		 * Get return policy.
		 *
		 * @param array $product Product data.
		 * @return array
		 */
		protected function get_policy( array $product ) {

			if (
				isset( $product['return_policy'] ) &&
				is_array( $product['return_policy'] )
			) {
				return $product['return_policy'];
			}

			return array();

		}

		/**
		 * Render module.
		 *
		 * @param array $product Product data.
		 * @return string
		 */
		public function render( array $product = array() ) {

			$return = $this->get_policy( $product );

			$enabled = ! empty( $return['enabled'] );

			if ( ! $enabled ) {
				return '';
			}

			$title         = $return['title'] ?? __( 'Đổi trả', 'k86-pro' );
			$subtitle      = $return['subtitle'] ?? '';
			$message       = $return['message'] ?? '';
			$description   = $return['description'] ?? '';

			$return_days   = isset( $return['return_days'] ) ? absint( $return['return_days'] ) : 0;
			$exchange_days = isset( $return['exchange_days'] ) ? absint( $return['exchange_days'] ) : 0;

			$condition     = $return['condition'] ?? '';

			$return_fee    = $return['return_fee'] ?? '';
			$exchange_fee  = $return['exchange_fee'] ?? '';

			$refund_method = $return['refund_method'] ?? '';
			$refund_time   = $return['refund_time'] ?? '';

			$policy_url    = $return['policy_url'] ?? '';

			$badge         = $return['badge'] ?? '';
			$icon          = $return['icon'] ?? '↩️';

			$pickup        = ! empty( $return['pickup_supported'] );
			$refund        = ! empty( $return['refund_supported'] );

			$attributes = isset( $return['attributes'] ) && is_array( $return['attributes'] )
				? $return['attributes']
				: array();

			ob_start();
			?>
			<div class="k86-product-return-policy">

	<div class="k86-return-policy-box">

		<div class="k86-return-policy-header">

			<span class="k86-return-policy-icon">
				<?php echo esc_html( $icon ); ?>
			</span>

			<h3 class="k86-return-policy-title">
				<?php echo esc_html( $title ); ?>
			</h3>

			<?php if ( ! empty( $badge ) ) : ?>

				<span class="k86-return-policy-badge">
					<?php echo esc_html( $badge ); ?>
				</span>

			<?php endif; ?>

		</div>

		<?php if ( ! empty( $subtitle ) ) : ?>

			<div class="k86-return-policy-subtitle">
				<?php echo esc_html( $subtitle ); ?>
			</div>

		<?php endif; ?>

		<?php if ( ! empty( $message ) ) : ?>

			<div class="k86-return-policy-message">
				<?php echo esc_html( $message ); ?>
			</div>

		<?php endif; ?>

		<?php if ( ! empty( $description ) ) : ?>

			<div class="k86-return-policy-description">
				<?php echo wp_kses_post( wpautop( $description ) ); ?>
			</div>

		<?php endif; ?>

		<ul class="k86-return-policy-list">

			<?php if ( $return_days > 0 ) : ?>

				<li>
					<?php
					printf(
						esc_html__( 'Đổi trả trong %d ngày', 'k86-pro' ),
						$return_days
					);
					?>
				</li>

			<?php endif; ?>

			<?php if ( $exchange_days > 0 ) : ?>

				<li>
					<?php
					printf(
						esc_html__( 'Đổi sản phẩm trong %d ngày', 'k86-pro' ),
						$exchange_days
					);
					?>
				</li>

			<?php endif; ?>

			<?php if ( ! empty( $condition ) ) : ?>

				<li>
					<strong><?php esc_html_e( 'Điều kiện:', 'k86-pro' ); ?></strong>
					<?php echo esc_html( $condition ); ?>
				</li>

			<?php endif; ?>

			<?php if ( ! empty( $return_fee ) ) : ?>

				<li>
					<strong><?php esc_html_e( 'Phí trả hàng:', 'k86-pro' ); ?></strong>
					<?php echo esc_html( $return_fee ); ?>
				</li>

			<?php endif; ?>

			<?php if ( ! empty( $exchange_fee ) ) : ?>

				<li>
					<strong><?php esc_html_e( 'Phí đổi hàng:', 'k86-pro' ); ?></strong>
					<?php echo esc_html( $exchange_fee ); ?>
				</li>

			<?php endif; ?>

			<?php if ( $pickup ) : ?>

				<li><?php esc_html_e( 'Có hỗ trợ lấy hàng tận nơi', 'k86-pro' ); ?></li>

			<?php endif; ?>

			<?php if ( $refund ) : ?>

				<li><?php esc_html_e( 'Có hỗ trợ hoàn tiền', 'k86-pro' ); ?></li>

			<?php endif; ?>

			<?php if ( ! empty( $refund_method ) ) : ?>

				<li>
					<strong><?php esc_html_e( 'Hình thức hoàn tiền:', 'k86-pro' ); ?></strong>
					<?php echo esc_html( $refund_method ); ?>
				</li>

			<?php endif; ?>

			<?php if ( ! empty( $refund_time ) ) : ?>

				<li>
					<strong><?php esc_html_e( 'Thời gian hoàn tiền:', 'k86-pro' ); ?></strong>
					<?php echo esc_html( $refund_time ); ?>
				</li>

			<?php endif; ?>
						<?php foreach ( $attributes as $label => $value ) : ?>

				<?php if ( '' !== (string) $value ) : ?>

					<li>
						<strong><?php echo esc_html( $label ); ?>:</strong>
						<?php echo esc_html( $value ); ?>
					</li>

				<?php endif; ?>

			<?php endforeach; ?>

		</ul>

		<?php if ( ! empty( $policy_url ) ) : ?>

			<div class="k86-return-policy-link">

				<a
					href="<?php echo esc_url( $policy_url ); ?>"
					target="_blank"
					rel="noopener noreferrer"
				>
					<?php esc_html_e( 'Xem chi tiết chính sách', 'k86-pro' ); ?>
				</a>

			</div>

		<?php endif; ?>

	</div>

</div>

<?php

			return ob_get_clean();

		}

	}

}

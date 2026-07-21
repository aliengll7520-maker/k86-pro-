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
		 * Render return policy.
		 *
		 * @param array $product Product data.
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

			/*
			 * Current fields.
			 */
			$enabled = ! empty( $return['enabled'] );
			$message = $return['message'] ?? '';

			/*
			 * Future fields.
			 */
			$title             = $return['title'] ?? '';
			$subtitle          = $return['subtitle'] ?? '';
			$description       = $return['description'] ?? '';

			$return_days       = isset( $return['return_days'] ) ? absint( $return['return_days'] ) : 0;
			$exchange_days     = isset( $return['exchange_days'] ) ? absint( $return['exchange_days'] ) : 0;

			$condition         = $return['condition'] ?? '';
			$policy_type       = $return['policy_type'] ?? '';

			$return_fee        = $return['return_fee'] ?? '';
			$exchange_fee      = $return['exchange_fee'] ?? '';

			$pickup_supported  = ! empty( $return['pickup_supported'] );
			$refund_supported  = ! empty( $return['refund_supported'] );

			$refund_method     = $return['refund_method'] ?? '';
			$refund_time       = $return['refund_time'] ?? '';

			$policy_url        = $return['policy_url'] ?? '';

			$status            = $return['status'] ?? '';
			$badge             = $return['badge'] ?? '';
			$icon              = $return['icon'] ?? '↩️';
			$css_class         = $return['css_class'] ?? '';

			$attributes = isset( $return['attributes'] ) && is_array( $return['attributes'] )
				? $return['attributes']
				: array();

			ob_start();
			?>

			<div class="k86-product-return-policy <?php echo esc_attr( $css_class ); ?>">

				<?php if ( $enabled ) : ?>

					<div
						class="k86-return-policy-box"
						data-policy-type="<?php echo esc_attr( $policy_type ); ?>"
					>

						<div class="k86-return-policy-header">

							<span class="k86-return-policy-icon">
								<?php echo esc_html( $icon ); ?>
							</span>

							<?php if ( ! empty( $title ) ) : ?>
								<span class="k86-return-policy-title">
									<?php echo esc_html( $title ); ?>
								</span>
							<?php endif; ?>

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
								<?php echo esc_html( $description ); ?>
							</div>
						<?php endif; ?>

						<?php if ( $return_days > 0 ) : ?>
							<div class="k86-return-days">
								<?php
								printf(
									esc

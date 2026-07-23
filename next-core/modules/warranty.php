<?php
/**
 * K86 Pro Next Core
 * Warranty Module
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Warranty_Module' ) ) {

	class K86_Warranty_Module {

		/**
		 * Module priority.
		 *
		 * @return int
		 */
		public function priority() {

			return 150;

		}

		/**
		 * Get warranty data.
		 *
		 * @param array $product Product data.
		 *
		 * @return array
		 */
		protected function get_warranty( array $product ) {

			if (
				isset( $product['warranty'] ) &&
				is_array( $product['warranty'] )
			) {
				return $product['warranty'];
			}

			return array();

		}

		/**
		 * Render warranty.
		 *
		 * @param array $product Product data.
		 *
		 * @return string
		 */
		public function render( array $product = array() ) {

			$warranty = $this->get_warranty( $product );

			if ( empty( $warranty['enabled'] ) ) {
				return '';
			}

			$title = ! empty( $warranty['title'] )
				? sanitize_text_field( $warranty['title'] )
				: __( 'Bảo hành', 'k86-pro' );

			$subtitle = ! empty( $warranty['subtitle'] )
				? sanitize_text_field( $warranty['subtitle'] )
				: '';

			$description = ! empty( $warranty['description'] )
				? wp_kses_post( $warranty['description'] )
				: '';

			$period = isset( $warranty['period'] )
				? absint( $warranty['period'] )
				: 0;

			$unit = ! empty( $warranty['unit'] )
				? sanitize_text_field( $warranty['unit'] )
				: __( 'tháng', 'k86-pro' );

			$type = ! empty( $warranty['type'] )
				? sanitize_text_field( $warranty['type'] )
				: '';

			$provider = ! empty( $warranty['provider'] )
				? sanitize_text_field( $warranty['provider'] )
				: '';

			$policy_url = ! empty( $warranty['policy_url'] )
				? esc_url( $warranty['policy_url'] )
				: '';

			$claim_url = ! empty( $warranty['claim_url'] )
				? esc_url( $warranty['claim_url'] )
				: '';

			$support_phone = ! empty( $warranty['support_phone'] )
				? sanitize_text_field( $warranty['support_phone'] )
				: '';

			$support_email = ! empty( $warranty['support_email'] )
				? sanitize_email( $warranty['support_email'] )
				: '';

			$onsite = ! empty( $warranty['onsite'] );

			$international = ! empty( $warranty['international'] );

			$badge = ! empty( $warranty['badge'] )
				? sanitize_text_field( $warranty['badge'] )
				: '';

			$icon = ! empty( $warranty['icon'] )
				? sanitize_text_field( $warranty['icon'] )
				: '🛡️';

			$attributes = ! empty( $warranty['attributes'] ) && is_array( $warranty['attributes'] )
				? $warranty['attributes']
				: array();

			ob_start();

			?>
			<div class="k86-product-warranty">

	<div class="k86-warranty-box">

		<div class="k86-warranty-header">

			<div class="k86-warranty-title-wrap">

				<span class="k86-warranty-icon">
					<?php echo esc_html( $icon ); ?>
				</span>

				<h3 class="k86-warranty-title">
					<?php echo esc_html( $title ); ?>
				</h3>

			</div>

			<?php if ( ! empty( $badge ) ) : ?>

				<span class="k86-warranty-badge">
					<?php echo esc_html( $badge ); ?>
				</span>

			<?php endif; ?>

		</div>

		<?php if ( ! empty( $subtitle ) ) : ?>

			<div class="k86-warranty-subtitle">
				<?php echo esc_html( $subtitle ); ?>
			</div>

		<?php endif; ?>

		<?php if ( ! empty( $description ) ) : ?>

			<div class="k86-warranty-description">
				<?php echo wp_kses_post( wpautop( $description ) ); ?>
			</div>

		<?php endif; ?>

		<ul class="k86-warranty-list">

			<?php if ( $period > 0 ) : ?>

				<li class="k86-warranty-period">

					<strong>
						<?php esc_html_e( 'Thời hạn bảo hành:', 'k86-pro' ); ?>
					</strong>

					<?php echo esc_html( $period . ' ' . $unit ); ?>

				</li>

			<?php endif; ?>

			<?php if ( ! empty( $type ) ) : ?>

				<li class="k86-warranty-type">

					<strong>
						<?php esc_html_e( 'Hình thức:', 'k86-pro' ); ?>
					</strong>

					<?php echo esc_html( $type ); ?>

				</li>

			<?php endif; ?>

			<?php if ( ! empty( $provider ) ) : ?>

				<li class="k86-warranty-provider">

					<strong>
						<?php esc_html_e( 'Đơn vị bảo hành:', 'k86-pro' ); ?>
					</strong>

					<?php echo esc_html( $provider ); ?>

				</li>

			<?php endif; ?>
						<?php if ( ! empty( $support_phone ) ) : ?>

				<li class="k86-warranty-phone">

					<strong>
						<?php esc_html_e( 'Hotline bảo hành:', 'k86-pro' ); ?>
					</strong>

					<?php echo esc_html( $support_phone ); ?>

				</li>

			<?php endif; ?>

			<?php if ( ! empty( $support_email ) ) : ?>

				<li class="k86-warranty-email">

					<strong>
						<?php esc_html_e( 'Email hỗ trợ:', 'k86-pro' ); ?>
					</strong>

					<?php echo esc_html( $support_email ); ?>

				</li>

			<?php endif; ?>

			<?php if ( $onsite ) : ?>

				<li class="k86-warranty-onsite">

					✅ <?php esc_html_e( 'Hỗ trợ bảo hành tận nơi', 'k86-pro' ); ?>

				</li>

			<?php endif; ?>

			<?php if ( $international ) : ?>

				<li class="k86-warranty-international">

					🌍 <?php esc_html_e( 'Hỗ trợ bảo hành quốc tế', 'k86-pro' ); ?>

				</li>

			<?php endif; ?>

			<?php if ( ! empty( $attributes ) ) : ?>

				<?php foreach ( $attributes as $label => $value ) : ?>

					<?php if ( '' !== (string) $value ) : ?>

						<li class="k86-warranty-attribute">

							<strong>
								<?php echo esc_html( $label ); ?>:
							</strong>

							<?php echo esc_html( $value ); ?>

						</li>

					<?php endif; ?>

				<?php endforeach; ?>

			<?php endif; ?>

		</ul>
					<?php if ( ! empty( $policy_url ) || ! empty( $claim_url ) ) : ?>

			<div class="k86-warranty-actions">

				<?php if ( ! empty( $policy_url ) ) : ?>

					<a
						class="k86-warranty-policy-button"
						href="<?php echo esc_url( $policy_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
					>
						<?php esc_html_e( 'Xem chính sách bảo hành', 'k86-pro' ); ?>
					</a>

				<?php endif; ?>

				<?php if ( ! empty( $claim_url ) ) : ?>

					<a
						class="k86-warranty-claim-button"
						href="<?php echo esc_url( $claim_url ); ?>"
						target="_blank"
						rel="noopener noreferrer"
					>
						<?php esc_html_e( 'Gửi yêu cầu bảo hành', 'k86-pro' ); ?>
					</a>

				<?php endif; ?>

			</div>

		<?php endif; ?>

	</div>

</div>

<?php

			return ob_get_clean();

		}

	}

}

<?php
/**
 * K86 Pro Next Core
 *
 * Comparison Table Module
 *
 * Module hiển thị bảng so sánh sản phẩm.
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Comparison_Table_Module' ) ) {

	class K86_Comparison_Table_Module {

		/**
		 * Dữ liệu module.
		 *
		 * @var array
		 */
		protected $data = array();

		/**
		 * Khởi tạo module.
		 *
		 * @param array $data Dữ liệu sản phẩm.
		 */
		public function __construct( $data = array() ) {

			$this->data = $data;

		}

		/**
		 * Render module.
		 *
		 * @return string
		 */
		public function render() {

			$rows = array();

			if ( isset( $this->data['comparison'] ) && is_array( $this->data['comparison'] ) ) {
				$rows = $this->data['comparison'];
			}

			ob_start();
			?>

			<table class="k86-comparison-table">

				<tbody>

				<?php foreach ( $rows as $label => $value ) : ?>

					<tr>
						<th><?php echo esc_html( $label ); ?></th>
						<td><?php echo esc_html( $value ); ?></td>
					</tr>

				<?php endforeach; ?>

				</tbody>

			</table>

			<?php

			return ob_get_clean();

		}

	}

}

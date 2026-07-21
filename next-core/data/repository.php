<?php
/**
 * K86 Pro Next Core
 * Product Repository
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Product_Repository' ) ) {

	class K86_Product_Repository {

		/**
		 * Lấy sản phẩm theo ID.
		 *
		 * @param int $id
		 * @return K86_Product_Model
		 */
		public function find( $id ) {

			$data = array(
				'id' => absint( $id ),
			);

			return new K86_Product_Model( $data );
		}

		/**
		 * Lấy sản phẩm theo Slug.
		 *
		 * @param string $slug
		 * @return K86_Product_Model|null
		 */
		public function find_by_slug( $slug ) {

			// TODO: Build tiếp theo sẽ truy vấn Database.

			return null;
		}

		/**
		 * Lấy sản phẩm theo SKU.
		 *
		 * @param string $sku
		 * @return K86_Product_Model|null
		 */
		public function find_by_sku( $sku ) {

			// TODO: Build tiếp theo sẽ truy vấn Database.

			return null;
		}

		/**
		 * Kiểm tra sản phẩm có tồn tại.
		 *
		 * @param int $id
		 * @return bool
		 */
		public function exists( $id ) {

			return $this->find( $id )->get( 'id' ) > 0;
		}

		/**
		 * Lấy danh sách sản phẩm.
		 *
		 * @return array
		 */
		public function all() {

			// TODO: Build tiếp theo sẽ lấy dữ liệu từ Database.

			return array();
		}

		/**
		 * Phân trang danh sách sản phẩm.
		 *
		 * @param int $page
		 * @param int $per_page
		 * @return array
		 */
		public function paginate( $page = 1, $per_page = 20 ) {

			// TODO: Build tiếp theo sẽ hỗ trợ phân trang.

			return array();
		}

		/**
		 * Lưu sản phẩm.
		 *
		 * @param K86_Product_Model $product
		 * @return bool
		 */
		public function save( K86_Product_Model $product ) {

			// TODO: Build tiếp theo sẽ ghi vào Database.

			return true;
		}

		/**
		 * Xóa sản phẩm.
		 *
		 * @param int $id
		 * @return bool
		 */
		public function delete( $id ) {

			// TODO: Build tiếp theo sẽ xóa khỏi Database.

			return true;
		}
	}

}

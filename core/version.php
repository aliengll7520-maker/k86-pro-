<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Core: Version Manager
 * Version: 1.5.2
 * Status: Framework RC1
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * --------------------------------------------------------
 * Database Version
 * --------------------------------------------------------
 *
 * Plugin Version được quản lý trong:
 * k86-pro.php
 *
 * Database Version chỉ tăng khi có thay đổi
 * cấu trúc Cơ sở dữ liệu.
 *
 * Ví dụ:
 * - Thêm bảng mới.
 * - Xóa bảng.
 * - Thêm cột.
 * - Xóa cột.
 * - Đổi kiểu dữ liệu.
 *
 * Không tăng Database Version khi:
 * - Chỉnh sửa giao diện.
 * - Sửa lỗi PHP.
 * - Thay đổi CSS hoặc JavaScript.
 * - Thêm chức năng không liên quan Database.
 */

/**
 * Database Version
 */
if ( ! defined( 'K86_DB_VERSION' ) ) {

	define( 'K86_DB_VERSION', '1.1.0' );

}

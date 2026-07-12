<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Core: Version Manager
 * Version: 1.5.1
 * Status: Development
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * --------------------------------------------------------
 * Phiên bản Database của K86 Pro
 * --------------------------------------------------------
 *
 * Chỉ tăng phiên bản khi có thay đổi cấu trúc Database.
 *
 * Ví dụ:
 * - Thêm cột mới
 * - Xóa cột
 * - Đổi kiểu dữ liệu
 * - Thêm bảng mới
 *
 * Không tăng phiên bản khi chỉ sửa giao diện
 * hoặc chỉnh sửa mã nguồn.
 */
define( 'K86_DB_VERSION', '1.1.0' );

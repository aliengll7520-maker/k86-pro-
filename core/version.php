<?php
/**
 * ------------------------------------------------------------------------
 * K86 Pro
 * Core Version Manager
 * ------------------------------------------------------------------------
 *
 * Quản lý toàn bộ phiên bản của Framework.
 *
 * - Plugin Version
 * - Database Version
 *
 * @package K86_Pro
 * @since   1.6.0
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Plugin Version
|--------------------------------------------------------------------------
*/

if ( ! defined( 'K86_VERSION' ) ) {
	define( 'K86_VERSION', '1.6.0' );
}

/*
|--------------------------------------------------------------------------
| Database Version
|--------------------------------------------------------------------------
|
| Chỉ tăng khi thay đổi cấu trúc Database:
| - Thêm/Xóa bảng
| - Thêm/Xóa cột
| - Thay đổi kiểu dữ liệu
|
| Không tăng khi:
| - Sửa giao diện
| - Sửa PHP
| - CSS / JavaScript
| - Business Logic
|
*/

if ( ! defined( 'K86_DB_VERSION' ) ) {
	define( 'K86_DB_VERSION', '1.1.0' );
}

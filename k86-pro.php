/*
|--------------------------------------------------------------------------
| Admin Assets
|--------------------------------------------------------------------------
*/

/**
 * Load admin assets for K86 Pro.
 *
 * Chỉ nạp CSS và JavaScript trên các trang quản trị
 * thuộc K86 Pro để giảm tải cho WordPress Admin.
 *
 * @param string $hook_suffix Current admin page.
 * @return void
 */
function k86_admin_assets( $hook_suffix ) {

	// Chỉ load trên trang của K86 Pro.
	if ( false === strpos( $hook_suffix, 'k86' ) ) {
		return;
	}

	// Media Library.
	wp_enqueue_media();
	/*
	|--------------------------------------------------------------------------
	| Admin CSS
	|--------------------------------------------------------------------------
	*/

	wp_enqueue_style(
		'k86-admin-style',
		K86_PRO_ASSETS . 'style.css',
		array(),
		K86_PRO_VERSION
	);

	/*
	|--------------------------------------------------------------------------
	| Admin JavaScript
	|--------------------------------------------------------------------------
	*/

	wp_enqueue_script(
		'k86-admin-media',
		K86_PRO_ASSETS . 'js/media.js',
		array( 'jquery' ),
		K86_PRO_VERSION,
		true
	);
	/*
	|--------------------------------------------------------------------------
	| Localize Script
	|--------------------------------------------------------------------------
	*/

	wp_localize_script(
		'k86-admin-media',
		'k86Pro',
		array(
			'title'   => esc_html__( 'Chọn ảnh sản phẩm', 'k86-pro' ),
			'button'  => esc_html__( 'Sử dụng ảnh này', 'k86-pro' ),
			'version' => K86_PRO_VERSION,
			'nonce'   => wp_create_nonce( 'k86_admin_nonce' ),
		)
	);
	wp_localize_script(
		'k86-admin-media',
		'k86Pro',
		array(
			'title'   => esc_html__( 'Chọn ảnh sản phẩm', 'k86-pro' ),
			'button'  => esc_html__( 'Sử dụng ảnh này', 'k86-pro' ),
			'version' => K86_PRO_VERSION,
			'nonce'   => wp_create_nonce( 'k86_admin_nonce' ),
		)
	);
/*
|--------------------------------------------------------------------------
| Register Admin Assets
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký nạp tài nguyên cho trang quản trị.
 *
 * @return void
 */
function k86_register_admin_assets() {

	add_action(
		'admin_enqueue_scripts',
		'k86_admin_assets'
	);

}
/*
|--------------------------------------------------------------------------
| Plugin Bootstrap Hooks
|--------------------------------------------------------------------------
*/

/**
 * Đăng ký các Hook cốt lõi của plugin.
 *
 * @return void
 */
function k86_register_core_hooks() {

	k86_register_admin_assets();

}
/*
|--------------------------------------------------------------------------
| Plugin Loaded
|--------------------------------------------------------------------------
*/

/**
 * Khởi động các Hook cốt lõi của K86 Pro.
 */
k86_register_core_hooks();

/**
 * Thông báo plugin đã được nạp.
 */
do_action( 'k86_pro_loaded' );
/*
|--------------------------------------------------------------------------
| Framework Ready
|--------------------------------------------------------------------------
|
| Điểm khởi động chung của toàn bộ K86 Pro.
| Chỉ phát tín hiệu sau khi các Hook cốt lõi đã
| được đăng ký và Plugin đã khởi tạo xong.
|
*/

/**
 * Thông báo Framework đã sẵn sàng.
 */
do_action( 'k86_framework_ready' );

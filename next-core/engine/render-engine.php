<?php
/**
 * Kiểm tra handler tồn tại.
 *
 * @param string $key Handler key.
 * @return bool
 */
public function has( $key ) {

	return array_key_exists(
		$key,
		$this->handlers
	);

}

/**
 * Xóa handler.
 *
 * @param string $key Handler key.
 * @return void
 */
public function unregister( $key ) {

	if ( $this->has( $key ) ) {
		unset( $this->handlers[ $key ] );
	}

}

/**
 * Lấy tất cả handlers.
 *
 * @return array
 */
public function all() {

	return $this->handlers;

}
/**
 * Thực thi một render handler.
 *
 * @param string $key
 * @param mixed  ...$args
 * @return mixed|null
 */
public function render( $key, ...$args ) {

	$handler = $this->get( $key );

	if ( ! is_callable( $handler ) ) {
		return null;
	}

	return call_user_func_array(
		$handler,
		$args
	);

}

/**
 * Xóa toàn bộ handlers.
 *
 * @return void
 */
public function reset() {

	$this->handlers = array();

}

/**
 * Đếm số handlers.
 *
 * @return int
 */
public function count() {

	return count( $this->handlers );

}
/**
 * Khởi động Render Engine.
 *
 * @return void
 */
public function boot() {

	do_action(
		'k86_render_engine_boot',
		$this
	);

}

/**
 * Tắt Render Engine.
 *
 * @return void
 */
public function shutdown() {

	do_action(
		'k86_render_engine_shutdown',
		$this
	);

}

/**
 * Xuất cấu hình Engine.
 *
 * @return array
 */
public function to_array() {

	return array(
		'handlers' => array_keys( $this->handlers ),
		'count'    => $this->count(),
		'version'  => $this->version(),
	);

}

/**
 * Phiên bản Engine.
 *
 * @return string
 */
public function version() {

	return '2.0.0';

}

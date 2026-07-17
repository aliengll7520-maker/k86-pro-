<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Business Loader
 * --------------------------------------------------------
 *
 * Nạp toàn bộ Business Engine.
 *
 * @package K86_Pro
 * @since 1.6.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Product Engine
 */
require_once __DIR__ . '/product/loader.php';

/**
 * Business Ready
 */
do_action( 'k86_business_ready' );

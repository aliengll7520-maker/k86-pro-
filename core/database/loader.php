<?php
/**
 * Database Engine Loader
 *
 * @package K86_Pro
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/install.php';
require_once __DIR__ . '/installer.php';
require_once __DIR__ . '/update.php';
require_once __DIR__ . '/upgrade.php';

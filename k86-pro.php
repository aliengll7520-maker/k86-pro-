 <?php
/**
 * Plugin Name: K86 Pro
 * Plugin URI: https://github.com/aliengll7520-maker/k86-pro
 * Description: Plugin Affiliate dành cho K86Shop.
 * Version: 1.0.0
 * Author: Liểng Sang
 * License: GPL2
 */

if (!defined('ABSPATH')) {
    exit;

}

require_once plugin_dir_path(__FILE__) . 'includes/functions.php';
require_once plugin_dir_path(__FILE__) . 'admin/admin.php';
require_once plugin_dir_path(__FILE__) . 'modules/affiliate-box.php';
require_once plugin_dir_path(__FILE__) . 'settings/settings.php';

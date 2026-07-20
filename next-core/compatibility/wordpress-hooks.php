<?php
/**
 * WordPress Hooks
 *
 * Cầu nối giữa WordPress và Next Core.
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_WordPress_Hooks')) {

    class K86_WordPress_Hooks {

        /**
         * Khởi tạo.
         */
        public function __construct() {

            add_action('init', array($this, 'init'));

            add_action('admin_init', array($this, 'admin_init'));

            add_action('wp_loaded', array($this, 'wp_loaded'));

            add_action('plugins_loaded', array($this, 'plugins_loaded'));
        }

        /**
         * WordPress init.
         */
        public function init() {

            do_action('k86/core/init');
        }

        /**
         * WordPress admin init.
         */
        public function admin_init() {

            do_action('k86/core/admin_init');
        }

        /**
         * WordPress loaded.
         */
        public function wp_loaded() {

            do_action('k86/core/wp_loaded');
        }

        /**
         * Plugins loaded.
         */
        public function plugins_loaded() {

            do_action('k86/core/plugins_loaded');
        }
    }
}

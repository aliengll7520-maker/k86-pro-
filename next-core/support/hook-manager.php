<?php
/**
 * K86 Pro Next Core
 * Hook Manager
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Hook_Manager')) {

    class K86_Hook_Manager {

        /**
         * Register a WordPress action.
         *
         * @param string   $hook
         * @param callable $callback
         * @param int      $priority
         * @param int      $accepted_args
         */
        public function add_action($hook, $callback, $priority = 10, $accepted_args = 1) {

            if (is_callable($callback)) {
                add_action($hook, $callback, $priority, $accepted_args);
            }
        }

        /**
         * Register a WordPress filter.
         *
         * @param string   $hook
         * @param callable $callback
         * @param int      $priority
         * @param int      $accepted_args
         */
        public function add_filter($hook, $callback, $priority = 10, $accepted_args = 1) {

            if (is_callable($callback)) {
                add_filter($hook, $callback, $priority, $accepted_args);
            }
        }

        /**
         * Remove a WordPress action.
         */
        public function remove_action($hook, $callback, $priority = 10) {

            remove_action($hook, $callback, $priority);
        }

        /**
         * Remove a WordPress filter.
         */
        public function remove_filter($hook, $callback, $priority = 10) {

            remove_filter($hook, $callback, $priority);
        }

    }

}

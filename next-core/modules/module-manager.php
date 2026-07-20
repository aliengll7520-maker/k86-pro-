<?php
/**
 * K86 Pro Next Core
 * Module Registry
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Module_Registry')) {

    class K86_Module_Registry {

        /**
         * Registered modules.
         *
         * @var array
         */
        protected $modules = array();

        /**
         * Register a module.
         *
         * @param string $name
         * @param object $module
         */
        public function register($name, $module) {
            $this->modules[$name] = $module;
        }

        /**
         * Get module.
         *
         * @param string $name
         *
         * @return object|null
         */
        public function get($name) {
            return $this->modules[$name] ?? null;
        }

        /**
         * Check module.
         *
         * @param string $name
         *
         * @return bool
         */
        public function has($name) {
            return isset($this->modules[$name]);
        }

        /**
         * Get all modules.
         *
         * @return array
         */
        public function all() {
            return $this->modules;
        }

        /**
         * Remove module.
         *
         * @param string $name
         */
        public function remove($name) {
            unset($this->modules[$name]);
        }

        /**
         * Clear modules.
         */
        public function clear() {
            $this->modules = array();
        }

        /**
         * Count modules.
         *
         * @return int
         */
        public function count() {
            return count($this->modules);
        }

    }

}

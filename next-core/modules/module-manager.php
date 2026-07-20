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
         *
         * @return $this
         */
        public function register($name, $module) {

            $this->modules[$name] = $module;

            return $this;
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
         * Check module exists.
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
         * Get registered module names.
         *
         * @return array
         */
        public function names() {

            return array_keys($this->modules);
        }

        /**
         * Remove module.
         *
         * @param string $name
         *
         * @return bool
         */
        public function remove($name) {

            if (!$this->has($name)) {
                return false;
            }

            unset($this->modules[$name]);

            return true;
        }

        /**
         * Clear registry.
         *
         * @return $this
         */
        public function clear() {

            $this->modules = array();

            return $this;
        }

        /**
         * Count modules.
         *
         * @return int
         */
        public function count() {

            return count($this->modules);
        }

        /**
         * Check registry is empty.
         *
         * @return bool
         */
        public function is_empty() {

            return empty($this->modules);
        }

    }

}

<?php
/**
 * K86 Pro Next Core
 * Engine Manager
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Engine_Manager')) {

    class K86_Engine_Manager {

        /**
         * Registered engines.
         *
         * @var array
         */
        protected $engines = array();

        /**
         * Register an engine.
         *
         * @param string $name
         * @param object $engine
         */
        public function register($name, $engine) {
            $this->engines[$name] = $engine;
        }

        /**
         * Get an engine.
         *
         * @param string $name
         *
         * @return object|null
         */
        public function get($name) {
            return $this->engines[$name] ?? null;
        }

        /**
         * Check if an engine exists.
         *
         * @param string $name
         *
         * @return bool
         */
        public function has($name) {
            return isset($this->engines[$name]);
        }

        /**
         * Get all engines.
         *
         * @return array
         */
        public function all() {
            return $this->engines;
        }

        /**
         * Remove an engine.
         *
         * @param string $name
         */
        public function remove($name) {
            unset($this->engines[$name]);
        }

        /**
         * Remove all engines.
         */
        public function clear() {
            $this->engines = array();
        }

        /**
         * Number of registered engines.
         *
         * @return int
         */
        public function count() {
            return count($this->engines);
        }

        /**
         * Initialize all engines that implement init().
         */
        public function init() {
            foreach ($this->engines as $engine) {
                if (method_exists($engine, 'init')) {
                    $engine->init();
                }
            }
        }
    }

}

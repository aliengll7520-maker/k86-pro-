<?php
/**
 * K86 Pro Next Core
 * Service Container
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Container')) {

    class K86_Container {

        /**
         * Registered services.
         *
         * @var array
         */
        protected $bindings = array();

        /**
         * Shared instances.
         *
         * @var array
         */
        protected $instances = array();

        /**
         * Register a factory.
         *
         * @param string   $key
         * @param callable $factory
         */
        public function bind($key, callable $factory) {
            $this->bindings[$key] = $factory;
        }

        /**
         * Register a singleton.
         *
         * @param string   $key
         * @param callable $factory
         */
        public function singleton($key, callable $factory) {
            $this->bindings[$key] = function ($container) use ($key, $factory) {

                if (!isset($this->instances[$key])) {
                    $this->instances[$key] = $factory($container);
                }

                return $this->instances[$key];
            };
        }

        /**
         * Register an existing instance.
         *
         * @param string $key
         * @param mixed  $instance
         */
        public function instance($key, $instance) {
            $this->instances[$key] = $instance;
        }

        /**
         * Resolve a service.
         *
         * @param string $key
         *
         * @return mixed|null
         */
        public function get($key) {

            if (isset($this->instances[$key])) {
                return $this->instances[$key];
            }

            if (!isset($this->bindings[$key])) {
                return null;
            }

            return call_user_func($this->bindings[$key], $this);
        }

        /**
         * Check if a service exists.
         *
         * @param string $key
         *
         * @return bool
         */
        public function has($key) {
            return isset($this->bindings[$key]) || isset($this->instances[$key]);
        }

        /**
         * Remove a service.
         *
         * @param string $key
         */
        public function remove($key) {
            unset($this->bindings[$key], $this->instances[$key]);
        }

        /**
         * Remove all services.
         */
        public function clear() {
            $this->bindings = array();
            $this->instances = array();
        }

        /**
         * Get all registered keys.
         *
         * @return array
         */
        public function keys() {
            return array_unique(
                array_merge(
                    array_keys($this->bindings),
                    array_keys($this->instances)
                )
            );
        }
    }

}

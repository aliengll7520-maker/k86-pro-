<?php
/**
 * K86 Pro Next Core
 * Event Dispatcher
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Event_Dispatcher')) {

    class K86_Event_Dispatcher {

        /**
         * Registered listeners.
         *
         * @var array
         */
        protected $listeners = array();

        /**
         * Register an event listener.
         *
         * @param string   $event
         * @param callable $callback
         *
         * @return $this
         */
        public function listen($event, $callback) {

            if (!is_callable($callback)) {
                return $this;
            }

            if (!isset($this->listeners[$event])) {
                $this->listeners[$event] = array();
            }

            $this->listeners[$event][] = $callback;

            return $this;
        }

        /**
         * Dispatch an event.
         *
         * @param string $event
         * @param mixed  $payload
         */
        public function dispatch($event, $payload = null) {

            if (empty($this->listeners[$event])) {
                return;
            }

            foreach ($this->listeners[$event] as $listener) {
                call_user_func($listener, $payload);
            }
        }

        /**
         * Remove all listeners for an event.
         *
         * @param string $event
         *
         * @return $this
         */
        public function remove($event) {

            unset($this->listeners[$event]);

            return $this;
        }

        /**
         * Check if an event has listeners.
         *
         * @param string $event
         *
         * @return bool
         */
        public function has($event) {

            return !empty($this->listeners[$event]);
        }

        /**
         * Get all listeners.
         *
         * @return array
         */
        public function all() {

            return $this->listeners;
        }

        /**
         * Clear all listeners.
         *
         * @return $this
         */
        public function clear() {

            $this->listeners = array();

            return $this;
        }

        /**
         * Count registered events.
         *
         * @return int
         */
        public function count() {

            return count($this->listeners);
        }

    }

}

<?php
/**
 * K86 Pro Next Core
 *
 * CSS Class Manager
 *
 * @package K86Pro
 * @since 2.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_CSS_Class_Manager' ) ) {

	class K86_CSS_Class_Manager {

		/**
		 * CSS classes.
		 *
		 * @var array
		 */
		protected $classes = array();

		/**
		 * Constructor.
		 *
		 * @param array $classes Initial classes.
		 */
		public function __construct( array $classes = array() ) {

			$this->classes = array_unique( $classes );

		}

		/**
		 * Add class.
		 *
		 * @param string $class CSS class.
		 *
		 * @return $this
		 */
		public function add( $class ) {

			if ( ! in_array( $class, $this->classes, true ) ) {
				$this->classes[] = $class;
			}

			return $this;

		}

		/**
		 * Remove class.
		 *
		 * @param string $class CSS class.
		 *
		 * @return $this
		 */
		public function remove( $class ) {

			$this->classes = array_values(
				array_filter(
					$this->classes,
					function ( $item ) use ( $class ) {
						return $item !== $class;
					}
				)
			);

			return $this;

		}

		/**
		 * Check class exists.
		 *
		 * @param string $class CSS class.
		 *
		 * @return bool
		 */
		public function has( $class ) {

			return in_array(
				$class,
				$this->classes,
				true
			);

		}

		/**
		 * Get classes.
		 *
		 * @return array
		 */
		public function all() {

			return $this->classes;

		}

		/**
		 * Clear classes.
		 *
		 * @return $this
		 */
		public function clear() {

			$this->classes = array();

			return $this;

		}

		/**
		 * Count classes.
		 *
		 * @return int
		 */
		public function count() {

			return count( $this->classes );

    }
    		/**
		 * Add class if condition is true.
		 *
		 * @param bool   $condition Condition.
		 * @param string $class     CSS class.
		 *
		 * @return $this
		 */
		public function add_if( $condition, $class ) {

			if ( $condition ) {
				$this->add( $class );
			}

			return $this;

		}

		/**
		 * Add multiple classes.
		 *
		 * @param array $classes CSS classes.
		 *
		 * @return $this
		 */
		public function add_many( array $classes ) {

			foreach ( $classes as $class ) {
				$this->add( $class );
			}

			return $this;

		}

		/**
		 * Remove multiple classes.
		 *
		 * @param array $classes CSS classes.
		 *
		 * @return $this
		 */
		public function remove_many( array $classes ) {

			foreach ( $classes as $class ) {
				$this->remove( $class );
			}

			return $this;

		}

		/**
		 * Merge CSS classes.
		 *
		 * @param array $classes CSS classes.
		 *
		 * @return $this
		 */
		public function merge( array $classes ) {

			foreach ( $classes as $class ) {
				$this->add( $class );
			}

			return $this;

		}

		/**
		 * Replace all classes.
		 *
		 * @param array $classes CSS classes.
		 *
		 * @return $this
		 */
		public function replace( array $classes ) {

			$this->classes = array_unique( $classes );

			return $this;

		}

		/**
		 * Remove duplicate classes.
		 *
		 * @return $this
		 */
		public function unique() {

			$this->classes = array_values(
				array_unique( $this->classes )
			);

			return $this;

		}

		/**
		 * Sort CSS classes.
		 *
		 * @return $this
		 */
		public function sort() {

			sort( $this->classes );

			return $this;

    }
    		/**
		 * Convert classes to array.
		 *
		 * @return array
		 */
		public function to_array() {

			return $this->classes;

		}

		/**
		 * Convert classes to string.
		 *
		 * @return string
		 */
		public function to_string() {

			return implode(
				' ',
				$this->classes
			);

		}

		/**
		 * Check whether class list is empty.
		 *
		 * @return bool
		 */
		public function is_empty() {

			return empty( $this->classes );

		}

		/**
		 * Build CSS class string.
		 *
		 * @return string
		 */
		public function build() {

			$this->unique();

			$this->sort();

			return $this->to_string();

		}

	}

}

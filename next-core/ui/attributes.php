<?php
/**
 * K86 Pro Next Core
 *
 * * HTML Attributes Builder
 *
 * Builds HTML attributes for UI components.
 *
 * @package K86Pro
 * @since   2.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_HTML_Attributes' ) ) {

	class K86_HTML_Attributes {

		/**
		 * Attributes.
		 *
		 * @var array
		 */
		protected $attributes = array();

		/**
		 * Constructor.
		 *
		 * @param array $attributes Initial attributes.
		 */
		public function __construct( array $attributes = array() ) {

			$this->attributes = $attributes;

		}

		/**
		 * Set attribute.
		 *
		 * @param string $key   Attribute name.
		 * @param mixed  $value Attribute value.
		 *
		 * @return $this
		 */
		public function set( $key, $value ) {

			$this->attributes[ $key ] = $value;

			return $this;

		}

		/**
		 * Get attribute.
		 *
		 * @param string $key Attribute name.
		 * @param mixed  $default Default value.
		 *
		 * @return mixed
		 */
		public function get( $key, $default = null ) {

			return $this->attributes[ $key ] ?? $default;

		}

		/**
		 * Check attribute exists.
		 *
		 * @param string $key Attribute name.
		 *
		 * @return bool
		 */
		public function has( $key ) {

			return array_key_exists(
				$key,
				$this->attributes
			);

		}

		/**
		 * Remove attribute.
		 *
		 * @param string $key Attribute name.
		 *
		 * @return bool
		 */
		public function remove( $key ) {

			if ( ! $this->has( $key ) ) {
				return false;
			}

			unset( $this->attributes[ $key ] );

			return true;

		}

		/**
		 * Get all attributes.
		 *
		 * @return array
		 */
		public function all() {

			return $this->attributes;

		}

		/**
		 * Clear attributes.
		 *
		 * @return $this
		 */
		public function clear() {

			$this->attributes = array();

			return $this;

    }
    		/**
		 * Add CSS class.
		 *
		 * @param string $class CSS class.
		 *
		 * @return $this
		 */
		public function add_class( $class ) {

			$classes = preg_split(
				'/\s+/',
				trim( (string) $this->get( 'class', '' ) )
			);

			$classes = array_filter( $classes );

			if ( ! in_array( $class, $classes, true ) ) {
				$classes[] = $class;
			}

			$this->set(
				'class',
				implode( ' ', $classes )
			);

			return $this;

		}

		/**
		 * Remove CSS class.
		 *
		 * @param string $class CSS class.
		 *
		 * @return $this
		 */
		public function remove_class( $class ) {

			$classes = preg_split(
				'/\s+/',
				trim( (string) $this->get( 'class', '' ) )
			);

			$classes = array_filter(
				$classes,
				function ( $item ) use ( $class ) {
					return $item !== $class;
				}
			);

			$this->set(
				'class',
				implode( ' ', $classes )
			);

			return $this;

		}

		/**
		 * Check CSS class.
		 *
		 * @param string $class CSS class.
		 *
		 * @return bool
		 */
		public function has_class( $class ) {

			$classes = preg_split(
				'/\s+/',
				trim( (string) $this->get( 'class', '' ) )
			);

			return in_array(
				$class,
				$classes,
				true
			);

		}

		/**
		 * Add inline style.
		 *
		 * @param string $property CSS property.
		 * @param string $value CSS value.
		 *
		 * @return $this
		 */
		public function add_style(
			$property,
			$value
		) {

			$style = (string) $this->get(
				'style',
				''
			);

			$style .= $property . ':' . $value . ';';

			$this->set(
				'style',
				trim( $style )
			);

			return $this;

		}

		/**
		 * Add data attribute.
		 *
		 * @param string $name Data name.
		 * @param mixed  $value Data value.
		 *
		 * @return $this
		 */
		public function add_data(
			$name,
			$value
		) {

			$this->set(
				'data-' . $name,
				$value
			);

			return $this;

		}

		/**
		 * Add aria attribute.
		 *
		 * @param string $name Aria name.
		 * @param mixed  $value Aria value.
		 *
		 * @return $this
		 */
		public function add_aria(
			$name,
			$value
		) {

			$this->set(
				'aria-' . $name,
				$value
			);

			return $this;

		}

		/**
		 * Set role attribute.
		 *
		 * @param string $role HTML role.
		 *
		 * @return $this
		 */
		public function add_role( $role ) {

			$this->set(
				'role',
				$role
			);

			return $this;

    }
    		/**
		 * Merge attributes.
		 *
		 * @param array $attributes Attributes.
		 *
		 * @return $this
		 */
		public function merge( array $attributes ) {

			$this->attributes = array_merge(
				$this->attributes,
				$attributes
			);

			return $this;

		}

		/**
		 * Replace attributes.
		 *
		 * @param array $attributes Attributes.
		 *
		 * @return $this
		 */
		public function replace( array $attributes ) {

			$this->attributes = $attributes;

			return $this;

		}

		/**
		 * Convert attributes to array.
		 *
		 * @return array
		 */
		public function to_array() {

			return $this->attributes;

		}

		/**
		 * Build HTML attributes string.
		 *
		 * @return string
		 */
		public function build() {

			if ( empty( $this->attributes ) ) {
				return '';
			}

			$output = array();

			foreach ( $this->attributes as $key => $value ) {

				if ( $value === null || $value === '' ) {
					continue;
				}

				if ( is_bool( $value ) ) {

					if ( $value ) {
						$output[] = esc_attr( $key );
					}

					continue;

				}

				$output[] = sprintf(
					'%s="%s"',
					esc_attr( $key ),
					esc_attr( (string) $value )
				);

			}

			return implode( ' ', $output );

		}

	}

}

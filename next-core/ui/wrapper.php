<?php
/**
 * K86 Pro Next Core
 *
 * HTML Wrapper Builder
 *
 * @package K86Pro
 * @since 2.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Wrapper' ) ) {

	class K86_Wrapper {

		/**
		 * HTML Attributes.
		 *
		 * @var K86_HTML_Attributes|null
		 */
		protected $attributes = null;

		/**
		 * CSS Class Manager.
		 *
		 * @var K86_CSS_Class_Manager|null
		 */
		protected $classes = null;

		/**
		 * Constructor.
		 *
		 * @param K86_HTML_Attributes|null $attributes Attributes object.
		 * @param K86_CSS_Class_Manager|null $classes CSS class manager.
		 */
		public function __construct(
			$attributes = null,
			$classes = null
		) {

			$this->attributes = $attributes;
			$this->classes    = $classes;

		}

		/**
		 * Open HTML tag.
		 *
		 * @param string $tag HTML tag.
		 *
		 * @return string
		 */
		public function open( $tag = 'div' ) {

			$attr = '';

			if ( $this->attributes ) {
				$attr = $this->attributes->build();
			}

			return sprintf(
				'<%1$s %2$s>',
				tag_escape( $tag ),
				$attr
			);

		}

		/**
		 * Close HTML tag.
		 *
		 * @param string $tag HTML tag.
		 *
		 * @return string
		 */
		public function close( $tag = 'div' ) {

			return sprintf(
				'</%s>',
				tag_escape( $tag )
			);

		}

		/**
		 * Wrap content.
		 *
		 * @param string $content HTML content.
		 * @param string $tag HTML tag.
		 *
		 * @return string
		 */
		public function wrap(
			$content,
			$tag = 'div'
		) {

			return
				$this->open( $tag ) .
				$content .
				$this->close( $tag );

		}

		/**
		 * Container wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function container( $content ) {

			if ( $this->classes ) {
				$this->classes->add( 'k86-container' );
				$this->attributes->set(
					'class',
					$this->classes->build()
				);
			}

			return $this->wrap( $content );

    }
    		/**
		 * Row wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function row( $content ) {

			if ( $this->classes ) {
				$this->classes->clear()->add( 'k86-row' );

				$this->attributes->set(
					'class',
					$this->classes->build()
				);
			}

			return $this->wrap( $content );

		}

		/**
		 * Column wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function column( $content ) {

			if ( $this->classes ) {
				$this->classes->clear()->add( 'k86-column' );

				$this->attributes->set(
					'class',
					$this->classes->build()
				);
			}

			return $this->wrap( $content );

		}

		/**
		 * Card wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function card( $content ) {

			if ( $this->classes ) {
				$this->classes
					->clear()
					->add( 'k86-card' );

				$this->attributes->set(
					'class',
					$this->classes->build()
				);
			}

			return $this->wrap( $content );

		}

		/**
		 * Panel wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function panel( $content ) {

			if ( $this->classes ) {
				$this->classes
					->clear()
					->add( 'k86-panel' );

				$this->attributes->set(
					'class',
					$this->classes->build()
				);
			}

			return $this->wrap( $content );

		}

		/**
		 * Grid wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function grid( $content ) {

			if ( $this->classes ) {
				$this->classes
					->clear()
					->add( 'k86-grid' );

				$this->attributes->set(
					'class',
					$this->classes->build()
				);
			}

			return $this->wrap( $content );

		}

		/**
		 * Section wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function section( $content ) {

			if ( $this->classes ) {
				$this->classes
					->clear()
					->add( 'k86-section' );

				$this->attributes->set(
					'class',
					$this->classes->build()
				);
			}

			return $this->wrap( $content );

    }
    		/**
		 * Header wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function header( $content ) {

			return $this->wrap(
				$content,
				'header'
			);

		}

		/**
		 * Footer wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function footer( $content ) {

			return $this->wrap(
				$content,
				'footer'
			);

		}

		/**
		 * Article wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function article( $content ) {

			return $this->wrap(
				$content,
				'article'
			);

		}

		/**
		 * Aside wrapper.
		 *
		 * @param string $content HTML content.
		 *
		 * @return string
		 */
		public function aside( $content ) {

			return $this->wrap(
				$content,
				'aside'
			);

		}

		/**
		 * Generic builder.
		 *
		 * @param string $content HTML content.
		 * @param string $tag HTML tag.
		 *
		 * @return string
		 */
		public function build(
			$content,
			$tag = 'div'
		) {

			return $this->wrap(
				$content,
				$tag
			);

		}

	}

}

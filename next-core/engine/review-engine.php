<?php
/**
 * K86 Pro Next Core
 * Review Engine
 *
 * @package K86Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Review_Engine' ) ) {

	class K86_Review_Engine extends K86_Engine_Base {

		/**
		 * Set rating.
		 *
		 * @param float $rating Rating value.
		 *
		 * @return $this
		 */
		public function set_rating( $rating ) {

			$rating = max( 0, min( 5, (float) $rating ) );

			return $this->register( 'rating', $rating );

		}

		/**
		 * Get rating.
		 *
		 * @return float
		 */
		public function get_rating() {

			return (float) $this->get( 'rating', 0 );

		}

		/**
		 * Set review count.
		 *
		 * @param int $count Review count.
		 *
		 * @return $this
		 */
		public function set_review_count( $count ) {

			return $this->register(
				'review_count',
				max( 0, (int) $count )
			);

		}

		/**
		 * Get review count.
		 *
		 * @return int
		 */
		public function get_review_count() {

			return (int) $this->get( 'review_count', 0 );

		}

		/**
		 * Check whether reviews exist.
		 *
		 * @return bool
		 */
		public function has_reviews() {

			return $this->get_review_count() > 0;

		}

		/**
		 * Add a new review and recalculate average rating.
		 *
		 * @param float $rating Rating value.
		 *
		 * @return float
		 */
		public function add_review( $rating = 5 ) {

			$rating = max( 0, min( 5, (float) $rating ) );

			$count   = $this->get_review_count();
			$current = $this->get_rating();

			$new_count = $count + 1;

			$average = (
				( $current * $count ) + $rating
			) / $new_count;

			$this->set_rating( $average );
			$this->set_review_count( $new_count );

			return (float) $average;

		}

	}

}

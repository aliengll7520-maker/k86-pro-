<?php
/**
 * K86 Pro Next Core
 * Review Engine
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Review_Engine')) {

    class K86_Review_Engine extends K86_Engine_Base {

        /**
         * Đặt điểm đánh giá.
         */
        public function set_rating($rating) {

            $rating = max(0, min(5, (float) $rating));

            return $this->register('rating', $rating);
        }

        /**
         * Lấy điểm đánh giá.
         */
        public function rating() {
            return $this->get('rating', 0);
        }

        /**
         * Đặt số lượng đánh giá.
         */
        public function set_review_count($count) {
            return $this->register('review_count', max(0, (int) $count));
        }

        /**
         * Lấy số lượng đánh giá.
         */
        public function review_count() {
            return $this->get('review_count', 0);
        }

        /**
         * Có đánh giá hay không.
         */
        public function has_reviews() {
            return $this->review_count() > 0;
        }

        /**
         * Thêm một đánh giá mới.
         */
        public function add_review($rating = 5) {

            $count = $this->review_count();
            $current = $this->rating();

            $new_count = $count + 1;

            $average = (($current * $count) + $rating) / $new_count;

            $this->set_rating($average);
            $this->set_review_count($new_count);

            return $average;
        }
    }

}

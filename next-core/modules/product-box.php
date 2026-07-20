<?php
/**
 * K86 Pro Next Core
 * Product Box Module
 *
 * @package K86Pro
 */

defined('ABSPATH') || exit;

if (!class_exists('K86_Product_Box_Module')) {

    class K86_Product_Box_Module {

        /**
         * Product Service.
         *
         * @var K86_Product_Service
         */
        protected $service;

        /**
         * Product Renderer.
         *
         * @var K86_Product_Renderer
         */
        protected $renderer;

        /**
         * Constructor.
         *
         * @param K86_Product_Service  $service
         * @param K86_Product_Renderer $renderer
         */
        public function __construct($service, $renderer) {
            $this->service  = $service;
            $this->renderer = $renderer;
        }

        /**
         * Render Product Box.
         *
         * @return string
         */
        public function render() {
            return $this->renderer->render();
        }

    }

}

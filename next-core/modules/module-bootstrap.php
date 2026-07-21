<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'K86_Module_Bootstrap' ) ) {

	class K86_Module_Bootstrap {

		protected K86_Module_Registry $registry;

		public function __construct( K86_Module_Registry $registry ) {
			$this->registry = $registry;
		}

		public function register_modules() {

			$this->registry->register( 'product-title', new K86_Product_Title_Module() );
			$this->registry->register( 'product-video', new K86_Product_Video_Module() );
			$this->registry->register( 'product-gallery', new K86_Product_Gallery_Module() );
			$this->registry->register( 'product-highlights', new K86_Product_Highlights_Module() );
			$this->registry->register( 'product-description', new K86_Product_Description_Module() );
			$this->registry->register( 'product-rating', new K86_Product_Rating_Module() );

			$this->registry->register( 'comparison-table', new K86_Comparison_Table_Module() );
			$this->registry->register( 'voucher', new K86_Voucher_Module() );
			$this->registry->register( 'stock-progress', new K86_Stock_Progress_Module() );
			$this->registry->register( 'free-shipping', new K86_Free_Shipping_Module() );
			$this->registry->register( 'return-policy', new K86_Return_Policy_Module() );
			$this->registry->register( 'trust', new K86_Trust_Module() );
			$this->registry->register( 'warranty', new K86_Warranty_Module() );
			$this->registry->register( 'cta', new K86_CTA_Module() );
			$this->registry->register( 'cta-buttons', new K86_CTA_Buttons_Module() );
			$this->registry->register( 'countdown', new K86_Countdown_Module() );
		}

	}
}

<?php
/**
 * --------------------------------------------------------
 * K86 Pro
 * Template: Product Box
 * Version: 1.6.0
 * Status: Development
 * --------------------------------------------------------
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
|--------------------------------------------------------------------------
| Template Bootstrap
|--------------------------------------------------------------------------
*/

/**
 * Chuẩn bị dữ liệu Template.
 *
 * @param object $product
 * @return object|null
 */
function k86_template_prepare_product( $product ) {

	if ( empty( $product ) ) {
		return null;
	}

	return apply_filters(
		'k86_template_prepare_product',
		$product
	);

}
/*
|--------------------------------------------------------------------------
| Product Header Template
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị tiêu đề sản phẩm.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_title( $product ) {

	if ( empty( $product->name ) ) {
		return '';
	}

	ob_start();
	?>

	<h3 class="k86-product-title">
		<?php echo esc_html( $product->name ); ?>
	</h3>

	<?php

	return ob_get_clean();

}

/**
 * Hiển thị hình ảnh sản phẩm.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_image( $product ) {

	if ( empty( $product->image ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-product-image">

		<img
			src="<?php echo esc_url( $product->image ); ?>"
			alt="<?php echo esc_attr( $product->name ); ?>"
			loading="lazy">

	</div>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Product Price Template
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị giá bán.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_price( $product ) {

	if ( empty( $product->price ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-product-price">

		<span class="k86-current-price">

			<?php echo esc_html( $product->price ); ?>

		</span>

	</div>

	<?php

	return ob_get_clean();

}

/**
 * Hiển thị giá gốc.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_old_price( $product ) {

	if ( empty( $product->old_price ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-product-old-price">

		<del>

			<?php echo esc_html( $product->old_price ); ?>

		</del>

	</div>

	<?php

	return ob_get_clean();

}

/**
 * Hiển thị phần trăm giảm giá.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_discount( $product ) {

	if ( empty( $product->discount ) ) {
		return '';
	}

	ob_start();
	?>

	<span class="k86-product-discount">

		-<?php echo esc_html( $product->discount ); ?>%

	</span>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Product Description Template
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị mô tả ngắn của sản phẩm.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_description( $product ) {

	if ( empty( $product->description ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-product-description">

		<?php echo wp_kses_post( wpautop( $product->description ) ); ?>

	</div>

	<?php

	return ob_get_clean();

}

/**
 * Hiển thị nhãn nổi bật của sản phẩm.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_badge( $product ) {

	if ( empty( $product->badge ) ) {
		return '';
	}

	ob_start();
	?>

	<span class="k86-product-badge">

		<?php echo esc_html( $product->badge ); ?>

	</span>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Product Template Layout
|--------------------------------------------------------------------------
*/

/**
 * Xây dựng phần Header của Product Box.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_header( $product ) {

	ob_start();
	?>

	<div class="k86-product-header">

		<?php echo k86_template_product_image( $product ); ?>

		<div class="k86-product-header-content">

			<?php echo k86_template_product_badge( $product ); ?>

			<?php echo k86_template_product_title( $product ); ?>

		</div>

	</div>

	<?php

	return ob_get_clean();

}

/**
 * Xây dựng phần thông tin sản phẩm.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_info( $product ) {

	ob_start();
	?>

	<div class="k86-product-info">

		<?php echo k86_template_product_price( $product ); ?>

		<?php echo k86_template_product_old_price( $product ); ?>

		<?php echo k86_template_product_discount( $product ); ?>

		<?php echo k86_template_product_description( $product ); ?>

	</div>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Product Box Template Builder
|--------------------------------------------------------------------------
*/

/**
 * Xây dựng toàn bộ giao diện Product Box.
 *
 * @param object $product
 * @return string
 */
function k86_template_product_box( $product ) {

	$product = k86_template_prepare_product( $product );

	if ( empty( $product ) ) {
		return '';
	}

	ob_start();
	?>

	<div class="k86-product-template">

		<?php echo k86_template_product_header( $product ); ?>

		<?php echo k86_template_product_info( $product ); ?>

		<?php
		if ( function_exists( 'k86_render_product_cta_section' ) ) {
			echo k86_render_product_cta_section( $product );
		}

		if ( function_exists( 'k86_render_product_icon_bar' ) ) {
			echo k86_render_product_icon_bar();
		}

		if ( function_exists( 'k86_render_product_engagement' ) ) {
			echo k86_render_product_engagement();
		}
		?>

	</div>

	<?php

	return ob_get_clean();

}
/*
|--------------------------------------------------------------------------
| Template Output API
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị Product Box Template.
 *
 * @param object $product
 * @return string
 */
function k86_render_product_template( $product ) {

	$template = k86_template_product_box( $product );

	return apply_filters(
		'k86_render_product_template',
		$template,
		$product
	);

}

/**
 * Kiểm tra Template có dữ liệu để hiển thị.
 *
 * @param object $product
 * @return bool
 */
function k86_has_product_template( $product ) {

	return '' !== k86_render_product_template( $product );

}

/**
 * Thông báo Template Engine đã sẵn sàng.
 */
do_action( 'k86_product_template_loaded' );
/*
|--------------------------------------------------------------------------
| Template Final API
|--------------------------------------------------------------------------
*/

/**
 * Hiển thị Template Product Box cuối cùng.
 *
 * @param object $product
 * @return string
 */
function k86_display_product_template( $product ) {

	if ( ! k86_has_product_template( $product ) ) {
		return '';
	}

	return k86_render_product_template( $product );

}

/**
 * Framework Template Engine đã sẵn sàng.
 */
do_action( 'k86_template_engine_ready' );

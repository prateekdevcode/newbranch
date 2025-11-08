<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
$attachment_ids = $product->get_gallery_image_ids();
$columns  = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>
<div class="test_theme <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="gallery_image_main">
		<!--wishlist-->
			 <div class="woo-wishlist">
				<?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?>
			</div> 
		<!--wishlist-->
		<div id="display"></div>
		<div class="image_slider"> 
		</div>
		<div class="loader" style="display:none"> 
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ajax-loader.gif" />
		</div>
	</div>
	<div id="gallery_image_thumbnail" class="gallery_image_thumbnail clearfix">		
	</div>
	<div class="product_image-data">
		<?php if ( $attachment_ids && $product->get_image_id() ) {
			foreach ( $attachment_ids as $attachment_id ) { ?>
			<span id="<?php echo $attachment_id; ?>" class="<?php echo strtolower(str_replace(" ","-",get_the_title($attachment_id))); ?>" >
			</span>
		<?php 	}
		} ?>
	</div>
</div>

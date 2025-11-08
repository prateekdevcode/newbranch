<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*if ( $related_products ) : ?>

	<section class="related products">

		<h2><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>

<?php endif;

wp_reset_postdata();*/



/**
 * Related Products
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 global $product, $woocommerce_loop;

 $related = $product->get_related( 10 );

 if ( sizeof( $related ) == 0 ) return;

 $args = apply_filters( 'woocommerce_related_products_args', array(
    'post_type'            => 'product',
    'ignore_sticky_posts'  => 1,
    'no_found_rows'        => 1,
    'posts_per_page'       => 10,
    'orderby'              => $orderby,
    'post__in'             => $related,
    'post__not_in'         => array( $product->id )
 ) );

 $products = new WP_Query( $args );

 $woocommerce_loop['columns'] = 1;

 if ( $products->have_posts() ) : ?>

    <div class="related products">

        <h2><?php _e( 'Related Products', 'woocommerce' ); ?></h2>

        <?php woocommerce_product_loop_start(); ?>

        <div id="related-slider" class="owl-carousel">

            <?php while ( $products->have_posts() ) : $products->the_post(); ?>



                <?php //wc_get_template_part( 'content', 'product' ); ?>

                	          
		          <div class="item">

		            <div class="pro-img">
					 <!--wishlist-->
						 <div class="woo-wishlist">
							<?php echo do_shortcode('[ti_wishlists_addtowishlist]'); ?>
						</div> 
					<!--wishlist-->

		              <?php if( has_post_thumbnail() ){ ?>
		                <img src="<?php echo the_post_thumbnail_url( 'full' ); ?>" class="img-responsive" alt="<?php the_title(); ?>">
		              <?php } ?>
		              <span> <a href="<?php the_permalink(); ?>"> Quick View </a> </span>
		            </div>
		            <div class="product-details">
		              <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		              <div class="product-reating">
		                <!-- <ul>
		                  <li> <i class="fa fa-star"></i> </li>
		                  <li> <i class="fa fa-star"></i> </li>
		                  <li> <i class="fa fa-star"></i> </li>
		                  <li> <i class="fa fa-star"></i> </li>
		                  <li> <i class="fa fa-star-half-o"></i> </li>
		                </ul> -->
		                <?php global $product; echo wc_get_rating_html( $product->get_average_rating() ); ?>
		              </div>
		              <div class="product-price">
		                <div class="product-price">
		                  <?php  if ( $price_html = $product->get_price_html() ) : ?>
		                    <h6><?php echo $price_html; ?></h6>
		                  <?php endif; ?>
		                </div>
		              </div>
		            </div> 

		          </div>
		          
            <?php endwhile; // end of the loop. ?>

            </div>

        <?php woocommerce_product_loop_end(); ?>

    </div>

      <?php endif;

 wp_reset_postdata();
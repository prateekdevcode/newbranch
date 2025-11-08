<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

$args = array(
'post_type'=> 'post',
'orderby'    => 'ID',
'post_status' => 'publish',
'order'    => 'DESC',
'posts_per_page' => -1 // this will retrive all the post that is published 
);
$result = new WP_Query( $args );?>
<ul class="menu">
<?php
if ( $result-> have_posts() ) : 
 while ( $result->have_posts() ) : $result->the_post(); ?>
<li> <a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
 <br/>
<?php 
 endwhile; 
 endif; wp_reset_postdata(); 
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	?>

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>
<script>
$(document).ready(function() {

  // Get current page URL
  var url = window.location.href;

  // remove # from URL
  url = url.substring(0, (url.indexOf("#") == -1) ? url.length : url.indexOf("#"));

  // remove parameters from URL
  url = url.substring(0, (url.indexOf("?") == -1) ? url.length : url.indexOf("?"));

  // select file name
  url = url.substr(url.lastIndexOf("/") + 1);
 
  // If file name not avilable
  if(url == ''){
     url = 'index.html';
  }
 
  // Loop all menu items
  $('.menu li').each(function(){

     // select href
     var href = $(this).find('a').attr('href');
 
     // Check filename
     if(url == href){

        // Add active class
        $(this).addClass('active');
     }
  });
});
</script>

<?php get_footer(); ?>

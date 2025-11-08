<?php
/*
Template Name:Home
*/
get_header();
?>



<?php
$args = array(
'post_type'=> 'post',
'orderby'    => 'ID',
'post_status' => 'publish',
'order'    => 'DESC',
'posts_per_page' => -1 // this will retrive all the post that is published 
);
$result = new WP_Query( $args );
if ( $result-> have_posts() ) : 
 while ( $result->have_posts() ) : $result->the_post(); ?>
 <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
 <br/>
<?php 
 endwhile; 
 endif; wp_reset_postdata(); ?>

<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Security of Payment
 *
 * @package storefront
 */

get_header(); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<section id="descliamer" class="common-padding">
		<div class="container">
			<div class="title-section custom-heading">
				<h1><span><?php wp_title(''); ?></span></h1>
			</div>
			<?php the_content(); ?>			
		</div>
	</section>
	<?php endwhile; endif; ?>
<?php
get_footer();

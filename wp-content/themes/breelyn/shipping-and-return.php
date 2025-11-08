<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Shipping and Return
 *
 * @package storefront
 */

get_header(); ?>

	<section id="descliamer" class="common-padding">
		<div class="container">
			<div class="title-section custom-heading">
				<h1><span><?php wp_title(''); ?></span></h1>
			</div>
			<?php the_content(); ?>
		</div>
	</section>

<?php
get_footer();

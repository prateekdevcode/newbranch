<?php get_header(); ?>
<section id="content" role="main" class="inner-row">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header"style="display: none;">
<h3 class="entry-title" style="text-align:center;"><?php the_title(); ?></h3> <?php //edit_post_link(); ?>
</header>
<section class="entry-content" style="padding: 20px 0;">
	<div class="container">
	 <div class="content-col">
		<div style="display: none;">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
		</div>
		<?php the_content(); ?>
		<div class="entry-links"><?php wp_link_pages(); ?></div>
	 </div>	
	</div>
</section>
</article>
<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</section>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
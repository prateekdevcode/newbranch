<?php get_header(); ?>
<section id="content" role="main" class="inner-row">
	<div class="container">
	 <div class="row">
	  <div class="col-md-8">
	   <div class="left-col">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="entry-content-block">
		 <?php //get_template_part( 'entry' ); ?>
		 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		 <?php //get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
		 <?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
		  <div class="blog-content">
		   <header>
		    <?php if ( is_singular() ) { echo '<h1 class="entry-title">'; } else { echo '<h2 class="entry-title">'; } ?>
		     <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
		    <?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?> <?php edit_post_link(); ?>
		   <?php if ( !is_search() ) get_template_part( 'entry', 'meta' ); ?>
		  </header>
		  <?php the_content(); ?>
		
		  <?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
		  </div>
		  </article>
		  
		  <div class="comments-col">
		   <?php if ( ! post_password_required() ) comments_template( '', true ); ?>
		   <?php endwhile; endif; ?>
		  </div> 
		 <footer class="footer">
		 <?php get_template_part( 'nav', 'below-single' ); ?>
		 </footer>
	    </div>	
       </div>
	  </div>

      <div class="col-md-4">
	   <div class="sidebar-col clearfix">
	    <?php get_sidebar(); ?>
	   </div>	
      </div>	  
	  
     </div>		
	</div>	
</section>

<?php get_footer(); ?>
<?php
/*
Template Name:Blog;
*/
?>
<html>
<head>
<style>

</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri().'/assets/css/custom.css'?>">
</head>
<body>
<div class="grid-container">
<?php
		$temp = $wp_query; $wp_query= null;
		$wp_query = new WP_Query(); 
		
		$wp_query->query('posts_per_page=5' . '&paged='.$paged);
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
<div class="grid-item">
		
		<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
		<h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a></h2>
		<?php  $content= get_the_content();  
		    $showcontent = substr($content,0,10);
			echo $showcontent ."..";
		?>
		</div>
<?php
		 endwhile; 
?>
</div>
</body>
</html>
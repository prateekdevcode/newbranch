<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Attribute Import template
 *
 * @package storefront
 */
?>
	
	<?php  
		$attribute_taxonomies = wc_get_attribute_taxonomies();
		$taxonomy_terms = array();

		if ( $attribute_taxonomies ) :
			foreach ($attribute_taxonomies as $tax) :
			if (taxonomy_exists(wc_attribute_taxonomy_name($tax->attribute_name))) :
				$taxonomy_terms[$tax->attribute_name] = get_terms( wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0' );
				$all_terms = get_terms( wc_attribute_taxonomy_name($tax->attribute_name), 'orderby=name&hide_empty=0' );
				foreach($all_terms as $value){
				
					$products = new WP_Query( array(
					   'post_type'      => array('product'),
					   'post_status'    => 'publish',
					   'posts_per_page' => -1,
					   'meta_query'     => array( array(
							'key' => '_visibility',
							'value' => array('catalog', 'visible'),
							'compare' => 'IN',
						) ),
					   'tax_query'      => array( array(
							'taxonomy'        => $value->taxonomy,
							'field'           => 'slug',
							'terms'           =>  array($value->slug),
							'operator'        => 'IN',
						) )
					) );

					// The Loop
					if ( $products->have_posts() ): while ( $products->have_posts() ):
						$products->the_post();
						
						$thedata[$value->taxonomy] = array(
						   'name'=>$value->taxonomy,
						   'value'=>$value->slug,
						   'is_visible' => '1',
						   'is_taxonomy' => '1'
						 );
						 update_post_meta( $products->post->ID,'_product_attributes',$thedata);
						 //echo $products->post->ID.'<br>';
					endwhile;
						wp_reset_postdata();
					endif;
				
				
				
				
				
				
				
				
				}
			endif;
		endforeach;
		endif;
		
		

		// TEST: Output the Products IDs
		//
	?>


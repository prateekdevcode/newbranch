<?php
/*
Template Name:category
*/




$parentid = get_queried_object_id();
         
$args = array(
    'parent' => $parentid
);
 
$terms = get_terms( 'product_cat', $args );
 
if ( $terms ) {
         
    echo '<ul class="product-cats">';
     
        foreach ( $terms as $term ) {
                         
            echo '<li class="category">';                 
                     
                woocommerce_subcategory_thumbnail( $term );
                 
                echo '<h2>';
                    echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . $term->slug . '">';
                        echo $term->name;
                    echo '</a>';
                echo '</h2>';
                                                                     
            echo '</li>';
                                                                     
 
    }
     
    echo '</ul>';
 
}


?>
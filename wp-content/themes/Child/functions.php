<?php 
function my_theme_enqueue_styles() {
    $parent_style = 'parent_style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

//Exclude Battery Calculator Category from Related Product List
add_filter( 'woocommerce_get_related_product_cat_terms', 'exclude_product_category_from_related_products' );
function exclude_product_category_from_related_products( $cats_array ) {

    $term = get_term_by('slug', 'battery-calculator', 'product_cat');

    if ( $term && ($key = array_search($term->term_id, $cats_array)) !== false) {
        unset($cats_array[$key]);
    }

    return $cats_array;
}

// Remove short description
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

// Add short description to a custom product tab
add_filter( 'woocommerce_product_tabs', 'add_custom_product_tab', 10, 1 );
function add_custom_product_tab( $tabs ) {

    $custom_tab = array(
        'custom_tab' =>  array(
            'title' => __( "Key Features", "woocommerce" ),
            'priority' => 12,
            'callback' => 'short_description_tab_content'
        )
    );
    return array_merge( $custom_tab, $tabs );
}

// Custom product tab content
function short_description_tab_content() {
    global $post, $product;

    $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

    if ( ! $short_description ) {
        return;
    }

    echo '<div class="woocommerce-product-details__short-description">' . $short_description . '</div>'; // WPCS: XSS ok.
}


//Round decimals on Weight values in Woocommerce to 2 Decimal places
add_filter( 'woocommerce_format_weight', 'custom_format_weight', 90, 2 );
function custom_format_weight( $weight_string, $weight ){

$weight_string = wc_format_localized_decimal( round($weight, 2) );

    if ( ! empty( $weight_string ) ) {
        $weight_string .= ' ' . get_option( 'woocommerce_weight_unit' );
    } else {
        $weight_string = __( 'N/A', 'woocommerce' );
    }

    return $weight_string;
}

// Hide Last Date Cost Updated in Additional Information Tab
function my_attribute_hider ( $attributes ) {
if ( isset( $attributes['pa_costdate'] ) ){
    unset( $attributes['pa_costdate'] );
}
return $attributes;
}
add_filter( 'woocommerce_product_get_attributes', 'my_attribute_hider' );

// Remove Product Sorting Dropdown Menu in Shop Page
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Remove the default documents location and add it to the bottom of the product page
//remove_action( 'woocommerce_single_product_summary', array( wc_product_documents(), 'render_product_documents' ), 25 );

//  Product Documents link open in a new window
add_filter( 'wc_product_documents_link_target', 'wc_product_documents_open_link_in_new_window', 10, 4 );

/**
 * Opens all product documents links in new window/tabs
 */
function wc_product_documents_open_link_in_new_window( $target, $product, $section, $document ) {
	return '_blank';
}

// Creates Services Custom Post Type
function services_init() {
    $args = array(
      'label' => 'Services',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'services'),
        'query_var' => true,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );
    register_post_type( 'services', $args );
}
add_action( 'init', 'services_init' );

function reg_cat() {
         register_taxonomy_for_object_type('category','services');
}
add_action('init', 'reg_cat');

function reg_tag() {
     register_taxonomy_for_object_type('post_tag', 'services');
}
add_action('init', 'reg_tag');


function my_et_builder_post_types( $post_types ) {
    $post_types[] = 'services';

    return $post_types;
}
add_filter( 'et_builder_post_types', 'my_et_builder_post_types' );

add_action( ‘wp_footer’, ‘mycustom_wp_footer’ );
function mycustom_wp_footer() { ?>
<script type=”text/javascript”>
function getCookie(name) {
var value = “; ” + document.cookie;
var parts = value.split(“; ” + name + “=”);
if (parts.length == 2) return parts.pop().split(“;”).shift();
}
var accept = getCookie(“humans_21909″);
if (accept !=”1”) {
document.cookie = “humans_21909=1; path=/insert here project root path/”;
console.log(“ok”);
(function()
{
if( window.localStorage )
{
if( !localStorage.getItem(‘firstLoad’) )
{
console.log(“refresh”);
localStorage[‘firstLoad’] = true;
window.location.reload();
}
else
localStorage.removeItem(‘firstLoad’);
}
})();
}
</script>
<?php
}
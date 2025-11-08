<?php

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class BatterySizingCalculator{ 

	public function __construct() {      
	  
	  	add_shortcode( 'BATTERY_CALCULATOR', [ $this, 'display' ] );
	  	add_action( 'wp_enqueue_scripts', [ $this, 'addAssets' ] );
	  	add_action( 'wp_ajax_get_products', [ $this, 'getProduct' ] ); 
		add_action( 'wp_ajax_nopriv_get_products', [ $this, 'getProduct' ] );
    }


    public function display()
    {
		ob_start();
    	//wp_enqueue_script( 'calculator-js' );
		//wp_enqueue_style( 'calculator-css' );
    	include DRAFIC_PLUGIN_DIR.'/template/calculator.php' ;	
		$html = ob_get_clean();
		return $html;
    }

    public function addAssets()
    {
    	wp_enqueue_style(	'calculator-css', plugins_url( 'css/calculator.css', dirname(__FILE__) ) );	
		wp_enqueue_script(	'calculator-js', plugins_url( 'js/calculator.js', dirname(__FILE__) ) );
		wp_localize_script( 'calculator-js', 'DBC', array( 'ajaxurl' => admin_url('admin-ajax.php'), 'security'=>wp_create_nonce('86ca04f840cf90f227eb2c284bcdfdf3') ) );
    }
	
	public function getProduct() {
		$ids = $_POST['collection'];		
		$html = '<div class="woocommerce columns-3">';
		$html .= '<ul class="products columns-3">';
		
		foreach( $ids as $id) {			
			$IDS[] = $id['model_id'];
			$product = wc_get_product($id['model_id']);			
			//$html .= $product->get_stock_quantity();			
			$html .= '<li class="product">';			
			$html .= '<a href="'.get_permalink( $product->get_id() ).'" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';
			$html .= '<h2 class="woocommerce-loop-product__title">'.$product->get_name().'</h2>';
			$html .= '<span class="et_shop_image">'. $product->get_image().'</span>';
			//$html .= '(' .$product->get_stock_quantity(). ')';	
			$html .= '</a>';
			$html .= '</li>';
		} 
		$html .= '</ul>';
		$html .= '</div>';
		
		wp_send_json_success(['html' => $html, 'IDS'=> $IDS]);
	}

}

new BatterySizingCalculator();
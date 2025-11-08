<?php 

/*
Plugin Name: Battery Sizing Calculator
Plugin URI: https://drafic.com/
Description: Custom site specific plugin feel free to update this plugin core files. 
Version: 0.1.0
Author: Shravan Sharma
Author URI: https://drafic.com/
Text Domain: drafic
*/

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

	
define( 'DRAFIC_PLUGIN_DIR', dirname(__FILE__) );

class DraficBatteryCalculator {

	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * Instance of this class.
	 *
	 * @var object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin.
	 */
	private function __construct() {

		$this->site_include();	
		if( is_admin() ){
			$this->admin_include();
		}
	}
	
	/**
	 * Return an instance of this class.
	 *
	 * @return object A single instance of this class.
	 */
	public static function instance() {
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
	
	public function site_include(){
		
		require_once( DRAFIC_PLUGIN_DIR.'/includes/woocommerce.php' );		
		require_once( DRAFIC_PLUGIN_DIR.'/shortcodes/calculator.php' );
	}
	
	public function admin_include(){
		//
	}
	
}	



if( in_array( 'woocommerce/woocommerce.php', (array) get_option( 'active_plugins', array() ) )  ) {
	
	add_action( 'plugins_loaded', array( 'DraficBatteryCalculator', 'instance' ), 10 );	
}
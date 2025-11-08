<?php
/*
* Plugin Name: Country Based Restrictions for WooCommerce
* Plugin URI:  https://www.zorem.com/shop/woocommerce-product-country-based-restrictions/
* Description: Restrict WooCommerce products in specific countries
* Author: zorem
* Author URI: https://www.zorem.com/
* Version: 2.6.8
* Text Domain: woo-product-country-base-restrictions
* WC requires at least: 3.0
* WC tested up to: 4.1
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include 'include/settings.php';

class ZH_Product_Country_Restrictions {
	var $user_country = "";	
	
	/**
	 * Sales Report Email for WooCommerce
	 *
	 * @var string
	 */
	public $version = '2.6.8';
	
	function __construct() {
		if ( defined( 'DOING_CRON' ) and DOING_CRON ) {
			return;
		}
		add_action( 'plugins_loaded', array( $this, 'plugin_init' ) );
	}

	function on_activation() {
		WC_Geolocation::update_database();                     
	}
	
	public function plugin_dir_url(){
		return plugin_dir_url( __FILE__ );
	}
	
	/**
	 * init hooks
	 *
	 * @since 1.0.0
	 *
	 */
	function plugin_init() {
		$i18n_dir = basename( dirname( __FILE__ ) ) . '/lang/';         
		load_plugin_textdomain( 'woo-product-country-base-restrictions', false, $i18n_dir );

		if ( $this->valid_version() ) {

			add_action( 'woocommerce_process_product_meta', array( $this, 'save_custom_product_fields' ) );
			add_action( 'woocommerce_product_data_panels', array( $this, 'add_custom_product_fields' ) );
			add_filter( 'woocommerce_product_data_tabs', array( $this, 'add_cbr_product_data_tab'), 99 , 1 );
			
			add_action( 'woocommerce_product_after_variable_attributes', array( $this, 'add_custom_variation_fields'), 10, 3 );
			add_action( 'woocommerce_save_product_variation', array( $this, 'save_custom_variation_fields'), 10, 2 );

		if( get_option('wpcbr_make_non_purchasable') == '1' || get_option('product_visibility') == 'hide_completely' || get_option('product_visibility') == 'show_catalog_visibility' ){
				add_filter( 'woocommerce_is_purchasable', array( $this, 'is_purchasable' ), 1, 2 );
				add_filter( 'woocommerce_available_variation', array( $this, 'variation_filter' ), 10, 3 );
			}
			
			$position = get_option('wpcbr_message_position', 33 );
			if ($position == 'custom_shortcode') {
				//message position shortcode function for Elementor product
				add_shortcode('cbr_message_position', array( $this, 'cbr_message_position_func') );
			} else {
				add_action( 'woocommerce_single_product_summary', array($this, 'meta_area_message' ), $position );
			}
			
			add_filter( 'woocommerce_maxmind_geolocation_update_database_periodically', array($this, 'update_geo_database'), 10, 1 );   

			add_action( 'pre_get_posts', array( $this, 'product_by_country_pre_get_posts' ) );
						
			add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ),  array( $this , 'my_plugin_action_links' ) );
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ),  array( $this , 'my_plugin_action_PRO_links' ));
			
			add_action( 'wp_head', array( $this, 'cbr_detect_country_display_frontend' ), 999 );
			add_action( 'wp_head', array( $this, 'wc_cbr_frontend_enqueue' ), 999 );
			
			add_filter('woocommerce_cart_item_removed_message',array( $this, 'cart_item_removed_massage'),10 ,2);
												
			//load javascript in admin
			add_action('admin_enqueue_scripts', array( $this, 'wc_esrc_enqueue' ) );
			
			add_action( 'admin_notices', array( $this, 'cbr_pro_admin_notice' ) );
			add_action('admin_init', array( $this, 'cbr_pro_plugin_notice_ignore' ) );
			
			//callback for redirect 404 error page
			add_action( 'template_redirect', array( $this, 'redirect_404_to_homepage' ));
						
			register_activation_hook( __FILE__, array( $this, 'on_activation' ) );
						
		} else {
			add_action( 'admin_notices', array( $this, 'admin_error_notice' ) );
		}
		
	}
	
	/**
	 * Add plugin action links.
	 *
	 * Add a link to the settings page on the plugins.php page.
	 *
	 * @since 1.0.0
	 *
	 * @param  array  $links List of existing plugin action links.
	 * @return array         List of modified plugin action links.
	 */
	function my_plugin_action_links( $links ) {
		$links = array_merge( array(
			'<a href="' . esc_url( admin_url( '/admin.php?page=woocommerce-product-country-base-restrictions' ) ) . '">' . __( 'Settings', 'woocommerce' ) . '</a>'
		), $links );
		return $links;
	}
	
	/**
	 * Add plugin action links.
	 *
	 * Add a link to the pro product page on the plugins.php page.
	 *
	 * @since 1.0.0
	 *
	 * @param  array  $links List of existing plugin action links.
	 * @return array         List of modified plugin action links.
	 */
	function my_plugin_action_PRO_links( $links ) {
		
		if ( class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) ) return $links;
		
		$links = array_merge( $links, array(
			'<a target="_blank" style="color: #45b450; font-weight: bold;" href="' . esc_url( 'https://www.zorem.com/products/country-based-restriction-pro/') . '">' . __( 'Go Pro', 'woocommerce' ) . '</a>'
		) );
		
		return $links;
	}
	
	/**
	 * WOOCOMMERCE_VERSION check
	 *
	 * @since 1.0.0
	 */
	function valid_version() {
		if ( defined( 'WOOCOMMERCE_VERSION' ) ) {
			if ( version_compare( WOOCOMMERCE_VERSION, "3.0", ">=" ) ) {
				return true;
			}
		}
		return false;
	}
	

	/*
	* Add admin javascript
	*
	*/	
	public function wc_esrc_enqueue() {
		
		// Add condition for css & js include for admin page  
		if(!isset($_GET['page'])) {
				return;
		}
		if( $_GET['page'] != 'woocommerce-product-country-base-restrictions' ) {
			return;
		}
			
		// Add the WP Media 
		wp_enqueue_media();
		
		// Add tiptip js and css file
		wp_enqueue_script( 'cbr-admin-js', plugin_dir_url(__FILE__) . 'assets/js/admin.js', array('jquery', 'wp-util'), $this->version, true );
		wp_enqueue_script( 'cbr-material-min-js', plugin_dir_url(__FILE__) . 'assets/js/material.min.js', array(), $this->version );
		wp_enqueue_style( 'cbr-admin-css', plugin_dir_url(__FILE__) . 'assets/css/admin.css', array(), $this->version );
		wp_enqueue_style( 'cbr-material-css', plugin_dir_url(__FILE__) . 'assets/css/material.css', array(), $this->version );
			
		wp_enqueue_style('select2-cbr', plugins_url('assets/css/select2.min.css', __FILE__ ));
		wp_enqueue_script('select2-cbr', plugins_url('assets/js/select2.min.js', __FILE__));
		
		wp_register_style( 'woocommerce_admin_styles', WC()->plugin_url() . '/assets/css/admin.css', array(), WC_VERSION );
		wp_enqueue_style( 'woocommerce_admin_styles' );
	
		wp_register_script( 'jquery-tiptip', WC()->plugin_url() . '/assets/js/jquery-tiptip/jquery.tipTip.min.js', array( 'jquery' ), WC_VERSION, true );
		wp_enqueue_script( 'jquery-tiptip' );
		
	}
	
	/*
	* Add admin javascript
	*
	*/	
	public function wc_cbr_frontend_enqueue() {
		if(get_option('wpcbr_hide_restricted_product_variation') != '1' && !is_single() ) return;
		wp_enqueue_style( 'cbr-fronend-css', plugin_dir_url(__FILE__) . 'assets/css/frontend.css', array(), $this->version );
	}
	
	/**
	 * WOOCOMMERCE_VERSION admin notice
	 *
	 * @since 1.0.0
	 */
	function admin_error_notice() {
		$message = __('Product Country Restrictions requires WooCommerce 3.0 or newer', 'woo-product-country-base-restrictions');
		echo"<div class='error'><p>$message</p></div>";
	}
	
	/**
	 * CBR pro admin notice
	 *
	 * @since 1.0.0
	 */
	function cbr_pro_admin_notice() {
		if ( class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) ) return;
		
		global $current_user;
		$user_id = $current_user->ID;
		if ( get_user_meta($user_id, 'cbr_pro_plugin_notice_ignore')) return;
		
		$message = __('Save time by applying bulk country restrictions by the product categories, tags, attributes and shipping classes. Enable and disable payment gateways by the customer billing or shipping country and more...', 'woo-product-country-base-restrictions');
		echo '<div class="updated notice"><p>'. __( $message ) .' 
		<span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;">
			<a class ="button-secondary" href="https://www.zorem.com/products/country-based-restriction-pro/" target="_blank">Upgrade to Pro</a>
			<a class ="button-secondary" href="?cbr-pro-plugin-ignore-notice=true" class="dismiss-notice" target="_parent">Dismiss this notice</a></span>
		</p></div>';
	}
	
	function cbr_pro_plugin_notice_ignore(){
		global $current_user;
		$user_id = $current_user->ID;
		
		if (isset($_GET['cbr-pro-plugin-ignore-notice'])) {
			add_user_meta( $user_id, 'cbr_pro_plugin_notice_ignore', 'true' );
		}
	}

	function update_geo_database( ) {
		return true;
	}
	
	/*
	* Adding a CBR settings tab to the Products Metabox
	*
	*/
	function add_cbr_product_data_tab( $product_data_tabs ) {
		?>
		<style>
		#woocommerce-product-data ul.wc-tabs li.cbr_tab a::before {
			content: "\f319";
		}
		.woocommerce_options_panel .restricted_countries .select2-container {
			max-width: 350px !important;
		}
		.woocommerce_options_panel .restricted_countries .select2-selection {
			min-height: 63px;
		}
		</style>
		<?php
		$product_data_tabs['cbr'] = array(
			'label' => __( 'Country restrictions', 'woo-product-country-base-restrictions' ), // translatable
			'target' => 'cbr_product_data', // translatable
		);
		return $product_data_tabs;
	}
	
	/*
	* Adding a CBR settings fields to the CBR settings for all product type
	*
	* @para $post
	*/
	function add_custom_product_fields() {
		global $post;
		echo '<div id="cbr_product_data" class="panel woocommerce_options_panel hidden">';
		
		echo '<div class="options_group"><h4 style="padding-left: 12px;font-size: 14px;">Country Based Restrictions</h4>'; //show_if_simple show_if_external show_if_variable show_if_composite_subscription_product hidden

			woocommerce_wp_select(
				array(
					'id'      => '_fz_country_restriction_type',
					'label'   => __( 'Restriction rule', 'woo-product-country-base-restrictions' ),
					'default'       => 'all',
					'style'			=> 'max-width:350px;width:100%;',
					'class'         => 'availability cbr_restricted_type',
					'options'       => array(
						'all'       => __( 'Product Available for all countries', 'woo-product-country-base-restrictions' ),
						'specific'  => __( 'Product Available for selected countries', 'woo-product-country-base-restrictions' ),
						'excluded'  => __( 'Product not Available for selected countries', 'woo-product-country-base-restrictions' ),
					)
				)
			);

		$selections = get_post_meta( $post->ID, '_restricted_countries', true );
		if(empty($selections) || ! is_array($selections)) { 
			$selections = array(); 
		}
		$countries = WC()->countries->get_shipping_countries();
		asort( $countries );
?>
		<p class="form-field forminp restricted_countries">
		<label for="_restricted_countries"><?php echo __( 'Select countries', 'woo-product-country-base-restrictions' ); ?></label>
		<select id="_restricted_countries" multiple="multiple" name="_restricted_countries[]" style="width:100%;max-width: 350px;"
			data-placeholder="<?php esc_attr_e( 'Choose countries&hellip;', 'woocommerce' ); ?>" title="<?php esc_attr_e( 'Country', 'woocommerce' ) ?>"
			class="wc-enhanced-select" >
			<?php
		if ( ! empty( $countries ) ) {
			foreach ( $countries as $key => $val ) {
				echo '<option value="' . esc_attr( $key ) . '" ' . selected( in_array( $key, $selections ), true, false ).'>' . $val . '</option>';
			}
		}
?>
		</select>
		
		</p><?php
		if( empty( $countries ) ) {
			echo "<p><b>" .__( "You need to setup shipping locations in WooCommerce settings ", 'woo-product-country-base-restrictions')." <a href='admin.php?page=wc-settings'> ". __( "HERE", 'woo-product-country-base-restrictions' )."</a> ".__( "before you can choose country restrictions", 'woo-product-country-base-restrictions' )."</b></p>";
		}
		echo "<p>You can set the general products visibility rules on the <a href='".admin_url('admin.php?page=woocommerce-product-country-base-restrictions&tab=settings')."' target='_blank'>[CBR settings]</a></p>";
		echo '</div>';
		echo '</div>';
	}
	
	/*
	* Adding a CBR settings fields to the CBR settings for all variation type products	
	*
	* @para $loop, $variation_data, $variation
	*/
	function add_custom_variation_fields( $loop, $variation_data, $variation ) {

		woocommerce_wp_select(
			array(
				'id'      => '_fz_country_restriction_type[' . $variation->ID . ']',
				'label'   => __( 'Restriction rule', 'woo-product-country-base-restrictions' ),
				'default'       => 'all',
				'class'         => 'availability cbr_restricted_type wc-enhanced-select',
				'style'			=> 'max-width:350px;width:100%;',
				'value'         => get_post_meta( $variation->ID, '_fz_country_restriction_type', true ),
				'options'       => array(
					'all'       => __( 'Product Available for all countries', 'woo-product-country-base-restrictions' ),
					'specific'  => __( 'Product Available for selected countries', 'woo-product-country-base-restrictions' ),
					'excluded'  => __( 'Product not Available for selected countries', 'woo-product-country-base-restrictions' ),
				)
			) 
		);

		$selections = get_post_meta( $variation->ID, '_restricted_countries', true );
		if(empty($selections) || ! is_array($selections)) { 
			$selections = array(); 
		}
		$countries = WC()->countries->get_shipping_countries();
		asort( $countries );
?>
		<p class="form-field forminp restricted_countries">
		<label for="_restricted_countries[<?php echo $variation->ID; ?>]"><?php echo __( 'Select countries', 'woo-product-country-base-restrictions' ); ?></label>
		<select multiple="multiple" name="_restricted_countries[<?php echo $variation->ID; ?>][]" style="width:100%;max-width: 350px;"
			data-placeholder="<?php esc_attr_e( 'Choose countries&hellip;', 'woocommerce' ); ?>" title="<?php esc_attr_e( 'Country', 'woocommerce' ) ?>"
			class="wc-enhanced-select">
<?php
		if ( ! empty( $countries ) ) {
			foreach ( $countries as $key => $val ) {
				echo '<option value="' . esc_attr( $key ) . '" ' . selected( in_array( $key, $selections ), true, false ).'>' . $val . '</option>';
			}
		}
?>
		</select>
<?php            
	}

	/*
	* Save the product meta settings for simple product 
	*
	* @para $post_id
	*/
	function save_custom_product_fields( $post_id ) {
		$restriction = sanitize_text_field($_POST['_fz_country_restriction_type']);
		if(! is_array($restriction)) {
			if ( !empty( $restriction ) )
				update_post_meta( $post_id, '_fz_country_restriction_type', $restriction );

			$countries = array();
			
			if(isset($_POST["_restricted_countries"])) {
				$countries = $this->sanitize( $_POST['_restricted_countries'] );
			}
			update_post_meta( $post_id, '_restricted_countries', $countries );
		}
	}
	
	/*
	* Save the product meta settings for variation product 
	*
	* @para $post_id
	*/
	function save_custom_variation_fields( $post_id ) {
		$restriction = sanitize_text_field($_POST['_fz_country_restriction_type'][ $post_id ]);
		if ( !empty( $restriction ) )
			update_post_meta( $post_id, '_fz_country_restriction_type', $restriction );

		$countries = array();
		if(isset($_POST["_restricted_countries"])) {
				$countries = $this->sanitize( $_POST['_restricted_countries'][ $post_id ] );
		}
		update_post_meta( $post_id, '_restricted_countries', $countries );
	}
	
	/*
	* check restricted by the product id for simple product
	*
	*/
	function is_restricted_by_id( $id ) {
		$restriction = get_post_meta( $id, '_fz_country_restriction_type', true );

		if ( 'specific' == $restriction || 'excluded' == $restriction ) {
			$countries = get_post_meta( $id, '_restricted_countries', true );
			if ( empty( $countries ) || ! is_array( $countries ) )
				$countries = array();

			$customercountry = $this->get_country();

			if ( 'specific' == $restriction && !in_array( $customercountry, $countries ) )
				return true;

			if ( 'excluded' == $restriction && in_array( $customercountry, $countries ) )
				return true;
		}

		return false;
	}
	
	/*
	* check restricted by the product id for variation
	*
	*/
	function is_restricted( $product ) {
		$id = $product->get_id();
		if($product->get_type() == 'variation') {
			$parentid = $product->get_parent_id();
			$parentRestricted = $this->is_restricted_by_id($parentid);
			if($parentRestricted)
				return true;
		}
		return $this->is_restricted_by_id($id);
	}
	
	/*
	* 
	*/
	function is_purchasable( $purchasable, $product ) {
		if ( $this->is_restricted( $product ) ) $purchasable = false;
		return $purchasable;
	}
	
	/*
	* 
	*/
	function variation_filter($data, $product, $variation) {
		if(! $data['is_purchasable']) {
			$data['variation_description'] = $this->no_soup_for_you() . $data['variation_description'];
			if(get_option('wpcbr_hide_restricted_product_variation') == '1'){
				$data['variation_is_active'] = '';
			}
		}
		return $data;
	}
	
	function meta_area_message() {
		global $product;

		if( $this->is_restricted($product) || apply_filters( 'cbr_is_restricted', false, $product ) ) {
			if( !$product->is_purchasable() ){
				echo $this->no_soup_for_you();
			}
		}
	}

	/*
	* get default_message for restricted product
	*
	*/
	function default_message() {
		return __('Sorry, this product is not available in your country', 'woo-product-country-base-restrictions');
	}        
	
	/*
	* get custom message for restricted product
	*
	*/
	function no_soup_for_you() {
		$msg = get_option('wpcbr_default_message', $this->default_message());
		if(empty($msg)) { 
			$msg = $this->default_message();
		}
		return "<div class='restricted_country'>" . stripslashes($msg) . "</div>";
	}
	
	/*
	* get_country
	*
	*/
	function get_country() {
		
		if( get_option('wpcbr_debug_mode') ){
			$cookie_country = isset($_COOKIE["country"]) ? $_COOKIE["country"] : '';
			if( !empty( $cookie_country ) )return $this->user_country = $_COOKIE["country"];
		}
		
		$force_geoloaction = get_option('wpcbr_force_geo_location');
		if ( !$force_geoloaction ) {
			global $woocommerce;
			if( isset($woocommerce->customer) ){
				$shipping_country = $woocommerce->customer->get_shipping_country();
				if(!empty($shipping_country)){
					$this->user_country = $shipping_country;
					return $this->user_country;
				}
			}
		}
		
		if( empty( $this->user_country )  ) {
			$geoloc = WC_Geolocation::geolocate_ip();
			$this->user_country = $geoloc['country'];
			return $this->user_country;
		}
		
		return $this->user_country;
	}
	
	/*
	* get Detected country for display in frontend
	*
	*/	
	function cbr_detect_country_display_frontend() {
		
		if ( get_option('wpcbr_debug_mode') != '1') return;
		
		$user = wp_get_current_user();
		$user_role = array('administrator','shop_manager');
		
		if ( empty($user->roles) && !isset($user->roles[0]) && !in_array(  $user->roles[0], $user_role ) ) return;

		$wsmab_zorem_icon = plugins_url( 'include/images/green-light.png', __FILE__  );
		
		$countries = WC()->countries->get_shipping_countries();
		asort( $countries );
		$country = array();
		
		?>
        <div class="display-country-for-customer">
			<span class="ab-label">
					<select class="country" onchange="setCookie('country', this.value, 365)">
						<option value="">Select Country</option>
						<?php foreach ( $countries as $key => $val ) { ?>
							 <option value="<?php echo $key;?>" <?php if(isset($_COOKIE["country"]) && $_COOKIE["country"] == $key){echo 'selected';}?>><?php echo ($val); ?></option>
						<?php } ?>
					</select>
			</span>
			<span class="ab-icon"></span> <span class="ab-label">Detected country by CBR: <?php echo WC()->countries->countries[$this->get_country()];?></span>
        </div>
        <style type="text/css">
			.display-country-for-customer .country {width: auto;height: 25px;margin: 0;display: inline-block;border-radius: 12px;margin-right: 5px;}
			.display-country-for-customer {background: #000;color: #fff;font-size: 13px;text-align: center;padding: 5px;}
			.display-country-for-customer .ab-label {margin-left: 5px;vertical-align: middle;}
			.display-country-for-customer .ab-icon:before{background-image: url('<?php echo $wsmab_zorem_icon; ?>');background-repeat: no-repeat;background-position: 0 50%;padding-left: 12px !important;background-size: 12px;content: '';top: 2px;vertical-align: middle;}
		</style>
		<script>
		function setCookie(cookieName, cookieValue, nDays) {
			var today = new Date();
			var expire = new Date();

			if (!nDays) 
				nDays=1;

			expire.setTime(today.getTime() + 3600000*24*nDays);
			document.cookie = cookieName+"="+escape(cookieValue) + ";path=/;expires="+expire.toGMTString();
			location.reload();
		}
		</script>		
		<?php 
	
	}
	
	
	/*
	* posts & category set NOT_IN and IN by query modified
	*/
	function product_by_country_pre_get_posts( $query ) {
		
		if ( is_admin() ) {
			return;
		}
		
		if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] != 'product' && !isset( $query->query_vars['product_cat'] ) ){
			return;
		}

		if( get_option('product_visibility') == 'show_catalog_visibility' ){
			return;
		}

		if( get_option('product_visibility') == 'hide_catalog_visibility' && $query->is_single == 1 ){
			return;
		}
		
		remove_action( 'pre_get_posts', array( $this, 'product_by_country_pre_get_posts' ) );
		
		$post__not_in = $query->get( 'post__not_in' );

		$args = $query->query_vars;
		$args['fields'] = 'ids';
		$args['posts_per_page'] = '-1';
		$loop = new WP_Query( $args );

		foreach ( $loop->posts as $product_id ) {
			if( $this->is_restricted_by_id( $product_id ) ){
				$post__not_in[] = $product_id;
			}
		}
		$query->set( 'post__not_in', $post__not_in );

		do_action( 'cbr_pre_query', $query );
		
		add_action( 'pre_get_posts', array( $this, 'product_by_country_pre_get_posts' ) );
	}
	
	public function sanitize( $input ) {
		if( is_array( $input ) ){
			$new_input = array();
			// Loop through the input and sanitize each of the values
			foreach ( $input as $key => $val ) {
				$new_input[ $key ] = ( isset( $input[ $key ] ) ) ? sanitize_text_field( $val ) : '';
			}
			// Initialize the new array that will hold the sanitize values
			return $new_input;
		}
		return sanitize_text_field( $input );
	}
	
	
	/**
	 * redirect 404 error page.
	 */
    function redirect_404_to_homepage( $page_dir ){
	    if(is_404() && get_option('wpcbr_redirect_404_page') == '1') {
			$page_dir = esc_url(get_permalink( wc_get_page_id( 'shop' ) ));
			$page_dir = apply_filters( 'cbr_redirect_page_dir', $page_dir );
			wp_safe_redirect( $page_dir );
			exit;
		}
	}
	
	function cart_item_removed_massage($message, $product){
		if( $this->is_restricted( $product )){
			$message = sprintf( __( '%s has been removed from your cart because it can no longer be purchased. Please contact us if you need assistance.', 'woocommerce' ), $product->get_name() );
			$message = apply_filters( 'cbr_cart_item_removed_message', $message, $product );
		}
		
		return $message;
	}
	
	/*
	* message position shortcode support for Elementor product
	*/
	function cbr_message_position_func() {
		ob_start();
		$this->meta_area_message();
  		return ob_get_clean();
	}
}
$fzpcr = new ZH_Product_Country_Restrictions();

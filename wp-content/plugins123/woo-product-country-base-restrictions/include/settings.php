<?php
class WC_Settings_Tab_WPCBR {
	function __construct() {
		$this->id = 'wpcbr';
		$this->init();
    }

	/*
	* init function
	*/
    function init() {
        
		add_action('admin_menu', array( $this, 'register_woocommerce_menu' ), 99 );

		//ajax save admin api settings
		add_action( 'wp_ajax_cbr_setting_form_update', array( $this, 'cbr_setting_form_update_callback') );
		
		if( isset($_GET['page']) && $_GET['page'] == 'woocommerce-product-country-base-restrictions' ){
			// Hook for add admin body class in settings page
			add_filter( 'admin_body_class', array( $this, 'cbr_post_admin_body_class' ), 100 );
		}
		
    }
    
    /*
	* Admin Menu add function
	* WC sub menu 
	*/
	public function register_woocommerce_menu() {
		add_submenu_page( 'woocommerce', 'Country Restrictions', 'Country Restrictions', 'manage_options', 'woocommerce-product-country-base-restrictions', array( $this, 'woocommerce_product_country_restrictions_page_callback' ) ); //woocommerce_product_country_restrictions_page_callback
	}
	
	function cbr_post_admin_body_class($body_class) {
		
		$body_class .= 'woocommerce-country-based-restrictions';
 
    	return $body_class;
}

	/*
     * get_zorem_pluginlist
     * 
     * return array
    */
    public function get_zorem_pluginlist(){
		
        if ( !empty( $this->zorem_pluginlist ) ) return $this->zorem_pluginlist;
        
        if ( false === ( $plugin_list = get_transient( 'zorem_pluginlist' ) ) ) {
            
            $response = wp_remote_get( 'https://www.zorem.com/wp-json/pluginlist/v1/' );
            
            if ( is_array( $response ) && ! is_wp_error( $response ) ) {
                $body    = $response['body']; // use the content
                $plugin_list = json_decode( $body );
                set_transient( 'zorem_pluginlist', $plugin_list, 60*60*24 );
            } else {
                $plugin_list = array();
            }
        }
        return $this->zorem_pluginlist = $plugin_list;
    }
	
	/*
	* settings form save for Setting tab
	*/
	function cbr_setting_form_update_callback(){			
		
		if ( ! empty( $_POST ) && check_admin_referer( 'cbr_setting_form_action', 'cbr_setting_form_nonce_field' ) ) {
			
			update_option( 'wpcbr_debug_mode', $_POST[ 'wpcbr_debug_mode' ] );
			update_option( 'wpcbr_force_geo_location', $_POST[ 'wpcbr_force_geo_location' ] );
			update_option( 'product_visibility', $_POST[ 'product_visibility' ] );
			update_option( 'wpcbr_redirect_404_page', $_POST[ 'wpcbr_redirect_404_page' ] );
			if($_POST[ 'product_visibility' ] == 'hide_catalog_visibility'){
				update_option( 'wpcbr_hide_restricted_product_variation', $_POST[ 'wpcbr_hide_restricted_product_variation1' ] );
				update_option( 'wpcbr_make_non_purchasable', $_POST[ 'wpcbr_make_non_purchasable1' ] );
				update_option( 'wpcbr_default_message', $_POST[ 'wpcbr_default_message1' ] );
				if( class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) && $_POST[ 'wpcbr_make_non_purchasable1' ] == '1' ){
					update_option( 'wpcbr_hide_product_price', $_POST[ 'wpcbr_hide_product_price1' ] );
				}
				update_option( 'wpcbr_message_position', $_POST[ 'wpcbr_message_position1' ] );
			}
			if($_POST[ 'product_visibility' ] == 'show_catalog_visibility'){
				update_option( 'wpcbr_hide_restricted_product_variation', $_POST[ 'wpcbr_hide_restricted_product_variation2' ] );
				update_option( 'wpcbr_default_message', $_POST[ 'wpcbr_default_message2' ] );
				if( class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) ){
					update_option( 'wpcbr_hide_product_price', $_POST[ 'wpcbr_hide_product_price2' ] );
				}
				update_option( 'wpcbr_message_position', $_POST[ 'wpcbr_message_position2' ] );
			}
			echo json_encode( array('success' => 'true') );die();
	
		}
	}
	
	/*
	* callback for Sales Report Email page
	*/
	public function woocommerce_product_country_restrictions_page_callback(){
		
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : '';
		?>
        <div class="main-title" style="background:#fafeff;"><img class="cbr-plugin-logo" src="<?php echo plugin_dir_url(__FILE__)?>images/CBR-logo.png"></div>
		<div class="woocommerce cbr_admin_layout">
                <div class="cbr_admin_content">
                    <input id="tab1" type="radio" name="tabs" class="cbr_tab_input" data-tab="settings" checked>
                	<label for="tab1" class="cbr_tab_label first_label"><?php _e('Settings', 'woocommerce'); ?></label>
                   <?php 
						//callback do_action for license tab
						do_action( "cbr_tab2_data_array" ); 
					?>
                    <?php if ( !class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) ) { ?>
                    <input id="tab4" type="radio" name="tabs" class="cbr_tab_input" data-tab="pro" <?php if($tab == 'pro'){ echo 'checked'; } ?>>
       				<label for="tab4" class="cbr_tab_label"><?php _e('Go Pro', 'country-base-restrictions-pro-addon'); ?></label>
                    <?php } ?>
					<div class="cbr_nav_doc_section">					
							<a target="blank" href="https://www.zorem.com/docs/country-based-restrictions-for-woocommerce/"><?php _e('Documentation', 'woocommerce-advanced-sales-report-email'); ?></a>
                    </div>
                    <?php require_once( 'views/cbr_setting_tab.php' ); ?>
                    <?php if ( !class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) ) { 
                    	require_once( 'views/cbr_pro_tab.php' );
                    } ?>
                    <?php 
						//callback do_action for include file license and bulk
						do_action( "cbr_license_tab_content_data_array" ); 
					?>
                </div>
            </div>
            <div id="cbr-toast-example" aria-live="assertive" aria-atomic="true" aria-relevant="text" class="mdl-snackbar mdl-js-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button type="button" class="mdl-snackbar__action"></button>
            </div>
           <?php
	}

    /**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
	function get_general_settings() {
		
        $settings = array(
			'wpcbr_debug_mode' => array(
				'title'		=> __( 'Debug Mode', 'woo-product-country-base-restrictions' ),
				'type'		=> 'checkbox',
				'default'	=> 'no',
				'show'		=> true,
				'id'		=> 'wpcbr_debug_mode',
				'class'		=> 'toggle',
				'label'		=> 'Enable plugin',
				'tooltip'		=> __( "Enable this option to show detected geo-location country top of header in frontend.", 'woo-product-country-base-restrictions' ),
			),
			'wpcbr_force_geo_location' => array(
				'title'		=> __( 'Force Geo-location detection', 'woo-product-country-base-restrictions' ),
				'type'		=> 'checkbox',
				'default'	=> 'no',
				'show'		=> true,
				'id'		=> 'wpcbr_force_geo_location',
				'class'		=> 'toggle',
				'label'		=> 'Enable plugin',
				'tooltip'		=> __( "Enable this option to detect the customer country only by the WooCommerce geo-location and to ignore the customer shipping country (if logged in)", 'woo-product-country-base-restrictions' ),
			),
        );
        return  $settings;
    }
	
	/**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
	function get_hide_completely_settings() {
		
        $settings = array(
			'wpcbr_redirect_404_page' => array(
			  'type'		=> 'checkbox',
			  'title'		=> __( 'Redirect 404 error page to Shop page', 'woo-product-country-base-restrictions' ),				
			  'show'		=> true,
			  'default'	=> 'no',
			  'class'     => 'pro-feature',
			  'id'		=> 'wpcbr_redirect_404_page',
			  'label'		=> 'Enable plugin',
			  'tooltip'     => __( 'Enable this option to redirect 404 error page to shop page.','woo-product-country-base-restrictions'),
		  ),
        );
        return  $settings;
    }

	
	/**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
	function get_product_settings() {
        
		$settings = array(
			'wpcbr_hide_restricted_product_variation1' => array(
				'title'		=> __( 'Hide Restricted Product Variations', 'woo-product-country-base-restrictions' ),
				'type'		=> 'checkbox',
				'default'	=> 'no',
				'show'		=> true,
				'id'		=> 'wpcbr_hide_restricted_product_variation',
				'class'		=> '',
				'label'		=> 'Enable plugin',
				'tooltip'		=> __( "Enable  this option to hide the restricted product variations form the product variations selection on variable product page.", 'woo-product-country-base-restrictions' ),
			),
			'wpcbr_make_non_purchasable1' => array(
				'title'		=> __( 'Make non-purchasable', 'woo-product-country-base-restrictions' ),
				'type'		=> 'checkbox',
				'default'	=> 'no',
				'show'		=> true,
				'id'		=> 'wpcbr_make_non_purchasable',
				'class'		=> '',
				'label'		=> 'Enable plugin',
				'tooltip'		=> __( "Enable this option to make products non-purchasable (i.e. product can't be added to the cart).", 'woo-product-country-base-restrictions' ),
			),
			'wpcbr_default_message1' => array(
				'title'		=> __( 'Restriction Message', 'woo-product-country-base-restrictions' ),
				'tooltip'	=> __( "This message show on product page when product is not purchasable. Default message : Sorry, this product is not available in your country.", 'woo-product-country-base-restrictions' ),
				'placeholder'	=> __( "Sorry, this product is not available in your country.", 'woo-product-country-base-restrictions' ),
				'type'		=> 'textarea',
				'show'		=> true,
				'id'		=> 'wpcbr_default_message',
				'class'		=> '',
			),
			'wpcbr_message_position1' => array(
				'title'		=> __( 'Message Position', 'woo-product-country-base-restrictions' ),
				'tooltip'		=> __( "Default : After add to cart. This message will show on product page when product is not purchasable.", 'woo-product-country-base-restrictions'),
				'desc_tip'	=> __( "Use the shortcode [cbr_message_position] in your product template.", 'woo-product-country-base-restrictions' ),
				'type'		=> 'dropdown',
				'show'		=> true,
				'id'		=> 'wpcbr_message_position',
				'class'		=> '',
				'default'	=> '33',
				'options'	=> array(
					'3'			=> __( 'Before title', 'woo-product-country-base-restrictions' ),
					'8'			=> __( 'After title', 'woo-product-country-base-restrictions' ),
					'13'		=> __( 'After price', 'woo-product-country-base-restrictions' ),
					'23'		=> __( 'After short description', 'woo-product-country-base-restrictions' ),
					'33'		=> __( 'After add to cart', 'woo-product-country-base-restrictions' ),
					'43'		=> __( 'After meta', 'woo-product-country-base-restrictions' ),
					'53'		=> __( 'After sharing', 'woo-product-country-base-restrictions' ),
					'custom_shortcode'		=> __( 'Use shortcode', 'woo-product-country-base-restrictions' ),
				)
			),
        );
		$settings = apply_filters( "cbr_hide_catelog_option_data_array", $settings );
        return  $settings;
    }
	
	/**
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
	function get_product_catelog_settings() {
        
		$settings = array(
		'wpcbr_hide_restricted_product_variation2' => array(
				'title'		=> __( 'Hide Restricted Product Variations', 'woo-product-country-base-restrictions' ),
				'type'		=> 'checkbox',
				'default'	=> 'no',
				'show'		=> true,
				'id'		=> 'wpcbr_hide_restricted_product_variation',
				'class'		=> '',
				'label'		=> 'Enable plugin',
				'tooltip'		=> __( "Enable  this option to hide the restricted product variations form the product variations selection on variable product page.", 'woo-product-country-base-restrictions' ),
			),
			'wpcbr_default_message2' => array(
				'title'		=> __( 'Restriction Message', 'woo-product-country-base-restrictions' ),
				'tooltip'	=> __( "This message show on product page when product is not purchasable. Default message : Sorry, this product is not available in your country.", 'woo-product-country-base-restrictions' ),
				'placeholder'	=> __( "Sorry, this product is not available in your country.", 'woo-product-country-base-restrictions' ),
				'type'		=> 'textarea',
				'show'		=> true,
				'id'		=> 'wpcbr_default_message',
				'class'		=> '',
			),
			'wpcbr_message_position2' => array(
				'title'		=> __( 'Message Position', 'woo-product-country-base-restrictions' ),
				'tooltip'		=> __( "Default : After add to cart. This message will show on product page when product is not purchasable.", 'woo-product-country-base-restrictions'),
				'desc_tip'	=> __( "Use the shortcode [cbr_message_position] in your product template.", 'woo-product-country-base-restrictions' ),
				'type'		=> 'dropdown',
				'show'		=> true,
				'id'		=> 'wpcbr_message_position',
				'class'		=> '',
				'default'	=> '33',
				'options'	=> array(
					'3'			=> __( 'Before title', 'woo-product-country-base-restrictions' ),
					'8'			=> __( 'After title', 'woo-product-country-base-restrictions' ),
					'13'		=> __( 'After price', 'woo-product-country-base-restrictions' ),
					'23'		=> __( 'After short description', 'woo-product-country-base-restrictions' ),
					'33'		=> __( 'After add to cart', 'woo-product-country-base-restrictions' ),
					'43'		=> __( 'After meta', 'woo-product-country-base-restrictions' ),
					'53'		=> __( 'After sharing', 'woo-product-country-base-restrictions' ),
					'custom_shortcode'		=> __( 'Use Shortcode', 'woo-product-country-base-restrictions' ),
				)
			),
        );
		$settings = apply_filters( "cbr_catelog_visible_option_data_array", $settings );
 
		return  $settings;
    }


    /*
	* get html of fields
	*/
	public function get_html( $arrays ){
		
		$checked = '';
		?>
		<table class="form-table">
			<tbody>
            	<?php foreach( (array)$arrays as $id => $array ){
					if($array['show']){	
					?>
                	<?php if($array['type'] == 'title'){ ?>
                		<tr valign="top titlerow">
                        	<th colspan="2"><h3><?php echo $array['title']?></h3></th>
                        </tr>    	
                    <?php continue;} ?>
				<tr valign="top" class="<?php //echo $array['class'];?>">
					<?php if($array['type'] != 'desc'){ ?>										
					<th scope="row" class="titledesc"  >
						<label for=""><?php echo $array['title']?><?php if(isset($array['title_link'])){ echo $array['title_link']; } ?>
							<?php if( isset($array['tooltip']) ){?>
                            	<span class="woocommerce-help-tip tipTip" title="<?php echo $array['tooltip']?>"></span>
                            <?php } ?>
                        </label>
					</th>
					<?php } ?>
					<td class="forminp"  <?php if($array['type'] == 'desc'){ ?> colspan=2 <?php } ?>>
                    	<?php if( $array['type'] == 'checkbox' ){								

								if(isset($array['id']) && get_option($array['id'])){
									$checked = 'checked';
								} else{
									$checked = '';
								} 
							
							if(isset($array['disabled']) && $array['disabled'] == true){
								$disabled = 'disabled';
								$checked = '';
							} else{
								$disabled = '';
							}							
							?>
						<?php if($array['class'] == 'toggle'){?>
						<span class="mdl-list__item-secondary-action">
							<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="<?php echo $id?>">
								<input type="hidden" name="<?php echo $id?>" value="0"/>
								<input type="checkbox" id="<?php echo $id?>" name="<?php echo $id?>" class="mdl-switch__input" <?php echo $checked ?> value="1" <?php echo $disabled; ?>/>
							</label><p class="description"><?php echo (isset($array['desc']))? $array['desc']: ''?></p>
						</span>
						<?php } else { ?>
							<span class="checkbox">
							<label class="checkbx-label" for="<?php echo $id?>">
								<input type="hidden" name="<?php echo $id?>" value="0"/>
								<input type="checkbox" id="<?php echo $id?>" name="<?php echo $id?>" class="checkbox-input" <?php echo $checked ?> value="1" <?php echo $disabled; ?>/>
							</label><p class="description"><?php echo (isset($array['desc']))? $array['desc']: ''?></p>
						</span>
						<?php } ?>
						<?php } elseif( $array['type'] == 'textarea' ){ ?>
                                        <fieldset>
                                        <textarea rows="3" cols="20" class="input-text regular-input" type="textarea" name="<?php echo $id?>" id="<?php echo $id?>" style="" placeholder="<?php if(!empty($array['placeholder'])){echo $array['placeholder'];} ?>"><?php if(!empty(get_option($array['id']))){echo stripslashes(get_option($array['id'])); }?></textarea>
                                        </fieldset>
                        <?php }  elseif( isset( $array['type'] ) && $array['type'] == 'dropdown' ){?>
                        	<?php
								if( isset($array['multiple']) ){
									$multiple = 'multiple';
									$field_id = $array['multiple'];
								} else {
									$multiple = '';
									$field_id = $id;
								}
							?>
                        	<fieldset>
								<select class="select select2" id="<?php echo $field_id?>" name="<?php echo $id?>" <?php echo $multiple;?>>    <?php foreach((array)$array['options'] as $key => $val ){?>
                                    	<?php
											$selected = '';
											if( isset($array['multiple']) ){
												if (in_array($key, (array)$this->data->$field_id ))$selected = 'selected';
											} else {
												if( get_option($array['id']) == (string)$key )$selected = 'selected';
											}
                                        
										?>
										<option value="<?php echo $key?>" <?php echo $selected?> ><?php echo $val?></option>
                                    <?php } ?><p class="description"><?php echo (isset($array['desc']))? $array['desc']: ''?></p>
								</select><p class="description"><?php echo (isset($array['desc_tip']))? $array['desc_tip']: ''?></p>
							</fieldset>
                        <?php } elseif( $array['type'] == 'title' ){?>
						<?php }
						elseif( $array['type'] == 'label' ){ ?>
							<fieldset>
                               <label><?php echo $array['value']; ?></label>
                            </fieldset>
						<?php }
						elseif( $array['type'] == 'button' ){ ?>
							<fieldset>
								<button class="button-primary btn_green2 <?php echo $array['button_class'];?>" <?php if($array['disable']  == 1){ echo 'disabled'; }?>><?php echo $array['label'];?></button>
							</fieldset>
						<?php }
						elseif( $array['type'] == 'radio' ){ ?>
							<fieldset>
                            	<ul>
									<?php foreach((array)$array['options'] as $key => $val ){?>
									<li><label><input name="product_visibility" value="<?php echo $key; ?>" type="radio" style="" class="product_visibility" <?php if( get_option($array['id']) == $key ) { echo 'checked'; } ?> /><?php echo $val;?><br></label></li>
                                    <?php } ?>
                                 </ul>
							</fieldset>
						<?php }
						else { ?>
                                                    
                        	<fieldset>
                                <input class="input-text regular-input " type="text" name="<?php echo $id?>" id="<?php echo $id?>" style="" value="<?php echo get_option($array['id'])?>" placeholder="<?php if(!empty($array['placeholder'])){echo $array['placeholder'];} ?>">
                            </fieldset>
                        <?php } ?>
                        
					</td>
				</tr>
	<?php } } ?>
			</tbody>
		</table>
	<?php 
	}
}

/**
 * Returns an instance of zorem_woocommerce_advanced_shipment_tracking.
 *
 * @since 1.6.5
 * @version 1.6.5
 *
 * @return zorem_woocommerce_advanced_shipment_tracking
*/
function WC_Settings_Tab_WPCBR() {
	static $instance;

	if ( ! isset( $instance ) ) {		
		$instance = new WC_Settings_Tab_WPCBR();
	}

	return $instance;
}

/**
 * Register this class globally.
 *
 * Backward compatibility.
*/
$GLOBALS['WC_Settings_Tab_WPCBR'] = WC_Settings_Tab_WPCBR();


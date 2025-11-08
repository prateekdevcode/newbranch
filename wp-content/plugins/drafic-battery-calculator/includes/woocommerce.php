<?php

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Add a custom product tab.
 */

function drafic_battery_calculator_product_tabs( $product_data_tabs ) {
	$product_data_tabs['dbc'] = array(
		'label' => __( 'Battery Options', 'drafic' ),
		'target' => 'dbc_options',
	);
	return $product_data_tabs;
}
add_filter( 'woocommerce_product_data_tabs', 'drafic_battery_calculator_product_tabs' );

/**
 * Contents of the drafic battery calculator options product tab.
 */
function drafic_battery_calculator_product_tab_content() {

	global $post;
	
	// Note the 'id' attribute needs to match the 'target' parameter set above
	?><div id='dbc_options' class='panel woocommerce_options_panel'><?php

		?><div class='options_group'><?php

			for ($i = 1; $i <= 15 ; $i++) { 

				woocommerce_wp_text_input( array(
					'id'				=> '_operating_time_'.$i,
					'label'				=> __( 'Operating Time (in minutes)', 'drafic' ),
					'desc_tip'			=> 'true',
					'description'		=> __( 'Enter the value for ' .$i.' minute time. ' , 'drafic' ),
					'type' 				=> 'number',
					'custom_attributes'	=> array(
						//'min'	=> '1',
						'step'	=> '0.01',
					),
				) );
				
			}
	
			woocommerce_wp_text_input( array(
					'id'				=> '_operating_time_20',
					'label'				=> __( 'Operating Time (in minutes)', 'drafic' ),
					'desc_tip'			=> 'true',
					'description'		=> __( 'Enter the value for 20 minute time. ' , 'drafic' ),
					'type' 				=> 'number',
					'custom_attributes'	=> array(
						//'min'	=> '1',
						'step'	=> '0.01',
					),
				) );
	
			woocommerce_wp_text_input( array(
					'id'				=> '_operating_time_30',
					'label'				=> __( 'Operating Time (in minutes)', 'drafic' ),
					'desc_tip'			=> 'true',
					'description'		=> __( 'Enter the value for 30 minute time. ' , 'drafic' ),
					'type' 				=> 'number',
					'custom_attributes'	=> array(
						//'min'	=> '1',
						'step'	=> '0.01',
					),
				) );

			woocommerce_wp_text_input( array(
				'id'				=> '_string_needed',
				'label'				=> __( '# of String Needed', 'drafic' ),
				'desc_tip'			=> 'true',
				'description'		=> __( '# of String Needed' , 'drafic' ),
				'type' 				=> 'number',
				//'custom_attributes'	=> array(
					//'min'	=> '1',
					//'step'	=> '1',
				//),
			) );

		?></div>

	</div><?php

}
add_filter( 'woocommerce_product_data_panels', 'drafic_battery_calculator_product_tab_content' ); // WC 2.6 and up


/**
 * Save the custom fields.
 */
function save_dbc_options_fields( $post_id ) {
	
	if ( isset( $_POST['_operating_time_1'] ) ) :
		update_post_meta( $post_id, '_operating_time_1', $_POST['_operating_time_1'] );
	endif;
	
	if ( isset( $_POST['_operating_time_2'] ) ) :
		update_post_meta( $post_id, '_operating_time_2', $_POST['_operating_time_2'] );
	endif;
	
	if ( isset( $_POST['_operating_time_3'] ) ) :
		update_post_meta( $post_id, '_operating_time_3', $_POST['_operating_time_3'] );
	endif;
	
	if ( isset( $_POST['_operating_time_4'] ) ) :
		update_post_meta( $post_id, '_operating_time_4', $_POST['_operating_time_4'] );
	endif;
	
	if ( isset( $_POST['_operating_time_5'] ) ) :
		update_post_meta( $post_id, '_operating_time_5', $_POST['_operating_time_5'] );
	endif;
	
	if ( isset( $_POST['_operating_time_6'] ) ) :
		update_post_meta( $post_id, '_operating_time_6', $_POST['_operating_time_6'] );
	endif;
	
	if ( isset( $_POST['_operating_time_7'] ) ) :
		update_post_meta( $post_id, '_operating_time_7', $_POST['_operating_time_7'] );
	endif;
	
	if ( isset( $_POST['_operating_time_8'] ) ) :
		update_post_meta( $post_id, '_operating_time_8', $_POST['_operating_time_8'] );
	endif;
	
	if ( isset( $_POST['_operating_time_9'] ) ) :
		update_post_meta( $post_id, '_operating_time_9', $_POST['_operating_time_9'] );
	endif;
	
	if ( isset( $_POST['_operating_time_10'] ) ) :
		update_post_meta( $post_id, '_operating_time_10', $_POST['_operating_time_10'] );
	endif;
	
	if ( isset( $_POST['_operating_time_11'] ) ) :
		update_post_meta( $post_id, '_operating_time_11', $_POST['_operating_time_11'] );
	endif;
	
	if ( isset( $_POST['_operating_time_12'] ) ) :
		update_post_meta( $post_id, '_operating_time_12', $_POST['_operating_time_12'] );
	endif;
	
	if ( isset( $_POST['_operating_time_13'] ) ) :
		update_post_meta( $post_id, '_operating_time_13', $_POST['_operating_time_13'] );
	endif;
	
	if ( isset( $_POST['_operating_time_14'] ) ) :
		update_post_meta( $post_id, '_operating_time_14', $_POST['_operating_time_14'] );
	endif;
	
	if ( isset( $_POST['_operating_time_15'] ) ) :
		update_post_meta( $post_id, '_operating_time_15', $_POST['_operating_time_15'] );
	endif;
	
	if ( isset( $_POST['_operating_time_20'] ) ) :
		update_post_meta( $post_id, '_operating_time_20', $_POST['_operating_time_20'] );
	endif;
	
	if ( isset( $_POST['_operating_time_30'] ) ) :
		update_post_meta( $post_id, '_operating_time_30', $_POST['_operating_time_30'] );
	endif;

	if ( isset( $_POST['_string_needed'] ) ) :
		update_post_meta( $post_id, '_string_needed', $_POST['_string_needed'] );
	endif;
	
}
add_action( 'woocommerce_process_product_meta_simple', 'save_dbc_options_fields'  );
add_action( 'woocommerce_process_product_meta_variable', 'save_dbc_options_fields'  );
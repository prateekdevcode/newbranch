jQuery(document).ready(function(){
	"use strict";
	jQuery(".tipTip").tipTip();
	
	jQuery('.product_visibility:checked').trigger("click");
	
	jQuery("#wpcbr_message_position1, #wpcbr_message_position2").parent().addClass('hidden-desc');
	if( jQuery("#wpcbr_message_position1").val() === "custom_shortcode"){
		jQuery("#wpcbr_message_position1").parent().removeClass('hidden-desc');
	}
	if( jQuery("#wpcbr_message_position2").val() === "custom_shortcode"){
		jQuery("#wpcbr_message_position2").parent().removeClass('hidden-desc');
	}
	var restriction_type = jQuery(".cbr_restricted_type").find(":selected").val();
	if( restriction_type === 'all' ){
		jQuery(".restricted_countries").hide();
	}
	
});

jQuery(document).on("click", ".catelog_visibility", function(){
	"use strict";
	
	var hasClass = jQuery(this).parent().hasClass("hide-child-panel");
	
	if(hasClass == true ){
		jQuery(".catelog_visibility").parent().addClass("hide-child-panel");
		jQuery(".catelog_visibility").find('span').removeClass("dashicons-arrow-up-alt2");
		jQuery('.catelog_visibility').css('background','')
		jQuery(this).parent().removeClass("hide-child-panel");
		jQuery(this).find('input.product_visibility').trigger("click");
		jQuery(this).css('background','#fafeff')
		jQuery(this).find('span').addClass("dashicons-arrow-up-alt2");
	}
	/*if(hasClass == false ){
		jQuery(this).parent().addClass("hide-child-panel");
		jQuery(this).css('background','')
		jQuery(this).find('span').removeClass("dashicons-arrow-up-alt2");
	}*/
});

/*jQuery(document).on("click", ".cbr-save", function(){
	"use strict";
	jQuery(".catelog_visibility").parent().addClass("hide-child-panel");
	jQuery(".catelog_visibility").find('span').removeClass("dashicons-arrow-up-alt2");
	jQuery('.catelog_visibility').css('background','')
});*/


jQuery(document).on("change", "#wpcbr_message_position1", function(){
	"use strict";
	jQuery(this).parent().addClass('hidden-desc');
	if( jQuery(this).val() === "custom_shortcode"){
		jQuery(this).parent().removeClass('hidden-desc');
	}
});
jQuery(document).on("change", "#wpcbr_message_position2", function(){
	"use strict";
	jQuery(this).parent().addClass('hidden-desc');
	if( jQuery(this).val() === "custom_shortcode"){
		jQuery(this).parent().removeClass('hidden-desc');
	}
});

jQuery(document).on("change", "#wpcbr_make_non_purchasable1", function(){
	"use strict";
	jQuery('#wpcbr_hide_product_price1').parent().parent().parent().parent().hide();
	if( jQuery(this).is(":checked") === true){
		jQuery('#wpcbr_hide_product_price1').parent().parent().parent().parent().show();
	}
	
});
jQuery(document).on("change", ".cbr_restricted_type", function(){
	"use strict";
	if( jQuery(this).find(":selected").val() === 'specific' || jQuery(this).find(":selected").val() === 'excluded'){
		jQuery(".restricted_countries").show();
	}
	if(jQuery(this).find(":selected").val() === 'all' ){
		jQuery(".restricted_countries").hide();
	}
});

/*ajex call for general tab form save*/	
jQuery(document).on("submit", "#cbr_setting_tab_form", function(){
	"use strict";
	jQuery("#cbr_setting_tab_form .spinner").addClass("active");
	var form = jQuery('#cbr_setting_tab_form');
	jQuery.ajax({
		url: ajaxurl+"?action=cbr_setting_form_update",//csv_workflow_update,		
		data: form.serialize(),
		type: 'POST',
		dataType:"json",	
		success: function(response) {
			if( response.success === "true" ){
				jQuery("#cbr_setting_tab_form .spinner").removeClass("active");
				var snackbarContainer = document.querySelector('#cbr-toast-example');
				var data = {message: 'Setting saved successfully.'};
				snackbarContainer.MaterialSnackbar.showSnackbar(data);
			} else {
				//show error on front
			}
		},
		error: function(response) {
			console.log(response);			
		}
	});
	return false;
});

jQuery(document).on("click", ".cbr_tab_input", function(){
	"use strict";
	var tab = jQuery(this).data('tab');
	var url = window.location.protocol + "//" + window.location.host + window.location.pathname+"?page=woocommerce-product-country-base-restrictions&tab="+tab;
	window.history.pushState({path:url},'',url);	
});
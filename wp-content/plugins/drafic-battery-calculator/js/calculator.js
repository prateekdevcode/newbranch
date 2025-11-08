DRAFIC_calculator = {
	Data: {
    	getData: function (selector, is_float, max ) {
        	value = selector.val();
        	if (is_float === 1){
            	value = parseFloat(value);
        	}else if (is_float === 0){
            	value = parseInt(value);
        	}
        	if (isNaN(value) || value < 0 || value > max ) {
            	DRAFIC_calculator.Visual.show_message(selector, is_float, max);
            	return NaN;
        	}
        	selector.parent().find('p.message').hide();
        	return value;
    	},
	},
	Visual: {
		show_message: function (selector, is_float, max) {
			message_place = selector.parent().find('p.message');
			if (is_float === 1){
				message_place.text('Required and must be a positive number').show();
			}if (is_float === 0){
				message_place.text('Required and must be a positive integer').show();
			}if( is_float === 0 && max > 0 ){
				message_place.text('Required, positive integer and not more than ' + max ).show();
			}if (is_float === 1 && max > 0 ){
				message_place.text('Required, positive number and not more than ' + max).show();
			}
		},
		show_loader: function(selector) {
			selector.prop("disabled", true);
			selector.html(
				`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
      		);
		},
		hide_loader: function(selector) {
			selector.prop("disabled", false);
			selector.html('Calculate');
		},
		show_product: function(collection) {
			jQuery('.calculator-warning').hide();
			jQuery('#calculator-recommended').hide(200);			
			jQuery.ajax({
                url: DBC.ajaxurl,
                dataType : "json",
                type: "POST",
                data: { 'action': 'get_products', 'collection': collection, 'security': DBC.security },
				beforeSend : function() {
					DRAFIC_calculator.Visual.show_loader(jQuery('#calculator-button'));
				},
                success: function (response) {
					jQuery('#recommended-items').html('');
					if(response.success) {
						time = DRAFIC_calculator.Data.getData(jQuery('#calculator-time'), 0);
						DRAFIC_calculator.Visual.hide_loader(jQuery('#calculator-button'));
						jQuery('#recommended-items').html(response.data.html);
						jQuery('#calculator-recommended').show();						
						IDS = response.data.IDS;
						jQuery("#calculator-table tbody tr").each(function(i) {
							model = jQuery(this).find("td:first").data('id').toString();	
							if(jQuery.inArray(model, IDS) !== -1) {								
								jQuery(this).find("td:first").css('background-color','#98FB98');
								jQuery(this).find('td:nth-child('+(time+1)+')').css('background-color','#98FB98');
							}
						})
					}
				}
			});
 			
		}
	},
	Calculation:{
		calculate: function (){

			power = DRAFIC_calculator.Data.getData(jQuery('#calculator-power'), 0);
			load = DRAFIC_calculator.Data.getData(jQuery('#calculator-load'), 0, 100);
			powFactor = DRAFIC_calculator.Data.getData(jQuery('#calculator-pow-factor'), 1, 1);
			efficiency = DRAFIC_calculator.Data.getData(jQuery('#calculator-efficiency'), 0, 100);
			cells = DRAFIC_calculator.Data.getData(jQuery('#calculator-cells'), 0); 
			strings = DRAFIC_calculator.Data.getData(jQuery('#calculator-battery-strings'), 0);             	 
			time = DRAFIC_calculator.Data.getData(jQuery('#calculator-time'), 0);  
			
			WPC = ((( ( power * load * powFactor ) / efficiency) * 1000 ) / cells ) / strings;
			//console.log('Power = ' + power + ' Load = ' + load + ' String = ' + strings + ' Power = ' + powFactor + ' Efficiency = ' + efficiency + ' Cells = ' + cells + ' Time = ' + time );
			Max_Thresh = WPC * 1.1;
			Min_Thresh = (( WPC ) - ( WPC * 0.05 ));
			
			jQuery('#calculator-table tbody tr').css('background-color', '');
			jQuery('#calculator-table tbody tr td').css('background-color', '');
			
			if (WPC > 0 && !isNaN(WPC)) { 
				jQuery('#calculator-result').text(( WPC*strings).toFixed(2) + ' WPC');
				WPC = WPC.toFixed(2);
				jQuery('#calculator-table thead tr:eq(1) th').each(function(index, value) {						
					if (jQuery(value).text() == time){
						position = index + 1;
					}
				});
				is_present = 0;
				var collection = [];
				
				jQuery('#calculator-table tbody tr').each(function(index, value) {
					jQuery(value).find("td:first").css('background-color','');	
					jQuery(value).find('td:nth-child('+(time+1)+')').css('background-color','');					
					Col_Value = parseFloat(jQuery(value).children('td').eq(position).text());						
					condition = Col_Value >= Min_Thresh && Col_Value <= Max_Thresh;
					if (condition ) { 	
						model = jQuery('#calculator-table tbody').children('tr').eq(index).children('td').eq(0);
                        model_id = jQuery(model).data('id');
                        is_present = 1;
						collection.push({model_id});
					}
				});
				
				if (is_present == 1){						
                   	DRAFIC_calculator.Visual.show_product(collection);
                }
                if (is_present == 0){
                    jQuery('.calculator-warning').show();
                    jQuery('#calculator-recommended').hide();
                }
			} else{
            	jQuery('#calculator-result').text('Wrong data in input fields');
        	}
		}
	}
};

( function( $ ) {
    "use strict";
	
	$(document).ready(function(e) {
    	$('#calculator-button').on('click', function() {						
        	DRAFIC_calculator.Calculation.calculate();
    	});
		
		$('body').keyup(function () {
			if (event.keyCode == 13) {
				$('#calculator-button').click();
				return false;
			}
		});
    });
	
	
})( jQuery );
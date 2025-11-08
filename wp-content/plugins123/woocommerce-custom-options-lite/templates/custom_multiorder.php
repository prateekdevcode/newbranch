<?php
$required = $options['required'];
if($options['price'] != 0)
	{
		$price = ':- ('.wc_price( $options['price'] ).')';
	}
else
	{
		$price = '';
	}
//$entered_data = $_POST['custom-options'][sanitize_title( $options['name'] )];
?>

<p class="form-row form-row-wide custom_<?php echo sanitize_title( $options['name'] ); ?>">
	<?php if ( ! empty( $options['label'] ) ) : ?>
		<label><?php echo wptexturize( $options['label'] ) . ' ' . $price;
		if($required == 1)
		{
		?>
			<abbr title="required" class="required">*</abbr>
		<?php
		}
		?>
		</label>
	<?php endif; ?>
	<?php $arrValue = explode(',',$options['value']); ?>
	<?php 
		if(isset($_GET['size-quantity'])){
			$s_q = explode(",",$_GET['size-quantity']);
			$newsq = array();
			foreach($s_q as $value) {
				$sq = explode("-",$value);
				$newsq[$sq[0]] = $sq[1];
			}
		}
	?>
	<input data-price="<?php echo $options['price']; ?>" class="input-radio custom-options custom_select hidden_custom_field" type="hidden" name="custom-options[<?php echo sanitize_title( $options['name'] ); ?>]" value="<?php echo @$_GET['size-quantity']; ?>" >
	<div class="v_select_wrap">
	<?php foreach($arrValue as $optionValue) { ?>
		<div class="v_select">	
			<input class="input-radio custom-options_type" type="checkbox" value="<?php echo ucfirst($optionValue); ?>" > <?php echo ucfirst($optionValue); ?>
			<input type="text" name="multi_size_opt" value="<?php echo @$newsq[$optionValue] ?>" placeholder="0" class="multi-input-field" >
		</div>
	<?php } ?>
	</div>
 
</p>

<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery(".custom-options_type").change(function(){
      //alert(jQuery(this).val());
    }); 
  
    jQuery('.v_select .multi-input-field').focusout(function(){
      jQuery(this).parent().removeClass('current_active');
    });

    jQuery(window).on('load',function(){
        jQuery('.v_select').each(function(){
            var hasVAl = jQuery(this).find('.multi-input-field').val();
            if(hasVAl != '' && hasVAl >0){
              jQuery(this).find('input.custom-options_type').prop('checked', true);
              setOption(jQuery(this).find('input.custom-options_type'));
              if(jQuery(this).attr('data-key')){
                var y = jQuery(this).find('.multi-input-field').val();
                jQuery(this).attr('data-val',y);
                setVal();
              }else{               
                jQuery(this).removeAttr('data-val');
              }
            }
        });
    });

    jQuery('.v_select .multi-input-field').keyup(function(){       
      if(jQuery(this).val() != '' && jQuery(this).val() > 0 ){
        jQuery(this).parent().find('input.custom-options_type').prop('checked', true);
        setOption(jQuery(this).parent().find('input.custom-options_type'));       
        if(jQuery(this).parent().attr('data-key')){
          var y = jQuery(this).val();
          jQuery(this).parent().attr('data-val',y);
          setVal();
        }else{
          jQuery(this).parent().removeAttr('data-val');
        }     
      }else{       
        jQuery(this).parent().find('input.custom-options_type').prop('checked', false);
        setOption(jQuery(this).parent().find('input.custom-options_type'));
      }
    });
    jQuery('.v_select .multi-input-field').focusout(function(){  
      if(jQuery(this).val() != '' ){
        if(jQuery(this).parent().attr('data-key')){
          var y = jQuery(this).val();
          jQuery(this).parent().attr('data-val',y);
        }else{
          jQuery(this).parent().removeAttr('data-val');
        }                
      }   
    });


    function setOption(elem){

      if(elem.is(':checked')){
        var x = elem.val(); 
        elem.parent().attr('data-key',x);
        
        if(elem.parent().find('.multi-input-field').val() != ''){
          var y = elem.parent().find('.multi-input-field').val();
          elem.parent().attr('data-val',y);         
        }
        setVal();
      }else{
        removeVal(elem.parent().attr('data-key'),elem.parent().attr('data-val'))
        elem.parent().removeAttr('data-key');
        elem.parent().removeAttr('data-val');
      }
    }

    
  });
  
  function setVal(){
    var main_val = jQuery('.hidden_custom_field').val();
    var values = '';
    var totalQ = 0;
    for(i=0;i<jQuery('.v_select').length;i++){
      if(jQuery('.v_select').eq(i).attr('data-val') && jQuery('.v_select').eq(i).attr('data-key')){
        values = values + jQuery('.v_select').eq(i).attr('data-key')+'-'+jQuery('.v_select').eq(i).attr('data-val')+',';
        totalQ = parseInt(totalQ) + parseInt(jQuery('.v_select').eq(i).attr('data-val'));
      }
    }
    jQuery('.quantity input').val(totalQ)
    jQuery('.hidden_custom_field').val(values)   
  }
  
  function removeVal(x, y){
    var model = x+'-'+y+',';
    var values = jQuery('.hidden_custom_field').val();
    var now_vl = values.replace(model,'');
    
    var val = jQuery('.quantity input').val();
    var current_q = val - parseInt(y);
    jQuery('.quantity input').val(current_q);
    jQuery('.hidden_custom_field').val(now_vl)
    console.log(now_vl);
  }

  jQuery(window).on('load',function(){
   // jQuery('.customswatchinput').eq(0).find('label').click();
   // ranit 29-3-2019
   //console.log(qvalArray);
   // change functionlity
    jQuery(document).on("change paste keyup",".size-inputs", function() {
      var currentRow = jQuery(this).parent().parent().parent().parent().parent();
	  console.log()
      var preloadJson = JSON.parse(currentRow.find('.sq_list_wrap input[type=hidden]').val());
	  var sizeQuantity = 'Size & Quantities';
	  var qvalArray;
	  var upatedArray = [];
	  for(i=0;i<preloadJson.length;i++){		
		if(preloadJson[i].name == sizeQuantity){
		  qvalArray = preloadJson[i].value.split(',')
		}
	  }
       var data_size = jQuery(this).attr('data-size');
       var data_val = jQuery(this).val();      
       if(parseInt(data_val) > 0){
          for(j=0;j<qvalArray.length;j++){
              if(qvalArray[j] != ''){
                  var expVal = qvalArray[j].split('-');
                  if(expVal[0] == data_size){
                    expVal[1] = data_val;
                    qvalArray[j] = expVal[0]+'-'+expVal[1];                   
                  }
              }
          }
       }  
       for(i=0;i<preloadJson.length;i++){       
          if(preloadJson[i].name == sizeQuantity){            
            preloadJson[i].value = qvalArray.join();
          }
        }      
      currentRow.find('.sq_list_wrap input[type=hidden]').val(""+JSON.stringify(preloadJson));
      totalSum(currentRow);
    });

    function totalSum(currentRow){
      var sum = 0;
      currentRow.find('.size-inputs').each(function(){
          sum = sum + parseInt(jQuery(this).val());
      });
		console.log(sum);
      currentRow.find('.product-quantity .quantity input[type=number]').val(sum);
    }

    function toObject(arr) {
      var rv = {};
      for (var i = 0; i < arr.length; ++i)
        rv[i] = arr[i];
      return rv;
    }


  });
 

</script>
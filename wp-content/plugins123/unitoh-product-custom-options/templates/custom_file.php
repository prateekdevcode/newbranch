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

if(isset($_POST['custom-options'][sanitize_title( $options['name'] )])){

$entered_data = $_POST['custom-options'][sanitize_title( $options['name'] )];
$entered_data = str_replace('\"','"',$entered_data);
$entered_data = str_replace("\'","'",$entered_data);
	
}else{
	$entered_data = '';
}


?>
<style>
	span.uploading_commend {
		font-size: 13px;
		margin-left: 13px;
	}
</style>
<p class="form-row form-row-wide custom_<?php echo sanitize_title( $options['name'] ); ?>" >
	<?php if ( ! empty( $options['label'] ) ) : ?>
		<label><?php echo wptexturize( $options['label'] ) . ' ' . $price; 
		if($required == 1)
		{
			?>
				<abbr title="required" class="required">*</abbr>
			<?php
		}
		?>
		<span class="uploading_commend" >'Please provide high resolution PNG, JPEG, JPG or PDF<10 M.'.</span></label>
	<?php endif; ?>
	<input type="file" class="input-text custom-options custom_field custom_option_file" name="custom_option_file" id="custom_option_file_<?php echo sanitize_title( $options['name'] ); ?>" >
	
	<input type="hidden" class="input-text custom-options custom_field custom_option_file_input" data-price="<?php echo $options['price']; ?>" name="custom-options[<?php echo sanitize_title( $options['name'] ); ?>]" value="<?php if( ! empty($entered_data) ){ echo $entered_data; } ?>" <?php if ( ! empty( $options['max'] ) ) echo 'maxlength="' . $options['max'] .'"'; ?> >
	
	<span class="input_error"> </span>
</p>
<script>
	jQuery(document).ready(function(){
		jQuery(".custom_option_file").on("change",function(){
			//notify user about the file upload status
			jQuery(this).parent().children(".input_error").html(" uploading...");
			var ele = jQuery(this);
			 //get selected file
			files = event.target.files;
			
			//form data check the above bullet for what it is  
			var data = new FormData();                                   

			//file data is presented as an array
			for (var i = 0; i < files.length; i++) {
				var file = files[i];
				if(!file.type.match('image.*')) {              
					//check file type
					jQuery(".input_error").html("Please choose an images file.");
				}else if(file.size > 3048576){
					//check file size (in bytes)
					jQuery(".input_error").html("Sorry, your file is too large (> 2 MB)");
				}else{
					//append the uploadable file to FormData object
					data.append('file', file, file.name);
					data.append('action', 'custom_option_file_upload');
					//create a new XMLHttpRequest
					var xhr = new XMLHttpRequest();     
					
					//post file data for upload
					xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>', true);  
					xhr.send(data);
					xhr.onload = function () {
						//get response and show the uploading status
						var response = JSON.parse(xhr.responseText);
						if(xhr.status === 200 && response.status == 'ok'){
							//jQuery("#custom_option_file_data").val(response.name);
							ele.parent().children(".custom_option_file_input").val(response.name);
							ele.parent().children(".input_error").html("");
						}else if(response.status == 'type_err') {
							jQuery(".input_error").html("Please choose an images file. Click to upload another.");
						}else {
							jQuery(".input_error").html("Some problem occured, please try again.");
						}
					};
				}
			} 
		});
	});
	
</script>
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
	<input data-price="<?php echo $options['price']; ?>" class="input-radio custom-options custom_select hidden_custom_field" type="hidden" name="custom-options[<?php echo sanitize_title( $options['name'] ); ?>]" value="<?php echo $_GET['size-quantity']; ?>" >
	<div class="v_select_wrap">
	<?php foreach($arrValue as $optionValue) { ?>
		<div class="v_select">	
			<input class="input-radio custom-options_type" type="checkbox" value="<?php echo ucfirst($optionValue); ?>" > <?php echo ucfirst($optionValue); ?>
			<input type="text" name="multi_size_opt" value="<?php echo $newsq[$optionValue] ?>" placeholder="0" class="multi-input-field" >
		</div>
	<?php } ?>
	</div>
 
</p>
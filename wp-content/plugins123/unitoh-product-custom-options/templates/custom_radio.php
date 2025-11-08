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
		$product_id = get_the_ID();
		$terms = get_the_terms ( $product_id, 'product_cat' );
		$cat_slug = [];
		foreach ( $terms as $term ) {
			 $cat_slug[] = $term->slug;
		}
		
	?>			
	<div class="wcvaswatch"> 
	<?php foreach($arrValue as $optionValue) { ?>
		<?php $colorValue = strtolower(str_replace(" ","-",$optionValue)); ?>
		<div class="customswatchinput">
			<label class="wcvaswatchlabel" title="<?php echo (in_array("decoration", $cat_slug))?"As per logo":ucfirst($optionValue); ?>" style="background-image:url(<?php echo get_template_directory_uri(); ?>/color-image/<?php echo $colorValue; ?>.jpg); width:32px; height:32px;">
				<input data-price="<?php echo $options['price']; ?>" class="input-radio custom-options custom_attribute_radio custom_select" type="radio" name="custom-options[<?php echo sanitize_title( $options['name'] ); ?>]" value="<?php echo ucfirst($optionValue); ?>" checked>
				<span class="glyphicon glyphicon-ok"></span>
			</label>
		</div>
	<?php } ?>
    </div>
</p>
<div class="clearfix"></div>

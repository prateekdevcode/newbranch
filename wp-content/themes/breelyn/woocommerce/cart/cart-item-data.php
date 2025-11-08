<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-item-data.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<dl class="variation">
	<?php //print_r($item_data); ?>
	<ul class="customVariations">
	<div class="loaderBg"></div>
		<?php foreach ( $item_data as $data ) : ?>
		<?php //print_r($data); ?>

		<?php 
			if($data['name'] == "LOGOS FOR FRONT" || $data['name'] == "LOGOS FOR BACK" || $data['name'] == "LOGOS FOR LEFT SLEEVE" || $data['name'] == "LOGOS FOR RIGHT SLEEVE" ){
		?>
			<li class="baseImages">
				<h6 class="h"><b><?php echo $data['name']; ?></b></h6>
				<img src="<?php echo $data['value']; ?>" alt="">
			</li>
		<?php			
		   }else if($data['name'] == "Main Boby" || $data['name'] == "Main Body" || $data['name'] == "Pattern 1" || $data['name'] == "Pattern 2" || $data['name'] == "Pattern 3"  || $data['name'] == "side_body" || $data['name'] == "collar"  ){
		?>

			<?php 
				if($data['name'] == "side_body"){
			?>
				<li class="baseNames">
					<h6 class="h <?php echo $data['name']; ?>"><b>Pattern 1</b></h6>
					<div class="colorBox" title="<?php echo $data['value']; ?>" style="background:<?php echo $data['value']; ?> "></div>
				</li>
			<?php }elseif($data['name'] == "collar"){?>
				<li class="baseNames">
					<h6 class="h <?php echo $data['name']; ?>"><b>Pattern 2</b></h6>
					<div class="colorBox" title="<?php echo $data['value']; ?>" style="background:<?php echo $data['value']; ?> "></div>
				</li>
			<?php }else{ ?>
				<li class="baseNames">
					<h6 class="h <?php echo $data['name']; ?>"><b><?php echo $data['name']; ?></b></h6>
					<div class="colorBox" title="<?php echo $data['value']; ?>" style="background:<?php echo $data['value']; ?> "></div>
				</li>
			<?php } ?>

		  <?php }else{ ?>

		  		<?php if($data['value'] == 'pocket-left'){ ?>

					<li>
						<h6 class="h"><b>Pocket</b></h6>
						<p><?php echo $data['value']; ?></p>
					</li>

				<?php }elseif($data['value'] == 'pocket-right'){ ?>
					<li>
						<h6 class="h"><b>Pocket</b></h6>
						<p><?php echo $data['value']; ?></p>
					</li>
				<?php }else{ ?>

					<li>
						<h6 class="h"><b><?php echo $data['name']; ?></b></h6>
						<p><?php echo $data['value']; ?></p>
					</li>

				<?php } ?>

		  <?php } ?>
		<?php endforeach; ?>
	</ul>
</dl>
<style>
	
</style>
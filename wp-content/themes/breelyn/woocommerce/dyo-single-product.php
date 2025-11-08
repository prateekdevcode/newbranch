<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
defined( 'ABSPATH' ) || exit;
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

echo "string";

$productId = 16168;
$product = wc_get_product( $productId );
print_r($product);
echo "sdfsfassdf";
?>
<script>
	var onlyClicked = 0;
	var changeIconColor = (function () {		
		var canvas = document.createElement("canvas"), // shared instance
		context = canvas.getContext("2d");
		canvas.width = 629;
		canvas.height = 372;
		function desaturate() {
			var imageData = context.getImageData(0, 0, canvas.width, canvas.height),
			pixels = imageData.data,
			i, l, r, g, b, a, average;			
			for (i = 0, l = pixels.length; i < l; i += 4) {
				a = pixels[i + 3];
				if (a === 0) {
					continue;
				} // skip if pixel is transparent			
				r = pixels[i];
				g = pixels[i + 1];
				b = pixels[i + 2];
				average = (r + g + b) / 3 >>> 0; // quick floor
				pixels[i] = pixels[i + 1] = pixels[i + 2] = average;
			}
			context.putImageData(imageData, 0, 0);
		}
		function colorize(color, alpha) {
			context.globalCompositeOperation = "source-atop";
			context.globalAlpha = alpha;
			context.fillStyle = color;
			context.fillRect(0, 0, canvas.width, canvas.height);
			// reset
			context.globalCompositeOperation = "source-over";
			context.globalAlpha = 1.0;
		}
		return function (iconElement, color, alpha) {
			context.clearRect(0, 0, canvas.width, canvas.height);
			context.drawImage(iconElement, 0, 0, canvas.width, canvas.height);
			desaturate();
			colorize(color, alpha);
			return canvas.toDataURL("image/png", 1);
		};
	}());
</script>
<style>
.colorPickSelectorfontback.colorPickSelectorfont, .colorPickSelector1, .colorPickSelector2, .colorPickSelector3, .colorPickSelector4, .colorPickSelector5, .colorPickSelector6, .colorPickSelector7, .colorPickSelector8, .colorPickSelector9, .colorPickSelector10 {
  border-radius: 5px;  width: 36px;  height: 36px;  cursor: pointer;  -webkit-transition: all linear .2s;-moz-transition: all linear .2s;  -ms-transition: all linear .2s;  -o-transition: all linear .2s;  transition: all linear .2s;
  z-index:99999;
}
/* .variations_form.cart {position: absolute;left: -200%;max-height: 100px;overflow: hidden;margin: 0 !important;top:0;	padding: 0 !important;} */
.product_meta{position: absolute;    left: -200%;}
.accordion {  background-color: #eee;  color: #444  !important;  cursor: pointer;  padding: 18px;  width: 100%;  text-align: left;  border: none;  outline: none;  transition: 0.4s;}
.accordion.active, .accordion:hover {    background-color: #f7941e;    color: #fff !important;}
.panel {  padding: 0px;  background-color: #737373;  display: none;  overflow: hidden;}
.panel p { color:#fff;}
.accordion i{	float: right;}
.accordion.active .fa-angle-down:before {    content: "\f106";}
.restorePop{
	overflow: hidden;
}
.restorePopBg{
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: rgba(0,0,0,.8);
	z-index: 999;
	transition: all .3s ease;
	-webkit-transition: all .3s ease;
	-moz-transition: all .3s ease;
	display: none;
}
.restorePop{
	position: absolute;
	width: 60%;
	height: 400px;	
	left: 50%;
	top: 50%;
	transform: translateX(-50%) translateY(-50%) scale(0);
	transition: all .3s ease;
	-webkit-transition: all .3s ease;
	-moz-transition: all .3s ease;
	z-index: 9999;

}
.showRestore .restorePopBg{
	display: block;
}
.showRestore .restorePop{
	transform: translateX(-50%) translateY(-50%) scale(1);
}
img.closePopBtn {
	display: block;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 99999;
    cursor: pointer;
    filter: brightness(200);
}
.showRestore {
    overflow: hidden !important;
} 
.contentA{
    width: 60%;
    float: left;
    height: 100%;
    background: #fff;
    border: 4px solid #f89032;  
    display: none !important;

}
.actionA {
    width: 40%;
    float: none;
   margin: auto;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: #f89032;
}
.actionA button {
    margin-bottom: 10px;
    min-width: 205px;
}
.contentA{
	padding: 20px;
}
.contentA h6.accordion {   
    font-size: 16px;
    padding: 14px;
    border-radius: 3px;
}
.contentA  .panel {
	background: transparent;
	box-shadow: none;
}
.contentA  .panel p{
	color: #000;
}
.resultant_values{
	height: 90%;
    overflow: auto;
}
.contentA  h2{
	    text-align: center;
    margin-bottom: 10px !important;
}
.html2canvas-container { width: 3000px !important; height: 3000px !important; }
.imgW{
	max-height: 218px;
    margin-bottom: 20px;
    overflow: hidden;
}
.imgW img{
	margin-top: -109px !important;
    display: block;
}
.NoPos {
    transform: none !important;
}
.tooltips{
	position: fixed;
	top: 0px;
	left: 50%;
	transform: translateX(-50%) scale(0);
	-webkit-transform: translateX(-50%) scale(0);
	-moz-transform: translateX(-50%) scale(0);
	background: #000;
	color: #fff;
	border-radius: 10px;
	padding: 10px;
	transition: all .3s ease;
	-webkit-transition: all .3s ease;
	-moz-transition: all .3s ease;
}
.modal {
   position: absolute;
   top: 230px;
   right: 100px;
   bottom: 0;
   left: 0;
   z-index: 10040;
   overflow: auto;
   overflow-y: auto;
}

.tooltips.opens{
	transform: translateX(-50%) scale(1);
}
.tooltips p{
	color: #fff;
	margin: 0;
}
.loader{
		position: absolute;
    background: #737373;
    overflow: hidden;
    opacity: 1;
    height: 100%;
    width: 100%;
    max-width: 100%;
    z-index: 9;
    text-align: center;
}
.loader img {
    width: 40px;
    margin: 50vh auto 0;
}
.loader span{
	display:block;
	color:#fff;
}
tr.current_active td {    
    background: #f7f6f6 !important;
    box-shadow: inset 0px 0px 10px rgba(0,0,0,.1);
    border: 1px solid #ddd;
}
.fabric-section .fabric_polo_type, .fabric-section .fabric_hoodie_type{
	display: none;
}
</style>
<div class="tooltips"><p>You can press 'Delete' button to delete this item</p></div>
<div class="restorePopBg"></div>
<div class="restorePop">
	<img class="closePopBtn" src="<?php echo get_stylesheet_directory_uri() ?>/customproducts/images/cross.png" alt="#">
	<div class="contentA"></div>
	<div class="actionA">
		<button class="restorenow"> Restore Design </button>
		<button class="closePopBtn"> Cancel </button>
	</div>
</div>
<section id="custom-design-area" class="clearfix">
	<div class="design-area  parent">
		<div class="customize" >
			<div id="live-view" class="sec-rt">
                <div id="item" class="main_customize_area panzoom">
					<!--shadow area jquery append img tag-->
					<img style="position: absolute;z-index: 5;" class="baseshadow1 shadow fluid index5" src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/images/dummy-img.jpg" alt="Shadow">
					<div id="drawingArea" class="drawing" style="">	
						<canvas id="cc"  class="hover" ></canvas>
					</div>
					<div id="drawingArea-back" class="drawing" style="" >	
						<canvas id="c1" class="hover" ></canvas>
					</div>
					<div id="leftSleeve" class="drawing " style="">	
						<canvas id="c3"  class="hover" ></canvas>
					</div>
					<div id="rightSleeve" class="drawing" style="">	
						<canvas id="c4"  class="hover"></canvas>
					</div>
					<div class="resource target-images"></div>	
				</div>
			</div>
		</div>
		<!--selected products name-->
		<input type="hidden" name="selectedname" class="selected_name" id="" value="">
		<input type="hidden" name="product_id" class="product_id" id="" value="">
        <div class="right-side-bar">
        	<div class="price-area">
				<input type="hidden" class="defaultProductPrice" data-unit="<?php echo get_woocommerce_currency_symbol();?> " value="<?php echo get_post_meta(get_the_ID(),'_price',true); ?>">
        		<div class="prices">
					<table>
						<tr>
							<th> Qty </th>
							<th> Price </th>
						</tr>
						<tr data-symbol="<?php echo get_woocommerce_currency_symbol();?>" data-price="42.13" data-qty="10-24">
							<td>10-24</td>
							<td><?php echo get_woocommerce_currency_symbol();?>42.13</td>
						</tr>
						<tr data-symbol="<?php echo get_woocommerce_currency_symbol();?>" data-price="37.18" data-qty="25-50">
							<td>25-50</td>
							<td><?php echo get_woocommerce_currency_symbol();?>37.18</td>
						</tr>
						<tr data-symbol="<?php echo get_woocommerce_currency_symbol();?>" data-price="35.09" data-qty="50-100">
							<td>50-100</td>
							<td><?php echo get_woocommerce_currency_symbol();?>35.09</td>
						</tr>
						<tr data-symbol="<?php echo get_woocommerce_currency_symbol();?>" data-price="33.11" data-qty="111-250">
							<td>111-250</td>
							<td><?php echo get_woocommerce_currency_symbol();?>33.11</td>
						</tr>
					</table>
					<!-- <li> Quality: <span class="bulk-quantity">10-24</span> <span class="eachPrice"><span class="bluk-unit">$</span>42.13</span> </li>
					<li> Quality: <span class="bulk-quantity">25-50</span> <span class="eachPrice"><span class="bluk-unit">$</span>37.18</span> </li>
					<li> Quality: <span class="bulk-quantity">50-100</span> <span class="eachPrice"><span class="bluk-unit">$</span>35.09</span> </li>
					<li> Quality: <span class="bulk-quantity">111-250</span> <span class="eachPrice"><span class="bluk-unit">$</span>33.11</span> </li> -->
				</div>
				<!-- <span class="sign">
					<?php //echo get_woocommerce_currency_symbol();?> <?php echo get_post_meta(get_the_ID(),'_price',true); ?>
				</span> 
				<span class="price custom_price" data-total="">0</span> -->
			</div>
			<div class="calhiden"></div>
        	<a href="javascript:void(0)" id ="capture" class="cart-btn single_add_to_cart_button">
				<i class="fa fa-shopping-cart"></i> <span class="cart_text"> ADD TO CART</span>
			</a>
			<button class="save">Save Settings</button>
			<p class="setting_status_message" style="font-size: 15px;font-weight: bold;padding: 6px;margin-top: 5px;border-radius: 10px;"></p>
			<?php if(is_user_logged_in()){ ?>
				<button class="restore_savedata">Restore Design</button>
			<?php } ?>
		</div>
	</div>
	<aside class="customization-point demo scrollable">
		<div class="inside">
			<ul>
			<li class="active" id="categories">
				<a href="#" data-target="id-1">
					<!--  <img src="images/garments-icon.png" alt="#"> -->
					<i class="fas fa-tshirt"></i>
					Categories
				</a> 	
			</li>
			<li class="" id="design">
				<a href="#" data-target="id-2">
					<i class="fas fa-paint-brush"></i>
					Designs
				</a> 	
			</li>
			<li class="" id="logo">
				<a href="#" data-target="id-3">
					<i class="fas fa-images"></i>
					Logos
				</a> 	
			</li>
			<li class="" id="text">
				<a href="#" data-target="id-4">
					<i class="fas fa-text-width"></i>
					Text
				</a> 	
			</li>
			<li class="" id="feature">
				<a href="#" data-target="id-5">
					<svg xmlns="http://www.w3.org/2000/svg" height="17pt" version="1.1" viewBox="0 -31 937.5 937" width="17pt">
						<g id="surface1">
							<path d="M 62.5 750.25 L 93.75 750.25 L 93.75 719 L 62.5 719 C 45.238281 719 31.25 705.011719 31.25 687.75 L 31.25 62.75 C 31.25 45.488281 45.238281 31.5 62.5 31.5 L 750 31.5 C 767.261719 31.5 781.25 45.488281 781.25 62.75 L 781.25 94 L 812.5 94 L 812.5 62.75 C 812.5 28.234375 784.515625 0.25 750 0.25 L 62.5 0.25 C 27.984375 0.25 0 28.234375 0 62.75 L 0 687.75 C 0 722.265625 27.984375 750.25 62.5 750.25 Z M 62.5 750.25 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 62.5 62.75 L 93.75 62.75 L 93.75 94 L 62.5 94 Z M 62.5 62.75 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 125 62.75 L 156.25 62.75 L 156.25 94 L 125 94 Z M 125 62.75 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 187.5 62.75 L 218.75 62.75 L 218.75 94 L 187.5 94 Z M 187.5 62.75 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 125 812.75 C 125 847.265625 152.984375 875.25 187.5 875.25 L 875 875.25 C 909.515625 875.25 937.5 847.265625 937.5 812.75 L 937.5 187.75 C 937.5 153.234375 909.515625 125.25 875 125.25 L 187.5 125.25 C 152.984375 125.25 125 153.234375 125 187.75 Z M 156.25 187.75 C 156.25 170.488281 170.238281 156.5 187.5 156.5 L 875 156.5 C 892.261719 156.5 906.25 170.488281 906.25 187.75 L 906.25 812.75 C 906.25 830.011719 892.261719 844 875 844 L 187.5 844 C 170.238281 844 156.25 830.011719 156.25 812.75 Z M 156.25 187.75 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 187.5 187.75 L 218.75 187.75 L 218.75 219 L 187.5 219 Z M 187.5 187.75 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 250 187.75 L 281.25 187.75 L 281.25 219 L 250 219 Z M 250 187.75 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 312.5 187.75 L 343.75 187.75 L 343.75 219 L 312.5 219 Z M 312.5 187.75 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 187.5 250.25 L 875 250.25 L 875 281.5 L 187.5 281.5 Z M 187.5 250.25 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 187.5 328.375 L 312.5 328.375 L 312.5 359.625 L 187.5 359.625 Z M 187.5 328.375 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 187.5 390.875 L 281.25 390.875 L 281.25 422.125 L 187.5 422.125 Z M 187.5 390.875 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 531.25 453.375 C 470.839844 453.375 421.875 502.339844 421.875 562.75 C 421.875 623.160156 470.839844 672.125 531.25 672.125 C 591.660156 672.125 640.625 623.160156 640.625 562.75 C 640.554688 502.375 591.625 453.445312 531.25 453.375 Z M 531.25 640.875 C 488.105469 640.875 453.125 605.894531 453.125 562.75 C 453.125 519.605469 488.105469 484.625 531.25 484.625 C 574.394531 484.625 609.375 519.605469 609.375 562.75 C 609.320312 605.875 574.375 640.820312 531.25 640.875 Z M 531.25 640.875 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 781.25 515.875 C 781.25 507.242188 774.257812 500.25 765.625 500.25 L 724.328125 500.25 C 721.019531 489.984375 716.894531 479.996094 711.96875 470.40625 L 741.171875 441.222656 C 747.265625 435.117188 747.265625 425.230469 741.171875 419.125 L 674.875 352.828125 C 668.769531 346.734375 658.882812 346.734375 652.777344 352.828125 L 623.59375 382.015625 C 613.988281 377.109375 604.007812 372.984375 593.75 369.671875 L 593.75 328.375 C 593.75 319.742188 586.757812 312.75 578.125 312.75 L 484.375 312.75 C 475.742188 312.75 468.75 319.742188 468.75 328.375 L 468.75 369.671875 C 458.492188 372.984375 448.511719 377.109375 438.90625 382.015625 L 409.722656 352.828125 C 403.617188 346.734375 393.730469 346.734375 387.625 352.828125 L 321.328125 419.125 C 315.234375 425.230469 315.234375 435.117188 321.328125 441.222656 L 350.515625 470.40625 C 349.210938 472.964844 347.953125 475.53125 346.765625 478.125 C 343.46875 485.328125 340.601562 492.710938 338.171875 500.25 L 296.875 500.25 C 288.242188 500.25 281.25 507.242188 281.25 515.875 L 281.25 609.625 C 281.25 618.257812 288.242188 625.25 296.875 625.25 L 338.171875 625.25 C 341.480469 635.515625 345.605469 645.503906 350.53125 655.09375 L 321.328125 684.277344 C 315.234375 690.382812 315.234375 700.269531 321.328125 706.375 L 387.625 772.671875 C 393.730469 778.765625 403.617188 778.765625 409.722656 772.671875 L 438.90625 743.484375 C 448.511719 748.390625 458.492188 752.515625 468.75 755.828125 L 468.75 797.125 C 468.75 805.757812 475.742188 812.75 484.375 812.75 L 578.125 812.75 C 586.757812 812.75 593.75 805.757812 593.75 797.125 L 593.75 755.828125 C 604.007812 752.515625 613.988281 748.390625 623.59375 743.484375 L 652.777344 772.671875 C 658.882812 778.765625 668.769531 778.765625 674.875 772.671875 L 741.171875 706.375 C 747.265625 700.269531 747.265625 690.382812 741.171875 684.277344 L 711.96875 655.09375 C 716.894531 645.503906 721.019531 635.515625 724.328125 625.25 L 765.625 625.25 C 774.257812 625.25 781.25 618.257812 781.25 609.625 Z M 750 594 L 712.59375 594 C 705.46875 594 699.25 598.824219 697.46875 605.71875 C 693.476562 621.226562 687.324219 636.109375 679.1875 649.90625 C 675.566406 656.039062 676.5625 663.851562 681.59375 668.890625 L 708.011719 695.324219 L 663.824219 739.53125 L 637.390625 713.09375 C 632.347656 708.054688 624.535156 707.0625 618.398438 710.6875 C 604.601562 718.824219 589.726562 724.980469 574.21875 728.96875 C 567.324219 730.75 562.5 736.96875 562.5 744.09375 L 562.5 781.5 L 500 781.5 L 500 744.09375 C 500 736.96875 495.175781 730.75 488.28125 728.96875 C 472.773438 724.980469 457.898438 718.824219 444.101562 710.6875 C 437.964844 707.0625 430.152344 708.054688 425.109375 713.09375 L 398.675781 739.53125 L 354.488281 695.324219 L 380.90625 668.890625 C 385.9375 663.851562 386.933594 656.039062 383.3125 649.90625 C 375.175781 636.109375 369.023438 621.226562 365.03125 605.71875 C 363.25 598.824219 357.03125 594 349.90625 594 L 312.5 594 L 312.5 531.5 L 349.90625 531.5 C 357.03125 531.5 363.25 526.675781 365.03125 519.78125 C 367.554688 509.945312 370.957031 500.367188 375.191406 491.144531 C 377.632812 485.796875 380.34375 480.582031 383.3125 475.519531 C 386.921875 469.382812 385.933594 461.582031 380.90625 456.546875 L 354.488281 430.113281 L 398.675781 385.90625 L 425.109375 412.351562 C 430.152344 417.390625 437.964844 418.375 444.101562 414.746094 C 457.898438 406.617188 472.773438 400.453125 488.28125 396.464844 C 495.175781 394.6875 500 388.460938 500 381.347656 L 500 344 L 562.5 344 L 562.5 381.40625 C 562.5 388.53125 567.324219 394.75 574.21875 396.53125 C 589.726562 400.519531 604.601562 406.675781 618.398438 414.8125 C 624.535156 418.4375 632.347656 417.445312 637.390625 412.40625 L 663.824219 385.96875 L 708.011719 430.175781 L 681.59375 456.609375 C 676.5625 461.648438 675.566406 469.460938 679.1875 475.59375 C 687.324219 489.390625 693.476562 504.273438 697.46875 519.78125 C 699.25 526.675781 705.46875 531.5 712.59375 531.5 L 750 531.5 Z M 750 594 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
							<path d="M 781.25 781.5 L 875 781.5 L 875 812.75 L 781.25 812.75 Z M 781.25 781.5 " style=" stroke:none;fill-rule:nonzero;fill:rgb(0%,0%,0%);fill-opacity:1;" />
						</g>
					</svg>
					Features
				</a> 	
			</li>			
			<li class="" id="fabric">
				<a href="#" data-target="id-6">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 302 302" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 302 302">
						<path d="m298.995,197.304l-17.103-17.104 17.18-17.179c1.875-1.875 2.929-4.419 2.929-7.071 0-2.652-1.054-5.195-2.929-7.071l-17.18-17.18 16.211-16.211c3.905-3.905 3.905-10.237 0-14.143l-36.376-36.375c-3.906-3.904-10.236-3.904-14.143,0l-16.211,16.211-10.126-10.126 13.553-13.554c3.905-3.905 3.905-10.237 0-14.143l-36.376-36.375c-1.876-1.875-4.419-2.929-7.071-2.929-2.652,0-5.196,1.054-7.071,2.929l-16.21,16.211-17.18-17.179c-3.906-3.904-10.236-3.904-14.143,0l-17.179,17.179-17.591-17.592c-1.876-1.875-4.419-2.929-7.071-2.929-2.652,0-5.196,1.054-7.071,2.929l-17.179,17.18-15.799-15.799c-3.906-3.904-10.236-3.904-14.143-8.88178e-16l-36.106,36.106c-3.905,3.905-3.905,10.237 8.88178e-16,14.143l15.798,15.798-17.479,17.48c-3.905,3.905-3.905,10.237 1.33227e-15,14.143l17.591,17.591-17.149,17.148c-3.905,3.905-3.905,10.237 1.33227e-15,14.143l17.18,17.18-16.211,16.21c-3.905,3.905-3.905,10.237 0,14.143l36.376,36.376c3.906,3.904 10.236,3.904 14.143,0l16.211-16.211 10.127,10.126-13.553,13.553c-3.905,3.905-3.905,10.237 0,14.143l36.376,36.376c3.906,3.904 10.236,3.904 14.143,0l16.211-16.211 17.179,17.179c1.953,1.952 4.512,2.929 7.071,2.929 2.559,0 5.118-0.977 7.071-2.929l17.148-17.148 17.104,17.104c3.906,3.904 10.236,3.904 14.143,0l17.479-17.48 16.585,16.585c3.906,3.904 10.236,3.905 14.143,0l36.107-36.105c1.875-1.875 2.929-4.419 2.929-7.071 0-2.652-1.054-5.195-2.929-7.071l-16.586-16.585 17.18-17.18c3.903-3.907 3.903-10.239-0.003-14.144zm-44.339-111.12l22.233,22.233-13.076,13.076h-22.66v-21.806l13.503-13.503zm-152.723,132.311l-14.045-14.045 14.456-14.456h21.807v28.501h-22.218zm70.719-97.002h-28.501v-22.631l14.06-14.06 14.441,14.442v22.249zm0,20v28.501h-28.501v-28.501h28.501zm-48.501-20h-21.679l-13.346-13.346 21.964-21.964 13.061,13.061v22.249zm-22.63,20h22.63v28.501h-22.28l-14.427-14.426 14.077-14.075zm42.63,48.501h28.501v28.501h-28.501v-28.501zm48.501,0h28.501v28.501h-28.501v-28.501zm0-20v-28.501h28.501v28.501h-28.501zm0-48.501v-21.806l14.472-14.472 14.029,14.03v22.248h-28.501zm-144.865,94.737l-22.233-22.233 16.211-16.211c3.905-3.905 3.905-10.237 0-14.143l-17.18-17.18 17.148-17.148c3.905-3.905 3.905-10.237 0-14.143l-17.59-17.591 17.479-17.479c3.905-3.905 3.905-10.237 0-14.142l-15.799-15.8 21.964-21.964 15.799,15.799c1.876,1.875 4.419,2.929 7.071,2.929 2.652,0 5.196-1.054 7.071-2.929l17.179-17.18 17.592,17.592c3.906,3.904 10.236,3.904 14.143,0l17.179-17.18 17.179,17.18c1.876,1.875 4.419,2.929 7.071,2.929 2.652,0 5.196-1.054 7.071-2.929l16.21-16.211 22.233,22.233-30.714,30.751-17.591-17.592c-1.875-1.875-4.419-2.929-7.071-2.929-2.652,0-5.195,1.054-7.071,2.929l-17.18,17.18-15.797-15.798c-1.875-1.875-4.419-2.929-7.071-2.929-2.652,0-5.196,1.054-7.071,2.929l-36.106,36.106c-3.905,3.905-3.905,10.237 0,14.143l15.799,15.799-17.48,17.479c-1.875,1.875-2.929,4.419-2.929,7.071 0,2.652 1.054,5.196 2.929,7.071l17.592,17.591-36.037,36zm63.303,57.987l-22.233-22.233 13.488-13.488h21.806v22.661l-13.061,13.06zm47.532,.968l-14.472-14.472v-22.218h28.501v22.66l-14.029,14.03zm48.395-.045l-14.365-14.365v-22.279h28.501v22.509l-14.136,14.135zm48.207-.894l-14.071-14.072v-21.679h22.248l13.787,13.787-21.964,21.964zm8.438-55.751h-22.51v-28.501h22.248l14.382,14.381-14.12,14.12zm.151-48.501h-22.66v-28.501h22.248l14.457,14.457-14.045,14.044z"/>
					</svg>
					Fabric
				</a> 	
			</li>
			<li class="" id="size-quantity">
				<a href="#" data-target="id-7">
					<i class="fas fa-pencil-ruler"></i>
					Size and Quantity
				</a> 	
			</li>
			<li class="" id="finalization">
				<a href="#" data-target="id-8">
					<i class="fas fa-check"></i>
					Finalization
				</a> 	
			</li>
			<li class="shop_cart" id="cart">
				<a href="#" data-target="id-9">
					<i class="fas fa-shopping-cart"></i>
					Add to cart
				</a> 	
			</li>
		</ul>
		</div>
	</aside>
	<div class="catdes">
	<?php 
		$taxonomies = array( 
			'product_cat',
		);
		$args = array(
			'parent'         => 167, //custom products category ID
			'hide_empty' => true,
		); 
		$terms = get_terms($taxonomies, $args);
		foreach ( $terms as $term ) {
	?>
			<div class="description-pop <?php echo $term->slug;?>" style="display:none">
				<h5><?php echo $term->name;?></h5>
				<p><?php echo $term->description;?></p>
			</div>	
	<?php } ?>
	</div>
<div class="customize-content">
	<div class="loader" style="display:none;"> <img src="https://breelynuniforms.com.au/wp-content/themes/breelyn/customproducts/images/loader.gif" > <span>Loading...	</span> </div>
	<a href="javascript:void(0);" class="cross"><img src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/images/cross.png" alt="#"></a>
	<div id="id-1" class="content default-skin demo scrollable customize-content-show">
		<div id="data"></div>
		<ul class="garments-list">
			<?php 
				$taxonomies = array( 
				'product_cat',
				);
				$args = array(
				'parent'         => 81, //custom products category ID
				'hide_empty' => true,
				); 
				$terms = get_terms($taxonomies, $args);
				foreach ( $terms as $term ) {
					// get the thumbnail id using the queried category term_id
					$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ); 
					// get the image URL
					$image = wp_get_attachment_url( $thumbnail_id ); 
					
				?>
				<li class="eachcat pro-<?php echo $term->term_id; ?>" data-slug="<?php echo $term->slug;?>" data-proid="<?php echo $term->term_id;?>" data-cat-name="<?php echo strtolower($term->name); ?>">
					<a href="<?php echo get_term_link( $term ) ?>">
						<img src="<?php echo $image; ?>" alt="#">
						<span class="title"><?php echo $term->name; ?></span>
					</a>
				</li>
				<?php 
				}
			?>
		</ul>
	</div> 
	<div id="id-2" class="content default-skin demo scrollable">
		<div class="inner-loader"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/inner-loader.gif" alt="ajaxloader"></div>
		<div class="back"><a href="javascript:void(0);"><i class="fa fa-arrow-left"></i> Back </a></div>
		<ul class="design-list">
		</ul>
        <div class="color-picker-container colorpicker cuscolorpicker">
		</div>
	</div>
	
	<div id="id-3" class="content logo-section default-skin demo scrollable all-pre-cus-logo">
			<h6>Logos for front</h6>
			<!--<ul class="logo-list">
				<?php
		            $customlogos = new WP_Query( 
		              array(
		                'post_type' => 'logo-collections',
		                'posts_per_page' => -1
		                )
		            ); 
	          	?>
          		<?php if ( $customlogos->have_posts() ) { while ( $customlogos-> have_posts()) { $customlogos-> the_post(); ?>
				<li>
					<?php if( has_post_thumbnail() ){ ?>
					<a href="javascript:void(0)">
						<img data-logo-price="12" class="img-polaroid" data-logo-name="<?php the_title(); ?>" src="<?php echo the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
					</a>
					<?php } ?>
				</li>
				<?php } ?>
             	<?php wp_reset_query(); } else { ?>
					<p style="text-align: center; color: #fff;">No Logos. Please upload one.</p>
             	<?php } ?>
			</ul> -->
			<ul class="custom-logo-list">
			</ul>
			<div class="uploadimgsec">
				Browse to upload
				<form method='post'>
					<input type='file' id='user-file' name="user-file">
					<!--<input type='submit' name='Submit' class='default-btn'>-->
					<p ><small>We support .png, .jpg, .jpeg, .bmp and .pdf &lt; 10 mb</small></p>
				</form>
			</div>
			<!-- <a href="javascript:void(0);" class="body-front-btn activating-btn">Activate body front logo</a> -->	
            <div class="divider"></div>
			<h6>Logos for back</h6>
				<!--logo for back side-->
			<!-- <ul class="logo-list-back">
					<?php
			            $customlogos = new WP_Query( 
			              array(
			                'post_type' => 'logo-collections',
			                'posts_per_page' => -1
			                )
			            ); 
		          	?>
	          		<?php if ( $customlogos->have_posts() ) { while ( $customlogos-> have_posts()) { $customlogos-> the_post(); ?>
						<li>
							<?php if( has_post_thumbnail() ){ ?>
							<a href="javascript:void(0)">
								<img data-logo-price="12" class="img-polaroid-back" data-logo-name="<?php the_title(); ?>" src="<?php echo the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">
							</a>
							<?php } ?>
						</li>
					<?php } ?>
	             	<?php wp_reset_query(); } else { ?>
						<p style="text-align: center; color: #fff;">No Logos. Please upload one.</p>
	             	<?php } ?>
			</ul> -->
			<!-- <h6 class="custom-logo-head"><small>Custom Logo</small></h6> -->
			<ul class="custom-logo-list-back">
			</ul>
			<div class="uploadimgsec-back">
    			Browse to upload
			   	<form method='post'>
					<input type='file' id='user-file-back' name="user-file-back">
					<!--<input type='submit' name='Submit' class='default-btn'>-->
					<p ><small>We support .png, .jpg, .jpeg, .bmp and .pdf &lt; 10 mb</small></p>
				</form>
			</div>
			<!-- <a href="javascript:void(0);" class="body-back-btn activating-btn">Activate body back logo</a> -->
			<div class="divider"></div>
			<h6>Logos for left sleeve</h6>
			<ul class="custom-logo-list-Lsleeve">
			</ul>
			<div class="leftSleeveLogo">
				Browse to upload
				<form method='post'>
					<input type='file' id='user-file-Lsleeve' name="user-file-Lsleeve">
					<p ><small>We support .png, .jpg, .jpeg, .bmp and .pdf &lt; 10 mb</small></p>
				</form>
			</div>
			<div class="divider"></div>
			<h6>Logos for right sleeve</h6>
			<ul class="custom-logo-list-Rsleeve">
			</ul>
			<div class="rightSleeveLogo">
				Browse to upload
				<form method='post'>
					<input type='file' id='user-file-Rsleeve' name="user-file-Rsleeve">
					<!--<input type='submit' name='Submit' class='default-btn'>-->
					<p ><small>We support .png, .jpg, .jpeg, .bmp and .pdf &lt; 10 mb</small></p>
				</form>
			</div>
			<!-- <a href="javascript:void(0);" class="remove-Rlogo activating-btn">Activate right sleeve logo</a> -->
	</div>
	<div id="id-4" class="content text-section default-skin demo scrollable">
		<h6>Text for front</h6>
		<ul class="name-list">
			<li class="text-preview"><span style="font-family: impact;"></span></li>
			<li>
				<input type="hidden" class="hidden">
				<input id="text-string" type="text" name="name" placeholder="Type your text"> <button id="add-text" class="btn assign" title="Add text" disabled="disabled"><i class="fa fa-share"></i></button>
			</li>
			<li>
				<button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Style"><!-- <i class="fa fa-font"></i> --> <span class="defined-font">Select Font</span> <i class="fas fa-angle-down"></i></button>	<?php $arr = array(); ?>
				<?php 
					$font_name = get_field('font_name'); 
					$fonts = explode(",",$font_name);
				?>	                      
				<?php if( count($fonts) > 0 ): ?>
				<ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
				  <?php foreach( $fonts as $font ): ?>	
					<li>
						<a tabindex="-1" href="#" onclick="setFont('<?php echo $font; ?>');" class="<?php echo $font; ?>" data-family="<?php echo $font; ?>"><?php echo $font; ?></a>
					</li>
				  <?php endforeach; ?>	
				</ul>
				<?php endif; ?>
			</li>
			<li>
				<input type="text" class="form-control grabdata fntclr" placeholder="Select Color" value="#ffffff">
				<div class="colorPickSelectorfont"></div>
			</li>
		</ul>
		<div class="divider"></div>
		<!--back side text add-->
		<h6>Text for Back</h6>
		<ul class="name-list">
			<li class="text-preview"><span style="font-family: impact;"></span></li>
			<li>
				<input type="hidden" class="hidden">
				<input id="text-string-back" type="text" name="name" placeholder="Type your text"> <button id="add-text-back" class="btn assign" title="Add text" disabled="disabled"><i class="fa fa-share"></i></button>	
			</li>
			<li>
				<button id="font-family-back" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Style"><!-- <i class="fa fa-font"></i> --> <span class="defined-font">Select Font</span> <i class="fas fa-angle-down"></i></button>
				<?php 
					$font_name = get_field('font_name'); 
					$fonts = explode(",",$font_name);
				?>	                      
				<?php if( count($fonts) > 0 ): ?>
				<ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
				  <?php foreach( $fonts as $font ): ?>
					<li>
						<a tabindex="-1" href="#" onclick="setFontback('<?php echo $font; ?>');" class="<?php echo $font; ?>" data-family="<?php echo $font; ?>"><?php echo $font; ?></a>
					</li>
				  <?php endforeach; ?>
				</ul>
				<?php endif; ?>		                      
			</li>
			<li>
				<input type="hidden" class="hidden">
				<input type="text" class="form-control grabdata fntclrback" placeholder="Select Color" value="#ffffff"> <div class="colorPickSelectorfontback"></div>
			</li>
		</ul>
	</div>  
	<div id="id-5" class="content text-section">
		<h6>Pocket</h6>
		<div class="custom-pocket-list">
			<div><label><input data-price="2.2" type="radio" value="pocket-left" name="pocket"> Add pocket to left chest <span> ( +$2.2 each ) </span> </label></div>
			<div><label><input data-price="2.2" type="radio" value="pocket-right" name="pocket"> Add pocket to Right chest <span> ( +$2.2 each ) </span> </label></div>
			<div><label><input data-price="0" type="radio" value="no-pocket" name="pocket" checked> No Pocket  </label></div>
		</div>
	</div>
	<div id="id-6" class="content fabric-section text-section">

		<input type="hidden" id="fabric-details">
		<div class="fabric_polo_type">
		<!--<h6>Fabric for Polo Shirt and Tee Shirt</h6>-->
		<h6>Fabric for Polo Shirt</h6>
		<select name="fabric_polo" id="fabric_polo" class="fabric_type_selcet" >
			<option value=""> Choose fabric </option>
			<option value="Sun Smart UPF50+ 165gsm 100% Polyester Micro Mesh Birds Eye (SS)">Sun Smart UPF50+ 165gsm 100% Polyester Micro Mesh Birds Eye (SS)</option>
			<option value="160gsm 100% Polyester Mini Waffle (L)">160gsm 100% Polyester Mini Waffle (L)</option>
			<option value="180gsm 3rd Gen. Cotton Back Polyester (D)">180gsm 3rd Gen. Cotton Back Polyester (D)</option>
		</select>
		<div class="divider"></div>
		</div>
		
		<div class="fabric_hoodie_type">
		<!--<h6>Fabric For Hoodie and Jumper</h6>-->
		<h6>Fabric For Hoodie</h6>
		<select name="fabric_hoodie" id="fabric_hoodie" class="fabric_type_selcet">
			<option value=""> Choose fabric </option>
			<option value="280gsm 100% Polyester Brushed Fleecy">280gsm 100% Polyester Brushed Fleecy</option>
		</select>
			<div class="divider"></div>
		</div>
	
		<div class="fabric_round_nack_type">
		<!--<h6>Fabric for Ladies Tunic Top</h6>-->
		<h6>Fabric</h6>
		<select name="fabric_round_nack" id="fabric_round_nack" class="fabric_type_selcet">
			<option value=""> Choose fabric </option>
			<?php

					if( have_rows('style') ):
					    while ( have_rows('style') ) : the_row();
					        $fabric_rawOptions = get_sub_field('fabric_layout');
					        // Do something...
					    endwhile;
					else :
					    // no rows found
					endif;
						
					$fabrics = explode(",",$fabric_rawOptions);

					foreach ($fabrics as $key => $value) {
						echo '<option value="'. $value .'">'. $value .'</option>';
					}

			?>
			
			
		</select>
		<div class="divider"></div>
		</div>
	</div>
	<div id="id-7" class="content text-section size-section">
		<h6 class="accordion active">Adult Size <i class="fas fa-angle-down"></i></h6>
		<div class="panel show">
			<ul class="size">
				<li><p>XS</p><input type="number" min="0" class="input_size_quantity" data-id="XS" id="XS_quantity" value="0"></li>
				<li><p>S</p><input type="number" min="0" class="input_size_quantity" data-id="S" id="S_quantity" value="0"></li>
				<li><p>M</p><input type="number" min="0" class="input_size_quantity" data-id="M"  id="M_quantity" value="0"></li>
				<li><p>L</p><input type="number" min="0" class="input_size_quantity" data-id="L" id="L_quantity" value="0"></li>
				<li><p>XL</p><input type="number" min="0" class="input_size_quantity" data-id="XL" id="XL_quantity" value="0"></li>
				<li><p>2XL</p><input type="number" min="0" class="input_size_quantity" data-id="2XL" id="2XL_quantity" value="0"></li>
				<li><p>3XL</p><input type="number" min="0" class="input_size_quantity" data-id="3XL" id="3XL_quantity" value="0"></li>
				<li><p>4XL</p><input type="number" min="0" class="input_size_quantity" data-id="4XL" id="4XL_quantity" value="0"></li>
				<li><p>5XL</p><input type="number" min="0" class="input_size_quantity" data-id="5XL" id="5XL_quantity" value="0"></li>
			</ul>
		</div>
		<input type="hidden" id="size_quantity_int" value="0" />
		<div class="hideSizes">
			<h6 class="accordion">Lady Size <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<ul class="size">
					<li><p>6</p><input type="number" min="0" class="input_ladysize_quantity" data-id="6"  value="0"></li>
					<li><p>8</p><input type="number" min="0" class="input_ladysize_quantity" data-id="8"  value="0"></li>
					<li><p>10</p><input type="number" min="0"  class="input_ladysize_quantity" data-id="10"  value="0"></li>
					<li><p>12</p><input type="number" min="0"  class="input_ladysize_quantity" data-id="12"  value="0"></li>
					<li><p>14</p><input type="number" min="0"  class="input_ladysize_quantity" data-id="14"  value="0"></li>
					<li><p>16</p><input type="number" min="0" class="input_ladysize_quantity" data-id="16"   value="0"></li>
					<li><p>18</p><input type="number" min="0"  class="input_ladysize_quantity" data-id="18"  value="0"></li>
					<li><p>20</p><input type="number" min="0"  class="input_ladysize_quantity" data-id="20"  value="0"></li>
					<li><p>22</p><input type="number" min="0" class="input_ladysize_quantity" data-id="22"   value="0"></li>
					<li><p>24</p><input type="number" min="0"  class="input_ladysize_quantity" data-id="24"  value="0"></li>
				</ul>
				<input type="hidden" id="ladysize_quantity_int" value="0" />
			</div>
			<h6 class="accordion">Youth Size <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<ul class="size">
					<li><p>4</p><input type="number" min="0"  class="input_youthsize_quantity" data-id="4"  value="0"></li>
					<li><p>6</p><input type="number" min="0"  class="input_youthsize_quantity" data-id="6"  value="0"></li>
					<li><p>8</p><input type="number" min="0"  class="input_youthsize_quantity" data-id="8"  value="0"></li>
					<li><p>10</p><input type="number" min="0"  class="input_youthsize_quantity" data-id="10"  value="0"></li>
					<li><p>12</p><input type="number" min="0"  class="input_youthsize_quantity" data-id="12"   value="0"></li>
					<li><p>14</p><input type="number" min="0"  class="input_youthsize_quantity" data-id="14"  value="0"></li>
					<li><p>16</p><input type="number" min="0"  class="input_youthsize_quantity" data-id="16"  value="0"></li>
				</ul>
				<input type="hidden" id="youthsize_quantity_int" value="0" />
			</div>
		</div>	
	</div>
	<div id="id-8" class="content text-section">
		<h6>Finalization</h6>
			<div class="inner-loader" id="finalization_section" style="display: none;">
				<img src="//breelynuniforms.com.au/wp-content/themes/breelyn/customproducts/images/inner-loader.gif" alt="ajaxloader">
			</div>		
		<h6 class="accordion">Category <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<p class="selected_category"></p>
			</div>
		<h6 class="accordion">Designs <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<p class="selected_design"></p>
				<p class="selected_mainbody"></p>
				<p class="selected_body_upper"></p>
				<p class="selected_body_lower"></p>
				<p class="selected_side_body"></p>
				<p class="selected_zigzag1"></p>
				<p class="selected_zigzag2"></p>
				<p class="selected_zigzag3"></p>
				<p class="selected_sleeve_by_color"></p>
				<p class="selected_plaket_inner"></p>
				<p class="selected_collar"></p>
				<p class="selected_collar_by_color"></p>
				<p class="selected_plaket_front"></p>
				<p class="selected_button"></p>
				<p class="selected_string"></p>
				<p class="selected_elastic"></p>	
			</div>		
		<h6 class="accordion">Logos <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<p class="selected_logos_for_front"></p>
				<p class="selected_logos_for_back"></p>
				<p class="selected_logos_for_left_sleeve"></p>
				<p class="selected_logos_for_right_sleeve"></p>
			</div>			
		<h6 class="accordion">Name & Number <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<h6>TEXT FOR FRONT</h6>
					<p class="selected_front_text"></p>
					<p class="selected_front_color"></p>
					<p class="selected_front_style"></p>
				<h6>TEXT FOR BACK</h6>
					<p class="selected_back_text"></p>
					<p class="selected_back_text_color"></p>
					<p class="selected_back_font_style"></p>
			</div>

		<h6 class="accordion">Features <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<p class="selected_features"></p>	
			</div>	
		<h6 class="accordion">Fabric <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<p class="selected_fabric_type"></p>	
			</div>	
		
		<!-- <h6 class="accordion">Size and Quantity <i class="fas fa-angle-down"></i></h6>
		<div class="panel">
			<h6>ADULT SIZE</h6>
				<p class="selected_adult_size"></p>
			<h6>LADY SIZE</h6>
				<p class="selected_lady_size"></p>
			<h6>YOUTH SIZE</h6>
				<p class="selected_youth_size"></p>
		</div>		 -->
		<h6 class="accordion">Quantity <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<p class="selected_total_quantity"></p>
			</div>	
		<h6 class="accordion">Total Price <i class="fas fa-angle-down"></i></h6>
			<div class="panel">
				<p class="selected_total_price"></p>
			</div>
				
	</div>
	</div>

</section>
<div id="popups">
	<a href="javascript:void(0);" class="close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/images/cross-black.png" alt="#"></a>
	<div class="popupbody">
	</div>
</div>
<div class="popoverlay"></div>
<!-- Modal -->
  <div class="modal fade" id="image_tooltip" role="dialog">
    <div class="modal-dialog">   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <p> Please click on your uploaded image to add</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
     
    </div>
  </div>
<?php 
	get_footer( 'custom' );
?>

<?php $arr = array(); ?>
<?php 
	$font_name = get_field('font_name'); 
	$arr = explode(",",$font_name);
?>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
<script>
  var fonts = <?php echo json_encode($arr); ?>;
  //console.log("hi",fonts);
  WebFont.load({
    google: {
      families: fonts
    },
  });
</script>
<!-- ********************************************************** -->
<!-- VARIABLES -->
<!-- ********************************************************** -->
<script>
	var onlyClicked = 0;
	var all_Customized_Options = {
		category: '',
		design:'',
		main_body: '',
		side_body: '',
		collar: '',
		logo_front: [],
		logo_back: [],
		logo_lSleeve: [],
		logo_rSleeve: [],
		front_text:'',
		front_text_font:'',
		front_text_color:'',
		back_text:'',
		back_text_font:'',
		back_text_color:'',
		pocket:'',
		fabric:'',
		qty:'',

	}
	var main_customize_area = jQuery( ".main_customize_area" );
	var garments_list = jQuery('.garments-list');
	var design_list = jQuery('.design-list');	
	var selected_category = { name : '', slug: '', id: '' };
	var selected_design = { name : '', price: '', id: '', layer: '', layernames: [] };
	var custom_colorpicker = jQuery('.cuscolorpicker');
	var inner_loader = jQuery('.inner-loader');
	var target_images = jQuery('.target-images');
	var w = jQuery('canvas').width();
	var h = jQuery('canvas').height();
	var wcenter =w/2;
	var hcenter=h/3.5;
	var hscenter=h/4.2;
	var wrcenter=w/1.3;
	var txtcenterL = w/2.5;
	var txtcenterR = w/1.4;
	var hcentertxt=h/2.5;
	var lSl1 = w-(w-20);
	var lSl2 = w/1.27; 
	var rSl1 = w/1.27;
	var rSl2 = w-(w-20);
	var c1=jQuery('canvas#cc');
	var c2 =jQuery('canvas#c1');
	var c3 =jQuery('canvas#c3');
	var c4 =jQuery('canvas#c4');
	var msg = '';
	var front_logo = jQuery("input[name=user-file]");
	var back_logo = jQuery("input[name=user-file-back]");
	var left_sleeve_logo = jQuery("input[name=user-file-Lsleeve]");
	var right_sleeve_logo = jQuery("input[name=user-file-Rsleeve]");
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var loader = jQuery(".loader");
	var image_tooltip = 	jQuery('#image_tooltip');
	var uploaded_logo_front = '.img-polaroid'; 
	var uploaded_logo_back = '.img-polaroid-back'; 
	var uploaded_logo_lSleeve = '.img-polaroid-Lsleeve';
	var uploaded_logo_rSleeve = '.img-polaroid-Rsleeve';
	var allfontLogos = [];
	var allbackLogos = [];
	var allleftSleeveLogos = [];
	var allrightSleeveLogos = [];
	var add_text_front_btn = jQuery("#add-text");
	var add_text_back_btn = jQuery("#add-text-back");
	var colorPickSelectorfont = jQuery(".colorPickSelectorfont");
	var colorPickSelectorfontback = jQuery(".colorPickSelectorfontback");
	var pocket_option = jQuery('.custom-pocket-list input[type=radio]');
	var priceAdded = false;
	var params_adult = {};


</script>

<!-- ********************************************************** -->
<!-- SELECTING THE CATEGORIES -->
<!-- ********************************************************** -->
<script>
	garments_list.find('>li').on('click',function(){ selectCategories(this) });
	design_list.on('click','li', function(){ selectDesign(this) });

	// upating the final array each time document got clicked
	jQuery(document).on('click',function(){
		setTheOptions()
	});

	// FRONT CANVAS
				
	canvas = new fabric.Canvas('cc', {
		hoverCursor: 'pointer',
		selection: true,
		selectionBorderColor:'blue'
	}, f = fabric.Image.filters);

	canvas.on({
		'object:moving': function(e) {		  	
			e.target.opacity = 0.5;	
			if(e.target.imgFor == "rightSleeve" || e.target.imgFor == "leftSleeve" ){

				if(canvas1.getActiveObject()){

						if(e.target.left > rSl1){

							let curr = e.target.left - rSl1;

							canvas1.getActiveObject().set({		          
											//left: rSl2 - curr,
											//top: e.target.top,
									});
						}else{
							let curr = rSl1 - e.target.left ;
							canvas1.getActiveObject().set({		          
											//left: rSl2 + curr,
											//top: e.target.top,
									});
						}
					
									canvas1.renderAll();
			}
		}

		},
		'object:modified': function(e) {		  	
			e.target.opacity = 1;		
			canvas.renderAll();	
			canvas1.renderAll();	
			initCustomControls();
		},
		'object:selected':onObjectSelected1,
		'selection:cleared':onSelectedCleared1,
		'object:removed': function(object){		
		jQuery( ".calhiden" ).find( "#"+object['target']['id'] ).remove();
		}
	});


// BACK CANVAS

	canvas1 = new fabric.Canvas('c1', {
			hoverCursor: 'pointer',
			selection: true,
			selectionBorderColor:'blue'
	},g = fabric.Image.filters);
	canvas1.setWidth(jQuery('#drawingArea-back').width());
	canvas1.setHeight(jQuery('#drawingArea-back').height());
	canvas1.on({
		'object:moving': function(e) {		  	
			e.target.opacity = 0.5;
			
			if(e.target.imgFor == "rightSleeve" || e.target.imgFor == "leftSleeve" ){

					if(canvas.getActiveObject()){

							if(e.target.left > lSl1){

								let curr = e.target.left - lSl1;

								canvas.getActiveObject().set({		          
												//left: lSl2 - curr,
												//top: e.target.top,
										});
							}else{
								let curr = lSl1 - e.target.left ;
								canvas.getActiveObject().set({		          
												//left: lSl2 + curr,
												//top: e.target.top,
										});
							}
						
										canvas.renderAll();
				}
			}
			
		},
		'object:modified': function(e) {		  	
			e.target.opacity = 1;
			canvas.renderAll();	
			canvas1.renderAll();
			initCustomControls();
		},
		'object:selected':onObjectSelected2,
		'selection:cleared':onSelectedCleared2,
		'object:removed': function(object){
		jQuery( ".calhiden" ).find( "#"+object['target']['id'] ).remove();
		}
	});

//  LEFT SLEEVE

	canvas2 = new fabric.Canvas('c3', {
				hoverCursor: 'pointer',
				selection: true,
				selectionBorderColor:'red'
	},g = fabric.Image.filters);
	canvas2.setWidth(jQuery('#leftSleeve').width());
	canvas2.setHeight(jQuery('#leftSleeve').height());
	canvas2.on({
		'object:moving': function(e) {		  	
			e.target.opacity = 0.5;
		},
		'object:modified': function(e) {		  	
			e.target.opacity = 1;
			initCustomControls();
		},
		'object:selected':onObjectSelected3,
		'selection:cleared':onSelectedCleared3,
		'object:removed': function(object){
		console.warn(object);
		jQuery( ".calhiden" ).find( "#"+object['target']['id'] ).remove();
		}
	});

	// RIGHT SLEEVE

	canvas3 = new fabric.Canvas('c4', {
				hoverCursor: 'pointer',
				selection: true,
				selectionBorderColor:'purple'
	},g = fabric.Image.filters);
	canvas3.setWidth(jQuery('#rightSleeve').width());
	canvas3.setHeight(jQuery('#rightSleeve').height());
	canvas3.on({
		'object:moving': function(e) {		  	
			e.target.opacity = 0.5;
		},
		'object:modified': function(e) {		  	
			e.target.opacity = 1;
			initCustomControls();
		},
		'object:selected':onObjectSelected4,
		'selection:cleared':onSelectedCleared4,
		'object:removed': function(object){
		console.warn(object);
		//console.log('4 ' + object['target']['id']);
		jQuery( ".calhiden" ).find( "#"+object['target']['id'] ).remove();
		}
	});

//  SETTING CONTROLS

fabric.Object.prototype.transparentCorners = false;



// UPLOAD LOGO FRONT

front_logo.change(function(event) {		
		loader.show();		
		let formData = new FormData();

		formData.append('updoc', jQuery('input[type=file]')[0].files[0]);
		formData.append('action', 'questiondatahtml');

		upload_logo(formData, 'front');

});


// UPLOAD LOGO BACK

back_logo.change(function(event) {	

		loader.show();		
		let formData = new FormData();

		formData.append('updocback', jQuery('#user-file-back')[0].files[0]);
		formData.append('action', 'questiondatahtmlback');

		upload_logo(formData, 'back');

});

// UPLOAD LOGO LEFT SLEEVE

left_sleeve_logo.change(function(event) {	

		loader.show();		
		let formData = new FormData();

		formData.append('updocsleeve', jQuery('#user-file-Lsleeve')[0].files[0]);
		formData.append('action', 'questiondatahtmllsleeve');

		upload_logo(formData, 'Lsleeve');


});

// UPLOAD LOGO RIGHT SLEEVE

right_sleeve_logo.change(function(event) {	

	loader.show();		
	let formData = new FormData();

	formData.append('updocssleeve', jQuery('#user-file-Rsleeve')[0].files[0]);
	formData.append('action', 'questiondatahtmlrsleeve');

	upload_logo(formData, 'Rsleeve');

});

// ADD LOGO TO CANVAS FRONT

jQuery(document).on('click',uploaded_logo_front, function(e){	

			let obj2 = canvas.getObjects().length;
			let obj3 = canvas.getObjects().length;

			add_to_form(jQuery(this).attr('src'));

			if(obj3>0){
				jQuery('.remove-Llogo, .body-front-btn').fadeIn(500).css('display','block')
			}

			let logo_name = jQuery(this).attr('data-logo-name');
			let el = e.target;
			let date = new Date();
			let components = [
				date.getYear(),
				date.getMonth(),
				date.getDate(),
				date.getHours(),
				date.getMinutes(),
				date.getSeconds(),
				date.getMilliseconds()
			];
			let d = components.join("");

			/*add hidden field to calculate price and delete price*/
			jQuery('.calhiden').append('<input class="grabdata" type="hidden" name="" value="'+logo_name+'" id="'+d+'">');

			fabric.Image.fromURL(el.src, function(img) {

				img.set({
						id: d,
						left: wcenter,
						top: hcenter,
						originX: 'center',
						originY: 'center',
						name:'leftImg',
						imgFor: 'front'
				});

		    canvas.setActiveObject(img);
		    
				applyFilter(1, new f.RemoveWhite({
			      threshold: $('remove-white-threshold').value,
			      distance: $('remove-white-distance').value
					}));
					
				img.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false});
		        // overwrite the prototype object based
				img.customiseCornerIcons({
						settings: {
								borderColor: 'red',
								cornerSize: 25,
								cornerBackgroundColor: 'red',
								cornerShape: 'circle',
								cornerPadding: 10,
						},
						tl: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
						},
						tr: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize-diagonal.svg',
						},
						bl: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/remove.svg',
						},
						br: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/up.svg',
						},
						ml: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize.svg',
						},
						mt: {
											icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/scaleY.svg',
						},
						mb: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/down.svg',
						},
						// only is hasRotatingPoint is not set to false
						mtr: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
						},
				}, function() {
					canvas.renderAll();
				});
		        
		    img.scaleToWidth(canvas.getWidth()/3.2);
				canvas.add(img);
				
				canvas.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+selected_category.slug+'/shadow/3_3_l.png', canvas.renderAll.bind(canvas),{
						width: canvas.width,
					height: canvas.height
				});

				initCustomControls();
		
			 });
			 


});

// ADD LOGO TO CANVAS BACK

jQuery(document).on("click",uploaded_logo_back, function(e){

		let obj2= canvas1.getObjects().length;
		let obj4= canvas1.getObjects().length;

		add_to_back(jQuery(this).attr('src'));
		
		if(obj4>0){
			jQuery('.body-back-btn, .remove-Rlogo').fadeIn(500).css('display','block')
		}

		let logo_url = $(this).attr('src');
		let logo_name = $(this).attr('data-logo-name');
		let el = e.target;
		let date = new Date();
			let components = [
			date.getYear(),
			date.getMonth(),
			date.getDate(),
			date.getHours(),
			date.getMinutes(),
			date.getSeconds(),
			date.getMilliseconds()
			];
		let d1 = components.join("");
		/*add hidden field to calculate price and delete price*/
		jQuery('.calhiden').append('<input class="grabdata" type="hidden" name="" value="'+logo_name+'" id="'+d1+'">');
		fabric.Image.fromURL(el.src, function(img) {
		img.set({
				id: d1,
				imgFor: 'back',
				left: wcenter,
				top: hcenter,
				 name:'leftImg',
				/*scaleX: 0.2,
				scaleY: 0.2,*/
				originX: 'center',
				originY: 'center',
		});
		canvas1.setActiveObject(img);
	
		applyFilterBack(2, new f.RemoveWhite({
			threshold: $('remove-white-threshold').value,
			distance: $('remove-white-distance').value
		}));
		img.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false});
		// overwrite the prototype object based
			img.customiseCornerIcons({
						settings: {
								borderColor: 'red',
								cornerSize: 25,
								cornerBackgroundColor: 'red',
								cornerShape: 'circle',
								cornerPadding: 10,
						},
						tl: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
						},
						tr: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize-diagonal.svg',
						},
						bl: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/remove.svg',
						},
						br: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/up.svg',
						},
						ml: {
									icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize.svg',
						},
						mb: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/down.svg',
						},
						mt: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/scaleY.svg',
						},
						// only is hasRotatingPoint is not set to false
						mtr: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
						},
				}, function() {
						canvas.renderAll();
			});
			img.scaleToWidth(canvas1.getWidth()/3.2);
			canvas1.add(img);
			canvas1.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+selected_category.slug+'/shadow/3_3_r.png', canvas1.renderAll.bind(canvas1),{
					width: canvas1.width,
			height: canvas1.height
			});
			initCustomControls();
	
	});


});	

// ADD LOGO TO CANVAS LEFT SLEEVE

jQuery(document).on("click",uploaded_logo_lSleeve, function(e){			

			let obj1= canvas.getObjects().length;
			let obj2= canvas1.getObjects().length;

			add_to_left(jQuery(this).attr('src'));

			let logo_url = $(this).attr('src');
			let logo_name = $(this).attr('data-logo-name');
			let el = e.target;
			let date = new Date();
			let components = [
				date.getYear(),
				date.getMonth(),
				date.getDate(),
				date.getHours(),
				date.getMinutes(),
				date.getSeconds(),
				date.getMilliseconds()
			];
				let d2 = components.join("");
				/*add hidden field to calculate price and delete price*/
				jQuery('.calhiden').append('<input class="grabdata" type="hidden" name="" value="'+logo_name+'" id="'+d2+'">');

			let a = fabric.Image.fromURL(el.src, function(img) {
									//canvas2.item(0).selectable = false;
						img.set({
								id: d2,
								left: lSl1,
								imgFor: 'leftSleeve',
								top: hscenter,
								name:'leftImg',
								originX: 'left',
								originY: 'top',
						});
						let lsObject =img.id;
						let last = lsObject.length -1;
						//alert(lsObject);
						canvas.setActiveObject(img);
						applyFilter(1, new f.RemoveWhite({
						threshold: $('remove-white-threshold').value,
						distance: $('remove-white-distance').value
					}));
					img.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false, 'br':false, 'mb': false});
						// overwrite the prototype object based
						img.customiseCornerIcons({
								settings: {
										borderColor: 'red',
										cornerSize: 25,
										cornerBackgroundColor: 'red',
										cornerShape: 'circle',
										cornerPadding: 10,
								},
								tl: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
								},
								tr: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize-diagonal.svg',
								},
								bl: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/remove.svg',
								},
								br: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/up.svg',
								},
								ml: {
											icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize.svg',
								},
								mt: {
													icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/scaleY.svg',
											},
								mb: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/down.svg',
								},
								// only is hasRotatingPoint is not set to false
								mtr: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
								},
						}, function() {
							canvas.renderAll();
						});
						//alert('click');
						img.scaleToWidth(canvas.getWidth()/5.2);
						canvas.add(img);
						canvas.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+selected_category.slug+'/shadow/3_3_l.png', canvas.renderAll.bind(canvas),{
								width: canvas.width,
							height: canvas.height
						});
					
				});
			let b = fabric.Image.fromURL(el.src, function(image) {	
						image.set({
								id: d2,
								left: lSl2,
								top: hscenter,
								imgFor: 'rightSleeve',
								name:'leftImg',
								originX: 'left',
								originY: 'top',
								//selection: false,
								borderColor: 'transparent',
						cornerColor: 'transparent',
						cornerSize: 0,
						});
						let lsObject2 = image.id;
						let last = lsObject2.length -1;
						//alert(lsObject);
						//canvas2.setActiveObject(img);
						canvas1.setActiveObject(image);
						applyFilterBack(2, new f.RemoveWhite({
						threshold: $('remove-white-threshold').value,
						distance: $('remove-white-distance').value
					}));
					image.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false, 'br':false, 'mb': false});
						// overwrite the prototype object based
						image.customiseCornerIcons({
								settings: {
										borderColor: 'red',
										cornerSize: 25,
										cornerBackgroundColor: 'red',
										cornerShape: 'circle',
										cornerPadding: 10,
								},
								tl: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
								},
								tr: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize-diagonal.svg',
								},
								bl: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/remove.svg',
								},
								br: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/up.svg',
								},
					ml: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize.svg',
					},
					mt: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/scaleY.svg',
								},
								mb: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/down.svg',
								},
								// only is hasRotatingPoint is not set to false
								mtr: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
								},
						}, function() {
							canvas1.renderAll();
						});
						//alert('click');
						image.scaleToWidth(canvas1.getWidth()/5.2);
						canvas1.add(image);
						canvas1.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+selected_category.slug+'/shadow/3_3_r.png', canvas1.renderAll.bind(canvas1),{
								width: canvas1.width,
							height: canvas1.height
						});	
						initCustomControls();	
					});
	



});	


// ADD LOGO TO CANVAS RIGHT SLEEVE

jQuery(document).on("click",uploaded_logo_rSleeve, function(e){

		let obj2= canvas1.getObjects().length;
		let obj1= canvas.getObjects().length;

		add_to_right(jQuery(this).attr('src'));

		let logo_url = $(this).attr('src');
		let logo_name = $(this).attr('data-logo-name');
		let el = e.target;
		let date = new Date();
		let components = [
			date.getYear(),
			date.getMonth(),
			date.getDate(),
			date.getHours(),
			date.getMinutes(),
			date.getSeconds(),
			date.getMilliseconds()
		];
		let d3 = components.join("");
			/*add hidden field to calculate price and delete price*/
		jQuery('.calhiden').append('<input class="grabdata" type="hidden" name="" value="'+logo_name+'" id="'+d3+'">');
		
		fabric.Image.fromURL(el.src, function(img) {
				img.set({
						id: d3,
							left: rSl1,
							top: hscenter,
							name:'leftImg',
							imgFor: 'rightSleeve',
							/*scaleX: 0.2,
							scaleY: 0.2,*/
							originX: 'left',
							originY: 'top',
							//selection: false,
							borderColor: 'transparent',
					cornerColor: 'transparent',
					cornerSize: 0,
				});
				let rsObject = img.id;
				let last = rsObject.length -1;
				canvas.setActiveObject(img);
				applyFilter(1, new f.RemoveWhite({
					threshold: $('remove-white-threshold').value,
					distance: $('remove-white-distance').value
				}));

			img.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false, 'br':false, 'mb': false});
					// overwrite the prototype object based
			img.customiseCornerIcons({
							settings: {
									borderColor: 'red',
									cornerSize: 25,
									cornerBackgroundColor: 'red',
									cornerShape: 'circle',
									cornerPadding: 10,
							},
							tl: {
									icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
							},
							tr: {
									icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize-diagonal.svg',
							},
							bl: {
									icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/remove.svg',
							},
							br: {
									icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/up.svg',
							},
							ml: {
										icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize.svg',
							},
							mt: {
												icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/scaleY.svg',
							},
							mb: {
									icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/down.svg',
							},
							// only is hasRotatingPoint is not set to false
							mtr: {
									icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
							},
			}, function() {
						canvas.renderAll();
					});
					//alert('click');
			img.scaleToWidth(canvas.getWidth()/5.2);
			canvas.add(img);
			canvas.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+selected_category.slug+'/shadow/3_3_l.png', canvas.renderAll.bind(canvas),{
							width: canvas.width,
						height: canvas.height
					});			
					
			});
			
		fabric.Image.fromURL(el.src, function(image) {
		image.set({
				id: d3,
					left: rSl2,
					top: hscenter,
					imgFor: 'leftSleeve',
					name:'leftImg',
					/*scaleX: 0.2,
					scaleY: 0.2,*/
					originX: 'left',
					originY: 'top',
					//selection: false,
					borderColor: 'transparent',
			cornerColor: 'transparent',
			cornerSize: 0,
		});
		let rsObject2 = image.id;
		let last = rsObject2.length -1;
		canvas1.setActiveObject(image);
		 applyFilterBack(2, new f.RemoveWhite({
			threshold: $('remove-white-threshold').value,
			distance: $('remove-white-distance').value
		}));

		 image.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false, 'br':false, 'mb': false});
			// overwrite the prototype object based
			image.customiseCornerIcons({
					settings: {
							borderColor: 'red',
							cornerSize: 25,
							cornerBackgroundColor: 'red',
							cornerShape: 'circle',
							cornerPadding: 10,
					},
					tl: {
							icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
					},
					tr: {
							icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize-diagonal.svg',
					},
					bl: {
							icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/remove.svg',
					},
					br: {
							icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/up.svg',
					},
					ml: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize.svg',
					},
					mt: {
							icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/scaleY.svg',
					},
					mb: {
							icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/down.svg',
					},
					// only is hasRotatingPoint is not set to false
					mtr: {
							icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
					},
			}, function() {
				canvas1.renderAll();
			});
			//alert('click');
			image.scaleToWidth(canvas1.getWidth()/5.2);
			canvas1.add(image);
			canvas1.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+selected_category.slug+'/shadow/3_3_r.png', canvas1.renderAll.bind(canvas1),{
					 width: canvas1.width,
				height: canvas1.height
			 });
			 initCustomControls();
		
	});


});	


// ADD TEXT TO FRONT

add_text_front_btn.on('click', function(e){

		var text = jQuery("#text-string").val();
		jQuery('.custom_front_name input').val(text);

		var fntfamily = jQuery(this).parent().siblings('.text-preview').children('span').attr('style');

		var txtColor = jQuery(this).parent().siblings().children('.grabdata').val();


		fntfamily = fntfamily.split(':')[1];
		newfntfamily = fntfamily.split(';')[0];

		var textSample = new fabric.Text(text, {

		left: txtcenterL,
		top: hcentertxt,
		fontFamily: newfntfamily,				
		angle: 0,
		fill: txtColor,
		scaleX: 0.5,
		scaleY: 0.5,
		fontWeight: '',
		hasRotatingPoint:true,
		fontSize:50,
		padding:20,
		name:'leftImg',

		});	
		textSample.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false, 'br':false, 'mb': false});;	
		// overwrite the prototype object based
		textSample.customiseCornerIcons({
			settings: {
					borderColor: 'red',
					cornerSize: 25,
					cornerBackgroundColor: 'red',
					cornerShape: 'circle',
					cornerPadding: 10,
			},
			tl: {
					icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
			},
			tr: {
					icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize-diagonal.svg',
			},
			bl: {
					icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/remove.svg',
			},
			br: {
					icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/up.svg',
			},
			ml: {
						icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize.svg',
			},
			mt: {
								icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/scaleY.svg',
			},
			mb: {
					icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/down.svg',
			},
			// only is hasRotatingPoint is not set to false
			mtr: {
					icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
			},
		}, function() {
		var obj = canvas.getObjects();
		if(obj==='text'){
			canvas.renderAll();
			console.log(obj);
		}
		});
		canvas.add(textSample);	
		canvas.item(canvas.item.length-1).hasRotatingPoint = true;		

});

// ADD TEXT TO BACK

add_text_back_btn.on('click', function(e){
			var text = jQuery("#text-string-back").val();
			jQuery('.custom_back_name input').val(text);
			var fntfamily = jQuery(this).parent().siblings('.text-preview').children('span').attr('style');
			//alert(fntfamily);
			fntfamily = fntfamily.split(':')[1];
			newfntfamily = fntfamily.split(';')[0];
			var txtColor = jQuery(this).parent().siblings().children('.fntclrback').val();
			//alert(newfntfamily);
			var textSample = new fabric.Text(text, {
				//left: fabric.util.getRandomInt(0, 50),
				//top: fabric.util.getRandomInt(0, 50),
				left: txtcenterL,
           		top: hcentertxt,
				fontFamily: newfntfamily,
				angle: 0,
				fill: txtColor,
				scaleX: 0.5,
				scaleY: 0.5,
				fontWeight: '',
				hasRotatingPoint:true,
				fontSize:50,
				padding:20,
				name:'leftImg',
			});	
		textSample.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false, 'br':false, 'mb': false});
        // overwrite the prototype object based
        textSample.customiseCornerIcons({
            settings: {
                borderColor: 'red',
                cornerSize: 25,
                cornerBackgroundColor: 'red',
                cornerShape: 'circle',
                cornerPadding: 10,
            },
            tl: {
                icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
            },
            tr: {
                icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize-diagonal.svg',
            },
            bl: {
                icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/remove.svg',
            },
            br: {
                icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/up.svg',
            },
						ml: {
									icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/resize.svg',
						},
						mt: {
                icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/scaleY.svg',
            },
            mb: {
                icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/down.svg',
            },
            // only is hasRotatingPoint is not set to false
            mtr: {
                icon: '<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/icons/rotate.svg',
            },
        }, function() {
            canvas1.renderAll();
        });
        	console.log(textSample);
			canvas1.add(textSample);	
			canvas1.item(canvas1.item.length-1).hasRotatingPoint = true; 		
		
			
});

// FRONT TEXT FONT COLOR

colorPickSelectorfont.colorPick({
	'initialColor' : '#ffffff',
	'onColorSelected': function() {
		this.element.css({'backgroundColor': this.color, 'color': this.color});
		jQuery(".fntclr").val(this.color);
		jQuery('.custom_front_name_color input').val(this.color);
		var color = this.color;			//alert(color)
		jQuery(this.element).parent().siblings('.text-preview').children('span').css({'color':color});
		//alert('input ' + color);
		var activeObject = getSelection();
		//alert(activeObject);
		if (activeObject && activeObject.type === 'text') {
			activeObject.set({fill: color});
			canvas.renderAll();
		}	
	
	}
});

// BACK TEXT FONT COLOR

colorPickSelectorfontback.colorPick({
	'initialColor' : '#ffffff',
	'onColorSelected': function() {
		this.element.css({'backgroundColor': this.color, 'color': this.color});
		jQuery(".fntclrback").val(this.color);
		jQuery('.custom_back_name_color input').val(this.color);
		var color = this.color;
		jQuery(this.element).parent().siblings('.text-preview').children('span').css('color',color);
		var activeObject = getSelection1();
		//alert(activeObject);
		//console.log('cc ' + activeObject);
		if (activeObject && activeObject.type === 'text') {
			activeObject.set({fill: color});                    
						canvas1.renderAll();				   
		}
		
	}
});

// POCKET OPTION

pocket_option.on('change',function() {
	if(this.checked) {
		var val = jQuery(this).val();
		jQuery(document).find('.custom_pocket_option input').val(val)

		var additonPrice = parseFloat(jQuery(this).attr('data-price'));

		if(val == 'pocket-right' | val == "pocket-left"){
			if(!priceAdded){

				jQuery('.price-area .prices table tr').each(function(){
					
						let price = parseFloat(jQuery(this).attr('data-price'));
						jQuery(this).find('td:last-child').html(jQuery(this).attr('data-symbol')+''+(+price + additonPrice).toFixed(2));
												
										
				});
				priceAdded = true;

			}


		}else{
			if(priceAdded){
				jQuery('.price-area .prices table tr').each(function(){
					
						let price = parseFloat(jQuery(this).attr('data-price'));
						jQuery(this).find('td:last-child').html(jQuery(this).attr('data-symbol')+''+(+price - additonPrice).toFixed(2));							
										
				});
					priceAdded = false;
			}

		}
	}
});

// DELETE ITEM ON KEY PRESS

jQuery('html').keyup(function(e){
    if(e.keyCode == 46) {        
        if(canvas.getActiveObject()) { canvas.getActiveObject().remove(); }
        if(canvas1.getActiveObject()) { canvas1.getActiveObject().remove(); }
    }
});

// SIZE AND qUANTITY SECTION CALCULETION

jQuery( ".input_size_quantity" ).on("click keyup",function(){
	var size_type = jQuery(this).data("id");
	var size_Quantity = jQuery(this).val();
	params_adult[size_type] = size_Quantity;			
	//console.log(params_adult);
	
	//Add Quantity_selection
	var total_adult_quantity = 0;
	var adult_quantity_info ='';
	
	var arrayLength = params_adult.length;
	var in_count =1;
	for(var index in params_adult) {				
			if(params_adult[index]!=0){
				if(in_count ==1){
				total_adult_quantity =  parseInt(params_adult[index]);
				adult_quantity_info = index+':'+params_adult[index];
				}else {
				total_adult_quantity = parseInt(total_adult_quantity )+parseInt( params_adult[index]);
				adult_quantity_info = adult_quantity_info+',' + index+':'+params_adult[index];
				}
			in_count++;
			}
			jQuery('.custom_size_quantity input').val(adult_quantity_info);
			jQuery('#size_quantity_int').val(total_adult_quantity);			 
						
	}
	//cart_total_quantity
	var adult_quantity = jQuery('#size_quantity_int').val();
	var lady_quantity = jQuery('#ladysize_quantity_int').val();
	var youth_quantity = jQuery('#youthsize_quantity_int').val();
	jQuery('.quantity input.qty').val(parseInt(adult_quantity)+parseInt(lady_quantity)+parseInt(youth_quantity));
	
		
	
});

// for particular types febric section

jQuery(".fabric_type_selcet").on("change", function(){	
	var fabrictype = this.value;
	jQuery(".custom_fabric_type input").val(fabrictype);

});

jQuery( "#finalization" ).on("click",function(){
		jQuery( "#finalization_section" ).css('display','block');
			setTimeout(function(){

				 
			
			jQuery('.selected_category').text(jQuery('.variations #category').val());
			jQuery('.selected_design').text(jQuery('.variations #design').val());

			if( jQuery(document).find('select[name = attribute_design]').val() == 'New Strike Design' ){

				if(jQuery('.custom_main_body input').val() !=""){ jQuery('.selected_mainbody').text("Main Body : "+jQuery('.custom_main_body input').val()); }
				if(jQuery('.custom_side_body input').val() !=""){ jQuery('.selected_side_body').text("Pattern 1  : "+jQuery('.custom_side_body input').val()); }
				if(jQuery('.custom_collar input').val() !=""){ jQuery('.selected_collar').text("Pattern 2 : "+jQuery('.custom_collar input').val());}

				if(jQuery('#fabric-details').val() !=""){ jQuery('.selected_fabric_type').text(jQuery('#fabric-details').val()); }

			}else{
			
			if(jQuery('.custom_main_body input').val() !=""){ jQuery('.selected_mainbody').text("Main Body : "+jQuery('.custom_main_body input').val()); }
			if(jQuery('.custom_body_upper input').val() !=""){ jQuery('.selected_body_upper').text("Body Upper Color  : "+jQuery('.custom_body_upper input').val()); }
			if(jQuery('.custom_body_lower input').val() !=""){ jQuery('.selected_body_lower').text("Body Lower Color  : "+jQuery('.custom_body_lower input').val()); }
			if(jQuery('.custom_side_body input').val() !=""){ jQuery('.selected_side_body').text("Side Body Color  : "+jQuery('.custom_side_body input').val()); }
			if(jQuery('.custom_zigzag1 input').val() !=""){ jQuery('.selected_zigzag1').text("Zigzag 1 Color  : "+jQuery('.custom_zigzag1 input').val()); }
			if(jQuery('.custom_zigzag2 input').val() !=""){ jQuery('.selected_zigzag2').text("Zigzag 2 Color : "+jQuery('.custom_zigzag2 input').val());}
			if(jQuery('.custom_zigzag3 input').val() !=""){ jQuery('.selected_zigzag3').text("Zigzag 3 Color : "+jQuery('.custom_zigzag3 input').val());}
			if(jQuery('.custom_sleeve_by_color input').val() !=""){ jQuery('.selected_sleeve_by_color').text("sleeve Color : "+jQuery('.custom_sleeve_by_color input').val());}
			if(jQuery('.custom_collar input').val() !=""){ jQuery('.selected_collar').text("Collar  Color : "+jQuery('.custom_collar input').val());}
			if(jQuery('.custom_collar_by_color input').val() !=""){ jQuery('.selected_collar_by_color').text("Collar by Color : "+jQuery('.custom_collar_by_color input').val());}
			if(jQuery('.custom_plaket_inner input').val() !=""){ jQuery('.selected_plaket_front').text("Plaket Front Color : "+jQuery('.custom_plaket_inner input').val());}
			if(jQuery('.custom_button input').val() !=""){ jQuery('.selected_button').text("Button Color : "+jQuery('.custom_button input').val());}
			if(jQuery('.custom_string input').val() !=""){ jQuery('.selected_string').text("String Color : " +jQuery('.custom_string input').val());}
			if(jQuery('.custom_elastic input').val() !=""){ jQuery('.selected_elastic').text("Elastic Color : "+jQuery('.custom_elastic input').val());}
			
			}
			
			var  font_log = jQuery('.custom_user-file input').val();
			if(font_log !=""){								
			jQuery('.selected_logos_for_front').html('Front Logo : '+set_img(font_log));
			}
			var  back_log = jQuery('.custom_user-file-back input').val();
			if(back_log !=""){
			jQuery('.selected_logos_for_back').html('Back Logo : '+set_img(back_log));
			}
			var  left_sleave_log = jQuery('.custom_user-file-lsleeve input').val();
			if(left_sleave_log !=""){
			jQuery('.selected_logos_for_left_sleeve').html('Left Sleeve Logo : '+set_img(left_sleave_log));
			}
			var  right_sleave_log = jQuery('.custom_user-file-rsleeve input').val();
			if(right_sleave_log !=""){
			jQuery('.selected_logos_for_right_sleeve').html('Right Sleeve Logo : '+set_img(right_sleave_log));
			}

			if(jQuery('.custom_front_name input').val() !=""){ jQuery('.selected_front_text').text("Front Text : "+jQuery('.custom_front_name input').val()); }
			if(jQuery('.custom_front_name_color input').val() !=""){ jQuery('.selected_front_color').text("Front Text Color : "+jQuery('.custom_front_name_color input').val()); }
			if(jQuery('.custom_front_name_style input').val() !=""){ jQuery('.selected_front_style').text("Front Text Style : "+jQuery('.custom_front_name_style input').val()); }
			if(jQuery('.custom_back_name input').val() !=""){ jQuery('.selected_back_text').text("Back Text : "+jQuery('.custom_back_name input').val()); }
			if(jQuery('.custom_back_name_color input').val() !=""){ jQuery('.selected_back_text_color').text("Back Text Color : "+jQuery('.custom_back_name_color input').val()); }
			if(jQuery('.custom_back_name_style input').val() !=""){ jQuery('.selected_back_font_style').text("Back Text Style : "+jQuery('.custom_back_name_style input').val()); }
			if(jQuery('.custom_fabric_type input').val() !=""){ jQuery('.selected_fabric_type').text(jQuery('.custom_fabric_type input').val()); }
			if(jQuery('.custom_size_quantity input').val() !=""){ jQuery('.selected_adult_size').text(jQuery('.custom_size_quantity input').val()); }
			if(jQuery('.custom_lady_size_quantity input').val() !=""){ jQuery('.selected_lady_size').text(jQuery('.custom_lady_size_quantity input').val()); }
			if(jQuery('.custom_youth_size_quantity input').val() !=""){ jQuery('.selected_youth_size').text(jQuery('.custom_youth_size_quantity input').val()); }
			
			if(pocket_option.val() !=""){ jQuery('.selected_features').text(pocket_option.val()); }
			
			
			jQuery('.selected_total_quantity').text(jQuery('.quantity input.qty ').val());
			var tq = parseInt(jQuery('.quantity input.qty ').val());

			jQuery('.price-area .prices table tr').each(function(){
				jQuery(this).removeClass('current_active')
				var q = jQuery(this).attr('data-qty');
				console.log(q)
				if(q != undefined){
					var res = q.split('-');
					if(tq >= parseInt(res[0]) && tq <= parseInt(res[1])){
						jQuery(this).addClass('current_active')
						var p = jQuery(this).find('td:last-child').text();
						var price = parseFloat(p.replace('$',''));
						jQuery('.selected_total_price').text(jQuery(this).attr('data-symbol')+' '+(tq * price).toFixed(2))
					}
				}
				
				
			})

		
			jQuery( "#finalization_section" ).css('display','none');
			

			}, 1500);
});







jQuery('.save').on('click',function(){

		jQuery(this).text('saving');
		var dot = '.';
		var count = 1;
		var interval = setInterval(function(){ 
			count ++;
			if(count > 5){
				dot = '';
				count = 1;
			}
			dot= dot+' .';
			jQuery('.save').html('saving'+dot);
		},1000);

		
		var json_data = JSON.stringify(canvas.toDatalessJSON()); 	
		
		var json_data_2 = JSON.stringify(canvas1.toDatalessJSON()); 

		
	
		var params_savesettingsdata = {};
		//category
		params_savesettingsdata['category'] = jQuery('#category').val();
		//design
		params_savesettingsdata['design'] = jQuery('.variations #design').val();
		params_savesettingsdata['main_body'] = jQuery('.custom_main_body input').val();
		params_savesettingsdata['side_body'] = jQuery('.custom_side_body input').val();
		params_savesettingsdata['collar'] = jQuery('.custom_collar input').val();
		params_savesettingsdata['pattern_1'] = jQuery('.custom_pattern_1 input').val();
		params_savesettingsdata['pattern_2'] = jQuery('.custom_pattern_2 input').val();		
		params_savesettingsdata['pattern_3'] = jQuery('.custom_pattern_3 input').val();


		
		params_savesettingsdata['body_upper'] = jQuery('.custom_body_upper input').val();
		params_savesettingsdata['body_lower'] = jQuery('.custom_body_lower input').val();
		params_savesettingsdata['zigzag1'] = jQuery('.custom_zigzag1 input').val();
		params_savesettingsdata['zigzag2'] = jQuery('.custom_zigzag2 input').val();
		params_savesettingsdata['zigzag3'] = jQuery('.custom_zigzag3 input').val();
		params_savesettingsdata['string'] = jQuery('.custom_string input').val();
		params_savesettingsdata['elastic'] = jQuery('.custom_elastic input').val();
		params_savesettingsdata['sleeve_by_color'] = jQuery('.custom_sleeve_by_color input').val();
		params_savesettingsdata['plaket_inner'] = jQuery('.custom_plaket_inner input').val();
		params_savesettingsdata['collar_by_color'] = jQuery('.custom_collar_by_color input').val();
		params_savesettingsdata['button'] = jQuery('.custom_button input').val();
		//logos
		params_savesettingsdata['user-file'] = jQuery('.custom_user-file input').val();
		params_savesettingsdata['user-file-back'] = jQuery('.custom_user-file-back input').val();
		params_savesettingsdata['user-file-lsleeve'] = jQuery('.custom_user-file-lsleeve input').val();
		params_savesettingsdata['user-file-rsleeve'] = jQuery('.custom_user-file-rsleeve input').val();
		//name & Number
		params_savesettingsdata['front_name'] = jQuery('.custom_front_name input').val();
		params_savesettingsdata['front_name_style'] = jQuery('.custom_front_name_style input').val();
		params_savesettingsdata['front_name_color'] = jQuery('.custom_front_name_color input').val();
		params_savesettingsdata['back_name'] = jQuery('.custom_back_name input').val();
		params_savesettingsdata['back_name_style'] = jQuery('.custom_back_name_style input').val();
		params_savesettingsdata['back_name_color'] = jQuery('.custom_back_name_color input').val();
		//fabric
		params_savesettingsdata['fabric_type'] = jQuery('.custom_fabric_type input').val();
		//size and Quantity
		params_savesettingsdata['size_quantity'] = jQuery('.custom_size_quantity input').val();
		params_savesettingsdata['lady_size_quantity'] = jQuery('.custom_lady_size_quantity input').val();
		params_savesettingsdata['youth_size_quantity'] = jQuery('.custom_youth_size_quantity input').val();
		//cart
		params_savesettingsdata['variation_id'] = jQuery('.variation_id').val();
		params_savesettingsdata['product_id'] = jQuery('.woocommerce-variation-add-to-cart input[name=product_id]').val();
		params_savesettingsdata['product_price'] = jQuery('.product-options-price dd:nth-child(4) span.amount').text();
		params_savesettingsdata['quantity'] = jQuery('input[name=quantity]').val();

		
		console.log(JSON.stringify(params_savesettingsdata));

			setTimeout(function(){

			var element = document.getElementById("item");

			html2canvas(element).then(function(canvas) {
			    // Export the canvas to its data URI representation
			var base64image = canvas.toDataURL("image/png");

			    // Open the image in a new window
			    //jQuery('.actionA').prepend("<img style='width:110px; margin:0 auto 20px auto; ' src="+base64image+">");	    
			   // params_savesettingsdata['currentDesign'] = base64image ;
			 var currentDesign = base64image ;
			 	console.log('json_data');
			 	console.log(json_data);
			 	console.log(json_data_2);
			    jQuery.ajax({
					url : '<?php echo admin_url("admin-ajax.php"); ?>',
					type: "POST",
					dataType: "text",
					data :{
							action:'savesettingsdata',
							setting_varietiondata : params_savesettingsdata,
							//canvas_data_custom: JSON.stringify(json_data),
							canvas_data_custom: json_data,
							canvas_data_custom_2: json_data_2,
							currentDesign : currentDesign
					}, 
					type: 'post',
					success : function( result ) {
					console.log(result);
					if(result){
							clearInterval(interval);
							jQuery('.save').html('Design Saved !');

							setTimeout(function(){
								jQuery('.save').html('Save Again');
							},2000)
						
							 jQuery('.setting_status_message').text('Sucess ! Your settings has been Saved !!!').css('background','#4aec9b').show(0).delay(6000).hide(0);
						}else{
							 jQuery('.setting_status_message').text('Sorry ! No active user find. Please Sign In').css('background','#e41a1a').show(0).delay(6000).hide(0);
						}
					}
				});
			});

			},500);	
		
		
});

jQuery('.restore_savedata').on('click',function(){

	jQuery(this).html('<span>Loading...</span>');
	

	var product_id = '<?php echo get_the_ID();?>';
	jQuery( ".cross" ).trigger( "click" );
	jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", {
			'action': 'savesettingsdata_show',
			'product_id' : product_id
			}, 
			function(rsp){	
				console.log('rep');
				console.log(rsp);			
				jQuery('.restorenow').text(' Restore design');
				//console.log(rsp.raw);
				jQuery('html, body').animate({
			        scrollTop: jQuery('header').height()
			      }, 800);				
				allData = rsp.raw;
				console.log(rsp);
				jQuery('.restore_savedata').html('Restore Design')
				//jQuery( "#live-view" ).hide();
				jQuery('body').addClass('showRestore');
				
				jQuery( ".restorePop .contentA" ).html(rsp.response);
				//jQuery( ".customize" ).html(rsp.response);


				// showing the saved image

				let currenDesign = allData.currentDesign;
				if(jQuery('.actionA').find('.imgW').length > 0){
					jQuery('.actionA').find('.imgW').attr('src',currenDesign);
				}else{
					jQuery('.actionA').prepend("<div class='imgW'><img style='width:-109%; margin:0 auto 20px auto; ' src="+currenDesign+"></div>");
				}
					

			}
	);
});

jQuery(document).on('click','.closePopBtn',function(){
	jQuery('body').removeClass('showRestore');	
	jQuery( ".restorePop .contentA" ).html('');			
});

jQuery(document).on('click','.restorePopBg',function(){
	jQuery('body').removeClass('showRestore');	
	jQuery( ".restorePop .contentA" ).html('');			
});

jQuery(document).on('click', '.restorenow' ,function(){
	
	jQuery(this).text('Restoring...')
	console.log(allData);
	let cat = allData.category.toLowerCase();
	let design = allData.design;	
	jQuery('body').addClass('data_restored');

	if(cat != ''){
		setCat(cat);
	}
	if(design != ''){ 
		setdesign(design);
	}

	
});


// ADD TO CART

jQuery('.single_add_to_cart_button,.shop_cart').click(function(){
	jQuery("#preloader").show();
	jQuery("#status").show();
	jQuery(".variations_form.cart").submit();
});

























































































































// *********************************
// FUNCTIONS
// *********************************




function makeimg(){
	

	var element = document.getElementById("item");

	html2canvas(element).then(function(canvas) {
	    // Export the canvas to its data URI representation
	var base64image = canvas.toDataURL("image/png");

	    // Open the image in a new window
	    //jQuery('.actionA').prepend("<img style='width:110px; margin:0 auto 20px auto; ' src="+base64image+">");	    
	   // params_savesettingsdata['currentDesign'] = base64image ;
	 var currentDesign = base64image ;

	 console.log(base64image)
	  jQuery('body').append("<img style='width:110px; margin:0 auto 20px auto; ' src="+base64image+">");	    	
	    
	});
			
			
}











function selectCategories(item){	
	let current_item = jQuery(item);
	selected_category.name = current_item.attr('data-cat-name');
	selected_category.slug = current_item.attr('data-slug');
	selected_category.id = current_item.attr('data-proid');
	
	// set shadow and images

	setShadowImages();
	
}

function setShadowImages(){	
	let cat_name = selected_category.slug;
	var shadow='';
		shadow +='<img style="position: absolute;z-index: 5;" class="baseshadow1 shadow fluid index5" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/1_1.png" alt="Shadow"><img style="position: absolute;z-index: 1;" class="baseshadow2 shadow fluid index1" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/2_2.png" alt="Ribbons"><img style="position: absolute;z-index: 3;" class="baseshadow3 shadow fluid index3" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png" alt="Lines"><img style="position: absolute;z-index: 1;" class="baseshadow4 shadow fluid index1" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/4_4.png" alt="Lines 2">';
	main_customize_area.find('img.shadow').remove();
	main_customize_area.prepend(shadow);

	// Get desgin list based on the category
	getDesignItems();
		
}

function getDesignItems(){

	var html = '';
	jQuery.ajax({
			url : '<?php echo admin_url("admin-ajax.php"); ?>',
			data :{action:'getselectproductstyle', cat_slug : selected_category.slug}, 
			type: 'post',
			success : function( result ) {
				var design_data = jQuery.parseJSON(result);		
				console.log(design_data)		
				var c=1;
				for (i = 0; i < design_data.length; i++) {
					html += '<li data-imagename="'+design_data[i]['data-imagename']+'" data-pid="'+design_data[i]['products-id']+'" data-price="'+design_data[i]['data-price']+'" data-layer="'+design_data[i]['data-layer']+'" data-layers-name="'+design_data[i]['default']+'" class="design"><a href="#" data-val="'+c+'"><img src="'+design_data[i]['image']+'" alt="#"><span class="design_name title">'+design_data[i]['data-imagename']+'</span></a></li>';
					c++;
				}
				design_list.html(html);
				inner_loader.fadeOut(500);
			}
		});


}


function selectDesign(item){



	let currentItem = jQuery(item);

	let data_layer_name = currentItem.attr('data-layers-name');
	let data_layer_name_array = data_layer_name.split(',');

	selected_design.name = currentItem.attr('data-imagename');
	selected_design.id = currentItem.attr('data-pid');
	selected_design.price = currentItem.attr('data-price');
	selected_design.layer = currentItem.attr('data-layer');	
	selected_design.layernames = data_layer_name_array.map(item=>{
		return item;
	});

	let colorpickerItems ='';

	let imagename = selected_design.name;
	let flder_name = imagename.toLowerCase();
	flder_name = flder_name.replace(/ /g, "_");
	let pro_name = selected_category.slug;
	let targt_html = '';



	var fileName = selected_design.name.toLowerCase().replace(/ /g,'_');

	


	 jQuery.ajax({
            url: "<?php echo get_stylesheet_directory_uri(); ?>/json_files/"+fileName+".txt",
            async: true,
            success: function (data){
              var json_data = JSON.parse(data);
              console.log(json_data);
              allData = json_data;
              
             jQuery(document).find('.cuscolorpicker script').remove();
	
			var data_layer_name_arrays = data_layer_name.toLowerCase().split(' ').join('_').split(',');
			console.log('allData: '+data_layer_name_arrays);
			console.log(allData);
			setTimeout(function(){
			for (var i =1; i <= data_layer_name_arrays.length; i++){
				
				var custom_field_name = data_layer_name_arrays[i-1];		
				var color_name = allData[custom_field_name];

				//if(color_name == ''){ color_name = "#ffffff" };

				 jQuery('.cuscolorpicker').append('<script>jQuery(".colorPickSelector'+i+'").colorPick({"allowRecent": false,"initialColor": "'+ color_name +'","onColorSelected":function() { var color =this.color;jQuery("#cp'+i+'_getcolor").val(color);jQuery(".custom_'+custom_field_name+' .custom-options").val(color).focus().focusout();this.element.css({"backgroundColor": this.color, "color": this.color}); jQuery(".target-image'+i+'").each(function () {this.src = changeIconColor(this, color, "1");});}});<\/script>');

				}
				
				jQuery('#custom-design-area').find('.customize .designLoader').remove();
			},2000);	  

			if(allData.main_body != '') { jQuery('.custom_main_body input').val(allData.main_body); }
			if(allData.side_body != '') { jQuery('.custom_side_body input').val(allData.side_body); }
			if(allData.collar != '') { jQuery('.custom_collar input').val(allData.collar); }

            
			}
        });









	selected_design.layernames.forEach(function(itemData, index){ 
		let current_designLayer = itemData.toLowerCase();
		let custom_field_name = 'custom_'+current_designLayer.split(' ').join('_');
		
		colorpickerItems +='<div class="all-color-data">'+
		'<span class="color-picker-text">'+itemData+'</span>'+
		'<input type="text" id="cp'+(+index+1)+'_getcolor" value="" class="form-control grabdata" placeholder="selected color">'+
		'<div data-field-name="'+custom_field_name+'" class="colorPicker colorPickSelector'+(+index+1)+'"></div>'+
		'<script>jQuery(".colorPickSelector'+(+index+1)+'").colorPick({"allowRecent": true,"initialColor": "#ffffff","onColorSelected":function() { var color =this.color;jQuery("#cp'+(+index+1)+'_getcolor").val(color);jQuery(".'+custom_field_name+' .custom-options").val(color).focus().focusout();this.element.css({"backgroundColor": this.color, "color": this.color}); jQuery(".target-image'+(+index+1)+'").each(function () {this.src = changeIconColor(this, color, "1");});}});<\/script>'+
		'</div>';

		targt_html += '<img style="position: absolute;z-index: 1;" class="fluid shadow index1 target-image'+(+index+1)+'" id="layer40.0" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+pro_name+'/'+flder_name+'/target_images/'+(+index+1)+'.png">';
	});
	custom_colorpicker.html(colorpickerItems);
	target_images.html(targt_html);

	
	
	makeimg();

}

var changeIconColor = (function () {
		
	var canvas = document.createElement("canvas"), // shared instance
	context = canvas.getContext("2d");
	canvas.width = 629;
	canvas.height = 372;
	function desaturate() {
		var imageData = context.getImageData(0, 0, canvas.width, canvas.height),
		pixels = imageData.data,
		i, l, r, g, b, a, average;			
		for (i = 0, l = pixels.length; i < l; i += 4) {
			a = pixels[i + 3];
			if (a === 0) {
				continue;
			} // skip if pixel is transparent			
			r = pixels[i];
			g = pixels[i + 1];
			b = pixels[i + 2];
			average = (r + g + b) / 3 >>> 0; // quick floor
			pixels[i] = pixels[i + 1] = pixels[i + 2] = average;
		}
		context.putImageData(imageData, 0, 0);
	}
	function colorize(color, alpha) {
		context.globalCompositeOperation = "source-atop";
		context.globalAlpha = alpha;
		context.fillStyle = color;
		context.fillRect(0, 0, canvas.width, canvas.height);
		// reset
		context.globalCompositeOperation = "source-over";
		context.globalAlpha = 1.0;
	}
	return function (iconElement, color, alpha) {
		context.clearRect(0, 0, canvas.width, canvas.height);
		context.drawImage(iconElement, 0, 0, canvas.width, canvas.height);
		desaturate();
		colorize(color, alpha);
		return canvas.toDataURL("image/png", 1);
	};
}());

function applyFilter(index, filter) {
	var obj = canvas.getActiveObject();
	obj.filters[index] = filter;
	obj.applyFilters(canvas.renderAll.bind(canvas));
	canvas.renderAll();
}

function applyFilterBack(index, filter) {
	var obj = canvas1.getActiveObject();
	obj.filters[index] = filter;
	obj.applyFilters(canvas1.renderAll.bind(canvas1));
		canvas1.renderAll();
}

function applyFilterLSleeve(index, filter) {
	var obj = canvas2.getActiveObject();
	obj.filters[index] = filter;
	obj.applyFilters(canvas2.renderAll.bind(canvas2));
	canvas2.renderAll();
}

function applyFilterRSleeve(index, filter) {
	var obj = canvas3.getActiveObject();
	//alert(index)
	obj.filters[index] = filter;
	obj.applyFilters(canvas3.renderAll.bind(canvas3));
	canvas3.renderAll();
}	

function onObjectSelected1(e) {
	

	var selectedObject = e.target;
	showToolTop();
	$("#text-string").val("");
	jQuery('.text-preview span').empty();
	selectedObject.hasRotatingPoint = true
	if (selectedObject && selectedObject.type === 'text') {
		if(jQuery(c1)){
			jQuery('#drawingArea canvas').addClass('activeFront');
		}
	}
}

function onObjectSelected2(e) {
	var selectedObject = e.target;
	showToolTop();
	//alert(selectedObject);
	$("#text-string-back").val("");
	jQuery('.text-preview span').empty();
	selectedObject.hasRotatingPoint = true
	if (selectedObject && selectedObject.type === 'text') {
		if(jQuery(c2)){
			jQuery('#drawingArea-back canvas').addClass('activeFront');
		}
	}
}

function onObjectSelected3(e) {
	showToolTop();
	var selectedObject = e.target;
	$("#text-string").val("");
	selectedObject.hasRotatingPoint = true
	var obj = canvas.getObjects().length;
	if(obj>0){
		//jQuery('<button class="activeSleeveLogo">Active right sleeve logo </button> <button class="activebodyLogo">Active back body logo </button>').appendTo('.customize')
	}
}

function onObjectSelected4(e) {
	showToolTop();
	var selectedObject = e.target;
	//alert(selectedObject);
	$("#text-string").val("");
	selectedObject.hasRotatingPoint = true
	var obj = canvas1.getObjects().length;
	if(obj>0){
	}
}

function onSelectedCleared1(e){
	jQuery(".edittabdiv").css('display', 'none');
	if(jQuery(c1)){
			jQuery('#drawingArea canvas').removeClass('activeFront');
		}
}

function onSelectedCleared2(e){
	jQuery(".edittabdiv").css('display', 'none');
	if(jQuery(c2)){
			jQuery('#drawingArea-back canvas').removeClass('activeFront');
		}
}

function onSelectedCleared3(e){
	if(jQuery(c3)){
		}
		var obj = canvas.getObjects().length;	
	if(obj==0){
		jQuery('#drawingArea canvas').removeClass('activeFront');
	}
}

function onSelectedCleared4(e){
	var obj = canvas1.getObjects().length;	
	if(obj==0){
		jQuery('#drawingArea-back canvas').removeClass('activeFront');
	}
}

function openPopup(msg){
	jQuery('#popups').css({'top':popFall, 'opacity':'1',  'transition':'all .5s ease-in-out'});
	var nmsg = '<p id="text">'+msg+'</p>';
	jQuery('.popupbody').html(nmsg);
	jQuery('.popoverlay').fadeIn(500);
}

function closePopup(){
	jQuery('#popups').css({'top':'-100%', 'opacity':'0',  'transition':'all .5s ease-in-out'});
	jQuery('.popoverlay').fadeOut(500);
}

function getSelection(){
	return canvas.getActiveObject() == null ? canvas.getActiveGroup() : canvas.getActiveObject()
}

function getSelection1(){
	return canvas1.getActiveObject() == null ? canvas1.getActiveGroup() : canvas1.getActiveObject()
}

function getSelection2(){
	return canvas2.getActiveObject() == null ? canvas2.getActiveGroup() : canvas2.getActiveObject()
}

function getSelection3(){
	return canvas3.getActiveObject() == null ? canvas3.getActiveGroup() : canvas3.getActiveObject()
}

function upload_logo(formData, uploadFor ){
	jQuery.ajax({
			url: ajaxurl,
			type: 'POST',
			data:formData, cache: false,
			processData: false, // Don’t process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success:function(data) {
				var myJSON = JSON.parse(data);
				console.log("here",myJSON.suc);
				if(myJSON.suc == 0){
					loader.hide();
					alert(myJSON.msg);
				} else {
					image_tooltip.modal('show');
					//process the uploaded images
					processLogoJson(data, uploadFor);
				}				
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) { 
				loader.hide();
				console.log("Status: " + textStatus); alert("Error: " + errorThrown); 
			}  
		});
}

function processLogoJson(jsonData, uploadFor){

	var myJSON = jQuery.parseJSON(jsonData);
	if(myJSON[0]==1){		
			var d = new Date();
			var n = d.getMilliseconds();

			switch(uploadFor) {
					case 'front':
						var html ='<li><a href="#" data-val="'+n+'"><img data-logo-price="12" data-logo-name="f'+ n +'" class="img-polaroid" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/user-uploaded-logo/'+myJSON[1]+'" alt="#"></a> <span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></span></li>'	
						jQuery('.custom-logo-list').prepend(html);
						break;
					case 'back':
						var html ='<li ><a href="#" data-val="'+n+'"><img data-logo-price="12" class="img-polaroid-back" data-logo-name="b'+ n +'" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/user-uploaded-logo/'+myJSON[1]+'" alt="#"></a><span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></li>'
						jQuery('.custom-logo-list-back').prepend(html);
						break;
					case 'Lsleeve':
						var html ='<li ><a href="#" data-val="'+n+'"><img data-logo-price="12" class="img-polaroid-Lsleeve addonlslogo" data-logo-name="ls'+ n +'" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/user-uploaded-logo/'+myJSON[1]+'" alt="#"></a><span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></li>';						
						jQuery('.custom-logo-list-Lsleeve').prepend(html);
						break;
					case 'Rsleeve':					
						var html ='<li ><a href="#" data-val="'+n+'"><img data-logo-price="12" class="img-polaroid-Rsleeve" data-logo-name="rs'+ n +'" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/user-uploaded-logo/'+myJSON[1]+'" alt="#"></a><span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></li>'
						jQuery('.custom-logo-list-Rsleeve').prepend(html);
						break;
					default:
						break;
				}

		loader.hide();					
	}	

}

function showToolTop(argument) {
	jQuery('.tooltips').addClass('opens');
	setTimeout(function (argument) {
		jQuery('.tooltips').removeClass('opens');
	},10000)
}

function initCustomControls(){
	fabric.Canvas.prototype.customiseControls({
			tl: {
					action: 'rotate',
					cursor: 'cow.png',
			},
			tr: {
					action: 'scale',
			},
			bl: {
					action: function( e, target ) {
						console.log(target);
						remove_elm(target);
						target.remove();
						canvas.getActiveObject().remove();
						canvas.renderAll();
						canvas.renderAll();
				},
					cursor: 'pointer',
			},
			br: {
					action: 'moveUp',
					cursor: 'pointer',
			},
			mb: {
					action: 'moveDown',
					cursor: 'pointer',
			},
			mr: {
					action: function(e, target) {
							target.set({
									left: 200,
							});
							canvas.renderAll();
					},
					cursor: 'pointer',
			},	      
			mtr: {
					action: 'rotate',
					cursor: 'cow.png',
			},
	});
}

function remove_elm(item){
			console.log(item);

	if(item._originalElement){
		var sss = item._originalElement.currentSrc;

	
		if(item.imgFor == 'front'){

			var index = allfontLogos.indexOf(sss);
			if (index > -1) {
				allfontLogos.splice(index, 1);
			}		
			jQuery('.custom_user-file input').val(allfontLogos);

		}
		if(item.imgFor == 'back'){

			var index = allbackLogos.indexOf(sss);
			if (index > -1) {
				allbackLogos.splice(index, 1);
			}		
			jQuery('.custom_user-file-back input').val(allbackLogos);

		}
		if(item.imgFor == 'leftSleeve'){
			var index = allleftSleeveLogos.indexOf(sss);
			if (index > -1) {
				allleftSleeveLogos.splice(index, 1);
			}		
			jQuery('.custom_user-file-lsleeve input').val(allleftSleeveLogos);

		}
		if(item.imgFor == 'rightSleeve'){
			var index = allrightSleeveLogos.indexOf(sss);
			if (index > -1) {
				allrightSleeveLogos.splice(index, 1);
			}		
			jQuery('.custom_user-file-rsleeve input').val(allrightSleeveLogos);
		}

	}else{
		//if(canvas.getActiveObject()) { canvas.getActiveObject().remove(); }
		return;
	}
	
}

function add_to_form(src){
			

if(!inArray(allfontLogos, src)){

		allfontLogos.push(src);
		console.log(allfontLogos);
		jQuery('.custom_user-file input').val(allfontLogos);
	
	}
}

function add_to_back(src){


	if(!inArray(allbackLogos, src)){

		allbackLogos.push(src);
		console.log(allbackLogos);
		jQuery('.custom_user-file-back input').val(allbackLogos);
	
	}
}

function add_to_left(src){


	if(!inArray(allleftSleeveLogos, src)){

		allleftSleeveLogos.push(src);
		console.log(allleftSleeveLogos);
		jQuery('.custom_user-file-lsleeve input').val(allleftSleeveLogos);
	
	}
}

function add_to_right(src){


	if(!inArray(allrightSleeveLogos, src)){

		allrightSleeveLogos.push(src);
		console.log(allrightSleeveLogos);
		jQuery('.custom_user-file-rsleeve input').val(allrightSleeveLogos);
	
	}
}

function inArray(arr,src){
		    
		var index = arr.indexOf(src);
	if (index > -1) {
		return true;
	}else{
		return false;
	}	
}

function setFont(font){
		//alert('font front');
	var activeObject = canvas.getActiveObject();
	if (activeObject && activeObject.type === 'text') {
		activeObject.fontFamily = font;
		canvas.renderAll();
	}
	jQuery('.custom_front_name_style input').val(font);
	

		
}

function setFontback(font){
	//alert('font back');
	var activeObject = canvas1.getActiveObject();
	if (activeObject && activeObject.type === 'text') {
		activeObject.fontFamily = font;
		canvas1.renderAll();
	}
	jQuery('.custom_back_name_style input').val(font);
	
}

function setTheOptions(){
	all_Customized_Options.category = makeCap(selected_category.name) ;
	all_Customized_Options.design = makeCap(selected_design.name);
	all_Customized_Options.logo_front =  allfontLogos;
	all_Customized_Options.logo_back =  allbackLogos;
	all_Customized_Options.logo_lSleeve =  allleftSleeveLogos;
	all_Customized_Options.logo_rSleeve =  allrightSleeveLogos;

	console.log(all_Customized_Options);

	jQuery('.variations #category').val(all_Customized_Options.category);
	jQuery('.variations #design').val(all_Customized_Options.design);

}

function makeCap(data){
	return data.split(' ').map(item=>{
		let itemF = item.charAt(0);
		let itemFUpper = itemF.toUpperCase();
		return item.replace(item.charAt(0), itemFUpper)
	}).join(' ');
}

function set_img(font_log){
	var imgs = font_log.split(',');
	var html = '';
	for(i=0;i<imgs.length;i++){
		html = html + '<img src="'+ imgs[i] +'">';
	}

	return html;
}

jQuery(document).on('click','.accordion',function(){
	jQuery(this).toggleClass('active').siblings().removeClass('active');
	jQuery(this).next('.panel').toggleClass('show').siblings().removeClass('show');
});

function restorePrice(){
	let price = allData.product_price.split('$');
	jQuery('.price-area .sign').html(price[0]);
	jQuery('.price-area .custom_price').html(price[1]).attr('data-total',price[1]);
}
function setFormData(argument) {

	let user_file = "user-file";
	let user_file_back = "user-file-back";
	let user_file_lsleeve = "user-file-lsleeve";
	let user_file_rsleeve = "user-file-rsleeve";

	if(allData.main_body != '') { jQuery('.custom_main_body input').val(allData.main_body); }
	if(allData.side_body != '') { jQuery('.custom_side_body input').val(allData.side_body); }
	if(allData.collar != '') { jQuery('.custom_collar input').val(allData.collar); }
	if(allData.body_upper != '') { jQuery('.custom_body_upper input').val(allData.body_upper); }
	if(allData.body_lower != '') { jQuery('.custom_body_lower input').val(allData.body_lower); }
	if(allData.zigzag1 != '') { jQuery('.custom_zigzag1 input').val(allData.zigzag1); }
	if(allData.zigzag2 != '') { jQuery('.custom_zigzag2 input').val(allData.zigzag2); }
	if(allData.zigzag3 != '') { jQuery('.custom_zigzag3 input').val(allData.zigzag3); }
	if(allData.string != '') { jQuery('.custom_string input').val(allData.string); }
	if(allData.elastic != '') { jQuery('.custom_elastic input').val(allData.elastic); }
	if(allData.sleeve_by_color != '') { jQuery('.custom_sleeve_by_color input').val(allData.sleeve_by_color); }
	if(allData.plaket_inner != '') { jQuery('.custom_plaket_inner input').val(allData.plaket_inner); }
	if(allData.collar_by_color != '') { jQuery('.custom_collar_by_color input').val(allData.collar_by_color); }
	if(allData.button != '') { jQuery('.custom_button input').val(allData.button); }
	if(allData[user_file] != '') { jQuery('.custom_user-file input').val(allData[user_file]); }
	if(allData[user_file_back] != '') { jQuery('.custom_user-file-back input').val(allData[user_file_back]); }
	if(allData[user_file_lsleeve] != '') { jQuery('.custom_user-file-lsleeve input').val(allData[user_file_lsleeve]); }
	if(allData[user_file_rsleeve] != '') { jQuery('.custom_user-file-rsleeve input').val(allData[user_file_rsleeve]); }
	if(allData.front_name != '') { jQuery('.custom_front_name input').val(allData.front_name); }
	if(allData.front_name_style != '') { jQuery('.custom_front_name_style input').val(allData.front_name_style); }
	if(allData.front_name_color != '') { jQuery('.custom_front_name_color input').val(allData.front_name_color); }
	if(allData.back_name != '') { jQuery('.custom_back_name input').val(allData.back_name); }
	if(allData.back_name_style != '') { jQuery('.custom_back_name_style input').val(allData.back_name_style); }
	if(allData.back_name_color != '') { jQuery('.custom_back_name_color input').val(allData.back_name_color); }
	if(allData.fabric_type != '') { jQuery('.custom_fabric_type input').val(allData.fabric_type); }
	if(allData.size_quantity != '') { jQuery('.custom_size_quantity input').val(allData.size_quantity); }
	if(allData.lady_size_quantity != '') { jQuery('.custom_lady_size_quantity input').val(allData.lady_size_quantity); }
	if(allData.youth_size_quantity != '') { jQuery('.custom_youth_size_quantity input').val(allData.youth_size_quantity); }
	if(allData.variation_id != '') { jQuery('.variation_id').val(allData.variation_id); }
	if(allData.product_id != '') { jQuery('.woocommerce-variation-add-to-cart input[name=product_id]').val(allData.product_id); }
	if(allData.product_price != '') { jQuery('.product-options-price dd:nth-child(4) span.amount').text(allData.product_price); }
	if(allData.quantity != '') { jQuery('input[name=quantity]').val(allData.quantity); }

	setFormImages();

	
} 


function setFormImages(){

	console.log('******* Setting Images ********');	
	var uesr_file = 'user-file';
	let uesr_file_back = 'user-file-back';
	let uesr_file_lsleeve = 'user-file-lsleeve';
	let uesr_file_rsleeve = 'user-file-rsleeve';



	if(allData[uesr_file] !=''){
		var imgList = allData[uesr_file].split(',');
		for(i=0;i<imgList.length;i++){

			var image_html = '<li><a href="#" data-val="724"><img data-logo-price="12" data-logo-name="f724" class="img-polaroid" src="'+ imgList[i] +'" alt="#"></a> <span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></span></li>';
			jQuery('.custom-logo-list').append(image_html);
		}
	}

	if(allData[uesr_file_back] !=''){
		var imgList = allData[uesr_file_back].split(',');
		for(i=0;i<imgList.length;i++){

			var image_html = '<li><a href="#" data-val="724"><img data-logo-price="12" data-logo-name="f724" class="img-polaroid" src="'+ imgList[i] +'" alt="#"></a> <span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></span></li>';
			jQuery('.custom-logo-list-back').append(image_html);
		}
	}

	if(allData[uesr_file_lsleeve] !=''){
		var imgList = allData[uesr_file_lsleeve].split(',');
		for(i=0;i<imgList.length;i++){

			var image_html = '<li><a href="#" data-val="724"><img data-logo-price="12" data-logo-name="f724" class="img-polaroid" src="'+ imgList[i] +'" alt="#"></a> <span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></span></li>';
			jQuery('.custom-logo-list-Lsleeve').append(image_html);
		}
	}

	if(allData[uesr_file_rsleeve] !=''){
		var imgList = allData[uesr_file_rsleeve].split(',');
		for(i=0;i<imgList.length;i++){

			var image_html = '<li><a href="#" data-val="724"><img data-logo-price="12" data-logo-name="f724" class="img-polaroid" src="'+ imgList[i] +'" alt="#"></a> <span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></span></li>';
			jQuery('.custom-logo-list-Rsleeve').append(image_html);
		}
	}


	setCanvas();

}


function setCanvas(){

	var frontJson = JSON.parse(allData.canvas_design_1);
	var backJson = JSON.parse(allData.canvas_design_2);

	console.log(frontJson)
	canvas.loadFromJSON(frontJson, function() {		
	    canvas.renderAll();
	});
	canvas1.loadFromJSON(backJson, function() {
	    canvas1.renderAll();
	});


	
	
	setFabric();
	

}

function setFabric(){	

	jQuery('.fabric-section div:visible' ).find('select').val(allData.fabric_type);

	doneRestore();

}

function showToolTop(argument) {
	jQuery('.tooltips').addClass('opens');
	setTimeout(function (argument) {
		jQuery('.tooltips').removeClass('opens');
	},10000)
}



function setCat(cat){


	jQuery('.eachcat').each(function(){
		//alert( cat);
		if(jQuery(this).attr('data-cat-name') == cat){ 
			jQuery(this).find('a').click(); 
		} 
	});
}
function setdesign(design){

	var intval = setInterval(function (argument) {
		if(jQuery(document).find('.design-list li').length > 0){

			clearInterval(intval);
			readyDesign(design);
			
		}
	},100)	
}
function readyDesign(design) {
	
	jQuery(document).find('.design-list li').each(function(){ 	
	//alert(design);		
			if(jQuery(this).attr('data-imagename') == design){ 
				if(onlyClicked==0){
					onlyClicked++;
					jQuery(this).find('a').click(); 
				}
			

				restoreColors( jQuery(this).attr('data-layers-name'));
				
				 // setTimeout(function(){

				 // 	jQuery('.cuscolorpicker').find('script').eq(0).remove();
				 // 	jQuery('.cuscolorpicker').find('script').eq(1).remove();


				 // 	jQuery('.cuscolorpicker').append('<script>jQuery(".colorPickSelector1").colorPick({"allowRecent": false,"initialColor": "'+ allData.body_upper +'","onColorSelected":function() { var color =this.color;jQuery("#cp1_getcolor").val(color);jQuery(".custom_body_upper .custom-options").val(color).focus().focusout();this.element.css({"backgroundColor": this.color, "color": this.color}); jQuery(".target-image1").each(function () {this.src = changeIconColor(this, color, "1");});}});<\/script>');
				 	
				 // 	jQuery('.cuscolorpicker').append('<script>jQuery(".colorPickSelector2").colorPick({"allowRecent": false,"initialColor": "'+ allData.body_lower +'","onColorSelected":function() { var color =this.color;jQuery("#cp2_getcolor").val(color);jQuery(".custom_body_lower .custom-options").val(color).focus().focusout();this.element.css({"backgroundColor": this.color, "color": this.color}); jQuery(".target-image2").each(function () {this.src = changeIconColor(this, color, "2");});}});<\/script>');




				 // },100);
				
				
			} 
		});
}


function restoreColors(data_layer_names) {
	
	jQuery(document).find('.cuscolorpicker script').remove();
	
	var data_layer_name_arrays = data_layer_names.toLowerCase().split(' ').join('_').split(',');
	console.log('allData: '+data_layer_name_arrays);
	console.log(allData);
	setTimeout(function(){
	for (var i =1; i <= data_layer_name_arrays.length; i++){
		
		var custom_field_name = data_layer_name_arrays[i-1];		
		var color_name = allData[custom_field_name];

		//if(color_name == ''){ color_name = "#ffffff" };

		 jQuery('.cuscolorpicker').append('<script>jQuery(".colorPickSelector'+i+'").colorPick({"allowRecent": false,"initialColor": "'+ color_name +'","onColorSelected":function() { var color =this.color;jQuery("#cp'+i+'_getcolor").val(color);jQuery(".custom_'+custom_field_name+' .custom-options").val(color).focus().focusout();this.element.css({"backgroundColor": this.color, "color": this.color}); jQuery(".target-image'+i+'").each(function () {this.src = changeIconColor(this, color, "1");});}});<\/script>');

		}
		
		jQuery('#custom-design-area').find('.customize .designLoader').remove();
	},200);	

	setFormData();
	
	
	
}


function doneRestore(argument) {
	// restoring price
	restorePrice(); 
	//setTimeout(function(){ jQuery(document).find('#categories a').click(); },100);
	jQuery('.restorenow').text(' Restore done!');
	jQuery('body').removeClass('showRestore')
	jQuery('.restore_savedata').text('Restore done!').attr('disabled',true);
	jQuery('body').removeClass('data_restored');	
}
</script>


<!-- ********************************************************** -->
<?php    
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
do_action( 'woocommerce_single_product_summary' );
?>
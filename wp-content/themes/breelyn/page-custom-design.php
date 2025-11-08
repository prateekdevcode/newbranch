<?php
	/*
		* Template Name: Custom Design
	*/
	get_header('custom');
?>
<script>
	var changeIconColor = (function () {
		var canvas = document.createElement("canvas"), // shared instance
		context = canvas.getContext("2d");
		// set image pixel size and hex color
		// color = '33CC33';
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
  border-radius: 5px;
  width: 36px;
  height: 36px;
  cursor: pointer;
  -webkit-transition: all linear .2s;
  -moz-transition: all linear .2s;
  -ms-transition: all linear .2s;
  -o-transition: all linear .2s;
  transition: all linear .2s;
  z-index:99999;
}



</style>

<?php while ( have_posts() ) : the_post(); ?>
<section id="custom-design-area" class="clearfix">
	<div class="design-area  parent">
		
		<div class="customize" >
			
			<div id="live-view" class="sec-rt">
                <div id="item" class="main_customize_area panzoom">
					<!--shadow area jquery append img tag-->
					<img style="position: absolute;z-index: 5;" class="baseshadow1 shadow fluid index5" src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/images/dummy-img.jpg" alt="Shadow">
					
					<!--<div id="drawingArea" class="drawing custom-drawing" >					
						<canvas id="k" class="hover" ></canvas>
					</div>-->
					

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
					
					<!--mainshadow area jquery append img tag-->
					
					<div class="resource target-images"> 
						
					</div>	
				</div>
			</div>
		</div>
		<!--selected products name-->
		<input type="hidden" name="selectedname" class="selected_name" id="" value="">
		<input type="hidden" name="product_id" class="product_id" id="" value="">
        <div class="right-side-bar">
        	<div class="price-area">
        		<span class="sign">$</span> <span class="price custom_price" data-total="">0</span>
			</div>
			<div class="calhiden"></div>
        	<a href="javascript:void(0)" id ="capture" class="cart-btn single_add_to_cart_button">
				<i class="fa fa-shopping-cart"></i> <span class="cart_text"> ADD TO CART</span>
			</a>

			<button class="save">Save Settings</button>
		    <!-- <div class="zoom">
		    	<span>Zoom</span>
		    	<inp data-range="helper" data-value="100%">
					<input type="range" id="zoom-level" data-value="100%" min="100" max="250" value="100">
				</inp>
				<div class="buttons">
        <button class="zoom-in"><i class="fa fa-search-plus"></i> Zoom In</button>
        <button class="zoom-out"><i class="fa fa-search-minus"></i> Zoom Out</button> 
         <input type="range" class="zoom-range">
        <button class="reset">Reset</button> 
      </div> 
			</div> -->

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
					Name & Number
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
			<li class="" id="finalization">
				<a href="#" data-target="id-7">
					<i class="fas fa-check"></i>
					Finalization
				</a> 	
			</li>
			<li class="" id="size-quantity">
				<a href="#" data-target="id-8">
					<i class="fas fa-pencil-ruler"></i>
					Size and Quantity
				</a> 	
			</li>
			<li class="" id="cart">
				<a href="#" data-target="id-9">
					<i class="fas fa-shopping-cart"></i>
					Add to cart
				</a> 	
			</li>
		</ul>
		</div>
		
	</aside>

	<!-- description popup -->
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
	<?php 
					}
				?>
	<!--<div class="description-pop custom-cat2" style="display:none">
		<h5>Category 2</h5>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tempor eros eget pulvinar malesuada. Curabitur bibendum quam sit amet arcu mollis fringilla. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer efficitur imperdiet velit. Aenean hendrerit et nisl sit amet malesuada. Vivamus et est dignissim, commodo nisi vitae, congue turpis. Ut tincidunt enim sed nisi iaculis, ut euismod eros condimentum. Integer vehicula volutpat mattis. Aenean nisl lacus, pharetra eu neque eget, tristique lacinia nulla. Etiam ut nulla magna. Sed consequat risus ac rutrum lobortis. Duis velit metus, maximus tristique blandit vitae, accumsan vitae nunc.</p>
	</div>-->	
</div>

	<div class="customize-content">
		<a href="javascript:void(0);" class="cross"><img src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/images/cross.png" alt="#"></a>
		
		<div id="id-1" class="content default-skin demo scrollable customize-content-show">
			<div id="data"></div>
			
			<ul class="garments-list">
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
						
						// get the thumbnail id using the queried category term_id
						$thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true ); 
						
						// get the image URL
						$image = wp_get_attachment_url( $thumbnail_id ); 
						
					?>
					<li class="eachcat pro-<?php echo $term->term_id; ?>" data-slug="<?php echo $term->slug;?>" data-proid="<?php echo $term->term_id;?>" data-cat-name="<?php echo $term->name;?>">
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

				<!-- <h6 class="custom-logo-head"><small>Custom Logo</small></h6> -->
				<ul class="custom-logo-list">
					
				</ul>
				<div class="uploadimgsec">
					Select image to upload:
					<form method='post'>
						<input type='file' id='user-file' name="user-file">
						<!--<input type='submit' name='Submit' class='default-btn'>-->
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
	    			Select image to upload:
				   	<form method='post'>
						<input type='file' id='user-file-back' name="user-file-back">
						<!--<input type='submit' name='Submit' class='default-btn'>-->
					</form>
				</div>
				<!-- <a href="javascript:void(0);" class="body-back-btn activating-btn">Activate body back logo</a> -->
				<div class="divider"></div>

				<h6>Logos for left sleeve</h6>
				<ul class="custom-logo-list-Lsleeve">
				</ul>
				<div class="leftSleeveLogo">
					Select image to upload:
					<form method='post'>
						<input type='file' id='user-file-Lsleeve' name="user-file-Lsleeve">
						<!--<input type='submit' name='Submit' class='default-btn'>-->
					</form>
				</div>

				<!-- <a href="javascript:void(0);" class="remove-Llogo activating-btn">Activate left sleeve logo</a> -->

				<div class="divider"></div>

				<h6>Logos for right sleeve</h6>
				<ul class="custom-logo-list-Rsleeve">
				</ul>
				<div class="rightSleeveLogo">
					Select image to upload:
					<form method='post'>
						<input type='file' id='user-file-Rsleeve' name="user-file-Rsleeve">
						<!--<input type='submit' name='Submit' class='default-btn'>-->
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
					<button id="font-family" class="btn dropdown-toggle" data-toggle="dropdown" title="Font Style"><!-- <i class="fa fa-font"></i> --> <span class="defined-font">Select Font</span> <i class="fas fa-angle-down"></i></button>		                      
					<ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
						<li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial" data-family="Arial">Arial</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica" data-family="Helvetica">Helvetica</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro" data-family="Myriad Pro">Myriad Pro</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious" data-family="Delicious">Delicious</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana" data-family="Verdana">Verdana</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia" data-family="Georgia">Georgia</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier" data-family="Courier">Courier</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS" data-family="ComicSansMS">Comic Sans MS</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact" data-family="Impact">Impact</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco" data-family="Monaco">Monaco</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima" data-family="Optima">Optima</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text" data-family="Hoefler Text">Hoefler Text</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster" data-family="Plaster">Plaster</a></li>
						<li><a tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement" data-family="Engagement">Engagement</a></li>
					</ul>
				</li>
				<li>
					<input type="text" class="form-control grabdata fntclr" placeholder="Select Color" value="#ffffff"> <div class="colorPickSelectorfont"></div>
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
					<ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
						<li><a tabindex="-1" href="#" onclick="setFontback('Arial');" class="Arial" data-family="Arial">Arial</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Helvetica');" class="Helvetica" data-family="Helvetica">Helvetica</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Myriad Pro');" class="MyriadPro" data-family="Myriad Pro">Myriad Pro</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Delicious');" class="Delicious" data-family="Delicious">Delicious</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Verdana');" class="Verdana" data-family="Verdana">Verdana</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Georgia');" class="Georgia" data-family="Georgia">Georgia</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Courier');" class="Courier" data-family="Courier">Courier</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Comic Sans MS');" class="ComicSansMS" data-family="ComicSansMS">Comic Sans MS</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Impact');" class="Impact" data-family="Impact">Impact</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Monaco');" class="Monaco" data-family="Monaco">Monaco</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Optima');" class="Optima" data-family="Optima">Optima</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Hoefler Text');" class="Hoefler Text" data-family="Hoefler Text">Hoefler Text</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Plaster');" class="Plaster" data-family="Plaster">Plaster</a></li>
						<li><a tabindex="-1" href="#" onclick="setFontback('Engagement');" class="Engagement" data-family="Engagement">Engagement</a></li>
					</ul>
				</li>
				<li>
					<input type="hidden" class="hidden">
					<input type="text" class="form-control grabdata fntclrback" placeholder="Select Color" value="#ffffff"> <div class="colorPickSelectorfont"></div>
				</li>
			</ul>
		</div>  
		<div id="id-5" class="content">
			<h6>Collar</h6>
			<ul class="custom-collar-list">
			</ul>
			<div class="divider"></div>
			<h6>Pocket</h6>
			<ul class="custom-pocket-list">
			</ul>
		</div>

		<div id="id-6" class="content">
			<h6>Fabric for Polo Shirt and Tee Shirt</h6>
			<select name="" id="">
				<option value="">Sun Smart UPF50+ 165gsm 100% Polyester Micro Mesh Birds Eye (SS)</option>
				<option value="">160gsm 100% Polyester Mini Waffle (L)</option>
				<option value="">180gsm 3rd Gen. Cotton Back Polyester (D)</option>
			</select>
			<div class="divider"></div>
			<h6>Fabric For Hoodie and Jumper</h6>
			<select name="" id="">
				<option value="">280gsm 100% Polyester Brushed Fleecy</option>
			</select>
			<div class="divider"></div>
			<h6>Fabric for Ladies Tunic Top</h6>
			<select name="" id="">
				<option value="">100% Stretchy Polyester</option>
			</select>
		</div>

		<div id="id-7" class="content">
			<h6>Finalization</h6>
		</div>
		<div id="id-8" class="content">
			<h6>Size & Quantity</h6>
		</div>

	</div>
</section>

<div class="v"></div>
<div class="h"></div>

<!-- popups -->

<div id="popups">
	<a href="javascript:void(0);" class="close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/images/cross-black.png" alt="#"></a>
	<div class="popupbody">
		
	</div>
</div>
<div class="popoverlay"></div>

<?php endwhile; // end of the loop. ?>	

<?php 
	//get_footer( 'shop' );
	get_footer( 'custom' );
	
?>
<script>

jQuery(document).ready(function(){
	/*load style on click basedon category/products*/

	var cat_name;
	//var mainshadow = jQuery('')'<img style="position: absolute;z-index: 1;" class="midimg fluid index5" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png" alt="Lines">'
   
	jQuery( ".garments-list .eachcat" ).on("click",function(){

		jQuery('.target-images').empty();

		//alert()
		var cat_slug = jQuery(this).attr('data-slug');
		
		/*load shadow images on click on category products*/
		jQuery( ".baseshadow1" ).remove();
		jQuery( ".baseshadow2" ).remove();
		jQuery( ".baseshadow3" ).remove();
		jQuery( ".baseshadow4" ).remove();
		jQuery( ".midimg" ).remove();
		cat_name = jQuery(this).attr('data-slug');
		jQuery('.selected_name').val(cat_name);
		var shadow='';
		shadow +='<img style="position: absolute;z-index: 5;" class="baseshadow1 shadow fluid index5" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/1_1.png" alt="Shadow"><img style="position: absolute;z-index: 1;" class="baseshadow2 shadow fluid index1" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/2_2.png" alt="Ribbons"><img style="position: absolute;z-index: 3;" class="baseshadow3 shadow fluid index3" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png" alt="Lines"><img style="position: absolute;z-index: 1;" class="baseshadow4 shadow fluid index1" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/4_4.png" alt="Lines 2">';
		//jQuery( ".main_customize_area" ).children().empty();
		jQuery( ".main_customize_area" ).prepend(shadow);
		//mainshadow = '<img style="position: absolute;z-index: 1;" class="midimg fluid index5" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png" alt="Lines">';
		
		//jQuery( ".drawing" ).after(mainshadow);
		/*end*/
		
		
		var html = '';
		var i;
		jQuery.ajax({
			url : '<?php echo admin_url("admin-ajax.php"); ?>',
			data :{action:'getselectproductstyle', cat_slug : cat_slug}, 
			type: 'post',
			success : function( result ) {
				console.log('result ' + result);
				var myJSON = jQuery.parseJSON(result);
				//console.log('parse ' + result);
				var c=1;
				for (i = 0; i < myJSON.length; i++) {
					
					html += '<li data-imagename="'+myJSON[i]['data-imagename']+'" data-pid="'+myJSON[i]['products-id']+'" data-price="'+myJSON[i]['data-price']+'" data-layer="'+myJSON[i]['data-layer']+'" data-layers-name="'+myJSON[i]['default']+'" class="design"><a href="#" data-val="'+c+'"><img src="'+myJSON[i]['image']+'" alt="#"></a></li>';
					c++;
				}
				//alert(html);
				jQuery('.inner-loader').fadeIn(500);
				jQuery('.design-list').html(html);
				jQuery('.inner-loader').fadeOut(500);
				
			}
			
		});


		myfuntion();
	});
	
	function myfuntion(){
		var i=0;
		jQuery(document).find('#item img').each(function(){
			var imgSrc=jQuery(this).attr('src');
			localStorage.setItem("shadow_" + i, imgSrc);
			i++;
		});
	}
	
	/*load color pallet dynamically*/	
	jQuery(".design-list").on("click","li",function(){
		var data_layer = jQuery(this).attr('data-layer');
		var data_layer_name = jQuery(this).attr('data-layers-name');
		var data_layer_name_array = data_layer_name.split(',');
		var data_price = jQuery(this).attr('data-price');
		var pid = jQuery(this).attr('data-pid');
		jQuery(".product_id").val(pid);
		
		var color_pic ='';
		for (var i =1; i <= data_layer; i++)
		{
			color_pic +='<div class="all-color-data"><span class="color-picker-text">'+data_layer_name_array[i-1]+'</span><input type="text" id="cp'+i+'_getcolor" value="" class="form-control grabdata" placeholder="selected color"><div class="colorPicker colorPickSelector'+i+'"></div></div>';
		}
		jQuery('.cuscolorpicker').html(color_pic);
		for (var i =1; i <= data_layer; i++)
		{
			jQuery('.cuscolorpicker').append('<script>jQuery(".colorPickSelector'+i+'").colorPick({"allowRecent": false,"initialColor": "#ffffff","onColorSelected":function() { var color =this.color;jQuery("#cp'+i+'_getcolor").val(color);this.element.css({"backgroundColor": this.color, "color": this.color}); jQuery(".target-image'+i+'").each(function () {this.src = changeIconColor(this, color, "1");});}});<\/script>');
		}
		
		/*layer load on image*/
		
		var imagename = jQuery(this).attr('data-imagename');
		var flder_name = imagename.toLowerCase();
		flder_name = flder_name.replace(/ /g, "_");
		var pro_name = jQuery('.selected_name').val();
		var targt_html = '';
		for (var j =1; j <= data_layer; j++)
		{
			
			targt_html += '<img style="position: absolute;z-index: 1;" class="fluid shadow index1 target-image'+j+'" id="layer40.0" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+pro_name+'/'+flder_name+'/target_images/'+j+'.png">';
			
		}
		jQuery('.target-images').html(targt_html);
		
		$('.custom_price').html(data_price);
		$('.custom_price').attr('data-total',data_price);
		
	});	
	
	
	/* ============ canvas script logo, font , text here =========== */
	
	function setFont(font){
		alert('font front');
		var activeObject = canvas.getActiveObject();
		if (activeObject && activeObject.type === 'text') {
			activeObject.fontFamily = font;
			canvas.renderAll();
		}
	}

	function setFontback(font){
		alert('font back');
		var activeObject = canvas.getActiveObject();
		if (activeObject && activeObject.type === 'text') {
			activeObject.fontFamily = font;
			canvas.renderAll();
		}
	}
	
	function applyFilter(index, filter) {
	    var obj = canvas.getActiveObject();
	    //alert(index)
	    obj.filters[index] = filter;
	    obj.applyFilters(canvas.renderAll.bind(canvas));
	     canvas.renderAll();
	}
	function applyFilterBack(index, filter) {
	    var obj = canvas1.getActiveObject();
	    //alert(index)
	    obj.filters[index] = filter;
	    obj.applyFilters(canvas1.renderAll.bind(canvas1));
	     canvas1.renderAll();
	}

	function applyFilterLSleeve(index, filter) {
	    var obj = canvas2.getActiveObject();
	    //alert(index)
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

				
		//var canvas = this.__canvas = new fabric.Canvas('c');
		canvas = new fabric.Canvas('cc', {
			hoverCursor: 'pointer',
			selection: true,
			selectionBorderColor:'blue'
		}, f = fabric.Image.filters);
		

		canvas.on({
			'object:moving': function(e) {		  	
				e.target.opacity = 0.5;
			},
			'object:modified': function(e) {		  	
				e.target.opacity = 1;
			},
			'object:selected':onObjectSelected1,
			'selection:cleared':onSelectedCleared1,
			'object:removed': function(object){
			//console.warn(object);
			//console.log('1 ' + object['target']['id']);
			jQuery( ".calhiden" ).find( "#"+object['target']['id'] ).remove();

			}

		});
		
		/*back canvas initialize*/
		
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
			},
			'object:modified': function(e) {		  	
				e.target.opacity = 1;
			},
			'object:selected':onObjectSelected2,
			'selection:cleared':onSelectedCleared2,
			'object:removed': function(object){
			console.warn(object);
			//console.log('2 ' + object['target']['id']);
			jQuery( ".calhiden" ).find( "#"+object['target']['id'] ).remove();
			}
		});


		/*left sleeve canvas initialize*/
		
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
			},
			'object:selected':onObjectSelected3,
			'selection:cleared':onSelectedCleared3,
			'object:removed': function(object){
			console.warn(object);
			//console.log('3 ' + object['target']['id']);
			jQuery( ".calhiden" ).find( "#"+object['target']['id'] ).remove();
			}
		});

		/*right sleeve canvas initialize*/

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
			},
			'object:selected':onObjectSelected4,
			'selection:cleared':onSelectedCleared4,
			'object:removed': function(object){
			console.warn(object);
			//console.log('4 ' + object['target']['id']);
			jQuery( ".calhiden" ).find( "#"+object['target']['id'] ).remove();
			}
		});
		
		


			
		
		fabric.Object.prototype.transparentCorners = false;
		
		fabric.Canvas.prototype.customiseControls({
	        tl: {
	            action: 'rotate',
	            cursor: 'cow.png',
	        },
	        tr: {
	            action: 'scale',
	        },
	        bl: {
	            action: 'remove',
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
	        // mt: {
	        //     action: {
	        //         'rotateByDegrees': 30,
	        //     },
	        //     cursor: 'pointer',
	        // },
	        // only is hasRotatingPoint is not set to false
	        mtr: {
	            action: 'rotate',
	            cursor: 'cow.png',
	        },
    	});



		var w = jQuery('canvas').width();
		var h = jQuery('canvas').height();
	    var wcenter =w/4;
	    var hcenter=h/3.5;
	    var hscenter=h/4.2;
	    var wrcenter=w/1.3;
        var hcentertxt=h/3.5;
        var lSl1 = w-(w+5);
        var lSl2 = w/1.08; 
        var rSl1 = w/2.3;
        var rSl2 = w/2;

        //alert(rSl1)


		// front sicde logo placed

		jQuery(document).on("click",".img-polaroid", function(e){	


			var obj2= canvas2.getObjects().length;
			var obj3= canvas2.getObjects().length;

			if(obj3>0){
				jQuery('.remove-Llogo, .body-front-btn').fadeIn(500).css('display','block')
			}
		
			
			var logo_name = $(this).attr('data-logo-name');
			var el = e.target;
			var date = new Date();
				var components = [
				date.getYear(),
				date.getMonth(),
				date.getDate(),
				date.getHours(),
				date.getMinutes(),
				date.getSeconds(),
				date.getMilliseconds()
				];

				var d = components.join("");
			/*add hidden field to calculate price and delete price*/
			jQuery('.calhiden').append('<input class="grabdata" type="hidden" name="" value="'+logo_name+'" id="'+d+'">');

			   
			
			fabric.Image.fromURL(el.src, function(img) {
				
		        img.set({
		            id: d,
		            left: wcenter,
		            top: hcenter,
		            originX: 'center',
		            originY: 'center',

		        });
		        
		    	canvas.setActiveObject(img);
		    	//alert(ff);

				applyFilter(2, new f.RemoveWhite({
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
		        //alert('click');
		        img.scaleToWidth(canvas.getWidth()/8.5);
		        canvas.add(img);
		        canvas.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png', canvas.renderAll.bind(canvas),{
			       		width: canvas.width,
	    				height: canvas.height
		       	});

	   		 	this.__canvases.push(canvas);


		
   			 });
		});	 

		// back side image placed
		
		jQuery(document).on("click",".img-polaroid-back", function(e){

			var obj2= canvas1.getObjects().length;
			var obj4= canvas3.getObjects().length;	
		
		  	if(obj4>0){
				jQuery('.body-back-btn, .remove-Rlogo').fadeIn(500).css('display','block')
			}
			
			var logo_url = $(this).attr('src');
			var logo_name = $(this).attr('data-logo-name');
			var el = e.target;
			
			var date = new Date();
				var components = [
				date.getYear(),
				date.getMonth(),
				date.getDate(),
				date.getHours(),
				date.getMinutes(),
				date.getSeconds(),
				date.getMilliseconds()
				];

			var d1 = components.join("");
			/*add hidden field to calculate price and delete price*/
			jQuery('.calhiden').append('<input class="grabdata" type="hidden" name="" value="'+logo_name+'" id="'+d1+'">');
			
			
			fabric.Image.fromURL(el.src, function(img) {
		
	        img.set({
	            id: d1,
	            left: wrcenter,
	            top: hcenter,
	            /*scaleX: 0.2,
	            scaleY: 0.2,*/
	            originX: 'center',
	            originY: 'center',
	        });


        	canvas.setActiveObject(img);
        	//alert(gg)
        
	        applyFilter(2, new f.RemoveWhite({
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

		        img.scaleToWidth(canvas.getWidth()/8.5);
		        canvas.add(img);
		        canvas.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png', canvas.renderAll.bind(canvas),{
			       		width: canvas.width,
	    				height: canvas.height
		       	});

	   		 	this.__canvases.push(canvas);
			
	    	});
		});	 

		// left sleeve logo placed

		jQuery(document).on("click",".img-polaroid-Lsleeve", function(e){
			
			var obj1= canvas.getObjects().length;
			var obj2= canvas1.getObjects().length;
			
			var logo_url = $(this).attr('src');
			var logo_name = $(this).attr('data-logo-name');
			var el = e.target;

			var date = new Date();

			var components = [
				date.getYear(),
				date.getMonth(),
				date.getDate(),
				date.getHours(),
				date.getMinutes(),
				date.getSeconds(),
				date.getMilliseconds()
			];

				var d2 = components.join("");
				/*add hidden field to calculate price and delete price*/
				jQuery('.calhiden').append('<input class="grabdata" type="hidden" name="" value="'+logo_name+'" id="'+d2+'">');
				
			var a = fabric.Image.fromURL(el.src, function(img) {
			   			   //canvas2.item(0).selectable = false;
		        img.set({
		            id: d2,
		            left: lSl1,
		            top: hscenter,
		            name:'leftImg',
		            /*scaleX: 0.2,
		            scaleY: 0.2,*/
		            originX: 'left',
		            originY: 'top',
		           
		        });



		        var lsObject =img.id;
		        var last = lsObject.length -1;

		        //alert(lsObject);
	        	canvas.setActiveObject(img);
		       
		        applyFilter(2, new f.RemoveWhite({
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
		        img.scaleToWidth(canvas.getWidth()/12);

		        canvas.add(img);
		        canvas.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png', canvas.renderAll.bind(canvas),{
			       		width: canvas.width,
	    				height: canvas.height
		       	});

	   		 	this.__canvases.push(canvas);
			
	    	});
			


	    		var b = fabric.Image.fromURL(el.src, function(image) {
			   //canvas2.item(0).selectable = false;
		        image.set({
		            id: d2,
		            left: lSl2,
		            top: hscenter,
		            name:'leftImg',
		            originX: 'left',
		            originY: 'top',
		            //selection: false,
		            borderColor: 'transparent',
				    cornerColor: 'transparent',
				    cornerSize: 0,
		        });

		        

		         var lsObject2 = image.id;
		         var last = lsObject2.length -1;
		        //alert(lsObject);


	        	//canvas2.setActiveObject(img);
	        	canvas.setActiveObject(image);
		       
		        applyFilter(2, new f.RemoveWhite({
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
		        	canvas.renderAll();
		        });
		        //alert('click');
		        image.scaleToWidth(canvas.getWidth()/12);
		        canvas.add(image);
		        canvas.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png', canvas.renderAll.bind(canvas),{
			       		width: canvas.width,
	    				height: canvas.height
		       	});

	   		 	this.__canvases.push(canvas);
			
	    		});

	    		
		});	

		// right sleeve logo placed

		jQuery(document).on("click",".img-polaroid-Rsleeve", function(e){


			var obj2= canvas1.getObjects().length;
			var obj1= canvas.getObjects().length;	

			
			var logo_url = $(this).attr('src');
			var logo_name = $(this).attr('data-logo-name');
			var el = e.target;
			var date = new Date();
			var components = [
				date.getYear(),
				date.getMonth(),
				date.getDate(),
				date.getHours(),
				date.getMinutes(),
				date.getSeconds(),
				date.getMilliseconds()
			];

			var d3 = components.join("");
				/*add hidden field to calculate price and delete price*/
			jQuery('.calhiden').append('<input class="grabdata" type="hidden" name="" value="'+logo_name+'" id="'+d3+'">');
				
				
			fabric.Image.fromURL(el.src, function(img) {
			
	        img.set({
	            id: d3,
		            left: rSl2,
		            top: hscenter,
		            name:'rightImg',
		            /*scaleX: 0.2,
		            scaleY: 0.2,*/
		            originX: 'left',
		            originY: 'top',
		            //selection: false,
		            borderColor: 'transparent',
				    cornerColor: 'transparent',
				    cornerSize: 0,
	        });

	        var rsObject = img.id;
	        var last = rsObject.length -1;

        	canvas.setActiveObject(img);
	         applyFilter(2, new f.RemoveWhite({
			      threshold: $('remove-white-threshold').value,
			      distance: $('remove-white-distance').value
			    }));
			//img.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false});
	   			
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
		    img.scaleToWidth(canvas.getWidth()/12);
		    canvas.add(img);
		    canvas.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png', canvas.renderAll.bind(canvas),{
			       		width: canvas.width,
	    				height: canvas.height
		       	});

	   		 	this.__canvases.push(canvas);
		    	

	    	});

			fabric.Image.fromURL(el.src, function(image) {
			
	        image.set({
	            id: d3,
		            left: rSl1,
		            top: hscenter,
		            name:'rightImg',
		            /*scaleX: 0.2,
		            scaleY: 0.2,*/
		            originX: 'left',
		            originY: 'top',
		            //selection: false,
		            borderColor: 'transparent',
				    cornerColor: 'transparent',
				    cornerSize: 0,
	        });

	        var rsObject2 = image.id;
	        var last = rsObject2.length -1;

        	canvas.setActiveObject(image);
	         applyFilter(2, new f.RemoveWhite({
			      threshold: $('remove-white-threshold').value,
			      distance: $('remove-white-distance').value
			    }));
			//img.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false});
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
		        	canvas.renderAll();
		        });
		        //alert('click');
		        image.scaleToWidth(canvas.getWidth()/12);
		        canvas.add(image);
		        canvas.setOverlayImage('<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/'+cat_name+'/shadow/3_3.png', canvas.renderAll.bind(canvas),{
			       		width: canvas.width,
	    				height: canvas.height
		       	});

	   		 	this.__canvases.push(canvas);

			
	    	});
		});	 

		
		line1 = new fabric.Line([0,0,145,0], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});
		
		line2 = new fabric.Line([144,0,145,285], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});
		
		line3 = new fabric.Line([0,0,0,285], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});
		
		line4 = new fabric.Line([0,284,144,285], {"stroke":"#000000", "strokeWidth":1,hasBorders:false,hasControls:false,hasRotatingPoint:false,selectable:false});
		
		
		$("#capture").click(function(e){
			
			var element = document.getElementById("item");
			var prod = jQuery('.product_id').val();
			
			
			html2canvas(element).then(function(canvas) {
				// Export the canvas to its data URI representation
				var base64image = canvas.toDataURL("image/png");
				var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
				jQuery.ajax({
					url: ajaxurl, //AJAX file path - admin_url('admin-ajax.php')
					type: "POST",
					data: {
						//action name
						action:'save_custom_tshirt_images',
						imgdata: base64image,
						prod: prod
					},
					//async : false,
					success: function(data){
						//console.log(data);
						$('#image_id img').attr('src', data);
					}
				});
				
				
			});
		});
		
		var c1=jQuery('canvas#cc');
		var c2 =jQuery('canvas#c1');
		var c3 =jQuery('canvas#c3');
		var c4 =jQuery('canvas#c4');
		var msg = '';
		
		function onObjectSelected1(e) {
			
			var selectedObject = e.target;
			//alert(selectedObject);
			$("#text-string").val("");
			selectedObject.hasRotatingPoint = true
			if (selectedObject && selectedObject.type === 'text') {

				if(jQuery(c1)){
					jQuery('#drawingArea canvas').addClass('activeFront');
				}

			}

			
		}

		function onObjectSelected2(e) {
			
			var selectedObject = e.target;
			//alert(selectedObject);
			$("#text-string").val("");
			selectedObject.hasRotatingPoint = true
			if (selectedObject && selectedObject.type === 'text') {
				if(jQuery(c2)){
					jQuery('#drawingArea-back canvas').addClass('activeFront');
				}
			}

		}

		

		function onObjectSelected3(e) {
			
			var selectedObject = e.target;
			
			$("#text-string").val("");
			selectedObject.hasRotatingPoint = true
			
			var obj = canvas.getObjects().length;

			if(obj>0){
				//jQuery('<button class="activeSleeveLogo">Active right sleeve logo </button> <button class="activebodyLogo">Active back body logo </button>').appendTo('.customize')
			}
		}

		function onObjectSelected4(e) {
			
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


		// popup close

			jQuery('#popups .close').on('click', function(e){
			  e.preventDefault();
			  closePopup()
			});

			jQuery('.popoverlay').on('click', function(e){
			  closePopup()
			});


		//  open/close popup

		

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
		



		// add text to canvas for front
		
		jQuery("#add-text").click(function(e){
			
			/*var text_price = 2;
			var total_price = $('.custom_price').attr('data-total');
			var total = (parseFloat(text_price) + parseFloat(total_price));
			jQuery('.custom_price').html(total);
			jQuery('.custom_price').attr('data-total',total);*/

			var obj2= canvas2.getObjects().length;
			var obj3= canvas2.getObjects().length;

			if(obj3>0){
				jQuery('.remove-Llogo, .body-front-btn').fadeIn(500).css('display','block')
			}

			
			var text = jQuery("#text-string").val();
			var fntfamily = jQuery(this).parent().siblings('.text-preview').children('span').attr('style');
			var txtColor = jQuery(this).parent().siblings().children('.grabdata').val();
			//alert(txtColor);
			//alert(fntfamily);
			fntfamily = fntfamily.split(':')[1];
			newfntfamily = fntfamily.split(';')[0];
			//alert(newfntfamily);
			
			var textSample = new fabric.Text(text, {
				//left: fabric.util.getRandomInt(0, 50),
				//top: fabric.util.getRandomInt(0, 50),
				left: wcenter,
           		top: hcentertxt,
				fontFamily: newfntfamily,
				angle: 0,
				fill: txtColor,
				scaleX: 0.5,
				scaleY: 0.5,
				fontWeight: '',
				hasRotatingPoint:true,
				fontSize:50,
				padding:20

			});	
			textSample.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false});
		
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
	            canvas.renderAll();
        });

		canvas.add(textSample);	
		canvas.item(canvas.item.length-1).hasRotatingPoint = true;   
			
	});
		
		/*back side text add to canvas*/
		
		jQuery("#add-text-back").click(function(e){
			
			/*var text_price = 2;
			var total_price = $('.custom_price').attr('data-total');
			var total = (parseFloat(text_price) + parseFloat(total_price));
			jQuery('.custom_price').html(total);
			jQuery('.custom_price').attr('data-total',total);*/

			var obj2= canvas1.getObjects().length;
			var obj4= canvas3.getObjects().length;	
		
		  	if(obj4>0){
				jQuery('.remove-Rlogo, .body-back-btn').fadeIn(500).css('display','block')
			}
			
			var text = jQuery("#text-string-back").val();
			var fntfamily = jQuery(this).parent().siblings('.text-preview').children('span').attr('style');
			//alert(fntfamily);
			fntfamily = fntfamily.split(':')[1];
			newfntfamily = fntfamily.split(';')[0];
			var txtColor = jQuery(this).parent().siblings().children('.fntclrback').val();
			//alert(newfntfamily);
			
			var textSample = new fabric.Text(text, {
				//left: fabric.util.getRandomInt(0, 50),
				//top: fabric.util.getRandomInt(0, 50),
				left: wcenter,
           		top: hcentertxt,
				fontFamily: newfntfamily,
				angle: 0,
				fill: txtColor,
				scaleX: 0.5,
				scaleY: 0.5,
				fontWeight: '',
				hasRotatingPoint:true,
				fontSize:50,
				padding:20

			});	
		textSample.setControlsVisibility({'mr': false, 'mt':true, 'mtr': false});
		
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

            canvas.renderAll();
        });
		
			canvas.add(textSample);	
	
			canvas.item(canvas.item.length-1).hasRotatingPoint = true;   
			
		});
		

		
		/*front text color initialize*/
		
		jQuery(".colorPickSelectorfont").colorPick({
			'initialColor' : '#ffffff',
			'onColorSelected': function() {
				this.element.css({'backgroundColor': this.color, 'color': this.color});
				jQuery(".fntclr").val(this.color);
			var color = this.color;
			//jQuery(this).parent().siblings('.text-preview').children('span').css('color',color);
			//alert('input ' + color);
			var activeObject = getSelection();
			//alert(activeObject);
			if (activeObject && activeObject.type === 'text') {
				activeObject.set({fill: color});
				canvas.renderAll();
			}
			
			}
			
		});
		
		/*backside font color initialize*/
		jQuery(".colorPickSelectorfontback").colorPick({
			'initialColor' : '#ffffff',
			'onColorSelected': function() {
				this.element.css({'backgroundColor': this.color, 'color': this.color});
				
				jQuery(".fntclrback").val(this.color);
				var color = this.color;
				var activeObject = getSelection1();
				//alert(activeObject);
				//console.log('cc ' + activeObject);
				if (activeObject && activeObject.type === 'text') {
					//alert('fdfsdf');
					activeObject.set({fill: color});
					canvas.renderAll();
				}
			}
			
		});
		
		
		
	});


// added on 30.10.2018 from below script

/*logo upload section from logo section*/
	jQuery(document).ready(function(){
	//jQuery('.default-btn').click(function(event){
	jQuery("input[name=user-file]").change(function(event) {	
	//event.preventDefault();

	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var formData = new FormData();
	formData.append('updoc', jQuery('input[type=file]')[0].files[0]);
	formData.append('action', 'questiondatahtml');
	jQuery.ajax({
	url: ajaxurl,
	type: 'POST',
	data:formData,cache: false,
	processData: false, // Don’t process the files
	contentType: false, // Set content type to false as jQuery will tell the server its a query string request
	success:function(data) {
	//alert(data);
	//alert(data);
	var myJSON = jQuery.parseJSON(data);
	//console.log('json ' + myJSON[0]);


	if(myJSON[0]==1){
		/*genarate random number and push it into dynamically added logo*/
		 var d = new Date();
	     var n = d.getMilliseconds();
		 var html ='<li><a href="#" data-val="'+n+'"><img data-logo-price="12" data-logo-name="f'+ n +'" class="img-polaroid" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/user-uploaded-logo/'+myJSON[1]+'" alt="#"></a> <span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></span></li>'
		//jQuery('.inner-loader').fadeIn(500);
		//jQuery('.custom-logo-list').append(loader).fadeIn(500);
		jQuery('.custom-logo-list').prepend(html);
		//jQuery('.custom-loader').fadeOut(500);
		//jQuery('.inner-loader').fadeOut(500);
	//alert(html);
	}
	},

});

});

/*back portion logo*/

jQuery("input[name=user-file-back]").change(function() {		
	//event.preventDefault();
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	//console.log('page ' + ajaxurl)
	var formData = new FormData();
	formData.append('updocback', jQuery('#user-file-back')[0].files[0]);
	formData.append('action', 'questiondatahtmlback');
	jQuery.ajax({
	url: ajaxurl,
	type: 'POST',
	data:formData,cache: false,
	processData: false, // Don’t process the files
	contentType: false, // Set content type to false as jQuery will tell the server its a query string request
	success:function(data) {

	//alert(data);
	var myJSON = jQuery.parseJSON(data);
	//console.log(myJSON[0]);

	if(myJSON[0]==1){
		var d = new Date();
	    var n = d.getMilliseconds();
	var html ='<li ><a href="#" data-val="'+n+'"><img data-logo-price="12" class="img-polaroid-back" data-logo-name="b'+ n +'" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/user-uploaded-logo/'+myJSON[1]+'" alt="#"></a><span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></li>'

	jQuery('.custom-logo-list-back').prepend(html);
	}

	},

	});

});


// Left sleeve logo
jQuery("input[name=user-file-Lsleeve]").change(function() {		
		//alert();
	//event.preventDefault();
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	//console.log('page ' + ajaxurl)
	var formData = new FormData();
	//alert(formData);
	formData.append('updocsleeve', jQuery('#user-file-Lsleeve')[0].files[0]);
	formData.append('action', 'questiondatahtmllsleeve');
	jQuery.ajax({
		url: ajaxurl,
		type: 'POST',
		data:formData,cache: false,
		processData: false, // Don’t process the files
		contentType: false, // Set content type to false as jQuery will tell the server its a query string request
		success:function(data) {
			//alert('json data ' + data);
			//alert(data);

			var myJSON = jQuery.parseJSON(data);
			//console.log('json ' + myJSON[0]);

			//alert(myJSON[0]);

			if(myJSON[0]==1){
				var d = new Date();
			    var n = d.getMilliseconds();
				var html ='<li ><a href="#" data-val="'+n+'"><img data-logo-price="12" class="img-polaroid-Lsleeve addonlslogo" data-logo-name="ls'+ n +'" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/user-uploaded-logo/'+myJSON[1]+'" alt="#"></a><span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></li>'

				//alert(html)

				jQuery('.custom-logo-list-Lsleeve').prepend(html);
			}
		},

		});
	});

//LS Logo addon
// jQuery(document).on('click', 'ul.custom-logo-list-Lsleeve li a', function(){
// 	jQuery("ul.custom-logo-list-Lsleeve li a img").clone().appendTo("#item");
// });



// Right sleeve logo
jQuery("input[name=user-file-Rsleeve]").change(function() {		
	//alert();
	//event.preventDefault();
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	//console.log('page ' + ajaxurl)
	var formData = new FormData();
	//alert(formData);
	formData.append('updocssleeve', jQuery('#user-file-Rsleeve')[0].files[0]);
	formData.append('action', 'questiondatahtmlrsleeve');
	jQuery.ajax({
	url: ajaxurl,
	type: 'POST',
	data:formData,cache: false,
	processData: false, // Don’t process the files
	contentType: false, // Set content type to false as jQuery will tell the server its a query string request
	success:function(data) {
	//alert('json data ' + data);
	//alert(data);

	var myJSON = jQuery.parseJSON(data);
	//console.log('json ' + myJSON[0]);

	//alert(myJSON[0]);

	if(myJSON[0]==1){
		var d = new Date();
	    var n = d.getMilliseconds();
		var html ='<li ><a href="#" data-val="'+n+'"><img data-logo-price="12" class="img-polaroid-Rsleeve" data-logo-name="rs'+ n +'" src="<?php echo get_stylesheet_directory_uri(); ?>/customizer_images/user-uploaded-logo/'+myJSON[1]+'" alt="#"></a><span class="cross-img"><img src="http://onlinedevserver.biz/dev/breelyn-store/wp-content/themes/breelyn-theme/customproducts/images/cross.png" alt="#"></li>'

		//alert(html)

		jQuery('.custom-logo-list-Rsleeve').prepend(html);
	}

	},

	});

	});

	//RS Logo addon
	// jQuery(document).on('click', 'ul.custom-logo-list-Rsleeve li a', function(){
	// 	var cln = jQuery("ul.custom-logo-list-Rsleeve li a img").clone().appendTo("#item");
	// });


	});

</script>


<!--Add to cart code-->


<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('.single_add_to_cart_button').click(function(){
			
			var products_ids = jQuery('.product_id').val();
			eventsArray = new Array();
			var selectCounter=0;
			jQuery('.grabdata').each(function(){
				var value = jQuery(this).val();
				var name = 'custom_data_'+selectCounter;
				if(value !=undefined && name !=undefined){
					eventsArray[selectCounter] = {value,name };
					selectCounter++;
				}
			});
			//console.log(eventsArray);
			alert('sending ajax request');
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			jQuery.ajax({
				url: ajaxurl, //AJAX file path - admin_url('admin-ajax.php')
				type: "POST",
				dataType: "text",
				data: {
					//action name
					action:'wdm_add_user_customizer_data_options',
					selectedTypeArray:eventsArray,
					pids:products_ids
				},
				//async : false,
				success: function(data){
					// successful AJAX request execution
					//console.log(data);
					alert('ajax response recieved');
				}
			});
		})
		
		/*zoom jquery*/
		
		jQuery('.parent').find('.panzoom').panzoom({
           $zoomIn: jQuery('.parent').find(".zoom-in"),
           $zoomOut: jQuery('.parent').find(".zoom-out"),
            $zoomRange: jQuery('.parent').find(".zoom-range"),
            $reset: jQuery('.parent').find(".reset"),
			panOnlyWhenZoomed: true,
			minScale: 1
          });
		
	});
</script>


<script type='text/javascript'>
	// cut and paste in above code
</script>


<!--category description popup open-->
<script type='text/javascript'>
jQuery(document).ready(function(){
	
	jQuery('ul.garments-list li').hover(function() {
		var pclass = jQuery(this).attr('data-slug');
		//console.log(pclass);
	jQuery( ".catdes" ).find( "."+pclass ).show();
  }, function() {
	  var pclass = jQuery(this).attr('data-slug');
    jQuery('.catdes').find( "."+pclass ).hide();
  });



	
});	

</script>


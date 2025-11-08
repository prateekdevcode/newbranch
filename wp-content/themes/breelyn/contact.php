<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Contact
 *
 * @package storefront
 */

get_header(); ?>


    <section id="inner-banner" style="background: url( '<?php echo get_stylesheet_directory_uri(); ?>/images/inner-banner.jpg' ) no-repeat center top; background-size:cover ">
    	<div class="container">
    		<div class="title-section banner-header">
				<h1><span><?php wp_title(''); ?></span></h1>
			</div>
    	</div>
    </section>
	<section id="descliamer" class="common-padding">
		<div class="container">
			<div class="desc-content contact clearfix">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="title-section custom-heading">
						<h3><span>Conatct Information</span></h3>
					</div>
					<h5>Welcome to our Showroom, please call to make an appointment.</h5>

					<div class="address-box">
						<div class="address-left">
							<i class="fa fa-home"></i>
						</div>
						<div class="address-right">
							<p><a href="#">15/33 Holbeche Road, Arndell Park.</a></p>
						</div>
					</div>
					<div class="address-box">
						<div class="address-left">
							<i class="fa fa-map-marker"></i>
						</div>
						<div class="address-right">
							<p><a href="#">PO Box 423, Doonside NSW 2767</a></p>
						</div>
					</div>
					<div class="address-box">
						<div class="address-left">
							<i class="fa fa-phone"></i>
						</div>
						<div class="address-right">
							<p><a href="tel:1300 786 168">1300 786 168</a></p>
						</div>
					</div>

					<div class="address-box">
						<div class="address-left">
							<i class="fa fa-fax"></i>
						</div>
						<div class="address-right">
							<p><a href="fax:02 9671 3996">02 9671 3996</a></p>
						</div>
					</div>

					<div class="address-box">
						<div class="address-left">
							<i class="fa fa-envelope"></i>
						</div>
						<div class="address-right">
							<p><a href="mailto:sales@breelynuniforms.com.au">sales@breelynuniforms.com.au</a></p>
						</div>
					</div>

					<div class="address-box">
						<div class="address-left">
							<i class="fa fa-globe"></i>
						</div>
						<div class="address-right">
							<p><a href="tel:12 099 733 543">12 099 733 543</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12 opening-hours">
					<div class="title-section custom-heading">
						<h3><span>Opening Hours</span></h3>
					</div>
					<div class="address-box">
						<div class="address-left">
							<p><strong>Monday</strong></p>
						</div>
						<div class="address-right">
							<p>9:00am to 5:00pm</p>
						</div>
					</div>
					<div class="address-box">
						<div class="address-left">
							<p><strong>Tuesday</strong></p>
						</div>
						<div class="address-right">
							<p>9:00am to 5:00pm</p>
						</div>
					</div>
					<div class="address-box">
						<div class="address-left">
							<p><strong>Wednesday</strong></p>
						</div>
						<div class="address-right">
							<p>9:00am to 5:00pm</p>
						</div>
					</div>
					<div class="address-box">
						<div class="address-left">
							<p><strong>Thursday</strong></p>
						</div>
						<div class="address-right">
							<p>9:00am to 5:00pm</p>
						</div>
					</div>
					<div class="address-box">
						<div class="address-left">
							<p><strong>Friday</strong></p>
						</div>
						<div class="address-right">
							<p>9:00am to 5:00pm</p>
						</div>
					</div>
					<div class="address-box">
						<div class="address-left">
							<p><strong>Saturday</strong></p>
						</div>
						<div class="address-right">
							<p>10:00am to 1:00pm (By Appointment)</p>
						</div>
					</div>
					
				</div>
			</div>


			<div class="contact-form">
				<?php echo do_shortcode('[contact-form-7 id="5" title="Contact Us Form"]');?>
			</div>
		</div>
	</section>

<?php
get_footer();

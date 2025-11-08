<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Sample  and Fitting Services
 *
 * @package storefront
 */

get_header(); ?>

	<section id="descliamer" class="common-padding">
		<div class="container">
			<div class="title-section custom-heading">
				<h1><span><?php wp_title(''); ?></span></h1>
			</div>
			<div class="desc-content clearfix">
				<div class="inner-content">
						<p>
							We can provide fitting samples for Orders request Decoration Services. After receipt of your Order and payment, one of our Team members will contact you for sample arrangement. Sample pack charge is $15 including freight to send over and return. The customer needs to return the samples within 14 days from dispatch of the samples and keep the samples in sound condition. If you want to make a change in your Order after fitting trial, please email to info@breelynuniforms.com.au for assessment and confirmation. <br>
							If you have special requirements on the samples, please call us at 1300 786 168 or email to info@breelynuniforms.com.au for detail.
						</p>
					</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/polo2.jpg" alt="#">
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12 content-panel">
					<div class="inner-panel">
						<?php echo do_shortcode('[contact-form-7 id="334" title="Sample Request Form"]'); ?>						
					</div>
					
				</div>

				
			</div>
		</div>
	</section>

<?php
get_footer();

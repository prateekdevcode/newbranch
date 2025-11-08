<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: About Breelyn
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
			<div class="desc-content about">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/image1.png" alt="#">
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="inner-panel">
						<p><strong>Breelyn Uniforms</strong> have been providing value oriented, customized and comprehensive uniform solutions to Australian businesses since 2004. Our mission is to make your team confidently presented and inspired to achieve with the sleek professional apparel.</p>
						<p>Breelyn Uniforms is also a niche uniform designer and manufacturer specializing in high end health apparel. Please visit our dedicated website www.breelynwear.com.au to see our collections.</p>

						<p>We understand uniform is just the beginning, it is equally important as to how to supply them, how to communicate with clients and how to cope with the issues arising in the process. The <strong>core values of our services</strong> are:</p>

						<p><strong>Accountability:</strong> Proactively accountable for our clients, eyes for detail.</p>

						<p><strong>Reliability:</strong> Flawless and mistake proof processing system, punctual on schedule.</p>

						<p><strong>Flexibility:</strong> Creatively and effectively cope with issues arising in the process.</p>

						<p><strong>Affordability:</strong> Cost effective supply chain and smart approach to generate benefits for clients.</p>

						<p><strong>Breelyn</strong> stands for <strong>Brilliant Apparel, Great Value.<strong></p>
					</div>
				</div>
			</div>
			
		</div>
	</section>

<?php
get_footer();

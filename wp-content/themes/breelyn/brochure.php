<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Brochure
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
			<div class="desc-content brochure">
				<div class="gallery-box">
					<div class="box-inner">
						<a title="Biz Collection Catalogue 2016" href="https://issuu.com/breelynuniforms/docs/2016_biz_collection_catalogue">
							<img class="size-full wp-image-7034 alignleft" src="<?php echo get_stylesheet_directory_uri(); ?>/images/Biz-Collection-Cover.jpg" alt="Biz Collection Cover">
						</a>
					</div>
				</div>
				<div class="gallery-box">
					<div class="box-inner">
						<a title="Biz Corporates Catalogue 2015" href="https://issuu.com/breelynuniforms/docs/2015_corporates_catalogue">
							<img class=" size-full wp-image-7035 alignleft" src="<?php echo get_stylesheet_directory_uri(); ?>/images/biz-corp-cover.jpg" alt="biz corp cover" >
						</a>
					</div>
				</div>
				<div class="gallery-box">
					<div class="box-inner">
						<a title="SYZMIK Catalogue 2015" href="https://issuu.com/breelynuniforms/docs/2015_syzmik_aus_lr">
							<img class=" size-full wp-image-7036 alignleft" src="<?php echo get_stylesheet_directory_uri(); ?>/images/Cover_Front-syzmik.jpg" alt="Cover_Front syzmik" >
						</a>
					</div>
				</div>
				<div class="gallery-box">
					<div class="box-inner">
						<a title="DNC Workwear Catalogue v12" href="https://issuu.com/breelynuniforms/docs/dnc_catalogue_v12">
							<img class=" size-full wp-image-7037 alignleft" src="<?php echo get_stylesheet_directory_uri(); ?>/images/DNC-Catalogue-V12-cover.jpg" alt="DNC0019_297x210mm_Catalogue12_1-47_Spreads.indd">
						</a>
					</div>
				</div>
				<div class="gallery-box">
					<div class="box-inner">
						<a title="John Kevin Catalogue 2015" href="https://issuu.com/breelynuniforms/docs/johnkevin-catalogue_2015">
							<img class=" size-full wp-image-7038 alignleft" src="<?php echo get_stylesheet_directory_uri(); ?>/images/jk-Cover.jpg" alt="jk Cover" >
						</a>
					</div>
				</div>
			</div>
			
		</div>
	</section>

<?php
get_footer();

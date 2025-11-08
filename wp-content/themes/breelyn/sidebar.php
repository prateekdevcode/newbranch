<?php //if( is_archive() ){ ?>
<?php if( is_woocommerce() ){ ?>
	
<div id="woocommerce-sidebar" role="complementary">
	
	
	<?php if ( is_active_sidebar( 'shop-sidebar' ) ) : ?>
		<div id="primary" class="widget-area">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'shop-sidebar' ); ?>
			</ul>
		</div>
	<?php endif; ?>
</div>

<?php } elseif( is_singular('product') ){ ?>

<?php //no sidebar for single product page ?>

<?php }else{ ?>

<div id="sidebar" role="complementary">
	<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
		<div id="primary" class="widget-area">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'blog-sidebar' ); ?>
			</ul>
		</div>
	<?php endif; ?>
</div>

<?php } ?>
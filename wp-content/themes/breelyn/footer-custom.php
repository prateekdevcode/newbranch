<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

	

<?php wp_footer(); ?>
<style>
form.cart {
    position: absolute;
    left: -200%;
}
</style>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/2.3.3/fabric.js"></script>-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/fabric.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/fabricExtensions.js"></script>
<script defer src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/customiseControls.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.6/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/colorPick.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/custom-scrollbar.js"></script>  -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/customization.js"></script>
<!--<script src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/custom.js"></script>-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/html2canvas.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/customproducts/js/jquery.panzoom.js"></script>
	<script type="text/javascript">
    jQuery(window).load(function () {
        //jQuery(".demo").customScrollbar();
        //$("#fixed-thumb-size-demo").customScrollbar({fixedThumbHeight: 50, fixedThumbWidth: 60});
    });
</script>

  </body>
</html>
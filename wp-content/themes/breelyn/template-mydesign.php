<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: My Designs
 *
 * @package storefront
 */

get_header(); ?>

<style>
	#myDesign{
		padding: 70px 0;
	}
	h1{
		display: flex;
		justify-content: space-between;
		align-items: center;
		margin-bottom: 50px !important;
	}
	h1 small{
		font-size: 15px;
		font-family: 'Open Sans', sans-serif;
		color: #000;
	}
	
	.stored_item{
		list-style: none;
		flex: 1;
	}
	.stored_item li{
		background: #fafafa;
		border-bottom: 1px solid #ddd;
		padding: 10px;
		display: flex;
		justify-content: space-around;
		align-items: center;

	}
	.stored_item li img{
		width: 60px
	}
	.previewArea{
		max-width: 500px;
		
		background: #ddd;
	}
	.previewArea img{
		padding:20px;
	}
	.previewArea .options{
		padding-bottom: 20px
	}
	.itemOptions{
		display: flex;
	}
	.current_active{
		background: #ddd !important;
	}
	.created b{
		display: block;
		color: #000;
		font-size: 10px
	}
	.loader{
		position: absolute;
		top: 0 !important;
		left: 0 !important;
		bottom: 0;
		right: 0;
		background: #fff;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.loader img{
		max-width: 80px;
	}
	#myDesign{
		position: relative;
	}
	#myDesign tbody tr td:first-child{
		min-width: 200px
	}
	#myDesign table tr td img{
		max-width: 110px;
	}
	table.details_table.show_full tr:nth-child(4n)~tr{
		display: none;
	}
	.view_full{
		position: absolute;
		right: 0;
		top: 20px;
	}
	.tableWrap {
		position: relative;
	}
</style>
	
	<Section id="myDesign">
		<div class="loader">
			<img src="https://breelynuniforms.com.au/wp-content/themes/breelyn/customproducts/images/loader.gif" >
		</div>
		<div class="container">
			
			<?php

				global $wpdb;	
				
				if(is_user_logged_in()){

					global $wpdb;		
					$current_user = get_current_user_id();			
					
					$query = 'SELECT * FROM wp_woo_savedproduct_details  WHERE user_id ='.$current_user.' ORDER BY `wp_woo_savedproduct_details`.`ID` DESC LIMIT 0,10';

					$result = $wpdb->get_results($query);

					?>
						<h1>My designs <small><b>Showing last <?php echo count($result); ?> stored designs</b></small></h1>
						<div class="itemOptions">
						<ul class="stored_item">
					<?php
					$c = 0;
					foreach ($result as $key => $stored_item) {
						$currentDesign = $stored_item->current_design;
						$itm_img = file_get_contents($currentDesign);
						$p_qtn = $stored_item->product_quantity;
						$variable_value = unserialize($stored_item->productsaved_data);
						
						if($key == 0){
							$latestImage = $itm_img;
							$others = $variable_value;
						}

						?>
						<li class="dFlx <?php if($key == 0){ echo "current_active"; } ?>" 
							data-id = "<?php echo $stored_item->ID; ?>"
							data-category="<?php echo $variable_value['category']; ?>"
							data-design="<?php echo $variable_value['design']; ?>"
							data-body-color="<?php echo $variable_value['main_body']; ?>"
							data-side-color="<?php echo $variable_value['side_body']; ?>"
							data-collar="<?php echo $variable_value['collar']; ?>"
							data-pattern_1="<?php echo $variable_value['pattern_1']; ?>"
							data-pattern_2="<?php echo $variable_value['pattern_2']; ?>"
							data-pattern_3="<?php echo $variable_value['pattern_3']; ?>"
							data-user-file="<?php echo $variable_value['user-file']; ?>"
							data-user-file-back="<?php echo $variable_value['user-file-back']; ?>"
							data-user-file-lsleeve="<?php echo $variable_value['user-file-lsleeve']; ?>"
							data-user-file-rsleeve="<?php echo $variable_value['user-file-rsleeve']; ?>"
							data-front-name="<?php echo $variable_value['front_name']; ?>"
							data-front-name-style="<?php echo $variable_value['front_name_style']; ?>"
							data-front-name-style="<?php echo $variable_value['front_name_color']; ?>"
							data-back-name="<?php echo $variable_value['back_name']; ?>"
							data-back-name-style="<?php echo $variable_value['back_name_style']; ?>"
							data-back-name-color="<?php echo $variable_value['back_name_color']; ?>"
							data-fabric-type="<?php echo $variable_value['fabric_type']; ?>"
							data-size-quantity="<?php echo $variable_value['size_quantity']; ?>"


							>
							<span class="key"><b><em><?php echo ($key + 1); ?></em></b></span>
							<span class="created"><b>Saved date:</b><?php echo $stored_item->created; ?></span>
							<div class="image"><img src="<?php echo $itm_img; ?>"></div>
							<button class="btn btn-primary btn-view"> Enlarge </button>
						</li>
						<?php
						$c++;
					}
				}else{
					global $wpdb;		
					$current_user = get_current_user_id();
					$user_ip = get_client_ip();	
					echo "<h1 style='justify-content:center;' > Your ip : ". $user_ip ." &nbsp; <a class='btn btn-success' href='https://breelynuniforms.com.au/my-account/'> LOGIN </a>&nbsp; </h1>";
					// for non logged users
							
					
					$query = 'SELECT * FROM wp_woo_savedproduct_details  WHERE `wp_woo_savedproduct_details`.`user_ip` = "'.$user_ip.'" ORDER BY `wp_woo_savedproduct_details`.`ID`  DESC LIMIT 0,10 ';

					$result = $wpdb->get_results($query);
					

					?>
						<h1>My designs <small><b>Showing last <?php echo count($result); ?> stored designs</b></small></h1>
						<div class="itemOptions">
						<ul class="stored_item">
					<?php
					$c = 0;
					foreach ($result as $key => $stored_item) {
						$currentDesign = $stored_item->current_design;
						$itm_img = file_get_contents($currentDesign);
						$p_qtn = $stored_item->product_quantity;
						$variable_value = unserialize($stored_item->productsaved_data);
						
						if($key == 0){
							$latestImage = $itm_img;
							$others = $variable_value;
						}

						?>
						<li class="dFlx <?php if($key == 0){ echo "current_active"; } ?>" 
							data-id = "<?php echo $stored_item->ID; ?>"
							data-category="<?php echo $variable_value['category']; ?>"
							data-design="<?php echo $variable_value['design']; ?>"
							data-body-color="<?php echo $variable_value['main_body']; ?>"
							data-side-color="<?php echo $variable_value['side_body']; ?>"
							data-collar="<?php echo $variable_value['collar']; ?>"
							data-pattern_1="<?php echo $variable_value['pattern_1']; ?>"
							data-pattern_2="<?php echo $variable_value['pattern_2']; ?>"
							data-pattern_3="<?php echo $variable_value['pattern_3']; ?>"
							data-user-file="<?php echo $variable_value['user-file']; ?>"
							data-user-file-back="<?php echo $variable_value['user-file-back']; ?>"
							data-user-file-lsleeve="<?php echo $variable_value['user-file-lsleeve']; ?>"
							data-user-file-rsleeve="<?php echo $variable_value['user-file-rsleeve']; ?>"
							data-front-name="<?php echo $variable_value['front_name']; ?>"
							data-front-name-style="<?php echo $variable_value['front_name_style']; ?>"
							data-front-name-style="<?php echo $variable_value['front_name_color']; ?>"
							data-back-name="<?php echo $variable_value['back_name']; ?>"
							data-back-name-style="<?php echo $variable_value['back_name_style']; ?>"
							data-back-name-color="<?php echo $variable_value['back_name_color']; ?>"
							data-fabric-type="<?php echo $variable_value['fabric_type']; ?>"
							data-size-quantity="<?php echo $variable_value['size_quantity']; ?>"


							>
							<span class="key"><b><em><?php echo ($key + 1); ?></em></b></span>
							<span class="created"><b>Saved date:</b><?php echo $stored_item->created; ?></span>
							<div class="image"><img src="<?php echo $itm_img; ?>"></div>
							<button class="btn btn-primary btn-view"> Enlarge </button>
						</li>
						<?php
						$c++;
					}

					// end






					
				}

			?>
			</ul>
			<?php if($latestImage){ 

				$variable_value = unserialize($result[0]->productsaved_data);

				?>
			<div class="previewArea">				
				<img src="<?php echo $latestImage; ?>">
				<div class="options">
					<ul class="row">
						<!-- <li class=" restore_btn col-md-4 text-center" data-id="<?php echo $result[0]->ID; ?>"> <button class="btn btn-primary btn-sm"> Restore design </button></li> -->
						<li class=" download_btn col-md-4 text-center" data-id="<?php echo $result[0]->ID; ?>"> <a class="btn btn-success btn-sm" href="<?php echo $latestImage; ?>" download="<?php echo date('Y-m-d H:i:s'); ?>" > Download design </a></li>
						<li class=" delete_btn col-md-4 text-center" data-id="<?php echo $result[0]->ID; ?>">
							<div > 
								<input type="hidden" id="data_ID" name="design_ID" value="<?php echo $result[0]->ID; ?>" /> 
								<button class="btn btn-danger btn-sm delete_design_form" > Delete design </button>
							</div>
							</li>
					</ul>
				</div>
				<div class="tableWrap">
					<button class="btn btn-danger btn-sm view_full"><i class="fa fa-eye"></i> <span>Expand options</span></button>
					<table class="details_table show_full">
						<thead>
							<th colspan="2">Details</th>
						</thead>
						<tbody>
							<tr>
								<td>Category</td>
								<td class="category"><?php echo $variable_value['category']; ?></td>
							</tr>
							<tr>
								<td>Design</td>
								<td class="design"><?php  ($variable_value['design'] !='') ? $val = $variable_value['design']: $val = '-'; echo $val; ?></td>
							</tr>
							<tr>
								<td>Body Color</td>
								<td class="body-color"><div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background: <?php  ($variable_value['main_body'] !='') ? $val = $variable_value['main_body']: $val = '-'; echo $val; ?>;">
									<?php  ($variable_value['main_body'] !='') ? $val = $variable_value['main_body']: $val = '-'; echo $val; ?>
								</div></td>
							</tr>
							<?php if($variable_value['pattern_1'] !=''){ ?>
							<tr>
								<td>Pattern 1</td>
								<td class="pattern_1"><div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background: <?php  ($variable_value['pattern_1'] !='') ? $val = $variable_value['pattern_1']: $val = '-'; echo $val; ?>;">
									<?php  ($variable_value['pattern_1'] !='') ? $val = $variable_value['pattern_1']: $val = '-'; echo $val; ?>
								</div></td>
							</tr>
							<?php } if($variable_value['pattern_2'] !=''){ ?>
							<tr>
								<td>Pattern 2</td>
								<td class="pattern_2"><div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background: <?php  ($variable_value['pattern_2'] !='') ? $val = $variable_value['pattern_2']: $val = '-'; echo $val; ?>;">
									<?php  ($variable_value['pattern_2'] !='') ? $val = $variable_value['pattern_2']: $val = '-'; echo $val; ?>
								</div></td>
							</tr>
							<?php } if($variable_value['pattern_3'] !=''){ ?>
							<tr>
								<td>Pattern 3</td>
								<td class="pattern_3"><div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background: <?php  ($variable_value['pattern_3'] !='') ? $val = $variable_value['pattern_3']: $val = '-'; echo $val; ?>;">
									<?php  ($variable_value['pattern_3'] !='') ? $val = $variable_value['pattern_3']: $val = '-'; echo $val; ?>
								</div></td>
							</tr>
						<?php } if($variable_value['user-file'] !=''){ ?>
							<tr>
								<td>Front Logo</td>
								<td class="front-logo"><img src="<?php echo $variable_value['user-file']; ?>" ></td>
							</tr>
						<?php } if($variable_value['user-file-back'] !=''){ ?>
							<tr>
								<td>Back Logo</td>
								<td class="back-logo"><img src="<?php echo $variable_value['user-file-back']; ?>" ></td>
							</tr>
						<?php } if($variable_value['user-file-lsleeve'] !=''){ ?>
							<tr>
								<td>Left Sleeve Logo</td>
								<td class="left-s-logo"><img src="<?php echo $variable_value['user-file-lsleeve']; ?>" ></td>
							</tr>
						<?php } if($variable_value['user-file-rsleeve'] !=''){ ?>
							<tr>
								<td>Right Sleeve Logo</td>
								<td class="right-s-logo"><img src="<?php echo $variable_value['user-file-rsleeve']; ?>" ></td>
							</tr>
						<?php } if($variable_value['front_name'] !=''){ ?>
							<tr>
								<td>Front Name</td>
								<td class="front-name"><?php  ($variable_value['front_name'] !='') ? $val = $variable_value['front_name']: $val = '-'; echo $val; ?></td>
							</tr>
						<?php } ?>
							<tr>
								<td>Back Name</td>
								<td class="back-name"><?php  ($variable_value['back_name'] !='') ? $val = $variable_value['back_name']: $val = '-'; echo $val; ?></td>
							</tr>
							<tr>
								<td>Back Name Color</td>
								<td class="back-name-color"><div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background: <?php  ($variable_value['back_name_color'] !='') ? $val = $variable_value['back_name_color']: $val = '-'; echo $val; ?>;">
									<?php  ($variable_value['back_name_color'] !='') ? $val = $variable_value['back_name_color']: $val = '-'; echo $val; ?>
								</div></td>
							</tr>
							<tr>
								<td>Fabric Type</td>
								<td class="fabric-type"><?php  ($variable_value['fabric_type'] !='') ? $val = $variable_value['fabric_type']: $val = '-'; echo $val; ?></td>
							</tr>
							<tr>
								<td>Size Quantity</td>
								<td class="size-quantity"><?php  ($variable_value['size_quantity'] !='') ? $val = $variable_value['size_quantity']: $val = '-'; echo $val; ?></td>
							</tr>
						</tbody>
					</table>
					
				</div>

			</div>
			<?php } ?>
			</div>
		</div>
	</Section>

<?php
get_footer();

?>

<script>

	jQuery(window).on('load',function(){
		jQuery('.loader').hide();
	})

	jQuery('.delete_design_form').on('click',function(e){
		e.preventDefault()

		console.log(jQuery(this).parent().find("#data_ID").val())

		jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", {
						'action': 'deleteItemAJAX_callback',
						'id' : jQuery(this).parent().find("#data_ID").val(),
					}, 
					function(rsp){
						window.location.reload()
					}
		);

	});
	jQuery('.btn-view').on('click',function(){

		jQuery('.delete_btn').attr('data-id', jQuery(this).parent().attr('data-id'));
		jQuery('.download_btn').attr('data-id', jQuery(this).parent().attr('data-id'));
		jQuery('.restore_btn').attr('data-id', jQuery(this).parent().attr('data-id'));
		jQuery('.delete_btn #data_ID').val(jQuery(this).parent().attr('data-id'));
		

		var src = jQuery(this).parent().find('.image img').attr('src');
		jQuery('.previewArea  img').attr('src',src);
		jQuery('.download_btn a').attr('href', src);

		jQuery('.details_table .category').html(jQuery(this).parent().attr('data-category') ? jQuery(this).parent().attr('data-category'):'-');
		jQuery('.details_table .design').html(jQuery(this).parent().attr('data-design') ? jQuery(this).parent().attr('data-design'): '-' );

		var body_color = (jQuery(this).parent().attr('data-body-color') ? jQuery(this).parent().attr('data-body-color'): '-' );
		if(body_color != '-'){
			jQuery('.details_table .body-color').html('<div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background:'+body_color+';">'+body_color+'</div>');
		}else{
			jQuery('.details_table .body-color').html('-');
		}


		var pattern_1 = (jQuery(this).parent().attr('data-pattern_1') ? jQuery(this).parent().attr('data-pattern_1'): '-' );
		if(pattern_1 != '-'){
			jQuery('.details_table .pattern_1').html('<div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background:'+pattern_1+';">'+pattern_1+'</div>');
		}else{
			jQuery('.details_table .pattern_1').html('-');
		}

		var pattern_2 = (jQuery(this).parent().attr('data-pattern_2') ? jQuery(this).parent().attr('data-pattern_2'): '-' );
		if(pattern_2 != '-'){
		jQuery('.details_table .pattern_2').html('<div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background:'+pattern_2+';">'+pattern_2+'</div>');
		}else{
			jQuery('.details_table .pattern_2').html('-');
		}

		var pattern_3 = (jQuery(this).parent().attr('data-pattern_3') ? jQuery(this).parent().attr('data-pattern_3'): '-' );
		if(pattern_3 != '-'){
			jQuery('.details_table .pattern_3').html('<div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background:'+pattern_3+';">'+pattern_3+'</div>');
		}else{
			jQuery('.details_table .pattern_3').html('-');
		}
		

		var front_logo = (jQuery(this).parent().attr('data-user-file') ? jQuery(this).parent().attr('data-user-file'): '-' );

		if(front_logo!='-'){
			jQuery('.details_table .front-logo').html('<img src="'+front_logo+'" >');
		}else{
			jQuery('.details_table .front-logo').html('Not set');
		}
		var back_logo = (jQuery(this).parent().attr('data-user-file-back') ? jQuery(this).parent().attr('data-user-file-back'): '-' );
		if(back_logo!='-'){
		jQuery('.details_table .back-logo').html('<img src="'+back_logo+'" >');
	    }else{
			jQuery('.details_table .back-logo').html('Not set');
		}
        var left_s_logo = (jQuery(this).parent().attr('data-user-file-lsleeve') ? jQuery(this).parent().attr('data-user-file-lsleeve'): '-' );
        if(left_s_logo!='-'){
		jQuery('.details_table .left-s-logo').html('<img src="'+left_s_logo+'" >');
	    }else{
			jQuery('.details_table .left-s-logo').html('Not set');
		}
		var right_s_logo = (jQuery(this).parent().attr('data-user-file-rsleeve') ? jQuery(this).parent().attr('data-user-file-rsleeve'): '-' );
		if(right_s_logo!='-'){
		jQuery('.details_table .right-s-logo').html('<img src="'+right_s_logo+'" >');
	    }else{
			jQuery('.details_table .right-s-logo').html('Not set');
		}

		jQuery('.details_table .front-name').html(jQuery(this).parent().attr('data-front-name') ? jQuery(this).parent().attr('data-front-name'): '-' );
		jQuery('.details_table .back-name').html(jQuery(this).parent().attr('data-back-name') ? jQuery(this).parent().attr('data-back-name'): '-' );

		var back_name_color = (jQuery(this).parent().attr('data-back-name-color') ? jQuery(this).parent().attr('data-back-name-color'): '-' );
		jQuery('.details_table .back-name-color').html('<div style="width: 100px;border:1px solid #ddd; color:#fff; height: 30px; text-align: center; background:'+back_name_color+';">'+back_name_color+'</div>');

		jQuery('.details_table .back-name-color').html(jQuery(this).parent().attr('data-back-name-color') ? jQuery(this).parent().attr('data-back-name-color'): '-' );
		jQuery('.details_table .fabric-type').html(jQuery(this).parent().attr('data-fabric-type') ? jQuery(this).parent().attr('data-fabric-type'): '-' );
		jQuery('.details_table .size-quantity').html(jQuery(this).parent().attr('data-size-quantity') ? jQuery(this).parent().attr('data-size-quantity'): '-' );


		jQuery(this).parent().addClass('current_active').siblings().removeClass('current_active');
	});


jQuery('.view_full').on('click',function(){
	jQuery(this).find('span').text() == 'Expand options' ? jQuery(this).find('span').text('Collapse options') : jQuery(this).find('span').text('Expand options')
	jQuery(this).parent().find('table').toggleClass('show_full');
});


jQuery('li.delete_btn button').on('click',function(){
	var data = {
         action: 'deleteItemAJAX_callback',         
     };


  //    jQuery.post("<?php echo admin_url('admin-ajax.php'); ?>", {
		// 				'action': 'deleteItemAJAX_callback',
		// 				'formmdate' : 'formmdata',
		// 			}, 
		// 			function(rsp){
						
		// 			}
		// );
    
});

</script>
<?php
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>


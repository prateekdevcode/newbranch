<?php
/**
 * List matched Rules in Table format
 *
 * This template can be overridden by copying it to yourtheme/plugin-folder-name/discount-table.php
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly
if (!isset($table_data) || empty($table_data)) return false;
$base_config = (is_string($data)) ? json_decode($data, true) : (is_array($data) ? $data : array());
$show_discount_table_header = isset($base_config['show_discount_table_header'])? $base_config['show_discount_table_header']: 'show';
$show_discount_title_table = isset($base_config['show_discount_title_table'])? $base_config['show_discount_title_table']: 'show';
$show_column_range_table = isset($base_config['show_column_range_table'])? $base_config['show_column_range_table']: 'show';
$show_column_discount_table = isset($base_config['show_column_discount_table'])? $base_config['show_column_discount_table']: 'show';
$arr = json_decode(json_encode($table_data), TRUE);
?>

<div class="discount_rule_heading"> <?php echo $arr[0][1]['title']; ?></div>
<table class="woo_discount_rules_table">
    <?php if($show_discount_table_header == 'show'){ ?>
        <thead>
        <tr class="wdr_tr_head">
            <?php if ($show_discount_title_table == 'show') { ?>
                <td class="wdr_td_head_title"><?php esc_html_e('Name', 'woo-discount-rules'); ?></td>
            <?php } ?>
            <?php if ($show_column_range_table == 'show') { ?>
                <td class="wdr_td_head_range"><?php esc_html_e('Range', 'woo-discount-rules'); ?></td>
            <?php } ?>
            <?php if ($show_column_discount_table == 'show') { ?>
                <td class="wdr_td_head_discount"><?php esc_html_e('Discount', 'woo-discount-rules'); ?></td>
            <?php } ?>
        </tr>
        </thead>
    <?php } ?>
    <tbody>
	<tr class="wdr_tr_body">
		<td class="wdr_td_body_range top-table-pos">
			<table>
				<tr><td>Quantity</td></tr>
				<tr><td>Discount</td></tr>
			</table>
		</td>
		<td>
			<table class="data-area">
				<tr>
					<?php
		$have_discount = false;
		$table = $table_data;
		$product_id = get_the_ID();
		$terms = get_the_terms ( $product_id, 'product_cat' );
		$cat_slug = [];
		foreach ( $terms as $term ) {
			 $cat_slug[] = $term->slug;
		}
		foreach ($table as $index => $item) {
			if ($item) {
				foreach ($item as $id => $value) { ?>
					<?php if ($show_column_range_table == 'show') { ?>
						<td class="wdr_td_body_range">
							<?php 
									
								if (in_array("decoration", $cat_slug)){
									echo $table_data_content[$index.$id]['condition'];									
								} else {
									$range = explode("-",$table_data_content[$index.$id]['condition']);
									echo $range[0] - 1; echo "+";
								}
							?>
						</td>
					<?php } ?>
				<?php }
				$have_discount = true;
			}
		} ?>
				</tr>
				<tr>
					<?php
		$have_discount = false;
		$table = $table_data;
		foreach ($table as $index => $item) {
			if ($item) {
				foreach ($item as $id => $value) { ?>
					<?php if ($show_column_discount_table == 'show') { ?>
						<td class="wdr_td_body_discount"><?php echo $table_data_content[$index.$id]['discount']; ?></td>
					<?php } ?>
				<?php }
				$have_discount = true;
			}
		} ?>
				</tr>
				<?php
    if (!$have_discount) {
        ?>
        <tr class="wdr_tr_body_no_discount">
            <td colspan="2">
                <?php esc_html_e('No Active Discounts.', 'woo-discount-rules'); ?>
            </td>
        </tr>
        <?php
    }
    ?>
			</table>
		</td>
		
	</tr>

	
	
    </tbody>
</table>

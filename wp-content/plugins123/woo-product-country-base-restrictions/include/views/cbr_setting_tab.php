<section id="cbr_content1" class="cbr_tab_section">
    <div class="cbr_tab_inner_container">
        <form method="post" id="cbr_setting_tab_form">
            <?php 
            
            ?>
            <table class="form-table heading-table">
            <tbody>
                <tr valign="top">
                    <td>
                        <h3 style=""><?php _e( 'General Setting', 'woo-product-country-base-restrictions' ); ?></h3>
                    </td>
                </tr>
             </tbody>
            </table>
			<?php $this->get_html( $this->get_general_settings() ); ?>
			<table class="form-table heading-table" style="border-bottom:1px solid #ccc;">
            <tbody>
                <tr valign="top">
                    <td>
                        <h3 style=""><?php _e( 'Catalog Visibility', 'woo-product-country-base-restrictions' ); ?></h3>
                    </td>
                </tr>
             </tbody>
            </table>
			<div class="main-panel hide-child-panel">
				<table class="form-table catelog_visibility">
					<tbody>
						<tr valign="top">
							<th>
								<label><input name="product_visibility" value="hide_completely" type="radio" class="product_visibility" checked/> <?php _e( 'Hide completely', 'woo-product-country-base-restrictions' ); ?></label>
							</th>
						</tr>
					</tbody>
				</table>
				<div class="inside">
					<p class="desc"><?php _e( 'This option will completely hide restricted products and product variations from your store (including a direct link)', 'woo-product-country-base-restrictions' ); ?></p>
					<?php $this->get_html( $this->get_hide_completely_settings() ); ?>
				</div>
			</div>
			<div class="main-panel hide-child-panel">
				<table class="form-table catelog_visibility">
					<tbody>
						<tr valign="top">
							<th>
								<label><input name="product_visibility" value="hide_catalog_visibility" type="radio" class="product_visibility" 
								<?php if( get_option("product_visibility") == 'hide_catalog_visibility' ) { echo 'checked'; } ?> /> <?php _e( 'Hide catalog visibility', 'woo-product-country-base-restrictions' ); ?></label>
							</th>

						</tr>
					</tbody>
				</table>
				<div class="inside">
					<p class="desc"><?php _e( 'This option will hide restricted products and product variations from your shop and search results, however these products will still be accessible and purchasable via direct link.', 'woo-product-country-base-restrictions' ); ?></p>
					<?php $this->get_html( $this->get_product_settings() ); ?>
				</div>
			</div>
			<div class="main-panel hide-child-panel" style="box-shadow:0 2px #ccc;">
				<table class="form-table catelog_visibility">
					<tbody>
						<tr valign="top">
							<th>
								<label><input name="product_visibility" value="show_catalog_visibility" type="radio" class="product_visibility" 
								<?php if( get_option("product_visibility") == 'show_catalog_visibility' ) { echo 'checked'; } ?> /> <?php _e( 'Catalog Visible', 'woo-product-country-base-restrictions' ); ?></label>
							</th>
						</tr>
					</tbody>
				</table>
				<div class="inside">
					<p class="desc"><?php _e( 'This option will display your products and product variations on the shop but not purchasable.', 'woo-product-country-base-restrictions' ); ?></p>
					<?php $this->get_html( $this->get_product_catelog_settings() ); ?>
				</div>
			</div>
            <div class="submit cbr-btn">
                <button name="save" class="cbr-save button-primary woocommerce-save-button" type="submit" value="Save changes">Save</button>
                <div class="spinner workflow_spinner" style="float:none"></div>
                <div class="success_msg workflow_success" style="display:none;">Settings saved successfully.</div>
                <div class="error_msg workflow_error" style="display:none;"></div>
                <div class="error_msg invalid_license" style="display:none;"></div>
                <?php wp_nonce_field( 'cbr_setting_form_action', 'cbr_setting_form_nonce_field' ); ?>
                <input type="hidden" name="action" value="cbr_setting_form_update">
            </div>
        </form>	
    </div>
    <div class="cbr_admin_sidebar">
    	<?php if ( !class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) ){ ?>
    		<div class="cbr_premium cbr-sidebar__section cbr-btn">                    	
                <h3><?php _e('Upgrade to PRO!') ?></h3>
                    <p><?php _e('Upgrade to the Pro version to be able to bulk restrict products by categories, tags, attributes, shipping class, and you can disable payment gateway methods by restricted countries and upload restrictions with a CSV file.') ?>
                    </p>						
                    <a href="https://www.zorem.com/products/country-based-restriction-pro/" class="cbr-btn" target="_blank"><span><?php _e('Upgrade to PRO >>') ?></span><i class="icon-angle-right"></i></a>
            </div>
    	<?php } ?>
        <?php if ( !class_exists( 'Country_Based_Restrictions_PRO_Add_on' ) ){ ?>
    		<div class="cbr_premium cbr-sidebar__section cbr-btn">                    	
                <img style="border: 1px solid #eee;" src="<?php echo plugin_dir_url(__FILE__)?>images/cbr-sidebar-banner.png">
            </div>
    	<?php } ?>
        <div class="cbr_launch cbr-sidebar__section cbr-btn">                    	
            <h3><?php _e('Your opinion matters to us!', '') ?></h3>
            <p><?php _e('If you enjoy using country based restriction for woocommerce plugin, please take a minute to review the plugin', '') ?><br>
            <span><?php _e('Thanks :)', 'woocommerce') ?></span>
            </p>						
            <a href="https://wordpress.org/support/plugin/woo-product-country-base-restrictions/reviews/#new-post" class="cbr-btn" target="_blank"><span><?php _e('Share your review >>', '') ?></span></a>
        </div>
        <div class="cbr-sidebar__section">
            <h3><?php _e('More plugins by zorem', '') ?></h3>
            <?php $plugin_list = WC_Settings_Tab_WPCBR()->get_zorem_pluginlist(); ?>	
        <ul>
            <?php foreach($plugin_list as $plugin){ 
                if( 'Sales Report Email for WooCommerce' != $plugin->title ) { 
                ?>
                    <li><img class="plugin_thumbnail" src="<?php echo $plugin->image_url; ?>"><a class="plugin_url" href="<?php echo $plugin->url; ?>" target="_blank"><?php echo $plugin->title; ?></a></li>
                <?php } 
            } ?>
            </ul>
        </div> 
    </div>
</section>
<?php
/*
Plugin Name: WP Comments Fields Manager
Plugin URI: http://www.najeebmedia.com
Description: This plugin allow users to add custom fields in post comments area.
Version: 2.3
Author: nmedia82
Author URI: http://www.najeebmedia.com/
Text Domain: nm-wpcomments
Domain Path:
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get the plugin url.
 *
 * @access public
 * @return string
 */
function wpcf_get_url() {
		return untrailingslashit( plugins_url( '/', __FILE__ ) );
}

/**
 * Get the plugin path.
 *
 * @access public
 * @return string
 */
function wpcf_get_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) );
}

/**
 * Get the plugin classes path.
 *
 * @access public
 * @return string
 */
function wpcf_get_class_path() {
		return untrailingslashit( plugin_dir_path( __FILE__ ) . '/classes/' );
}


/*
 * loading plugin config file
 */
require_once wpcf_get_path() . '/config.php';

/* ======= the plugin main class =========== */
require_once wpcf_get_class_path() . '/plugin.class.php';

/*
 * [1]
 * TODO: just replace class name with your plugin
 */
$nmwpcomment = NM_PLUGIN_WPComments::get_instance();
NM_PLUGIN_WPComments::init();


if ( is_admin() ) {
	require_once wpcf_get_class_path() . '/admin.class.php';
}
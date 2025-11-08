<?php
/*
Plugin Name: Divi Breadcrumbs Module
Plugin URI:  https://divibreadcrumbs.com/
Description: This plugin adds a Divi Builder Module which generates breadcrumb navigation menus. Each breadcrumb nav is highly customizable to suit every style imaginable.
Version:     2.1.2
Author:      Divi Codex
Author URI:  https://divicake.com/author/divicodex/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: dcbcm-divi-breadcrumbs-module
Domain Path: /languages

Divi Breadcrumbs Module is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Divi Breadcrumbs Module is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divi Breadcrumbs Module. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/


if ( ! function_exists( 'dcsbcm_initialize_extension' ) ):
	/**
	 * Creates the extension's main class instance.
	 *
	 * @since 2.0.0
	 */
	function dcsbcm_initialize_extension() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/DiviBreadcrumbsModule.php';
		require_once plugin_dir_path( __FILE__ ) . 'includes/functions.php';
	}
	add_action( 'divi_extensions_init', 'dcsbcm_initialize_extension' );
	endif;


/**
 * Plugin Updater
 * @since  1.0.3
*/
require_once('includes/plugin_update_check.php');
$KernlUpdater = new PluginUpdateChecker_2_0 (
	'https://kernl.us/api/v1/updates/5d0d47052ceb932b9673d488/',
	__FILE__,
	'divi-breadcrumbs-module',
	1
);
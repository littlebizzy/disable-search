<?php
/*
Plugin Name: Disable Search
Plugin URI: https://www.littlebizzy.com/plugins/disable-search
Description: Completely disables the built-in WordPress search function to prevent snoopers or bots from querying your database or slowing down your website.
Version: 1.0.3
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/


/* Initialization */

// Avoid script calls via plugin URL
if (!function_exists('add_action'))
	die;

// This plugin constants
define('DSBSRC_FILE', __FILE__);
define('DSBSRC_PATH', dirname(DSBSRC_FILE));
define('DSBSRC_VERSION', '1.0.3');


// Admin Notices module
require_once(dirname(__FILE__).'/admin-notices.php');
DSBSRC_Admin_Notices::instance(__FILE__, 'dsbsrc');
register_activation_hook(__FILE__, array(DSBSRC_Admin_Notices::instance(), 'activation'));
register_deactivation_hook(__FILE__, array(DSBSRC_Admin_Notices::instance(), 'deactivation'));


/**
 * Start current plugin
 */

// WP parse query hook
add_action('parse_query', 'dsbsrc_parse_query', 0);

// WP parse query handler
function dsbsrc_parse_query(&$wp_query) {
	if ($wp_query->is_main_query() && $wp_query->is_search) {
		require_once(DSBSRC_PATH.'/disable-search-404.php');
		DSBSRC_404::alter($wp_query);
	}
}
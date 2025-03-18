<?php
/*
Plugin Name: Disable Search
Plugin URI: https://www.littlebizzy.com/plugins/disable-search
Description: Completely disables WordPress search
Version: 2.0.0
Requires PHP: 7.0
Tested up to: 6.7
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Update URI: false
GitHub Plugin URI: littlebizzy/disable-search
Primary Branch: master
Text Domain: disable-search
*/

// prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// override wordpress.org with git updater
add_filter( 'gu_override_dot_org', function( $overrides ) {
    $overrides[] = 'disable-search/disable-search.php';
    return $overrides;
}, 999 );

// disable search queries
function disable_search_query($query) {
    if (!is_admin() && $query->is_search) {
        $query->is_search = false;
        $query->set_404();
        status_header(404);
        nocache_headers();
    }
}
add_action('parse_query', 'disable_search_query');

// remove search form
function disable_search_form($form) {
    return '';
}
add_filter('get_search_form', 'disable_search_form');

// disable search widget
function disable_search_widget() {
    unregister_widget('WP_Widget_Search');
}
add_action('widgets_init', 'disable_search_widget');

// remove search from admin bar
function disable_search_admin_bar($wp_admin_bar) {
    $wp_admin_bar->remove_node('search');
}
add_action('admin_bar_menu', 'disable_search_admin_bar', 999);

// Ref: ChatGPT

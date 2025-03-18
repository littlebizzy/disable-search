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

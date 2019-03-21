<?php
/*
Plugin Name: Disable Search
Plugin URI: https://www.littlebizzy.com/plugins/disable-search
Description: Completely disables the built-in WordPress search function to prevent snoopers or bots from querying your database or slowing down your website.
Version: 1.2.0
Author: LittleBizzy
Author URI: https://www.littlebizzy.com
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
PBP Version: 1.2.0
WC requires at least: 3.3
WC tested up to: 3.5
Prefix: DSBSRC
*/

// Plugin namespace
namespace LittleBizzy\DisableSearch;

// Plugin constants
const FILE = __FILE__;
const PREFIX = 'dsbsrc';
const VERSION = '1.2.0';
const REPO = 'littlebizzy/disable-search';

// Boot
require_once dirname(FILE).'/helpers/boot.php';
Helpers\Boot::instance(FILE);
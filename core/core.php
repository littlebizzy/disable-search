<?php

// Subpackage namespace
namespace LittleBizzy\DisableSearch\Core;

// Aliased namespaces
use \LittleBizzy\DisableSearch\Helpers;

/**
 * Core class
 *
 * @package Disable Search
 * @subpackage Core
 */
final class Core extends Helpers\Singleton {



	/**
	 * Pseudo constructor
	 */
	protected function onConstruct() {

		// Parse query hook
		add_action('parse_query', [$this, 'parseQuery'], 0);

		// Before to load first template
		add_action('template_redirect', [$this, 'removeAdminTopSearch'], PHP_INT_MAX);
	}



	/**
	 * Handles the parse query hook
	 */
	public function parseQuery($wp_query) {

		// Last minute check
		if (!$this->plugin->enabled('DISABLE_SEARCH')) {
			return;
		}

		// Check the original search query
		if ($wp_query->is_main_query() && $wp_query->is_search) {
			$factory = new Factory($this->plugin);
			$factory->disabler()->set404($wp_query);
		}
	}



	/**
	 * Remove top admin bar search
	 */
	public function removeAdminTopSearch() {

		// Last minute check
		if (!$this->plugin->enabled('DISABLE_SEARCH')) {
			return;
		}

		// Remove WP hook handler
		remove_action('admin_bar_menu', 'wp_admin_bar_search_menu', 4);
	}



}
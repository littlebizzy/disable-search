<?php

// Subpackage namespace
namespace LittleBizzy\DisableSearch\Search;

/**
 * Disabler class
 *
 * @package Disable Search
 * @subpackage Search
 */
class Disabler {



	/**
	 * Alter main query
	 */
	public function set404(&$wp_query) {

		// Destroy buffer
		@ob_clean();

		// Remove headers
		$this->removeHeaders();

		// Alter query flag
		$wp_query->is_search = false;

		// Alter 404 flag
		$wp_query->set_404();

		// 404 headers
		status_header(404);
		nocache_headers();
	}



	/**
	 * Remove any existing header
	 */
	private function removeHeaders() {

		// Check headers list
		$headers = @headers_list();
		if (empty($headers) || !is_array($headers)) {
			return;
		}

		// Check header_remove function (PHP 5 >= 5.3.0, PHP 7)
		$byFunction = function_exists('header_remove');

		// Enum and clean
		foreach ($headers as $header) {
			list($k, $v) = array_map('trim', explode(':', $header, 2));
			$byFunction? @header_remove($k) : @header($k.':');
		}
	}



}
<?php

/**
 * Disable Search - 404 class
 *
 * @package Disable Search
 * @subpackage Disable Search 404
 */
class DSBSRC_404 {



	/**
	 * Alter main query
	 */
	public static function alter(&$wp_query) {

		// Destroy buffer
		@ob_clean();

		// Remove headers
		self::remove_headers();

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
	private static function remove_headers() {

		// Check headers list
		$headers = @headers_list();
		if (!empty($headers) && is_array($headers)) {

			// Check header_remove function (PHP 5 >= 5.3.0, PHP 7)
			$by_function = function_exists('header_remove');

			// Enum and clean
			foreach ($headers as $header) {
				list($k, $v) = array_map('trim', explode(':', $header, 2));
				$by_function? @header_remove($k) : @header($k.':');
			}
		}
	}



}
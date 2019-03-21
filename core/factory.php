<?php

// Subpackage namespace
namespace LittleBizzy\DisableSearch\Core;

// Aliased namespaces
use \LittleBizzy\DisableSearch\Helpers;
use \LittleBizzy\DisableSearch\Search;

/**
 * Object Factory class
 *
 * @package WordPress Plugin
 * @subpackage Core
 */
class Factory extends Helpers\Factory {



	/**
	 * A core object
	 */
	protected function createDisabler() {
		return new Search\Disabler;
	}



}
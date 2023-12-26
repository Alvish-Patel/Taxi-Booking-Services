<?php

namespace CONEXI\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Hooks {


	function __construct() {

		add_action( 'conexi_main_header', array( $this, 'header' ) );
	}

	/**
	 * Hook up main headers with different header styles
	 *
	 * @return void This function returns nothing.
	 */
	function header() {


	}


}


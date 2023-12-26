<?php
/**
 * Theme config file.
 *
 * @package ThemeName
 * @author  AuthorName
 * @version 1.0
 * changed
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}

$config = array();

$config['default']['conexi_main_header'][] 	= array( 'conexi_preloader', 98 );
$config['default']['conexi_main_header'][] 	= array( 'conexi_main_header_area', 99 );

$config['default']['conexi_sidebar'][] 	    = array( 'conexi_sidebar', 99 );

$config['default']['conexi_banner'][] 	    = array( 'conexi_banner', 99 );


return $config;

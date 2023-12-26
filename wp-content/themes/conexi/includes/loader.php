<?php


defined( 'CONEXI_NAME' ) or define( 'CONEXI_NAME', 'conexi' );

define( 'CONEXI_ROOT', get_template_directory() . '/' );

require_once get_template_directory() . '/includes/functions/functions.php';
include_once get_template_directory() . '/includes/classes/base.php';
include_once get_template_directory() . '/includes/classes/dotnotation.php';
include_once get_template_directory() . '/includes/classes/header-enqueue.php';
include_once get_template_directory() . '/includes/classes/options.php';
include_once get_template_directory() . '/includes/classes/ajax.php';
include_once get_template_directory() . '/includes/classes/common.php';
include_once get_template_directory() . '/includes/classes/bootstrap_walker.php';
include_once get_template_directory() . '/includes/library/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/includes/library/hook.php';

// Merlin demo import.
require_once get_template_directory() . '/demo-import/class-merlin.php';
require_once get_template_directory() . '/demo-import/merlin-config.php';
require_once get_template_directory() . '/demo-import/merlin-filters.php';

add_action( 'after_setup_theme', 'conexi_wp_load', 5 );

function conexi_wp_load() {

	defined( 'CONEXI_URL' ) or define( 'CONEXI_URL', get_template_directory_uri() . '/' );
	define(  'CONEXI_KEY','!@#conexi');
	define(  'CONEXI_URI', get_template_directory_uri() . '/');

	if ( ! defined( 'CONEXI_NONCE' ) ) {
		define( 'CONEXI_NONCE', 'conexi_wp_theme' );
	}

	( new \CONEXI\Includes\Classes\Base )->loadDefaults();
	( new \CONEXI\Includes\Classes\Ajax )->actions();

}

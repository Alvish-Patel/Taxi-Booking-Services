<?php
if ( ! function_exists( "conexi_add_metaboxes" ) ) {
	function conexi_add_metaboxes( $metaboxes ) {
		$directories_array = array(
			'page.php',
			'projects.php',
			'service.php',
			'team.php',
			'testimonials.php',
			'event.php',
			'banner.php',
			'header.php',
			'footer.php',
			'sidebar.php',
			'menu.php',
			'post.php',
			'product.php',
			
		);
		foreach ( $directories_array as $dir ) {
			$metaboxes[] = require_once( CONEXIPLUGIN_PLUGIN_PATH . '/metabox/' . $dir );
		}

		return $metaboxes;
	}

	add_action( "redux/metaboxes/conexi_options/boxes", "conexi_add_metaboxes" );
}


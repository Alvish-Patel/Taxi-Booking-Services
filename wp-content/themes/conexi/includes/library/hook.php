<?php

/**
 * Hookup all the tags here.
 *
 * @package CONEXI
 * @author  Shahbaz Ahmed <shahbazahmed9@hotmail.com>
 * @version 1.0
 */

/**
 * Load the default config
 */
function conexi_load_default_hooks() {

	$config = conexi_WSH()->config( 'default' );

	if ( is_array( $config ) ) {

		foreach ( $config as $key => $more ) {

			foreach ( $more as $k => $value ) {
				$func = is_array( $value ) ? $value[0] : $value;

				$priority = isset( $value[1] ) ? $value[1] : 99;
				$params   = isset( $value[2] ) ? $value[2] : 2;

				add_action( $key, $func, $priority, $params );
			}
		}
	}
}

function conexi_preloader() {
	$options     = conexi_WSH()->option();

	if( ! $options->get('theme_preloader')) {
		return;
	}

	?>
	<div class="pageloaderx">
	      	
	</div><!-- Pageloader -->
	<?php
}
/**
 * [conexi_main_header_area description]
 *
 * @return [type] [description]
 */


function conexi_main_header_area() {

	$options     = conexi_WSH()->option();
    
    $header_type = '';
    $header_e = 0;
    $header_d = '';

    if( is_page() ) {
        $header_type = get_post_meta( get_the_ID(), 'header_source_type', true );
        $header_e    = get_post_meta( get_the_ID(), 'header_new_elementor_template', true );
        $header_d    = get_post_meta( get_the_ID(), 'header_style_settings');
	}
	
	if( ! $header_type || $header_type == 'd' ) {
	    
    	$header_type = $options->get( 'header_source_type' );
        $header_e = $options->get('header_elementor_template');
        $header_d = $options->get('header_style_settings');
        
	}

// echo $header_type;
// echo $header_e;exit;
        if ( $header_type == 'e' AND class_exists( '\Elementor\Plugin' ) AND $header_e ) {
            echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_e );

            return false;
        } elseif ( $header_type == 'd' AND class_exists( '\Elementor\Plugin' ) AND $header_d ) {
            $header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
			$header_option = $options->get( 'header_style_settings' );
			$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
		}else {
            $header_meta = get_post_meta( get_the_ID(), 'header_style_settings');
			$header_option = $options->get( 'header_style_settings' );
			$header = ( $header_meta ) ? $header_meta['0'] : $header_option;
		}

	if ( $header == 'header_v1' ) {
		conexi_template_load( 'templates/header/default-header.php' );
	} elseif ( $header == 'header_v2' ) {
		conexi_template_load( 'templates/header/header_v2.php' );
	} elseif ( $header == 'header_v3' ) {
		conexi_template_load( 'templates/header/header_v3.php' );
	} else {
		conexi_template_load( 'templates/header/default-header.php' );
	}
}

/**
 * [conexi_sidebar description]
 *
 * @return [type] [description]
 */

function conexi_sidebar( $data ) {

	conexi_template_load( 'templates/sidebar.php', compact( 'data' ) );
}

/**
 * [conexi_banner description]
 *
 * @return [type] [description]
 */

function conexi_banner( $data ) {

	conexi_template_load( 'templates/banner/banner.php', compact( 'data' ) );

}
<?php
/**
 * Theme functions and definitions.
 */
function conexi_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'conexi-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'conexi-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'conexi-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'conexi-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'conexi_child_enqueue_styles' );
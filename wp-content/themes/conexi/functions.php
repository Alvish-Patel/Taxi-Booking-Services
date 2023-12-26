<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'conexi_setup_theme' );
add_action( 'after_setup_theme', 'conexi_load_default_hooks' );


function conexi_setup_theme() {

	load_theme_textdomain( 'conexi', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	
	add_theme_support('woocommerce');
	add_theme_support('wc-product-gallery-lightbox');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	//Register image sizes
	add_image_size( 'conexi_370x220', 370, 220, true ); //'conexi_370x220 Our Services'
	add_image_size( 'conexi_80x80', 80, 80, true ); //'conexi_80x80 Our Testimonials'
	add_image_size( 'conexi_140x100', 140, 100, true ); //'conexi_140x100 Team Slider'
	add_image_size( 'conexi_360x475', 360, 475, true ); //'conexi_360x475 Team Slider'
	add_image_size( 'conexi_370x240', 370, 240, true ); //'conexi_370x240 Latest News'
	add_image_size( 'conexi_370x420', 370, 420, true ); //'conexi_370x420 Our Team'
	add_image_size( 'conexi_85x95', 85, 95, true ); //'conexi_85x95 service Block 2'
	add_image_size( 'conexi_90x90', 890, 90, true ); //'conexi_90x90 Widget'
	add_image_size( 'conexi_1170x420', 1170, 450, true ); //'conexi_1170x450 single'

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'conexi' ),
		'onepage_menu' => esc_html__( 'One Page Menu', 'conexi' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'conexi_admin_init', 2000000 );
}

/**
 * [conexi_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function conexi_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( CONEXI_NAME . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'conexi' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'conexi' ),
		'before_widget' => '<div id="%1$s" class="mrsidebar widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title"><h3>',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'conexi'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'conexi'),
		'before_widget'=>'<div class="mrfooter footer-column col-xl-4 col-lg-4 col-md-6 col-sm-12"><div id="%1$s" class="single-footer-widget footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<div class="title"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
	));
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'conexi' ),
	  'id' => 'blog-sidebar',
	 	'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'conexi' ),
		'before_widget' => '<div id="%1$s" class="mrsidebar widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="sidebar-title"><h3>',
		'after_title'   => '</h3></div>',
	));
	if ( ! is_object( conexi_WSH() ) ) {
		return;
	}

	$sidebars = conexi_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( conexi_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h4>',
			'after_title'   => '</h4></div>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'conexi_widgets_init' );

/**
 * [conexi_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function conexi_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/**
 * [conexi_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'conexi_set' ) ) {
	function conexi_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}
/**
 * product per page
 */
add_filter( 'loop_shop_per_page', 'conexi_loop_shop_per_page', 20 );

function conexi_loop_shop_per_page( $cols ) {
		$options     = conexi_WSH()->option();		
		$shop_product = esc_attr( $options->get( 'shop_product') );	
		
  // $cols contains the current number of products per page based on the value stored on Options –> Reading
  // Return the number of products you wanna show per page.
  $cols =  $shop_product;
  return $cols;
}

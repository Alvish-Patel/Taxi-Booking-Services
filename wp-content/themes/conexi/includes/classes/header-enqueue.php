<?php

namespace CONEXI\Includes\Classes;


/**
 * Header and Enqueue class
 */
class Header_Enqueue {


	public static function init() {
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue' ) );

		add_filter( 'wp_resource_hints', array( __CLASS__, 'resource_hints' ), 10, 2 );
	}

	/**
	 * Gets the arrays from method scripts and styles and process them to load.
	 * Styles are being loaded by default while scripts only enqueue and can be loaded where required.
	 *
	 * @return void This function returns nothing.
	 */
	public static function enqueue() {

		self::scripts();

		self::styles();

	}

	/**
	 * The major scripts loader to load all the scripts of the theme. Developer can hookup own scripts.
	 * All the scripts are being load in footer.
	 *
	 * @return array Returns the array of scripts to load
	 */
	public static function scripts() {
		$options = get_theme_mod( CONEXI_NAME . '_options-mods' );
		$ssl     = is_ssl() ? 'https' : 'http';

		$scripts = array(
			'bundle'         => 'assets/js/bootstrap.bundle.min.js',
			'select'         => 'assets/js/bootstrap-select.min.js',
			'bxslider'         => 'assets/js/jquery.bxslider.min.js',
			'counterup'         => 'assets/js/jquery.counterup.min.js',
			'magnific-popup'         => 'assets/js/jquery.magnific-popup.min.js',
			'owl-carousel-min'         => 'assets/js/owl.carousel.min.js',
			'waypoints'         => 'assets/js/waypoints.min.js',
			'jquery-cookie'        => 'assets/js/jquery.cookie.js',
			'themepanel'        => 'assets/js/themepanel.js',
			'jquery-fancybox'        => 'assets/js/jquery.fancybox.js',
			'paroller'        => 'assets/js/jquery.paroller.min.js',
			//'nice-select'        => 'assets/js/jquery.nice-select.js',
			//'nice-select-min'        => 'assets/js/jquery.nice-select.min.js',
			'jqquery-filter'        => 'assets/js/jqquery.filter.js',
			
			'main-script'    => 'assets/js/theme.js',
			
		);

		$scripts = apply_filters( 'CONEXI/includes/classes/header_enqueue/scripts', $scripts );
		/**
		 * Enqueue the scripts
		 *
		 * @var array
		 */
		foreach ( $scripts as $name => $js ) {

			if ( strstr( $js, 'http' ) || strstr( $js, 'https' ) || strstr( $js, 'googleapis.com' ) ) {

				wp_register_script( "{$name}", $js, '', '', true );
			} else {
				wp_register_script( "{$name}", get_template_directory_uri() . '/' . $js, '', '', true );
			}
		}

		wp_enqueue_script( array(
			'jquery',
			'bundle',
			'select',
			'bxslider',
			'counterup',
			'magnific-popup',
			'owl-carousel-min',
			'waypoints',
			'jquery-cookie',
			'themepanel',
			'jquery-fancybox',
			'paroller',
			//'nice-select',
			//'nice-select-min',
			'jqquery-filter',
			'main-script',
		) );


		$header_data = array(
			'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
			'nonce'   => wp_create_nonce( CONEXI_NONCE ),
		);

		wp_localize_script( 'jquery', 'conexi_data', $header_data );

		if ( conexi_set( $options, 'footer_js' ) ) {

			wp_add_inline_script( 'jquery', conexi_set( $options, 'footer_js' ) );
		}

	}

	/**
	 * The major styles loader to load all the styles of the theme. Developer can hookup own styles.
	 * All the styles are being load in head.
	 *
	 * @return array Returns the array of styles to load
	 */
	public static function styles() {
		
		 $options     = conexi_WSH()->option();		
		 $maincolor = esc_attr( $options->get( 'theme_color_scheme') );		
	     $maincolor = str_replace( '#', '' , $maincolor );	
		 wp_enqueue_style( 'main-color', get_template_directory_uri() . '/assets/css/color.php?main_color='.$maincolor );
		$styles = array(
			'google-fonts'      => self::fonts_url(),
			'animate'       => 'assets/css/animate.css',
			'bootstrap'       => 'assets/css/bootstrap.min.css',
			'bootstrap-select'       => 'assets/css/bootstrap-select.min.css',
			'fontawesome-all'       => 'assets/css/fontawesome-all.css',
			'hover-min'       => 'assets/css/hover-min.css',
			'bxslider'       => 'assets/css/jquery.bxslider.min.css',
			'magnific-popup'       => 'assets/css/magnific-popup.css',
			'owl-carousel'       => 'assets/css/owl.carousel.css',
			'conexi-icon'       => 'assets/fonts/conexi-icon/style.css',
			'default'       => 'assets/css/owl.theme.default.min.css',
			'woocommerce'       => 'assets/css/woocommerce.css',
			'rtl'       => 'assets/css/rtl.css',
			'fancybox'       => 'assets/css/jquery.fancybox.min.css',
			'style3'       => 'assets/css/style3.css',
			'style4'       => 'assets/css/style4.css',
			//'nice-select'       => 'assets/css/nice-select.css',
			'main-style'        => 'assets/css/style.css',
			
		//Temp
			'color-panel'        => 'assets/temp/color-panel.css',
			
		//This is Theme Styles
			'error'             => 'assets/css/theme/error.css',
			'sidebar'         => 'assets/css/theme/sidebar.css',
			'tut'             => 'assets/css/theme/tut.css',
			'fixing'             => 'assets/css/theme/fixing.css',
			'responsive'        => 'assets/css/responsive.css',
		);

		$styles = apply_filters( 'CONEXI/includes/classes/header_enqueue/styles', $styles );

		/**
		 * Enqueue the styles
		 *
		 * @var array
		 */
		foreach ( $styles as $name => $style ) {

			if ( strstr( $style, 'http' ) || strstr( $style, 'https' ) || strstr( $style, 'fonts.googleapis' ) ) {
				wp_enqueue_style( "conexi-{$name}", $style );
			} else {
				wp_enqueue_style( "conexi-{$name}", get_template_directory_uri() . '/' . $style );
			}
		}
		$options      = conexi_WSH()->option();
		$custom_style = '';

		wp_add_inline_style( 'color', $custom_style );

		$header_styles = self::header_styles(); 
		
		if ( $custom_font = $options->get('theme_custom_font') ) {
            $header_styles .= conexi_custom_fonts_load( $custom_font );
        }

		wp_add_inline_style( 'conexi-main-style', $header_styles );

		if( $options->get('theme_preloader') ) {
			wp_enqueue_style('conexi_preloader', get_template_directory_uri().'/assets/css/theme/loader.min.css');
		}

	}

	/**
	 * Register custom fonts.
	 */
	public static function fonts_url() {
		$fonts_url = '';

		$font_families['Poppins']      = 'Poppins:300,300i,400,400i,500,500i,600,600i,700';
		$font_families['Rubik']      = 'Rubik:300,300i,400,400i,500,500i,700,700i,900,900i';

		$font_families['Kaushan']     = 'Kaushan Script';
		
		$font_families = apply_filters( 'CONEXI/includes/classes/header_enqueue/font_families', $font_families );

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$protocol  = is_ssl() ? 'https' : 'http';
		$fonts_url = add_query_arg( $query_args, $protocol . '://fonts.googleapis.com/css' );

		return esc_url_raw($fonts_url);
	}


	/**
	 * Add preconnect for Google Fonts.
	 *
	 * @since CONEXI 1.0
	 *
	 * @param array  $urls          URLs to print for resource hints.
	 * @param string $relation_type The relation type the URLs are printed.
	 *
	 * @return array $urls           URLs to print for resource hints.
	 */
	public static function resource_hints( $urls, $relation_type ) {
		if ( wp_style_is( 'conexi-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		}

		return $urls;
	}

	/**
	 * header_styles
	 *
	 * @since CONEXI 1.0
	 *
	 * @param array $urls URLs to print for resource hints.
	 */
	public static function header_styles() {

		$data = \CONEXI\Includes\Classes\Common::instance()->data( 'blog' )->get();

		$options = conexi_WSH()->option();

		$styles = '';
		if ( $options->get( 'footer_top_button' ) ) :
			$styles .= "#topcontrol {
				background: " . $options->get( 'button_bg' ) . " none repeat scroll 0 0 !important;
				opacity: 0.5;

				color: " . $options->get( 'button_color' ) . " !important;

			}";

		endif;

		$settings = get_theme_mod( CONEXI_NAME . '_options-mods' );

		if ( $custom_font = conexi_set( $settings, 'theme_custom_font' ) ) {

			$styles .= apply_filters('conexi_redux_custom_fonts_load', $custom_font );


		}

		return $styles;
	}


}
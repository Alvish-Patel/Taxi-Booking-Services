<?php

namespace CONEXIPLUGIN\Element;


class Elementor {
	static $widgets = array(
		'slider',
		'booking',
		'about',
		'funfact',
		'cta',
		'tab',
		'clients',
		'service_icon',
		'taxi_fare',
		'testimonials',
		'h1_blog_title',
		'blog_left',
		'blog_right',
		'cta2',
		'footer',
		'slider2',
		'about2',
		'service_img',
		'cta3',
		'team',
		'blog2',
		'about3',
		'history',
		'taxi_details',
		'faq',
		'similar_taxis',
		'book_ride',
		'contact',
		'footer_widget1',
        'footer_widget2',
        'footer_widget3',
        'footer_widget4',
        'footer_bottom',
		'h3_slider',
        'h3_clients',
        'h3_service',
        'h3_chooseus_left',
        'h3_chooseus_right',
        'h3_looking',
        'h3_welcome',
        'h3_pricing',
        'h3_testimonials',
        'h3_application_left',
        'h3_application_right',
        'h3_cta',
        'h3_blog',
        'h4_slider',
		'h4_form',
        'h4_feature',
        'h4_introduction_left',
        'h4_introduction_right',
        'h4_cta',
        'h4_introduction_left2',
        'h4_introduction_right2',
        'h4_pricing_title',
        'h4_pricing',
        'h4_testimonials',
        'h4_team',
        'h4_cta2',
        'h4_blog',
        'team_overlay',
        'product_pricing',
        'mr_productsearch',
        //'tabproduct',
        'mr_product_tab',
		//'mr_product_ajax'
	);

	static function init() {
		add_action( 'elementor/init', array( __CLASS__, 'loader' ) );
		add_action( 'elementor/elements/categories_registered', array( __CLASS__, 'register_cats' ) );
	}

	static function loader() {

		foreach ( self::$widgets as $widget ) {

			$file = CONEXIPLUGIN_PLUGIN_PATH . '/elementor/' . $widget . '.php';
			if ( file_exists( $file ) ) {
				require_once $file;
			}

			add_action( 'elementor/widgets/widgets_registered', array( __CLASS__, 'register' ) );
		}
	}

	static function register( $elemntor ) {
		foreach ( self::$widgets as $widget ) {
			$class = '\\CONEXIPLUGIN\\Element\\' . ucwords( $widget );

			if ( class_exists( $class ) ) {
				$elemntor->register_widget_type( new $class );
			}
		}
	}

	static function register_cats( $elements_manager ) {

		$elements_manager->add_category(
			'conexi',
			[
				'title' => esc_html__( 'Conexi', 'conexi' ),
				'icon'  => 'fa fa-plug',
			]
		);
		$elements_manager->add_category(
			'templatepath',
			[
				'title' => esc_html__( 'Template Path', 'conexi' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}
}

Elementor::init();
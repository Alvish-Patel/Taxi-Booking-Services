<?php

return array(
	'title'      => esc_html__( 'Shop Page Settings', 'conexi' ),
	'id'         => 'shop_setting',
	'desc'       => '',
	'icon'       => ' fa fa-shopping-cart',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'      => 'shop_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'shop Source Type', 'conexi' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'conexi' ),
				'e' => esc_html__( 'Elementor', 'conexi' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'shop_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'conexi' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'shop_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'shop_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'shop Default', 'conexi' ),
			'indent'   => true,
			'required' => [ 'shop_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'shop_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'conexi' ),
			'default' => true,
		),
		array(
			'id'       => 'shop_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'conexi' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'conexi' ),
			'required' => array( 'shop_page_banner', '=', true ),
		),
	
		array(
			'id'       => 'shop_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'conexi' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'conexi' ),
			'default'  => array(
				'url' => CONEXI_URI . 'assets/images/pagetitle.jpg',
			),
			'required' => array( 'shop_page_banner', '=', true ),
		),

		array(
			'id'       => 'shop_sidebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout', 'conexi' ),
			'subtitle' => esc_html__( 'Select main content and sidebar alignment.', 'conexi' ),
			'options'  => array(

				'left'  => array(
					'alt' => esc_html__( '2 Column Left', 'conexi' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cl.png',
				),
				'full'  => array(
					'alt' => esc_html__( '1 Column', 'conexi' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/1col.png',
				),
				'right' => array(
					'alt' => esc_html__( '2 Column Right', 'conexi' ),
					'img' => get_template_directory_uri() . '/assets/images/redux/2cr.png',
				),
			),

			'default' => 'right',
		),

		array(
			'id'       => 'shop_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'conexi' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'conexi' ),
			'required' => array(
				array( 'shop_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => conexi_get_sidebars(),
		),
	

		  array (
        'id'       => 'shop_column',
        'type'     => 'select',
        'title'    => __('Shop Column', 'conexi'), 
        'desc'     => __('This is Shop Column', 'conexi'),
         // Must provide key => value pairs for select options
        'options'  => array(
            '6' => 'Two Column',
            '4' => 'Three Column',
            '3' => 'Four Column',
			'2' => 'Six Column',
            ),
        'default'  => '2',
    ),
	  array (
        'id'       => 'shop_product',
        'type'     => 'text',
        'title'    => __('Number of Products', 'conexi'), 
        'desc'     => __('This is Number of Products', 'conexi'),
        'default'  => '8',
    ),

		array(
			'id'       => 'shop_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'shop_source_type', '=', 'd' ],
		),
	),
);






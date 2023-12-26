<?php
return array(
	'title'      => esc_html__( 'Logo Setting', 'conexi' ),
	'id'         => 'logo_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		array(
			'id'       => 'image_favicon',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Favicon', 'conexi' ),
			'subtitle' => esc_html__( 'Insert site favicon image', 'conexi' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/favicon.png' ),
			//'required' => array( array( 'logo_type', 'equals', 'image' ) ),
		),
		
	// ===Classic Logo Area====		
		array(
            'id' => 'normal_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable Normal Logo', 'conexi'),
            'default' => true,
        ),
		array(
			'id'       => 'image_normal_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Normal Logo', 'conexi' ),
			'subtitle' => esc_html__( 'Insert site normal logo image', 'conexi' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/logo.png' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),
		array(
			'id'       => 'normal_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Normal Logo Dimentions', 'conexi' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'conexi' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'normal_logo_show', '=', true ),
		),

	// ===2nd Logo Area====	
		array(
            'id' => 'two_logo_show',
            'type' => 'switch',
            'title' => esc_html__('Enable 2nd Logo', 'conexi'),
            'default' => true,
        ),
		array(
			'id'       => 'image_two_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( '2nd Logo', 'conexi' ),
			'subtitle' => esc_html__( 'Insert site 2nd Logo logo image', 'conexi' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/logo.png' ),
			'required' => array( 'two_logo_show', '=', true ),
		),
		array(
			'id'       => 'two_logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( '2nd Logo Dimentions', 'conexi' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'conexi' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array( 'two_logo_show', '=', true ),
		),
		

		
		
	
		
		array(
			'id'       => 'logo_settings_section_end',
			'type'     => 'section',
			'indent'      => false,
			//'required' => [ 'header_source_type', '=', 'd' ],
		),
	),
);

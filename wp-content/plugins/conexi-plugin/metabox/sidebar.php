<?php

return array(
	'id'     => 'conexi_sidebar_settings',
	'title'  => esc_html__( "Conexi Sidebar Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'sidebar_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Sidebar Source Type', 'conexi' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'conexi' ),
				'e' => esc_html__( 'Elementor', 'conexi' ),
			),
			'default'=> '',
		),
		array(
			'id'       => 'sidebar_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'sidebar_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'sidebar_sidebar_layout',
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
			'required' => [ 'sidebar_source_type', '=', 'd' ],
		),

		array(
			'id'       => 'sidebar_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'conexi' ),
			'required' => array(
				array( 'sidebar_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => conexis_get_sidebars(),
			'required' => [ 'sidebar_source_type', '=', 'd' ],
		),
	),
);
<?php

return array(
	'id'     => 'conexi_footer_settings',
	'title'  => esc_html__( "Conexi Footer Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'conexi' ),
			'options' => array(
				'd'    => esc_html__( 'Default', 'conexi' ),
				'e'    => esc_html__( 'Elementor', 'conexi' ),
				'none' => esc_html__( 'Off', 'conexi' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'viral-buzz' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		),
		array(
			'id'       => 'footer_style_settings',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Choose Footer Styles', 'conexi' ),
			'options'  => array(
				'header_v1' => array(
					'alt' => 'Footer Style 1',
					'img' => get_template_directory_uri() . '/assets/images/redux/footer/f1.png',
				),
				
			),
			'required' => array( array( 'footer_source_type', 'equals', 'd' ) ),
		),
	),
);
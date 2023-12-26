<?php

return array(
	'id'     => 'conexi_menu_settings',
	'title'  => esc_html__( "Conexi Menu Settings", "konia" ),
	'fields' => array(
		array(
			'id'      => 'menu_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Menu Source Type', 'conexi' ),
			'options' => array(
				'd'    => esc_html__( 'Default', 'conexi' ),
				'e'    => esc_html__( 'Elementor', 'conexi' ),
			),
			'default' => '',
		),
		array(
			'id'       => 'menu_elementor_template',
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
					'id'    => 'testimonial_rating',
					'type'  => 'select',
					'title' => esc_html__( 'Choose the Client Rating', 'conexi' ),
					'options'  => array(
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
					),
					'default'  => '5',
				),
	),
);
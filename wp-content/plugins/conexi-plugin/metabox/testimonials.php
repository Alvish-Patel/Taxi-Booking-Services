<?php
return array(
	'title'      => 'Conexi Testimonials Setting',
	'id'         => 'conexi_meta_testimonials',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'conexi_testimonials' ),
	'sections'   => array(
		array(
			'id'     => 'conexi_testimonials_meta_setting',
			'fields' => array(
				array(
					'id'    => 'test_designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'conexi' ),
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
		),
	),
);
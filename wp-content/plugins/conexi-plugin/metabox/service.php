<?php
return array(
	'title'      => 'Conexi Service Setting',
	'id'         => 'conexi_meta_service',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'conexi_service' ),
	'sections'   => array(
		array(
			'id'     => 'conexi_service_meta_setting',
			'fields' => array(
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'conexi' ),
					'options'  => get_fontawesome_icons(),
				),
				array(
					'id'    => 'ext_url',
					'type'  => 'text',
					'title' => esc_html__( 'Enter Read More Link', 'conexi' ),
				),
			),
		),
	),
);
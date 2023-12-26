<?php
return array(
	'title'      => 'Conexi Team Setting',
	'id'         => 'conexi_meta_team',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'conexi_team' ),
	'sections'   => array(
		array(
			'id'     => 'conexi_team_meta_setting',
			'fields' => array(
				array(
					'id'    => 'designation',
					'type'  => 'text',
					'title' => esc_html__( 'Designation', 'conexi' ),
				),
				array(
					'id'    => 'team_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'conexi' ),
				),
				array(
					'id'    => 'social_profile',
					'type'  => 'social_media',
					'title' => esc_html__( 'Social Profiles', 'conexi' ),
				),
			),
		),
	),
);
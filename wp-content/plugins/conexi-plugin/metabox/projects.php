<?php
return array(
	'title'      => 'Conexi Project Setting',
	'id'         => 'conexi_meta_projects',
	'icon'       => 'el el-cogs',
	'position'   => 'normal',
	'priority'   => 'core',
	'post_types' => array( 'conexi_project' ),
	'sections'   => array(
		array(
			'id'     => 'conexi_projects_meta_setting',
			'fields' => array(
				array(
					'id'       => 'before_img',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Work Before Image', 'conexi' ),
					'desc'     => esc_html__( 'Insert Work Before Image URl', 'conexi' ),
				),
				array(
					'id'    => 'before_title',
					'type'  => 'text',
					'title' => esc_html__( 'Before Title', 'conexi' ),
				),
				array(
					'id'    => 'before_link',
					'type'  => 'text',
					'title' => esc_html__( 'Before Link', 'conexi' ),
				),
				array(
					'id'       => 'after_img',
					'type'     => 'media',
					'url'      => true,
					'title'    => esc_html__( 'Work After Image', 'conexi' ),
					'desc'     => esc_html__( 'Insert Work After Image URl', 'conexi' ),
				),
				array(
					'id'    => 'after_title',
					'type'  => 'text',
					'title' => esc_html__( 'After Title', 'conexi' ),
				),
				array(
					'id'    => 'after_link',
					'type'  => 'text',
					'title' => esc_html__( 'After Link', 'conexi' ),
				),
				array(
					'id'    => 'project_link',
					'type'  => 'text',
					'title' => esc_html__( 'Read More Link', 'conexi' ),
				),
			),
		),
	),
);
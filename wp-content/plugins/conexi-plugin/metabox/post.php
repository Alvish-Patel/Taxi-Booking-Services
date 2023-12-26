<?php
return array(
	'title' => 'Conexi Post Setting',
	'id' => 'conexi_meta_post',
	'icon' => 'el el-cogs',
	'position' => 'normal',
	'priority' => 'core',
	'post_types' => array( 'post' ),
	'sections' => array(
		array(
			'id' => 'indext_post_meta_setting',
			'fields' => array(
				array(
					'id' => 'meta_image',
					'type' => 'media',
					'title' => esc_html__( 'Meta image', 'conexi' ),
				),
				array(
					'id'    => 'subtitle',
					'type'  => 'text',
					'title' => esc_html__( 'Subtitle', 'conexi' ),
				),

			),
		),
	),
);
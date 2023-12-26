<?php
return array(
    'title' => 'Shop Product Meta',
    'id' => 'conexi_meta_post',
    'icon' => 'el el-cogs',
    'position' => 'normal',
    'priority' => 'core',
    'post_types' => array( 'product' ),
    'sections' => array(
        array(
            'id' => 'indext_post_meta_setting',
            'fields' => array(
                array(
                    'id' => 'meta_image',
                    'type' => 'media',
                    'title' => esc_html__( 'Brand Image', 'conexi' ),
                ),
				
				array(
					'id'       => 'service_icon',
					'type'     => 'select',
					'title'    => esc_html__( 'Service Icons', 'conexi' ),
					'options'  => get_fontawesome_icons(),
				),	
			/*	
                array(
                    'id'    => 'subtitle',
                    'type'  => 'text',
                    'title' => esc_html__( 'Subtitle', 'conexi' ),
                ),
				*/

            ),
        ),
    ),
);
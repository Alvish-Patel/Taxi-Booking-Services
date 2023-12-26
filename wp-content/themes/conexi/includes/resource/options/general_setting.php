<?php
$styles = [];
foreach(range(1, 28) as $val) {
    $styles[$val] = sprintf(esc_html__('Style %s', 'conexi'), $val);
}

return  array(
    'title'      => esc_html__( 'General Setting', 'conexi' ),
    'id'         => 'general_setting',
    'desc'       => '',
    'icon'       => 'el el-wrench',
    'fields'     => array(
		array(
            'id' => 'theme_color_scheme',
            'type' => 'color',
            'output' => array('.site-title'),
            'title' => esc_html__('Color Scheme', 'conexi'),
            'default' => '#ffcd03',
            'transparent' => false
        ),
        array(
            'id' => 'theme_preloader',
            'type' => 'switch',
            'title' => esc_html__('Enable Preloader', 'conexi'),
            'default' => true,
        ),
      
        array(
            'id' => 'theme_scroll',
            'type' => 'switch',
            'title' => esc_html__('Hide Scroll to Top', 'conexi'),
            'default' => true,
        ),
		 array(
            'id' => 'theme_rtl',
            'type' => 'switch',
            'title' => esc_html__('Select RTL', 'conexi'),
            'default' => false,
        ),
		
    ),
);

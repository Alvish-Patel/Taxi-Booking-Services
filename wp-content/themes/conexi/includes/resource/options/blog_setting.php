<?php

return array(
	'title'  => esc_html__( 'Blog Page Settings', 'conexi' ),
	'id'     => 'blog_setting',
	'desc'   => '',
	'icon'   => 'el el-indent-left',
	'fields' => array(
		array(
			'id'      => 'blog_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Blog Source Type', 'conexi' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'conexi' ),
				'e' => esc_html__( 'Elementor', 'conexi' ),
			),
			'default' => 'd',
		),
		array(
			'id'       => 'blog_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'conexi' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'=> -1,
			],
			'required' => [ 'blog_source_type', '=', 'e' ],
		),

		array(
			'id'       => 'blog_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Blog Default', 'conexi' ),
			'indent'   => true,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
/*
		array(
			'id'      => 'blog_page_banner',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Banner', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show banner on blog', 'conexi' ),
			'default' => true,
		),
		
		array(
			'id'       => 'blog_banner_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Banner Section Title', 'conexi' ),
			'desc'     => esc_html__( 'Enter the title to show in banner section', 'conexi' ),
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'blog_page_breadcrumb',
			'type'     => 'raw',
			'content'  => "<div style='background-color:#c33328;color:white;padding:20px;'>" . esc_html__( 'Use Yoast SEO plugin for breadcrumb.', 'conexi' ) . "</div>",
			'required' => array( 'blog_page_banner', '=', true ),
		),
		array(
			'id'       => 'blog_page_background',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Background Image', 'conexi' ),
			'desc'     => esc_html__( 'Insert background image for banner', 'conexi' ),
			'default'  => array(
				'url' => CONEXI_URI . 'assets/images/top-title-bg.jpg',
			),
			'required' => array( 'blog_page_banner', '=', true ),
		),

		array(
			'id'       => 'blog_sidebar_layout',
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

			'default' => 'right',
		),

		array(
			'id'       => 'blog_page_sidebar',
			'type'     => 'select',
			'title'    => esc_html__( 'Sidebar', 'conexi' ),
			'desc'     => esc_html__( 'Select sidebar to show at blog listing page', 'conexi' ),
			'required' => array(
				array( 'blog_sidebar_layout', '=', array( 'left', 'right' ) ),
			),
			'options'  => conexi_get_sidebars(),
		),
*/	
		
		array(
			'id'      => 'blog_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Comments', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show post comments on posts listing', 'conexi' ),
			'default' => true,
		),
		
		array(
			'id'      => 'blog_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show author on posts listing', 'conexi' ),
			'default' => true,
		),
		array(
			'id'      => 'blog_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Post Date', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show post data on posts listing', 'conexi' ),
			'default' => true,
		),
	
		


		array(
			'id'      => 'blog_post_readmore',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Blog Read More', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show post data on posts listing', 'conexi' ),
			'default' => true,
		),
		array(
		    'id'       => 'blog_post_readmoretext',
		    'type'     => 'text',
		    'title'    => esc_html__( 'Read More Text', 'conexi' ),
		    'desc'     => esc_html__( 'Enter Read More Text to Show.', 'conexi' ),
			'default'  => esc_html__( 'Read More', 'conexi' ),
	    ),
		
		array(
			'id'       => 'blog_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'blog_source_type', '=', 'd' ],
		),
	),
);






<?php

return array(
	'title'      => esc_html__( 'Single Post Settings', 'conexi' ),
	'id'         => 'single_post_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'single_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Single Post Source Type', 'conexi' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'conexi' ),
				'e' => esc_html__( 'Elementor', 'conexi' ),
			),
			'default' => 'd',
		),

		array(
			'id'       => 'single_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Post Default', 'conexi' ),
			'indent'   => true,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
		array(
			'id'      => 'single_post_date',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Date', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show post publish date on posts detail page', 'conexi' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_author',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Author', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show author on posts detail page', 'conexi' ),
			'default' => true,
		),

		array(
			'id'      => 'single_post_comments',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Comments', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show number of comments on posts single page', 'conexi' ),
			'default' => true,
		),
	

		array(
			'id'      => 'single_post_tag',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Tags', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show post tags on posts single page', 'conexi' ),
			'default' => true,
		),
		array(
			'id'      => 'single_post_share',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Social Share', 'conexi' ),
			'desc'    => esc_html__( 'Enable to show social Share options', 'conexi' ),
			'default' => false,
		),
		array(
			'id'       => 'single_social_share',
			'type'     => 'sortable',
			'title'    => esc_html__( 'Post Sharing Icons', 'conexi' ),
			'subtitle' => esc_html__( 'Select icons to activate social sharing icons in post detail page', 'conexi' ),
			'required' => array( 'blog_post_share', '=', true ),
			'mode'     => 'checkbox',
			'required' => array( 'single_post_share', '=', true ),
			'options'  => array(
				'facebook'    => esc_html__( 'Facebook', 'conexi' ),
				'twitter'     => esc_html__( 'Twitter', 'conexi' ),
				'gplus'       => esc_html__( 'Google Plus', 'conexi' ),
				'digg'        => esc_html__( 'Digg Digg', 'conexi' ),
				'reddit'      => esc_html__( 'Reddit', 'conexi' ),
				'linkedin'    => esc_html__( 'Linkedin', 'conexi' ),
				'pinterest'   => esc_html__( 'Pinterest', 'conexi' ),
				'stumbleupon' => esc_html__( 'Sumbleupon', 'conexi' ),
				'tumblr'      => esc_html__( 'Tumblr', 'conexi' ),
				'email'       => esc_html__( 'Email', 'conexi' ),
			),
		),

		
		array(
			'id'       => 'single_section_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'single_source_type', '=', 'd' ],
		),
	),
);






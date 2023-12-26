<?php
return array(
	'title'      => esc_html__( 'Header 1 Setting', 'conexi' ),
	'id'         => 'header_setting',
	'desc'       => '',
	'subsection' => true,
	'fields'     => array(
		array(
			'id'      => 'logo_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Logo Style', 'conexi' ),
			'desc'    => esc_html__( 'Select anyone logo style to show in header', 'conexi' ),
			'options' => array(
				'image' => esc_html__( 'Image Logo', 'conexi' ),
				'text'  => esc_html__( 'Text Logo', 'conexi' ),
			),
			'default' => 'image',
		),
		array(
			'id'       => 'image_logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Logo', 'conexi' ),
			'subtitle' => esc_html__( 'Insert site logo image with adjustable size for the logo section', 'conexi' ),
			'default'  => array( 'url' => get_template_directory_uri() . '/assets/images/logo.png' ),
			'required' => array( array( 'logo_type', 'equals', 'image' ) ),
		),
		array(
			'id'       => 'logo_dimension',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Dimentions', 'conexi' ),
			'subtitle' => esc_html__( 'Select Logo Dimentions', 'conexi' ),
			'units'    => array( 'em', 'px', '%' ),
			'default'  => array( 'Width' => '', 'Height' => '' ),
			'required' => array(
				array( 'logo_type', 'equals', 'image' ),
			),
		),
		array(
			'id'       => 'logo_text',
			'type'     => 'text',
			'title'    => esc_html__( 'Logo Text', 'conexi' ),
			'subtitle' => esc_html__( 'Enter Logo Text', 'conexi' ),
			'required' => array(
				array( 'logo_type', 'equals', 'text' ),
			),
		),
		array(
			'id'          => 'logo_typography',
			'type'        => 'typography',
			'title'       => esc_html__( 'Typography', 'conexi' ),
			'google'      => true,
			'font-backup' => false,
			'text-align'  => false,
			'line-height' => false,
			'output'      => array( 'h2.site-description' ),
			'units'       => 'px',
			'subtitle'    => esc_html__( 'Select Styles for text logo', 'conexi' ),
			'default'     => array(
				'color'       => '#333',
				'font-style'  => '700',
				'font-family' => 'Abel',
				'google'      => true,
				'font-size'   => '33px',
			),
			'required'    => array(
				array( 'logo_type', 'equals', 'text' ),
			),
		),

		array(
			'id'    => 'header_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'conexi' ),
			'desc'  => esc_html__( 'Click an icon to activate social profile icons in header.', 'conexi' ),
		),
	),
);

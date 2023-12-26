<?php

//search  999
/*======Pre Define Area Atart=====*/
$footer_source_type = array(
			'id'      => 'footer_source_type',
			'type'    => 'button_set',
			'title'   => esc_html__( 'Footer Source Type', 'conexi' ),
			'options' => array(
				'd' => esc_html__( 'Default', 'conexi' ),
				'e' => esc_html__( 'Elementor', 'conexi' ),
			),
			'default' => 'd',
		);		
$footer_elementor_template = array(
			'id'       => 'footer_elementor_template',
			'type'     => 'select',
			'title'    => __( 'Template', 'conexi' ),
			'data'     => 'posts',
			'args'     => [
				'post_type' => [ 'elementor_library' ],
				'posts_per_page'	=> -1
			],
			'required' => [ 'footer_source_type', '=', 'e' ],
		);

$footer_default_st=array(
			'id'       => 'footer_default_st',
			'type'     => 'section',
			'title'    => esc_html__( 'Footer Default', 'conexi' ),
			'indent'   => true,
			'required' => [ 'footer_source_type', '=', 'd' ],
		);

/*----Do Not Edit Above---*/		
$footer_background=array(
			'id'      => 'footer_background',
			'type'    => 'media',
			'title'   => esc_html__( 'Footer Background', 'conexi' ),
			'default' => array( 'url' => CONEXI_URI . 'assets/images/parallax.png' ),
		);
$footer_social_share=array(
			'id'    => 'footer_social_share',
			'type'  => 'social_media',
			'title' => esc_html__( 'Social Profiles', 'conexi' ),
		);

$footer_subarea= array(
			'id'      => 'footer_subarea',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Subscribe Area', 'conexi' ),
			'desc'    => esc_html__( 'Enable to Show Subscribe', 'conexi' ),
			'default' => true,
		);
$footer_area= array(
			'id'      => 'footer_area',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Footer Area', 'conexi' ),
			'desc'    => esc_html__( 'Enable to Footer Area', 'conexi' ),
			'default' => true,
		);
$footer_shape= array(
			'id'      => 'footer_shape',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Shape', 'conexi' ),
			'desc'    => esc_html__( 'Enable to Shape', 'conexi' ),
			'default' => true,
		);		
		
$copyright_area= array(
			'id'      => 'copyright_area',
			'type'    => 'switch',
			'title'   => esc_html__( 'Show Footer Copyright Area', 'conexi' ),
			'desc'    => esc_html__( 'Enable to Copyright Area', 'conexi' ),
			'default' => true,
		);		
$footer_sbcid= array(
			'id'      => 'footer_sbcid',
			'type'    => 'textarea',
			'title'   => __( 'Subscribe ID', 'conexi' ),
			'desc'    => esc_html__( 'Enter Subscribe ID', 'conexi' ),
		);	
$footer_subtitle= array(
			'id'      => 'footer_subtitle',
			'type'    => 'textarea',
			'title'   => __( 'Footer Subtitle', 'conexi' ),
			'desc'    => esc_html__( 'Enter Footer Subtitle', 'conexi' ),
		);	
$footer_title= array(
			'id'      => 'footer_title',
			'type'    => 'textarea',
			'title'   => __( 'Footer Title', 'conexi' ),
			'desc'    => esc_html__( 'Enter Footer Title', 'conexi' ),
		);
$footer_text= array(
			'id'      => 'footer_text',
			'type'    => 'textarea',
			'title'   => __( 'Footer Text', 'conexi' ),
			'desc'    => esc_html__( 'Enter Footer Text', 'conexi' ),
		);
$footer_bttn= array(
			'id'      => 'footer_bttn',
			'type'    => 'textarea',
			'title'   => __( 'Footer Button', 'conexi' ),
			'desc'    => esc_html__( 'Enter Footer Button', 'conexi' ),
		);
$footer_sbcrbttn= array(
			'id'      => 'footer_sbcrbttn',
			'type'    => 'textarea',
			'title'   => __( 'Subscribe Button', 'conexi' ),
			'desc'    => esc_html__( 'Enter Subscribe Button', 'conexi' ),
		);		
		
$copyright_text= array(
			'id'      => 'copyright_text',
			'type'    => 'textarea',
			'title'   => __( 'Copyright Text', 'conexi' ),
			'desc'    => esc_html__( 'Enter the Copyright Text', 'conexi' ),
		);

$footer_js=array(
			'id'       => 'footer_js',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'Footer Javascript', 'conexi' ),
			'subtitle' => esc_html__( 'Enter javascript code to add in page footer section', 'conexi' ),
			'mode'     => 'javascript',
			'theme'    => 'monokai',
		);
$footer_default_ed = array(
			'id'       => 'footer_default_ed',
			'type'     => 'section',
			'indent'   => false,
			'required' => [ 'footer_source_type', '=', 'd' ],
		);
/*======Pre Define Area End=====  999 */
return array(
	'title'      => esc_html__( 'Footer Setting', 'conexi' ),
	'id'         => 'footer_setting',
	'desc'       => '',
	'subsection' => false,
	'fields'     => array(
		
		$footer_source_type,
		$footer_elementor_template,
		$footer_default_st,
		//Edit Bellow Array
		//$footer_area,
		//$footer_background,
		//$footer_shape,
		//$footer_subarea,
		//$footer_sbcid,
		//$footer_sbcrbttn,
		//$footer_subtitle,
		//$footer_title,
		//$footer_text,
		//$footer_bttn,
		//$footer_social_share,
		$copyright_area,
		$copyright_text,
		$footer_js,
		$footer_default_ed,
	),
);

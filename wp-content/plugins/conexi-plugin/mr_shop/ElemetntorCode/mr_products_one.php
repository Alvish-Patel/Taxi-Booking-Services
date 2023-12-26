<?php

namespace CONEXIPLUGIN\Element;
use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/*
index
Genaral 111
Meta 222
Slider 333
Section Title 444
Section Sub Title 555
Product Price 666
Product Title 777
Thumbnail 888
Rating 999
Quick View aaa
Hot/Sale bbb
Block ccc
Rendar Area ddd
HTML are index eee	
*/


class Mr_Products_One extends Widget_Base {

	public function get_name() {
		return 'ecolab_mr_products_one';
	}

	public function get_title() {
		return esc_html__( 'Products One', 'ecolab' );
	}

	public function get_icon() {
		return ' **';
	}

	public function get_categories() {
		return [ 'ecolab' ];
	}
		
	protected function _register_controls() {
	// indext  111	
		$this->start_controls_section(
			'Settings',
			[
				'label' => esc_html__( 'Genaral Settings ', 'ecolab' ),
			]
		);

		
	$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Headings', 'ecolab' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Special Products', 'ecolab' ),
			)
		);
	$this->add_control(
			'subtitle',
			array(
				'label'   => esc_html__( 'Sub Title', 'ecolab' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Sub Title Text', 'ecolab' ),
				'separator' => 'after'
			)
		);


		$this->add_control(
            'style', 
				[
					'label'   => esc_html__( 'Choose Style', 'ecolab' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'one',
					'options' => array(
						'one' => esc_html__( 'Style One', 'ecolab' ),
						'two' => esc_html__( 'Style Two', 'ecolab' ),
					),
				]
		);


	$this->add_control(
			'product_grid_type',
			array(
				'label'   => esc_html__( 'Products Type', 'ecolab' ),
				'type'    =>  \Elementor\Controls_Manager::SELECT,
				'default' => 'recent_products',
				'options' => array(
					'featured_products'     => esc_html__( 'Featured Products', 'ecolab' ),
					'sale_products'         => esc_html__( 'Sale Products', 'ecolab' ),
					'best_selling_products' => esc_html__( 'Best Selling Products', 'ecolab' ),
					'recent_products'       => esc_html__( 'Recent Products', 'ecolab' ),
					'top_rated_products'    => esc_html__( 'Top Rated Products', 'ecolab' ),
					'product_category'      => esc_html__( 'Product Category', 'ecolab' ),
					'product_tag'      => esc_html__( 'Product Tag', 'ecolab' ),
				),
			)
		);


	$this->add_control(
	            'query_category', 
				array(
	                'label' => __( 'Select Category', 'ecolab' ),
	                'condition' => array(
						'product_grid_type' => 'product_category',
					),
	                'type' => \Elementor\Controls_Manager::SELECT2,
	                'multiple' => true,
	                'options' => mr_product_cat_list(),
	                'default' => [ 'all' ],
	            )
			);


	$this->add_control(
            'query_tag',
          array(
                'label' => __( 'Select Tags', 'ecolab' ),
                'condition' => array(
					'product_grid_type' => 'product_tag',
				),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => mr_product_tag_list(),
                'default' => [ 'all' ],
            )
        );

		$this->add_control(
            'columns',
            array(
                'label' => __( 'Columns Settings', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '1'  => __( '1 Column', 'plugin-domain' ),
                    '2' => __( '2 Columns', 'plugin-domain' ),
                    '3' => __( '3 Columns', 'plugin-domain' ),
                    '4' => __( '4 Columns', 'plugin-domain' ),
					'5' => __( '5 Columns', 'plugin-domain' ),
					'6' => __( '6 Columns', 'plugin-domain' ),
					'12' => __( '12 Columns', 'plugin-domain' ),
                ],
            )
        );


      $this->add_control(
			'query_number',
			  array(
			
				'label'   => esc_html__( 'Number of post', 'ecolab' ),
				'label_block' => false,
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			)
		);
   
     $this->add_control(
			'query_orderby',
		  array(
				'label'   => esc_html__( 'Order By', 'ecolab' ),
				'label_block' => false,
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'ecolab' ),
					'title'      => esc_html__( 'Title', 'ecolab' ),
					'menu_order' => esc_html__( 'Menu Order', 'ecolab' ),
					'rand'       => esc_html__( 'Random', 'ecolab' ),
				),
			)
		);

   $this->add_control(
			'query_order',
			array(
				'label'   => esc_html__( 'Order', 'ecolab' ),
				'label_block' => false,
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'ecolab' ),
					'ASC'  => esc_html__( 'ASC', 'ecolab' ),
				),
				'separator' => 'after'
			)
		);





$this->end_controls_section();
//End of Genaral Settings	
//
//	Meta sEttings ARea	===========================
// indext  222
		$this->start_controls_section(
					'meta_settings',
					[
						'label' => __( 'Meta Settings', 'ecolab' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);		
		

		$this->add_control(
                'show_hot',
               array(
                    'label' => __( 'Show Hot Tag', 'ecolab' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Hot Tag', 'ecolab' ),
                )
            );
		    $this->add_control(
            'hot_text',
            array(
                'label'       => __( 'Hot/Sale Text', 'ecolab' ),
                 'condition'    => array( 'show_hot' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Hot/Sale', 'ecolab' ),
			   'separator' => 'after'
            )
        );
				
//Wish List

       $this->add_control(
                'show_whishlist',
                array(
                    'label' => __( 'Show Wish List', 'ecolab' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Wish List', 'ecolab' ),
                )
            );
	  $this->add_control(
	            'whish_list',
	             array(
	                'label'       => __( 'Wish List Shortcode', 'ecolab' ),
	                'condition'    => array( 'show_whishlist' => '1' ),
	                'type'        => \Elementor\Controls_Manager::TEXT,
	                'dynamic'     => [
	                  'active' => true,
	                ],
	                'default'     => __( '[yith_wcwl_add_to_wishlist]', 'ecolab' ),
	                'placeholder' => __( '[yith_wcwl_add_to_wishlist]', 'ecolab' ),
	            )
	        );


      $this->add_control(
            'wishlist_tooltip',
            array(
                'label'       => __( 'Tooltip Wish list Text', 'ecolab' ),
                    'condition'    => array( 'show_whishlist' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Wish List', 'ecolab' ),
				'separator' => 'after'
            )
        );
     

//Show Compare
        $this->add_control(
                'show_compare',
                 array(
                    'label' => __( 'Show Compare', 'ecolab' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Compare', 'ecolab' ),
                )
            );

      $this->add_control(
            'compare_tooltip',
            array(
                'label'       => __( 'Tooltip Compare', 'ecolab' ),
                    'condition'    => array( 'show_compare' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Compare', 'ecolab' ),
			   'separator' => 'after'
            )
        );

//Quick view

   	  	$this->add_control(
            'quickview',
         	array(
                'label'       => __( 'Quickview Shortcode', 'ecolab' ),
                'condition'    => array( 'show_quickview' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'default'     => __( '[yith_quick_view product_id='.get_the_ID().' ]', 'ecolab' ),
                'placeholder' => __( '[yith_quick_view product_id='.get_the_ID().' ]', 'ecolab' ),

           )
        );
		
//add to cart 

        $this->add_control(
                'show_addtocart',
                array(
                    'label' => __( 'Show Add to cart', 'ecolab' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                    'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Show Add tp Cart', 'ecolab' ),
                )
            );



      $this->add_control(
            'addtocart_tooltip',
            array(
                'label'       => __( 'Tooltip Add to Cart', 'ecolab' ),
                    'condition'    => array( 'show_addtocart' => '1' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Add to Cart', 'ecolab' ),
				    'separator' => 'after'
            )
        );
$this->end_controls_section();		
//End of Meta Settings	======================

//Start Slider


// indext  333	
  	$this->start_controls_section(
					'slider_settings',
					[
						'label' => __( 'Slider Settings', 'ecolab' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);	  
         //Slider Area Code
    $this->add_control(
                'show_slider',
                 array(
                    'label' => __( 'Show Slider', 'ecolab' ),
                    'type'     => \Elementor\Controls_Manager::SWITCHER,
                     'return_value' => '1',
                     'default'      => '1',
                    'placeholder' => __( 'Enable Slider', 'ecolab' ),
                )
            );


    $this->add_control(
            'owl_dot', 
                 array(
                    'label'   => esc_html__( 'Choose Style', 'ecolab' ),
                    'condition'    => array( 'show_slider' => '1' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => array(
                        '1' => esc_html__( 'Nav Arrow', 'ecolab' ),
                        '2' => esc_html__( 'Owl Dot', 'ecolab' ),
                        '3' => esc_html__( 'No Nav', 'ecolab' ),
                   
                    ),
                )
        );

       $this->add_control(
            'awl_loop', 
                array(
                    'label'   => esc_html__( 'Choose Style', 'ecolab' ),
                    'condition'    => array( 'show_slider' => '1' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => array(
                        '1' => esc_html__( 'Auto Play', 'ecolab' ),
                        '2' => esc_html__( 'Disable Auto Play', 'ecolab' ),

                    ),
                 )
        );

        $this->add_control(
            'awl_lazy', 
                array(
                    'label'   => esc_html__( 'Choose Style', 'ecolab' ),
                    'condition'    => array( 'show_slider' => '1' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => array(
                        '1' => esc_html__( 'Lazy Load', 'ecolab' ),
                        '2' => esc_html__( 'Disable Lazy Load', 'ecolab' ),

                    ),
                 )
        );



//End of slider		
           		
$this->end_controls_section();  
//End of Settings Area================================		

		
		$this->start_controls_section(
			'section_title_settings',
			array(
				'label' => __( 'Section Title Setting', 'ecolab' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
	// indext  444		
	$this->add_control(
			'show_section_title',
			array(
				'label' => esc_html__( 'Show Section Title', 'ecolabe' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'display: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'section_title_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ecolab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ecolab' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ecolab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_section_title' => 'show' ),
				'toggle' => true,
				'selectors' => array(
				
					'{{WRAPPER}} .sec-title h2' => 'text-align: {{VALUE}} !important',
				),
			)
		);			


	$this->add_control(
			'section_title_padding',
			array(
				'label'     => __( 'Padding', 'ecolab' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'section_title_typography',
				'condition'    => array( 'show_section_title' => 'show' ),
				'label'    => __( 'Typography', 'ecolab' ),
				'selector' => '{{WRAPPER}} .sec-title h2',
			)
		);
		$this->add_control(
			'section_title_color',
			array(
				'label'     => __( 'Color', 'ecolab' ),
				'condition'    => array( 'show_section_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}} !important',
		
				),
			)
		);



		$this->end_controls_section();


//End of  Title 	==================	
//Section Sub Title	==================	
	
// indext  555
		$this->start_controls_section(
			'section_subtitle_settings',
			array(
				'label' => __( 'Section Sub Title Setting', 'ecolab' ),
			
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
	
	$this->add_control(
			'show_section_subtitle',
			array(
				'label' => esc_html__( 'Show Sections Sub Title', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title' => 'display: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'section_subtitle_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ecolab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ecolab' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ecolab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_section_subtitle' => 'show' ),
				'toggle' => true,
				'selectors' => array(
				
					'{{WRAPPER}} .sec-title .sub-title' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'section_subtitle_padding',
			array(
				'label'     => __( 'Padding', 'ecolab' ),
				'condition'    => array( 'show_section_subtitle' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
			'{{WRAPPER}} .sec-title .sub-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',		
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
		
			array(
				'name'     => 'section_subtitle_typography',
				'condition'    => array( 'show_section_subtitle' => 'show' ),
				'label'    => __( 'Typography', 'ecolab' ),
				'selector' => '{{WRAPPER}} .sec-title .sub-title',
			)
		);
		
		
		$this->add_control(
			'section_subtitle_color',
			array(
				'label'     => __( 'Color', 'ecolab' ),
				'condition'    => array( 'show_section_subtitle' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title' => 'color: {{VALUE}} !important',
				),
			
			)
		);

		$this->end_controls_section();
		
//End of  Sub Title 	==================	



//Block 

//price control============
// indext  666
	$this->start_controls_section(
			'price_settings',
			array(
				'label' => __( 'Price Setting', 'ecolab' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
	$this->add_control(
			'show_price',
			array(
				'label' => esc_html__( 'Show Price', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .about-section p' => 'display: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'price_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ecolab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ecolab' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ecolab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_price' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .about-section p' => 'text-align: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'price_padding',
			array(
				'label'     => __( 'Padding', 'ecolab' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'condition'    => array( 'show_price' => 'show' ),
				'selectors' => array(
					'{{WRAPPER}} .about-section p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'price_typography',
				'condition'    => array( 'show_price' => 'show' ),
				'label'    => __( 'Typography', 'ecolab' ),
				'selector' => '{{WRAPPER}} .about-section p',
			)
		);
		$this->add_control(
			'price_color',
			array(
				'label'     => __( 'Color', 'ecolab' ),
				'condition'    => array( 'show_price' => 'show' ),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .about-section p' => 'color: {{VALUE}} !important',
				),
			)
		);

		$this->end_controls_section();
//End of Text=========		


//end price control

//Title contro
////============= Product Item  Title=======================
// indext  777
	$this->start_controls_section(
			'product_title_settings',
			array(
				'label' => __( 'Title Setting', 'ecolab' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
		
	$this->add_control(
			'show_title',
			array(
				'label' => esc_html__( 'Show Title', 'ecolabe' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'display: {{VALUE}} !important',
				),
			)
		);	
	$this->add_control(
			'title_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ecolab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ecolab' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ecolab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_title' => 'show' ),
				'toggle' => true,
				'selectors' => array(
				
					'{{WRAPPER}} .sec-title h2' => 'text-align: {{VALUE}} !important',
				),
			)
		);			


	$this->add_control(
			'title_padding',
			array(
				'label'     => __( 'Padding', 'ecolab' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'condition'    => array( 'show_title' => 'show' ),
				'label'    => __( 'Typography', 'ecolab' ),
				'selector' => '{{WRAPPER}} .sec-title h2',
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'ecolab' ),
				'condition'    => array( 'show_title' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}} !important',
		
				),
			)
		);

		$this->end_controls_section();
	
					
//End of  Title 	==================	
//end of title 

//========== Thumbnail ===================================

// indext  888
$this->start_controls_section(
			'thumbnail_control',
			array(
				'label' => __( 'Thumbanil Settings', 'ecolab' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		
$this->add_control(
			'show_thumbnail',
			array(
				'label' => esc_html__( 'Show Button', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .product-block_hr_001 .image' => 'display: {{VALUE}} !important',
				),
			)
		);		
	

	$this->add_control(
			'thumbnail_padding',
			array(
				'label'     => __( 'Padding', 'ecolab' ),
			
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
		
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .theme-btn.btn-one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

	$this->add_control(
			'thumbnail_margin',
			array(
				'label'     => __( 'Margin', 'ecolab' ),
					'condition'    => array( 'show_thumbnail' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
			
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .theme-btn.btn-one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);


		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'border',
					'condition'    => array( 'show_thumbnail' => 'show' ),
				'selector' => '{{WRAPPER}} .theme-btn',
			)
		);
				
			$this->add_control(
			'thumbnail_border_radius',
			array(
				'label'     => __( 'Border Radius', 'ecolab' ),
				'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .theme-btn.btn-one' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);	
		$this->end_controls_section();
		
//End of Thumbnail		
//=============== Product Rating ==============================

// indext  999
		$this->start_controls_section(
			'product_rating_setting',
			array(
				'label' => __( 'Product Rating Setting', 'ecolab' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);


		$this->add_control(
			'show_rating',
			array(
				'label' => __( 'Show Rating', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .feature-block-one .inner-box' => 'display: {{VALUE}} !important',
				),
			)
		);		

	$this->add_control(
	'product_rating_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'ecolab' ),
				'condition'    => array( 'show_rating' => 'show' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ecolab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ecolab' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ecolab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .mr_star_rating' => 'text-align: {{VALUE}} !important',
				),
			)
		);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'product_rating_typography',
				'label'    => __( 'Product Rating Typography', 'ecolab' ),
				'condition'    => array( 'show_rating' => 'show' ),
				'selector' => '{{WRAPPER}} .mr_star_rating li i',
			)
		);

		$this->add_control(
			'product_rating_color',
			array(
				'label'     => __( 'Rating Color', 'ecolab' ),
				'condition'    => array( 'show_rating' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_star_rating li i' => 'color: {{VALUE}} !important',
				),
			)
		);
		$this->add_control(
			'product_rating_margin',
			array(
				'label'     => __( 'Product Rating Padding', 'ecolab' ),
				'separator' => 'after',
				'condition'    => array( 'show_rating' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_star_rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

	
	
		
	$this->add_control(
			'show_avarage_rating',
			array(
				'label' => __( 'Show Avarage Text', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .feature-block-one .inner-box' => 'display: {{VALUE}} !important',
				),
			)
		);		
	$this->add_control(
	'product_avarage_rating_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'ecolab' ),
				'condition'    => array( 'show_avarage_rating' => 'show' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ecolab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ecolab' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ecolab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .mr_star_rating' => 'text-align: {{VALUE}} !important',
				),
			)
		);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'product_avarage_rating_typography',
				'label'    => __( 'Product Avarage Typography', 'ecolab' ),
					'condition'    => array( 'show_avarage_rating' => 'show' ),
				'selector' => '{{WRAPPER}} .mr_star_rating li i',
			)
		);

		$this->add_control(
			'product_avarage_rating_color',
			array(
				'label'     => __( 'Color', 'ecolab' ),
					'condition'    => array( 'show_avarage_rating' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_star_rating li i' => 'color: {{VALUE}} !important',
				),
			)
		);
		$this->add_control(
			'product_avarage_rating_margin',
			array(
				'label'     => __( 'Padding', 'ecolab' ),
				'condition'    => array( 'show_avarage_rating' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_star_rating' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);	

		$this->end_controls_section();


//end of rating


//===================Quick View Control=====================

// indext  aaa
		$this->start_controls_section(
			'quick_title_typography',
			array(
				'label' => __( 'Quick View Setting', 'ecolab' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);


   	$this->add_control(
			'show_quickview',
			array(
				  'label' => __( 'Show Quick View', 'ecolab' ),
				  'type'     => \Elementor\Controls_Manager::SWITCHER,
				  'placeholder' => __( 'Show Quick View', 'ecolab' ),
                  'return_value' => '1',
                  'default'      => '1',
				 
			)
		);
	$this->add_control(
			'show_quickview',
			array(
				'label' => __( 'Show Quick View', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .feature-block-one .inner-box' => 'display: {{VALUE}} !important',
				),
			)
		);	


		$this->add_control(
			'quick_title_color',
			array(
				'label'     => __( 'Quick View Color', 'ecolab' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_quick_view .button' => 'color: {{VALUE}} !important',
				),
			)
		);


		$this->add_control(
			'quick_title_alingment',
			array(
				'label' => esc_html__( 'Alignment', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'ecolab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'ecolab' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'ecolab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'condition'    => array( 'show_text_list' => 'show' ),
				'toggle' => true,
				'selectors' => array(
					'{{WRAPPER}} .about-section p' => 'text-align: {{VALUE}} !important',
				),
			)
		);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'quick_title_typography',
				'label'    => __( 'Quick View Typography', 'ecolab' ),
				'selector' => '{{WRAPPER}} .mr_quick_view .button',
			)
		);

		$this->add_control(
			'quick_title_margin',
			array(
				'label'     => __( 'Quick View Padding', 'ecolab' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_quick_view .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->end_controls_section();
		
//Hot/Sale Button 888  ============
 // indext  bbb
$this->start_controls_section(
			'button_control',
			array(
				'label' => __( 'Hot Button Settings', 'ecolab' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				
			)
		);
		
		$this->add_control(
					'show_button',
					array(
						'label' => esc_html__( 'Show Button', 'ecolab' ),
						'type' => \Elementor\Controls_Manager::CHOOSE,
						'options' => [
							'show' => [
								'show' => esc_html__( 'Show', 'ecolab' ),	
								'icon' => 'eicon-check-circle',
							],
							'none' => [
								'none' => esc_html__( 'Hide', 'ecolab' ),
								'icon' => 'eicon-close-circle',
							],
						],
						'default' => 'show',
						'selectors' => array(
							'{{WRAPPER}} .mr_hot' => 'display: {{VALUE}} !important',

						),
					)
				);		
		$this->add_control(
					'button_alingment',
					array(
						'label' => esc_html__( 'Alignment', 'ecolab' ),
						'type' => \Elementor\Controls_Manager::CHOOSE,
						'condition'    => array( 'show_button' => 'show' ),
						'options' => [
							'left' => [
								'title' => esc_html__( 'Left', 'ecolab' ),
								'icon' => 'eicon-text-align-left',
							],
							'center' => [
								'title' => esc_html__( 'Center', 'ecolab' ),
								'icon' => 'eicon-text-align-center',
							],
							'right' => [
								'title' => esc_html__( 'Right', 'ecolab' ),
								'icon' => 'eicon-text-align-right',
							],
						],
						'default' => 'center',
						'toggle' => true,
						'selectors' => array(
							'{{WRAPPER}} .mr_hot' => 'text-align: {{VALUE}} !important',
						),
					)
				);	

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'condition'    => array( 'show_button' => 'show' ),
				'label'    => __( 'Typography', 'ecolab' ),
				'selector' => '{{WRAPPER}} .mr_hot',
			)
		);		
		$this->add_control(
					'button_color',
					array(
						'label'     => __( 'Button Color', 'ecolab' ),
						'condition'    => array( 'show_button' => 'show' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => array(
							'{{WRAPPER}} .mr_hot span' => 'color: {{VALUE}} !important',

						),
					)
				);
		$this->add_control(
					'button_bg_color',
					array(
						'label'     => __( 'Background Color', 'ecolab' ),
						'condition'    => array( 'show_button' => 'show' ),
						'type'      => \Elementor\Controls_Manager::COLOR,
						'selectors' => array(
							'{{WRAPPER}} .mr_hot' => 'background: {{VALUE}} !important',
						),
					)
				);	
			
	$this->add_control(
			'button_padding',
			array(
				'label'     => __( 'Padding', 'ecolab' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}} .mr_hot' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

	$this->add_control(
			'button_margin',
			array(
				'label'     => __( 'Margin', 'ecolab' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'condition'    => array( 'show_button' => 'show' ),
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_hot' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			array(
				'name' => 'hot_border',
				'condition'    => array( 'show_button' => 'show' ),
				'selector' => '{{WRAPPER}} .mr_hot',
			)
		);
	

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hot_shadow',
					'condition'    => array( 'show_button' => 'show' ),
				'label' => esc_html__( 'Box Shadow', 'ecolab' ),
				'selector' => '{{WRAPPER}} .mr_hot',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hot_border',
				'condition'    => array( 'show_button' => 'show' ),
				'label' => esc_html__( 'Box Border', 'ecolab' ),
				'selector' => '{{WRAPPER}} .mr_hot',
			]
		);
		
		
			$this->add_control(
			'hot_border_radius',
			array(
				'label'     => __( 'Border Radius', 'ecolab' ),
				'condition'    => array( 'show_button' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_hot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		
		$this->end_controls_section();
		
//End of hot Button		

//Block   ================================
// indext  ccc
	$this->start_controls_section(
				'block_settings',
				array(
					'label' => __( 'Block Setting', 'ecolab' ),
					'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				)
			);

		
	$this->add_control(
			'show_block',
			array(
				'label' => esc_html__( 'Show Block', 'ecolab' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .mr_product_block' => 'display: {{VALUE}} !important',
				),
			)
		);	

		$this->add_control(
			'block_color',
			array(
				'label'     => __( 'Background Color', 'ecolab' ),
				'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_product_block' => 'background: {{VALUE}} !important',
				),
			)
		);
		$this->add_control(
			'block_hover_color',
			array(
				'label'     => __( 'Hover Color', 'ecolab' ),
			   'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mr_product_block:hover' => 'background: {{VALUE}} !important',
				),
			)
		);
	
		$this->add_control(
			'block_margin',
			array(
				'label'     => __( 'Block Margin', 'ecolab' ),
					'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_product_block' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

		$this->add_control(
			'block_padding',
			array(
				'label'     => __( 'Block Padding', 'ecolab' ),
					'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
			
				'selectors' => array(
					'{{WRAPPER}}  .mr_product_block' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);

			$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'block_shadow',
					'condition'    => array( 'show_block' => 'show' ),
				'label' => esc_html__( 'Box Shadow', 'ecolab' ),
				'selector' => '{{WRAPPER}} .mr_product_block',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'block_border',
				'condition'    => array( 'show_block' => 'show' ),
				'label' => esc_html__( 'Box Border', 'ecolab' ),
				'selector' => '{{WRAPPER}} .mr_product_block',
			]
		);
				
			$this->add_control(
			'block_border_radius',
			array(
				'label'     => __( 'Border Radius', 'ecolab' ),
				'condition'    => array( 'show_block' => 'show' ),
				'type'      => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' =>  ['px', '%', 'em' ],
				'selectors' => array(
					'{{WRAPPER}} .mr_product_block' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important',
				),
			)
		);
		
		$this->end_controls_section();
//End of Block 
		
	
	}
	
//============================================End of Query Area ======================================================
	// ddd
	
	protected function render() {
		global $product;
		global $wp_query;
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');		
        $paged = get_query_var('paged');
		$paged = ecolab_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-ecolab' );
	
	//Column Settings Area	 

		  if($settings['columns'] == '6') {
                $columns_markup = 'col-lg-2 col-md-12';
            }
           else if($settings['columns'] == '4') {
                $columns_markup = 'col-lg-3 col-md-12';
            } 

          else if($settings['columns'] == '3') {
                $columns_markup = 'col-lg-4 col-md-12';
            }

          else if($settings['columns'] == '2') {
                $columns_markup = 'col-lg-6 col-md-12';
            } 

          else if($settings['columns'] == '1') {
                $columns_markup = 'col-lg-12 col-md-12';
            }       
		
     // Call the setting and make variable 

		$product_per_page = $settings['query_number'];
		$product_order_by = $settings['query_orderby'];
		$product_order    = $settings['query_order'];
		$product_grid_type = $settings['product_grid_type'];
		$catagory_name     = $settings['query_category'];
		$tag_name     = $settings['query_tag'];
		
	  // Argument for $args	
		if ( $product_grid_type == 'sale_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'meta_query'     => array(
					'relation' => 'OR',
					array(// Simple products type
						'key'     => '_sale_price',
						'value'   => 0,
						'compare' => '>',
						'type'    => 'numeric',
					),
					array(// Variable products type
						'key'     => '_min_variation_sale_price',
						'value'   => 0,
						'compare' => '>',
						'type'    => 'numeric',
					),
				),
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'best_selling_products' ) {
			$args = array(
				'post_type'      => 'product',
				'meta_key'       => 'total_sales',
				'orderby'        => 'meta_value_num',
				'posts_per_page' => $product_per_page,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'recent_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'featured_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'tax_query'      => array(
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'featured',
					),
				),
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);

		}
		if ( $product_grid_type == 'top_rated_products' ) {
			$args = array(
				'posts_per_page' => $product_per_page,
				'no_found_rows'  => 1,
				'post_status'    => 'publish',
				'post_type'      => 'product',
				'meta_key'       => '_wc_average_rating',
				'orderby'        => 'meta_value_num',
				'order'          => $product_order,
				'meta_query'     => WC()->query->get_meta_query(),
				'tax_query'      => WC()->query->get_tax_query(),
			);
		}

		if ( $product_grid_type == 'product_category' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'product_cat'    => $catagory_name,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}

		if ( $product_grid_type == 'product_tag' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'product_tag'    => $tag_name,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		// End of args
		
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
			
//HTML are index eee			
		{ ?>
		

     <section class="woocommerce mr_shop products-section_hr_001 ">
            <div class="auto-container">
           			<h2 class="mr_section_title"> <?php echo $settings['title'];?></h2>
                    	<h4 class="mr_section_subtitle" ><?php echo $settings['subtitle'];?> </h4>
						
						<!--If  Slider Active  Code -->
							<?php if(esc_attr($settings['show_slider'])) : ?>
							<div class=" mr_shop_slide theme_carousel owl-theme owl-carousel owl-dot-style-one" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "3" } , "992":{ "items" : "4" }, "1200":{ "items" : " <?php echo esc_attr($settings['columns']);?> " }}}'>		
						<!-- Slider Area Code -->		
							<?php else : ?>	 
							<div class="row row-5">	 
							<?php endif; ?>

										<!-- While Loope  Area  -->
										<?php while ( $query->have_posts() ) : $query->the_post(); ?>
										 <?php global $post, $product;
										 ?>
                                                
												<!--If  Slider Active  Code -->
												<?php if(esc_attr($settings['show_slider'])) : ?>               
                                                 <div class="col-lg-12 col-md-12 p-0" >
												<!-- Slider Area Code -->	 
                                                <?php else: ?>   
                                                 <div class=" <?php echo $columns_markup;?>  <?php if($settings['columns'] == '5') echo 'column'; else echo ''; ?>  col-md-12 " >    
                                                <?php endif; ?>
													 
                                                <div class="mr_product_block product-block_hr_001 ">
                                                        <?php
                                                        /**
                                                         * Hook: woocommerce_before_shop_loop_item.
                                                         */
                                                        do_action( 'woocommerce_before_shop_loop_item' );
                                                        /**
                                                         * Hook: woocommerce_before_shop_loop_item_title.
                                                         */   
														 $post_thumbnail_id = get_post_thumbnail_id($post->ID);
														 $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );  
														 $get_price       = $product->get_price();
														 $regular_price   = $product->get_regular_price();
														 $sale_price      = $product->get_sale_price();
														 $price_html      = $product->get_price_html(); 
		 
														 $review_count = $product->get_review_count();
															if ( $review_count == 0 || $review_count > 1 ) {
																$review_count_var = $review_count . esc_html__( ' Reviews', 'brator' );
															} else {
																$review_count_var = $review_count . esc_html__( ' Review', 'brator' );
															};
		 
														$newness_days = 30; // Number of days the badge is shown
														$created      = strtotime( $product->get_date_created() );

														$stock_quantity = $product->get_stock_quantity();

														$sale_stock_quantity = get_post_meta( $product->get_id(), 'total_sales', true );
		 
                                                         ?> 
													
												<div <?php wc_product_class(); ?>> 	
													
										<div class="mr_style_one">			
													<!-- Hot/Sale   -->		
													<?php
		 												if($settings['show_hot']){ 
															if ( $product->is_on_sale() ) {
																$prices   = mrlab_get_product_prices( $product );
																$returned = mrlab_product_special_price_calc( $prices );
																if ( isset( $returned['percent'] ) && $returned['percent'] ) {
																	?>
																 <div class="mr_hot" style="position:absolute;z-index:999;"> 
																	 <span><?php echo sprintf( esc_html__( '%d%% ', 'mrlab' ), $returned['percent'] ); ?>
																	 <?php echo $settings['hot_text'];?> </span>
																</div>
																 <?php
																}
															} 
													} ?>	
													<!-- Hot/Sale   -->		
														
                                                    <!-- Product Thumbnail   -->
													<?php if($settings['show_thumbnail']){ ?>
													<div class="mr_product_thumb image">
														<?php the_post_thumbnail(); ?>       
													</div>
													<?php } ?>   
 													<!-- Product Thumbnail   -->
											
													

                                                   <div class="product_bottom"> 
                                                      
													  <!-- Product Title   -->     
														<?php if($settings['show_title']){ ?>   
                                                         <div class="mr_product_title"><?php do_action('woocommerce_shop_loop_item_title'); ?></div>
                                                        <?php } ?>
													 <!-- Product Title   -->     
													 <!-- Product Rating   --> 		 																  
															 <div class="mr_rating">
															<?php if($settings['show_rating']){ ?>					  
																  <div class="mr_review_number"> <?php echo ecolab_product_rating(); ?> </div>  
															<?php } ?> 			  
															<?php if($settings['show_avarage_rating']){ ?>	
															<?php if ( $product->get_average_rating() ) : ?>	 
																 <span class="mr_review_number"><?php echo esc_html( $review_count_var ); ?></span>
															<?php endif; ?>
															<?php } ?> 		  
															</div>								   
													 <!-- Product Rating   -->    
													 <!-- Product Price   --> 
													   <?php if($settings['show_price']){ ?>                             
													   <div class="mr_shop_price price fs_15 fw_medium">               
														   <?php echo $price_html; ?>
													   </div> 
													   <?php } ?> 
													 <!-- Product Price --> 
													   
												<!-- Product Progress  -->
													<?php
													if ( $stock_quantity ) :
														$sale_percentage = ( $sale_stock_quantity / $stock_quantity ) * 100;
														if ( $sale_percentage < 50 ) {
															$bar_class = 'border-green';
														} elseif ( $sale_percentage >= 75 ) {
															$bar_class = 'border-red';
														} elseif ( $sale_percentage >= 50 ) {
															$bar_class = 'border-yellow';
														}
														?>
													<div class="mr_product_progress">
													<div class="product-single-item-bar"><span class="<?php echo esc_attr( $bar_class ); ?>" style="width: <?php echo esc_attr( $sale_percentage ); ?>%"></span></div>
													<div class="product-single-item-sold">
														<p><?php esc_html_e( 'sold:', 'brator' ); ?><span><?php echo esc_html( $sale_stock_quantity ); ?>/<?php echo esc_html( $stock_quantity ); ?></span></p>
													</div>
													</div>
													<?php endif; ?>
													<!-- Product Progress  -->	   
 
 													 <!-- Product Quick View -->
													   <?php if($settings['show_quickview']){ ?>
													   <div class="quick_area">      
														   <div class="mr_quick_view" ><?php echo do_shortcode( $settings['quickview'] );?></div>
													   </div>
													   <?php } ?> 
													 <!-- Product Quick View -->   


												<!-- ========= Meta Info Area=============  -->  
                                                     <div class="overlay">
                                                        <ul class="product-buttons mr_pro_list">  
														
														<!-- Product Wish List -->
                                                           <?php if($settings['show_whishlist']){ ?>
															<li class="single_metas ">
																<span class="tool_tip"><?php echo $settings['wishlist_tooltip'];?></span>
																<?php echo do_shortcode( $settings['whish_list'] );?>
															</li>
                                                        	<?php } ?> 
														<!-- Product Wish List -->
														
														<!-- Product Compare Button -->	
															<?php if($settings['show_compare']){ ?>                
															<li class="single_metas ">
															<?php if(function_exists('yith_woocompare_constructor')) : ?>
															<a class="compare" data-product_id="<?php echo get_the_ID(); ?>" href="<?php echo site_url(); ?>/?action=yith-woocompare-add-product&amp; id=<?php echo get_the_ID(); ?>">
																<span class="tool_tip"><?php echo $settings['compare_tooltip'];?></span></a>
																<?php endif; ?>
															</li>
															<?php } ?> 
														<!-- Product Compare Button -->
															
														<!-- Product Add to Cart -->	
															<?php if($settings['show_addtocart']){ ?>                
															<li class="single_metas mr_addtocart">
																<a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>">
																<span class="tool_tip"><?php echo $settings['addtocart_tooltip'];?></span><i class="fa fa-shopping-cart"></i></a>
															 </li>
															<?php } ?> 
													   <!-- Product Add to Cart -->		
															
                                                        </ul>
                                                   </div>
												<!-- Meta Info Area End --> 
												</div>   
												</div>
										</div>	<!-- End Of Style One --> 		
											</div>
									   </div>
								  <?php endwhile; ?>  

            </div>
        </div>
    </section>
				
                
        <?php }
		wp_reset_postdata();
	}

}

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

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class H4_Pricing extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_h4_pricing';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'H4 Pricing', 'conexi' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-briefcase';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'conexi' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'h4_pricing',
			[
				'label' => esc_html__( 'H4 Pricing', 'conexi' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub title', 'rashid' ),
			]
		);
		$this->add_control(
			'ff_sing',
			[
			'label' => __( 'Counter Sing', 'rashid' ),
			'type' => Controls_Manager::TEXTAREA,
			'dynamic' => [
			'active' => true,
			],
			'placeholder' => __( 'Enter Counter Sing', 'rashid' ),
			]
		);
		$this->add_control(
			'ff_price',
			[
			'label' => __( 'Counter Price', 'rashid' ),
			'type' => Controls_Manager::TEXTAREA,
			'dynamic' => [
			'active' => true,
			],
			'placeholder' => __( 'Enter Counter Sing', 'rashid' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your title', 'rashid' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Description Text', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'rashid' ),
			]
		);
		$this->add_control(
			'bttn',
			[
				'label'       => __( 'Button', 'rashid' ),
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'rashid' ),
			]
		);	
		$this->add_control(
			'btnlink',
			[
			  'label' => __( 'Button Url', 'rashid' ),
			  'type' => Controls_Manager::URL,
			  'placeholder' => __( 'https://your-link.com', 'rashid' ),
			  'show_external' => true,
			  'default' => [
				'url' => '',
				'is_external' => true,
				'nofollow' => true,
			  ],
			
		   ]
		);
		$this->add_control(
			'sec_class',
			[
				'label'       => __( 'Section Class', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter Section Class', 'rashid' ),
			]
		);
		
		$this->end_controls_section();
		
		// New Tab#1

		$this->start_controls_section(
					'content_section',
					[
						'label' => __( 'Pricing Block', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);
				$this->add_control(
				  'repeat', 
					[
						'type' => Controls_Manager::REPEATER,
						'seperator' => 'before',
						'default' => 
							[
								['block_title' => esc_html__('Projects Completed', 'rashid')],
							],
						'fields' => 
							[
								'block_title' =>
								[
									'name' => 'block_title',
									'label' => esc_html__('Title', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
							],
						'title_field' => '{{block_title}}',
					 ]
				);
				
				
		$this->end_controls_section();	
		
	
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$allowed_tags = wp_kses_allowed_html('post');
		?>

      <!-- our-price -->
      <section class="price-table-four container <?php echo esc_attr($settings['sec_class']);?>">
        <div class="row">
		
			<div class="col-lg-12 col-md-12 col-sm-12">
				
			  <div class="price-list-four table-height-1">
				<h3><?php echo $settings['subtitle'];?></h3>
				<div class="d-flex">
				  <h1><?php echo esc_attr($settings['ff_sing']);?><?php echo esc_attr($settings['ff_price']);?></h1>
				  <span><?php echo $settings['title'];?></span>
				</div>
				<p>
				  <?php echo $settings['text'];?>
				</p>
				<hr />
				<ul>
				
				  <?php foreach($settings['repeat'] as $item):?>
				
				  <li class="d-flex align-items-center">
					<i class="flaticon-check-mark"></i>
					<h5><?php echo wp_kses($item['block_title'], $allowed_tags);?></h5>
				  </li>
				  
				  <?php endforeach; ?>
				  
				</ul>
				
				<?php if($settings['bttn']): ?>
				<div class="price-btn-box d-flex justify-content-center align-items-center">
					<a href="<?php echo esc_url($settings['btnlink']['url']);?>" class="price-btn"><?php echo $settings['bttn'];?></a>
				</div>
				<?php endif; ?>
			  </div>
			  <!-- price-list-four -->
			  
			  </div>
		  
		  
			</div>
      </section>
                   
                
		<?php 
	}

}
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
class H4_Introduction_Right extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_h4_introduction_right';
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
		return esc_html__( 'H4 Introduction Right', 'conexi' );
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
			'h4_introduction_right',
			[
				'label' => esc_html__( 'H4 Introduction Right', 'conexi' ),
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
			'image',
				[
				  'label' => __( 'Image', 'rashid' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);
		$this->add_control(
			'alt_text',
			[
				'label'       => __( 'Alt text', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'rashid' ),
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
			'text1',
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
			'icons',
				[
					'label' => esc_html__('Enter The icons', 'rashid'),
					'type' => Controls_Manager::SELECT,
					'options'  => get_fontawesome_icons(),
				]
		);
		$this->add_control(
			'number',
			[
				'label'       => __( 'Number', 'rashid' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Number', 'rashid' ),
			]
		);
		$this->add_control(
			'title1',
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
						'label' => __( 'List Block One', 'rashid' ),
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
								'block_image' =>
								[
									'name' => 'block_image',
									'label' => __( 'Image', 'rashid' ),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'block_alt_text' =>
								[
									'name' => 'block_alt_text',
									'label' => esc_html__('Alt Text', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
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
		
		// New Tab#2

		$this->start_controls_section(
					'content_section2',
					[
						'label' => __( 'List Block Two', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);
				$this->add_control(
				  'repeat1', 
					[
						'type' => Controls_Manager::REPEATER,
						'seperator' => 'before',
						'default' => 
							[
								['block_title' => esc_html__('Projects Completed', 'rashid')],
							],
						'fields' => 
							[
								'block_image' =>
								[
									'name' => 'block_image',
									'label' => __( 'Image', 'rashid' ),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'block_alt_text' =>
								[
									'name' => 'block_alt_text',
									'label' => esc_html__('Alt Text', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
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
		
		
      <section class="introduction-four <?php echo esc_attr($settings['sec_class']);?>">
        <div class="">
          <div class="container">
            <!-- introduction-image -->
            <div class="introduction-content col-lg-12">
              <div class="container">
                <div class="check-out-line"></div>
              <div class="check-out-line"></div>
              <h3><?php echo $settings['subtitle'];?></h3>
              <h1>
                <?php echo $settings['title'];?>
              </h1>
              <div class="introduction-content-1 d-flex">
                <?php  if ( esc_url($settings['image']['id']) ) : ?>   
				<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
				<?php else :?>
				<div class="noimage"></div>
				<?php endif;?>
                <h2>
                  <?php echo $settings['text'];?>
                </h2>
              </div>
              <div class="introduction-content-2 d-flex">
                <div class="introduction-content-2-left">
				
					<?php foreach($settings['repeat'] as $item):?>
				
					  <div class="d-flex align-items-center">
						<?php if(wp_get_attachment_url($item['block_image']['id'])): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
						<?php else :?>
						<div class="noimage"></div>
						<?php endif;?>
						<h3><?php echo wp_kses($item['block_title'], $allowed_tags);?></h3>
					  </div>
				  
				  <?php endforeach; ?>
				  
                </div>
                <div>
				
                  <?php foreach($settings['repeat1'] as $item):?>
				
					  <div class="d-flex align-items-center">
						<?php if(wp_get_attachment_url($item['block_image']['id'])): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
						<?php else :?>
						<div class="noimage"></div>
						<?php endif;?>
						<h3><?php echo wp_kses($item['block_title'], $allowed_tags);?></h3>
					  </div>
				  
				  <?php endforeach; ?>
				  
                </div>
              </div>
              <div class="introduction-content-3">
                <p>
                  <?php echo $settings['text1'];?>
                </p>
              </div>
              <div class="d-flex align-items-center btn-line">
			  
				<?php if($settings['bttn']): ?>
			  
                <div class="btn-block">
                  <a href="<?php echo esc_url($settings['btnlink']['url']);?>" class="banner-btn-2"><?php echo $settings['bttn'];?></a>
                </div>
				
				<?php endif; ?>

                <div class="call-block">
                  <div class="left-block">
                    <div class="icon-block">
                      <i class="<?php echo esc_attr($settings['icons']);?>"></i>
                    </div>
                    <!-- /.icon-block -->
                    <div class="content-block">
                      <p><?php echo $settings['number'];?></p>
                      <span><?php echo $settings['title1'];?></span>
                    </div>
                    <!-- /.content-block -->
                  </div>
                  <!-- /.left-block -->
                </div>
              </div>
              </div>
            </div>
            <!-- introduction-content -->
          </div>
        </div>
      </section>
                   
                
		<?php 
	}

}
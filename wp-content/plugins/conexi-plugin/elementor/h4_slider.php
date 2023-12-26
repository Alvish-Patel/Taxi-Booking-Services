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
class H4_Slider extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_h4_slider';
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
		return esc_html__( 'H4 Slider', 'conexi' );
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
			'h4_slider',
			[
				'label' => esc_html__( 'H4 Slider', 'conexi' ),
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
						'label' => __( 'Slider Block', 'rashid' ),
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
								'block_bgimg' =>
								[
									'name' => 'block_bgimg',
									'label' => esc_html__('Background image', 'rashid'),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'block_title' =>
								[
									'name' => 'block_title',
									'label' => esc_html__('Title', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_text' =>
								[
									'name' => 'block_text',
									'label' => esc_html__('Text', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_button' =>
								[
									'name' => 'block_button',
									'label'       => __( 'Button', 'rashid' ),
									'type'        => Controls_Manager::TEXT,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Button Title', 'rashid' ),
								],
								'block_btnlink' =>
								[
									'name' => 'block_btnlink',
									'label' => __( 'Button Url', 'rashid' ),
									'type' => Controls_Manager::URL,
									'placeholder' => __( 'https://your-link.com', 'rashid' ),
									'show_external' => true,
									'default' => [
									'url' => '',
									'is_external' => true,
									'nof
									ollow' => true,
									],
								],
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
								'block_image1' =>
								[
									'name' => 'block_image1',
									'label' => __( 'Image', 'rashid' ),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'block_alt_text1' =>
								[
									'name' => 'block_alt_text1',
									'label' => esc_html__('Alt Text', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_image2' =>
								[
									'name' => 'block_image2',
									'label' => __( 'Image', 'rashid' ),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'block_alt_text2' =>
								[
									'name' => 'block_alt_text2',
									'label' => esc_html__('Alt Text', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								'block_image3' =>
								[
									'name' => 'block_image3',
									'label' => __( 'Image', 'rashid' ),
									'type' => Controls_Manager::MEDIA,
									'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								'block_alt_text3' =>
								[
									'name' => 'block_alt_text3',
									'label' => esc_html__('Alt Text', 'rashid'),
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
		
		
<?php
      echo '
     <script>
 jQuery(document).ready(function($) {

//put the js code under this line 

    if ($(".banner-style-one").length) {
        $(".banner-style-one").owlCarousel({
            loop: true,
            items: 1,
            margin: 0,
            dots: true,
            nav: false,
            active: true,
            smartSpeed: 1000,
            autoplay: 5000
        });
    }

//put the code above the line 

  });
</script>';


?>
		<div class="main-banner-wrapper home-four">
        <section class="slider-four <?php echo esc_attr($settings['sec_class']);?>">
		
            <div class="banner-style-one owl-theme owl-carousel no-dots">
             
              <?php foreach($settings['repeat'] as $item):?>
             
			 
			  <?php if(wp_get_attachment_url($item['block_bgimg']['id'])): ?>
              <div class="slide slide-one" style="background-image: url(<?php echo wp_get_attachment_url($item['block_bgimg']['id']);?>)">
			  <?php else :?>
			  <div class="slide slide-one">
			  <?php endif;?>
			  
			  
                <div class="container">
                  <div class="content-box-area-4">
                    <div class="content-box-four">
                      <h1><?php echo wp_kses($item['block_title'], $allowed_tags);?></h1>
                      <p>
                        <?php echo wp_kses($item['block_text'], $allowed_tags);?>
                      </p>
					  <?php if(wp_kses($item['block_button'], $allowed_tags)): ?>
                      <div class="btn-block">
                        <a href="<?php echo esc_url($item['block_btnlink']['url']);?>" class="banner-btn"><?php echo wp_kses($item['block_button'], $allowed_tags);?></a>
                      </div>
                      <!-- /.btn-block -->
					  <?php endif; ?>
                    </div>
                    <div class="image-box-four rotate-me">
						<?php if(wp_get_attachment_url($item['block_image']['id'])): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text'], $allowed_tags);?>">
						<?php else :?>
						<div class="noimage"></div>
						<?php endif;?>
                    </div>
                    <div class="image-box-four-2 rotate-me">
						<?php if(wp_get_attachment_url($item['block_image1']['id'])): ?>
						<img src="<?php echo wp_get_attachment_url($item['block_image1']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text1'], $allowed_tags);?>">
						<?php else :?>
						<div class="noimage"></div>
						<?php endif;?>
                    </div>
                    <div class="particle">
					
						<?php if(wp_get_attachment_url($item['block_image2']['id'])): ?>
						<img class="particle-1 spinning" src="<?php echo wp_get_attachment_url($item['block_image2']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text2'], $allowed_tags);?>">
						<?php else :?>
						<div class="noimage"></div>
						<?php endif;?>
						
						<?php if(wp_get_attachment_url($item['block_image3']['id'])): ?>
						<img class="particle-2 spinning" src="<?php echo wp_get_attachment_url($item['block_image3']['id']);?>" alt="<?php echo wp_kses($item['block_alt_text3'], $allowed_tags);?>">
						<?php else :?>
						<div class="noimage"></div>
						<?php endif;?>
					
                     
                    </div>
                  </div>
                </div>
                <!-- /.container -->
              </div>
              
              <?php endforeach; ?>
              

            </div>
		  
		  
		  
        </section>
        <!-- /.banner-style-one -->
</div>
                   
                
		<?php 
	}

}

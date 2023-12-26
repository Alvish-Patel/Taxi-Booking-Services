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
class Testimonials extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_testimonials';
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
		return esc_html__( 'Testimonials', 'conexi' );
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
			'testimonials',
			[
				'label' => esc_html__( 'Testimonials', 'conexi' ),
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
		
		$this->end_controls_section();
		

		// New Tab#1

		$this->start_controls_section(
					'content_section',
					[
						'label' => __( 'Testimonials Block', 'rashid' ),
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
								[
								  'name' => 'block_image',
								  'label' => __( 'Image', 'rashid' ),
								  'type' => Controls_Manager::MEDIA,
								  'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
								[
									'name' => 'block_text',
									'label' => esc_html__('Text', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
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
		
<?php
      echo '
     <script>
 jQuery(document).ready(function($) {

//put the js code under this line 

        if ($(".testimonials-slider-one").length) {
            var testiCarouselOne = $(".testimonials-slider-one").bxSlider({
                // adaptiveHeight: true,
                auto: true,
                controls: false,
                pause: 5000,
                speed: 500,
                pager: true,
            });
        }

//put the code above the line 

  });
</script>';


?>
		
		<section class="testimonials-style-one <?php echo $settings['sec_class'];?>">
            <div class="container">
                <div class="block-title text-center">
                    <div class="dot-line"></div><!-- /.dot-line -->
                    <p class="light"><?php echo $settings['subtitle'];?></p>
                    <h2 class="light"><?php echo $settings['title'];?></h2>
                </div><!-- /.block-title -->
                <div class="testimonials-one-pager">

					<?php foreach($settings['repeat'] as $item):?>
				
                    <a href="<?php echo esc_url($item['block_btnlink']['url']);?>" class="pager-item active" data-slide-index="1"><img src="<?php echo esc_url($item['block_image']['url']);?>" alt="<?php esc_attr_e('Image', 'conexi'); ?>" /></a>
					
					<?php endforeach; ?>
					
                </div><!-- /.testimonials-one-pager -->
                <ul class="slider testimonials-slider-one">
				
					<?php foreach($settings['repeat'] as $item):?>
				
                    <li class="slide-item">
                        <div class="single-testimonial-one">
                            <p><?php echo wp_kses($item['block_text'], $allowed_tags);?></p>
                            <h3><?php echo wp_kses($item['block_title'], $allowed_tags);?></h3>
                        </div><!-- /.single-testimonial-one -->
                    </li>
					
					<?php endforeach; ?>
					
                </ul>
            </div><!-- /.container -->            
            <div class="testimonials-one-slider-btn">
                <span class="carousel-btn left-btn"><i class="conexi-icon-left"></i></span>
                <span class="carousel-btn right-btn"><i class="conexi-icon-right"></i></span>
            </div><!-- /.carousel-btn-block banner-carousel-btn -->
        </section><!-- /.testimonials-style-one -->
                   
                
		<?php 
	}

}

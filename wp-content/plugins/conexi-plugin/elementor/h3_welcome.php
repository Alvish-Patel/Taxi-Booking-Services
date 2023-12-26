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
class H3_Welcome extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_h3_welcome';
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
		return esc_html__( 'H3 Welcome', 'conexi' );
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
			'h3_welcome',
			[
				'label' => esc_html__( 'H3 Welcome', 'conexi' ),
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
						'label' => __( 'Image Block', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
					'image1',
						[
						  'label' => __( 'Image', 'rashid' ),
						  'type' => Controls_Manager::MEDIA,
						  'default' => ['url' => Utils::get_placeholder_image_src(),],
						]
				);
				$this->add_control(
					'alt_text1',
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
					'image2',
						[
						  'label' => __( 'Image', 'rashid' ),
						  'type' => Controls_Manager::MEDIA,
						  'default' => ['url' => Utils::get_placeholder_image_src(),],
						]
				);
				$this->add_control(
					'alt_text2',
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
					'image3',
						[
						  'label' => __( 'Image', 'rashid' ),
						  'type' => Controls_Manager::MEDIA,
						  'default' => ['url' => Utils::get_placeholder_image_src(),],
						]
				);
				$this->add_control(
					'alt_text3',
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
					'image4',
						[
						  'label' => __( 'Image', 'rashid' ),
						  'type' => Controls_Manager::MEDIA,
						  'default' => ['url' => Utils::get_placeholder_image_src(),],
						]
				);
				$this->add_control(
					'alt_text4',
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
					'image5',
						[
						  'label' => __( 'Image', 'rashid' ),
						  'type' => Controls_Manager::MEDIA,
						  'default' => ['url' => Utils::get_placeholder_image_src(),],
						]
				);
				$this->add_control(
					'alt_text5',
					[
						'label'       => __( 'Alt text', 'rashid' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Description', 'rashid' ),
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
		
		
        <section class="welcome-three container <?php echo esc_attr($settings['sec_class']);?>">
			<?php if($settings['title']): ?>
            <div class="block-title text-center">
                <div class="dot-line"></div><!-- /.dot-line -->
                <h3><?php echo $settings['subtitle'];?></h3>
                <h2><?php echo $settings['title'];?></h2>
            </div>
			<?php endif; ?>
            <div class="row about-style-one">
                <div class="col-lg-6 left-box">
                   <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
						<div class="image">
                            <?php  if ( esc_url($settings['image']['id']) ) : ?>   
							<img src="<?php echo wp_get_attachment_url($settings['image']['id']);?>" alt="<?php echo esc_attr($settings['alt_text']);?>"/>
							<?php else :?>
							<div class="noimage"></div>
							<?php endif;?>
                        </div>
                    </div>
                    <!-- col-lg-6 -->
                    <div class="col-lg-6 col-md-6 col-sm-6 content d-flex justify-content-center align-items-center">
                       <h2><?php echo $settings['title1'];?></h2>
                    </div>
                     <!-- col-lg-6 -->
                   </div>
                   <p><?php echo $settings['text'];?></p>
                   <hr>
                   <div class="call-block">
                    <div class="left-block d-flex align-items-center justify-content-center">
                        <div class="icon-block">
                            <i class="conexi-icon-phone-call"></i>
                        </div><!-- /.icon-block -->
                        <div class="content-block">
                            <p><?php echo $settings['text1'];?></p>
                        </div><!-- /.content-block -->
                    </div><!-- /.left-block -->
                    <div class="right-block">
                        <a class="phone-number" href="callto:<?php echo $settings['number'];?>"><?php echo $settings['number'];?></a>
                    </div><!-- /.right-block -->
                </div>
                <!-- col-lg-6 left-box -->
                </div>
                <div class="col-lg-6 right-box">
                    <div class="right-image">
                        <?php  if ( esc_url($settings['image1']['id']) ) : ?>   
						<img src="<?php echo wp_get_attachment_url($settings['image1']['id']);?>" alt="<?php echo esc_attr($settings['alt_text1']);?>"/>
						<?php else :?>
						<div class="noimage"></div>
						<?php endif;?>
                    </div>
                   <div class="video-player">
				   
				    <?php  if ( esc_url($settings['image2']['id']) ) : ?>   
					<img class="player-center" src="<?php echo wp_get_attachment_url($settings['image2']['id']);?>" alt="<?php echo esc_attr($settings['alt_text2']);?>"/>
					<?php else :?>
					<div class="noimage"></div>
					<?php endif;?>
					
					<?php  if ( esc_url($settings['image3']['id']) ) : ?>   
					<img class="player-body" class="player-center" src="<?php echo wp_get_attachment_url($settings['image3']['id']);?>" alt="<?php echo esc_attr($settings['alt_text3']);?>"/>
					<?php else :?>
					<div class="noimage"></div>
					<?php endif;?>
					
					<?php  if ( esc_url($settings['image4']['id']) ) : ?>   
					<img class="player-bg" src="<?php echo wp_get_attachment_url($settings['image4']['id']);?>" alt="<?php echo esc_attr($settings['alt_text4']);?>"/>
					<?php else :?>
					<div class="noimage"></div>
					<?php endif;?>
					
					<?php  if ( esc_url($settings['image5']['id']) ) : ?>   
					<img class="player-circle spinning" class="player-center" src="<?php echo wp_get_attachment_url($settings['image5']['id']);?>" alt="<?php echo esc_attr($settings['alt_text5']);?>"/>
					<?php else :?>
					<div class="noimage"></div>
					<?php endif;?>
					
					
                    <!-- <h5>Watch Video</h5> -->
                   </div>
                </div>
                <!-- col-lg-6 right-box -->
            </div>
        </section>
                   
                
		<?php 
	}

}

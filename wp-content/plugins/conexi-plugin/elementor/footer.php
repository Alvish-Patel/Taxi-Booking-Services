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
class Footer extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_footer';
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
		return esc_html__( 'Footer', 'conexi' );
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
			'footer',
			[
				'label' => esc_html__( 'Footer', 'conexi' ),
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
			'image',
				[
				  'label' => __( 'Image', 'rashid' ),
				  'type' => Controls_Manager::MEDIA,
				  'default' => ['url' => Utils::get_placeholder_image_src(),],
				]
		);
		
		$this->end_controls_section();
		
		// New Tab#1

		$this->start_controls_section(
					'content_section',
					[
						'label' => __( 'Widget 01', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);
				
				$this->add_control(
					'number',
					[
						'label'   => esc_html__( 'Column', 'rashid' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 12,
						'step'    => 1,
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
									'name' => 'block_icons',
									'label' => esc_html__('Enter The icons', 'rashid'),
									'type' => Controls_Manager::SELECT,
									'options'  => get_fontawesome_icons(),
								],
								[
								  'name' => 'block_btnlink',
								  'label' => __( 'Button Url', 'rashid' ),
								  'type' => Controls_Manager::URL,
								  'placeholder' => __( 'https://your-link.com', 'rashid' ),
								  'show_external' => true,
								  'default' => [
									'url' => '',
									'is_external' => true,
									'nofollow' => true,
								  ],
								],
							],
						'title_field' => '{{block_title}}',
					 ]
			);
				
				
		$this->end_controls_section();
		
		// New Tab#2

		$this->start_controls_section(
					'content_section1',
					[
						'label' => __( 'Widget 02', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);
				
				$this->add_control(
					'number1',
					[
						'label'   => esc_html__( 'Column', 'rashid' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 12,
						'step'    => 1,
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
								[
									'name' => 'block_title',
									'label' => esc_html__('Title', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								[
								  'name' => 'block_btnlink',
								  'label' => __( 'Button Url', 'rashid' ),
								  'type' => Controls_Manager::URL,
								  'placeholder' => __( 'https://your-link.com', 'rashid' ),
								  'show_external' => true,
								  'default' => [
									'url' => '',
									'is_external' => true,
									'nofollow' => true,
								  ],
								],
							],
						'title_field' => '{{block_title}}',
					 ]
			);
				
		$this->end_controls_section();
		
		// New Tab#3

		$this->start_controls_section(
					'content_section2',
					[
						'label' => __( 'Widget 03', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);
				
				$this->add_control(
					'number2',
					[
						'label'   => esc_html__( 'Column', 'rashid' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 12,
						'step'    => 1,
					]
				);
				
				$this->add_control(
					'title2',
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
				  'repeat2', 
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
									'name' => 'block_icons',
									'label' => esc_html__('Enter The icons', 'rashid'),
									'type' => Controls_Manager::SELECT,
									'options'  => get_fontawesome_icons(),
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
		
		// New Tab#4

		$this->start_controls_section(
					'content_section3',
					[
						'label' => __( 'Widget 04', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);
				
				$this->add_control(
					'number3',
					[
						'label'   => esc_html__( 'Column', 'rashid' ),
						'type'    => Controls_Manager::NUMBER,
						'default' => 3,
						'min'     => 1,
						'max'     => 12,
						'step'    => 1,
					]
				);
				
				$this->add_control(
					'title3',
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
					'text2',
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
				
		$this->end_controls_section();
		
		// New Tab#5

		$this->start_controls_section(
					'content_section4',
					[
						'label' => __( 'Footer Bottom', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
					'text3',
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
					'text4',
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
					'feature_str',
					[
						'label'       => __( 'Features List', 'rashid' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [
							'active' => true,
						],
						'placeholder' => __( 'Enter your Features List', 'rashid' ),
						'default'     => __( '', 'rashid' ),
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
		
		
		<footer class="site-footer <?php echo $settings['sec_class'];?>">
            <img src="<?php echo esc_url($settings['image']['url']);?>" class="footer-bg" alt="<?php esc_attr_e('Image', 'conexi'); ?>" />
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-<?php echo esc_attr($settings['number']);?>">
                            <div class="footer-widget about-widget">
                                <div class="widget-title">
                                    <h3><?php echo $settings['title'];?></h3>
                                </div><!-- /.widget-title -->
                                <p><?php echo $settings['text'];?></p>
                                <div class="social-block">
								
									<?php foreach($settings['repeat'] as $item):?>
								
                                    <a href="<?php echo esc_url($item['block_btnlink']['url']);?>"><i class="<?php echo str_replace("fa ", "fab ", esc_attr( $item['block_icons']));?>"></i></a>
									
									<?php endforeach; ?>
									
                                </div><!-- /.social-block -->
                            </div><!-- /.footer-widget about-widget -->
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-<?php echo esc_attr($settings['number1']);?>">
                            <div class="footer-widget">
                                <div class="widget-title">
                                    <h3><?php echo $settings['title1'];?></h3>
                                </div><!-- /.widget-title -->
                                <ul class="link-lists">
								
									<?php foreach($settings['repeat1'] as $item):?>
								
                                    <li><a href="<?php echo esc_url($item['block_btnlink']['url']);?>"><?php echo wp_kses($item['block_title'], $allowed_tags);?></a></li>
									
									<?php endforeach; ?>
									
                                </ul>
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-2 -->
                        <div class="col-lg-<?php echo esc_attr($settings['number2']);?>">
                            <div class="footer-widget">
                                <div class="widget-title">
                                    <h3><?php echo $settings['title2'];?></h3>
                                </div><!-- /.widget-title -->
                                <p><?php echo $settings['text1'];?></p>
                                <ul class="contact-infos">
								
									<?php foreach($settings['repeat2'] as $item):?>
								
                                    <li><i class="fa <?php echo esc_attr($item['block_icons']);?>"></i> <?php echo wp_kses($item['block_title'], $allowed_tags);?></li>
									
									<?php endforeach; ?>
									
                                </ul><!-- /.contact-infos -->
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-3 -->
                        <div class="col-lg-<?php echo esc_attr($settings['number3']);?>">
                            <div class="footer-widget">
                                <div class="widget-title">
                                    <h3><?php echo $settings['title3'];?></h3>
                                </div><!-- /.widget-title -->
                                <p><?php echo $settings['text2'];?></p>
								<form class="subscribe-form" method="post" action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
									<input type="hidden" id="uri2" name="uri" value="<?php echo $settings['news_letter_id'];?>">
									<input type="email" name="email" placeholder="<?php esc_attr_e('Enter Your Email', 'appway'); ?>">
                                    <button type="submit"><?php echo $settings['bttn'];?></button>
                                </form>
                            </div><!-- /.footer-widget -->
                        </div><!-- /.col-lg-4 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.upper-footer -->
            <div class="bottom-footer">
                <div class="container">
                    <div class="inner-container">
                        <div class="left-block">
                            <a href="index.html" class="footer-logo"><img src="<?php echo esc_url($settings['image1']['url']);?>" alt="<?php esc_attr_e('Image', 'conexi'); ?>" /></a>
                            <span><?php echo $settings['text3'];?> <a href="<?php echo esc_url($settings['btnlink']['url']);?>"><?php echo $settings['text4'];?></a></span>
                        </div><!-- /.left-block -->
                        <div class="right-block">
                            <ul class="link-lists">
                                <?php $fearures = explode("\n", ($settings['feature_str']));?>
								<?php foreach($fearures as $feature):?>
								<?php echo wp_kses($feature, true); ?>
								<?php endforeach; ?>
                            </ul>
                        </div><!-- /.right-block -->
                    </div><!-- /.inner-container -->
                </div><!-- /.container -->
            </div><!-- /.bottom-footer -->
        </footer><!-- /.site-footer -->
                   
                
		<?php 
	}

}

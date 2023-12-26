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
class Tab extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_tab';
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
		return esc_html__( 'Tab', 'conexi' );
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
			'tab',
			[
				'label' => esc_html__( 'Tab', 'conexi' ),
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
						'label' => __( 'Tab Btn', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
					'bttn1',
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
					'bttn2',
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
					'bttn3',
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
		
		// New Tab#2

		$this->start_controls_section(
					'content_section1',
					[
						'label' => __( 'Tab Content 1', 'rashid' ),
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
								[
									'name' => 'block_feature_str',
									'label'       => __( 'Features List', 'rashid' ),
									'type'        => Controls_Manager::TEXTAREA,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Features List', 'rashid' ),
									'default'     => __( '', 'rashid' ),
								],
								[
									'name' => 'block_button',
									'label'       => __( 'Button', 'rashid' ),
									'type'        => Controls_Manager::TEXT,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Button Title', 'rashid' ),
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
						'label' => __( 'Tab Content 2', 'rashid' ),
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
								[
								  'name' => 'block_image',
								  'label' => __( 'Image', 'rashid' ),
								  'type' => Controls_Manager::MEDIA,
								  'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
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
								[
									'name' => 'block_feature_str',
									'label'       => __( 'Features List', 'rashid' ),
									'type'        => Controls_Manager::TEXTAREA,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Features List', 'rashid' ),
									'default'     => __( '', 'rashid' ),
								],
								[
									'name' => 'block_button',
									'label'       => __( 'Button', 'rashid' ),
									'type'        => Controls_Manager::TEXT,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Button Title', 'rashid' ),
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
		
		// New Tab#4

		$this->start_controls_section(
					'content_section3',
					[
						'label' => __( 'Tab Content 3', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
								  'name' => 'block_image',
								  'label' => __( 'Image', 'rashid' ),
								  'type' => Controls_Manager::MEDIA,
								  'default' => ['url' => Utils::get_placeholder_image_src(),],
								],
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
								[
									'name' => 'block_feature_str',
									'label'       => __( 'Features List', 'rashid' ),
									'type'        => Controls_Manager::TEXTAREA,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Features List', 'rashid' ),
									'default'     => __( '', 'rashid' ),
								],
								[
									'name' => 'block_button',
									'label'       => __( 'Button', 'rashid' ),
									'type'        => Controls_Manager::TEXT,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Button Title', 'rashid' ),
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
		
		// New Tab#5

		$this->start_controls_section(
					'content_section4',
					[
						'label' => __( 'Tab Content 4', 'rashid' ),
						'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
					]
				);
				
				$this->add_control(
				  'repeat3', 
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
								[
									'name' => 'block_feature_str',
									'label'       => __( 'Features List', 'rashid' ),
									'type'        => Controls_Manager::TEXTAREA,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Features List', 'rashid' ),
									'default'     => __( '', 'rashid' ),
								],
								[
									'name' => 'block_button',
									'label'       => __( 'Button', 'rashid' ),
									'type'        => Controls_Manager::TEXT,
									'dynamic'     => [
										'active' => true,
									],
									'placeholder' => __( 'Enter your Button Title', 'rashid' ),
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
		
		
        <section class="taxi-style-one <?php echo $settings['sec_class'];?>">
            <div class="container">
				<?php if($settings['title']): ?>
                <div class="block-title text-center">
                    <div class="dot-line"></div><!-- /.dot-line -->
                    <p><?php echo $settings['subtitle'];?></p>
                    <h2><?php echo $settings['title'];?></h2>
                </div><!-- /.block-title -->
				<?php endif; ?>
                <ul class="nav nav-tabs tab-title" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#hybrid" role="tab" data-toggle="tab"><?php echo $settings['bttn'];?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#town" role="tab" data-toggle="tab"><?php echo $settings['bttn1'];?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#limousine" role="tab" data-toggle="tab"><?php echo $settings['bttn2'];?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#suv" role="tab" data-toggle="tab"><?php echo $settings['bttn3'];?></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane show active  animated fadeInUp" id="hybrid">
                        <div class="row">
						
							<?php foreach($settings['repeat'] as $item):?>
						
                            <div class="col-lg-4">
                                <div class="single-taxi-one">
                                    <div class="inner-content">
                                        <img src="<?php echo esc_url($item['block_image']['url']);?>" alt="<?php esc_attr_e('Image', 'conexi'); ?>" />
                                        <div class="icon-block">
                                            <i class="<?php echo esc_attr($item['block_icons']);?>"></i>
                                        </div><!-- /.icon-block -->
                                        <h3><?php echo wp_kses($item['block_title'], $allowed_tags);?></h3>
                                        <ul class="feature-list">
                                            <?php $fearures = explode("\n", ($item['block_feature_str']));?>
											<?php foreach($fearures as $feature):?>
											<?php echo wp_kses($feature, true); ?>
											<?php endforeach; ?>
                                        </ul><!-- /.feature-list -->
                                        <a href="<?php echo esc_url($item['block_btnlink']['url']);?>" class="book-taxi-btn"><?php echo wp_kses($item['block_button'], $allowed_tags);?></a>
                                    </div><!-- /.inner-content -->
                                </div><!-- /.single-taxi-one -->
                            </div><!-- /.col-lg-4 -->
							
							<?php endforeach; ?>
							
                        </div><!-- /.row -->
                    </div>
                    <div role="tabpanel" class="tab-pane animated fadeInUp" id="town">
                        <div class="row">
						
                            <?php foreach($settings['repeat1'] as $item):?>
						
                            <div class="col-lg-4">
                                <div class="single-taxi-one">
                                    <div class="inner-content">
                                        <img src="<?php echo esc_url($item['block_image']['url']);?>" alt="<?php esc_attr_e('Image', 'conexi'); ?>" />
                                        <div class="icon-block">
                                            <i class="<?php echo esc_attr($item['block_icons']);?>"></i>
                                        </div><!-- /.icon-block -->
                                        <h3><?php echo wp_kses($item['block_title'], $allowed_tags);?></h3>
                                        <ul class="feature-list">
                                            <?php $fearures = explode("\n", ($item['block_feature_str']));?>
											<?php foreach($fearures as $feature):?>
											<?php echo wp_kses($feature, true); ?>
											<?php endforeach; ?>
                                        </ul><!-- /.feature-list -->
                                        <a href="<?php echo esc_url($item['block_btnlink']['url']);?>" class="book-taxi-btn"><?php echo wp_kses($item['block_button'], $allowed_tags);?></a>
                                    </div><!-- /.inner-content -->
                                </div><!-- /.single-taxi-one -->
                            </div><!-- /.col-lg-4 -->
							
							<?php endforeach; ?>
							
                        </div><!-- /.row -->
                    </div>
                    <div role="tabpanel" class="tab-pane animated fadeInUp" id="limousine">
                        <div class="row">
						
                            <?php foreach($settings['repeat2'] as $item):?>
						
                            <div class="col-lg-4">
                                <div class="single-taxi-one">
                                    <div class="inner-content">
                                        <img src="<?php echo esc_url($item['block_image']['url']);?>" alt="<?php esc_attr_e('Image', 'conexi'); ?>" />
                                        <div class="icon-block">
                                            <i class="<?php echo esc_attr($item['block_icons']);?>"></i>
                                        </div><!-- /.icon-block -->
                                        <h3><?php echo wp_kses($item['block_title'], $allowed_tags);?></h3>
                                        <ul class="feature-list">
                                            <?php $fearures = explode("\n", ($item['block_feature_str']));?>
											<?php foreach($fearures as $feature):?>
											<?php echo wp_kses($feature, true); ?>
											<?php endforeach; ?>
                                        </ul><!-- /.feature-list -->
                                        <a href="<?php echo esc_url($item['block_btnlink']['url']);?>" class="book-taxi-btn"><?php echo wp_kses($item['block_button'], $allowed_tags);?></a>
                                    </div><!-- /.inner-content -->
                                </div><!-- /.single-taxi-one -->
                            </div><!-- /.col-lg-4 -->
							
							<?php endforeach; ?>
							
                        </div><!-- /.row -->
                    </div>
                    <div role="tabpanel" class="tab-pane animated fadeInUp" id="suv">
                        <div class="row">
						
                            <?php foreach($settings['repeat3'] as $item):?>
						
                            <div class="col-lg-4">
                                <div class="single-taxi-one">
                                    <div class="inner-content">
                                        <img src="<?php echo esc_url($item['block_image']['url']);?>" alt="<?php esc_attr_e('Image', 'conexi'); ?>" />
                                        <div class="icon-block">
                                            <i class="<?php echo esc_attr($item['block_icons']);?>"></i>
                                        </div><!-- /.icon-block -->
                                        <h3><?php echo wp_kses($item['block_title'], $allowed_tags);?></h3>
                                        <ul class="feature-list">
                                            <?php $fearures = explode("\n", ($item['block_feature_str']));?>
											<?php foreach($fearures as $feature):?>
											<?php echo wp_kses($feature, true); ?>
											<?php endforeach; ?>
                                        </ul><!-- /.feature-list -->
                                        <a href="<?php echo esc_url($item['block_btnlink']['url']);?>" class="book-taxi-btn"><?php echo wp_kses($item['block_button'], $allowed_tags);?></a>
                                    </div><!-- /.inner-content -->
                                </div><!-- /.single-taxi-one -->
                            </div><!-- /.col-lg-4 -->
							
							<?php endforeach; ?>
							
                        </div><!-- /.row -->
                    </div>
                </div><!-- /.tab-content -->
            </div><!-- /.container -->
        </section><!-- /.taxi-style-one -->
                   
                
		<?php 
	}

}

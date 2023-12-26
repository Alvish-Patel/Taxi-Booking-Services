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
class Taxi_Fare extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_taxi_fare';
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
		return esc_html__( 'Taxi Fare', 'conexi' );
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
			'taxi_fare',
			[
				'label' => esc_html__( 'Taxi Fare', 'conexi' ),
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
		
		$this->end_controls_section();
		
		// New Tab#1

		$this->start_controls_section(
					'content_section',
					[
						'label' => __( 'Block', 'rashid' ),
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
									'name' => 'block_column',
									'label'   => esc_html__( 'Column', 'rashid' ),
									'type'    => Controls_Manager::NUMBER,
									'default' => 2,
									'min'     => 1,
									'max'     => 12,
									'step'    => 1,
								],
								[
									'name' => 'block_title',
									'label' => esc_html__('Title', 'rashid'),
									'type' => Controls_Manager::TEXTAREA,
									'default' => esc_html__('', 'rashid')
								],
								[
									'name' => 'block_text',
									'label' => esc_html__('Text', 'rashid'),
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
		
		
		<section class="taxi-fare-one <?php echo $settings['sec_class'];?>">
            <div class="container">
                <div class="block-title text-center">
                    <div class="dot-line"></div><!-- /.dot-line -->
                    <p><?php echo $settings['subtitle'];?></p>
                    <h2><?php echo $settings['title'];?></h2>
                </div><!-- /.block-title -->
                <div class="row">
				
					<?php foreach($settings['repeat'] as $item):?>
				
                    <div class="col-lg-<?php echo esc_attr($item['block_column'], true );?>">
                        <div class="single-taxi-fare-one thm-base-bg hvr-float-shadow">
                            <div class="top-block">
                                <div class="icon-block">
                                    <i class="conexi-icon-taxi"></i>
                                </div><!-- /.icon-block -->
                                <div class="text-block">
                                    <h3><?php echo wp_kses($item['block_title'], $allowed_tags);?></h3>
                                    <p><?php echo wp_kses($item['block_text'], $allowed_tags);?></p>
                                </div><!-- /.text-block -->
                            </div><!-- /.top-block -->
                            <ul class="features-list">
                                <?php $fearures = explode("\n", ($item['block_feature_str']));?>
								<?php foreach($fearures as $feature):?>
								<?php echo wp_kses($feature, true); ?>
								<?php endforeach; ?>
                            </ul><!-- /.features-list -->
                            <div class="button-block">
                                <a href="<?php echo esc_url($item['block_btnlink']['url']);?>" class="fare-btn"><?php echo wp_kses($item['block_button'], $allowed_tags);?></a>
                            </div><!-- /.button-block -->
                        </div><!-- /.single-taxi-fare-one -->
                    </div><!-- /.col-lg-6 -->

					<?php endforeach; ?>

                </div><!-- /.row -->
                <div class="block-text text-center">
                    <p><?php echo $settings['text'];?></p>
                </div><!-- /.block-text -->
            </div><!-- /.container -->
        </section><!-- /.taxi-fare-one -->
                   
                
		<?php 
	}

}

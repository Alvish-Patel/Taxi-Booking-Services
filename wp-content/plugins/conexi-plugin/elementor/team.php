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
class Team extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_team';
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
		return esc_html__( 'Team', 'conexi' );
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
			'team',
			[
				'label' => esc_html__( 'Team', 'conexi' ),
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
			'column',
			[
				'label'   => esc_html__( 'Column', 'rashid' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '3',
				'options' => array(
					'12'   => esc_html__( 'One Column', 'rashid' ),
					'6'   => esc_html__( 'Two Column', 'rashid' ),
					'4'   => esc_html__( 'Three Column', 'rashid' ),
					'3'   => esc_html__( 'Four Column', 'rashid' ),
					'2'   => esc_html__( 'Six Column', 'rashid' ),
				),
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
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'conexi' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'conexi' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'conexi' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'conexi' ),
					'title'      => esc_html__( 'Title', 'conexi' ),
					'menu_order' => esc_html__( 'Menu Order', 'conexi' ),
					'rand'       => esc_html__( 'Random', 'conexi' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'conexi' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESc' => esc_html__( 'DESC', 'conexi' ),
					'ASC'  => esc_html__( 'ASC', 'conexi' ),
				),
			]
		);
		$this->add_control(
			'query_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'conexi' ),
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude posts, pages, etc. by ID with comma separated.', 'conexi' ),
			]
		);
		$this->add_control(
            'query_category', 
				[
				  'type' => Controls_Manager::SELECT,
				  'label' => esc_html__('Category', 'conexi'),
				  'options' => get_team_categories()
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
        
        $paged = conexi_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-conexi' );
		$args = array(
			'post_type'      => 'conexi_team',
			'posts_per_page' => conexi_set( $settings, 'query_number' ),
			'orderby'        => conexi_set( $settings, 'query_orderby' ),
			'order'          => conexi_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( conexi_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = conexi_set( $settings, 'query_exclude' );
		}
		if( conexi_set( $settings, 'query_category' ) ) $args['team_cat'] = conexi_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{
		?>
  
		<section class="team-style-one <?php echo $settings['sec_class'];?>">
            <img src="<?php echo esc_url($settings['image']['url']);?>" class="team-bg" alt="<?php esc_attr_e('Image', 'conexi'); ?>" />
            <div class="container">
				<?php if($settings['title']): ?>
                <div class="block-title text-center">
                    <div class="dot-line"></div><!-- /.dot-line -->
                    <p class="light-2"><?php echo $settings['subtitle'];?></p>
                    <h2 class="light"><?php echo $settings['title'];?></h2>
                </div><!-- /.block-title -->
				<?php endif; ?>
                <div class="row">
				
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				
                    <div class="col-lg-<?php echo esc_attr($settings['column'], true );?>">
                        <div class="single-team-one">
                            <div class="image-block">
                                <?php the_post_thumbnail(); ?>
                            </div><!-- /.image-block -->
                            <div class="text-block">
                                <h3><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'team_link', true ));?>"><?php the_title(); ?></a></h3>
                                <p><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></p>
								
								<?php	
								$icons = get_post_meta( get_the_id(), 'social_profile', true );
									if ( ! empty( $icons ) ) :?>
								
                                <ul class="social-block">
                                    <?php
									foreach ( $icons as $h_icon ) :
									$header_social_icons = json_decode( urldecode( conexi_set( $h_icon, 'data' ) ) );
									if ( conexi_set( $header_social_icons, 'enable' ) == '' ) {
									continue;
									}
									$icon_class = explode( '-', conexi_set( $header_social_icons, 'icon' ) );?>
									<li><a href="<?php echo conexi_set( $header_social_icons, 'url' ); ?>"><i class="fab <?php echo esc_attr( conexi_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
									<?php endforeach; ?>
                                </ul><!-- /.social-block -->
								
								<?php endif; ?>
								
                            </div><!-- /.text-block -->
                        </div><!-- /.single-team-one -->
                    </div><!-- /.col-lg-4 -->
					
					<?php endwhile; ?>

                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.team-style-one -->
  
           
        <?php }
		wp_reset_postdata();
	}

}

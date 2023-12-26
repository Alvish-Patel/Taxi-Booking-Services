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
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;
use Elementor\Utils;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class H4_Blog extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'conexi_h4_blog';
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
		return esc_html__( 'H4 Blog', 'conexi' );
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
			'h4_blog',
			[
				'label' => esc_html__( 'H4 Blog', 'conexi' ),
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
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'fixkar' ),
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
				  'options' => get_blog_categories()
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
			'post_type'      => 'post',
			'posts_per_page' => conexi_set( $settings, 'query_number' ),
			'orderby'        => conexi_set( $settings, 'query_orderby' ),
			'order'          => conexi_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if ( conexi_set( $settings, 'query_exclude' ) ) {
			$settings['query_exclude'] = explode( ',', $settings['query_exclude'] );
			$args['post__not_in']      = conexi_set( $settings, 'query_exclude' );
		}
		if( conexi_set( $settings, 'query_category' ) ) $args['category_name'] = conexi_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
	
	
      <section class="news-four container <?php echo esc_attr($settings['sec_class']);?>"> 
	  
	    <?php if($settings['title']): ?>
        <div class="content text-center">
          <div class="check-out-line"></div>
          <div class="check-out-line"></div>
          <h3><?php echo $settings['subtitle'];?></h3>
          <h1><?php echo $settings['title'];?></h1>
        </div>
		<?php endif; ?>
		
          <div class="row">
		  
		    <?php while ( $query->have_posts() ) : $query->the_post(); 
					$meta_image = get_post_meta( get_the_id(), 'meta_image', true );
					?>
		  
            <div class="col-lg-<?php echo esc_attr($settings['column'], true );?> col-md-6">
              <div class="card main-card">
				  
				  <div class="image-box">
                      <div class="image">
                            <?php the_post_thumbnail(); ?>
                        </div>
					  <h2 class="image-text"><a href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>"><?php echo get_the_date(); ?></a></h2>
                  </div>
			  
                <div class="card-body">
                  <div class="d-flex">
                    <div class="author-info d-flex">
                      <i class="fa fa-user"></i>
                      <h5><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e('by', 'conexi'); ?> <?php the_author(); ?></a></h5>
                    </div>
                    <div class="author-info d-flex">
                      <i class="fa fa-envelope"></i>
                      <h5><?php comments_number(); ?></h5>
                    </div>
                  </div>
                  <h5 class="card-title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h5>
                  <p class="card-text"><?php echo conexi_trim(get_the_content(), $settings['text_limit']); ?></p>
				  
				  
                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php echo $settings['bttn'];?></a>
					
					
					
                </div>
              </div>
            </div> 

			<?php endwhile; ?>

			
          </div>
       
      </section>
	
	
        <?php }
		wp_reset_postdata();
	}

}
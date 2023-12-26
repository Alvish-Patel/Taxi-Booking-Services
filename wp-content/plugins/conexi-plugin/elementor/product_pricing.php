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




class Product_Pricing extends Widget_Base {


    public function get_name() {
        return 'conexi_product_pricing';
    }


    public function get_title() {
        return esc_html__( 'Product Pricing', 'conexi' );
    }


    public function get_icon() {
        return 'fa fa-briefcase';
    }


    public function get_categories() {
        return [ 'conexi' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'product_pricing',
            [
                'label' => esc_html__( 'Product Pricing', 'conexi' ),
            ]
        );

     
		
			$this->add_control(
			'product_grid_type',
			array(
				'label'   => esc_html__( 'Products Type', 'ecolab' ),
				'type'    =>  \Elementor\Controls_Manager::SELECT,
				'default' => 'recent_products',
				'options' => array(
					'product_category'      => esc_html__( 'Product Category', 'ecolab' ),
					//'product_tag'      => esc_html__( 'Product Tag', 'ecolab' ),
					'featured_products'     => esc_html__( 'Featured Products', 'ecolab' ),
					'sale_products'         => esc_html__( 'Sale Products', 'ecolab' ),
					'best_selling_products' => esc_html__( 'Best Selling Products', 'ecolab' ),
					'recent_products'       => esc_html__( 'Recent Products', 'ecolab' ),
					'top_rated_products'    => esc_html__( 'Top Rated Products', 'ecolab' ),
					
				
				),
			)
		);



   $this->add_control(
                'cat_ids',
                [
                    'label' => __( 'Categories', 'plugin-domain' ),
					 'condition' => array(
						'product_grid_type' => 'product_category',
					),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => mr_shop_product_cat_list(),
					 'default' => [ 'all' ],
                ]
            );
		  $this->add_control(
            'all_text',
            [
                'label'       => __( 'All Text', 'conexi' ),
				 'condition' => array(
						'product_grid_type' => 'product_category',
					),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
				 'default' => __( 'All Items', 'conexi' ),	
            ]
        );  
   	
		$this->add_control(
			'show_tab',
			array(
				'label' => esc_html__( 'Show Tab', 'ecolab' ),
				 'condition' => array(
						'product_grid_type' => 'product_category',
					),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'show' => esc_html__( 'Show', 'ecolab' ),	
						'icon' => 'eicon-check-circle',
					],
					'none' => [
						'none' => esc_html__( 'Hide', 'ecolab' ),
						'icon' => 'eicon-close-circle',
					],
				],
				'default' => 'show',
				'selectors' => array(
					'{{WRAPPER}} .mr_filters' => 'display: {{VALUE}} !important',
				),
			)
		);		
		
	$this->add_control(
            'query_tag',
          array(
                'label' => __( 'Select Tags', 'ecolab' ),
                'condition' => array(
					'product_grid_type' => 'product_tag',
				),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => mr_shop_product_tag_list(),
                'default' => [ 'all' ],
            )
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
                    'DESC' => esc_html__( 'DESC', 'conexi' ),
                    'ASC'  => esc_html__( 'ASC', 'conexi' ),
                ),
            ]
        );
		 
            $this->add_control(
                'count',
                [
                    'label' => __( 'Products Count', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '9'
                ]
            );
	     $this->add_control(
            'column',
            [
                'label'   => esc_html__( 'Column', 'bitfix' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '3',
                'options' => array(
                    '12'   => esc_html__( 'One Column', 'bitfix' ),
                    '6'   => esc_html__( 'Two Column', 'bitfix' ),
                    '4'   => esc_html__( 'Three Column', 'bitfix' ),
                    '3'   => esc_html__( 'Four Column', 'bitfix' ),
                    '2'   => esc_html__( 'Six Column', 'bitfix' ),
                ),
            ]
        );
		
		
 $this->add_control(
            'bttn',
            [
                'label'       => __( 'Book Now', 'conexi' ),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
				 'default' => __( 'Book Now', 'conexi' ),	
            ]
        );  
   		
   $this->add_control(
            'sec_class',
            [
                'label'       => __( 'Section Class', 'rashid' ),
                'type'        => Controls_Manager::TEXT,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter Section Class', 'rashid' ),
            ]
        );
        $this->end_controls_section();
     
    }


		   
		   
	   
	protected function render() {
		global $product;
		global $wp_query;
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');		
        $paged = get_query_var('paged');
		$paged = conexi_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-conexi' );
	
	//Column Settings Area	 

		  if($settings['columns'] == '6') {
                $columns_markup = 'col-lg-2 col-md-12';
            }
           else if($settings['columns'] == '4') {
                $columns_markup = 'col-lg-3 col-md-12';
            } 

          else if($settings['columns'] == '3') {
                $columns_markup = 'col-lg-4 col-md-12';
            }

          else if($settings['columns'] == '2') {
                $columns_markup = 'col-lg-6 col-md-12';
            } 

          else if($settings['columns'] == '1') {
                $columns_markup = 'col-lg-12 col-md-12';
            }       
		
     // Call the setting and make variable 

		$product_per_page = $settings['count'];
		$product_order_by = $settings['query_orderby'];
		$product_order    = $settings['query_order'];
		$product_grid_type = $settings['product_grid_type'];
		$catagory_name     = $settings['cat_ids'];
		$tag_name     = $settings['query_tag'];
	  // Argument for $args	
		if ( $product_grid_type == 'sale_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'meta_query'     => array(
					'relation' => 'OR',
					array(// Simple products type
						'key'     => '_sale_price',
						'value'   => 0,
						'compare' => '>',
						'type'    => 'numeric',
					),
					array(// Variable products type
						'key'     => '_min_variation_sale_price',
						'value'   => 0,
						'compare' => '>',
						'type'    => 'numeric',
					),
				),
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'best_selling_products' ) {
			$args = array(
				'post_type'      => 'product',
				'meta_key'       => 'total_sales',
				'orderby'        => 'meta_value_num',
				'posts_per_page' => $product_per_page,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'recent_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'featured_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'tax_query'      => array(
					array(
						'taxonomy' => 'product_visibility',
						'field'    => 'name',
						'terms'    => 'featured',
					),
				),
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);

		}
		if ( $product_grid_type == 'top_rated_products' ) {
			$args = array(
				'posts_per_page' => $product_per_page,
				'no_found_rows'  => 1,
				'post_status'    => 'publish',
				'post_type'      => 'product',
				'meta_key'       => '_wc_average_rating',
				'orderby'        => 'meta_value_num',
				'order'          => $product_order,
				'meta_query'     => WC()->query->get_meta_query(),
				'tax_query'      => WC()->query->get_tax_query(),
			);
		}

		if ( $product_grid_type == 'product_category' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'product_cat'    => $catagory_name,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}

		if ( $product_grid_type == 'product_tag' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'product_tag'    => $tag_name,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		// End of args
		
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
			
//HTML are index eee			
		{ ?>		   
		   



    <section class="taxi-style-one">
            <div class="container">	
		  <?php if($settings['show_tab']): ?>
                <!--Filter-->
                <div class="mr_filters filters tab-title">
                    <ul class="filter-tabs filter-btns">
						 <li class="filter all"><?php echo $settings['all_text'];?></li>
                <?php
                    global $product;
                    $i = 0;          
                    foreach($settings['cat_ids'] as $cat) {
                        $i++;
                        if($i == 1) {
                            $ac_class = 'active';
                        } else {
                            $ac_class = '';
                        }
                        $cat_info = get_term($cat, 'product_cat'); ?>

                        <li class="filter <?php echo esc_attr($ac_class);?>" data-role="button" data-filter=".<?php echo esc_attr($cat_info->slug);?>"><?php echo ($cat_info->name);?></li>

                <?php } ?> 
                    </ul>
                </div>
				
			     <?php endif; ?>
                <!--Sortable Galery-->
                <div class="sortable-masonry">                
                    <div class="items-container row">

            <?php 
            while( $query->have_posts() ): $query->the_post();
            global $post, $product;
		 
		    $meta_image = get_post_meta( get_the_id(), 'meta_image', true );
		   $meta_icons = get_post_meta( get_the_id(), 'service_icon', true );
		 
		 
		 
            $post_terms = get_the_terms( get_the_id(), 'product_cat');       
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
            ?>
    

                                <div class=" col-md-12 col-lg-<?php echo esc_attr($settings['column'], true );?> masonry-item all  <?php echo esc_attr($term_slug); ?>">
                                
                                <?php
                                     /**
                                     * Hook: woocommerce_before_shop_loop_item.
                                     */
                                    do_action( 'woocommerce_before_shop_loop_item' );
                                
                                     ?> 

                                <div <?php wc_product_class(); ?>>   
                                
                                
                                    <div class="single-taxi-one">
                                        <div class="inner-content">
                                            <div class="mr_product_thumb image"><?php the_post_thumbnail(); ?></div>
                                            <div class="icon-block">
												
										<?php if (esc_url($meta_image['url'])) : ?>	
											<img src="<?php echo esc_url($meta_image['url']);?>" alt="">
										<?php else : ?>	
											  <i class="<?php echo esc_attr($meta_icons);?>"></i>
										<?php endif;?>	
												
                                              
                                            </div>
                                             <div class="mr_product_title"><h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3></div>
                                            <div class="text"><?php the_content(); ?></div>
                                                <a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="book-taxi-btn product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>"><?php echo $settings['bttn'];?></a>
                                                <!-- Product Add to Cart -->
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            <?php endwhile; ?> 
               
                    </div>
                </div>
            </div><!-- /.container -->
        </section><!-- /.taxi-style-one -->


  
<?php }
        wp_reset_postdata();

        } 


}

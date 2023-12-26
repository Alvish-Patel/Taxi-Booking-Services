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
class Mr_Product_Tab extends Widget_Base {

    public function get_name() {
        return 'conexi_mr_product_tab';
    }
    public function get_title() {
        return esc_html__( 'Tab Product', 'conexi' );
    }


    public function get_icon() {
        return 'fa fa-briefcase';
    }

    public function get_categories() {
        return [ 'conexi' ];
    }
    
    private function get_all_categories() {
        $options  = array();
        $taxonomy = 'product_cat';
        if ( ! empty( $taxonomy ) ) {
            $terms = get_terms(
                array(
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => false,
                    'parent'     => 0,
                )
            );
            if ( ! empty( $terms ) ) {
                foreach ( $terms as $term ) {
                    if ( isset( $term ) ) {
                        if ( isset( $term->slug ) && isset( $term->name ) ) {
                            $options[ $term->slug ] = $term->name;
                            foreach ( get_terms(
                                $taxonomy,
                                array(
                                    'hide_empty' => false,
                                    'parent'     => $term->term_id,
                                )
                            ) as $child_term ) {
                                   $options[ $child_term->slug ] = '--' . $child_term->name;
                            }
                        }
                    }
                }
            }
        }
        return $options;
    }
    
    
    protected function register_controls() {
        $this->start_controls_section(
            'mr_product_tab',
            [
                'label' => esc_html__( 'Tab Product', 'conexi' ),
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
            'bttn',
            [
                'label'       => __( 'Add to Cart', 'rashid' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
               'default' => esc_html__('Add to Cart', 'rashid')
            ]
        );
		
		
        
        $this->end_controls_section();
        
        // New Tab#1

        
        // New Tab#2

        $this->start_controls_section(
                    'content_section1',
                    [
                        'label' => __( 'Tab Content 1', 'rashid' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    ]
                );
                
                $this->add_control(
                  'product_tabs_tab', 
                    [
                        'type' => Controls_Manager::REPEATER,
                        'seperator' => 'before',
                        'default' => 
                            [
                                ['tab_title' => esc_html__('Projects Completed', 'rashid')],
                            ],
                        'fields' => 
                            [
                        
                                [
                                    'name' => 'tab_title',
                                    'label' => esc_html__('Tab Title', 'rashid'),
                                    'type' => Controls_Manager::TEXTAREA,
                                    'default' => esc_html__('', 'rashid')
                                ],
                            
                                [
                                'name' => 'product_grid_type',
                                'label'   => esc_html__( 'Product Type', 'kidzone-core' ),
                                'type'    => Controls_Manager::SELECT,
                                'default' => 'recent_products',
                                'options' => array(
                                    'featured_products'     => esc_html__( 'Featured Products', 'kidzone-core' ),
                                    'sale_products'         => esc_html__( 'Sale Products', 'kidzone-core' ),
                                    'best_selling_products' => esc_html__( 'Best Selling Products', 'kidzone-core' ),
                                    'recent_products'       => esc_html__( 'Recent Products', 'kidzone-core' ),
                                    'top_rated_products'    => esc_html__( 'Top Rated Products', 'kidzone-core' ),
                                    'product_category'      => esc_html__( 'Product Category', 'kidzone-core' ),
                                ),
                            ],
                            
                            
                            [
                                'name' => 'catagory_name',
                                'label'     => esc_html__( 'Category', 'kidzone-core' ),
                                'type'      => Controls_Manager::SELECT,
                                'options'   => $this->get_all_categories(),
                                'condition' => array(
                                    'product_grid_type' => 'product_category',
                                ),

                            ],
                            
                            
            [
                'name' => 'product_per_page',
                'label'   => esc_html__( 'Number of Products', 'kidzone-core' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 8,

            ],
                                                
            
            [
                'name' => 'product_order_by',
                'label'   => esc_html__( 'Order By', 'kidzone-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => array(
                    'date'          => esc_html__( 'Date', 'kidzone-core' ),
                    'ID'            => esc_html__( 'ID', 'kidzone-core' ),
                    'author'        => esc_html__( 'Author', 'kidzone-core' ),
                    'title'         => esc_html__( 'Title', 'kidzone-core' ),
                    'modified'      => esc_html__( 'Modified', 'kidzone-core' ),
                    'rand'          => esc_html__( 'Random', 'kidzone-core' ),
                    'comment_count' => esc_html__( 'Comment count', 'kidzone-core' ),
                    'menu_order'    => esc_html__( 'Menu order', 'kidzone-core' ),
                ),
            ],
            [
                'name' => 'product_order',
                'label'   => esc_html__( 'Product Order', 'kidzone-core' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'desc',
                'options' => array(
                    'desc' => esc_html__( 'DESC', 'kidzone-core' ),
                    'asc'  => esc_html__( 'ASC', 'kidzone-core' ),
                ),
            ],          

                            ],
                        'title_field' => '{{tab_title}}',
                     ]
            );
                
        $this->end_controls_section();
        
    }


    protected function render() {
    
        $settings  = $this->get_settings();
        $allowed_tags = wp_kses_allowed_html('post');

//HTML are index eee            
         ?>        
           

        <section class="taxi-style-one ">
            <div class="container">
                
                <div class="block-title text-center">
                    <div class="dot-line"></div><!-- /.dot-line -->
                    <p><?php echo $settings['subtitle'];?></p>
                    <h2><?php echo $settings['title'];?></h2>
                </div><!-- /.block-title -->
                
                <ul class="nav nav-tabs tab-title" role="tablist">
                   
    <?php
                                    $i = 1;
                                    foreach ( $settings['product_tabs_tab'] as $tab ) {
                                        $this->tabid[ $tab['_id'] ] = $tab['_id'] . rand( 1000, 9999 );
                                        $active_btn                 = '';
                                        if ( $i == 1 ) {
                                            $active_btn = 'active';
                                        }
                                        ?>
                   <li class="nav-item">
                        <a class="nav-link <?php echo $active_btn; ?>" href="#tab-<?php echo $this->tabid[ $tab['_id'] ]; ?>" role="tab" data-toggle="tab"><?php echo esc_html( $tab['tab_title'] ); ?></a>
                    </li>
                        <?php
                                        $i++;
                                    }
                                    ?>  
                 
                </ul>
                <div class="tab-content">
                
                   <?php
            $i = 1;

            foreach ( $settings['product_tabs_tab'] as $tab ) {
                $product_grid_type = $tab['product_grid_type'];
                $product_per_page  = $tab['product_per_page'];
                $product_order     = $tab['product_order'];
                $product_order_by  = $tab['product_order_by'];
                $catagory_name     = $tab['catagory_name'];

                $active_tab = '';
                if ( $i == 1 ) {
                     $active_tab = 'active';
                }
                ?>
                    <div role="tabpanel" class="tab-pane show <?php echo $active_tab; ?>  animated fadeInUp" id="tab-<?php echo $this->tabid[ $tab['_id'] ]; ?>">
                        <div class="row">
        <?php               
            if ( $product_grid_type == 'sale_products' ) {
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $product_per_page,
                'meta_query'     => array(
                    'relation' => 'OR',
                    array( // Simple products type
                        'key'     => '_sale_price',
                        'value'   => 0,
                        'compare' => '>',
                        'type'    => 'numeric',
                    ),
                    array( // Variable products type
                        'key'     => '_min_variation_sale_price',
                        'value'   => 0,
                        'compare' => '>',
                        'type'    => 'numeric',
                    ),
                ),
            );
        } elseif ( $product_grid_type == 'best_selling_products' ) {
            $args = array(
                'post_type'      => 'product',
                'meta_key'       => 'total_sales',
                'orderby'        => 'meta_value_num',
                'posts_per_page' => $product_per_page,
            );
        } elseif ( $product_grid_type == 'recent_products' ) {
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $product_per_page,
                'orderby'        => $product_order,
                'order'          => $product_order_by,
            );
        } elseif ( $product_grid_type == 'featured_products' ) {
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
            );
        } elseif ( $product_grid_type == 'top_rated_products' ) {
            $args = array(
                'posts_per_page' => $product_per_page,
                'no_found_rows'  => 1,
                'post_status'    => 'publish',
                'post_type'      => 'product',
                'meta_key'       => '_wc_average_rating',
                'orderby'        => $product_order_by,
                'order'          => $product_order,
                'meta_query'     => WC()->query->get_meta_query(),
                'tax_query'      => WC()->query->get_tax_query(),
            );
        } elseif ( $product_grid_type == 'product_category' ) {
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $product_per_page,
                'product_cat'    => $catagory_name,
                'orderby'        => $product_order_by,
                'order'          => $product_order,
            );
        }

        $loop = new \WP_Query( $args );
    

        if ( $loop->have_posts() ) {
            
            $i     = 1;
            $count = 1;
            $flag  = 0;
            
            while ( $loop->have_posts() ) :
                $loop->the_post();  
    global  $product;
        $meta_image = get_post_meta( get_the_id(), 'meta_image', true );
           $meta_icons = get_post_meta( get_the_id(), 'service_icon', true );
    
                $i++; ?>                

                        
        
                                <div class=" col-md-12 col-lg-4 masonry-item all  mrmain">
                                
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
             <?php endwhile; }?> 
                        </div><!-- /.row -->
                    </div>
                    
                <?php
                $i++;
            }
            ?>      

                </div><!-- /.tab-content -->
            </div><!-- /.container -->
        </section><!-- /.taxi-style-one -->
                   
<?php 
        wp_reset_postdata();

        } 


}



        

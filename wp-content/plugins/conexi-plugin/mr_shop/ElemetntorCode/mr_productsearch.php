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

 * @since 1.0.0
 */
class Mr_Productsearch extends Widget_Base {


    public function get_name() {
        return 'conexi_mr_productsearch';
    }

    public function get_title() {
        return esc_html__( 'Products Search', 'conexi' );
    }
    public function get_icon() {
        return 'fa fa-briefcase';
    }
    
    public function get_categories() {
        return [ 'conexi' ];
    }
    
    protected function _register_controls() {
        $this->start_controls_section(
            'Product Search',
            [
                'label' => esc_html__( 'Product Search', 'conexi' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'conexi' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter your title', 'conexi' ),
            ]
        );
        $this->add_control(
            'search_form',
            [
                'label'       => __( 'Search Form', 'conexi' ),
                'type'        => Controls_Manager::TEXTAREA,
                'dynamic'     => [
                    'active' => true,
                ],
                'placeholder' => __( 'Enter your Form', 'conexi' ),
                'default'     => __( '', 'conexi' ),
            ]
        );
        
        $this->end_controls_section();

        }

    /**
     * Render button widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since  1.0.0
     * @access 
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
        ?>
             
        <section class="product_search">
            <div class="conexi-parts-search-box-area">
                <div class="conexi-parts-search-box-header">
                    <h2><?php echo $settings['title'];?></h2>
                </div>
                <?php echo do_shortcode( $settings['search_form'] );?>

            </div>
        </section>
             
        <?php 
    }

}
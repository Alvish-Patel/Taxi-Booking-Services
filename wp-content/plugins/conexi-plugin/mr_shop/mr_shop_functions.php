<?php
/**
 * Mrshop Settings
 *
 */


function brator_tab_filter_products() {
	$catSlug           = $_POST['category'];
	$product_grid_type = $_POST['product_grid_type'];
	$product_per_page  = $_POST['product_per_page'];
	$product_order_by  = $_POST['product_order_by'];
	$product_order     = $_POST['product_order'];
	$catagory_name     = $_POST['catagory_name'];
	$product_style     = $_POST['product_style'];

	if ( $catSlug != 'all' ) {

		if ( $product_grid_type == 'sale_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'product_cat'    => $catSlug,
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
				'product_cat'    => $catSlug,
				'meta_key'       => 'total_sales',
				'orderby'        => 'meta_value_num',
				'posts_per_page' => $product_per_page,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'recent_products' ) {
			$args = array(
				'post_type'      => 'product',
				'product_cat'    => $catSlug,
				'posts_per_page' => $product_per_page,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
		if ( $product_grid_type == 'featured_products' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'product_cat'    => $catSlug,
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
				'product_cat'    => $catSlug,
				'meta_key'       => '_wc_average_rating',
				'orderby'        => $product_order_by,
				'order'          => $product_order,
				'meta_query'     => WC()->query->get_meta_query(),
				'tax_query'      => WC()->query->get_tax_query(),
			);
		}

		if ( $product_grid_type == 'product_category' ) {
			$args = array(
				'post_type'      => 'product',
				'posts_per_page' => $product_per_page,
				'product_cat'    => $catSlug,
				'orderby'        => $product_order_by,
				'order'          => $product_order,
			);
		}
	} else {

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
				'orderby'        => $product_order_by,
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
	}
	$ajaxposts = new WP_Query( $args );

	if ( $ajaxposts->have_posts() ) {
		while ( $ajaxposts->have_posts() ) :
			$ajaxposts->the_post();
			if ( $product_style == 'style_2' ) {
				wc_get_template_part( 'content', 'product-slide' );
			} else {
				wc_get_template_part( 'content', 'product-slidetwo' );
			}
		endwhile;
	} else {
		echo esc_html__( 'Not found products', 'brator-core' );
	}
	exit;
}
add_action( 'wp_ajax_brator_tab_filter_products', 'brator_tab_filter_products' );
add_action( 'wp_ajax_nopriv_brator_tab_filter_products', 'brator_tab_filter_products' );



//This function is for product catagory list

    function mr_shop_product_cat_list( ) {
        $elements = get_terms( 'product_cat', array('hide_empty' => false) );
        $product_cat_array = array();

        if ( !empty($elements) ) {
            foreach ( $elements as $element ) {
                $info = get_term($element, 'product_cat');
                $product_cat_array[ $info->term_id ] = $info->name;
            }
        }
    
        return $product_cat_array;
    }

    function mr_shop_product_tag_list( ) {
        $elements = get_terms( 'product_tag', array('hide_empty' => false) );
        $product_cat_array = array();

        if ( !empty($elements) ) {
            foreach ( $elements as $element ) {
                $info = get_term($element, 'product_tag');
                $product_cat_array[ $info->term_id ] = $info->name;
            }
        }
    
        return $product_cat_array;
    }


//Rating Functions  from arifur vai 

if ( ! function_exists( 'mr_product_rating' ) ) {

	function mr_product_rating() {
		 global $product;
		$rating = intval( $product->get_average_rating() );

		if ( $rating && wc_review_ratings_enabled() ) {
			?>
<ul class="mr_star_rating">
			<?php for ( $rs = 1; $rs <= $rating; $rs++ ) : ?>
	<li class="mr_star_full"><i class="fa fa-star"></i></li>
	<?php endfor; ?>
			<?php
			if ( ( 5 - $rating ) > 0 ) {
				for ( $rns = 1; $rns <= ( 5 - $rating ); $rns++ ) :
					?>
	<li class="mr_star_empty"><i class="fa fa-star-o"></i></li>
					<?php
					endfor;
			}
			?>
</ul>
			<?php
		}
	}
}

//function for Hot Sale
function mr_product_cat_list( ) {
 
    $term_id = 'product_cat';
    $categories = get_terms( $term_id );
 
    $cat_array['all'] = "Categories";

    if ( !empty($categories) ) {
        foreach ( $categories as $cat ) {
            $cat_info = get_term($cat, $term_id);
            $cat_array[ $cat_info->slug ] = $cat_info->name;
        }
    }
 
    return $cat_array;
}


function mr_product_tag_list( ) {
 
    $term_id = 'product_tag';
    $tag = get_terms( $term_id );
 
    $tag_array['all'] = "Tags";

    if ( !empty($tag) ) {
        foreach ( $tag as $tag ) {
            $tag_info = get_term($tag, $term_id);
            $tag_array[ $tag_info->slug ] = $tag_info->name;
        }
    }
 
    return $tag_array;
}

function mr_get_product_prices( $product ) {

	$saleargs = array(
		'qty'   => '1',
		'price' => $product->get_sale_price(),
	);
	$args     = array(
		'qty'   => '1',
		'price' => $product->get_regular_price(),
	);

	$tax_display_mode      = get_option( 'woocommerce_tax_display_shop' );
	$display_price         = $tax_display_mode == 'incl' ? wc_get_price_including_tax( $product ) : wc_get_price_excluding_tax( $product );
	$display_regular_price = $tax_display_mode == 'incl' ? wc_get_price_including_tax( $product, $args ) : wc_get_price_excluding_tax( $product, $args );
	$display_sale_price    = $tax_display_mode == 'incl' ? wc_get_price_including_tax( $product, $saleargs ) : wc_get_price_excluding_tax( $product, $saleargs );
	switch ( $product->get_type() ) {
		case 'variable':
			$price = $product->get_variation_regular_price( 'min', true );
			$sale  = $display_price;
			break;
		case 'simple':
			$price = $display_regular_price;
			$sale  = $display_sale_price;
			break;
	}
	if ( isset( $sale ) && ! empty( $sale ) && isset( $price ) && ! empty( $price ) ) {
		return array(
			'sale'  => $sale,
			'price' => $price,
		);
	}
	return false;
}

function mr_product_special_price_calc( $data ) {
	// sale and price
	if ( ! empty( $data ) ) {
		extract( $data );
	}
	$prefix = '';
	if ( isset( $sale ) && ! empty( $sale ) && isset( $price ) && ! empty( $price ) ) {
		if ( $price > $sale ) {
			$prefix  = '-';
			$dval    = $price - $sale;
			$percent = ( $dval / $price ) * 100;
		}
	}

	if ( isset( $percent ) && ! empty( $percent ) ) {
		return array(
			'prefix'  => $prefix,
			'percent' => round( $percent ),
		);
	}
	return false;
}


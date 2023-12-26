<?php
//call this function to core file

add_action( 'wp_enqueue_scripts', 'conexi_search_scripts' );

// Register Custom Taxonomy
	function make_year_func() {
		$labels = array(
			'name'              => _x( 'Years', 'conexi' ),
			'singular_name'     => _x( 'Year', 'conexi' ),
			'search_items'      => __( 'Search Year' ),
			'all_items'         => __( 'All Year' ),
			'parent_item'       => __( 'Parent Year' ),
			'parent_item_colon' => __( 'Parent Year:' ),
			'edit_item'         => __( 'Edit Year' ),
			'update_item'       => __( 'Update Year' ),
			'add_new_item'      => __( 'Add New Year' ),
			'new_item_name'     => __( 'New Year' ),
			'menu_name'         => __( 'Years' ),
		);
		$args   = array(
			'hierarchical'          => false,
			'public'                => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => false,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'product-year' ),
		);
		register_taxonomy( 'make_year', array( 'product' ), $args );
	}
	
add_action( 'init', 'make_year_func', 0 );	


 function make_brand_func() {
		$labels = array(
			'name'              => _x( 'Brands', 'conexi' ),
			'singular_name'     => _x( 'Brand', 'conexi' ),
			'search_items'      => __( 'Search Brand', 'conexi' ),
			'all_items'         => __( 'All Brand', 'conexi' ),
			'parent_item'       => __( 'Parent Brand', 'conexi' ),
			'parent_item_colon' => __( 'Parent Brand:', 'conexi' ),
			'edit_item'         => __( 'Edit Brand', 'conexi' ),
			'update_item'       => __( 'Update Brand', 'conexi' ),
			'add_new_item'      => __( 'Add New Brand', 'conexi' ),
			'new_item_name'     => __( 'New Brand', 'conexi' ),
			'menu_name'         => __( 'Brands', 'conexi' ),
		);
		$args   = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product-brand' ),
		);

		register_taxonomy( 'make_brand', array( 'product' ), $args );
	}
add_action( 'init', 'make_brand_func', 0 );	


	function make_model_func() {
		$labels = array(
			'name'              => _x( 'Models', 'conexi' ),
			'singular_name'     => _x( 'Model', 'conexi' ),
			'search_items'      => __( 'Search Model', 'conexi' ),
			'all_items'         => __( 'All Model', 'conexi' ),
			'parent_item'       => __( 'Parent Model', 'conexi' ),
			'parent_item_colon' => __( 'Parent Model:', 'conexi' ),
			'edit_item'         => __( 'Edit Model', 'conexi' ),
			'update_item'       => __( 'Update Model', 'conexi' ),
			'add_new_item'      => __( 'Add New Model', 'conexi' ),
			'new_item_name'     => __( 'New Model', 'conexi' ),
			'menu_name'         => __( 'Models', 'conexi' ),
		);
		$args   = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product-model' ),
		);

		register_taxonomy( 'make_model', array( 'product' ), $args );
	}
add_action( 'init', 'make_model_func', 0 );	

	function make_engine_func() {
		$labels = array(
			'name'              => _x( 'Engines', 'conexi' ),
			'singular_name'     => _x( 'Engine', 'conexi' ),
			'search_items'      => __( 'Search Engine' ),
			'all_items'         => __( 'All Engine' ),
			'parent_item'       => __( 'Parent Engine' ),
			'parent_item_colon' => __( 'Parent Engine:' ),
			'edit_item'         => __( 'Edit Engine' ),
			'update_item'       => __( 'Update Engine' ),
			'add_new_item'      => __( 'Add New Engine' ),
			'new_item_name'     => __( 'New Engine' ),
			'menu_name'         => __( 'Engines' ),
		);
		$args   = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => false,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'product-engine' ),
		);

		register_taxonomy( 'make_engine', array( 'product' ), $args );
	}
add_action( 'init', 'make_engine_func', 0 );	


//ShortCode for Banner and reset [conexi_search_result_banner]

add_shortcode( 'conexi_search_result_banner', 'conexi_search_result_banner_func' );
function conexi_search_result_banner_func() {
	$makeyear   = '';
	$makebrand  = '';
	$makemodel  = '';
	$makeengine = '';

	if ( isset( $_GET['makeyear'] ) && ! empty( $_GET['makeyear'] ) ) {
		$makeyear = $_GET['makeyear'];
		$makeyear = str_replace( '-', ' ', $makeyear );
	}

	if ( isset( $_GET['brand'] ) && ! empty( $_GET['brand'] ) ) {
		$makebrand = $_GET['brand'];
		$makebrand = str_replace( '-', ' ', $makebrand );
	}

	if ( isset( $_GET['model'] ) && ! empty( $_GET['model'] ) ) {
		$makemodel = $_GET['model'];
		$makemodel = str_replace( '-', ' ', $makemodel );
	}

	if ( isset( $_GET['engine'] ) && ! empty( $_GET['engine'] ) ) {
		$makeengine = $_GET['engine'];
		$makeengine = str_replace( '-', ' ', $makeengine );
	}

	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
	if ( isset( $_REQUEST['search'] ) == 'advanced' && ! is_admin() ) {
		?>
	<div class="conexi-current-vehicle-area">
		<div class="container-xxxl container-xxl container">
			<div class="row">
				<div class="col-12">
					<div class="conexi-current-vehicle">
						<div class="conexi-current-vehicle-content">
							<p><?php esc_html_e( 'Your current vehicle', 'conexi' ); ?></p>
							<h4><?php esc_html_e( 'Auto Parts for', 'conexi' ); ?> <span> <?php echo esc_html( $makeyear . ' ' . $makebrand . ' ' . $makemodel . ' ' . $makeengine ); ?> </span></h4>
						</div>
						<div class="conexi-current-vehicle-content"><a href="<?php echo esc_url( $shop_page_url ); ?>"><?php esc_html_e( 'Reset', 'conexi' ); ?></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php
	}
}	



//Query Short-codes [conexi_auto_parts_vehicle_ready]


add_shortcode( 'conexi_auto_parts_vehicle_ready', 'conexi_auto_parts_vehicle_ready_func' );
function conexi_auto_parts_vehicle_ready_func() {
	?>
	<form method="post" id="advanced-searchform" class="conexi-parts-search-box-form">
		<select class="select-year-parts conexi-select-active" id="makeyear" name="makeyear">
			<option value=""><?php esc_html_e( 'Year', 'conexi' ); ?></option>
			<?php
			$make_year = get_terms(
				array(
					'taxonomy'   => 'make_year',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_year ) ) {
				foreach ( $make_year as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>
		<select class="select-make-parts conexi-select-active" id="makebrand" name="brand" disabled>
			<option value=""><?php esc_html_e( 'Make', 'conexi' ); ?></option>
			<?php
				$make_brand = get_terms(
					array(
						'taxonomy'   => 'make_brand',
						'hide_empty' => false,
					)
				);
			if ( ! empty( $make_brand ) ) {
				foreach ( $make_brand as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>
		<select class="select-model-parts conexi-select-active" id="makemodel" name="model" disabled>
			<option value=""><?php esc_html_e( 'Model', 'conexi' ); ?></option>
			<?php
			$make_model = get_terms(
				array(
					'taxonomy'   => 'make_model',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_model ) ) {
				foreach ( $make_model as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>
		<select class="select-engine-parts conexi-select-active" id="makeengine" name="engine" disabled>
			<option value=""><?php esc_html_e( 'Engine', 'conexi' ); ?></option>
			<?php
			$make_engine = get_terms(
				array(
					'taxonomy'   => 'make_engine',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_engine ) ) {
				foreach ( $make_engine as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>
		<button name="adv_conexi_form" type="submit"><?php esc_html_e( 'Add Vehicle', 'conexi' ); ?></button>
	  </form>
	<?php
	if ( isset( $_POST['adv_conexi_form'] ) ) {
		// $_SESSION['makeyear'] = $_POST['makeyear'];
		// $_SESSION['brand']    = $_POST['brand'];
		// $_SESSION['model']    = $_POST['model'];
		// $_SESSION['engine']   = $_POST['engine'];

		$_SESSION['vehicle_items'][] = array(
			'makeyear' => $_POST['makeyear'],
			'brand'    => $_POST['brand'],
			'model'    => $_POST['model'],
			'engine'   => $_POST['engine'],
		);
	}

	// print_r( $_SESSION['vehicle_items'] );
	if ( ! empty( $_SESSION['vehicle_items'] ) ) {
		?>
		<ul class="vehicle-list">
		<?php foreach ( $_SESSION['vehicle_items'] as $val ) { ?>
			<li><?php echo $val['makeyear'] . ' ' . $val['brand'] . ' ' . $val['model'] . '<span>' . $val['engine'] . '</span>'; ?></li>
		<?php } ?>
			<li id="clearvehicle"><?php esc_html_e( 'Clear History', 'conexi' ); ?></li>
		</ul>
		<?php
	}
}

//Query Short-codes [conexi_auto_parts_search]
add_shortcode( 'conexi_auto_parts_search', 'conexi_auto_parts_search_func' );
function conexi_auto_parts_search_func() {
	$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );
	?>
	<form method="get" id="advanced-searchform" class="conexi-parts-search-box-form" role="search" action="<?php echo $shop_page_url; ?>">
		  <input type="hidden" name="search" value="advanced">
		<select class="select-year-parts conexi-select-active" id="makeyear" name="makeyear">
			<option value=""><?php esc_html_e( 'Year', 'conexi' ); ?></option>
			<?php
			$make_year = get_terms(
				array(
					'taxonomy'   => 'make_year',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_year ) ) {
				foreach ( $make_year as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>
		<select class="select-make-parts conexi-select-active" id="makebrand" name="brand" disabled>
			  <option value=""><?php esc_html_e( 'Make', 'conexi' ); ?></option>
			<?php
			$make_brand = get_terms(
				array(
					'taxonomy'   => 'make_brand',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_brand ) ) {
				foreach ( $make_brand as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>
		<select class="select-model-parts conexi-select-active" id="makemodel" name="model" disabled>
			<option value=""><?php esc_html_e( 'Model', 'conexi' ); ?></option>
			<?php
			$make_model = get_terms(
				array(
					'taxonomy'   => 'make_model',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_model ) ) {
				foreach ( $make_model as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>
		<select class="select-engine-parts conexi-select-active" id="makeengine" name="engine" disabled>
			<option value=""><?php esc_html_e( 'Engine', 'conexi' ); ?></option>
			<?php
			$make_engine = get_terms(
				array(
					'taxonomy'   => 'make_engine',
					'hide_empty' => false,
				)
			);
			if ( ! empty( $make_engine ) ) {
				foreach ( $make_engine as $single ) {
					echo '<option value="' . $single->slug . '">' . $single->name . '</option>';
				}
			}
			?>
		</select>
		<button type="submit"><?php esc_html_e( 'Search', 'conexi' ); ?></button>
	  </form>
		<?php
}


add_filter( 'woocommerce_product_query', 'conexi_advanced_search_query' );
function conexi_advanced_search_query( $query ) {

	$makeyear   = '';
	$makebrand  = '';
	$makemodel  = '';
	$makeengine = '';

	// if ( isset( $_REQUEST['search'] ) && $_REQUEST['search'] == 'advanced' && ! is_admin() && $query->is_search && $query->is_main_query() ) {
	if ( isset( $_REQUEST['search'] ) == 'advanced' && ! is_admin() ) {
		if ( $query->query_vars['post_type'] == 'product' ) {
			$query->set( 'post_type', 'product' );

			if ( isset( $_GET['makeyear'] ) && ! empty( $_GET['makeyear'] ) ) {
				$makeyear = array(
					'taxonomy' => 'make_year',
					'terms'    => $_GET['makeyear'],
					'field'    => 'slug',
				);
			}

			if ( isset( $_GET['brand'] ) && ! empty( $_GET['brand'] ) ) {
				$makebrand = array(
					'taxonomy' => 'make_brand',
					'terms'    => $_GET['brand'],
					'field'    => 'slug',
				);
			}

			if ( isset( $_GET['model'] ) && ! empty( $_GET['model'] ) ) {
				$makemodel = array(
					'taxonomy' => 'make_model',
					'terms'    => $_GET['model'],
					'field'    => 'slug',
				);
			}

			if ( isset( $_GET['engine'] ) && ! empty( $_GET['engine'] ) ) {
				$makeengine = array(
					'taxonomy' => 'make_engine',
					'terms'    => $_GET['engine'],
					'field'    => 'slug',
				);
			}

			if ( ! empty( $makeyear ) && ! empty( $makebrand ) && ! empty( $makemodel ) && ! empty( $makeengine ) ) {

				$tax_query = array(
					'relation' => 'AND',
					$makeyear,
					$makebrand,
					$makemodel,
					$makeengine,
				);
			} elseif ( ! empty( $makeyear ) && ! empty( $makebrand ) && ! empty( $makemodel ) ) {
				$tax_query = array(
					'relation' => 'AND',
					$makeyear,
					$makebrand,
					$makemodel,
				);
			} elseif ( ! empty( $makeyear ) && ! empty( $makebrand ) ) {
				$tax_query = array(
					'relation' => 'AND',
					$makeyear,
					$makebrand,
				);
			} else {
				$tax_query = array(
					'relation' => 'AND',
					$makeyear,
				);
			}
			$query->set( 'tax_query', $tax_query );
		}
	}
	remove_filter( 'woocommerce_product_query', 'conexi_advanced_search_query' );

}



	

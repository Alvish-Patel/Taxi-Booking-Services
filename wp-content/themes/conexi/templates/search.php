<?php 
get_header();
$options = conexi_WSH()->option(); ?>

<section class="search_area_df" style="background-image:url(<?php echo esc_url(get_template_directory_uri().'/assets/images/searchbg.jpg');?>)">
<div class="container">		 
		<div class="row clearfix">			
			<div class="col-md-5 col-sm-12 col-xs-12">
				<div class="searcg_img">
				  <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/search.png');?>" alt="<?php esc_attr_e('Image', 'conexi');?>">
				</div>
			</div>
			<div class="col-md-7 col-sm-12 col-xs-12">
			<div class="search_tx_box">
		<!-- search Title -->	
			<?php if($options->get('search-page_title' ) ): ?>
				<h1 class="search_title">
				<?php echo(wp_kses($options->get('search-page-text' ), $allowed_html )) ?>
				</h1>
				<?php else : ?>
				<h1 class="search_title">
				<?php esc_html_e( 'Oops! Search not Found', 'conexi' ); ?>
				</h1>
			<?php endif; ?>	
		<!-- search Text -->		
				<?php if($options->get('search-page-text' ) ): ?>
				<div class="search_text">	
				<?php echo(wp_kses($options->get('search-page-text' ), $allowed_html )) ?>
				</div>
			<?php else : ?>
				<div class="search_text">	
				<p><?php esc_html_e( '1. Check the Spelling ', 'conexi' ); ?>
				</p>
				<p><?php esc_html_e( '2. Check the Caps Lock', 'conexi' ); ?>
				</p>      
				<p><?php esc_html_e( '3. Press Enter correctly or Press F5', 'conexi' ); ?>
				</p> 
				</div>
			<?php endif; ?>	

				<?php echo get_search_form(); ?>
		
	
			<div class="error_btn1 btn-box wow fadeInUp animated" data-wow-delay="300ms">
				<a href="<?php echo( home_url( '/' ) ); ?>" class="btn-one"><i class="fas fa-feather"></i>
				<?php esc_html_e( 'Back To Home', 'conexi' ); ?>
				</a>
			</div>
		
			</div>
			</div>
	</div>
</div>
</section>	
<?php
/**
 * Blog Post Main File.
 *
 * @package CONEXI
 * @author  Template Path
 * @version 1.0
 */

get_header();
$data    = \CONEXI\Includes\Classes\Common::instance()->data( 'single' )->get();
$class = ( $data->get( 'layout' ) != 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-8' : 'col-xs-12 col-sm-12 col-md-12';
$options = conexi_WSH()->option();
do_action( 'conexi_banner', $data );

if ( class_exists( '\Elementor\Plugin' ) && $data->get( 'tpl-type' ) == 'e') {
	
	while(have_posts()) {
	   the_post();
	   the_content();
    }

} else {
	?>
<!--Start latest blog area -->
  <section class="single-blog-details-page mrsingle">
            <div class="container">
                <div class="row">
		<!-- sidebar area -->
            <?php if ( $data->get( 'layout' ) == 'left' ) { ?>
		<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
				 <?php	do_action( 'conexi_sidebar', $data );?>
		</div>
		 <?php	} ?>
		  <?php if ( $data->get( 'layout' ) == 'right' ) { ?>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 blog_right">
				 <?php	do_action( 'conexi_sidebar', $data );?>
		</div>
		 <?php	} ?>              
                      
					<div class="wp-style content-side <?php echo esc_attr( $class ); ?> ">
					 <div class="blog-post">
						<?php
						while ( have_posts() ) :
							the_post();
							?>
							<div <?php post_class(); ?>>
								<?php conexi_template_load( 'templates/blog-single/single-content.php', compact( 'options', 'data' ) ); ?>
							</div>
						<?php endwhile; ?>
						
					</div>
					</div>
			</div>
		</div>
	</section><!-- content with sidebar -->
	<?php
}
get_footer();

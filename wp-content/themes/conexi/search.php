<?php
/**
 * Tag Main File.
 *
 * @package CONEXI
 * @author  TemplatePath
 * @version 1.0
 */

get_header();
global $wp_query;
$data  = \CONEXI\Includes\Classes\Common::instance()->data( 'search' )->get();
$class = ( $data->get( 'layout' ) != 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-8' : 'col-xs-12 col-sm-12 col-md-12';
do_action( 'conexi_banner', $data );

if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
	?>
  

<?php if( have_posts() ) : ?> 


<!--Start blog area-->
  <section class="single-blog-details-page mrindex">
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
                    
            <div class="content-side <?php echo esc_attr( $class ); ?>  ">
                   
				   <div class="blog-post">
                        <?php
						while ( have_posts() ) :
							the_post();
							conexi_template_load( 'templates/blog/blog.php', compact( 'data' ) );
						endwhile;
						wp_reset_postdata();?>
					   
						<div class="post-pagination">
						<?php conexi_the_pagination(); ?>
					</div>
                    </div>
                </div>
        
            </div>
        </div>
    </section> 
    <!--End blog area--> 
<?php else : ?>  
<?php get_template_part('templates/search'); ?>	
<?php endif; ?>
  <!--End blog area--> 
	<?php
}
get_footer();

<?php
/**
 * Default Template Main File.
 *
 * @package CONEXI
 * @author  TemplatePath
 * @version 1.0
 */

get_header();
$data  = \CONEXI\Includes\Classes\Common::instance()->data( 'single' )->get();
$class = ( $data->get( 'layout' ) != 'full' ) ? 'col-xs-12 col-sm-12 col-md-12 col-lg-8' : 'col-xs-12 col-sm-12 col-md-12';
do_action( 'conexi_banner', $data );
?>


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
					
				<div class="wp-style content-side <?php echo esc_attr( $class ); ?>  ">
					 <div class="blog-post">
					<div class="text clearfix page_text">
					<?php while ( have_posts() ): the_post(); ?>
						<h2><?php the_title(); ?></h2>
						
						<?php the_content(); ?>
					
					<?php endwhile; ?>
					<div class="clearfix"></div>
			<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'conexi'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
					</div>	
					
					<div class="inner-comment-box">
<?php comments_template(); ?>	
</div>
				</div>
				</div>
			
		</div>
	</div>
</section><!-- blog section with pagination -->
<?php get_footer(); ?>

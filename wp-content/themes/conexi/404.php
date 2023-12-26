<?php
/**
 * 404 page file
 *
 * @package    WordPress
 * @subpackage Conexi
 * @author     Template Path <admin@template-path.com>
 * @version    1.0
 */

$text = sprintf(__('We are unable to find a page you are looking for, Try later or click the button.', 'conexi'), esc_html(home_url('/')));
$allowed_html = wp_kses_allowed_html( 'post' );
?>
<?php get_header();
$data = \CONEXI\Includes\Classes\Common::instance()->data( '404' )->get();
do_action( 'conexi_banner', $data );
$options = conexi_WSH()->option();
if ( class_exists( '\Elementor\Plugin' ) AND $data->get( 'tpl-type' ) == 'e' AND $data->get( 'tpl-elementor' ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'tpl-elementor' ) );
} else {
?>
<!-- error-section -->
<section class="error-section centred" style="background-image:url(<?php echo esc_url(get_template_directory_uri().'/assets/images/errorbg.jpg');?>)">
	
	<div class="container">
		<div class="content-box">
			<h1><?php echo wp_kses( $options->get( '404_title' ), $allowed_html ) ? wp_kses( $options->get( '404_title' ), $allowed_html ) : esc_html_e( '404', 'conexi' ); ?></h1>
			<!-- 404-page-Title -->
			<h2><?php echo wp_kses( $options->get( '404-page_title' ), $allowed_html ) ? wp_kses( $options->get( '404-page_title' ), $allowed_html ) : esc_html_e( 'Oops, Page not Found!', 'conexi' ); ?></h2>
			<!-- 404-page-text -->
			<div class="text"><?php echo wp_kses( $options->get('404-page-text'), $allowed_html ) ? wp_kses($options->get('404-page-text' ), $allowed_html ) : $text; ?></div>
			  
			<?php if ( $options->get( 'back_home_btn') ) : ?>
			<div class="textxx"></div>
			 <!-- 404 back_home_btn -->
	
				<div class="error_btn1 wow fadeInUp animated" data-wow-delay="300ms"><a href="<?php echo( home_url( '/' ) ); ?>" class="btn-one"><i class="fa fa-feather"></i><?php echo wp_kses( $options->get('back_home_btn_label'), $allowed_html ) ? wp_kses( $options->get('back_home_btn_label'), $allowed_html ) : esc_html_e( 'Back To Home', 'conexi' ); ?></a></div>
	
			<div class="textxx"></div>
			<?php endif; ?>
			
			<div class="404_img">
			 
			</div>
		</div>
	</div>
</section>
<!-- error-section end -->
<?php
}
get_footer(); ?>

<?php
/**
 * Banner Template
 *
 * @package    ThemeName
 * @author     ThemeAuthor
 * @version    1.0
 */

if ( $data->get( 'enable_banner' ) AND $data->get( 'banner_type' ) == 'e' AND ! empty( $data->get( 'banner_elementor' ) ) ) {
	echo Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $data->get( 'banner_elementor' ) );

	return false;
}

?>
<?php if ( $data->get( 'enable_banner' ) ) : ?>
<?php if ( $data->get( 'banner' ) ) : ?>
<section class="inner-banner" style="background-image: url('<?php echo esc_url( $data->get( 'banner' ) ); ?>');">
<?php else : ?>
<section class="inner-banner">
<?php endif ;?>	  

	<div class="container">
		<ul class="thm-breadcrumb">
		   <?php echo conexi_the_breadcrumb(); ?>
		</ul><!-- /.thm-breadcrumb -->
		<h2><?php echo wp_kses( $data->get( 'title' ), true ); ?></h2>
	</div><!-- /.container -->
</section><!-- /.inner-banner -->
<?php endif; ?>


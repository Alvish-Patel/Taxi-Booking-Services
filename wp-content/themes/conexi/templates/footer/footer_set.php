<?php
/**
 * Footer Template  File
 * @package ThemeName
 * @author  ThemeAuthor
 * @version 1.0
 */

$options = conexi_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
?>
	  

<footer class="site-footer no-top-zigzag">
<div class="upper-footer">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'footer-sidebar' ); ?>
				</div><!-- /.row -->
			</div><!-- /.container -->
</div><!-- /.upper-footer -->
<div class="bottom-footer">
	<div class="container">
		<div class="inner-container">
			<div class="left-block">
				<?php echo wp_kses( $options->get( 'copyright_text', '&copy; Copyright 2021 by <a href="#">conexi</a>' ), $allowed_html ); ?>
			</div><!-- /.left-block -->
		</div><!-- /.inner-container -->
	</div><!-- /.container -->
</div>
</footer><!-- /.site-footer -->
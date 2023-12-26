<?php
$options = conexi_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );
/**
 * Footer Main File.
 *
 * @package CONEXI
 * @author  Template Path
 * @version 1.0
 */
global $wp_query;
$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();
?>



<?php conexi_template_load( 'templates/footer/footer.php', compact( 'page_id' ) );?>
</main>
<?php if( $options->get( 'theme_scroll' ) ):?>  
<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
<?php endif; ?>	
<?php wp_footer() ?>
</body>
</html>

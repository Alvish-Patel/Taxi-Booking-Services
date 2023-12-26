<?php
$options = conexi_WSH()->option();
$allowed_html = wp_kses_allowed_html();
/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage ThemeName
 * @author     ThemeAuthor
 * @version    1.0
 */
if ( class_exists( 'Conexi_Resizer' ) ) {
	$img_obj = new Conexi_Resizer();
} else {
	$img_obj = array();
}
?>
<div <?php post_class() ?>>
<!--======Edit from Line Bellow===== -->
 <div class="single-blog-style-one">
	<?php if ( has_post_thumbnail() ) : ?>	
	<div class="image-block">
		<div class="inner-block">
		<?php the_post_thumbnail();?>
		</div><!-- /.inner-block -->
	</div><!-- /.image-block -->
	<?php endif; ?>	
	<div class="text-block">
		<div class="meta-info">
			<?php if(!$options->get('blog_post_date' ) ): ?>
			<a href="<?php echo get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ); ?>" class="date-block"><?php echo get_the_date(); ?></a>
			<?php endif; ?>	
			<?php if(!$options->get('blog_post_author' ) ): ?>	
			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta('ID') )); ?>"><?php the_author(); ?></a>
			<?php endif; ?>	
			<?php if(!$options->get('blog_post_comments' ) ): ?>	
			<span class="sep">.</span>
			<span ><?php comments_number(); ?></span>
			<?php endif; ?>	
		</div><!-- /.meta-info -->
		<h3 class="post-title"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
		<div class="text"> <?php the_excerpt(); ?></div>
		<div class="post_button">
			
	
<?php if(!$options->get('blog_post_readmore' ) ): ?>		
<?php if($options->get('blog_post_readmoretext' ) ): ?>		
	<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="readmore"><?php echo wp_kses( $options->get( 'blog_post_readmoretext'), $allowed_html ); ?><span class="post_plus"><?php esc_html_e(' +', 'conexi'); ?></span></a>
<?php else: ?>		
		
	<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="readmore"><?php esc_html_e('Read More', 'conexi');?><span class="post_plus"><?php esc_html_e(' +', 'conexi'); ?></span></a><!-- /.blog-one__btn thm-btn -->
	<?php endif; ?>	
	<?php endif; ?>			
			
		
		</div>
	</div><!-- /.text-block -->
</div><!-- /.single-blog-style-one -->
<!--===Edit from Line Bellow====== -->
</div>
	
<?php
/**
 * Single Post Content Template
 *
 * @package    WordPress
 * @subpackage ThemeName
 * @author     AuthorName
 * @version    1.0
 */
?>
<?php global $wp_query;

$page_id = ( $wp_query->is_posts_page ) ? $wp_query->queried_object->ID : get_the_ID();

$gallery = get_post_meta( $page_id, 'conexi_gallery_images', true );

$video = get_post_meta( $page_id, 'conexi_video_url', true );


$audio_type = get_post_meta( $page_id, 'conexi_audio_type', true );

?>
<div class="single-blog-style-one">
	<?php if ( has_post_thumbnail() ) : ?>	
	<div class="image-block">
		<div class="inner-block">
			<?php the_post_thumbnail(); ?>
		</div><!-- /.inner-block -->
	</div><!-- /.image-block -->
	<?php endif; ?>	
	<div class="text-block">
		<div class="meta-info">
		
		<?php if(!$options->get('single_post_date' ) ): ?>	
			<a href="#" class="date-block"><?php echo get_the_date(); ?></a>
		<?php endif; ?>		
		
		<?php if(!$options->get('single_post_author' ) ): ?>		
			<a href="#"><?php the_author(); ?></a>
		<?php endif; ?>		
			
			<?php if(!$options->get('single_post_comments' ) ): ?>				
			<span class="sep">.</span>
			<a href="#"><?php comments_number(); ?></a>
			<?php endif; ?>	
			
		</div><!-- /.meta-info -->
		<h3 class="post-title"><?php the_title(); ?></h3>
		<div class="text"><?php the_content(); ?>
			<!-- Show/Hide Comment-->	
			<div class="clearfix"></div>
			<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'conexi'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
		</div>
	</div><!-- /.text-block -->
</div><!-- /.single-blog-style-one -->
<div class="clearfix"></div>
	
<?php conexi_template_load( 'templates/blog-single/social_share.php', compact( 'options', 'data' ) ); 
?>	
<?php comments_template(); ?>	

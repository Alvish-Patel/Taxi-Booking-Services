<?php
/**
 * Comments Main File.
 *
 * @package CONEXI
 * @author  Template Path
 * @version 1.0
 */
?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php $count = wp_count_comments(get_the_ID()); ?>
<?php if ( have_comments() ) : ?>
<div class="comments-area post-comments " id="comments">
		<?php if (conexi_set($count, 'total_comments') > 0): ?>
			<div class="title">
			<h3 class="comments-title"><?php echo conexi_set($count, 'total_comments'); ?>
				<?php if ( conexi_set($count, 'total_comments') > 1 ) : ?>
					<?php esc_html_e('Comments', 'conexi'); ?>
				<?php else : ?>
					<?php esc_html_e('Comment', 'conexi'); ?>
				<?php endif; ?>
			</h3>
			</div>
			
			<ul class="comments comment-box">
				<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 74,
					'callback'    => 'conexi_list_comments',
				) );
				?>
			</ul><!-- .comment-list -->
		   
			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
				<nav class="navigation comment-navigation" role="navigation">
					<h1 class="screen-reader-text section-heading">
						<?php esc_html_e( 'Comment navigation', 'conexi' ); ?>
					</h1>
					<div class="nav-previous">
						<?php previous_comments_link( esc_html__( '&larr; Older Comments', 'conexi' ) ); ?>
					</div>
					<div class="nav-next">
						<?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'conexi' ) ); ?>
					</div>
				</nav><!-- .comment-navigation -->
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments">
				<?php esc_html_e( 'Comments are closed.', 'conexi' ); ?>
			</p>
		<?php endif; ?>
	
</div>
<?php endif; ?>
<?php conexi_comment_form(); ?>
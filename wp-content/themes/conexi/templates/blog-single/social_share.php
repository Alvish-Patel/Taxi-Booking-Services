

<?php if(has_tag()) {?>

<div class="share-block">
 <?php if (!$options->get( 'single_post_tag' ) ) : ?>	
	<div class="left-block post_tag">
		<?php the_tags( esc_html__( 'Tags:', 'conexi' ), '<span class="commax">,</span>  ', ''); ?>
	</div><!-- /.left-block -->
<?php endif; ?>	
	<div class="social-block">
		<?php if ( $options->get( 'single_social_share' ) && $options->get( 'single_post_share' ) ) : ?>
		<ul class="post-share pull-right clearfix">
			<?php foreach ( $options->get( 'single_social_share' ) as $k => $v ) {
				if ( $v == '' ) {
					continue;
				} ?>
				<?php do_action('conexi_social_share_output', $k ); ?>
			<?php } ?>
		</ul>
	<?php endif; ?>
	</div><!-- /.social-block -->
</div><!-- /.share-block -->
<?php	}?>

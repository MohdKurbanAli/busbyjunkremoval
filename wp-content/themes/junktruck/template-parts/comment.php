<?php do_action( 'junktruck-theme/comments/comment-before' ); ?>
<div class="comment-body__holder">
	<?php if ( ! empty( junktruck_comment_author_avatar() ) ) : ?>
		<div class="comment-author vcard">
			<?php echo junktruck_comment_author_avatar(array(
				'size' => 78
			)); ?>
		</div>
	<?php endif; ?>
	<div class="comment-content-wrap">
		<footer class="comment-meta">
			<div class="comment-metadata">
				<?php echo junktruck_get_comment_author_link(); ?>
				<?php echo junktruck_get_comment_date(); ?>
			</div>
		</footer>
		<div class="comment-content">
			<?php echo junktruck_get_comment_text(); ?>
		</div>
		<div class="reply">
			<?php echo junktruck_get_comment_reply_link( array(
				'reply_text' => '<svg class="icon-svg icon-svg__comments" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 384 384" xml:space="preserve"><path d="M149.333,117.333V32L0,181.333l149.333,149.333V243.2C256,243.2,330.667,277.333,384,352 C362.667,245.333,298.667,138.667,149.333,117.333z"/></svg>'. esc_html__( 'Reply', 'junktruck' ),
			) ); ?>
		</div>
	</div>
</div>


<?php do_action( 'junktruck-theme/comments/comment-after' ); ?>

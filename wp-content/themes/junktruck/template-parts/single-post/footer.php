<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JunkTruck
 */

?>

<footer class="entry-footer">
	<div class="entry-footer-container">
		<div class="entry-meta">
			<?php
				junktruck_post_tags ( array(
					'prefix'    => esc_html__( 'Tag: ', 'junktruck' ),
				) );
			?>
		</div>
		<?php junktruck_share_buttons( 'single' ); ?>
	</div>
</footer><!-- .entry-footer -->
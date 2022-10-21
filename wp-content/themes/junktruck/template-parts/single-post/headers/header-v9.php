<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JunkTruck
 */

$is_author_block_enabled = junktruck_theme()->customizer->get_value( 'single_author_block' );

?>

<div class="single-header-9">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-lg-8 col-lg-push-2">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title h3-style">', '</h1>' ); ?>
					<div class="entry-meta">
						<?php
							if ( ! $is_author_block_enabled ) {
								junktruck_posted_by();
							}
							junktruck_posted_in( array(
								'prefix'  => esc_html__( 'In', 'junktruck' ),
							) );
							junktruck_posted_on( array(
								'prefix'  => esc_html__( 'Posted', 'junktruck' ),
							) );
							junktruck_post_comments( array(
								'postfix' => esc_html__( 'Comment(s)', 'junktruck' ),
							) );
						?>
					</div><!-- .entry-meta -->
				</header><!-- .entry-header -->
			</div>
		</div>
	</div>
	<?php junktruck_post_thumbnail( 'junktruck-thumb-xl', array( 'link' => false ) ); ?>
</div>


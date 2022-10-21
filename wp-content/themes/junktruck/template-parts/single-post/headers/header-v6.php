<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JunkTruck
 */

$author_block_enabled = junktruck_theme()->customizer->get_value( 'single_author_block' );
?>

<div class="single-header-6">
	<header class="entry-header">
		<div class="entry-meta">
			<?php
				junktruck_posted_in( array(
					'delimiter' => '',
					'before'    => '<div class="cat-links btn-style">',
					'after'     => '</div>'
				) );
				if ( ! $author_block_enabled ) {
					junktruck_posted_by();
					junktruck_posted_on( array(
						'prefix'  => esc_html__( 'Posted', 'junktruck' ),
					) );
				}
			?>
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title h3-style">', '</h1>' ); ?>
	</header><!-- .entry-header -->
</div>
<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JunkTruck
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('search-item'); ?>>
	
	<div class="post-list__item-content">
		
		<header class="entry-header">
			
			<?php the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>
		
		</header><!-- .entry-header -->

		<div class="entry-content">
			
			<?php the_excerpt(); ?>
		
		</div><!-- .entry-content -->

	</div><!-- .post-list__item-content -->

	<footer class="entry-footer">
		
		<div class="post__button-wrap"><?php
			junktruck_post_link( array( 'class' => 'btn-primary' ) );
		?></div>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->

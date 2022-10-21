<?php
/**
 * Template part for displaying default posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JunkTruck
 */

?>

<?php

$blog_post_publish_date = get_theme_mod( 'blog_post_publish_date', junktruck_theme()->customizer->get_default( 'blog_post_publish_date' ) );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item grid-item' ); ?>>
	<div class="posts-list_item_wrapper">
		
		<?php if( 'circular' == $blog_post_publish_date ) { ?>
		
			<div class="post__date post__date-circle">
				<?php 
				junktruck_posted_on( array(
					'style' => 'circular',
				) );
				?>
			</div><!-- .post__date-circle -->

		<?php } ?>
		
		<?php junktruck_sticky_label(); ?>

		<?php junktruck_post_thumbnail( 'junktruck-thumb-360-210' ); ?>

		<header class="entry-header">
			<div class="entry-meta">
				<?php
					junktruck_posted_by( array(
						'prefix'  => esc_html__( 'By', 'junktruck' ),
					) );
					junktruck_posted_in( array(
						'prefix'  => esc_html__( 'in', 'junktruck' ),
						'delimiter' => ', '
					) );
					if( 'default' == $blog_post_publish_date ) {
						junktruck_posted_on( array(
							'prefix' => esc_html__( 'on', 'junktruck' ),
						) );
					}
				?>
			</div><!-- .entry-meta -->
			<h4 class="entry-title"><?php the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' ); ?></h4>
		</header><!-- .entry-header -->

		<?php junktruck_post_excerpt(); ?>

		<footer class="entry-footer">
			<div class="entry-meta">
				<?php
					junktruck_post_tags ( array(
						'prefix' 	=> esc_html__( 'Tags:', 'junktruck' ),
						'before'    => '<span class="tags-links">',
						'after'     => '</span>'
					) );
					junktruck_post_comments( array(
						'prefix' => '<svg class="icon-svg icon-svg__comments" viewBox="0 0 100 79" xmlns="http://www.w3.org/2000/svg"><path d="M78.5714 28.5714C78.5714 33.7426 76.8229 38.5231 73.3259 42.9129C69.8289 47.3028 65.0577 50.7719 59.0123 53.3203C52.9669 55.8687 46.3914 57.1429 39.2857 57.1429C36.0863 57.1429 32.8125 56.8452 29.4643 56.25C24.8512 59.5238 19.6801 61.9048 13.9509 63.3929C12.6116 63.7277 11.0119 64.0253 9.15179 64.2857H8.98437C8.57515 64.2857 8.19382 64.1369 7.8404 63.8393C7.48698 63.5417 7.27307 63.151 7.19866 62.6674C7.16146 62.5558 7.14286 62.4349 7.14286 62.3047C7.14286 62.1745 7.15216 62.0536 7.17076 61.942C7.18936 61.8304 7.22656 61.7187 7.28237 61.6071L7.42187 61.3281L7.61719 61.0212L7.8404 60.7422L8.09152 60.4632L8.31473 60.2121C8.50074 59.9888 8.92857 59.5238 9.59821 58.817C10.2679 58.1101 10.7515 57.5614 11.0491 57.1708C11.3467 56.7801 11.7653 56.2407 12.3047 55.5525C12.8441 54.8642 13.3092 54.1481 13.6998 53.404C14.0904 52.66 14.4717 51.8415 14.8437 50.9487C10.2307 48.2701 6.60342 44.9777 3.96205 41.0714C1.32068 37.1652 0 32.9985 0 28.5714C0 23.4003 1.74851 18.6198 5.24554 14.2299C8.74256 9.84003 13.5138 6.37091 19.5592 3.82254C25.6045 1.27418 32.1801 0 39.2857 0C46.3914 0 52.9669 1.27418 59.0123 3.82254C65.0577 6.37091 69.8289 9.84003 73.3259 14.2299C76.8229 18.6198 78.5714 23.4003 78.5714 28.5714ZM100 42.8571C100 47.3214 98.6793 51.4974 96.0379 55.385C93.3966 59.2727 89.7693 62.5558 85.1562 65.2344C85.5283 66.1272 85.9096 66.9457 86.3002 67.6897C86.6908 68.4338 87.1559 69.1499 87.6953 69.8382C88.2347 70.5264 88.6533 71.0658 88.9509 71.4565C89.2485 71.8471 89.7321 72.3958 90.4018 73.1027C91.0714 73.8095 91.4993 74.2746 91.6853 74.4978C91.7225 74.535 91.7969 74.6187 91.9085 74.7489C92.0201 74.8791 92.1038 74.9721 92.1596 75.0279C92.2154 75.0837 92.2898 75.1767 92.3828 75.3069C92.4758 75.4371 92.5409 75.5394 92.5781 75.6138L92.7176 75.8929L92.8292 76.2277L92.8571 76.5904L92.8013 76.9531C92.6897 77.474 92.4479 77.8832 92.0759 78.1808C91.7039 78.4784 91.2946 78.6086 90.8482 78.5714C88.9881 78.311 87.3884 78.0134 86.0491 77.6786C80.3199 76.1905 75.1488 73.8095 70.5357 70.5357C67.1875 71.131 63.9137 71.4286 60.7143 71.4286C50.6324 71.4286 41.8527 68.9732 34.375 64.0625C36.5327 64.2113 38.1696 64.2857 39.2857 64.2857C45.2753 64.2857 51.0231 63.4487 56.529 61.7746C62.035 60.1004 66.9457 57.7009 71.2612 54.5759C75.9115 51.1533 79.4829 47.2098 81.9754 42.7455C84.468 38.2812 85.7143 33.5565 85.7143 28.5714C85.7143 25.7068 85.2865 22.8795 84.4308 20.0893C89.2299 22.7307 93.0246 26.0417 95.8147 30.0223C98.6049 34.003 100 38.2812 100 42.8571Z" /></svg>',
					) );
				?>
			</div>
			<div class="entry-footer-bottom">
				<div class="post__button-wrap"><?php
					junktruck_post_link( array( 'class' => 'btn-primary' ) );
					junktruck_edit_link();
				?></div>
			</div>
		</footer><!-- .entry-footer -->
	</div><!-- .posts-list_item_wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->

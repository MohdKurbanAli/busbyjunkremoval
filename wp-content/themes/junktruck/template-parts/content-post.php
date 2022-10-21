<?php
/**
 * Post content template (fallback for single location)
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php

	get_template_part( 'template-parts/single-post/headers/header-v1', get_post_format() );
	get_template_part( 'template-parts/single-post/content', get_post_format() );
	get_template_part( 'template-parts/single-post/footer' );

?>
	
	<?php $post_publish_date_enable = junktruck_theme()->customizer->get_value('single_post_publish_date'); ?>

	<?php if( $post_publish_date_enable ) { ?>
		
		</div><!-- .post__right-col -->

	<?php } ?>

</article><?php

get_template_part( 'template-parts/single-post/author-bio' );
get_template_part( 'template-parts/single-post/post_navigation' );
junktruck_related_posts();
get_template_part( 'template-parts/single-post/comments' );
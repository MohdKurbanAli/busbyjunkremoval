<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package JunkTruck
 * @subpackage widgets
 */

$is_enabled = junktruck_theme()->customizer->get_value( 'single_author_block' );

if ( ! $is_enabled ) {
	return;
}

?>

<div class="post-author-bio">
	<h3 class="post-author__title h5-style"><?php junktruck_get_post_author(); ?></h3>
	<div class="post-author__avatar"><?php
		junktruck_get_post_author_avatar( array(
			'size' => 78
		) );
	?></div>
	<div class="post-author__content">
		<div class="post-author__content"><?php
			junktruck_get_author_meta();
		?></div>
	</div>
	<div class="clear"></div>
</div>
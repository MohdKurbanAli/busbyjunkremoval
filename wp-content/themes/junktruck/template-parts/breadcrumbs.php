<?php
/**
 * Template part for breadcrumbs.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package JunkTruck
 */

$breadcrumbs_visibillity = junktruck_theme()->customizer->get_value( 'breadcrumbs_visibillity' );

/**
 * [$breadcrumbs_visibillity description]
 * @var [type]
 */
$breadcrumbs_visibillity = apply_filters( 'junktruck-theme/breadcrumbs/breadcrumbs-visibillity', $breadcrumbs_visibillity );

if( is_singular('post') ) {
	
	global $post;

	$breadcrumbs_visibillity_meta = get_post_meta($post->ID, "junktruck-breadcrumbs-metabox", true);
	
	if( '' == $breadcrumbs_visibillity_meta ){
		$breadcrumbs_visibillity = $breadcrumbs_visibillity;
	} else if( 'enable' == $breadcrumbs_visibillity_meta ){
		$breadcrumbs_visibillity = true;
	} else if( 'disable' == $breadcrumbs_visibillity_meta ){
		$breadcrumbs_visibillity = false;
	}

}

if ( ! $breadcrumbs_visibillity ) {
	return;
}

$breadcrumbs_front_visibillity = junktruck_theme()->customizer->get_value( 'breadcrumbs_front_visibillity' );

if ( !$breadcrumbs_front_visibillity && is_front_page() ) {
	return;
}

do_action( 'junktruck-theme/breadcrumbs/breadcrumbs-before-render' );

?>
	<?php do_action( 'junktruck-theme/breadcrumbs/before' ); ?>
	<?php do_action( 'cx_breadcrumbs/render' ); ?>
	<?php do_action( 'junktruck-theme/breadcrumbs/after' ); ?>
<?php

do_action( 'junktruck-theme/breadcrumbs/breadcrumbs-after-render' );
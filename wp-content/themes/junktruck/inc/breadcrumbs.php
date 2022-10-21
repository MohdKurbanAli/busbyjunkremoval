<?php
/**
 * Theme Breadcrumbs.
 *
 * @package JunkTruck
 */

/**
 * Retrieve a holder for breadcrumbs options.
 *
 * @since  1.0.0
 * @return array
 */

function junktruck_get_breadcrumbs_options() {
	/**
	 * Filter a holder for breadcrumbs options.
	 *
	 * @since 1.0.0
	 */

	$show_title 	= junktruck_theme()->customizer->get_value( 'breadcrumbs_page_title' );
	if (is_singular('post') || is_singular('product')){
        $show_title = false;
    }

	return apply_filters( 'junktruck-theme/breadcrumbs/options' , array(
		'wrapper_format'    => '<div class="container"><div class="row">%1$s<div class="breadcrumbs_items">%2$s</div></div></div>',
		'page_title_format' => '<div class="breadcrumbs_title"><h5 class="breadcrumbs_page-title">%s</h5></div>',
		'separator'         => '&#47;',
		'show_browse'       => true,
		'show_on_front'     => junktruck_theme()->customizer->get_value( 'breadcrumbs_front_visibillity' ),
		'show_title'        => $show_title,
		'path_type'         => junktruck_theme()->customizer->get_value( 'breadcrumbs_path_type' ),
		'strings'            => array(
			'browse'         => esc_html__( 'You Are Here:', 'junktruck' ),
			'error_404'      => esc_html__( '404 Not Found', 'junktruck' ),
			'archives'       => esc_html__( 'Archives', 'junktruck' ),
			/* Translators: %s is the search query. The HTML entities are opening and closing curly quotes. */
			'search'         => esc_html__( 'Search results for &#8220;%s&#8221;', 'junktruck' ),
			/* Translators: %s is the page number. */
			'paged'          => esc_html__( 'Page %s', 'junktruck' ),
			/* Translators: Minute archive title. %s is the minute time format. */
			'archive_minute' => esc_html__( 'Minute %s', 'junktruck' ),
			/* Translators: Weekly archive title. %s is the week date format. */
			'archive_week'   => esc_html__( 'Week %s', 'junktruck' ),
		),
		'css_namespace'     => array(
			'module'    => 'breadcrumbs',
			'content'   => 'breadcrumbs_content',
			'wrap'      => 'breadcrumbs_wrap',
			'browse'    => 'breadcrumbs_browse',
			'item'      => 'breadcrumbs_item',
			'separator' => 'breadcrumbs_item_sep',
			'link'      => 'breadcrumbs_item_link',
			'target'    => 'breadcrumbs_item_target',
		),
	) );
}


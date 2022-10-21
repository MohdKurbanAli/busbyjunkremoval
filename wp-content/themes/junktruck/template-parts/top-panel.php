<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package JunkTruck
 */

// Don't show top panel if all elements are disabled.
if ( ! junktruck_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel container">
	<div class="space-between-content">
		<div class="top-panel-content__left">
				<?php do_action( 'junktruck-theme/top-panel/elements-left' ); ?>
				<?php junktruck_site_description(); ?>
		</div>
		<div class="top-panel-content__right">
				<?php junktruck_social_list( 'header' ); ?>
				<?php do_action( 'junktruck-theme/top-panel/elements-right' ); ?>
		</div>
	</div>
</div>
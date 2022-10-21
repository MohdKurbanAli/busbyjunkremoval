<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package JunkTruck
 */
?>

<?php do_action( 'junktruck-theme/widget-area/render', 'footer-area' ); ?>

<div <?php junktruck_footer_class(); ?>>
	<div class="space-between-content"><?php
		junktruck_footer_copyright();
		junktruck_social_list( 'footer' );
	?></div>
</div><!-- .container -->

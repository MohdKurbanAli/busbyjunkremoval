<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package JunkTruck
 */
?>

<?php get_template_part( 'template-parts/top-panel' ); ?>

<div <?php junktruck_header_class(); ?>>
	<?php do_action( 'junktruck-theme/header/before' ); ?>
	<div class="space-between-content">
		<div <?php junktruck_site_branding_class(); ?>>
			<?php junktruck_header_logo(); ?>
		</div>
		<?php junktruck_main_menu(); ?>
	</div>
	<?php do_action( 'junktruck-theme/header/after' ); ?>
</div>

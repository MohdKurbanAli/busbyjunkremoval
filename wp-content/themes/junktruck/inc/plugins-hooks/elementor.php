<?php
/**
 * Elementor hooks.
 *
 * @package JunkTruck
 */

// Set theme icon.
add_action( 'elementor/controls/controls_registered', 'junktruck_add_theme_icons_to_icon_control', 20 );
add_action( 'elementor/editor/after_enqueue_styles', 'junktruck_enqueue_icon_font' );

function junktruck_add_theme_icons_to_icon_control( $controls_manager ) {
		$default_icons = $controls_manager->get_control( 'icon' )->get_settings( 'options' );

	$junktruck_icons_data = array(
		array(
			'icons'  => iconsmind_get_icons_set(),
			'format' => 'iconsmind %s',
		),

	);

	$junktruck_icons_array = array();

	foreach ( $junktruck_icons_data as $index => $icons_data ) {

		foreach ( $icons_data['icons'] as $index => $icon ) {

			$key = sprintf( $icons_data['format'], $icon );

			$junktruck_icons_array[ $key ] = $icon;
		}
	}

	$new_icons = array_merge( $default_icons, $junktruck_icons_array );

	$controls_manager->get_control( 'icon' )->set_settings( 'options', $new_icons );
}

function iconsmind_get_icons_set() {

	static $iconsmind_icons;

	if ( ! $iconsmind_icons ) {
		ob_start();

		include get_template_directory() . '/assets/lib/iconsmind/iconsmind.min.css';

		$result = ob_get_clean();

		preg_match_all( '/\.([-_a-zA-Z0-9]+):before[, {]/', $result, $matches );

		if ( ! is_array( $matches ) || empty( $matches[1] ) ) {
			return;
		}

		$junktruck_icons = $matches[1];
	}

	return $junktruck_icons;
}

/**
 * Enqueue icon font.
 */
function junktruck_enqueue_icon_font() {
	wp_enqueue_style( 'iconsmind', get_parent_theme_file_uri( '/assets/lib/iconsmind/iconsmind.min.css' ), array(), '1.0.0' );
}


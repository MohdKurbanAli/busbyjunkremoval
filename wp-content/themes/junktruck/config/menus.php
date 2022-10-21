<?php
/**
 * Menus configuration.
 *
 * @package JunkTruck
 */

add_action( 'after_setup_theme', 'junktruck_register_menus', 5 );
function junktruck_register_menus() {

	register_nav_menus( array(
		'main'   => esc_html__( 'Main', 'junktruck' ),
		'footer' => esc_html__( 'Footer', 'junktruck' ),
		'social' => esc_html__( 'Social', 'junktruck' ),
	) );
}

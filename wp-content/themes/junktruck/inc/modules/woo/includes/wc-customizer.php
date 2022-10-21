<?php
/**
 * WooCommerce customizer options
 *
 * @package JunkTruck
 */

if ( ! function_exists( 'junktruck_set_wc_dynamic_css_options' ) ) {

	/**
	 * Add dynamic WooCommerce styles
	 *
	 * @param $options
	 *
	 * @return mixed
	 */
	function junktruck_set_wc_dynamic_css_options( $options ) {

		array_push( $options['css_files'], get_theme_file_path( 'inc/modules/woo/assets/css/dynamic/woo-module-dynamic.css' ) );

		return $options;

	}

}
add_filter( 'junktruck-theme/dynamic_css/options', 'junktruck_set_wc_dynamic_css_options' );
<?php
/**
 * Thumbnails configuration.
 *
 * @package JunkTruck
 */

add_action( 'after_setup_theme', 'junktruck_register_image_sizes', 5 );
/**
 * Register image sizes.
 */
function junktruck_register_image_sizes() {
	set_post_thumbnail_size( 370, 260, true );

	// Registers a new image sizes.
	add_image_size( 'junktruck-thumb-s', 150, 150, true );
	add_image_size( 'junktruck-thumb-m', 460, 460, true );

	add_image_size( 'junktruck-thumb-l', 660, 371, true );   // default listing
	add_image_size( 'junktruck-thumb-l-2', 766, 203, true ); // justify listing
	add_image_size( 'junktruck-thumb-xl', 1160, 508, true ); // default listing + full-width

	add_image_size( 'junktruck-slider-thumb', 150, 86, true );

	add_image_size( 'junktruck-author-avatar', 512, 512, true ); // Widget Author bio

	add_image_size( 'junktruck-thumb-72-62', 72, 62, true );     // Custom post widget
	add_image_size( 'junktruck-thumb-78-78', 78, 78, true );
	add_image_size( 'junktruck-thumb-170-125', 170, 125, true ); // Custom post widget
	add_image_size( 'junktruck-thumb-248-248', 248, 248, true );
	add_image_size( 'junktruck-thumb-250-222', 250, 222, true ); // Cherry Team
	add_image_size( 'junktruck-thumb-260-147', 260, 147, true );
	add_image_size( 'junktruck-thumb-260-195', 260, 195, true );
	add_image_size( 'junktruck-thumb-260-260', 260, 260, true );
	add_image_size( 'junktruck-thumb-266-250', 266, 250, true ); // Cherry Team
	add_image_size( 'junktruck-thumb-270-200', 270, 200, true ); // Cherry Services List
	add_image_size( 'junktruck-thumb-360-270', 360, 270, true );
	add_image_size( 'junktruck-thumb-360-210', 360, 210, true );
	add_image_size( 'junktruck-thumb-370-200', 370, 200, true ); // Cherry Services List
	add_image_size( 'junktruck-thumb-370-300', 370, 300, true ); // Cherry Projects
	add_image_size( 'junktruck-thumb-370-340', 370, 340, true ); // Cherry Team
	add_image_size( 'junktruck-thumb-390-380', 390, 380, true ); // Cherry Team
	add_image_size( 'junktruck-thumb-425-415', 425, 415, true ); // Cherry Projects
	add_image_size( 'junktruck-thumb-480-271', 480, 271, true );
	add_image_size( 'junktruck-thumb-480-360', 480, 360, true );
	add_image_size( 'junktruck-thumb-560-315', 560, 315, true );
	add_image_size( 'junktruck-thumb-660-495', 660, 495, true );
	add_image_size( 'junktruck-thumb-760-400', 760, 400, true );
	add_image_size( 'junktruck-thumb-760-571', 760, 571, true );
	add_image_size( 'junktruck-thumb-770-750', 770, 750, true ); // Image widget

	add_image_size( 'junktruck-thumb-wishlist', 60, 91, true ); // Wishlist
	add_image_size( 'junktruck-thumb-listing-line-product', 260, 260, true ); // Woo
	add_image_size( 'junktruck-woo-cart-product-thumb', 104, 104, true );
}

<?php
/**
 * Jet Plugins Wizard configuration.
 *
 * @package JunkTruck
 */
$license = array(
	'enabled' => false,
);

/**
 * Plugins configuration
 *
 * @var array
 */
$plugins = array(
	'jet-data-importer' => array(
		'name'   => esc_html__( 'Jet Data Importer', 'junktruck' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/ZemezLab/jet-data-importer/archive/master.zip',
		'access' => 'base',
	),
	'elementor' => array(
		'name'   => esc_html__( 'Elementor Page Builder', 'junktruck' ),
		'access' => 'base',
	),
	'jet-theme-core' => array(
		'name'   => esc_html__( 'Jet Theme Core', 'junktruck' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-theme-core.zip',
		'access' => 'base',
	),
	'jet-blocks' => array(
		'name'   => esc_html__( 'Jet Blocks For Elementor', 'junktruck' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-blocks.zip',
		'access' => 'skins',
	),
	'jet-blog' => array(
		'name'   => esc_html__( 'Jet Blog For Elementor', 'junktruck' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-blog.zip',
		'access' => 'skins',
	),
	'jet-elements' => array(
		'name'   => esc_html__( 'Jet Elements For Elementor', 'junktruck' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-elements.zip',
		'access' => 'skins',
	),
	'jet-tricks' => array(
		'name'   => esc_html__( 'Jet Tricks', 'junktruck' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-tricks.zip',
		'access' => 'skins',
	),
	'jet-tabs' => array(
		'name'   => esc_html__( 'Jet Tabs', 'junktruck' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-tabs.zip',
		'access' => 'skins',
	),
	'jet-menu' => array(
		'name'   => esc_html__( 'Jet Menu', 'junktruck' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-menu.zip',
		'access' => 'skins',
	),
	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'junktruck' ),
		'access' => 'skins',
	),
	'jet-popup' => array(
		'name'   => esc_html__( 'Jet Popup', 'junktruck' ),
		'source' => 'remote',
		'path'   => 'https://monstroid.zemez.io/download/jet-popup.zip',
		'access' => 'skins',
	),
);

/**
 * Skins configuration
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'jet-data-importer',
		'elementor',
		'jet-theme-core',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'contact-form-7',
				'jet-blocks',
				'jet-blog',
				'jet-elements',
				'jet-tricks',
				'jet-tabs',
				'jet-menu',
				'jet-popup',
			),
			'lite'  => false,
			'demo'  => 'https://ld-wp73.template-help.com/wordpress/prod_12532/v1/',
			'thumb' => get_stylesheet_directory_uri() . '/screenshot.png',
			'name'  => esc_html__( 'JunkTruck', 'junktruck' ),
		),
	),
);

$texts = array(
	'theme-name' => esc_html__( 'JunkTruck', 'junktruck' ),
);

$config = array(
	'license' => $license,
	'plugins' => $plugins,
	'skins'   => $skins,
	'texts'   => $texts,
);

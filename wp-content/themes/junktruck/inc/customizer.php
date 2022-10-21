<?php
/**
 * Theme Customizer.
 *
 * @package JunkTruck
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */

function junktruck_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'junktruck-theme/customizer/options' , array(
		'prefix'        => 'junktruck',
		'path'          => get_theme_file_path( 'framework/modules/customizer/' ),
		'capability'    => 'edit_theme_options',
		'type'          => 'theme_mod',
		'fonts_manager' => new CX_Fonts_Manager(),
		'options'       => array(

			/** `Site Indentity` section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline on top panel', 'junktruck' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'   => esc_html__( 'Show ToTop button', 'junktruck' ),
				'section' => 'title_tagline',
				'priority' => 61,
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show page preloader', 'junktruck' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'junktruck' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Favicon` section */
			'favicon' => array(
				'title'       => esc_html__( 'Favicon', 'junktruck' ),
				'priority'    => 25,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'junktruck' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified path', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'junktruck' ),
					'minified' => esc_html__( 'Minified', 'junktruck' ),
				),
				'type'    => 'control',
			),
			'breadcrumbs_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => '#f0f4f7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'breadcrumbs_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => '%s/assets/images/breadcrumbs_bg.jpg',
				'field'   => 'image',
				'type'    => 'control',
			),
			'breadcrumbs_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => 'no-repeat',
				'field'   => 'select',
				'choices' => junktruck_get_bg_repeat(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_position' => array(
				'title'   => esc_html__( 'Background Position', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => 'center',
				'field'   => 'select',
				'choices' => junktruck_get_bg_position(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_size' => array(
				'title'   => esc_html__( 'Background Size', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => 'cover',
				'field'   => 'select',
				'choices' => junktruck_get_bg_size(),
				'type'    => 'control',
			),
			'breadcrumbs_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'junktruck' ),
				'section' => 'breadcrumbs',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => junktruck_get_bg_attachment(),
				'type'    => 'control',
			),
			'breadcrumbs_text_color' => array(
				'title'       => esc_html__( 'Text Color', 'junktruck' ),
				'description' => esc_html__( 'Here you can choose whether your text should be light or dark. If you are working with a dark background, then your text should be light. If your background is light, then your text should be set to dark.', 'junktruck' ),
				'section'     => 'breadcrumbs',
				'default'     => 'dark',
				'field'       => 'select',
				'choices'     => junktruck_get_text_color(),
				'type'        => 'control',
			),
			'breadcrumbs_padding_y' => array(
				'title'       => esc_html__( 'Desktop Padding Top Bottom (px)', 'junktruck' ),
				'section'     => 'breadcrumbs',
				'default'     => 34,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_padding_y_tablet' => array(
				'title'       => esc_html__( 'Tablet Padding Top Bottom (px)', 'junktruck' ),
				'section'     => 'breadcrumbs',
				'default'     => 20,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_padding_y_mobile' => array(
				'title'       => esc_html__( 'Mobile Padding Top Bottom (px)', 'junktruck' ),
				'section'     => 'breadcrumbs',
				'default'     => 15,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 5,
					'max'  => 120,
					'step' => 1,
				),
				'type' => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'junktruck' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_social_links' => array(
				'title'   => esc_html__( 'Show social links in header', 'junktruck' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'junktruck' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'junktruck' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'junktruck' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'junktruck' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'container_type' => array(
				'title'   => esc_html__( 'Container type', 'junktruck' ),
				'section' => 'page_layout',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'junktruck' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'junktruck' ),
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'junktruck' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'junktruck' ),
				'description' => esc_html__( 'Configure Color Scheme', 'junktruck' ),
				'priority'    => 40,
				'type'        => 'section',
			),

			'accent_color' => array(
				'title'   => esc_html__( 'Accent color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#93ce20', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'accent_color_2' => array(
				'title'   => esc_html__( 'Accent color 2', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#024731', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'accent_color_3' => array(
				'title'   => esc_html__( 'Accent color 3', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#1e1d24', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'accent_color_4' => array(
				'title'   => esc_html__( 'Accent color 4', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#6ac11c', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'primary_text_color' => array(
				'title'   => esc_html__( 'Primary Text color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#1e1d24',	
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'secondary_text_color' => array(
				'title'   => esc_html__( 'Secondary Text color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#79787f',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'link_color' => array(
				'title'   => esc_html__( 'Link color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#93ce20', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#1e1d24',	
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#1e1d24', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#1e1d24', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#1e1d24', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#1e1d24', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#1e1d24', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#1e1d24', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_1' => array(
				'title'   => esc_html__( 'Grey color (1)', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#d2d2d3',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_2' => array(
				'title'   => esc_html__( 'Grey color (2)', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#e3e2e7', 
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'grey_color_3' => array(
				'title'   => esc_html__( 'Grey color (3)', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#f6f6f6',	
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Invert Text color', 'junktruck' ),
				'section' => 'color_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'junktruck' ),
				'description' => esc_html__( 'Configure typography settings', 'junktruck' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'junktruck' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'body_typography',
				'default' => 'Roboto, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'body_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'     => 'body_typography',
				'default'     => '14',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'body_typography',
				'default'     => '1.643',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'junktruck' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'junktruck' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => junktruck_get_text_aligns(),
				'type'    => 'control',
			),			
			'body_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'body_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'junktruck' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'h1_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'h1_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'     => 'h1_typography',
				'default'     => '64',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'h1_typography',
				'default'     => '1.19',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'junktruck' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'junktruck' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => junktruck_get_text_aligns(),
				'type'    => 'control',
			),
			'h1_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'h1_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'junktruck' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'h2_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'h2_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'     => 'h2_typography',
				'default'     => '46',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'h2_typography',
				'default'     => '1.3',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'junktruck' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'junktruck' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => junktruck_get_text_aligns(),
				'type'    => 'control',
			),
			'h2_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'h2_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'junktruck' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'h3_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'h3_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'     => 'h3_typography',
				'default'     => '32',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'h3_typography',
				'default'     => '1.344',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'junktruck' ),
				'section'     => 'h3_typography',
				'default'     => '0,02',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'junktruck' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => junktruck_get_text_aligns(),
				'type'    => 'control',
			),
			'h3_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'h3_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'junktruck' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'h4_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'h4_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'     => 'h4_typography',
				'default'     => '22',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'h4_typography',
				'default'     => '1.45',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'junktruck' ),
				'section'     => 'h4_typography',
				'default'     => '0,02',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'junktruck' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => junktruck_get_text_aligns(),
				'type'    => 'control',
			),
			'h4_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'h4_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'junktruck' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'h5_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'h5_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'h5_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'     => 'h5_typography',
				'default'     => '18',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'h5_typography',
				'default'     => '1.44',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'junktruck' ),
				'section'     => 'h5_typography',
				'default'     => '0,02',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'junktruck' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => junktruck_get_text_aligns(),
				'type'    => 'control',
			),
			'h5_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'h5_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'junktruck' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'h6_typography',
				'default' => 'Montserrat, sans-serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'h6_typography',
				'default' => '500',
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'     => 'h6_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'h6_typography',
				'default'     => '1.44',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'junktruck' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'junktruck' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => junktruck_get_text_aligns(),
				'type'    => 'control',
			),
			'h6_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'h6_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `Logo text` section */
			'logo_typography' => array(
				'title'       => esc_html__( 'Logo text', 'junktruck' ),
				'priority'    => 40,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'junktruck' ),
				'section'         => 'logo_typography',
				'default'         => 'Montserrat, sans-serif',
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'junktruck' ),
				'section'         => 'logo_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => junktruck_get_font_styles(),
				'type'            => 'control',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'junktruck' ),
				'section'         => 'logo_typography',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => junktruck_get_font_weight(),
				'type'            => 'control',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'         => 'logo_typography',
				'default'         => '26',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'junktruck' ),
				'section'         => 'logo_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => junktruck_get_character_sets(),
				'type'            => 'control',
			),

			/** `Menu` section */
			'menu_typography' => array(
				'title'       => esc_html__( 'Menu', 'junktruck' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'menu_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'junktruck' ),
				'section'         => 'menu_typography',
				'default'         => 'Montserrat, sans-serif', 
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'menu_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'junktruck' ),
				'section'         => 'menu_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => junktruck_get_font_styles(),
				'type'            => 'control',
			),
			'menu_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'junktruck' ),
				'section'         => 'menu_typography',
				'default'         => '400', 
				'field'           => 'select',
				'choices'         => junktruck_get_font_weight(),
				'type'            => 'control',
			),
			'menu_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'         => 'menu_typography',
				'default'         => '13', 
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'menu_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'menu_typography',
				'default'     => '2', 
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'menu_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'junktruck' ),
				'section'     => 'menu_typography',
				'default'     => '0.04', 
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'menu_character_set' => array(
				'title' 		=> esc_html__( 'Character Set', 'junktruck' ),
				'section' 		=> 'menu_typography',
				'default' 		=> 'latin',
				'field' 		=> 'select',
				'choices' 		=> junktruck_get_character_sets(),
				'type' 			=> 'control',
			),
			'menu_text_transform' => array(
				'title' 		=> esc_html__( 'Text Transform', 'junktruck' ),
				'section' 		=> 'menu_typography',
				'default' 		=> 'uppercase',
				'field'   		=> 'select',
				'choices' 		=> junktruck_get_text_transform(),
				'type' 			=> 'control',
			),

/** `Accent Text` section */
			'accent_typography' => array(
				'title'    => esc_html__( 'Accent Text', 'junktruck' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'accent_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'accent_typography',
				'default' => 'Libre Baskerville, serif',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'accent_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'accent_typography',
				'default' => 'italic',
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'accent_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'accent_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'accent_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'junktruck' ),
				'section'     => 'accent_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'accent_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'accent_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'accent_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'accent_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs_typography' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'junktruck' ),
				'priority' => 45,
				'panel'    => 'typography',
				'type'     => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Roboto, sans-serif', 
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal', 
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400', 
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '12', 
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.75', 
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'junktruck' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0', 
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'breadcrumbs_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `Meta` section */
			'meta_typography' => array(
				'title'       => esc_html__( 'Meta', 'junktruck' ),
				'priority'    => 50,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'meta_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'junktruck' ),
				'section' => 'meta_typography',
				'default' => 'Roboto, sans-serif',	
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'meta_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'junktruck' ),
				'section' => 'meta_typography',
				'default' => 'normal',	
				'field'   => 'select',
				'choices' => junktruck_get_font_styles(),
				'type'    => 'control',
			),
			'meta_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'junktruck' ),
				'section' => 'meta_typography',
				'default' => '400',	
				'field'   => 'select',
				'choices' => junktruck_get_font_weight(),
				'type'    => 'control',
			),
			'meta_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'     => 'meta_typography',
				'default'     => '12',	
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'meta_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'meta_typography',
				'default'     => '2',	
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'meta_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, em', 'junktruck' ),
				'section'     => 'meta_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -1,
					'max'  => 1,
					'step' => 0.01,
				),
				'type' => 'control',
			),
			'meta_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'junktruck' ),
				'section' => 'meta_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => junktruck_get_character_sets(),
				'type'    => 'control',
			),
			'meta_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'meta_typography',
				'default' => 'none',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),
			
			/** `Button` section */
			'button_typography' => array(
				'title'       => esc_html__( 'Button', 'junktruck' ),
				'priority'    => 55,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'button_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'junktruck' ),
				'section'         => 'button_typography',
				'default'         => 'Archivo, sans-serif', 
				'field'           => 'fonts',
				'type'            => 'control',
			),
			'button_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'junktruck' ),
				'section'         => 'button_typography',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => junktruck_get_font_styles(),
				'type'            => 'control',
			),
			'button_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'junktruck' ),
				'section'         => 'button_typography',
				'default'         => '500', 
				'field'           => 'select',
				'choices'         => junktruck_get_font_weight(),
				'type'            => 'control',
			),
			'button_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'junktruck' ),
				'section'         => 'button_typography',
				'default'         => '12', 
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
			),
			'button_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'junktruck' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'junktruck' ),
				'section'     => 'button_typography',
				'default'     => '2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'button_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'junktruck' ),
				'section'     => 'button_typography',
				'default'     => '0.5', 
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 0.5,
				),
				'type' => 'control',
			),
			'button_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'junktruck' ),
				'section'         => 'button_typography',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => junktruck_get_character_sets(),
				'type'            => 'control',
			),
			'button_text_transform' => array(
				'title'   => esc_html__( 'Text Transform', 'junktruck' ),
				'section' => 'button_typography',
				'default' => 'uppercase',
				'field'   => 'select',
				'choices' => junktruck_get_text_transform(),
				'type'    => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'       => esc_html__( 'Header', 'junktruck' ),
				'priority'    => 60,
				'type'        => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'       => esc_html__( 'Styles', 'junktruck' ),
				'priority'    => 5,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_bg_color' => array(
				'title'           => esc_html__( 'Background Color', 'junktruck' ),
				'section'         => 'header_styles',
				'field'           => 'hex_color',
				'default'         => '#ffffff',
				'type'            => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'junktruck' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'junktruck' ),
				'section' => 'header_styles',
				'default' => 'repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'junktruck' ),
					'repeat'     => esc_html__( 'Tile', 'junktruck' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'junktruck' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'junktruck' ),
				),
				'type' => 'control',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'junktruck' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'junktruck' ),
					'center' => esc_html__( 'Center', 'junktruck' ),
					'right'  => esc_html__( 'Right', 'junktruck' ),
				),
				'type' => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'junktruck' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'junktruck' ),
					'fixed'  => esc_html__( 'Fixed', 'junktruck' ),
				),
				'type' => 'control',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'       => esc_html__( 'Top Panel', 'junktruck' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'top_panel_enable' => array(
				'title'   => esc_html__( 'Enable Top Panel', 'junktruck' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'junktruck' ),
				'section' => 'header_top_panel',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'    => esc_html__( 'Footer', 'junktruck' ),
				'priority' => 110,
				'type'     => 'section',
			),

			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'junktruck' ),
				'section' => 'footer_options',
				'default' => junktruck_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'       => esc_html__( 'Blog Settings', 'junktruck' ),
				'priority'    => 115,
				'type'        => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'junktruck' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				//'active_callback' => 'is_home',
			),
			'blog_layout_columns' => array(
				'title'		=> esc_html__( 'Columns', 'junktruck' ),
				'section' 	=> 'blog',
				'default'	=> '2-cols',
				'field' 	=> 'select',
				'priority' 	=> 10,
				'choices' 	=> array(
					'2-cols' => esc_html__( '2 columns', 'junktruck' ),
					'3-cols' => esc_html__( '3 columns', 'junktruck' ),
				),
				'type'            => 'control',
				'active_callback' => 'junktruck_is_blog_columns_enabled',
			),
			'blog_sidebar_position' => array(
				'title'    => esc_html__( 'Sidebar', 'junktruck' ),
				'section'  => 'blog',
				'default'  => 'one-right-sidebar',
				'field'    => 'select',
				'priority' => 10,
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'junktruck' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'junktruck' ),
					'none'              => esc_html__( 'No sidebar', 'junktruck' ),
				),
				'type' => 'control',
				'active_callback' => 'junktruck_is_blog_sidebar_enabled',
			),
			'blog_navigation_type' => array(
				'title'   => esc_html__( 'Navigation type', 'junktruck' ),
				'section' => 'blog',
				'default' => 'pagination',
				'field'   => 'select',
				'choices' => array(
					'navigation' => esc_html__( 'Navigation', 'junktruck' ),
					'pagination' => esc_html__( 'Pagination', 'junktruck' ),
				),
				'type' => 'control',
			),
			'blog_sticky_type' => array(
				'title'    => esc_html__( 'Sticky label type', 'junktruck' ),
				'section'  => 'blog',
				'default'  => 'icon',
				'field'    => 'select',
				'priority' => 15,
				'choices' => array(
					'label' => esc_html__( 'Text Label', 'junktruck' ),
					'icon'  => esc_html__( 'Only Icon', 'junktruck' ),
					'both'  => esc_html__( 'Text with Icon', 'junktruck' ),
				),
				'type' => 'control',
			),
			'blog_sticky_label' => array(
				'title'           => esc_html__( 'Featured Post Label', 'junktruck' ),
				'description'     => esc_html__( 'Label for sticky post', 'junktruck' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Featured', 'junktruck' ),
				'field'           => 'text',
				'priority'        => 20,
				'active_callback' => 'junktruck_is_sticky_text',
				'type'            => 'control',
			),
			'blog_post_author' => array(
				'title'    => esc_html__( 'Show post author', 'junktruck' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 25,
				'type'     => 'control',
			),
			'blog_post_publish_date' => array(
				'title'    => esc_html__( 'Show publish date', 'junktruck' ),
				'section'  => 'blog',
				'default'  => 'circular',
				'field'    => 'select',
				'priority' => 30,
				'choices' => array(
					'circular'  => esc_html__( 'Circular', 'junktruck' ),
					'default'   => esc_html__( 'Default', 'junktruck' ),
					'none'      => esc_html__( 'None', 'junktruck' ),
				),
				'type'     => 'control',
			),
			'blog_post_categories' => array(
				'title'    => esc_html__( 'Show categories', 'junktruck' ),
				'section'  => 'blog',
				'default'  => true,
				'field'    => 'checkbox',
				'priority' => 35,
				'type'     => 'control',
			),
			'blog_post_tags' => array(
				'title'    => esc_html__( 'Show tags', 'junktruck' ),
				'section'  => 'blog',
				'default'  => false,
				'field'    => 'checkbox',
				'priority' => 40,
				'type'     => 'control',
			),
			'blog_post_comments' => array(
				'title'    => esc_html__( 'Show comments', 'junktruck' ),
				'section'  => false,
				'field'    => 'checkbox',
				'priority' => 45,
				'type'     => 'control',
			),
			'blog_post_excerpt' => array(
				'title'   => esc_html__( 'Show Excerpt', 'junktruck' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'priority' => 50,
				'type'    => 'control'
			),
			'blog_post_excerpt_words_count' => array(
				'title'       => esc_html__( 'Excerpt Words Count', 'junktruck' ),
				'section'     => 'blog',
				'default'     => '30',
				'priority'    => 55,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1,
					'max'  => 100,
					'step' => 1,
				),
				'type' => 'control',
			),
			'blog_read_more_type' => array(
				'title'    => esc_html__( 'Read more button type', 'junktruck' ),
				'section'  => 'blog',
				'default'  => 'none',
				'field'    => 'select',
				'priority' => 60,
				'choices' => array(
					'text'      => esc_html__( 'Text', 'junktruck' ),
					'icon'      => esc_html__( 'Icon', 'junktruck' ),
					'text_icon' => esc_html__( 'Text & Icon', 'junktruck' ),
					'none'      => esc_html__( 'None', 'junktruck' ),
				),
				'type'    => 'control',
			),
			'blog_read_more_text' => array(
				'title'           => esc_html__( 'Read more button text', 'junktruck' ),
				'section'         => 'blog',
				'default'         => esc_html__( 'Read more', 'junktruck' ),
				'field'           => 'text',
				'priority'        => 65,
				'type'            => 'control',
				'active_callback' => 'junktruck_is_blog_read_more_btn_text',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'junktruck' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar', 'junktruck' ),
				'section' => 'blog_post',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'junktruck' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'junktruck' ),
					'none'              => esc_html__( 'No sidebar', 'junktruck' ),
				),
				'type' => 'control',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'junktruck' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'junktruck' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'junktruck' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'junktruck' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'junktruck' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'junktruck' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_navigation' => array(
				'title'   => esc_html__( 'Enable post navigation', 'junktruck' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Related Posts` section */
			'related_posts' => array(
				'title'           => esc_html__( 'Related posts block', 'junktruck' ),
				'panel'           => 'blog_settings',
				'priority'        => 30,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'related_posts_visible' => array(
				'title'   => esc_html__( 'Show related posts block', 'junktruck' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_block_title' => array(
				'title'   => esc_html__( 'Related posts block title', 'junktruck' ),
				'section' => 'related_posts',
				'default' => esc_html__( 'Related Posts', 'junktruck' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_count' => array(
				'title'   => esc_html__( 'Number of post', 'junktruck' ),
				'section' => 'related_posts',
				'default' => '2',
				'field'   => 'text',
				'type'    => 'control',
			),
			'related_posts_grid' => array(
				'title'   => esc_html__( 'Layout', 'junktruck' ),
				'section' => 'related_posts',
				'default' => '2',
				'field'   => 'select',
				'choices' => array(
					'2'        => esc_html__( '2 columns', 'junktruck' ),
					'3'        => esc_html__( '3 columns', 'junktruck' ),
					'4'        => esc_html__( '4 columns', 'junktruck' ),
				),
				'type' => 'control',
			),
			'related_posts_image' => array(
				'title'   => esc_html__( 'Show post image', 'junktruck' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_publish_date' => array(
				'title'   => esc_html__( 'Show post publish date', 'junktruck' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_author' => array(
				'title'   => esc_html__( 'Show post author', 'junktruck' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_title' => array(
				'title'   => esc_html__( 'Show post title', 'junktruck' ),
				'section' => 'related_posts',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_excerpt' => array(
				'title'   => esc_html__( 'Display excerpt', 'junktruck' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type' => 'control',
			),

			'related_posts_categories' => array(
				'title'   => esc_html__( 'Show post categories', 'junktruck' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_tags' => array(
				'title'   => esc_html__( 'Show post tags', 'junktruck' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'related_posts_comment_count' => array(
				'title'   => esc_html__( 'Show post comment count', 'junktruck' ),
				'section' => 'related_posts',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
	) ) );
}

/**
 * Return true if value of passed setting is not equal with passed value.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function junktruck_is_not_setting( $control, $setting, $value ) {

	if ( $value !== $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;

}

/**
 * Return blog-featured-image true if blog layout type is default. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @return bool
 */
function junktruck_is_blog_featured_image( $control ) {
	return junktruck_is_setting( $control, 'blog_layout_type', 'default' );
}

/**
 * Return true if sticky label type set to text or text with icon.
 *
 * @param  object $control
 * @return bool
 */
function junktruck_is_sticky_text( $control ) {
	return junktruck_is_not_setting( $control, 'blog_sticky_type', 'icon' );
}

/**
 * Return true if sticky label type set to icon or text with icon.
 *
 * @param  object $control
 * @return bool
 */
function junktruck_is_sticky_icon( $control ) {
	return junktruck_is_not_setting( $control, 'blog_sticky_type', 'label' );
}

/**
 * Move native `site_icon` control (based on WordPress core) into custom section.
 *
 * @since 1.0.0
 * @param  object $wp_customize
 * @return void
 */
function junktruck_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'junktruck_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'junktruck' );
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'junktruck_customizer_change_core_controls', 20 );

/**
 * Get font styles
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_font_styles() {
	return apply_filters( 'junktruck-theme/font/styles', array(
		'normal'  => esc_html__( 'Normal', 'junktruck' ),
		'italic'  => esc_html__( 'Italic', 'junktruck' ),
		'oblique' => esc_html__( 'Oblique', 'junktruck' ),
		'inherit' => esc_html__( 'Inherit', 'junktruck' ),
	) );
}

/**
 * Get character sets
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_character_sets() {
	return apply_filters( 'junktruck-theme/font/character_sets', array(
		'latin'        => esc_html__( 'Latin', 'junktruck' ),
		'greek'        => esc_html__( 'Greek', 'junktruck' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'junktruck' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'junktruck' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'junktruck' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'junktruck' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'junktruck' ),
	) );
}

/**
 * Get text aligns
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_text_aligns() {
	return apply_filters( 'junktruck-theme/font/text-aligns', array(
		'inherit' => esc_html__( 'Inherit', 'junktruck' ),
		'center'  => esc_html__( 'Center', 'junktruck' ),
		'justify' => esc_html__( 'Justify', 'junktruck' ),
		'left'    => esc_html__( 'Left', 'junktruck' ),
		'right'   => esc_html__( 'Right', 'junktruck' ),
	) );
}

/**
 * Get font weights
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_font_weight() {
	return apply_filters( 'junktruck-theme/font/weight', array(
		'100' => '100',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900',
	) );
}

/**
 * Get text transform.
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_text_transform() {
	return apply_filters( 'junktruck_get_text_transform', array(
		'none'       => esc_html__( 'None ', 'junktruck' ),
		'uppercase'  => esc_html__( 'Uppercase ', 'junktruck' ),
		'lowercase'  => esc_html__( 'Lowercase', 'junktruck' ),
		'capitalize' => esc_html__( 'Capitalize', 'junktruck' ),
	) );
}

// Background utility function
/**
 * Get background position
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_bg_position() {
	return apply_filters( 'junktruck_get_bg_position', array(
		'top-left'      => esc_html__( 'Top Left', 'junktruck' ),
		'top-center'    => esc_html__( 'Top Center', 'junktruck' ),
		'top-right'     => esc_html__( 'Top Right', 'junktruck' ),
		'center-left'   => esc_html__( 'Middle Left', 'junktruck' ),
		'center'        => esc_html__( 'Middle Center', 'junktruck' ),
		'center-right'  => esc_html__( 'Middle Right', 'junktruck' ),
		'bottom-left'   => esc_html__( 'Bottom Left', 'junktruck' ),
		'bottom-center' => esc_html__( 'Bottom Center', 'junktruck' ),
		'bottom-right'  => esc_html__( 'Bottom Right', 'junktruck' ),
	) );
}

/**
 * Get background size
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_bg_size() {
	return apply_filters( 'junktruck_get_bg_size', array(
		'auto'    => esc_html__( 'Auto', 'junktruck' ),
		'cover'   => esc_html__( 'Cover', 'junktruck' ),
		'contain' => esc_html__( 'Contain', 'junktruck' ),
	) );
}

/**
 * Get background repeat
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_bg_repeat() {
	return apply_filters( 'junktruck_get_bg_repeat', array(
		'no-repeat' => esc_html__( 'No Repeat', 'junktruck' ),
		'repeat'    => esc_html__( 'Tile', 'junktruck' ),
		'repeat-x'  => esc_html__( 'Tile Horizontally', 'junktruck' ),
		'repeat-y'  => esc_html__( 'Tile Vertically', 'junktruck' ),
	) );
}

/**
 * Get background attachment
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_bg_attachment() {
	return apply_filters( 'junktruck_get_bg_attachment', array(
		'scroll' => esc_html__( 'Scroll', 'junktruck' ),
		'fixed'  => esc_html__( 'Fixed', 'junktruck' ),
	) );
}

/**
 * Get text color
 *
 * @since 1.0.0
 * @return array
 */
function junktruck_get_text_color() {
	return apply_filters( 'junktruck_get_text_color', array(
		'light' => esc_html__( 'Light', 'junktruck' ),
		'dark'  => esc_html__( 'Dark', 'junktruck' ),
	) );
}


/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */

function junktruck_get_dynamic_css_options() {
	return apply_filters( 'junktruck-theme/dynamic_css/options', array(
		'prefix'        => 'junktruck',
		'type'          => 'theme_mod',
		'parent_handles' => array(
			'css' => 'junktruck-theme-style',
			'js'  => 'junktruck-theme-js',
		),
		'css_files'      => array(
			get_theme_file_path( 'assets/css/dynamic.css' ),
			get_theme_file_path( 'assets/css/dynamic/header.css' ),
			get_theme_file_path( 'assets/css/dynamic/menus.css' ),
			get_theme_file_path( 'assets/css/dynamic/social.css' ),
			get_theme_file_path( 'assets/css/dynamic/navigation.css' ),
			get_theme_file_path( 'assets/css/dynamic/buttons.css' ),
			get_theme_file_path( 'assets/css/dynamic/forms.css' ),
			get_theme_file_path( 'assets/css/dynamic/post.css' ),
			get_theme_file_path( 'assets/css/dynamic/page.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-grid.css' ),
			get_theme_file_path( 'assets/css/dynamic/post-justify.css' ),
			get_theme_file_path( 'assets/css/dynamic/widgets.css' ),
			get_theme_file_path( 'assets/css/dynamic/plugins.css' ),
		),
		'options_cb'     => 'get_theme_mods',
	) );
}

/**
 * Return true if setting is value. Otherwise - return false.
 *
 * @param  object $control Parent control.
 * @param  string $setting Setting name to check.
 * @param  string $value   Setting value to compare.
 * @return bool
 */
function junktruck_is_setting( $control, $setting, $value ) {

	if ( $value == $control->manager->get_setting( $setting )->value() ) {
		return true;
	}

	return false;
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function junktruck_get_default_footer_copyright() {
	return esc_html__( '&copy; %%year%% JunkTruck | Multipurpose WP Theme with Elementor Page Builder', 'junktruck' );
}

/**
 * Return true if blog sidebar enabled.
 *
 * @return bool
 */
function junktruck_is_blog_sidebar_enabled() {
	return apply_filters( 'junktruck-theme/customizer/blog-sidebar-enabled', true );
}

/**
 * Return true if blog columns enabled.
 *
 * @return bool
 */
function junktruck_is_blog_columns_enabled() {
	return apply_filters( 'junktruck-theme/customizer/blog-columns-enabled', true );
}

/**
 * Return true if option Read More button type is text type. Otherwise - return false.
 *
 * @return bool
 */
function junktruck_is_blog_read_more_btn_text() {
	$btn_type = junktruck_theme()->customizer->get_value( 'blog_read_more_type' );
	return 'text' === $btn_type || 'text_icon' === $btn_type ? true : false;
}
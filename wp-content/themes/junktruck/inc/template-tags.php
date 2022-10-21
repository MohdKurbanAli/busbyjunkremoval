<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package JunkTruck
 */

if ( ! function_exists( 'junktruck_post_excerpt' ) ) :
	/**
	 * Prints HTML with excerpt.
	 */
	function junktruck_post_excerpt( $args = array() ) {
		$default_args = array(
			'before' => '<div class="entry-content">',
			'after'  => '</div>',
			'echo'   => true
		);
		$args = wp_parse_args( $args, $default_args );

		$post_excerpt_enable = junktruck_theme()->customizer->get_value( 'blog_post_excerpt' );

		if ( ! $post_excerpt_enable ) {
			return;
		}

		$words_count = junktruck_theme()->customizer->get_value( 'blog_post_excerpt_words_count' );

		if ( has_excerpt() ) {
			$excerpt = wp_trim_words( get_the_excerpt(), $words_count, '...' );
		} else {
			$excerpt = get_the_content();
			$excerpt = strip_shortcodes( $excerpt );
			$excerpt = str_replace( ']]>', ']]&gt;', $excerpt );
			$excerpt = wp_trim_words( $excerpt, $words_count, '...' );

			if ( ! $excerpt ) {
				return;
			}
		}

		$excerpt_output = apply_filters(
			'junktruck-theme/post/excerpt-output',
			$args['before'] .'<p>'. $excerpt .'</p>'. $args['after']
		);

		if ( $args['echo'] ) {
			echo wp_kses_post( $excerpt_output );
		} else {
			return $excerpt_output;
		}
	}
endif;

if ( ! function_exists( 'junktruck_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function junktruck_posted_on( $args = array() ) {
		if ( 'post' === get_post_type() ) {

			$default_args = array(
				'prefix' => '',
				'format' => '',
				'style'  => 'default',
				'before' => '<span class="posted-on">',
				'after'  => '</span>',
				'echo'   => true
			);
			$args = wp_parse_args( $args, $default_args );

			$blog_post_publish_date = get_theme_mod( 'blog_post_publish_date', junktruck_theme()->customizer->get_default( 'blog_post_publish_date' ) );
			$blog_post_publish_date_enable = ( 'none' != $blog_post_publish_date ) ? true : false;

			$post_publish_date_enable = ! is_singular( 'post' ) ? $blog_post_publish_date_enable : junktruck_theme()->customizer->get_value( 'single_post_publish_date' );

			if( $post_publish_date_enable ) {

				$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

				if( 'default' != $args['style'] ) {

					$archive_month = get_the_time('M'); 
					$archive_day   = get_the_time('d');

					$time_string = sprintf( $time_string,
						esc_attr( get_the_date( 'c' ) ),
						'<span class="post__date-day">' . esc_html( $archive_day ) . '</span><span class="post__date-month">' . esc_html( $archive_month ) . '</span>'
					);

				} else {

					$time_string = sprintf( $time_string,
						esc_attr( get_the_date( 'c' ) ),
						esc_html( get_the_date( $args['format'] ) )
					);
				}

				$posted_on = sprintf(
					/* translators: %s: post date. */
					esc_html_x( '%s', 'post date', 'junktruck' ),
					$time_string
				);

				$date_output = apply_filters(
					'junktruck-theme/post/date-output',
					$args['before'] . $args['prefix'] . ' ' . $posted_on . $args['after']
				);

				$allowed_html = array(
					'time' => array(
						'datetime' => true,
					),
					'svg'   => array(
						'class' => true,
						'aria-hidden' => true,
						'aria-labelledby' => true,
						'role' => true,
						'xmlns' => true,
						'width' => true,
						'height' => true,
						'viewbox' => true, // <= Must be lower case!
					),
					'g'     => array( 'fill' => true ),
					'title' => array( 'title' => true ),
					'path'  => array( 'd' => true, 'fill' => true,  ),
				);

				if ( $args['echo'] ) {
					echo wp_kses( $date_output, junktruck_kses_post_allowed_html( $allowed_html ) );
				} else {
					return $date_output;
				}
			}

		}
	}
endif;

if ( ! function_exists( 'junktruck_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function junktruck_posted_by( $args = array() ) {
		if ( 'post' === get_post_type() ) {

			$default_args = array(
				'prefix' => __( 'by', 'junktruck' ),
				'before' => '<span class="byline">',
				'after'  => '</span>',
				'echo'   => true
			);
			$args = wp_parse_args( $args, $default_args );

			$option_name = ! is_singular( 'post' ) ? 'blog_post_author' : 'single_post_author';
			$post_author_enable = junktruck_theme()->customizer->get_value( $option_name );

			if( $post_author_enable ) {
				junktruck_get_post_author($args);
			}

		}
	}
endif;

if ( ! function_exists( 'junktruck_posted_in' ) ) :
	/**
	 * Prints HTML with meta information for the current categories.
	 */
	function junktruck_posted_in( $args = array() ) {
		if ( 'post' === get_post_type() ) {

			$default_args = array(
				'prefix'    => '',
				'delimiter' => ', ',
				'before'    => '<span class="cat-links">',
				'after'     => '</span>'
			);
			$args = wp_parse_args( $args, $default_args );

			$option_name = ! is_singular( 'post' ) ? 'blog_post_categories' : 'single_post_categories';
			$post_categories_enable = junktruck_theme()->customizer->get_value( $option_name );

			if( $post_categories_enable ) {

				$categories_list = get_the_category_list( esc_html( $args['delimiter'] ) );
				if ( $categories_list ) {
					$categories = sprintf(
						/* translators: 1: list of categories. */
						esc_html__( '%s', 'junktruck' ),
						$categories_list
					);

					echo apply_filters(
						'junktruck-theme/post/categories-output',
						$args['before'] . $args['prefix'] . ' ' . $categories . $args['after']
					);
				}

			}

		}
	}
endif;

if ( ! function_exists( 'junktruck_post_tags' ) ) :
	/**
	 * Prints HTML with meta information for the current tags.
	 */
	function junktruck_post_tags( $args = array() ) {
		if ( 'post' === get_post_type() ) {

			$default_args = array(
				'prefix'    => '',
				'delimiter' => ', ',
				'before'    => '<span class="tags-links">',
				'after'     => '</span>'
			);
			$args = wp_parse_args( $args, $default_args );

			$option_name = ! is_singular( 'post' ) ? 'blog_post_tags' : 'single_post_tags';
			$post_tags_enable = junktruck_theme()->customizer->get_value( $option_name );

			if( $post_tags_enable ) {

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', esc_html_x( $args['delimiter'], 'list item separator', 'junktruck' ) );
				if ( $tags_list ) {
					$tags = sprintf(
						/* translators: 1: list of tags. */
						esc_html__( '%s', 'junktruck' ),
						$tags_list
					);

					echo apply_filters(
						'junktruck-theme/post/tags-output',
						$args['before'] . $args['prefix'] . ' ' . $tags . $args['after']
					);
				}
			}

		}
	}
endif;

if ( ! function_exists( 'junktruck_post_comments' ) ) :
	/**
	 * Prints HTML with meta information for the current comments.
	 */
	function junktruck_post_comments( $args = array() ) {
		if ( 'post' === get_post_type() ) {

			$option_name = ! is_singular( 'post' ) ? 'blog_post_comments' : 'single_post_comments';
			$post_comments_enable = junktruck_theme()->customizer->get_value( $option_name );

			if ( $post_comments_enable && ! post_password_required() && comments_open() ) {
				global $post;

				$default_args = array(
					'class'   => 'comments-link',
					'prefix'  => '',
					'postfix' => '',
				);

				$args = wp_parse_args( $args, $default_args );

				$count = $post->comment_count;
				$link = get_comments_link();

				if ( $args['prefix'] ) {
					$args['prefix'] .= ' ';
				}

				if ( $args['postfix'] ) {
					$args['postfix'] = ' ' . $args['postfix'];
				}

				echo apply_filters(
					'junktruck-theme/post/comments-output',
					'<a href="' . $link . '" class="' . $args['class'] . '">' . $args['prefix'] . $count . $args['postfix'] . '</a>'
				);
			}

		}
	}
endif;

if ( ! function_exists( 'junktruck_get_post_author' ) ) :
	/*
	* Display a post author.
	*/
	function junktruck_get_post_author( $args = array() ) {
		$default_args = array(
			'prefix' => '',
			'before' => '<span class="author">',
			'after'  => '</span>',
			'link'   => true,
			'echo'   => true
		);
		$args = wp_parse_args( $args, $default_args );

		global $post;
		$author_id = $post->post_author;

		$author_output = $args['before'];
		if ( $args['prefix'] ) {
			$author_output .= $args['prefix'] . ' ';
		}
		if ( $args['link'] ) {
			$author_output .= '<a href="' . esc_url( get_author_posts_url( $author_id ) ) . '">';
		}
		$author_output .= esc_html( get_the_author_meta( 'display_name' , $author_id ) );
		if ( $args['link'] ) {
			$author_output .= '</a>';
		}
		$author_output .= $args['after'];

		$author_output = apply_filters(
			'junktruck-theme/post/author-output',
			$author_output
		);

		if ( $args['echo'] ) {
			echo wp_kses_post( $author_output );
		} else {
			return $author_output;
		}
	}
endif;

if ( ! function_exists( 'junktruck_get_post_author_avatar' ) ) :
	/*
	* Display a post author avatar.
	*/
	function junktruck_get_post_author_avatar( $args = array() ) {
		$default_args = array(
			'size' => 85,
			'echo' => true
		);
		$args = wp_parse_args( $args, $default_args );

		global $post;
		$author_id = $post->post_author;

		$avatar_output = apply_filters(
			'junktruck-theme/post/avatar-output',
			get_avatar( get_the_author_meta( 'user_email', $author_id ), $args['size'], '', esc_attr( get_the_author_meta( 'nickname', $author_id ) ) )
		);

		$allowed_html = array(
			'img' => array(
				'srcset' => true,
			),
			'noscript' => array(),
		);

		if ( $args['echo'] ) {
			echo wp_kses( $avatar_output, junktruck_kses_post_allowed_html( $allowed_html ) );
		} else {
			return $avatar_output;
		}
	}
endif;

if ( ! function_exists( 'junktruck_get_author_meta' ) ) :
	/*
	* Display author meta.
	*/
	function junktruck_get_author_meta( $args = array() ) {
		$default_args = array(
			'field' => 'description',
			'echo'  => true
		);
		$args = wp_parse_args( $args, $default_args );

		global $post;
		$author_id = $post->post_author;

		$author_meta_output = apply_filters(
			'junktruck-theme/post/author-meta-output',
			get_the_author_meta( $args['field'], $author_id )
		);

		if ( $args['echo'] ) {
			echo wp_kses_post( $author_meta_output );
		} else {
			return $author_meta_output;
		}
	}
endif;

if ( ! function_exists( 'junktruck_post_link' ) ) :
	function junktruck_post_link( $args = array() ) {

		$default_args = array(
			'class' => '',
		);

		$args = wp_parse_args( $args, $default_args );

		$post_link_type = junktruck_theme()->customizer->get_value( 'blog_read_more_type' );
		$icon = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 459 459" xml:space="preserve"><path d="M459,216.75L280.5,38.25v102c-178.5,25.5-255,153-280.5,280.5C63.75,331.5,153,290.7,280.5,290.7v104.55L459,216.75z"/></svg>';
		$link = get_permalink();
		$post_link_output = '';

		if ( 'text' === $post_link_type ) {
			$title = junktruck_theme()->customizer->get_value( 'blog_read_more_text' );

			if ( strlen( $title ) > 0 ) {
				$post_link_output = '<a href="' . $link . '" class="btn ' . $args['class'] . '">' . $title . '</a>';
			}
		}

		if ( 'text_icon' === $post_link_type ) {
			$title = junktruck_theme()->customizer->get_value( 'blog_read_more_text' );

			$post_link_output = '<a href="' . $link . '" class="btn-text-icon ' . $args['class'] . '">' . $title . ' ' . $icon . '</a>';
		}

		if ( 'icon' === $post_link_type ) {
			$post_link_output = '<a href="' . $link . '" class="btn-icon ' . $args['class'] . '">' . $icon . '</a>';
		}

		echo apply_filters(
			'junktruck-theme/post/link-output',
			$post_link_output
		);
	}
endif;

if ( ! function_exists( 'junktruck_edit_link' ) ) :
	function junktruck_edit_link() {
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'junktruck' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;



if ( ! function_exists( 'junktruck_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */

function junktruck_post_thumbnail( $image_size = 'post-thumbnail', $args = array() ) {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	$default_args = array(
		'link'       => true,
		'class'      => 'post-thumbnail',
		'link-class' => 'post-thumbnail__link',
		'echo'       => true,
	);
	$args = wp_parse_args( $args, $default_args );

	$image_size = apply_filters(
		'junktruck-theme/post/thumb-image-size',
		$image_size
	);

	$thumb = '<figure class="' . $args['class'] . '">';
	if ( $args['link'] ) {
		$thumb .= '<a class="' . $args['link-class'] . '" href="' . esc_url( get_the_permalink() ) .'" aria-hidden="true">';
	}

	$thumb .= get_the_post_thumbnail( null, $image_size );

	if ( $args['link'] ) {
		$thumb .= '</a>';
	}
	$thumb .= '</figure>';

	$thumb = apply_filters(
		'junktruck-theme/post/thumb',
		$thumb
	);

	$allowed_html = array(
		'a' => array(
			'aria-hidden' => true,
		),
		'img' => array(
			'srcset' => true,
			'sizes'  => true,
		),
		'noscript' => array(),
	);

	if ( $args['echo'] ) {
		echo wp_kses( $thumb, junktruck_kses_post_allowed_html( $allowed_html ) );
	} else {
		return $thumb;
	}
}
endif;

/**
 * Displays post thumbnail placeholder
 *
 * @return string
 */
if ( ! function_exists( 'get_placeholder_url' ) ) :
	
	function get_placeholder_url( $args = array() ) {

		$args = wp_parse_args( $args, array(
			'width'      => 370,
			'height'     => 260,
			'background' => '558dd9',
			'foreground' => 'fff',
			'title'      => 'JohnyGo',
		) );

		$args      = array_map( 'urlencode', $args );
		$base_url  = 'http://fakeimg.pl';
		$format    = '%1$s/%2$sx%3$s/%4$s/%5$s/?text=%6$s';
		$image_url = sprintf(
			$format,
			$base_url, $args['width'], $args['height'], $args['background'], $args['foreground'], $args['title']
		);

		/**
		 * Filter image placeholder URL
		 *
		 * @param string $image_url Default URL.
		 * @param string $args      Image arguments.
		 */
		return esc_url( $image_url );
	}

endif;


if ( ! function_exists( 'junktruck_post_overlay_thumbnail' ) ) :
/**
 * Displays post thumbnail as tag style
 *
 * @return string
 */
function junktruck_post_overlay_thumbnail( $img_size = 'junktruck-thumb-xl', $postID = null ) {
	$thumbnail = apply_filters(
		'junktruck-theme/post/overlay-thumb',
		get_the_post_thumbnail_url( $postID, $img_size )
	);

	if( $thumbnail ) {
		echo 'style="background-image: url(' . $thumbnail . ')"';
	}
}
endif;

if ( ! function_exists( 'junktruck_get_page_preloader' ) ) :
/**
 * Display the page preloader.
 *
 * @since  1.0.0
 * @return void
 */
function junktruck_get_page_preloader() {
	$page_preloader = junktruck_theme()->customizer->get_value( 'page_preloader' );

	if ( $page_preloader ) {
		echo  apply_filters(
			'junktruck-theme/page/preloader',
			'<div class="page-preloader-cover">
				<svg class="preloader-icon" width="34" height="38" viewBox="0 0 34 38"><path class="preloader-path" stroke-dashoffset="0" d="M29.437 8.114L19.35 2.132c-1.473-.86-3.207-.86-4.68 0L4.153 8.114C2.68 8.974 1.5 10.56 1.5 12.28v11.964c0 1.718 1.22 3.306 2.69 4.165l10.404 5.98c1.47.86 3.362.86 4.834 0l9.97-5.98c1.472-.86 2.102-2.45 2.102-4.168V12.28c0-1.72-.59-3.306-2.063-4.166z"></path></svg>
			</div>'
		);
	}
}
endif;

if ( ! function_exists( 'junktruck_header_logo' ) ) :
/**
 * Display the header logo.
 *
 * @since  1.0.0
 * @return void
 */
function junktruck_header_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		$logo = get_bloginfo( 'name' );

		$format = apply_filters(
			'junktruck-theme/header/logo-format',
			'<h1 class="site-logo"><a class="site-logo__link" href="%1$s" rel="home">%2$s</a></h1>'
		);

		printf( $format, esc_url( home_url( '/' ) ), $logo );
	}
}
endif;

if ( ! function_exists( 'junktruck_site_description' ) ) :
/**
 * Display the site description.
 *
 * @since  1.0.0
 * @return void
 */
function junktruck_site_description() {
	$show_desc = junktruck_theme()->customizer->get_value( 'show_tagline' );

	if ( ! $show_desc ) {
		return;
	}

	$description = get_bloginfo( 'description', 'display' );

	if ( ! ( $description || is_customize_preview() ) ) {
		return;
	}

	$format = apply_filters( 'junktruck-theme/header/description-format', '<div class="site-description">%s</div>' );

	printf( $format, $description );
}
endif;

if ( ! function_exists( 'junktruck_social_list' ) ) :
/**
 * Show Social list.
 *
 * @since  1.0.0
 * @since  1.0.1 Added new param - $type.
 * @return void
 */
function junktruck_social_list( $context = '', $type = 'icon' ) {
	$visibility_in_header = junktruck_theme()->customizer->get_value( 'header_social_links' );
	$visibility_in_footer = junktruck_theme()->customizer->get_value( 'footer_social_links' );

	if ( ! $visibility_in_header && ( 'header' === $context ) ) {
		return;
	}

	if ( ! $visibility_in_footer && ( 'footer' === $context ) ) {
		return;
	}

	echo junktruck_get_social_list( $context, $type );
}
endif;

if ( ! function_exists( 'junktruck_footer_copyright' ) ) :
/**
 * Show footer copyright text.
 *
 * @since  1.0.0
 * @return void
 */
function junktruck_footer_copyright() {
	$copyright = junktruck_theme()->customizer->get_value( 'footer_copyright' );
	$format    = apply_filters(
		'junktruck-theme/footer/copyright-format',
		'<div class="footer-copyright">%s</div>'
	);

	if ( empty( $copyright ) ) {
		return;
	}

	printf( $format, wp_kses( junktruck_render_macros( $copyright ), wp_kses_allowed_html( 'post' ) ) );
}
endif;

if ( ! function_exists( 'junktruck_is_top_panel_visible' ) ) :
/**
 * Check if top panele visible or not
 *
 * @return bool
 */
function junktruck_is_top_panel_visible() {
	$is_visible = false;
	$top_panel_enable = junktruck_theme()->customizer->get_value( 'top_panel_enable' );

	if ( $top_panel_enable ) {
		$site_description = ( junktruck_theme()->customizer->get_value( 'show_tagline' ) && strlen(get_bloginfo( 'description' ) ) > 0 ) ? true : false;
		$social           = junktruck_theme()->customizer->get_value( 'header_social_links' );

		$conditions = apply_filters(
			'junktruck-theme/header/top-panel-visibility-conditions',
			array( $site_description, $social )
		);

		foreach ( $conditions as $condition ) {
			if ( ! empty( $condition ) ) {
				$is_visible = true;
			}
		}
	}

	return $is_visible;
}
endif;

if ( ! function_exists( 'junktruck_sticky_label' ) ) :
/**
 * Show sticky menu label grabbed from options.
 *
 * @since  1.0.0
 * @return void
 */
function junktruck_sticky_label() {
	if ( ! is_sticky() || ! is_home() || is_paged() ) {
		return;
	}

	$sticky_type = junktruck_theme()->customizer->get_value( 'blog_sticky_type' );

	$content = '';

	$icon_code    = get_theme_mod( 'blog_sticky_icon', junktruck_theme()->customizer->get_default( 'blog_sticky_icon' ) );
	$icon    = apply_filters(
		'junktruck-theme/posts/sticky-icon',
		'<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 126.729 126.73" xml:space="preserve"><path d="M121.215,44.212l-34.899-3.3c-2.2-0.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101,0l-12.4,30.3 c-0.8,2.1-2.8,3.5-5,3.7l-34.9,3.3c-5.2,0.5-7.3,7-3.4,10.5l26.3,23.1c1.7,1.5,2.4,3.7,1.9,5.9l-7.9,32.399 c-1.2,5.101,4.3,9.3,8.9,6.601l29.1-17.101c1.9-1.1,4.2-1.1,6.1,0l29.101,17.101c4.6,2.699,10.1-1.4,8.899-6.601l-7.8-32.399 c-0.5-2.2,0.2-4.4,1.9-5.9l26.3-23.1C128.615,51.212,126.415,44.712,121.215,44.212z"/></svg>'
	);

	switch ( $sticky_type ) {

		case 'icon':
		$content = $icon;
		break;

		case 'label':
		$label = junktruck_theme()->customizer->get_value( 'blog_sticky_label' );
		$content = $label;
		break;

		case 'both':
		$label = junktruck_theme()->customizer->get_value( 'blog_sticky_label' );
		$content = $icon . $label;
		break;
	}

	if ( empty( $content ) ) {
		return;
	}

	printf( '<div class="sticky-label type-%2$s">%1$s</div>', $content, $sticky_type );
}
endif;

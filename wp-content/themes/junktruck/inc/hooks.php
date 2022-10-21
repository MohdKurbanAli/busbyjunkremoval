<?php
/**
 * Theme hooks.
 *
 * @package JunkTruck
 */

// Adds the meta viewport to the header.
add_action( 'wp_head', 'junktruck_meta_viewport', 0 );

// Additional body classes.
add_filter( 'body_class', 'junktruck_extra_body_classes' );

// Enqueue sticky menu if required.
add_filter( 'junktruck-theme/assets-depends/script', 'junktruck_enqueue_misc' );

// Additional image sizes for media gallery.
add_filter( 'image_size_names_choose', 'junktruck_image_size_names_choose' );

// Modify a comment form.
add_filter( 'comment_form_defaults', 'junktruck_modify_comment_form' );

// Modify background-image dynamic css variables.
add_filter( 'cherry_css_variables', 'junktruck_modify_bg_img_variables', 10, 2 );


// Add invert classes if breadcrumbs sections is darken.
add_filter( 'cx_breadcrumbs/wrapper_classes', 'junktruck_breadcrumbs_wrapper_classes' );

// Add dynamic css function.
add_filter( 'cx_dynamic_css/func_list', 'junktruck_add_dynamic_css_function' );

// Add has/no thumbnail classes for posts.
add_filter( 'post_class', 'junktruck_post_thumb_classes' );


/**
 * Add has/no thumbnail classes for posts
 *
 * @param  array $classes Existing classes.
 *
 * @return array
 */
function junktruck_post_thumb_classes( $classes ) {
	$thumb = 'no-thumb';

	if ( has_post_thumbnail() ) {
		$thumb = 'has-thumb';
	}

	$classes[] = $thumb;

	return $classes;
}

/**
 *  Add invert classes if breadcrumbs sections is darken.
 *
 * @param array $wrapper_classes Classes array.
 *
 * @return array
 */
function junktruck_breadcrumbs_wrapper_classes( $wrapper_classes = array() ) {
	$breadcrumbs_color = get_theme_mod( 'breadcrumbs_text_color', junktruck_theme()->customizer->get_default( 'breadcrumbs_text_color' ) );

	if ( 'light' === $breadcrumbs_color ) {
		$wrapper_classes[] = 'invert';
	}

	return $wrapper_classes;
}

/**
 * Modify background-image dynamic css variables.
 *
 * @param array $variables CSS variables.
 * @param array $args      Module arguments.
 *
 * @return array
 */
function junktruck_modify_bg_img_variables( $variables = array(), $args = array() ) {

	$bg_img_variables = array(
		'header_bg_image',
		'breadcrumbs_bg_image',
		'page_404_bg_image',
	);

	foreach ( $bg_img_variables as $var ) {
		$variables[ $var ] = esc_url( junktruck_render_theme_url( $variables[ $var ] ) );
	}

	return $variables;
}


/**
 * Adds the meta viewport to the header.
 *
 * @since  1.0.0
 * @return string `<meta>` tag for viewport.
 */
function junktruck_meta_viewport() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1" />' . "\n";
}

/**
 * Add extra body classes
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function junktruck_extra_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( ! junktruck_is_top_panel_visible() ) {
		$classes[] = 'top-panel-invisible';
	}

	// Adds a options-based classes.
	$options_based_classes = array();

	$layout      = junktruck_theme()->customizer->get_value( 'container_type' );
	$blog_layout = junktruck_theme()->customizer->get_value( 'blog_layout_type' );
	$sb_position = junktruck_theme()->sidebar_position;
	$sidebar     = junktruck_theme()->customizer->get_value( 'sidebar_width' );

	array_push( $options_based_classes, 'layout-' . $layout, 'blog-' . $blog_layout );
	if( 'none' !== $sb_position ) {
		array_push( $options_based_classes, 'sidebar_enabled', 'position-' . $sb_position, 'sidebar-' . str_replace( '/', '-', $sidebar ) );
	}

	return array_merge( $classes, $options_based_classes );
}

/**
 * Add misc to theme script dependencies if required.
 *
 * @param  array $depends Default dependencies.
 * @return array
 */
function junktruck_enqueue_misc( $depends ) {
	$totop_visibility = junktruck_theme()->customizer->get_value( 'totop_visibility' );

	if ( $totop_visibility ) {
		$depends[] = 'jquery-totop';
	}

	return $depends;
}

/**
 * Add image sizes for media gallery
 *
 * @param  array $classes Existing classes.
 * @return array
 */
function junktruck_image_size_names_choose( $image_sizes ) {
	$image_sizes['post-thumbnail'] = __( 'Post Thumbnail', 'junktruck' );

	return $image_sizes;
}

/**
 * Add placeholder attributes for comment form fields.
 *
 * @param  array $args Argumnts for comment form.
 * @return array
 */
function junktruck_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html_req  = ( $req ? " required='required'" : '' );
	$html5     = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = esc_html__( 'Leave a reply', 'junktruck' );

	$args['fields']['author'] = '<p class="comment-form-author"><input id="author" class="comment-form__field" name="author" type="text" placeholder="' . esc_attr__( 'Your Name', 'junktruck' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' /></p>';

	$args['fields']['email'] = '<p class="comment-form-email"><input id="email" class="comment-form__field" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Your E-mail', 'junktruck' ) . ( $req ? ' *' : '' ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><input id="url" class="comment-form__field" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . esc_attr__( 'Your Website', 'junktruck' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" class="comment-form__field" name="comment" placeholder="' . esc_attr__( 'Your Message *', 'junktruck' ) . '" cols="45" rows="7" ></textarea></p>';

	return $args;
}


/**
 * Add custom controls for Single Post Breadcrumbs
 *
 */

function junktruck_add_meta_box() {
    add_meta_box("junktruck-breadcrumbs-metaboxes", "Breadcrumbs", "junktruck_meta_box_markup", "post", "side", "default", null);
}


function junktruck_meta_box_markup($post) {
    
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div style="margin-top:10px;">

            <label class="components-base-control__label" for="junktruck-breadcrumbs-metabox" style="display:block; margin-bottom:4px;"><?php echo esc_html__('Visibillity', 'junktruck'); ?>:</label>
            <select name="junktruck-breadcrumbs-metabox" class="components-select-control__input">
                <?php 
                    $option_values = array(
                    	'' 			=> esc_html__('Inherit','junktruck'),
						'enable' 	=> esc_html__('Enable','junktruck'),
						'disable' 	=> esc_html__('Disable','junktruck')
                    );

                    foreach( $option_values as $key => $value ) {
                        
                        if( $key == get_post_meta($post->ID, "junktruck-breadcrumbs-metabox", true) ) { ?>
							
							<option selected value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>

						<?php } else { ?>
							
							<option value="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value ); ?></option>
						
						<?php }
                    }
                ?>
            </select>


        </div>
    <?php
}
add_action("add_meta_boxes", "junktruck_add_meta_box");


function junktruck_save_meta_box($post_id, $post, $update) {
    
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_dropdown_value = "";

    if(isset($_POST["junktruck-breadcrumbs-metabox"]))
    {
        $meta_box_dropdown_value = $_POST["junktruck-breadcrumbs-metabox"];
    }   
    update_post_meta($post_id, "junktruck-breadcrumbs-metabox", $meta_box_dropdown_value);

}

add_action("save_post", "junktruck_save_meta_box", 10, 3);


/**
 * Add dynamic css function.
 *
 * @param array $func_list Function list.
 *
 * @return array
 */
function junktruck_add_dynamic_css_function( $func_list = array() ) {

	$func_list['background_position'] = 'junktruck_dynamic_css_background_position';

	return $func_list;
}

/**
 * Callback function for dynamic css function `background_position`.
 *
 * @param string $position Background position.
 *
 * @return bool|string
 */
function junktruck_dynamic_css_background_position( $position = '' ) {

	if ( empty( $position ) ) {
		return;
	}

	$result = 'background-position: ' . str_replace( '-', ' ', $position );

	return $result;
}
<?php 
    
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {

wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );

}

add_action( 'wp_enqueue_scripts', 'add_my_script' );
function add_my_script() {
    wp_enqueue_script(
        'custom-script', // name your script so that you can attach other scripts and de-register, etc.
        get_template_directory_uri() . '/assets/js/mohd_custom.js', // this is the location of your script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}
?>
<?php

require get_template_directory().'/inc/walker.php';
require get_template_directory().'/inc/megamenu-custom-fields.php';

/*
	========================
		FRONT-END ENQUEUE FUNCTIONS
	========================
*/
function sunset_load_scripts(){
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );






	wp_enqueue_style( 'megamenu', get_template_directory_uri() . '/css/megamenu.frontend.css', array(), '1.0.0', 'all' );
	//wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );
	

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'megamenu', get_template_directory_uri() . '/js/megamenu.js', array('jquery'), '1.0.0', true );


}
add_action( 'wp_enqueue_scripts', 'sunset_load_scripts' );







/* Activate Nav Menu Option */
function sunset_register_nav_menu() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );


	register_nav_menu( 'primary', 'Header Navigation Menu' );
}
add_action( 'after_setup_theme', 'sunset_register_nav_menu' );




/*
	
@package sunsettheme
	
	========================
		REMOVE GENERATOR VERSION NUMBER
	========================
*/
/* remove version string from js and css */
function megamenu_remove_wp_version_strings( $src ) {
	
	global $wp_version;
	parse_str( parse_url($src, PHP_URL_QUERY), $query );
	if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
	
}
add_filter( 'script_loader_src', 'megamenu_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'megamenu_remove_wp_version_strings' );
/* remove metatag generator from header */
function megamenu_remove_meta_version() {
	return '';
}
add_filter( 'the_generator', 'megamenu_remove_meta_version' );
<?php
/**
 * UnderStrap enqueue scripts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $css_version );

		// wp_register_style( 'animate', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );
		// wp_enqueue_style('animate');

		// $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/src/animate/animate.min.css' );
		// wp_enqueue_style( 'animate', get_template_directory_uri() . '/src/animate/animate.min.css', array(), $css_version );

		// $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/src/aos-master/dist/aos.css' );
		// wp_enqueue_style( 'aos', get_template_directory_uri() . '/src/aos-master/dist/aos.css', array(), $css_version );
		// wp_register_script( 'aos_js', 'https://https://unpkg.com/aos@2.3.1/dist/aos.js' );
		// wp_enqueue_script('aos_js');

		wp_enqueue_script( 'jquery' );

		
		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.min.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );

		}
	}
} // End of if function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );


function wpt_register_js() {
	wp_register_script('customJs', get_template_directory_uri() . '/src/js/custom-javascript.js', 'jquery');
	wp_enqueue_script('customJs');

	// wp_register_script('aos-sc', get_template_directory_uri() . '/src/aos-master/dist/aos.js', 'jquery');
	// wp_enqueue_script('aos-sc');
}
add_action( 'init', 'wpt_register_js' );

add_action( 'wp_enqueue_scripts', 'add_aos_animation' );
 function add_aos_animation() {
     wp_enqueue_style('AOS_animate', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', false, null);
     wp_enqueue_script('AOS', 'https://unpkg.com/aos@2.3.1/dist/aos.js', false, null, true);
     //wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/theme.js', array( 'AOS' ), null, true);
 }

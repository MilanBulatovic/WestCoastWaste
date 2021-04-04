<?php
/**
 * UnderStrap Theme Customizer
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'understrap_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function understrap_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'understrap_customize_register' );

if ( ! function_exists( 'understrap_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function understrap_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'understrap_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'understrap' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'understrap' ),
				'priority'    => apply_filters( 'understrap_theme_layout_options_priority', 160 ),
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function understrap_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'understrap_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_container_type',
				array(
					'label'       => __( 'Container Width', 'understrap' ),
					'description' => __( 'Choose between Bootstrap\'s container and container-fluid', 'understrap' ),
					'section'     => 'understrap_theme_layout_options',
					'settings'    => 'understrap_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'understrap' ),
						'container-fluid' => __( 'Full width container', 'understrap' ),
					),
					'priority'    => apply_filters( 'understrap_container_type_priority', 10 ),
				)
			)
		);

		$wp_customize->add_setting(
			'understrap_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'understrap_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'understrap' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'understrap'
					),
					'section'           => 'understrap_theme_layout_options',
					'settings'          => 'understrap_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'understrap_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'understrap' ),
						'left'  => __( 'Left sidebar', 'understrap' ),
						'both'  => __( 'Left & Right sidebars', 'understrap' ),
						'none'  => __( 'No sidebar', 'understrap' ),
					),
					'priority'          => apply_filters( 'understrap_sidebar_position_priority', 20 ),
				)
			)
		);

		//TOP HEADER IMAGE
		$wp_customize->add_section('top_header', array (
			'title' 	=> __('Top Header', 'understrap'),
			'priority' 	=> 20
		));

		//Title
		$wp_customize->add_setting('top_header_image', array(
			'capability'	=> 'edit_theme_options'

		));
		
		//Upload
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'top_header', array(
			'label' => __('Top Header Image', 'understrap'),
			'description' => 'Upload Header Image',
			'section' => 'top_header',
			'settings' => 'top_header_image'
		)
		));


		//FOOTER CUSTOMIZER
		//FOOTER FORM SECTION SETTINGS REGISTER
		$wp_customize->add_section('footer_form', array (
				'title' 	=> __('Footer Form', 'understrap'),
				'priority' 	=> 200
		));

		//Title
		$wp_customize->add_setting('footer_title_field', array(
			'capability'	=> 'edit_theme_options'

		));

		$wp_customize->add_control('footer_title_control', array(
			'label' => __('Footer Title', 'understrap'),
			'description' => 'Change Title Text',
			'section' => 'footer_form',
			'settings' => 'footer_title_field'
		));

		//Content
		$wp_customize->add_setting('footer_content_field', array(
			'capability'	=> 'edit_theme_options'

		));

		$wp_customize->add_control('footer_content_control', array(
			'label' => __('Content', 'understrap'),
			'description' => 'Change Content Text',
			'section' => 'footer_form',
			'settings' => 'footer_content_field'
		));

		//Phone
		$wp_customize->add_setting('footer_phone_field', array(
			'capability'	=> 'edit_theme_options'

		));

		$wp_customize->add_control('footer_phone_control', array(
			'label' => __('Phone', 'understrap'),
			'description' => 'Change Phone',
			'section' => 'footer_form',
			'settings' => 'footer_phone_field'
		));

		//Email
		$wp_customize->add_setting('footer_email_field', array(
			'capability'	=> 'edit_theme_options'

		));

		$wp_customize->add_control('footer_email_control', array(
			'label' => __('Email', 'understrap'),
			'description' => 'Change Email',
			'section' => 'footer_form',
			'settings' => 'footer_email_field'
		));


		//BOTTOM FOOTER SETTINGS REGISTER
		$wp_customize->add_section('footer', array (
			'title' 	=> __('Footer Bottom', 'understrap'),
			'priority' 	=> 200
		));

		//Practice by
		$wp_customize->add_setting('footer_text_field', array(
			'capability'	=> 'edit_theme_options'
			//'deafult'		=> 'Practice by Milan'

		));

		$wp_customize->add_control('footer_text_control', array(
			'label' => __('Footer Practice By', 'understrap'),
			'description' => 'Change Practice By Text',
			'section' => 'footer',
			'settings' => 'footer_text_field'
		));

		//Copyright
		$wp_customize->add_setting('footer_copyright_field', array(
			'capability'	=> 'edit_theme_options'
			//'deafult'		=> '@Copyright West Coast Waste 2021'
		));

		$wp_customize->add_control('footer_copyright_control', array(
			'label' => __('Footer Copyright', 'understrap'),
			'description' => 'Change Copyright Text',
			'section' => 'footer',
			'settings' => 'footer_copyright_field'
		));

		
	}
} // End of if function_exists( 'understrap_theme_customize_register' ).
add_action( 'customize_register', 'understrap_theme_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'understrap_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function understrap_customize_preview_js() {
		wp_enqueue_script(
			'understrap_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'understrap_customize_preview_js' );

<?php
/**
 * Jason Child functions and definitions
 *
 * Bellow you will find several ways to tackle the enqueue of static resources/files
 * It depends on the amount of customization you want to do
 * If you either wish to simply overwrite/add some CSS rules or JS code
 * Or if you want to replace certain files from the parent with your own (like style.css or main.js)
 *
 * @package JasonChild
 */
/**
 * Setup Jason Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */

function jason_child_theme_setup() {
	load_child_theme_textdomain( 'jason-child-theme', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'jason_child_theme_setup' );

/**
 *
 * 1. Add a Child Theme "style.css" file
 * ----------------------------------------------------------------------------
 *
 * If you want to add static resources files from the child theme, use the
 * example function written below.
 *
 */
function jason_child_enqueue_styles() {
	wp_enqueue_style( 'jason-style', get_stylesheet_uri() );

	/* Default Google Fonts */

	wp_enqueue_style( 'jason-google-fonts', jason_google_fonts_url(), array(), null );

	/* Default Self-hosted Fonts */
	wp_enqueue_style( 'jason-fonts-librecaslontext', get_template_directory_uri() .'/assets/fonts/librecaslontext/stylesheet.css' );
	wp_enqueue_style( 'jason-fonts-norwester', get_template_directory_uri() .'/assets/fonts/norwester/font-norwester.css' );

	/*  Branding Google Fonts */

	wp_enqueue_style( 'jason-branding-google-fonts', jason_branding_google_fonts_url(), array(), null );

	/* Enqueue Jason Custom Scripts */
	wp_enqueue_script( 'jason-velocity-js', get_template_directory_uri() . '/assets/js/velocity.js', array( 'jquery' ), '1.2.2', true );
	wp_enqueue_script( 'jason-hover-intent', get_template_directory_uri() . '/assets/js/jquery.hoverIntent.js', array( 'jquery' ), '1.8.1', true );
	wp_enqueue_script( 'jason-arianav', get_template_directory_uri() . '/assets/js/arianavigation.js', array( 'jquery', 'jason-hover-intent' ), '1.0.0', true );
	wp_enqueue_script( 'jason-scripts', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery', 'jason-velocity-js', 'jason-arianav' ), '1.0.0', true );

    wp_enqueue_style( 'jason-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'jason-child-style',
        get_template_directory_uri() . '/style.css',
        array( 'jason-style' )
    );
}
add_action( 'wp_enqueue_scripts', 'jason_child_enqueue_styles' );

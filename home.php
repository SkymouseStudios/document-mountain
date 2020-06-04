<?php
/**
 * Altitude Pro.
 *
 * This file adds the landing page template to the Altitude Pro Theme.
 *
 * Template Name: Homepage
 *
 * @package Altitude
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/altitude/
 */

// Add custom body class to the head.
add_filter( 'body_class', 'altitude_add_body_class' );
function altitude_add_body_class( $classes ) {

	$classes[] = '2020-homepage';
	return $classes;
}

// Remove Skip Links.
remove_action ( 'genesis_before_header', 'genesis_skip_links', 5 );

// Dequeue Skip Links Script.
add_action( 'wp_enqueue_scripts', 'base_dequeue_skip_links' );
function base_dequeue_skip_links() {
	wp_dequeue_script( 'skip-links' );
}

// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Remove navigation.
remove_action( 'genesis_header', 'genesis_do_nav', 12 );
remove_action( 'genesis_header', 'genesis_do_subnav', 5 );
remove_action( 'genesis_footer', 'altitude_footer_menu', 7 );

// Remove breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Remove site footer widgets.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );

// Run the Genesis loop.
genesis();

<?php
/**
 * Plugin Name: Elementor Custom Widgets
 * Description: Adds custom Elementor widgets like CTA Box and Testimonial.
 * Version: 1.0
 * Author: Your Name
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Prevent direct access

// 1️⃣ Add a custom category in Elementor for grouping your widgets
function add_custom_widget_category( $elements_manager ) {
    $elements_manager->add_category(
        'custom-widgets', // Unique category slug
        [
            'title' => __( 'Custom Widgets', 'custom-elementor' ), // Display name
            'icon'  => 'fa fa-plug',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'add_custom_widget_category' );

// 2️⃣ Load and register all custom widgets
function register_all_custom_widgets( $widgets_manager ) {
    // Include each widget PHP file
    require_once( __DIR__ . '/widgets/cta-box-widget.php' );
    require_once( __DIR__ . '/widgets/testimonial-widget.php' );

    // Register widget classes
    $widgets_manager->register( new \Elementor_CTA_Box_Widget() );
    $widgets_manager->register( new \Elementor_Testimonial_Widget() );
}
add_action( 'elementor/widgets/register', 'register_all_custom_widgets' );

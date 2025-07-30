<?php
/**
 * Plugin Name: Elementor Custom Widgets
 * Description: Custom widgets for Elementor page builder.
 * Version: 1.0.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit;
}

function ecw_register_widget_styles() {
    wp_register_style(
        'ecw-widget-styles',
        plugin_dir_url(__FILE__) . 'assets/css/custom-widgets.css',
        [],
        '1.0.0'
    );
    wp_enqueue_style('ecw-widget-styles');
}
add_action('elementor/frontend/after_enqueue_styles', 'ecw_register_widget_styles');

// Include widget files
function ecw_register_widgets($widgets_manager) {
    require_once(__DIR__ . '/widgets/cta-box-widget.php');
    require_once(__DIR__ . '/widgets/testimonial-widget.php');

    $widgets_manager->register(new \Elementor_CTA_Box_Widget());
    $widgets_manager->register(new \Elementor_Testimonial_Widget());
}
add_action('elementor/widgets/register', 'ecw_register_widgets');

<?php
/**
 * Functions and definitions for the Tibet theme (FSE Block Theme).
 */

// Step 1: Theme Setup
function tibet_theme_setup() {
    // Add theme support for WordPress features.
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('menus'); // This supports navigation menus in FSE block themes.
    add_theme_support('block-templates'); // Supports block templates in FSE themes.
    add_theme_support('full-site-editing'); // Enable Full Site Editing for this theme.
}
add_action('after_setup_theme', 'tibet_theme_setup');

// Step 2: Enqueue Styles and Scripts
function tibet_enqueue_assets() {
    // Enqueue the main theme stylesheet (style.css in the root directory)
    wp_enqueue_style('tibet-style', get_stylesheet_uri());

    // Enqueue additional stylesheet from assets folder (assets/css/style.css)
    wp_enqueue_style('tibet-assets-style', get_template_directory_uri() . '/assets/css/style.css', array(), null);

    // Enqueue JavaScript files from assets folder (assets/js/script.js)
    wp_enqueue_script('tibet-main-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'tibet_enqueue_assets');

// Step 3: Register Navigation Menus
function tibet_register_menus() {
    // Register the primary and footer menus for block-based FSE theme.
    // These menus will be editable via the Site Editor in FSE themes.
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'tibet'),
        'footer'  => __('Footer Menu', 'tibet'),
    ));
}
add_action('after_setup_theme', 'tibet_register_menus');

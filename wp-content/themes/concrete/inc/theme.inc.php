<?php
/**
 * Theme setup and asset enqueuing
 */

if (!defined('ABSPATH')) exit;

/**
 * Enqueue theme scripts and styles
 */
function concrete_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');
    $asset_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/main.css');

    // Enqueue styles
    wp_enqueue_style(
        'concrete-vendor',
        get_template_directory_uri() . '/dist/vendor.css',
        [],
        $asset_version
    );

    wp_enqueue_style(
        'concrete-styles',
        get_template_directory_uri() . '/dist/main.css',
        ['concrete-vendor'],
        $asset_version
    );

    // Enqueue scripts
    wp_enqueue_script(
        'concrete-scripts',
        get_template_directory_uri() . '/dist/main.js',
        [],
        $asset_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'concrete_enqueue_assets');

/**
 * Add custom theme supports
 */
function concrete_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ]);
    
    // Register navigation menu locations
    register_nav_menus([
        'main-navigation' => __('Main Navigation', 'concrete'),
        'mobile-navigation' => __('Mobile Navigation', 'concrete'),
    ]);
}
add_action('after_setup_theme', 'concrete_theme_support');

// Register custom image sizes
add_action('after_setup_theme', function() {
    add_theme_support('post-thumbnails');
    
    // Project card thumbnail size
    add_image_size('project-card', 544, 376, true); // Width, Height, Crop
});

// Add menus to Timber context
add_filter('timber/context', 'concrete_add_to_context');
function concrete_add_to_context($context) {
    // Add main navigation to context
    $context['main_menu'] = new Timber\Menu('main-navigation');
    
    // Add mobile navigation to context
    $context['mobile_menu'] = new Timber\Menu('mobile-navigation');
    
    return $context;
} 
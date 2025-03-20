<?php

/**
 * Theme setup and asset enqueuing
 */

if (!defined('ABSPATH')) exit;

/**
 * Enqueue theme scripts and styles
 */
function concrete_enqueue_assets()
{
    $theme_version = wp_get_theme()->get('Version');
    $asset_version = $theme_version . '.' . filemtime(get_template_directory() . '/dist/css/main.css');

    // Enqueue styles
    wp_enqueue_style(
        'concrete-vendor',
        get_template_directory_uri() . '/dist/css/vendor.css',
        [],
        $asset_version
    );

    wp_enqueue_style(
        'concrete-styles',
        get_template_directory_uri() . '/dist/css/main.css',
        ['concrete-vendor'],
        $asset_version
    );

    // Enqueue scripts
    wp_enqueue_script(
        'concrete-scripts',
        get_template_directory_uri() . '/dist/js/main.js',
        [],
        $asset_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'concrete_enqueue_assets');

/**
 * Add custom theme supports
 */
function concrete_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    add_theme_support('align-wide');

    // Register navigation menu locations
    register_nav_menus([
        'main-navigation' => __('Main Navigation', 'concrete'),
        'mobile-navigation' => __('Mobile Navigation', 'concrete'),
    ]);
}
add_action('after_setup_theme', 'concrete_theme_support');

// Register custom image sizes
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');

    // Project card thumbnail size
    add_image_size('project-card', 544, 376, true); // Width, Height, Crop

    // Double height project card size
    add_image_size('project-card-double', 571, 823, true); // Width, Height, Crop for double height cards

    // Thumbnail size for project cards
    add_image_size('project-thumbnail', 150, 150, true); // Small thumbnail for admin or listing views
});

// Add menus to Timber context
add_filter('timber/context', 'concrete_add_to_context');
function concrete_add_to_context($context)
{
    // Add main navigation to context
    $context['main_menu'] = new Timber\Menu('main-navigation');

    // Add mobile navigation to context
    $context['mobile_menu'] = new Timber\Menu('mobile-navigation');

    // Add ACF options to context
    $context['options'] = get_fields('option');

    return $context;
}

/**
 * Enable SVG upload support
 * 
 * Add SVG to allowed mime types and fix display in media library
 */
function concrete_enable_svg_uploads($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'concrete_enable_svg_uploads');

/**
 * Fix SVG display in media library
 */
function concrete_fix_svg_media_display()
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'concrete_fix_svg_media_display');

/**
 * Fix SVG size attributes for proper display
 */
function concrete_fix_svg_size_attributes($response, $attachment, $meta)
{
    if ($response['mime'] === 'image/svg+xml' && empty($response['sizes'])) {
        $svg_path = get_attached_file($attachment->ID);

        if (!$svg_path) {
            return $response;
        }

        $dimensions = concrete_get_svg_dimensions($svg_path);

        if ($dimensions) {
            $response['sizes'] = array(
                'full' => array(
                    'url' => $response['url'],
                    'width' => $dimensions['width'],
                    'height' => $dimensions['height'],
                    'orientation' => $dimensions['width'] > $dimensions['height'] ? 'landscape' : 'portrait'
                )
            );
        }
    }

    return $response;
}
add_filter('wp_prepare_attachment_for_js', 'concrete_fix_svg_size_attributes', 10, 3);

/**
 * Get SVG dimensions helper function
 */
function concrete_get_svg_dimensions($svg_path)
{
    $svg = simplexml_load_file($svg_path);

    if ($svg === false) {
        return false;
    }

    $attributes = $svg->attributes();
    $width = (string) $attributes->width;
    $height = (string) $attributes->height;

    // Check if width and height are defined
    if (!$width || !$height) {
        // Check for viewBox attribute
        $viewbox = (string) $attributes->viewBox;
        if ($viewbox) {
            $viewbox_array = explode(' ', $viewbox);
            if (count($viewbox_array) === 4) {
                $width = floatval($viewbox_array[2]);
                $height = floatval($viewbox_array[3]);
            }
        }
    }

    if ($width && $height) {
        return array(
            'width' => intval($width),
            'height' => intval($height)
        );
    }

    return false;
}

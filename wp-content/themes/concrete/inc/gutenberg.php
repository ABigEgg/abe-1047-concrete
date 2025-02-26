<?php
/**
 * Gutenberg Editor Customizations
 * 
 * This file handles the restriction of available blocks in the Gutenberg editor.
 */

if (!defined('ABSPATH')) exit;

/**
 * Filter the allowed block types in Gutenberg editor
 * 
 * Restricts blocks to only: paragraph, links, unordered/ordered lists, and images
 */
function concrete_allowed_block_types($allowed_blocks, $editor_context) {

    // Only apply these restrictions in the post editor (not widgets, etc.)
    if (!empty($editor_context->post)) {
        return array(
            'core/paragraph',     // Paragraph blocks
            'core/list',          // Unordered lists
            'core/list-item',     // List items (needed for lists to work properly in newer WP versions)
            'core/image',         // Images
            'core/block',         // Reusable blocks
            'core/html',          // Custom HTML (sometimes needed for links)
        );
    }
    
    return $allowed_blocks;
}
add_filter('allowed_block_types_all', 'concrete_allowed_block_types', 10, 2);

/**
 * Disable Custom Colors in Block Color Palette
 */
function concrete_disable_custom_colors() {
    // Disable custom colors
    add_theme_support('disable-custom-colors');
    
    // Disable custom gradients
    add_theme_support('disable-custom-gradients');
    
    // Disable custom font sizes
    add_theme_support('disable-custom-font-sizes');
}
add_action('after_setup_theme', 'concrete_disable_custom_colors');

/**
 * Remove drop cap, font sizes, and color options from the editor
 */
function concrete_remove_gutenberg_features($editor_settings, $editor_context) {
    // Remove typography panel
    if (isset($editor_settings['__experimentalFeatures'])) {
        $editor_settings['__experimentalFeatures']['typography'] =  [
            'dropCap' => false,
        ];
        $editor_settings['__experimentalFeatures']['color']['text'] = false;
        $editor_settings['__experimentalFeatures']['color']['background'] = false;
    }
    
    return $editor_settings;
}
add_filter('block_editor_settings_all', 'concrete_remove_gutenberg_features', 10, 2);

/**
 * Enqueue block styles for both editor and frontend
 */
function concrete_enqueue_block_styles() {
    // Get the compiled CSS file
    $stylesheet_url = get_template_directory_uri() . '/dist/css/main.css';
    $stylesheet_path = get_template_directory() . '/dist/css/main.css';
    
    // Only enqueue if the file exists
    if (file_exists($stylesheet_path)) {
        // For frontend
        wp_enqueue_style(
            'concrete-block-styles',
            $stylesheet_url,
            array(),
            filemtime($stylesheet_path)
        );
    }
}
add_action('wp_enqueue_scripts', 'concrete_enqueue_block_styles');

/**
 * Enqueue block styles in the editor
 */
function concrete_enqueue_block_editor_styles() {
    // Get the compiled CSS file
    $stylesheet_url = get_template_directory_uri() . '/dist/css/main.css';
    $stylesheet_path = get_template_directory() . '/dist/css/main.css';
    
    // Only enqueue if the file exists
    if (file_exists($stylesheet_path)) {
        // For editor
        wp_enqueue_style(
            'concrete-block-editor-styles',
            $stylesheet_url,
            array(),
            filemtime($stylesheet_path)
        );
    }
}
add_action('enqueue_block_editor_assets', 'concrete_enqueue_block_editor_styles'); 
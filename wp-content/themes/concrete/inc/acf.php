<?php 

/**
 * Advanced Custom Fields Configuration
 * 
 * This file loads all ACF field group configurations from separate files
 * organized by template/post type.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Only proceed if ACF is active
if (!function_exists('acf_add_local_field_group')) {
    return;
}

// Register ACF Options Pages
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Site Options',
        'menu_title'    => 'Site Options',
        'menu_slug'     => 'site-options',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position'      => '30.1',
        'icon_url'      => 'dashicons-admin-generic'
    ));
}

// Load field groups
require_once get_template_directory() . '/inc/acf/project.php';
require_once get_template_directory() . '/inc/acf/about-page.php';
require_once get_template_directory() . '/inc/acf/homepage.php';
require_once get_template_directory() . '/inc/acf/options.php';
require_once get_template_directory() . '/inc/acf/services/edit-notice.php';
require_once get_template_directory() . '/inc/acf/services/service-post-type.php';
require_once get_template_directory() . '/inc/acf/services/services-page.php';
require_once get_template_directory() . '/inc/acf/blocks.php'; 
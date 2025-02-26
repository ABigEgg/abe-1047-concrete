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

// Load field groups
require_once get_template_directory() . '/inc/acf/project.php';
require_once get_template_directory() . '/inc/acf/about-page.php';
require_once get_template_directory() . '/inc/acf/homepage.php';


<?php
/**
 * Register custom post types and taxonomies
 */

if (!defined('ABSPATH')) exit;

/**
 * Register the Project post type
 */
function concrete_register_post_types() {
    register_post_type('project', array(
        'labels' => array(
            'name' => __('Projects'),
            'singular_name' => __('Project'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Project'),
            'edit_item' => __('Edit Project'),
            'new_item' => __('New Project'),
            'view_item' => __('View Project'),
            'search_items' => __('Search Projects'),
            'not_found' => __('No projects found'),
            'not_found_in_trash' => __('No projects found in Trash'),
            'all_items' => __('All Projects'),
            'menu_name' => __('Projects')
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-portfolio',
        'rewrite' => array('slug' => 'work')
    ));

    register_taxonomy('project_tags', 'project', array(
        'labels' => array(
            'name' => __('Project Tags'),
            'singular_name' => __('Project Tag'),
            'search_items' => __('Search Project Tags'),
            'all_items' => __('All Project Tags'),
            'edit_item' => __('Edit Project Tag'),
            'update_item' => __('Update Project Tag'),
            'add_new_item' => __('Add New Project Tag'),
            'new_item_name' => __('New Project Tag Name'),
            'menu_name' => __('Project Tags')
        ),
        'hierarchical' => false,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'project-tag')
    ));
}
add_action('init', 'concrete_register_post_types'); 
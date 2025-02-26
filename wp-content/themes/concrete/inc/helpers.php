<?php
/**
 * Helper functions for the Concrete theme
 */

if (!defined('ABSPATH')) exit;

/**
 * Get global services options for templates
 * 
 * Retrieves services settings from Site Options page and converts service objects to Timber\Post objects
 * 
 * @return array Array with services heading, description, and items as Timber\Post objects
 */
function concrete_get_services_options() {
    $services_options = [
        'services_heading' => get_field('services_heading', 'option'),
        'services_description' => get_field('services_description', 'option'),
    ];
    
    // Get services and convert to Timber\Post objects
    $services_items = get_field('services_items', 'option');
    if ($services_items) {
        $services_options['services_items'] = array_map(function($post) {
            return new Timber\Post($post);
        }, $services_items);
    } else {
        $services_options['services_items'] = [];
    }
    
    return $services_options;
} 

/**
 * Get global CTA options for templates
 * 
 * Retrieves CTA settings from Site Options page
 * 
 * @return array Array with CTA heading, text, button text, and button URL
 */
function concrete_get_cta_options() {
    return [
        'heading' => get_field('global_cta_heading', 'option'),
        'text' => get_field('global_cta_text', 'option'),
        'button_text' => get_field('global_cta_button_text', 'option'),
        'button_url' => get_field('global_cta_button_url', 'option'),
    ];
} 
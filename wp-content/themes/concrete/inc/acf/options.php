<?php
/**
 * ACF Field Groups for Site Options
 * 
 * Affects: Global Site Settings
 * Location: ACF Options Page
 */

if( function_exists('acf_add_local_field_group') ):

// Our Services Section (Global)
acf_add_local_field_group(array(
    'key' => 'group_services_settings',
    'title' => 'Our Services Section',
    'fields' => array(
        array(
            'key' => 'field_services_heading',
            'label' => 'Section Heading',
            'name' => 'services_heading',
            'type' => 'text',
            'instructions' => 'Enter the heading for the Our Services section',
            'required' => 1,
            'default_value' => 'Our services',
        ),
        array(
            'key' => 'field_services_description',
            'label' => 'Section Description',
            'name' => 'services_description',
            'type' => 'textarea',
            'instructions' => 'Enter the description text for the Our Services section',
            'required' => 1,
            'default_value' => 'Your brand needs to be as versatile as your business. It has to be bold, visible, clever, dynamic, inspire and move. That is why we have a range of services to facilitate all of your needs.',
            'rows' => 4,
        ),
        array(
            'key' => 'field_services_items',
            'label' => 'Service Items',
            'name' => 'services_items',
            'type' => 'relationship',
            'instructions' => 'Select up to 5 services to display in the Our Services section',
            'required' => 1,
            'post_type' => array(
                0 => 'service',
            ),
            'filters' => array(
                0 => 'search',
            ),
            'min' => 1,
            'max' => 5,
            'return_format' => 'object',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'site-options',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Fields for the Our Services section that appears globally throughout the site',
));

// Global CTA Section
acf_add_local_field_group(array(
    'key' => 'group_global_cta',
    'title' => 'Call To Action Section',
    'fields' => array(
        array(
            'key' => 'field_global_cta_heading',
            'label' => 'CTA Heading',
            'name' => 'global_cta_heading',
            'type' => 'text',
            'instructions' => 'Enter the heading for the call to action section',
            'required' => 1,
            'default_value' => 'Have an idea of a project you\'d like to work on?',
        ),
        array(
            'key' => 'field_global_cta_text',
            'label' => 'CTA Text',
            'name' => 'global_cta_text',
            'type' => 'textarea',
            'instructions' => 'Enter the descriptive text for the call to action',
            'required' => 1,
            'default_value' => 'For more information on this project, please contact us.',
            'rows' => 3,
        ),
        array(
            'key' => 'field_global_cta_button_text',
            'label' => 'Button Text',
            'name' => 'global_cta_button_text',
            'type' => 'text',
            'instructions' => 'Enter the text for the CTA button',
            'required' => 1,
            'default_value' => 'Contact Us',
        ),
        array(
            'key' => 'field_global_cta_button_url',
            'label' => 'Button URL',
            'name' => 'global_cta_button_url',
            'type' => 'url',
            'instructions' => 'Enter the URL for the CTA button',
            'required' => 1,
            'default_value' => '/contact',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'site-options',
            ),
        ),
    ),
    'menu_order' => 10,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => 'Fields for the CTA section that appears globally throughout the site',
));

endif; 
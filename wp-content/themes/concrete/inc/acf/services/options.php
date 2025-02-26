<?php
/**
 * ACF Field Groups for Services Settings
 * 
 * Affects: Global Services Settings
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
                'value' => 'services-settings',
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

endif; 
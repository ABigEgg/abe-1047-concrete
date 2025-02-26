<?php
/**
 * ACF Field Groups for Service Post Type
 * 
 * Affects: 'service' custom post type
 * Template: Single service template
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_single_service',
    'title' => 'Service Details',
    'fields' => array(
        array(
            'key' => 'field_service_intro_heading',
            'label' => 'Intro Heading',
            'name' => 'service_intro_heading',
            'type' => 'text',
            'instructions' => 'Enter the main heading for the service intro',
            'required' => 1,
        ),
        array(
            'key' => 'field_service_intro_summary',
            'label' => 'Intro Summary',
            'name' => 'service_intro_summary',
            'type' => 'textarea',
            'instructions' => 'Enter a brief summary describing this service',
            'required' => 1,
            'rows' => 4,
        ),
        array(
            'key' => 'field_similar_projects',
            'label' => 'Similar Projects',
            'name' => 'similar_projects',
            'type' => 'relationship',
            'instructions' => 'Select related projects to display in the Similar Projects section',
            'required' => 0,
            'post_type' => array(
                0 => 'project',
            ),
            'filters' => array(
                0 => 'search',
            ),
            'max' => 2,
            'return_format' => 'object',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'service',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

endif;

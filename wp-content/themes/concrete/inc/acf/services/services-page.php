<?php
/**
 * ACF Field Groups for Services Page Template
 * 
 * Affects: Pages using the 'Services' template
 * Template: services.php
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_services_page',
    'title' => 'Services Page Settings',
    'fields' => array(
        array(
            'key' => 'field_services_page_intro_heading',
            'label' => 'Intro Heading',
            'name' => 'services_intro_heading',
            'type' => 'text',
            'instructions' => 'Enter the main heading for the services page',
            'required' => 1,
            'default_value' => 'Delivering creative solutions together',
        ),
        array(
            'key' => 'field_services_page_intro_text',
            'label' => 'Intro Text',
            'name' => 'services_intro_text',
            'type' => 'textarea',
            'instructions' => 'Enter the introduction text for the services page',
            'required' => 1,
            'default_value' => 'We\'re a team of creative professionals who are passionate about delivering creative solutions that help businesses grow.',
            'rows' => 3,
        ),
        array(
            'key' => 'field_services_page_featured_projects',
            'label' => 'Featured Projects',
            'name' => 'featured_projects',
            'type' => 'relationship',
            'instructions' => 'Select projects to display in the Featured Projects section at the bottom of the page',
            'required' => 0,
            'post_type' => array(
                0 => 'project',
            ),
            'filters' => array(
                0 => 'search',
            ),
            'min' => 0,
            'max' => 2,
            'return_format' => 'object',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'services.php',
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

<?php
/**
 * ACF Field Groups for Project Post Type
 * 
 * Affects: 'project' custom post type
 * Template: Single project template
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_single_project',
    'title' => 'Project Details',
    'fields' => array(
        array(
            'key' => 'field_project_intro_heading',
            'label' => 'Intro Heading',
            'name' => 'project_intro_heading',
            'type' => 'text',
            'instructions' => 'Enter the main heading for the project intro',
            'required' => 1,
        ),
        array(
            'key' => 'field_project_intro_summary',
            'label' => 'Intro Summary', 
            'name' => 'project_intro_summary',
            'type' => 'textarea',
            'instructions' => 'Enter a brief summary describing what this project is about',
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
                'value' => 'project',
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
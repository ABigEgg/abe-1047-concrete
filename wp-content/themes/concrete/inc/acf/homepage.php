<?php
/**
 * ACF Field Groups for Homepage
 * 
 * Affects: Front page/Homepage
 * Template: front-page.php
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_homepage_intro',
    'title' => 'Homepage Intro',
    'fields' => array(
        array(
            'key' => 'field_homepage_intro_heading',
            'label' => 'Intro Heading',
            'name' => 'intro_heading',
            'type' => 'text',
            'instructions' => 'Enter the main heading for the intro section',
            'required' => 1,
            'default_value' => 'Building brands with bold ideas',
        ),
        array(
            'key' => 'field_homepage_intro_text',
            'label' => 'Intro Text',
            'name' => 'intro_text',
            'type' => 'textarea',
            'instructions' => 'Enter the description text for the intro section',
            'required' => 1,
            'default_value' => 'Collaborating with clients from various industries to develop unique concepts that captivate and connect with audiences.',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
        'the_content',
        'discussion',
        'comments',
        'revisions',
        'format',
    ),
));

acf_add_local_field_group(array(
    'key' => 'group_homepage_projects',
    'title' => 'Featured Projects',
    'fields' => array(
        array(
            'key' => 'field_featured_projects',
            'label' => 'Select Projects',
            'name' => 'featured_projects',
            'type' => 'relationship',
            'instructions' => 'Select up to 4 projects to feature on the homepage. Drag to reorder.',
            'required' => 0,
            'post_type' => array(
                0 => 'project',
            ),
            'filters' => array(
                0 => 'search',
            ),
            'max' => 4,
            'return_format' => 'object',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'front_page',
            ),
        ),
    ),
    'menu_order' => 1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

endif; 
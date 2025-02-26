<?php
/**
 * ACF Field Groups for About Page
 * 
 * Affects: About Us page
 * Template: about.php
 */

if( function_exists('acf_add_local_field_group') ):

// About Intro Section
acf_add_local_field_group(array(
    'key' => 'group_about_intro',
    'title' => 'About Intro Section',
    'fields' => array(
        array(
            'key' => 'field_about_intro_heading',
            'label' => 'Intro Heading',
            'name' => 'intro_heading',
            'type' => 'text',
            'instructions' => 'Enter the main heading for the intro section',
            'required' => 1,
            'default_value' => 'Who is Concrete',
        ),
        array(
            'key' => 'field_about_intro_subheading',
            'label' => 'Intro Subheading',
            'name' => 'intro_subheading',
            'type' => 'text',
            'instructions' => 'Enter the subheading for the intro section',
            'required' => 1,
            'default_value' => 'About Us',
        ),
        array(
            'key' => 'field_about_intro_text',
            'label' => 'Intro Text',
            'name' => 'intro_text',
            'type' => 'textarea',
            'instructions' => 'Enter the description text for the intro section',
            'required' => 1,
            'default_value' => 'We\'re a small independent design studio that was founded in 2017 by Chris Smith. We firmly believe in the transformative power of creativity through a collaborative process with our clients. With expertise across a wide range of design services we craft contemporary and meaningful projects that leave a lasting impression.',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'about.php',
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
    'active' => true,
));

// About Feature Image
acf_add_local_field_group(array(
    'key' => 'group_about_feature_image',
    'title' => 'About Feature Image',
    'fields' => array(
        array(
            'key' => 'field_about_wide_image',
            'label' => 'Wide Feature Image',
            'name' => 'wide_image',
            'type' => 'image',
            'instructions' => 'Upload a wide feature image',
            'required' => 0,
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'about.php',
            ),
        ),
    ),
    'menu_order' => 1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

// Working With Us Section
acf_add_local_field_group(array(
    'key' => 'group_about_working_with_us',
    'title' => 'Working With Us Section',
    'fields' => array(
        array(
            'key' => 'field_about_working_main_image',
            'label' => 'Main Image',
            'name' => 'working_main_image',
            'type' => 'image',
            'instructions' => 'Upload the main image (left side)',
            'required' => 0,
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
        array(
            'key' => 'field_about_working_secondary_image',
            'label' => 'Secondary Image',
            'name' => 'working_secondary_image',
            'type' => 'image',
            'instructions' => 'Upload the secondary image (top right)',
            'required' => 0,
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
        array(
            'key' => 'field_about_working_heading',
            'label' => 'Heading',
            'name' => 'working_heading',
            'type' => 'text',
            'instructions' => 'Enter the heading for this section',
            'required' => 1,
            'default_value' => 'Working with us',
        ),
        array(
            'key' => 'field_about_working_text',
            'label' => 'Description Text',
            'name' => 'working_text',
            'type' => 'textarea',
            'instructions' => 'Enter the descriptive text for this section',
            'required' => 1,
            'default_value' => 'We\'re a small independent design studio that was founded in 2017 by Chris Smith. We firmly believe in the transformative power of creativity through a collaborative process with our clients. With expertise across a wide range of design services we craft contemporary and meaningful projects that leave a lasting impression.',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'about.php',
            ),
        ),
    ),
    'menu_order' => 2,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

// Our Process Section
acf_add_local_field_group(array(
    'key' => 'group_about_process',
    'title' => 'Our Process Section',
    'fields' => array(
        array(
            'key' => 'field_about_process_heading',
            'label' => 'Process Heading',
            'name' => 'process_heading',
            'type' => 'text',
            'instructions' => 'Enter the heading for the process section',
            'required' => 1,
            'default_value' => 'Our Process',
        ),
        array(
            'key' => 'field_about_process_description',
            'label' => 'Process Description',
            'name' => 'process_description',
            'type' => 'textarea',
            'instructions' => 'Enter the introduction text for the process section',
            'required' => 1,
            'default_value' => 'Every project will have its own process but they are always guided by our three core principles',
        ),
        array(
            'key' => 'field_about_process_items',
            'label' => 'Process Steps',
            'name' => 'process_items',
            'type' => 'repeater',
            'instructions' => 'Add up to 3 process steps',
            'required' => 1,
            'min' => 1,
            'max' => 3,
            'layout' => 'block',
            'button_label' => 'Add Process Step',
            'sub_fields' => array(
                array(
                    'key' => 'field_about_process_step_title',
                    'label' => 'Step Title',
                    'name' => 'process_step_title',
                    'type' => 'text',
                    'instructions' => 'Enter the title for this process step',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_about_process_step_description',
                    'label' => 'Step Description',
                    'name' => 'process_step_description',
                    'type' => 'textarea',
                    'instructions' => 'Enter the description for this process step',
                    'required' => 1,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'about.php',
            ),
        ),
    ),
    'menu_order' => 3,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

// Clients Section
acf_add_local_field_group(array(
    'key' => 'group_about_clients',
    'title' => 'Clients Section',
    'fields' => array(
        array(
            'key' => 'field_about_clients_heading',
            'label' => 'Clients Heading',
            'name' => 'clients_heading',
            'type' => 'text',
            'instructions' => 'Enter the heading for the clients section',
            'required' => 1,
            'default_value' => 'Who we\'ve worked with',
        ),
        array(
            'key' => 'field_about_clients_description',
            'label' => 'Clients Description',
            'name' => 'clients_description',
            'type' => 'textarea',
            'instructions' => 'Enter the description text for the clients section',
            'required' => 1,
            'default_value' => 'We have worked with clients from all over the world and within a diverse range of industries. Local and international, big and small, public and private, established and start ups. Our clients are all innovators in their own fields and are not afraid to think outside of the box. Working with like minded individuals helps us to push each other to deliver outstanding creative solutions.',
        ),
        array(
            'key' => 'field_about_client_logos',
            'label' => 'Client Logos',
            'name' => 'client_logos',
            'type' => 'repeater',
            'instructions' => 'Add client logos',
            'required' => 0,
            'min' => 0,
            'layout' => 'table',
            'button_label' => 'Add Client Logo',
            'sub_fields' => array(
                array(
                    'key' => 'field_about_client_logo',
                    'label' => 'Client Logo',
                    'name' => 'client_logo',
                    'type' => 'image',
                    'instructions' => 'Upload a client logo',
                    'required' => 1,
                    'return_format' => 'array',
                    'preview_size' => 'thumbnail',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_about_client_name',
                    'label' => 'Client Name',
                    'name' => 'client_name',
                    'type' => 'text',
                    'instructions' => 'Enter the client name (for accessibility)',
                    'required' => 1,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'about.php',
            ),
        ),
    ),
    'menu_order' => 4,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

// Why Concrete Section
acf_add_local_field_group(array(
    'key' => 'group_about_why_concrete',
    'title' => 'Why Concrete Section',
    'fields' => array(
        array(
            'key' => 'field_about_why_concrete_image',
            'label' => 'Section Image',
            'name' => 'why_concrete_image',
            'type' => 'image',
            'instructions' => 'Upload an image for this section',
            'required' => 0,
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
        array(
            'key' => 'field_about_why_concrete_heading',
            'label' => 'Section Heading',
            'name' => 'why_concrete_heading',
            'type' => 'text',
            'instructions' => 'Enter the heading for this section',
            'required' => 1,
            'default_value' => 'Why Concrete?',
        ),
        array(
            'key' => 'field_about_why_concrete_text',
            'label' => 'Section Text',
            'name' => 'why_concrete_text',
            'type' => 'textarea',
            'instructions' => 'Enter the descriptive text for this section',
            'required' => 1,
            'default_value' => 'We have worked with clients from all over the world and within a diverse range of industries. Local and international, big and small, public and private, established and start ups. Our clients are all innovators in their own fields and are not afraid to think outside of the box. Working with like minded individuals helps us to push each other to deliver outstanding creative solutions.',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'about.php',
            ),
        ),
    ),
    'menu_order' => 5,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

// Testimonials Section
acf_add_local_field_group(array(
    'key' => 'group_about_testimonials',
    'title' => 'Testimonials Section',
    'fields' => array(
        array(
            'key' => 'field_about_testimonials_heading',
            'label' => 'Testimonials Heading',
            'name' => 'testimonials_heading',
            'type' => 'text',
            'instructions' => 'Enter the heading for the testimonials section',
            'required' => 1,
            'default_value' => 'What our clients say',
        ),
        array(
            'key' => 'field_about_testimonials',
            'label' => 'Testimonials',
            'name' => 'testimonials',
            'type' => 'repeater',
            'instructions' => 'Add testimonials',
            'required' => 0,
            'min' => 0,
            'layout' => 'block',
            'button_label' => 'Add Testimonial',
            'sub_fields' => array(
                array(
                    'key' => 'field_about_testimonial_text',
                    'label' => 'Testimonial Text',
                    'name' => 'testimonial_text',
                    'type' => 'textarea',
                    'instructions' => 'Enter the testimonial text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_about_testimonial_author',
                    'label' => 'Author Name',
                    'name' => 'testimonial_author',
                    'type' => 'text',
                    'instructions' => 'Enter the name of the person giving the testimonial',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_about_testimonial_company',
                    'label' => 'Company Name',
                    'name' => 'testimonial_company',
                    'type' => 'text',
                    'instructions' => 'Enter the company name (optional)',
                    'required' => 0,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'about.php',
            ),
        ),
    ),
    'menu_order' => 6,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

// Call to Action Section
acf_add_local_field_group(array(
    'key' => 'group_about_cta',
    'title' => 'Call to Action Section',
    'fields' => array(
        array(
            'key' => 'field_about_cta_heading',
            'label' => 'CTA Heading',
            'name' => 'cta_heading',
            'type' => 'text',
            'instructions' => 'Enter the heading for the call to action section',
            'required' => 1,
            'default_value' => 'Have an idea of a project you\'d like to work on?',
        ),
        array(
            'key' => 'field_about_cta_text',
            'label' => 'CTA Text',
            'name' => 'cta_text',
            'type' => 'textarea',
            'instructions' => 'Enter the descriptive text for the call to action',
            'required' => 1,
            'default_value' => 'We\'d love to hear from you to see how we could help. Call us on 0141 724 0089 or tap the button below.',
        ),
        array(
            'key' => 'field_about_cta_phone',
            'label' => 'Phone Number',
            'name' => 'cta_phone',
            'type' => 'text',
            'instructions' => 'Enter the phone number',
            'required' => 0,
            'default_value' => '0141 724 0089',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'page_template',
                'operator' => '==',
                'value' => 'about.php',
            ),
        ),
    ),
    'menu_order' => 7,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
));

endif; 
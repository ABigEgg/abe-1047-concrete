<?php
/**
 * ACF Field Group for Services Section Edit Notice
 * 
 * Adds an informational message on pages that use the Our Services section
 * to guide editors to the central options page.
 */

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_services_edit_notice',
    'title' => 'Our Services Section Notice',
    'fields' => array(
        array(
            'key' => 'field_services_edit_notice',
            'label' => 'Where to Edit "Our Services" Section',
            'name' => 'services_edit_notice',
            'type' => 'message',
            'instructions' => '',
            'required' => 0,
            'message' => '<div style="background-color: #e7f5fa; padding: 15px; border-left: 4px solid #2271b1;">
                <p><strong>Important:</strong> The "Our Services" section on this page is managed globally.</p>
                <p>To edit the content of this section, please go to <a href="' . admin_url('admin.php?page=site-options') . '" target="_blank"><strong>Site Options</strong></a> in the admin menu.</p>
                <p>Any changes made there will appear on all pages that use the "Our Services" section.</p>
            </div>',
            'new_lines' => 'wpautop',
            'esc_html' => 0,
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
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'service',
            ),
        ),
    ),
    'menu_order' => 90,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'active' => true,
    'description' => 'Displays an informational message about editing the Our Services section',
));

endif; 
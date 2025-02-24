<?php
/**
 * Contact form handling
 */

// Register AJAX handler for contact form
add_action('wp_ajax_submit_contact_form', 'handle_contact_form_submission');
add_action('wp_ajax_nopriv_submit_contact_form', 'handle_contact_form_submission');

function handle_contact_form_submission() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['_wpnonce'], 'contact_form_nonce')) {
        wp_send_json_error([
            'message' => 'Security check failed. Please refresh the page and try again.'
        ]);
    }

    // Validate required fields
    $required_fields = ['name', 'email', 'message'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            wp_send_json_error([
                'message' => 'Please fill in all required fields.'
            ]);
        }
    }

    // Validate email
    if (!is_email($_POST['email'])) {
        wp_send_json_error([
            'message' => 'Please enter a valid email address.'
        ]);
    }

    // Sanitize input
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $message = sanitize_textarea_field($_POST['message']);

    // Prepare email content
    $to = get_option('admin_email');
    $subject = 'New Contact Form Submission from ' . get_bloginfo('name');
    
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    if (!empty($phone)) {
        $body .= "Phone: $phone\n";
    }
    $body .= "\nMessage:\n$message";

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . $to . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    ];

    // Send email
    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success([
            'message' => 'Thank you for your message. We will get back to you soon!'
        ]);
    } else {
        wp_send_json_error([
            'message' => 'There was a problem sending your message. Please try again later.'
        ]);
    }
}

// Add contact information fields to Theme Options
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group([
        'key' => 'group_contact_information',
        'title' => 'Contact Information',
        'fields' => [
            [
                'key' => 'field_contact_address',
                'label' => 'Address',
                'name' => 'contact_address',
                'type' => 'textarea',
                'instructions' => 'Enter the company address',
                'required' => 0,
            ],
            [
                'key' => 'field_contact_email',
                'label' => 'Email',
                'name' => 'contact_email',
                'type' => 'email',
                'instructions' => 'Enter the contact email address',
                'required' => 0,
            ],
            [
                'key' => 'field_contact_phone',
                'label' => 'Phone',
                'name' => 'contact_phone',
                'type' => 'text',
                'instructions' => 'Enter the contact phone number',
                'required' => 0,
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'theme-general-settings',
                ],
            ],
        ],
    ]);
} 
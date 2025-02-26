<?php 

/**
 * Template name: About Us
 */

use Timber\Timber;

$context = Timber::context();

$context['post'] = Timber::get_post();

// Add ACF fields to context
$context['intro'] = [
    'heading' => get_field('intro_heading'),
    'subheading' => get_field('intro_subheading'),
    'text' => get_field('intro_text')
];

$context['feature_image'] = get_field('wide_image');

$context['working_with_us'] = [
    'main_image' => get_field('working_main_image'),
    'secondary_image' => get_field('working_secondary_image'),
    'heading' => get_field('working_heading'),
    'text' => get_field('working_text')
];

$context['process'] = [
    'heading' => get_field('process_heading'),
    'description' => get_field('process_description'),
    'items' => get_field('process_items')
];

$context['clients'] = [
    'heading' => get_field('clients_heading'),
    'description' => get_field('clients_description'),
    'logos' => get_field('client_logos')
];

$context['why_concrete'] = [
    'image' => get_field('why_concrete_image'),
    'heading' => get_field('why_concrete_heading'),
    'text' => get_field('why_concrete_text')
];

$context['testimonials'] = [
    'heading' => get_field('testimonials_heading'),
    'items' => get_field('testimonials')
];

$context['cta'] = [
    'heading' => get_field('cta_heading'),
    'text' => get_field('cta_text'),
    'phone' => get_field('cta_phone')
];

Timber::render( 'about.twig', $context );
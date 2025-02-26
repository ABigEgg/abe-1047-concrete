<?php
use Timber\Timber;
use Timber\Post;  

/**
 * Template Name: Services
 */

$context = Timber::context();
$timber_post = new Post();   
$context['post'] = $timber_post;

// Get all services
$args = array(
    'post_type' => 'service',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

$context['services'] = Timber::get_posts($args);

// Get heading and intro text from ACF fields
$context['intro'] = [
    'heading' => get_field('services_intro_heading'),
    'text' => get_field('services_intro_text')
];

// Get featured projects from ACF field
$featured_projects = get_field('featured_projects') ?: [];
$context['similar_projects'] = array_map(function($project) {
    return new Post($project);
}, $featured_projects);

// If no featured projects are selected, get the latest ones
if (empty($context['similar_projects'])) {
    $projects_args = array(
        'post_type' => 'project',
        'posts_per_page' => 2,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $context['similar_projects'] = Timber::get_posts($projects_args);
}

// Add CTA options to context using helper function
$context['global_cta'] = concrete_get_cta_options();

Timber::render('services.twig', $context); 
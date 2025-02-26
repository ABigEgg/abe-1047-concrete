<?php 
use Timber\Timber;
use Timber\Post;

$context = Timber::context();

// Add ACF fields to context
$context['intro'] = [
    'heading' => get_field('intro_heading'),
    'text' => get_field('intro_text')
];

// Get selected projects and convert to Timber posts
$selected_projects = get_field('featured_projects') ?: [];
$context['featured_projects'] = array_map(function($project) {
    return new Post($project);
}, $selected_projects);

// Add CTA options to context using helper function
$context['global_cta'] = concrete_get_cta_options();

Timber::render('index.twig', $context);
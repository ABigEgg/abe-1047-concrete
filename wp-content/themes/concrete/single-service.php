<?php 

use Timber\Timber;
use Timber\Post;

$context = Timber::context();
$context['post'] = new Post();

// Add services options to context using helper function
$context['options'] = concrete_get_services_options();

// Convert similar projects to Timber posts
$similar_projects = get_field('similar_projects') ?: [];
$context['similar_projects'] = array_map(function($project) {
    return new Post($project);
}, $similar_projects);

// Add CTA options to context using helper function
$context['global_cta'] = concrete_get_cta_options();

Timber::render('single-service.twig', $context); 
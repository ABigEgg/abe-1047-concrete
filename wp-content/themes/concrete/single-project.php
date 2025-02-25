<?php 

use Timber\Timber;
use Timber\Post;

$context = Timber::context();
$context['post'] = new Post();

// Convert similar projects to Timber posts
$similar_projects = get_field('similar_projects') ?: [];
$context['similar_projects'] = array_map(function($project) {
    return new Post($project);
}, $similar_projects);

Timber::render( 'single-project.twig', $context );
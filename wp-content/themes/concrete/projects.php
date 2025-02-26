<?php 
use Timber\Timber;
use Timber\Post;

/**
 * Template name: Our Work
 */


$context = Timber::context();

// Get all projects with sorting
$args = array(
    'post_type' => 'project',
    'posts_per_page' => -1,
    'meta_key' => 'sort_order',
    'orderby' => array(
        'meta_value_num' => 'ASC',
        'date' => 'DESC'
    )
);

$context['projects'] = Timber::get_posts($args);

// Add CTA options to context using helper function
$context['global_cta'] = concrete_get_cta_options();

Timber::render('projects.twig', $context);
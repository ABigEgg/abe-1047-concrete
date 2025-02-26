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

// Add CTA options to context using helper function
$context['global_cta'] = concrete_get_cta_options();

Timber::render('services.twig', $context); 
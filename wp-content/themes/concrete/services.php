<?php
/**
 * Template Name: Services
 */

$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;

// Get all services
$args = array(
    'post_type' => 'service',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

$context['services'] = Timber::get_posts($args);

Timber::render('services.twig', $context); 
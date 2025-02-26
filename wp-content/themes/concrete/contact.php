<?php
/**
 * Template Name: Contact
 */

use Timber\Timber;

$context = Timber::context();
$timber_post = Timber::get_post();
$context['post'] = $timber_post;

// Add CTA options to context using helper function
$context['global_cta'] = concrete_get_cta_options();

Timber::render('contact.twig', $context); 
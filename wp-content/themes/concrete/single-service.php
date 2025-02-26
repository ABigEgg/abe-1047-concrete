<?php 

use Timber\Timber;

$context = Timber::context();

// Add services options to context using helper function
$context['options'] = concrete_get_services_options();

// Add CTA options to context using helper function
$context['global_cta'] = concrete_get_cta_options();

Timber::render('single-service.twig', $context); 
<?php

use Timber\Timber;

$context = Timber::context();

// Add CTA options to context using helper function
$context['global_cta'] = concrete_get_cta_options();

Timber::render('404.twig', $context); 
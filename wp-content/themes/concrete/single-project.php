<?php 

use Timber\Timber;

$context = Timber::context();

Timber::render( 'single-project.twig', $context );
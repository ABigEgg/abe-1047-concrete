<?php
/**
 * Template Name: Contact
 */

$context = Timber::context();
$timber_post = Timber::get_post();
$context['post'] = $timber_post;
Timber::render('contact.twig', $context); 
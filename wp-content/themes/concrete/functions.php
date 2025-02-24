<?php
if (!defined('ABSPATH')) exit;

// Load Composer dependencies.
require_once __DIR__ . '/vendor/autoload.php';

// Initialize Timber
$timber = new Timber\Timber();

// Load theme modules
require_once __DIR__ . '/inc/theme.inc.php';
require_once __DIR__ . '/inc/post-types.inc.php';
require_once __DIR__ . '/inc/contact-form.php';
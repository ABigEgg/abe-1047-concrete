<?php 
/**
 * ACF Blocks Registration
 *
 * This file registers custom ACF blocks for the Concrete theme.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Only proceed if ACF Pro is active
if (!function_exists('acf_register_block_type')) {
    return;
}

/**
 * Render callback for the Concrete Gallery block
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param int $post_id The post ID this block is saved to.
 */
function concrete_render_gallery_block($block, $content = '', $is_preview = false, $post_id = 0) {
    // Get ACF fields
    $layout = get_field('layout') ?: 'layout_a';
    $background = get_field('background') ?: 'white';
    $gallery_images = get_field('gallery_images') ?: [];
    
    // Set a default ID for the block
    $id = $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }
    
    // Create class attribute
    $class_name = 'concrete-gallery';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    if (!empty($block['align'])) {
        $class_name .= ' align' . $block['align'];
    }
    
    // Pass to Timber
    \Timber\Timber::render('blocks/concrete-gallery.twig', [
        'block' => $block,
        'is_preview' => $is_preview,
        'post_id' => $post_id,
        'layout' => $layout,
        'background' => $background,
        'gallery_images' => $gallery_images,
        'block_id' => $id,
        'class_name' => $class_name
    ]);
}

/**
 * Register ACF Blocks
 */
function concrete_register_acf_blocks() {
    
    // Register Concrete Gallery Block
    acf_register_block_type(array(
        'name'              => 'concrete-gallery',
        'title'             => __('Concrete Gallery', 'concrete'),
        'description'       => __('A custom gallery block with different layout options.', 'concrete'),
        'render_callback'   => 'concrete_render_gallery_block',
        'category'          => 'formatting',
        'icon'              => 'images-alt2',
        'keywords'          => array('gallery', 'images', 'concrete'),
        'supports'          => array(
            'align' => true,
            'mode' => false,
            'jsx' => true
        ),
    ));
    
    // Add more blocks here as needed
}

// Register blocks on init
add_action('acf/init', 'concrete_register_acf_blocks');

/**
 * Register ACF fields for Blocks
 */
function concrete_register_block_fields() {
    
    // Concrete Gallery Block fields
    acf_add_local_field_group(array(
        'key' => 'group_concrete_gallery',
        'title' => 'Concrete Gallery Block',
        'fields' => array(
            array(
                'key' => 'field_concrete_gallery_layout',
                'label' => 'Layout',
                'name' => 'layout',
                'type' => 'select',
                'instructions' => 'Select the gallery layout',
                'required' => 1,
                'choices' => array(
                    'layout_a' => 'Layout A',
                    'layout_b' => 'Layout B',
                    'layout_c' => 'Layout C',
                ),
                'default_value' => 'layout_a',
            ),
            array(
                'key' => 'field_concrete_gallery_background',
                'label' => 'Background',
                'name' => 'background',
                'type' => 'select',
                'instructions' => 'Select the background color',
                'required' => 1,
                'choices' => array(
                    'white' => 'White',
                    'grey' => 'Grey',
                ),
                'default_value' => 'white',
            ),
            array(
                'key' => 'field_concrete_gallery_images',
                'label' => 'Gallery Images',
                'name' => 'gallery_images',
                'type' => 'repeater',
                'instructions' => 'Add up to 3 gallery images',
                'min' => 1,
                'max' => 3,
                'layout' => 'block',
                'button_label' => 'Add Image',
                'sub_fields' => array(
                    array(
                        'key' => 'field_concrete_gallery_image',
                        'label' => 'Image',
                        'name' => 'image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 1,
                        'return_format' => 'array',
                        'preview_size' => 'medium',
                        'library' => 'all',
                    ),
                    array(
                        'key' => 'field_concrete_gallery_caption',
                        'label' => 'Caption',
                        'name' => 'caption',
                        'type' => 'text',
                        'instructions' => 'Optional image caption',
                        'required' => 0,
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/concrete-gallery',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));
    
    // Add more block fields here as needed
}

// Register fields
add_action('acf/init', 'concrete_register_block_fields', 11); 

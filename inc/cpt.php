<?php
/**
 * Steel Villa Custom Post Types & Taxonomies
 * Exact registration matching https://steelvilla.com.bd data architecture
 */

if (!defined('ABSPATH')) {
    exit;
}

function steelvilla_register_post_types_and_taxonomies() {

    // 1. CPT: hero (Homepage Carousel Slides)
    register_post_type('hero', array(
        'labels' => array(
            'name'               => __('Hero Slides', 'steelvilla'),
            'singular_name'      => __('Hero Slide', 'steelvilla'),
            'add_new'            => __('Add New Slide', 'steelvilla'),
            'add_new_item'       => __('Add New Hero Slide', 'steelvilla'),
            'edit_item'          => __('Edit Hero Slide', 'steelvilla'),
            'all_items'          => __('All Hero Slides', 'steelvilla'),
            'menu_name'          => __('Hero Slider', 'steelvilla')
        ),
        'public'             => true,
        'has_archive'        => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-slides',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields'),
        'rewrite'            => array('slug' => 'hero')
    ));

    // 2. CPT: service (Pre-Engineered Building Services)
    register_post_type('service', array(
        'labels' => array(
            'name'               => __('Services', 'steelvilla'),
            'singular_name'      => __('Service', 'steelvilla'),
            'add_new'            => __('Add New Service', 'steelvilla'),
            'add_new_item'       => __('Add New Service', 'steelvilla'),
            'edit_item'          => __('Edit Service', 'steelvilla'),
            'all_items'          => __('All Services', 'steelvilla'),
            'menu_name'          => __('Services', 'steelvilla')
        ),
        'public'             => true,
        'has_archive'        => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-hammer',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'custom-fields'),
        'rewrite'            => array('slug' => 'service')
    ));

    // 3. CPT: project (Complete & Ongoing Projects)
    register_post_type('project', array(
        'labels' => array(
            'name'               => __('Projects', 'steelvilla'),
            'singular_name'      => __('Project', 'steelvilla'),
            'add_new'            => __('Add New Project', 'steelvilla'),
            'add_new_item'       => __('Add New Project', 'steelvilla'),
            'edit_item'          => __('Edit Project', 'steelvilla'),
            'all_items'          => __('All Projects', 'steelvilla'),
            'menu_name'          => __('Projects', 'steelvilla')
        ),
        'public'             => true,
        'has_archive'        => 'projects-archive',
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'custom-fields'),
        'rewrite'            => array('slug' => 'project')
    ));

    // 4. CPT: product (Industrial Steel Materials & Supplies)
    register_post_type('product', array(
        'labels' => array(
            'name'               => __('Steel Products', 'steelvilla'),
            'singular_name'      => __('Product', 'steelvilla'),
            'add_new'            => __('Add New Product', 'steelvilla'),
            'add_new_item'       => __('Add New Product', 'steelvilla'),
            'edit_item'          => __('Edit Product', 'steelvilla'),
            'all_items'          => __('All Products', 'steelvilla'),
            'menu_name'          => __('Products', 'steelvilla')
        ),
        'public'             => true,
        'has_archive'        => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'custom-fields'),
        'rewrite'            => array('slug' => 'product')
    ));

    // 5. CPT: project-review (Corporate Client Logos & Marquee Reviews)
    register_post_type('project-review', array(
        'labels' => array(
            'name'               => __('Reviews & Clients', 'steelvilla'),
            'singular_name'      => __('Review / Client', 'steelvilla'),
            'add_new'            => __('Add New Client/Review', 'steelvilla'),
            'add_new_item'       => __('Add New Client Logo', 'steelvilla'),
            'edit_item'          => __('Edit Client / Review', 'steelvilla'),
            'all_items'          => __('All Clients & Reviews', 'steelvilla'),
            'menu_name'          => __('Client Marquee', 'steelvilla')
        ),
        'public'             => true,
        'has_archive'        => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-awards',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields'),
        'rewrite'            => array('slug' => 'project-review')
    ));

    // -------------------------------------------------------------
    // Custom Taxonomies
    // -------------------------------------------------------------

    // Taxonomy: project-status (Completed, Ongoing)
    register_taxonomy('project-status', array('project'), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => __('Project Statuses', 'steelvilla'),
            'singular_name'     => __('Project Status', 'steelvilla'),
            'search_items'      => __('Search Statuses', 'steelvilla'),
            'all_items'         => __('All Statuses', 'steelvilla'),
            'edit_item'         => __('Edit Status', 'steelvilla'),
            'add_new_item'      => __('Add New Status', 'steelvilla'),
            'menu_name'         => __('Project Status', 'steelvilla')
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-status')
    ));

    // Taxonomy: project-category- (Factory, Warehouse, Commercial, etc.)
    register_taxonomy('project-category-', array('project'), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => __('Project Categories', 'steelvilla'),
            'singular_name'     => __('Project Category', 'steelvilla'),
            'search_items'      => __('Search Categories', 'steelvilla'),
            'all_items'         => __('All Categories', 'steelvilla'),
            'edit_item'         => __('Edit Category', 'steelvilla'),
            'add_new_item'      => __('Add New Category', 'steelvilla'),
            'menu_name'         => __('Project Categories', 'steelvilla')
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category')
    ));
}
add_action('init', 'steelvilla_register_post_types_and_taxonomies');

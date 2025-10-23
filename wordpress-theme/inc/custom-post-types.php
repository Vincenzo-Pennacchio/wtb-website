<?php
/**
 * Custom Post Types for WealthBag
 *
 * @package WealthBag
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Types
 */
function wealthbag_register_post_types() {
    // Portfolio/Projects Post Type
    register_post_type('wealthbag_project', array(
        'labels' => array(
            'name'               => __('Projects', 'wealthbag'),
            'singular_name'      => __('Project', 'wealthbag'),
            'menu_name'          => __('Projects', 'wealthbag'),
            'add_new'            => __('Add New', 'wealthbag'),
            'add_new_item'       => __('Add New Project', 'wealthbag'),
            'new_item'           => __('New Project', 'wealthbag'),
            'edit_item'          => __('Edit Project', 'wealthbag'),
            'view_item'          => __('View Project', 'wealthbag'),
            'all_items'          => __('All Projects', 'wealthbag'),
            'search_items'       => __('Search Projects', 'wealthbag'),
            'not_found'          => __('No projects found.', 'wealthbag'),
            'not_found_in_trash' => __('No projects found in Trash.', 'wealthbag')
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    ));

    // Team Members Post Type
    register_post_type('wealthbag_team', array(
        'labels' => array(
            'name'               => __('Team Members', 'wealthbag'),
            'singular_name'      => __('Team Member', 'wealthbag'),
            'menu_name'          => __('Team', 'wealthbag'),
            'add_new'            => __('Add New', 'wealthbag'),
            'add_new_item'       => __('Add New Team Member', 'wealthbag'),
            'new_item'           => __('New Team Member', 'wealthbag'),
            'edit_item'          => __('Edit Team Member', 'wealthbag'),
            'view_item'          => __('View Team Member', 'wealthbag'),
            'all_items'          => __('All Team Members', 'wealthbag'),
            'search_items'       => __('Search Team Members', 'wealthbag'),
            'not_found'          => __('No team members found.', 'wealthbag'),
            'not_found_in_trash' => __('No team members found in Trash.', 'wealthbag')
        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'team'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest'       => true,
    ));
}
add_action('init', 'wealthbag_register_post_types');

/**
 * Register Custom Taxonomies
 */
function wealthbag_register_taxonomies() {
    // Project Categories
    register_taxonomy('project_category', array('wealthbag_project'), array(
        'hierarchical'      => true,
        'labels'            => array(
            'name'              => __('Project Categories', 'wealthbag'),
            'singular_name'     => __('Project Category', 'wealthbag'),
            'search_items'      => __('Search Project Categories', 'wealthbag'),
            'all_items'         => __('All Project Categories', 'wealthbag'),
            'parent_item'       => __('Parent Project Category', 'wealthbag'),
            'parent_item_colon' => __('Parent Project Category:', 'wealthbag'),
            'edit_item'         => __('Edit Project Category', 'wealthbag'),
            'update_item'       => __('Update Project Category', 'wealthbag'),
            'add_new_item'      => __('Add New Project Category', 'wealthbag'),
            'new_item_name'     => __('New Project Category Name', 'wealthbag'),
            'menu_name'         => __('Categories', 'wealthbag'),
        ),
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'project-category'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'wealthbag_register_taxonomies');
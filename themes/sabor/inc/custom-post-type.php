<?php
function create_sabor_post_type () {
    register_post_type( 'Recipe',
    // This post type is used to display a Recipe list.
        array(
            'labels' => array(
                'name' => __( 'Recipe' ),
                'singular_name' => __( 'Recipe' ),
                'menu_name' => __( 'Recipe' ),
                'parent_item_colon' => __( 'Parent Recipe' ),
                'all_items'           => __( 'All Recipes' ),
                'view_item'           => __( 'View Recipe' ),
                'add_new_item'        => __( 'Add New Recipe'),
                'add_new'             => __( 'Add Recipe' ),
                'edit_item'           => __( 'Edit Recipe' ),
                'update_item'         => __( 'Update Recipe' ),
                'search_items'        => __( 'Search Recipe' ),
                'not_found'           => __( 'Not Found' ),
                'not_found_in_trash'  => __( 'Not found in Trash' ),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'recetas'),
            'show_in_rest' => true,
            'hierarchical' => false,
            'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields','page-attributes','comments' ),
        )
    );
}
//This hook to intialize custom sabor post types
add_action( 'init', 'create_sabor_post_type' );
?>
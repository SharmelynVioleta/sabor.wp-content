<?php
//this Function is used for add taxonomy in Custom post type
function recipe_taxonomy() {
    register_taxonomy(
        'recipe-categories',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'recipe',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Recipe Category', // display name
            'query_var' => true,
            'show_in_rest'          => true,
            'rewrite' => array(
                'slug' => 'recetas-categorias',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'recipe_taxonomy');

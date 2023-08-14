<?php
/**
 * Recipe category
 *
 * @param mixed $atts Recipe category
 * @return string HTML of sabor sub recipe
 */
function sabor_sub_recipe($atts) {
    // Extract the 'slug' attribute from the $atts array
    $atts = shortcode_atts(array(
        'slug' => '',
    ), $atts);

    /** @var mixed recipe slug*/
    $recipe_slug = isset($atts['slug']) ? $atts['slug']  :'';

    /** @var mixed recipe categorie*/
    $taxonomy_recipe = 'recipe-categories';

    /** @var mixed category_list */
    $category_list = get_term_by( 'slug', $recipe_slug, $taxonomy_recipe);

    /** @var mixed term id  */
    $term_id = $category_list->term_id;

    /** @var mixed term children */
    $termchildren = get_term_children( $term_id, $taxonomy_recipe );
    ob_start();
    echo '<div class="recipe_sub"><ul>';
    foreach ( $termchildren as $child ) {
        $term = get_term_by( 'id', $child, $taxonomy_recipe );
        echo '<li><a href="' . get_term_link( $child, $taxonomy_recipe ) . '">' . $term->name . '</a></li>';
    }
    echo '</ul></div>';

    $output_string = ob_get_clean();

    return $output_string;
}

// Register the shortcode 'sub_recipe' and hook it to the 'sabor_sub_recipe' function
add_shortcode('sub_recipe', 'sabor_sub_recipe');


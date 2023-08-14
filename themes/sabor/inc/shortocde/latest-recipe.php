<?php
/**
 * Recipe category
 *
 * @param mixed $atts Recipe category
 * @return string HTML of sabor sub recipe
 */
function sabor_recipe($atts) {
    // Extract the 'slug' attribute from the $atts array, defaulting to 'favorite' if not provided
    $atts = shortcode_atts(array(
        'slug' => '',
    ), $atts);


    $theme_url = get_template_directory_uri();
    // Retrieve the 'slug' attribute
    $recipe_slug = isset($atts['slug']) ? $atts['slug']  :'';

    // Set up arguments for the query to retrieve posts
    $args = array(
        'post_type'      => 'recipe',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'order'          => 'DESC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'recipe-categories',
                'field'    => 'slug',
                'terms'    => $recipe_slug,
            ),
        ),
    );

    // Retrieve the posts based on the arguments
    $recipe_list = get_posts($args);

    


    ob_start();?>
    <div class="card-section col-4 slider">
        <div class="container">
        <div class="cards">
        <?php foreach ($recipe_list as $recipe_single) :
                $post_image = get_the_post_thumbnail_url($recipe_single->ID, 'blog-thumb');
                $post_permalink = get_permalink($recipe_single->ID);
                $post_title = $recipe_single->post_title;
                if (empty($post_image)) {
                    $post_image = $theme_url . '/assets/images/post-thumnail.jpg';
                    }
            ?>
            <div class="card">
                <div class="card-image">
                    <a href="<?php echo $post_permalink; ?>">
                        <img width="380" height="260" src="<?php echo $post_image; ?>" alt="<?php echo basename($post_image); ?>">
                    </a>
                </div>
                <div class="card-content">
                    <?php
                    $time = get_field('time', $recipe_single->ID);
                    $part = get_field('part', $recipe_single->ID);
                    if(!empty($time) & !empty($part)) : ?>
                    <div class="process">
                        <?php
                            if( !empty( $time ) ):?>
                            <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/minutos.png" alt="clock-logo-black"><?php echo $time; ?></p>
                                <?php
                            endif;
                            if( !empty( $part ) ):?>
                                <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/porciones.png"
                            alt="knife-logo-black"><?php echo $part;?></p>
                            <?php
                        endif;
                        ?>
                    </div>
                        <?php
                    endif;?>
                <div class="inner-content">
                    <div class="text-link">
                        <a href="<?php echo $post_permalink; ?>"><?php echo $post_title; ?></a>
                    </div>
                    </div>
                </div>
            </div>
        <?php endforeach;?>
        </div>
    </div>
    </div>
        <?php

        $output_string = ob_get_clean();

        return $output_string;
}

// Register the shortcode 'sub_recipe' and hook it to the 'sabor_sub_recipe' function
add_shortcode('recipe', 'sabor_recipe');




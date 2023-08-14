<?php
/**
 * Block Name: Recipe Category
 *
 * This is the template that displays the selected recipe listing.
 */

$id = 'blog-section' . $block['id'];
$theme_url = get_template_directory_uri();
$recipe_category = get_field('select_category');
$category_title = get_field('recipe_title');
?>
<div class="category-section">
   <div class="container">
        <h5><?php echo $category_title; ?></h5>
        <div class="cards">
        <?php
            foreach ($recipe_category as $recipe) :
                $category_image = get_field('category_image', "recipe-categories_$recipe->term_id");
                $category_link = get_category_link($recipe->term_id); // Added category link

                ?>
                <div class="card">
                    <a href="<?php echo $category_link; ?>" class="card-image"> <!-- Added category link -->
                        <img width='380' height='260' src='<?php echo $category_image['url']; ?>' alt='<?php echo $category_image['title']; ?>'>
                    </a>
                    <div class="sticky-btn">
                        <?php echo $recipe->count; ?> <?php _e('recetas', 'sabor'); ?>
                    </div>
                    <div class="card-content">
                        <p><?php echo $recipe->name; ?></p>
                        <a href="<?php echo $category_link; ?>"><?php _e('Ver recetas', 'sabor'); ?></a> <!-- Added category link -->
                    </div>
                </div>
                <?php
            endforeach;
        ?>
      </div>
   </div>
</div>
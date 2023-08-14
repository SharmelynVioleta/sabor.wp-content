<?php
/**
 * Block Name: Recipe Section
 *
 * This is the template that displays the recipe section.
 */

// Create an ID attribute for specific styling
$id = 'recipe-section' . $block['id'];

// Get the URL of the theme
$theme_url = get_template_directory_uri();

// Get the selected recipe post
$recipe_post = get_field('select_recipe');

// Get the recipe image
$recipe_image = wp_get_attachment_url(get_post_thumbnail_id($recipe_post->ID));
if (empty($recipe_image)) {
   // If no image is found, use a default image URL
   $recipe_image = $theme_url . '/assets/images/post-thumnail.jpg';
}

// Get the author ID of the recipe post
$author_id = $recipe_post->post_author;

//post permalink
$recipe_link  =  get_permalink(($recipe_post->ID));
?>

<div class="banner-section" style='background-image:url(<?php echo $recipe_image; ?>)'>
   <div class="banner-content">
      <div class="breadcrumb">
         <?php
            // Get the recipe categories and display them as breadcrumbs
            $recipe_list = get_the_terms($recipe_post->ID, 'recipe-categories', array('fields' => 'names'));
            $terms = get_terms('recipe-categories');
            if (!empty($recipe_list)) {
               foreach ($recipe_list as $recipe_name) {
                  echo '<a href="' . get_term_link($recipe_name) . '">' . $recipe_name->name . '</a>';
               }
            }
         ?>
      </div>
      <a href="<?php echo $recipe_link; ?>">
         <h1><?php echo $recipe_post->post_title; ?></h1>
      </a>
      <div class="process">
         <?php
            // Get additional information about the recipe
            $time = get_field('time', $recipe_post->ID);
            $part = get_field('part', $recipe_post->ID);
            $recipe_level = get_field('recipe_level', $recipe_post->ID);
         ?>
         <?php if (!empty($time) && !empty($part)) : ?>
            <div class="process">
               <?php if (!empty($time)) : ?>
                  <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/clock-logo.svg" alt="Clock Icon"><?php echo $time; ?></p>
               <?php endif; ?>
               <?php if (!empty($time)) : ?>
                  <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/knife-logo.svg" alt="Knife Icon"><?php echo $part; ?></p>
               <?php endif; ?>
               <?php if (!empty($recipe_level)) : ?>
                  <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/smile-logo.svg" alt="Smile Icon"><?php echo $recipe_level; ?></p>
               <?php endif; ?>
            </div>
         <?php endif; ?>
      </div>
      <a href="<?php echo get_author_posts_url($author_id); ?>" class="chef-name">
         <div class="image">
            <?php
               $author_profile = get_field('author_profile',  'user_'. $author_id );
               if (!empty($author_profile['url'])) {
                  $placeholder_image = $author_profile['url'];
               }else{
                  $placeholder_image = $theme_url . '/assets/images/placeholder_profile.png';
               }
            ?>
            <img width="37" height="37" src="<?php echo $placeholder_image; ?>" alt="chef-image">
         </div>
         <p>
            <?php
               // Get the author name
               $post_author_id = $recipe_post->post_author;
               $author_obj = get_user_by('id', $post_author_id);
               echo $author_obj->display_name;
            ?>
         </p>
      </a>
      <a href="<?php echo $recipe_link; ?>" class="bottom-text">
         <span></span>
         <p><?php _e('Prepara esta receta', 'sabor'); ?></p>
      </a>
   </div>
</div>

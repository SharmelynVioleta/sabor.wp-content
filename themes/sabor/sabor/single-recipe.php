<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sabor
 */

get_header();
$theme_url = get_template_directory_uri();
?>
<main id="primary" class="site-main">
   <?php
   while (have_posts()) :
      the_post(); ?>
   <div class="recipe-banner-section">
      <div class="banner-content">
         <div class="recipe-left">
            <div class="breadcrumb">
               <?php
                  $recipe_cat = get_the_terms($post->ID, 'recipe-categories', array('fields' => 'names'));
                  if (!empty($recipe_cat)) {
                     foreach ($recipe_cat as $recipe_cat_name) {
                        echo '<a href="' . get_term_link($recipe_cat_name) . '">' . $recipe_cat_name->name . '</a>';
                     }
                  }
                  ?>
               </div>
               <h1><?php the_title(); ?></h1>
               <p><?php the_excerpt(); ?></p>
               <a href="<?php echo get_author_posts_url($post->post_author); ?>" class="chef-name">
                  <img width='30' height='30' src="<?php echo $theme_url ?>/assets/images/chef-image.svg" alt="chef-image">
                  <?php echo $author_id = $post->post_author;
                  $author_obj = get_user_by('id', $author_id);
                  echo $author_obj->display_name; ?></a>
            <?php
               $time = get_field('time', $post->ID);
               $part = get_field('part', $post->ID);
               $recipe_level = get_field('recipe_level', $post->ID);
               ?>
            <?php
               if (!empty($time) & !empty($part)) :
               ?>
            <div class="process">
               <?php
                     if (!empty($time)) :
                     ?>
               <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/clock-logo-black.svg"
                     alt="clock-logo-black"><?php echo $time; ?></p>
               <?php
                     endif;
                     if (!empty($part)) :
                     ?>
               <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/knife-logo-black.svg"
                     alt="knife-logo-black"><?php echo $part; ?></p>
               <?php
                     endif;
                     if (!empty($recipe_level)) :
                     ?>
               <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/smile-logo-black.svg"
                     alt="knife-logo-black"><?php echo $recipe_level; ?></p>
               <?php
                     endif;
                     ?>
            </div>
            <?php
               endif;
               ?>

         </div>
         <div class="right_side">
            <?php
               $recipe_image_or_video = get_field('recipe_image_or_video', $post->ID);
               if ($recipe_image_or_video == 'video') : ?>
            <div class="video">
               <?php echo get_field('video', $post->ID); ?>
            </div>
            <?php elseif ($recipe_image_or_video == 'image') : ?>
            <?php
                  $image = get_field('image', $post->ID);
                  if (!empty($image)) :
                  ?>
            <div class="hero_images">
               <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
            <?php endif; ?>
            <?php else : ?>
            <div class="hero_images">
               <img src="<?php echo $theme_url; ?>/assets/images/placeholder-recipe.png" alt="Recipe">
            </div>
            <?php endif; ?>
         </div>
      </div>
   </div>
   <?php
      $ingredientes_right_side_title = get_field('ingredientes_right_side_title', $post->ID);
      $ingredientes_list = get_field('ingredientes_list', $post->ID);
      $ingredientes_sustitutos_right_side_title = get_field('ingredientes_sustitutos_right_side_title', $post->ID);
      $ingredientes_sustitutos_list = get_field('ingredientes_sustitutos_list', $post->ID);
      ?>
      <div class="recipe-page">
         <div class="container">
            <div class="recipe-content-section">
               <div class="ingredient-section">
                  <?php
                  if (!empty($ingredientes_list)) :
                     ?>
                     <div class="box">
                        <?php if (!empty($ingredientes_right_side_title)) : ?>
                           <h2><?php echo $ingredientes_right_side_title; ?></h2>
                        <?php endif; ?>
                        <div class="ingrediente-list">
                           <ul>
                              <?php foreach ($ingredientes_list as $value) : ?>
                                 <li><?php echo $value['ingrediente']; ?></li>
                              <?php endforeach; ?>
                           </ul>
                        </div>
                     </div>
                  <?php
                     endif; ?>
                  <?php
                  if (!empty($ingredientes_sustitutos_list)) : ?>
                     <div class="box box-2">
                        <?php if (!empty($ingredientes_sustitutos_right_side_title)) : ?>
                           <h3><?php echo $ingredientes_sustitutos_right_side_title; ?></h3>
                        <?php endif;?>
                           <div class="ingrediente-list">
                              <ul>
                                 <?php foreach ($ingredientes_sustitutos_list as $value) : ?>
                                    <li><?php echo $value['ingredientes_sustitutos']; ?></li>
                                 <?php endforeach; ?>
                              </ul>
                           </div>
                     </div>
                     <?php
                  endif; ?>
                  <?php
                  $recipe_message = get_field('description', $post->ID);
                  if($recipe_message) :
                     ?>
                     <div class="message_box">
                        <?php echo $recipe_message; ?>
                     </div>
                     <?php
                  endif; ?>
               </div>
            </div>
            <div class="preparation-section ">
               <div class="steps-heading blog-inner-content">
                  <?php the_content(); ?>
               </div>
               <?php
                    $author_obj = get_user_by('id', $author_id);
                    $biography = get_the_author_meta('description', $author_id);
                    $author_social_data = get_field('author_social_icons', $author_id);
                    $author_social_icons_list = get_field('author_social_icons', 'user_'. $author_id );
                    $author_profile = get_field('author_profile', 'user_'. $author_id );
                    ?>
               <div class="testimonial">
                  <div class="image">
                     <img width='37' height='37' src="<?php echo $author_profile['url']?>" alt="chef-image">
                  </div>
                  <div class="content">
                     <h5><?php  echo $author_obj->display_name;?></h5>
                     <p><?php echo $biography; ?></p>
                     <ul>
                        <?php foreach($author_social_icons_list as $author_single): ?>
                        <li>
                           <a href="<?php echo $author_single['icon_url']; ?>"><img width='16' height='16'
                                 src="<?php echo $author_single['social_icon_image']['url']; ?>"
                                 alt="<?php echo  $author_single['social_icon_image']['alt']; ?>"></a>
                        </li>
                        <?php endforeach; ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   <div class="card-section col-3">
      <div class="container">
         <h5>Te recomendamos</h5>
         <div class="cards">
            <?php
                    $recipe_cat = get_the_terms($post->ID, 'recipe-categories', array('fields' => 'names','parent' => 0));
                    
                    $args = array(
                        'post_type' => 'recipe',
                        'status' => 'publish',
                        'posts_per_page' => 4,
                        'order' => 'DESC',
                        $taxonomy_arg = array(
                            array(
                                'taxonomy' => 'recipe-categories',
                                'field'    => 'slug',
                                'terms'    => $recipe_cat[0]->slug,
                            ),
                        )
                    );
                    $blog_list = get_posts($args);

               // Display the first post in a left-aligned card
               $first_post = $blog_list[0];
               $first_post_image = get_the_post_thumbnail_url($first_post->ID, 'full');
               $first_post_permalink = get_permalink($first_post->ID);
               $first_post_excerpt = get_the_excerpt($first_post->ID);

               if (empty($first_post_image)) {
                  $first_post_image = $theme_url . '/assets/images/post-thumnail.jpg';
               }
               ?>
            <?php
               // Display the remaining posts in right-aligned cards
               foreach (array_slice($blog_list, 1) as $post) {
                  $post_image = get_the_post_thumbnail_url($post->ID, 'blog-thumb');
                  $post_permalink = get_permalink($post->ID);
                  $post_title = $post->post_title;
                  if (empty($post_image)) {
                     $post_image = $theme_url . '/assets/images/post-thumnail.jpg';
                  }
               ?>
            <div class="card">
               <div class="card-image">
                  <a href="<?php echo $post_permalink; ?>">
                     <img width="380" height="260" src="<?php echo $post_image; ?>"
                        alt="<?php echo basename($post_image); ?>">
                  </a>
               </div>
               <div class="card-content">
                  <div class="inner-content">
                     <div class="text-link">
                        <a href="<?php echo $post_permalink; ?>"><?php echo $post_title; ?></a>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
               ?>
         </div>
      </div>
   </div>
   <?php
   endwhile; // End of the loop.
   wp_reset_query();
   ?>
   <div class="conversation">
      <div class="container">
         <div class="conversation-section">
            <div class="qualification-content">
               <?php echo do_shortcode('[ratemypost]'); ?>
            </div>
            <div class="conversation-content">
               <?php
               if (comments_open() || get_comments_number()) :
                  comments_template();
               endif;
               ?>
            </div>
         </div>
      </div>
   </div>
   <?php dynamic_sidebar('custom-recipe-section-widget'); ?>
</main>
<?php
get_footer();
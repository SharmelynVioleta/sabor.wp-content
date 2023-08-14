<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sabor
 */

get_header();

$theme_url = get_template_directory_uri();
$queried_object = get_queried_object();
$author_id = "user_" . $queried_object->ID;

// Retrieve author social data
$author_social_data = get_field('author_social_icons', $author_id);

// Retrieve author profile image
$author_image = get_field('author_profile', $author_id);
$author_image_url = !empty($author_image) ? $author_image['url'] : $theme_url . '/assets/images/profile-thumbnail.png';

// Retrieve author name and description
$author_name = get_the_author();
$author_description = nl2br(get_the_author_meta('description'));
?>

<main id="primary" class="site-main">
   <header class="page-header" style="text-align:left">
      <!-- Display author profile image -->
      <div class='author-detail'>
         <div class="container">
            <div class="author-image">
               <img width='380' height='260' src='<?php echo $author_image_url; ?>' alt='<?php echo basename($author_image_url); ?>'>
            </div>
            <div class='author-section'>
               <div class="author-name">
                  <?php if (!empty($author_name)) : ?>
                     <!-- Display author name -->
                     <h1><?php echo $author_name; ?></h1>
                  <?php endif; ?>
               </div>
               <ul>
                  <?php if (!empty($author_social_data) && is_array($author_social_data)) : ?>
                     <?php foreach ($author_social_data as $author_single) : ?>
                        <li>
                           <a href="<?php echo $author_single['icon_url']; ?>"><img width='16' height='16' src="<?php echo $author_single['social_icon_image']['url']; ?>" alt="<?php echo  $author_single['social_icon_image']['alt']; ?>"></a>
                        </li>
                     <?php endforeach; ?>
                  <?php endif; ?>
               </ul>
               <div class="author-description">
                  <?php if (!empty($author_description)) : ?>
                     <!-- Display author description -->
                     <p><?php echo $author_description; ?></p>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </header><!-- .page-header -->

   <?php if (have_posts()) : ?>

      <div class='blog-listing blogs author-archive'>
         <div class="card-section col-4">
            <div class="container">
               <h5><?php _e('Recetas y Artículos', 'sabor'); ?></h5>
               <div class="cards">
               <?php
               /* Start the Loop */
               while (have_posts()) :
                  the_post();

                  /*
                * Include the Post-Type-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                */
                  get_template_part('template-parts/content', get_post_type());


               endwhile;
               ?>
            </div>
            <div class="sabor_pagination_link">
               <?php
               $pagination_format = 'page/%#%';
               the_posts_pagination(array(
                  'mid_size'           => 2,
                  'prev_text'          => '',
                  'next_text'          => '',
                  'format' => $pagination_format,
               ));
               ?>
            </div>
         </div>
      </div>
   <?php
   else :

      get_template_part('template-parts/content', 'none');

   endif;

   ?>
</main><!-- #main -->

<?php
get_footer();

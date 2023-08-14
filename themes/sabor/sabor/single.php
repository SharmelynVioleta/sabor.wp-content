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
$singel_video = get_field('video');
$author_id = $post->post_author;
$author_obj = get_user_by('id', $author_id);
$biography = get_the_author_meta('description', $author_id);
$author_social_data = get_field('author_social_icons', $author_id);
$author_social_icons_list = get_field('author_social_icons', 'user_'. $author_id );
?>

<main id="primary" class="site-main">
   <div class="blog-page-content">
      <div class="container">
         <div class="blog-heading">
            <h6>
               <?php
                  // Get the recipe categories and display them as breadcrumbs
                  $recipe_list = get_the_terms($post->ID, 'category', array('fields' => 'names'));
                  $terms = get_terms('category');
                  if (!empty($recipe_list)) {
                     foreach ($recipe_list as $recipe_name) {
                        echo '<a href="' . get_term_link($recipe_name) . '">' . $recipe_name->name . '</a>';
                     }
                  }
               ?>
            </h6>
            <h1><?php the_title(); ?></h1>
            <?php the_excerpt(); ?>
            <?php
               $author_profile = get_field('author_profile',  'user_'. $author_id );
               if (!empty($author_profile['url'])) {
                  $placeholder_image = $author_profile['url'];
               }else{
                  $placeholder_image = $theme_url . '/assets/images/post-thumnail.jpg';
               }
            ?>
            <img width="37" height="37" src="<?php echo $placeholder_image; ?>" alt="chef-image">
            <p><?php  echo $author_obj->display_name;?></p>
         </div>
         <div class="blog-image">
            <?php
               if (!empty($singel_video)) {
                  echo $singel_video;
               }elseif (has_post_thumbnail()) {
                   echo the_post_thumbnail('full');
               }
            ?>
         </div>
         <div class="blog-content">
            <div class="top-content blog-inner-content">
               <?php the_content(); ?>
            </div>
            <div class="testimonial">
               <div class="image">
                  <?php
                     $author_profile = get_field('author_profile',  'user_'. $author_id );
                     if (!empty($author_profile['url'])) {
                        $placeholder_image = $author_profile['url'];
                     }else{
                        $placeholder_image = $theme_url . '/assets/images/post-thumnail.jpg';
                     }
                  ?>
                  <img width="37" height="37" src="<?php echo $placeholder_image; ?>" alt="chef-image">
               </div>
               <div class="content">
                  <h5><?php  echo $author_obj->display_name;?></h5>
                  <p><?php echo $biography; ?></p>
                  <ul>
                     <?php
                     if(!empty($author_social_icons_list)):
                     foreach($author_social_icons_list as $author_single): ?>
                     <li>
                        <a href="<?php echo $author_single['icon_url']; ?>">
                           <img width='16' height='16' src="<?php echo $author_single['social_icon_image']['url']; ?>" alt="<?php echo  $author_single['social_icon_image']['alt']; ?>"></a>
                     </li>
                     <?php endforeach;
                     endif; ?>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="card-section col-3 recommend-section">
      <div class="container">
         <h2><?php _e('Te recomendamos','sabor')?></h2>
         <div class="cards">
            <?php
            $recipe_cat = get_the_terms($post->ID, 'category', array('fields' => 'names'));
            $args = array(
               'post_type' => 'post',
               'status' => 'publish',
               'posts_per_page' => 4,
               'order' => 'DESC',
               $taxonomy_arg = array(
                  array(
                     'taxonomy' => 'category',
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
            wp_reset_postdata();
            ?>
         </div>
      </div>
   </div>

   <div class="conversation">
      <div class="container">
         <div class="conversation-section">
            <div class="qualification-content">
               <?php echo do_shortcode('[ratemypost]');?>
            </div>
            <div class="conversation-content">
               <div class="conversation-content-top">
                  <?php
                     if ( comments_open() || get_comments_number() ) :
                     comments_template();
                     endif;
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php dynamic_sidebar( 'custom-recipe-section-widget' ); ?>
</main><!-- #main -->
<?php
// get_sidebar();
get_footer();
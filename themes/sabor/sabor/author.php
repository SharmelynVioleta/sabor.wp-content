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
               <img width='380' height='260' src='<?php echo $author_image_url; ?>'
                  alt='<?php echo basename($author_image_url); ?>'>
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
                     <?php foreach($author_social_data as $author_single): ?>
                        <li>
                           <a href="<?php echo $author_single['icon_url']; ?>"><img width='16' height='16'
                              src="<?php echo $author_single['social_icon_image']['url']; ?>" alt="<?php echo  $author_single['social_icon_image']['alt']; ?>"></a>
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
      <div class='blog-listing blogs author-archive'>
         <div class="card-section col-4">
            <div class="container">
               <h5><?php _e('Recetas y Artículos', 'sabor'); ?></h5>
               <div class="cards">
                  <?php
               $post_types = array('post', 'recipe');
               $author_ids = $queried_object->ID;

               $args = array(
                  'author__in'     => $author_ids,
                  'post_type'      =>array('post', 'recipe'),
                  'posts_per_page' => -1,
               );

                  $query = get_posts($args);
                  if (!empty($query)) {
                     foreach ($query as $post) {
                        ?>
                        <div class="card">
                           <div class="card-image">
                              <a href="<?php echo get_permalink($post->ID); ?>">
                              <?php
                              $news_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                 if (!empty($news_image)) {
                                       $news_image = $news_image;
                                 } else {
                                       $news_image = $theme_url . '/assets/images/post-thumnail.jpg';
                                 }
                              ?>
                              <img width='380' height='260' src='<?php echo $news_image; ?>' alt='<?php echo basename($news_image); ?>'></a>
                           </div>
                           <div class="card-content">
                              <div class="inner-content">
                                 <div class="text-link">
                                    <a href="<?php echo  get_permalink($post->ID); ?>"><?php the_title(); ?></a>
                                 </div>
                                 <?php
                                    $author_id = $post->post_author;
                                    $author_profile = get_field('author_profile', 'user_'. $author_id );?>

                                 <a href="<?php echo get_author_posts_url($author_id); ?>" class="chef-name">
                                    <?php if(!empty($author_profile['url'])) :?>
                                    <img width='30' height='30' src="<?php echo $author_profile['url'];?>" alt="chef-image">
                                    <?php endif; ?>
                                    <p><?php echo get_the_author(); ?></p>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <?php
                     }
                  }
                  wp_reset_postdata(); ?>
               </div>
            </div>
         </div>
      </div>

      <div class="sabor_pagination_link">
            <?php
            $pagination_format = 'page/%#%';
            the_posts_pagination(array(
               'mid_size'           => 2,
               'prev_text'          => '',
               'next_text'          => '',
               'format'=> $pagination_format,
               ));
            ?>
      </div>
</main><!-- #main -->

<?php
get_footer();
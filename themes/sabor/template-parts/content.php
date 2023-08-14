<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sabor
 */
$theme_url = get_template_directory_uri();
$detail_link = get_permalink();
?>

<div class="card">
   <div class="card-image">
      <a href="<?php echo $detail_link; ?>"><?php echo the_post_thumbnail( 'blog-thumb' ); ?></a>
   </div>
   <div class="card-content">
      <div class="inner-content">
         <div class="text-link">
            <a href="<?php echo $detail_link; ?>"><?php the_title(); ?></a>
         </div>
         <?php
            if(!is_author()):
         ?>
         <?php
            $author_id = $post->post_author;
            $author_profile = get_field('author_profile',  'user_'. $author_id );
            if (!empty($author_profile['url'])) {
               $placeholder_image = $author_profile['url'];
            }else{
               $placeholder_image = $theme_url . '/assets/images/placeholder_profile.png';
            }
         ?>
         <a href="<?php echo get_author_posts_url($author_id); ?>" class="chef-name">
            <img width="37" height="37" src="<?php echo $placeholder_image; ?>" alt="chef-image">
            <p><?php  echo get_the_author();?></p>
         </a>
         <?php endif; ?>
      </div>
   </div>
</div>
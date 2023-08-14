
<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sabor
 */
$theme_url = get_template_directory_uri();
$author_id = $post->post_author;
$news_image = get_the_post_thumbnail_url($post->ID, 'blog-thumb');
if (!empty($news_image)) {
   $news_image = $news_image;
} else {
   $news_image = $theme_url . '/assets/images/post-thumnail.jpg';
}
$author_profile = get_field('author_profile',  'user_'. $author_id );
if (!empty($author_profile['url'])) {
   $placeholder_image = $author_profile['url'];
}else{
   $placeholder_image = $theme_url . '/assets/images/placeholder_profile.png';
}
?>

<div class="card">
   <div class="card-image">
      <a href="<?php echo get_permalink(); ?>"><img width='380' height='260' src='<?php echo $news_image; ?>' alt='<?php the_title(); ?>'></a>
   </div>
   <div class="card-content">
      <?php
         $time = get_field('time', $post->ID);
         $part = get_field('part', $post->ID);
      ?>
      <?php
         if(!empty($time) & !empty($part)) :
            ?>
            <div class="process">
                  <?php
                     if( !empty( $time ) ):
                        ?>
                        <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/clock-logo-black.svg" alt="Clock Icon"><?php echo $time; ?></p>
                        <?php
                     endif;
                     if( !empty( $part ) ):
                        ?>
                        <p><img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/knife-logo-black.svg" alt="Knife Icon"><?php echo $part;?></p>
                        <?php
                     endif;
                  ?>
            </div>
            <?php
         endif;
      ?>
      <div class="inner-content">
         <div class="text-link">
            <a href="<?php echo get_permalink(); ?>">
               <?php the_title(); ?>
            </a>
         </div>
         <a href="<?php echo get_author_posts_url($author_id); ?>" class="chef-name">
            <img width='30' height='30' src="<?php echo $placeholder_image; ?>" alt="<?php echo get_the_author(); ?>">
            <p><?php echo get_the_author(); ?></p>
         </a>
      </div>
   </div>
</div>
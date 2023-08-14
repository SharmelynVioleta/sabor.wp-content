<?php
/**
 * Block Name: Blog
 *
 * This is the template that displays the blog section.
 */

$id = 'blog-section' . $block['id'];
$theme_url = get_template_directory_uri();
$blog_title = get_field('blog_title');

?>

<div class="blog-section">
    <div class="container">
        <h5><?php echo $blog_title; ?></h5>
        <div class="cards">
            <?php
            $args = array(
                'post_type' => 'post',
                'status' => 'publish',
                'posts_per_page' => 4,
                'order' => 'DESC',
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

            <div class="card-left">
                <div class="card">
                    <div class="card-image">
                        <a href="<?php echo $first_post_permalink; ?>">
                            <img width="380" height="260" src="<?php echo $first_post_image; ?>" alt="<?php echo basename($first_post_image); ?>">
                        </a>
                    </div>
                    <div class="card-content">
                        <a href="<?php echo $first_post_permalink; ?>">
                            <h4><?php echo $first_post->post_title; ?></h4>
                        </a>
                        <p><?php echo $first_post_excerpt; ?></p>
                    </div>
                </div>
            </div>

            <div class="card-right">
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
                                <img width="380" height="260" src="<?php echo $post_image; ?>" alt="<?php echo basename($post_image); ?>">
                            </a>
                        </div>
                        <div class="card-content">
                            <div class="text-link">
                                <a href="<?php echo $post_permalink; ?>"><?php echo $post_title; ?></a>
                            </div>
                            <a href="<?php echo $post_permalink; ?>"><?php _e('Leer todo', 'sabor'); ?></a>
                        </div>
                    </div>
                    <?php
                  }
                ?>
            </div>
        </div>
    </div>
</div>
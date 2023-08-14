<?php
/**
 * Block Name: News
 *
 * This is the template that displays the news section.
 */

// Create an ID attribute for specific styling
$id = 'news-section' . $block['id'];

// Get the theme URL
$theme_url = get_template_directory_uri();

// Get the recipe title
$recipe_title = get_field('title');

// Get the selected categories
$categories = get_field('category');

// Get the number of posts to display
$numer_of_post = get_field('post_count');
?>

<div class="card-section col-<?php echo $numer_of_post; ?>">
    <div class="container">
        <h2><?php echo $recipe_title; ?></h2>
        <div class="cards">
            <?php
            // Query arguments for retrieving posts
            $args = array(
                'post_type' => 'recipe',
                'posts_per_page' => $numer_of_post,
            );

            // If categories are selected, add taxonomy query
            if (!empty($categories)) {
                $taxonomy_arg = array(
                    array(
                        'taxonomy' => 'recipe-categories',
                        'field'    => 'slug',
                        'terms'    => $categories->slug,
                    ),
                );
                $args['tax_query'] = $taxonomy_arg;
            }

            // Retrieve the news posts
            $news_list = get_posts($args);

            // Loop through each news post
            foreach ($news_list as $news) :
                $author_id = $news->post_author;
                ?>
                <div class="card">
                    <?php
                    // Get the news image
                    $news_image = get_the_post_thumbnail_url($news->ID, 'blog-thumb');
                    if (!empty($news_image)) {
                        $news_image = $news_image;
                    } else {
                        $news_image = $theme_url . '/assets/images/post-thumnail.jpg';
                    }
                    ?>
                    <?php $permalink = get_permalink($news->ID); ?>
                    <a href="<?php echo $permalink; ?>" class="card-image">
                        <img width='380' height='260' src='<?php echo $news_image; ?>' alt='<?php echo basename($news_image); ?>'>
                    </a>
                    <div class="sticky-btn">
                        <?php
                        // Get the news categories
                        $news_list = get_the_terms($news->ID, 'recipe-categories', array('fields' => 'names'));
                        $terms = get_terms('recipe-categories');
                        if (!empty($news_list)) {
                            foreach ($news_list as $news_name) {
                                echo '<a href="' . get_term_link($news_name) . '">' . $news_name->name . '</a>';
                            }
                        }
                        ?>
                    </div>
                    <div class="card-content">
                        <?php
                            $time = get_field('time', $news->ID);
                            $part = get_field('part', $news->ID);
                        ?>
                        <div class="process">
                            <?php if (!empty($time)) : ?>
                                <p>
                                    <img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/clock-logo-black.svg" alt="clock-logo-black">
                                    <?php echo $time; ?>
                                </p>
                            <?php endif; ?>
                            <?php if (!empty($part)) : ?>
                                <p>
                                    <img width='17' height='17' src="<?php echo $theme_url ?>/assets/images/knife-logo-black.svg" alt="knife-logo-black">
                                    <?php echo $part; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="inner-content">
                            <h3 class="text-link">
                                <a href="<?php echo $permalink; ?>">
                                    <?php echo $news->post_title; ?>
                                </a>
                            </h3>
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
                                    $post_author_id = $news->post_author;
                                    $author_obj = get_user_by('id', $post_author_id);
                                    echo $author_obj->display_name;
                                    ?>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
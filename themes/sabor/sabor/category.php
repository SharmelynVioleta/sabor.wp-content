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
?>
<main id="primary" class="site-main">
    <header class="pages-header">
      <h1 class="page-title"><?php single_cat_title(); ?></h1>
      <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
   </header>
   <?php if ( have_posts() ) : ?>
   <div class="card-section">
      <div class="container">
         <div class="cards">
            <?php
        /* Start the Loop */
        while ( have_posts() ) :
            the_post();

            /*
                * Include the Post-Type-specific template for the content.
                * If you want to override this in a child theme, then include a file
                * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                */
            get_template_part( 'template-parts/content', get_post_type() );


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
              'format'=> $pagination_format,
            ));
            ?>
         </div>
      </div>
   </div>
   <?php
    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;

    ?>
</main><!-- #main -->

<?php
get_footer();
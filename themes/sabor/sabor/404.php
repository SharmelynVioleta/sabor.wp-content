<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sabor
 */

get_header();
?>

<main id="primary" class="site-main">

   <div class="page-not-found">
      <div class="page-not-found-content">
      <h6><?php _e("Error Page","sabor"); ?></h6>
         <h1><?php _e("404","sabor"); ?></h1>
         <h3><?php _e("Something Went Wrong","sabor"); ?></h3>
         <p><?php _e("We can’t find the page you are looking for. You can check out our Help Center
or head back to the Homepage.","sabor"); ?></p>
         <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e("Back Home","sabor"); ?></a>
      </div>
   </div>

</main><!-- #main -->

<?php
get_footer();
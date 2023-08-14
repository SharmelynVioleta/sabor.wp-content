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
      <h6><?php _e("Error","sabor"); ?></h6>
         <h1><?php _e("404","sabor"); ?></h1>
         <h3><?php _e("Algo salió mal","sabor"); ?></h3>
         <p><?php _e("No podemos encontrar la página que está buscando. Puedes consultar nuestro Centro de ayuda o regresar a la página de inicio.","sabor"); ?></p>
         <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e("Ir al inicio","sabor"); ?></a>
      </div>
   </div>

</main><!-- #main -->

<?php
get_footer();
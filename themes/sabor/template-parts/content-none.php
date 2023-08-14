<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sabor
 */

?>

<section class="no-results not-found">

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<h3>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( '¿Lista para publicar tu primer post?<a href="%1$s">Comience aquí</a>.', 'sabor' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</h3>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<h3><?php esc_html_e( 'Lo sentimos, pero nada coincide con sus términos de búsqueda. Vuelva a intentarlo con algunas palabras clave diferentes.', 'sabor' ); ?></h3>
			<?php
			get_search_form();

		else :
			?>

			<h3><?php esc_html_e( 'Parece que no podemos encontrar lo que estás buscando. Inténtalo nuevamente.', 'sabor' ); ?></h3>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sabor
 */
$description_section = get_field('underline_description', 'option');
?>
	<footer id="colophon" class="site-footer">
		<?php dynamic_sidebar( 'footer-newsletter-widget' ); ?>
		<div class="container">
			<div class="main-footer">
				<?php dynamic_sidebar( 'custom-sabor-widget' ); ?>
				<div class="column">
					<?php dynamic_sidebar( 'custom-second-widget' ); ?>
				</div>
				<div class="column">
					<?php dynamic_sidebar( 'custom-third-widget' ); ?>
				</div>
				<div class="column">
					<?php dynamic_sidebar( 'custom-fourth-widget' ); ?>
				</div>
				<div class="column">
					<?php dynamic_sidebar( 'custom-fifth-widget' ); ?>
				</div>
			</div>
			<div class="footer-copy">
				<p><?php echo $description_section; ?></p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

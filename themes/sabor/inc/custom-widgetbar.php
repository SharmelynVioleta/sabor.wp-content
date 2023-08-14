<?php
function wpb_widgets_init() {

 register_sidebar( array(
    'name'          => 'Footer First Column',
    'id'            => 'custom-sabor-widget',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Footer Second Column Menu',
    'id'            => 'custom-second-widget',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Footer Third Column Menu',
    'id'            => 'custom-third-widget',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Footer Fourth Column Menu',
    'id'            => 'custom-fourth-widget',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Footer Fifth Column Menu',
    'id'            => 'custom-fifth-widget',
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Footer NewsLetter',
    'id'            => 'footer-newsletter-widget',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
    ) );
register_sidebar( array(
    'name'          => 'Latest recipes',
    'id'            => 'custom-recipe-section-widget',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Latest recipes image',
    'id'            => 'custom-recipe-iamge-section-widget',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Recipe Before Content Advertisement',
    'id'            => 'recipe_before_advertisement_widget',
    'before_widget' =>  '<div id="%1$s" class="widget advertisement_widget recipe_before_advertisement_widget  %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Recipe After Content Advertisement',
    'id'            => 'recipe_after_advertisement_widget',
    'before_widget' => '<div id="%1$s" class="widget advertisement_widget recipe_after_advertisement_widget  %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Recipe Sidebar Advertisement',
    'id'            => 'recipe_sidebar_advertisement_widget',
    'before_widget' => '<div id="%1$s" class="widget advertisement_widget recipe_sidebar_advertisement_widget  %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Blog Before Content Advertisement',
    'id'            => 'blog_before_content_advertisement',
    'before_widget' => '<div id="%1$s" class="widget advertisement_widget blog_before_content_advertisement  %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
register_sidebar( array(
    'name'          => 'Blog After Content Advertisement',
    'id'            => 'blog_after_content_advertisement',
    'before_widget' => '<div id="%1$s" class="widget advertisement_widget blog_after_content_advertisement  %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
) );
}
add_action( 'widgets_init', 'wpb_widgets_init' );


/**
 * Include Footer First Section
 */
require_once get_template_directory() . '/inc/custom-widget/footer-first-section.php';

/**
 * Include Footer Mail Section
 */
require_once get_template_directory() . '/inc/custom-widget/footer-newsletter.php';

/**
 * Include Footer Mail Section
 */
require_once get_template_directory() . '/inc/custom-widget/recipe-widget.php';
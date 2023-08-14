<?php
function wpb_widgets_init() {

 register_sidebar( array(
     'name'          => 'Sabor Sidebar',
     'id'            => 'custom-sabor-widget',
     'before_widget' => '',
     'after_widget'  => '</div>',
     'before_title'  => '<h2>',
     'after_title'   => '</h2>',
 ) );
 register_sidebar( array(
    'name'          => 'Sabor Sidebar',
    'id'            => 'custom-first-column-widget',
    'before_widget' => '',
    'after_widget'  => '</div>',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
) );
register_sidebar( array(
    'name'          => 'Sabor Sidebar',
    'id'            => 'custom-subscriber-widget',
    'before_widget' => '',
    'after_widget'  => '</div>',
    'before_title'  => '',
    'after_title'   => '',
) );
}

add_action( 'widgets_init', 'wpb_widgets_init' );

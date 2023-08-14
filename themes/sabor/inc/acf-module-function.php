<?php

function my_acf_block_render_callback( $block ) {

// convert name ("acf/testimonial") into path friendly slug ("foundation help")
$slug = str_replace('acf/', '', $block['name']);

// include a template part from within the "template-parts/block" folder
if( file_exists( get_theme_file_path("/template-parts/block/content-$slug.php") ) ) {
    include( get_theme_file_path("/template-parts/block/content-$slug.php") );
}
}
?>
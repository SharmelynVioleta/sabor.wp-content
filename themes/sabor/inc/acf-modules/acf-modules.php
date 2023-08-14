<?php
// Create custom recipe module
function register_acf_block_types() {
	// Register a Recipe Block..
	acf_register_block_type(array(
		'name'              => 'recipe-section',
		'title'             => __('Recipe Section', 'sabor'),
		'description'       => __('A custom Recipe block.'),
		'render_template'   => 'template-parts/block/recipe-section.php',
		'category'          => 'formatting',
		'icon'              => 'admin-comments',
		'keywords'          => array( 'Recipe', 'Block' ),
	));
	// Register a news Block..
	acf_register_block_type(array(
		'name'              => 'news-section',
		'title'             => __('News Section', 'sabor'),
		'description'       => __('A custom News block.'),
		'render_template'   => 'template-parts/block/news-section.php',
		'category'          => 'formatting',
		'icon'              => 'admin-comments',
		'keywords'          => array( 'News', 'Block' ),
	));
	// Register a blog Block..
	acf_register_block_type(array(
		'name'              => 'blog-section',
		'title'             => __('Blog', 'sabor'),
		'description'       => __('A custom Blog block.'),
		'render_template'   => 'template-parts/block/blog-section.php',
		'category'          => 'formatting',
		'icon'              => 'admin-comments',
		'keywords'          => array( 'Blog', 'Block' ),
	));
	// Register a Recipe Category Block..
	acf_register_block_type(array(
		'name'              => 'recipe-category-section',
		'title'             => __('Recipe Categories', 'sabor'),
		'description'       => __('Recipe categories listing block.'),
		'render_template'   => 'template-parts/block/recipe-category-section.php',
		'category'          => 'formatting',
		'icon'              => 'admin-comments',
		'keywords'          => array( 'Recipe Category', 'Recipe', 'Category' ),
	));
}
// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}
?>
<?php
/**
 * sabor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sabor
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sabor_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sabor, use a find and replace
		* to change 'sabor' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sabor', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header_menu' => esc_html__( 'Header Menu', 'sabor' ),
			'mobile_menu' => esc_html__( 'Mobile Menu', 'sabor' ),
			'footer_menu' => esc_html__( 'Footer Menu', 'sabor' ),
			'third_column_menu'=> esc_html__('Third Column Menu','savor'),
		)
	);
	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sabor_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sabor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sabor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sabor_content_width', 640 );
}
add_action( 'after_setup_theme', 'sabor_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function sabor_scripts() {
	$site_logo = get_field('site_logo','option');
	$logo_url = $site_logo['url'];
	$logo_name = $site_logo['name'];
	$social_icon_and_link = get_field('social_icon_and_links', 'option');
	$social_icon_and_link_list = '';
	$social_icon_and_link_list .='<ul>';
	foreach( $social_icon_and_link as $social_single) :
		$social_icon_and_link_list .=
		'<li>
			  <a href="'.$social_single['icon_url'].'" target="'.$social_single['icon_url'].'">
			  	<img width="33" height="33" src="'.$social_single['social_icon']['url'].'" alt="'.$social_single['social_icon']['alt'].'">
			  </a>
		</li>';
	endforeach;
	$social_icon_and_link_list .='</ul>';
	$theme_version = time();
	wp_enqueue_style( 'sabor-style', get_stylesheet_uri(), array(), $theme_version  );
	wp_style_add_data( 'sabor-style', 'rtl', 'replace' );

	wp_enqueue_style( 'mmenu-css', get_template_directory_uri() .'/assets/css/mmenu.css', false );
	wp_enqueue_style( 'mburger-css', get_template_directory_uri() . '/assets/css/mburger.css', false );
	wp_enqueue_style( 'slick-css', get_template_directory_uri() . '/assets/css/slick.css', false );

	wp_enqueue_script( 'mmenu-js', get_template_directory_uri() . '/assets/js/mmenu.js', array('jquery'), true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), true );
	wp_enqueue_script( 'sabor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $theme_version, true );
	wp_localize_script( 'custom-js', 'custom',
	array(
		'site_url' => home_url('/'),
		'logo_url' => $logo_url,
		'logo_name' => $logo_name,
		'social_icon_url' => $social_icon_and_link_list,
	));
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'sabor_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/**
 *  Footer related files.
 */
require_once get_template_directory() . '/inc/custom-widgetbar.php';
/**
 * menu related function file..
 */
require get_template_directory() . '/inc/option-page.php';
/**
 * svg image enable function
 */
require get_template_directory() . '/inc/enable-svg-image-function.php';
/**
 * post type function
 */
require get_template_directory() . '/inc/custom-post-type.php';
/***
 * Register ACF Module File
 */
require get_template_directory() . '/inc/acf-modules/acf-modules.php';
/***
 * Register ACF Module Function File
 */
require get_template_directory() . '/inc/acf-module-function.php';
/***
 * Register Custom Taxonomy Function File
 */
require get_template_directory() . '/inc/custom-taxonomy.php';
/**
 *For the thumnail size
 */
add_action( 'after_setup_theme', 'sabor_theme_thumbnail' );

/***
 * Register sub recipe file
 */
require get_template_directory() . '/inc/shortocde/recipe.php';

/***
 * Register latest recipe file
 */
require get_template_directory() . '/inc/shortocde/latest-recipe.php';

function sabor_theme_thumbnail() {
	add_image_size( 'blog-thumb', 385, 267, true );
}

function sabor_modify_rating_strings( $stringsArray ) {
	// Define the image URL for the rate result
	$image = get_template_directory_uri() . '/assets/images/star-clicked.svg';

	// Modify or add elements in the $stringsArray
	$stringsArray['rateTitle'] = 'Calificación';
	$stringsArray['rateSubtitle'] = 'Califica nuestro contenido';
	$stringsArray['rateResult2'] = 'Votos';
	$stringsArray['noRating'] = 'Aun no tiene calificación';
	$stringsArray['rateResult'] = '<img src="' . $image . '">';
	$stringsArray['afterVote'] = '';
	// Return the modified $stringsArray
	return $stringsArray;
}

// Add a filter to the 'rmp_custom_strings' hook
add_filter( 'rmp_custom_strings', 'sabor_modify_rating_strings' );

/***
 * Register login page design
 */
require get_template_directory() . '/inc/custom-login.php';

/* Custom Search Queries */
function include_custom_post_types_in_search($query) {
    if (is_admin() || !$query->is_main_query())
        return;

    if ($query->is_search) {
        $query->set('post_type', array('post','recipe'));
    }
}
add_action('pre_get_posts', 'include_custom_post_types_in_search');
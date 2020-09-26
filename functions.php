<?php
/**
 * underscores functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package underscores
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'underscores_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function underscores_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on underscores, use a find and replace
		 * to change 'underscores' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'underscores', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'underscores' ),
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
				'underscores_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'underscores_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function underscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'underscores_content_width', 640 );
}
add_action( 'after_setup_theme', 'underscores_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function underscores_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'underscores' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'underscores' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'underscores_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function underscores_scripts() {
	wp_enqueue_style( 'underscores-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css', array(), _S_VERSION, false );
	wp_enqueue_style( 'style-style', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION, false );
	wp_enqueue_style( 'bootstrapcdn-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css', array(), _S_VERSION, false );
	wp_enqueue_style( 'fonts-style', 'https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin', array(), _S_VERSION, false );
  wp_enqueue_style( 'twabc-1', get_template_directory_uri() . '/css/twabc-advanced.css', array(), _S_VERSION, false );
	wp_enqueue_style( 'twabc-3', get_template_directory_uri() . '/css/twabc-advanced-3.css', array(), _S_VERSION, false );
	wp_enqueue_style( 'twabc-4', get_template_directory_uri() . '/css/twabc-advanced-4.css', array(), _S_VERSION, false );
wp_style_add_data( 'underscores-style', 'rtl', 'replace' );
  
	wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/jquery.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'script-script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'googleapis-script', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), _S_VERSION, false );
	wp_enqueue_script( 'bootstrapcdn-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js', array(), _S_VERSION, false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'underscores_scripts' );

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


/* ************************************* */ 
define( 'TWABC_PLUGIN', __FILE__ );
define( 'TWABC_PLUGIN_BASENAME', plugin_basename( TWABC_PLUGIN ) );
// Advanced Bootstrap Carousel custom post type
add_action( 'init', 'twabc_post_type');
function twabc_post_type() {

	$labels = array(
		'name'                => 'Advanced Bootstrap Carousel',
		'singular_name'       => 'Advanced Bootstrap Carousel',
		'menu_name'           => 'ABC Slider',
		'parent_item_colon'   => 'Parent:',
		'all_items'           => 'All Carousels',
		'view_item'           => 'View Carousel',
		'add_new_item'        => 'Add New Carousel',
		'add_new'             => 'Add New Carousel',
		'edit_item'           => 'Edit Carousel',
		'update_item'         => 'Update Carousel',
		'search_items'        => 'Search Carousels',
		'not_found'           => 'Carousel Not found',
		'not_found_in_trash'  => 'Carousel Not found in Trash',
	);
	$args = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'exclude_from_search' 	=> true,
		'publicly_queryable' 	=> false,
		'show_ui' 				=> true, 
		'show_in_menu' 			=> true, 
		'query_var' 			=> true,
		'rewrite' 				=> true,
		'capability_type' 		=> 'page',
		'has_archive' 			=> true, 
		'hierarchical'			=> false,
		'menu_position' 		=> 20,
        'menu_icon'           	=> 'dashicons-slides',
		'supports' 				=> array('title', 'excerpt', 'thumbnail', 'page-attributes')
	);
	register_post_type( 'twabc', $args );
}
// Create a taxonomy for the carousel post type
function twabc_taxonomies () {
	$args = array('hierarchical' => true);
	register_taxonomy( 'twabc_category', 'twabc', $args );
}

add_action( 'init', 'twabc_taxonomies', 0 );

function twabc_addImageSupport() {
	$supportedTypes = get_theme_support( 'post-thumbnails' );
	if( $supportedTypes === false ) {
		add_theme_support( 'post-thumbnails', array( 'twabc' ) );	  
		add_image_size('featured_preview', 100, 55, true);
	} elseif( is_array( $supportedTypes ) ) {
		$supportedTypes[0][] = 'twabc';
		add_theme_support( 'post-thumbnails', $supportedTypes[0] );
		add_image_size('featured_preview', 100, 55, true);
	}
}
add_action( 'after_setup_theme', 'twabc_addImageSupport');


require_once('carousel/twabc-admin-view.php');
require_once('carousel/twabc-front-view.php');
require_once('carousel/twabc-admin-settings.php');
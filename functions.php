<?php
/**
 * Whikser&Woof functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Whikser&Woof
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
function whikserwoof_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Whikser&Woof, use a find and replace
		* to change 'whikserwoof' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'whikserwoof', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'whikserwoof' ),
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
			'whikserwoof_custom_background_args',
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
add_action( 'after_setup_theme', 'whikserwoof_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function whikserwoof_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'whikserwoof_content_width', 640 );
}
add_action( 'after_setup_theme', 'whikserwoof_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function whikserwoof_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'whikserwoof' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'whikserwoof' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'whikserwoof_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function whikserwoof_scripts() {
	wp_enqueue_style( 'whikserwoof-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
	wp_style_add_data( 'whikserwoof-style', 'rtl', 'replace' );

	wp_enqueue_script( 'whikserwoof-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'gsap-core', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'gsap-scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array(), _S_VERSION, true ); 
	wp_enqueue_script( 'gsap-scrollTo', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollToPlugin.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'whikserwoof-custom', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'whikserwoof_scripts' );

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

require get_template_directory() . '/inc/site-settings.php';
require get_template_directory() . '/inc/custom-post-types.php';

// Register custom post type
function register_outstanding_vet_care_post_type() {
    $labels = array(
        'name' => 'Outstanding Vet Care',
        'singular_name' => 'Outstanding Vet Care',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Outstanding Vet Care',
        'edit_item' => 'Edit Outstanding Vet Care',
        'new_item' => 'New Outstanding Vet Care',
        'view_item' => 'View Outstanding Vet Care',
        'search_items' => 'Search Outstanding Vet Care',
        'not_found' => 'No outstanding vet care found',
        'not_found_in_trash' => 'No outstanding vet care found in trash',
        'parent_item_colon' => '',
        'menu_name' => 'Outstanding Vet Care'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'outstanding-vet-care'),
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-heart',
        'supports' => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('outstanding_vet_care', $args);
}
add_action('init', 'register_outstanding_vet_care_post_type');


function register_my_menu() {
    register_nav_menu('primary', 'Primary Menu');
}
add_action('after_setup_theme', 'register_my_menu');

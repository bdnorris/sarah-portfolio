<?php
/**
 * _sarahc functions and definitions
 *
 * @package _sarahc
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'sarahc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sarahc_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _sarahc, use a find and replace
	 * to change 'sarahc' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'sarahc', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'sarahc' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sarahc_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // sarahc_setup
add_action( 'after_setup_theme', 'sarahc_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function sarahc_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'sarahc' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'sarahc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sarahc_scripts() {
	wp_enqueue_style( 'sarahc-style', get_stylesheet_uri() );

	wp_register_style( 'foundation', get_template_directory_uri() . '/css/foundation.css', array(), '5', 'all' );
  wp_enqueue_style( 'foundation' );

  wp_register_style( 'custom', get_template_directory_uri() . '/css/custom.css', array(), '20140122', 'all' );
  wp_enqueue_style( 'custom' );

	wp_enqueue_script( 'sarahc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '2014', false );

	//wp_enqueue_script( 'foundationjs', get_template_directory_uri() . '/js/foundation.min.js', array(), '5', true );

	wp_enqueue_script( 'vue', get_template_directory_uri() . '/js/vendor/vue.js', array(), '2.2', true );

	wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/custom.js', array(), '5', true );

	wp_enqueue_script( 'modaal', get_template_directory_uri() . '/js/modaal.min.js', array(), '0.3.1', true );

	//wp_enqueue_script( 'adaptiveColor', get_template_directory_uri() . '/js/jquery.adaptive-backgrounds.min.js', array(), '1', true );

	//wp_enqueue_script( 'sarahc-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sarahc_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

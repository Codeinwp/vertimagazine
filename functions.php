<?php
/**
 * vertiMagazine theme functions and definitions
 *
 * @package vertiMagazine theme
 */

require_once('theme-options.php');
 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'vertiMagazine_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
 $vertimagazine_options = array(
	
				"copyright"=>"",
				"email"=>"",
				"phone"=>"",
				"logo_sus"=>"",
				"logo_jos"=>"",
				"facebook"=>"",
				"twitter"=>"",
				"youtube"=>""
 );
function vertiMagazine_theme_setup() {
	global $vertimagazine_options;
	$tmp = get_option("vertimagazine_options");
	$vertimagazine_options['copyright'] = isset($tmp['copyright']) ? $tmp['copyright'] : '';
	$vertimagazine_options['email'] = isset($tmp['email']) ? $tmp['email'] : '';
	$vertimagazine_options['phone'] = isset($tmp['phone']) ? $tmp['phone'] : '';
	$vertimagazine_options['logo_sus'] = isset($tmp['logo_sus']) ? $tmp['logo_sus'] : '';
	$vertimagazine_options['logo_jos'] = isset($tmp['logo_jos']) ? $tmp['logo_jos'] : '';
	$vertimagazine_options['facebook'] = isset($tmp['facebook']) ? $tmp['facebook'] : '';
	$vertimagazine_options['twitter'] = isset($tmp['twitter']) ? $tmp['twitter'] : '';
	$vertimagazine_options['youtube'] = isset($tmp['youtube']) ? $tmp['youtube'] : '';
	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Codeinwp theme, use a find and replace
	 * to change 'vertiMagazine_theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'vertiMagazine_theme', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'top_menu' => 'Top Menu',
		'header_menu' => 'Header Menu',
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	add_theme_support( 'post-thumbnails' );
}
endif; // vertiMagazine_theme_setup
add_action( 'after_setup_theme', 'vertiMagazine_theme_setup' );

add_filter('the_title', 'vertimagazine_title');
function vertimagazine_title($title) {
 if ($title == '') {
	return 'Untitled title';
 } else {
 return $title;
 }
 }

function vertiMagazine_theme_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => get_template_directory_uri() . '/images/bg.png',
	);
	
	$args = apply_filters( 'vertiMagazine_theme_custom_background_args', $args );
	
	global $wp_version;
	if ( version_compare( $wp_version, '3.4', '>=' ) ) 
		add_theme_support( 'custom-background' , $args); 
}
add_action( 'after_setup_theme', 'vertiMagazine_theme_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function vertiMagazine_theme_widgets_init() {
	
	if ( function_exists('register_sidebar') ) {
		
		register_sidebar( array(
			'name'          => __( 'Sidebar', 'vertiMagazine' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		) );
		
		
		register_sidebar(array(
			'name' => __( 'Footer One', 'vertiMagazine'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));
		
		register_sidebar(array(
			'name' => __( 'Footer Two', 'vertiMagazine'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));
	}
}
add_action( 'widgets_init', 'vertiMagazine_theme_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function vertiMagazine_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_template_directory_uri() .'/js/my-script.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}
 
function vertiMagazine_admin_styles() {
	wp_enqueue_style('thickbox');
} 
 
function vertiMagazine_theme_scripts() {

	wp_enqueue_style( 'Codeinwp theme-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'jqcycle', get_template_directory_uri() . '/js/jqcycle.min.js', array(), '20120206', true );

	wp_enqueue_script( 'Codeinwp theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
    wp_enqueue_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.js', array(), '20130716', true );
    
	wp_enqueue_script( 'customscript', get_template_directory_uri() . '/js/customscript.js', array("jquery","tinynav"), '20130716', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'Codeinwp theme-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	
	 wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '20120206', true );
	
}
add_action( 'wp_enqueue_scripts', 'vertiMagazine_theme_scripts' );


add_action('admin_enqueue_scripts', 'vertiMagazine_admin_scripts');
add_action('admin_enqueue_scripts', 'vertiMagazine_admin_styles');


function vertiMagazine_scripts_styles() {
   
	wp_register_style( 'style', get_template_directory_uri() . '/style.css', false, false, 'screen' );
    wp_enqueue_style( 'style' );
	
	wp_register_style( 'responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style( 'responsive' );
	
	wp_register_style( 'font', 'http://fonts.googleapis.com/css?family=Oswald:400,700,300');
    wp_enqueue_style( 'font' );
	
	
	
	wp_register_style( 'reset', get_template_directory_uri() . '/css/reset.css', false, false, 'screen' );
    wp_enqueue_style( 'reset' );
	
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', false, false, 'screen' );
    wp_enqueue_style( 'bootstrap' );
	
	wp_register_style( 'bootstrap-resp', get_template_directory_uri() . '/css/bootstrap-responsive.css', false, false, 'screen' );
    // wp_enqueue_style( 'bootstrap-resp' );
	
}
add_action('wp_enqueue_scripts', 'vertiMagazine_scripts_styles');

function vertiMagazine_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'vertiMagazine_theme_add_editor_styles' );


/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );



<?php
/**
 * vertiMagazine theme functions and definitions
 *
 * @package vertiMagazine theme
 */
 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );
require( get_template_directory() . '/admin/functions.php' );

if ( ! function_exists( 'vertiMagazine_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */

function vertiMagazine_theme_setup() {
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
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'vertiMagazine_theme_required_plugins' );
function vertiMagazine_theme_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository
		array(
			'name' 		=> 'WP Product Review',
			'slug' 		=> 'wp-product-review',
			'required' 	=> false,
		),
	

	);

	// Change this to your theme text domain, used for internationalising strings
	$theme_text_domain = 'vertiMagazine';

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'vertiMagazine',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

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
			'id'   => 'sidebar-footer-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2 class="widgettitle">',
			'after_title' => '</h2>',
		));
		
		register_sidebar(array(
			'name' => __( 'Footer Two', 'vertiMagazine'),
			'id' => 'sidebar-footer-2',
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



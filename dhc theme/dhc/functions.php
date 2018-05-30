<?php
/**
 * dhc functions and definitions
 *
 * @package dhc
 */
//remove_theme_mods();
define( 'dhc_DIR', trailingslashit( get_template_directory() )) ;
define( 'dhc_LINK', trailingslashit( get_template_directory_uri() ) );
define( 'dhc_icon', dhc_LINK.'images/controls/logo.jpg' );
if ( ! function_exists( 'dhc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function dhc_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on burger, use a find and replace
	 * to change 'dhc' to the name of your theme in all the template files
	 */
	remove_action( 'wp_head', 'rest_output_link_wp_head' );
	load_theme_textdomain( 'dhc', dhc_DIR . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_filter('upload_mimes', 'dhc_mime_types');

	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}	

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
	 * @link http://codhc.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );	
	add_image_size( 'dhc-recent-news-thumb', 106, 73, true );		
	add_image_size( 'dhc-portfolio-thumb', 370, 245, true );	
	add_image_size( 'dhc-blog', 820, 373, true );	
	add_image_size( 'dhc-blog-grid', 370, 262, true );	
	add_image_size( 'dhc-blog-single', 870, 500, true );	
	add_image_size( 'dhc-blog-listsmall', 370, 230, true );	
	add_image_size( 'dhc-case-single', 570, 570, true );	
	add_image_size( 'dhc-case-single2', 1170, 600, true );	
	add_image_size( 'dhc-case', 570, 422, true );	
	add_image_size( 'dhc-case2', 570, 416, true );	
	add_image_size( 'dhc-case3', 570, 401, true );	
	add_image_size( 'dhc-testimonial', 80, 80, true );	
	add_image_size( 'dhc-faq', 570, 340, true );	

	function dhc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	

	//Get thumbnail url
	function dhc_thumbnail_url($size){
	    global $post;
	    if( $size== '' ) {
	        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	        return esc_url($url);
	    } else {
	        $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size);
	        return esc_url($url[0]);
	    }
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'dhc' ),
		'footer' => esc_html__( 'Footer Menu', 'dhc' ),
		'bottom' => esc_html__( 'Bottom Menu', 'dhc' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codhc.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'gallery', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	add_theme_support( 'custom-background', $args );

	// Custom stylesheet to the TinyMCE visual editor
	function dhc_add_editor_styles() {
	    add_editor_style( 'css/editor-style.css' );
	}
	add_action( 'admin_init', 'dhc_add_editor_styles' );	
}
endif; // dhc_setup

add_action( 'after_setup_theme', 'dhc_setup' );

function dhc_wpfilesystem() {
	include_once (ABSPATH . '/wp-admin/includes/file.php');
	WP_Filesystem();
}

/**
 * Register widget area.
 *
 * @link http://codhc.wordpress.org/Function_Reference/register_sidebar
 */
function dhc_widgets_init() {	
	//Sidebar blog
    register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'dhc' ),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer1.', 'dhc' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

	register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'dhc' ),
        'id'            => 'page-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer1.', 'dhc' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    //Sidebar footer
	register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'dhc' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer1.', 'dhc' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'dhc' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer2.', 'dhc' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'dhc' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer3.', 'dhc' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 4', 'dhc' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer4.', 'dhc' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );    

    register_sidebar( array(
        'name'          => esc_html__( 'Footer custom menu', 'dhc' ),
        'id'            => 'fb-custom-menu',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer custom menu.', 'dhc' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );    
	
	//Register the front page widgets	
	register_widget( 'dhc_Flicker' );
	register_widget( 'dhc_Recent_Post' );
	register_widget( 'dhc_Categories' );
		
}
add_action( 'widgets_init', 'dhc_widgets_init' );

/**
 * Load the front page widgets.
 */
require dhc_DIR . "widgets/dhc_flickr.php";
require dhc_DIR . "widgets/dhc_recent_post.php";	
require dhc_DIR . "widgets/dhc_categories.php";	
require dhc_DIR . "widgets/dhc_testimonial.php";	

require dhc_DIR . "inc/options/options.php";
require dhc_DIR . "inc/options/options-definition.php";
require_once(dhc_DIR .'inc/options/controls/social_icons.php');
require_once(dhc_DIR .'inc/options/controls/number.php');
require_once(dhc_DIR .'inc/options/controls/dropdown-sidebars.php');
require_once(dhc_DIR .'inc/options/controls/box-control.php');
require_once(dhc_DIR .'inc/options/controls/typography.php');
require_once(dhc_DIR .'inc/options/controls/radio-images.php');

function dhc_get_style($style) {
	return str_replace('italic', 'i', $style);
}

function dhc_fonts_url() {
    $fonts_url = ''; 

    $body_font_name =  dhc_get_json('body_font_name');
    $headings_font_name = dhc_get_json('headings_font_name');
    $menu_font_name = dhc_get_json('menu_font_name');
    $font_families = array(); 

    if ( '' != $body_font_name ) {
        $font_families[] = $body_font_name['family'].':400,400i,700,700i'.dhc_get_style($body_font_name['style']);
    } else {
    	$font_families[] = 'Karla:400,400i,700,700i';
    }    

    if ( '' != $headings_font_name ) {
        $font_families[] = $headings_font_name['family'].':400,400i,700,700i,'.dhc_get_style($headings_font_name['style']);
    }

     else {
    	$font_families[] = 'Karla:400,400i,700,700i';
    }    

    if ( '' != $menu_font_name ) {
        $font_families[] = $menu_font_name['family'].':'.dhc_get_style($menu_font_name['style']);
    } else {
    	$font_families[] = 'Karla:400,400i,700,700i';
    }    
    
    $query_args = array(        
        'family' => urlencode( implode( '|', $font_families ) ),     
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    return esc_url_raw( $fonts_url );
}

function dhc_scripts_styles() {
    wp_enqueue_style( 'dhc-theme-slug-fonts', dhc_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'dhc_scripts_styles' );

/**
 * Enqueue scripts and styles.
 */

function dhc_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'dhc-main', dhc_LINK . 'css/main.css' );
	wp_enqueue_style( 'dhc-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-fontawesome', dhc_LINK . 'css/font-awesome.css' );
	wp_enqueue_style( 'font-ionicons', dhc_LINK . 'css/ionicons.min.css' );	
	wp_enqueue_style( 'style-flexslider', dhc_LINK . 'css/flexslider.css' );
	
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'ie9', dhc_LINK . 'css/ie.css');
	wp_style_add_data( 'ie9', 'conditional', 'lte IE 9' );

	wp_enqueue_style( 'animate', dhc_LINK . 'css/animate.css' );	
	wp_enqueue_style( 'responsive', dhc_LINK . 'css/responsive.css' );
	wp_enqueue_style( 'dhc-inline-css', dhc_LINK . 'css/inline-css.css' );
	// Load the html5 shiv..	
	wp_enqueue_script( 'html5', dhc_LINK . 'js/html5shiv.js', array('jquery'), '1.3.0' ,true);	
	wp_enqueue_script( 'flexslider', dhc_LINK . 'js/jquery.flexslider-min.js', array(),'2.5.0', true );				
	wp_enqueue_script( 'respond', dhc_LINK . 'js/respond.min.js', array(), '1.3.0',true);
	wp_enqueue_script( 'easing', dhc_LINK . 'js/jquery.easing.js', array(),'1.3' ,true);
	wp_enqueue_script( 'waypoints', dhc_LINK . 'js/jquery-waypoints.js', array(),'1.3' ,true);

	wp_enqueue_script( 'match', dhc_LINK . 'js/matchMedia.js', array(),'1.2',true);	
	wp_enqueue_script( 'fitvids', dhc_LINK . 'js/jquery.fitvids.js', array(),'1.1',true);	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply', array(),'2.0.4',true );
	}

	// Load the main js
	wp_enqueue_script( 'dhc-main', dhc_LINK . 'js/main.js', array(),'2.0.4',true);
}

add_action( 'wp_enqueue_scripts', 'dhc_scripts' );

/**
 * Enqueue Bootstrap
 */
function dhc_enqueue_bootstrap() {
	wp_enqueue_style( 'bootstrap', dhc_LINK . 'css/bootstrap.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'dhc_enqueue_bootstrap', 9 );

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses dhc_header_style()
 */
function dhc_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'dhc_custom_header_args', array(
		'default-image'          => '',
		'width'                  => 1920,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'dhc_header_style'
	) ) );
	
}
add_action( 'after_setup_theme', 'dhc_custom_header_setup' );

if ( ! function_exists( 'dhc_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see themesflat_custom_header_setup().
 */

function dhc_header_style() {		
	if ( dhc_meta( 'pagetitle_enabled' ) == 1 ) {		
		$header_images = '.page-title { background-image: url('. dhc_meta('header_image').');}';
	} else {
		if ( get_header_image() != "" ) {
			$header_images = '.page-title { background-image: url('. get_header_image().')!important;;}';	
		} else {
			$header_images = '.page-title { background-color: '.dhc_choose_opt('pagetitle_background_color').'!important;; }';
		}
	}
	
	wp_add_inline_style( 'dhc-style', $header_images );
}

add_action( 'wp_enqueue_scripts', 'dhc_header_style' );

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses dhc_header_style()
 */
endif; // nah_header_style


// Customizer additions.
require dhc_DIR . 'inc/customizer.php';

// Revo Slider
require dhc_DIR . 'inc/revo-slider.php';

// metabox-options
require dhc_DIR . 'inc/metabox-options.php';

// Helpers
require dhc_DIR . 'inc/helpers.php';
// Struct
require dhc_DIR . 'inc/structure.php';

// Breadcrumbs additions.
require dhc_DIR . 'inc/breadcrumb.php';

// Pagination additions.
require dhc_DIR . 'inc/pagination.php';

// Custom template tags for this theme.
require dhc_DIR . 'inc/template-tags.php';

// Style.
require dhc_DIR . 'inc/styles.php';

// Required plugins
require_once dhc_DIR . 'inc/plugins/class-tgm-plugin-activation.php';

// Plugin Activation
require_once dhc_DIR . 'inc/plugins/plugins.php';







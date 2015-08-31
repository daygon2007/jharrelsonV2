<?php
/**
 * VersaTech Marketing Base Theme functions and definitions
 *
 * @package VersaTech Marketing Base Theme
 */

if ( ! function_exists( 'vm_base_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vm_base_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on VersaTech Marketing Base Theme, use a find and replace
	 * to change 'vm-base-theme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'vm-base-theme', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'vm-base-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'vm_base_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // vm_base_theme_setup
add_action( 'after_setup_theme', 'vm_base_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vm_base_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vm_base_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'vm_base_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function vm_base_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'vm-base-theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'vm_base_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vm_base_theme_scripts() {
	
	// Stylesheets
	wp_enqueue_style( 'vm-base-theme-style', get_stylesheet_uri() );


	// Javascripts
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', ( 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js' ), array(), null, true );
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'vm-base-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'vm-base-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script ( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array(), null, true);
	wp_enqueue_script ('custom', get_template_directory_uri().'/js/custom.js', array('jquery'), null, true);
	wp_localize_script('custom', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php'),));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vm_base_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
	* Load Bootstrap NavWalker
	*/
require_once('wp_bootstrap_navwalker.php');

/*
	Mozscape API
*/

add_action('wp_ajax_moz_api', 'moz_api_callback');
add_action('wp_ajax_nopriv_moz_api', 'moz_api_callback');

function moz_api_callback(){
	// you can obtain you access id and secret key here: https://moz.com/products/api/keys
$accessID = "mozscape-c400337ba7";
$secretKey = "272edc64ff57f002b64551e2ea3b5de";
// Set your expires for several minutes into the future.
// Values excessively far in the future will not be honored by the Mozscape API.
$expires = time() + 300;
// A new linefeed is necessary between your AccessID and Expires.
$stringToSign = $accessID."\n".$expires;
// Get the "raw" or binary output of the hmac hash.
$binarySignature = hash_hmac('sha1', $stringToSign, $secretKey, true);
// We need to base64-encode it and then url-encode that.
$urlSafeSignature = urlencode(base64_encode($binarySignature));
// Add up all the bit flags you want returned.
// Learn more here: http://apiwiki.moz.com/url-metrics
$cols = 
/* Title */1 +
/* Canonical URL */4 +
/* External Equity Links */32 +
/* MozRank: URL */16384 +
/* Page Authority */34359738368 +
/* Domain Authority */68719476736 +
/* Time Last Crawled. */144115188075855872
;
// Put it all together and you get your request URL.
$requestUrl = "http://lsapi.seomoz.com/linkscape/url-metrics/?Cols=".$cols."&AccessID=".$accessID."&Expires=".$expires."&Signature=".$urlSafeSignature;
// Put your URLS into an array and json_encode them.
$domain1 = $_POST['data'];

$batchedDomains = array($domain1);
$encodedDomains = json_encode($batchedDomains);
// We can easily use Curl to send off our request.
// Note that we send our encoded list of domains through curl's POSTFIELDS.
$options = array(
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_POSTFIELDS     => $encodedDomains
	);
$ch = curl_init($requestUrl);
curl_setopt_array($ch, $options);
$content = curl_exec($ch);
curl_close( $ch );
$contents = json_decode($content, true);
//print_r ($contents);

$page_title = $content['ut'];
$canonical_url = $content['uu'];
$external_link_equity = $content['euid'];
$mozRank_url = round($content['umrp'],0);
$page_authority = round($content['upa'],0);
$domain_authority = round($content['pda'],0);
$last_crawled = $content['ulc'];

	header('Content-Type: application/json');
	echo json_encode($contents);
	die();
}

/*
	Disable Admin Bar
*/
add_filter('show_admin_bar', '__return_false');
<?php if (!defined('ABSPATH')) :
	exit; // Exit if accessed directly
endif;
/**
 * stream sports functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package stream_sports
 */

define('CS_ACTIVE_FRAMEWORK', true);
define('CS_ACTIVE_METABOX', true);
define('CS_ACTIVE_TAXONOMY', false);
define('CS_ACTIVE_SHORTCODE', false);
define('CS_ACTIVE_CUSTOMIZE', false);

if (!function_exists('stream_sports_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function stream_sports_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on stream sports, use a find and replace
		 * to change 'stream-sports' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('stream-sports', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => esc_html__('Primary', 'stream-sports'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('stream_sports_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));

		add_image_size('stream-sports-thumbnail', 300, 260, true);
		add_image_size('stream-sports-single-thumbnail', 1000, 450, true);
		add_image_size('stream-sports-page-thumbnail', 1400, 800, true);
	}
endif;
add_action('after_setup_theme', 'stream_sports_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stream_sports_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('stream_sports_content_width', 1140);
}

add_action('after_setup_theme', 'stream_sports_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stream_sports_widgets_init()
{
	register_sidebar(array(
		'name' => esc_html__('Blog Sidebar', 'stream-sports'),
		'id' => 'sidebar-1',
		'description' => esc_html__('Add widgets here.', 'stream-sports'),
		'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => esc_html__('Sports Sidebar', 'stream-sports'),
		'id' => 'sidebar-2',
		'description' => esc_html__('Add widgets here.', 'stream-sports'),
		'before_widget' => '<div id="%1$s" class="single-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

}

add_action('widgets_init', 'stream_sports_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function stream_sports_scripts()
{
	wp_enqueue_style('poppins-fonts', '//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700');
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '5.1.0');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), '5.1.0');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.6.3');
	wp_enqueue_style('meanmenu', get_template_directory_uri() . '/assets/css/meanmenu.css', array(), '4.6.3');
	wp_enqueue_style('stream-sports-style', get_stylesheet_uri());

	wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), '20151215', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20151215', true);
	wp_enqueue_script('meanmenu', get_template_directory_uri() . '/assets/js/meanmenu.js', array('jquery'), '20151215', true);
	wp_enqueue_script('stream-sports-countdown', get_template_directory_uri() . '/assets/js/countdown.js', array('jquery'), '20151215', true);
	wp_enqueue_script('stream-sports-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '20151215', true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

add_action('wp_enqueue_scripts', 'stream_sports_scripts');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Load Require Plugins
 */
require get_template_directory() . '/plugins/plugins.php';

/**
 * Theme Options & Metabox
 */
require get_template_directory() . '/cs-framework/cs-framework.php';


function stream_sports_excerpt_length($length)
{
	return 40;
}

add_filter('excerpt_length', 'stream_sports_excerpt_length', 999);

function stream_sports_excerpt_more($more)
{
	return '.... <a href="' . get_the_permalink() . '" rel="nofollow" class="more-link">Read More</a>';
}

add_filter('excerpt_more', 'stream_sports_excerpt_more');

/**
 * @param $post_id
 * remove attachment if delete post
 */
function stream_sports_remove_attachment_with_post($post_id)
{
	if (has_post_thumbnail($post_id)) {
		$attachment_id = get_post_thumbnail_id($post_id);
		wp_delete_attachment($attachment_id, true);
	}
}

add_action('before_delete_post', 'stream_sports_remove_attachment_with_post', 10);


function stream_sports_register_cpt_sport()
{

	/**
	 * Post Type: Sports.
	 */

	$labels = array(
		"name" => __("Sports", "stream-sports"),
		"singular_name" => __("Sport", "stream-sports"),
	);

	$args = array(
		"label" => __("Sports", "stream-sports"),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => "sports",
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array("slug" => "sport", "with_front" => true),
		"query_var" => true,
		"menu_position" => 5,
		"menu_icon" => "dashicons-sos",
		"supports" => array("title", "editor", "thumbnail"),
	);

	register_post_type("sport", $args);
}

add_action('init', 'stream_sports_register_cpt_sport');

function stream_sports_register_taxes_cpt_sport()
{

	/**
	 * Taxonomy: Sports Categories.
	 */

	$labels = array(
		"name" => __("Sports Categories", "stream-sports"),
		"singular_name" => __("Sport Category", "stream-sports"),
	);

	$args = array(
		"label" => __("Sports Categories", "stream-sports"),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array('slug' => 'sport_category', 'with_front' => true,),
		"show_admin_column" => true,
		"show_in_rest" => true,
		"rest_base" => "sport_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
	);
	register_taxonomy("sport_category", array("sport"), $args);
}

add_action('init', 'stream_sports_register_taxes_cpt_sport');




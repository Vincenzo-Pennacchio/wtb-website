<?php
/**
 * WealthBag functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WealthBag
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define theme constants
 */
define('WEALTHBAG_VERSION', '1.0.0');
define('WEALTHBAG_THEME_DIR', get_template_directory());
define('WEALTHBAG_THEME_URI', get_template_directory_uri());

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function wealthbag_setup() {
    // Make theme available for translation
    load_theme_textdomain('wealthbag', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Set default thumbnail size
    set_post_thumbnail_size(1200, 630, true);

    // Add additional image sizes
    add_image_size('wealthbag-hero', 1920, 1080, true);
    add_image_size('wealthbag-banner', 1400, 800, true);
    add_image_size('wealthbag-card', 400, 300, true);

    // This theme uses wp_nav_menu() in multiple locations
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'wealthbag'),
        'footer'  => __('Footer Menu', 'wealthbag'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Set up the WordPress core custom background feature
    add_theme_support('custom-background', apply_filters('wealthbag_custom_background_args', array(
        'default-color' => '0a0a0a',
        'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width'         => 1920,
        'height'        => 1080,
        'flex-height'   => true,
        'flex-width'    => true,
    ));

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for wide alignment
    add_theme_support('align-wide');

    // Add support for block editor color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Primary Purple', 'wealthbag'),
            'slug'  => 'primary-purple',
            'color' => '#bf3ed6',
        ),
        array(
            'name'  => __('Secondary Purple', 'wealthbag'),
            'slug'  => 'secondary-purple',
            'color' => '#fe5ab6',
        ),
        array(
            'name'  => __('Neon Green', 'wealthbag'),
            'slug'  => 'neon-green',
            'color' => '#44c76a',
        ),
        array(
            'name'  => __('Gold', 'wealthbag'),
            'slug'  => 'gold',
            'color' => '#fdf259',
        ),
        array(
            'name'  => __('Dark Background', 'wealthbag'),
            'slug'  => 'bg-dark',
            'color' => '#0a0a0a',
        ),
        array(
            'name'  => __('Light Text', 'wealthbag'),
            'slug'  => 'text-light',
            'color' => '#ffffff',
        ),
    ));
}
add_action('after_setup_theme', 'wealthbag_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function wealthbag_content_width() {
    $GLOBALS['content_width'] = apply_filters('wealthbag_content_width', 1200);
}
add_action('after_setup_theme', 'wealthbag_content_width', 0);

/**
 * Register widget area.
 */
function wealthbag_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'wealthbag'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'wealthbag'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'wealthbag'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets to the footer area.', 'wealthbag'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'wealthbag_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wealthbag_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('wealthbag-fonts', 'https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Inter:wght@300;400;500;600;700&display=swap', array(), null);

    // Enqueue main stylesheet
    wp_enqueue_style('wealthbag-style', get_stylesheet_uri(), array(), WEALTHBAG_VERSION);

    // Enqueue custom styles
    wp_enqueue_style('wealthbag-custom', get_template_directory_uri() . '/assets/css/custom.css', array('wealthbag-style'), WEALTHBAG_VERSION);

    // Enqueue main JavaScript file
    wp_enqueue_script('wealthbag-script', get_template_directory_uri() . '/assets/js/wealthbag.js', array('jquery'), WEALTHBAG_VERSION, true);

    // Localize script for AJAX
    wp_localize_script('wealthbag-script', 'wealthbag_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('wealthbag_nonce'),
    ));

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'wealthbag_scripts');

/**
 * Add preconnect for external domains.
 */
function wealthbag_resource_hints($urls, $relation_type) {
    if (wp_style_is('wealthbag-fonts', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}
add_filter('wp_resource_hints', 'wealthbag_resource_hints', 10, 2);

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
 * Custom post types and fields.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * AJAX handlers.
 */
require get_template_directory() . '/inc/ajax-handlers.php';

/**
 * Admin functions.
 */
if (is_admin()) {
    require get_template_directory() . '/inc/admin.php';
}

/**
 * Add custom body classes.
 */
function wealthbag_body_classes($classes) {
    // Add class of hfeed to non-singular pages
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Add class if sidebar is active
    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }

    // Add class for custom header
    if (has_header_image()) {
        $classes[] = 'has-header-image';
    }

    return $classes;
}
add_filter('body_class', 'wealthbag_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function wealthbag_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'wealthbag_pingback_header');

/**
 * Customize excerpt length.
 */
function wealthbag_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'wealthbag_excerpt_length', 999);

/**
 * Customize excerpt more string.
 */
function wealthbag_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'wealthbag_excerpt_more');

/**
 * Remove unwanted scripts and styles from head.
 */
function wealthbag_remove_version_scripts_styles($src) {
    if (strpos($src, 'assets/')) {
        return $src;
    }
    return remove_query_arg('ver', $src);
}
add_filter('script_loader_src', 'wealthbag_remove_version_scripts_styles', 15, 1);
add_filter('style_loader_src', 'wealthbag_remove_version_scripts_styles', 15, 1);

/**
 * Security improvements.
 */
// Remove WordPress version number
remove_action('wp_head', 'wp_generator');

// Remove RSD link
remove_action('wp_head', 'rsd_link');

// Remove Windows Live Writer
remove_action('wp_head', 'wlwmanifest_link');

// Remove shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/**
 * Performance optimizations.
 */
// Remove jQuery migrate
function wealthbag_remove_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}
add_action('wp_default_scripts', 'wealthbag_remove_jquery_migrate');

// Defer JavaScript loading
function wealthbag_defer_scripts($tag, $handle, $src) {
    $defer = array('wealthbag-script');
    
    if (in_array($handle, $defer)) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'wealthbag_defer_scripts', 10, 3);

/**
 * Include theme files
 */
// Include template tags
require get_template_directory() . '/inc/template-tags.php';

// Include template functions
require get_template_directory() . '/inc/template-functions.php';

// Include customizer
require get_template_directory() . '/inc/customizer.php';

// Include custom post types
require get_template_directory() . '/inc/custom-post-types.php';

// Include security enhancements
require get_template_directory() . '/inc/security.php';
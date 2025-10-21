<?php
/**
 * Twenty Twenty-Five Child Theme - Simplified Functions
 */

// Enqueue parent theme styles
function twentytwentyfive_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_styles');

// Enqueue Tailwind CSS via CDN
function twentytwentyfive_child_enqueue_tailwind() {
    wp_enqueue_script('tailwind-css', 'https://cdn.tailwindcss.com', array(), null, true);
}
add_action('wp_enqueue_scripts', 'twentytwentyfive_child_enqueue_tailwind');

// Include the course landing shortcode
require_once get_stylesheet_directory() . '/course-landing-shortcode.php';

// Register shortcode stylesheet
function twentytwentyfive_child_register_assets() {
    wp_register_style(
        'twentytwentyfive-child-course-landing',
        get_stylesheet_directory_uri() . '/assets/css/course-landing.css',
        array(),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'twentytwentyfive_child_register_assets');

// Enqueue shortcode stylesheet when shortcode is used
function twentytwentyfive_child_maybe_enqueue_course_landing($posts) {
    if (empty($posts)) {
        return $posts;
    }

    $shortcode_found = false;

    foreach ($posts as $post) {
        if (stripos($post->post_content, '[course_landing') !== false) {
            $shortcode_found = true;
            break;
        }
    }

    if ($shortcode_found) {
        wp_enqueue_style('twentytwentyfive-child-course-landing');
    }

    return $posts;
}
add_filter('the_posts', 'twentytwentyfive_child_maybe_enqueue_course_landing');

// Set Hebrew as the site language for RTL support
function twentytwentyfive_child_set_locale() {
    return 'he_IL'; // Hebrew locale
}
add_filter('locale', 'twentytwentyfive_child_set_locale');

// Disable Gutenberg for posts and pages
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_page', '__return_false', 10);

// Optional: Basic theme setup
function twentytwentyfive_child_theme_setup() {
    // Add theme support for title tag and HTML5 markup
    add_theme_support('title-tag');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

    // Add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Load theme textdomain for translations
    load_theme_textdomain('twentytwentyfive-child', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'twentytwentyfive_child_theme_setup');

// Add RTL support
function twentytwentyfive_child_add_rtl_support() {
    global $wp_locale;
    $wp_locale->text_direction = 'rtl';
}
add_action('init', 'twentytwentyfive_child_add_rtl_support');
?>

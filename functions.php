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
require_once get_stylesheet_directory() . '/includes/class-signup-form.php';

// Register shortcode stylesheet
function twentytwentyfive_child_register_assets() {
    wp_register_style(
        'twentytwentyfive-child-course-landing',
        get_stylesheet_directory_uri() . '/assets/css/course-landing.css',
        array(),
        wp_get_theme()->get('Version')
    );

    wp_register_script(
        'twentytwentyfive-child-course-landing',
        get_stylesheet_directory_uri() . '/assets/js/course-landing.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'twentytwentyfive_child_register_assets');

function twentytwentyfive_child_register_signup_cpt() {
    $labels = array(
        'name'               => __('Course Signups', 'twentytwentyfive-child'),
        'singular_name'      => __('Course Signup', 'twentytwentyfive-child'),
        'menu_name'          => __('Course Signups', 'twentytwentyfive-child'),
        'name_admin_bar'     => __('Course Signup', 'twentytwentyfive-child'),
        'add_new'            => __('Add New', 'twentytwentyfive-child'),
        'add_new_item'       => __('Add New Signup', 'twentytwentyfive-child'),
        'edit_item'          => __('Edit Signup', 'twentytwentyfive-child'),
        'view_item'          => __('View Signup', 'twentytwentyfive-child'),
        'all_items'          => __('All Signups', 'twentytwentyfive-child'),
        'search_items'       => __('Search Signups', 'twentytwentyfive-child'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'has_archive'        => false,
        'supports'           => array('title'),
        'menu_icon'          => 'dashicons-clipboard',
        'capability_type'    => 'post',
    );

    register_post_type('course_signup', $args);
}
add_action('init', 'twentytwentyfive_child_register_signup_cpt');

function twentytwentyfive_child_register_appointment_cpt() {
    $labels = array(
        'name'               => __('Course Appointments', 'twentytwentyfive-child'),
        'singular_name'      => __('Course Appointment', 'twentytwentyfive-child'),
        'menu_name'          => __('Course Appointments', 'twentytwentyfive-child'),
        'add_new'            => __('Add Appointment', 'twentytwentyfive-child'),
        'add_new_item'       => __('Add New Appointment', 'twentytwentyfive-child'),
        'edit_item'          => __('Edit Appointment', 'twentytwentyfive-child'),
        'view_item'          => __('View Appointment', 'twentytwentyfive-child'),
        'all_items'          => __('All Appointments', 'twentytwentyfive-child'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_admin_bar'  => true,
        'supports'           => array('title'),
        'menu_icon'          => 'dashicons-calendar-alt',
        'capability_type'    => 'post',
    );

    register_post_type('course_appointment', $args);
}
add_action('init', 'twentytwentyfive_child_register_appointment_cpt');

function twentytwentyfive_child_add_appointment_metabox() {
    add_meta_box(
        'course_appointment_details',
        __('Appointment Details', 'twentytwentyfive-child'),
        'twentytwentyfive_child_render_appointment_metabox',
        'course_appointment',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'twentytwentyfive_child_add_appointment_metabox');

function twentytwentyfive_child_render_appointment_metabox($post) {
    wp_nonce_field('course_appointment_save', 'course_appointment_nonce');
    $stored_datetime = get_post_meta($post->ID, 'appointment_datetime', true);
    $stored_duration = get_post_meta($post->ID, 'appointment_duration', true);
    $stored_mode     = get_post_meta($post->ID, 'appointment_mode', true);
    $stored_link     = get_post_meta($post->ID, 'appointment_join_link', true);

    $datetime_value = $stored_datetime ? gmdate('Y-m-d\TH:i', (int) $stored_datetime) : '';
    ?>
    <p>
        <label for="appointment-datetime"><strong><?php _e('Start Date & Time', 'twentytwentyfive-child'); ?></strong></label>
        <input type="datetime-local" id="appointment-datetime" name="appointment_datetime" value="<?php echo esc_attr($datetime_value); ?>" class="widefat">
    </p>
    <p>
        <label for="appointment-duration"><strong><?php _e('Duration (minutes)', 'twentytwentyfive-child'); ?></strong></label>
        <input type="number" id="appointment-duration" name="appointment_duration" value="<?php echo esc_attr($stored_duration); ?>" class="small-text" min="10" step="5">
    </p>
    <p>
        <label for="appointment-mode"><strong><?php _e('Mode / Location', 'twentytwentyfive-child'); ?></strong></label>
        <input type="text" id="appointment-mode" name="appointment_mode" value="<?php echo esc_attr($stored_mode); ?>" class="widefat" placeholder="Zoom, Google Meet, Studio Tel Aviv...">
    </p>
    <p>
        <label for="appointment-join-link"><strong><?php _e('Join / Registration Link (optional)', 'twentytwentyfive-child'); ?></strong></label>
        <input type="url" id="appointment-join-link" name="appointment_join_link" value="<?php echo esc_attr($stored_link); ?>" class="widefat" placeholder="https://...">
    </p>
    <?php
}

function twentytwentyfive_child_save_appointment_meta($post_id) {
    if (!isset($_POST['course_appointment_nonce']) || !wp_verify_nonce($_POST['course_appointment_nonce'], 'course_appointment_save')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['appointment_datetime']) && $_POST['appointment_datetime']) {
        $timestamp = strtotime(sanitize_text_field($_POST['appointment_datetime']));
        update_post_meta($post_id, 'appointment_datetime', $timestamp ? $timestamp : '');
    } else {
        delete_post_meta($post_id, 'appointment_datetime');
    }

    if (isset($_POST['appointment_duration'])) {
        update_post_meta($post_id, 'appointment_duration', absint($_POST['appointment_duration']));
    }

    if (isset($_POST['appointment_mode'])) {
        update_post_meta($post_id, 'appointment_mode', sanitize_text_field($_POST['appointment_mode']));
    }

    if (isset($_POST['appointment_join_link'])) {
        update_post_meta($post_id, 'appointment_join_link', esc_url_raw($_POST['appointment_join_link']));
    }
}
add_action('save_post_course_appointment', 'twentytwentyfive_child_save_appointment_meta');

function twentytwentyfive_child_signup_columns($columns) {
    $columns['signup_phone'] = __('Phone', 'twentytwentyfive-child');
    $columns['signup_email'] = __('Email', 'twentytwentyfive-child');
    $columns['signup_source'] = __('Source', 'twentytwentyfive-child');
    $columns['signup_date'] = __('Submitted', 'twentytwentyfive-child');
    return $columns;
}
add_filter('manage_course_signup_posts_columns', 'twentytwentyfive_child_signup_columns');

function twentytwentyfive_child_signup_column_content($column, $post_id) {
    switch ($column) {
        case 'signup_phone':
            echo esc_html(get_post_meta($post_id, 'signup_phone', true));
            break;
        case 'signup_email':
            echo esc_html(get_post_meta($post_id, 'signup_email', true));
            break;
        case 'signup_source':
            echo esc_html(get_post_meta($post_id, 'signup_source', true));
            break;
        case 'signup_date':
            echo esc_html(get_the_date('Y-m-d H:i', $post_id));
            break;
    }
}
add_action('manage_course_signup_posts_custom_column', 'twentytwentyfive_child_signup_column_content', 10, 2);

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
        wp_enqueue_script('twentytwentyfive-child-course-landing');
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

<?php
/*
Plugin Name: Dynamic Cat Manager
Description: Adds a custom post type "Cat" with image, title, body, and read more link.
Version: 1.0
Author: koem sothearith
*/

// Register Custom Post Type "cat"
function dcm_register_cat_cpt() {
    $labels = array(
        'name' => 'Cats',
        'singular_name' => 'Cat',
        'add_new' => 'Add New Cat',
        'add_new_item' => 'Add New Cat',
        'edit_item' => 'Edit Cat',
        'new_item' => 'New Cat',
        'view_item' => 'View Cat',
        'search_items' => 'Search Cats',
        'not_found' => 'No Cats found',
        'not_found_in_trash' => 'No Cats found in Trash',
        'all_items' => 'All Cats',
        'menu_name' => 'Cats',
        'name_admin_bar' => 'Cat',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'has_archive' => true,
        'menu_icon' => 'dashicons-palmtree',
        'show_in_rest' => true, // Enable Gutenberg editor
    );

    register_post_type('cat', $args);
}
add_action('init', 'dcm_register_cat_cpt');

// Add support for featured image (thumbnail)
function dcm_setup_theme_support() {
    add_theme_support('post-thumbnails', array('cat'));
}
add_action('after_setup_theme', 'dcm_setup_theme_support');

// Enqueue inline CSS styles
function dcm_enqueue_inline_styles() {
    if (!is_admin()) {
        $custom_css = "
        .dcm-cats-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-left: 0px;
            margin-right: 0px;
        }
        .dcm-cat-title {
            color: e4afb0;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .dcm-cat-readmore {
            display: inline-block;
            margin-top: 10px;
            color: #0073aa;
            text-decoration: none;
        }
        .dcm-cat-readmore:hover {
            text-decoration: underline;
        }
        .dcm-cat-image {
            text-align: center;
            margin-bottom: 10px;
        }
        .dcm-cat-image img {
            max-width: 200px;
            height: 200px;
            display: inline-block;
            transition: 0.3s;
        }
        .dcm-cat-image img:hover {
            max-width: 220px;
            height: 200px;
            display: inline-block;
            transform: scale(1.1);
            transition: 0.3s;
        }
        .dcm-cat-item {
            border: 1px solid #000000ff;
            padding: 10px;
            width: 250px;
            box-sizing: border-box;
            background-color: #ffffff;
            transition: 0.3s;
        }
        .dcm-cat-item:hover {
            border: 1px solid #f9f9f9ff;
            padding: 10px;
            width: 250px;
            box-sizing: border-box;
            background-color: #dcdcdcff;
            transition: 0.3s;
            color:  #000000ff;
        }
        .dcm-cat-date {
            font-size: 0.9rem;
            color: #555;
            margin-top: 5px;
            font-style: italic;
        }
        .dcm-cat-date:hover {
            font-size: 0.9rem;
            color: #000000ff;
            margin-top: 5px;
            font-style: italic;
        }
        ";
        wp_add_inline_style('wp-block-library', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'dcm_enqueue_inline_styles');

// Shortcode to display all cats
function dcm_display_cats_shortcode($atts) {
    $atts = shortcode_atts(array(
        'posts_per_page' => 5,
    ), $atts, 'show_cats');

    $args = array(
        'post_type' => 'cat',
        'posts_per_page' => intval($atts['posts_per_page']),
        'post_status' => 'publish',
    );

    $cats = new WP_Query($args);

    if (!$cats->have_posts()) {
        return '<p>No cats found.</p>';
    }

    $output = '<div class="dcm-cats-wrapper">';

    while ($cats->have_posts()) {
        $cats->the_post();
        $img = get_the_post_thumbnail(get_the_ID(), 'medium');
        $title = get_the_title();
        $content = wp_trim_words(get_the_content(), 30, '...');
        $read_more_link = get_permalink();
        $date_time = get_the_date('F j, Y \a\t g:i a'); // Example: January 14, 2026 at 10:22 am

        $output .= '<div class="dcm-cat-item">';
        if ($img) {
            $output .= '<div class="dcm-cat-image">' . $img . '</div>';
        }
        $output .= '<h3 class="dcm-cat-title">' . esc_html($title) . '</h3>';
        $output .= '<div class="dcm-cat-date">' . esc_html($date_time) . '</div>';
        $output .= '<div class="dcm-cat-content">' . esc_html($content) . '</div>';
        $output .= '<a class="dcm-cat-readmore" href="' . esc_url($read_more_link) . '" target="_blank" rel="noopener noreferrer">Read More</a>';
        $output .= '</div>';
    }

    wp_reset_postdata();

    $output .= '</div>';

    return $output;
}
add_shortcode('show_cats', 'dcm_display_cats_shortcode');

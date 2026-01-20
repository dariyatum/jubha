<?php
/*
Plugin Name: Dynamic Cat Manager
Description: Adds a custom post type "Cat" with image, title, body, and read more link.
Version: 1.3
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
        'show_in_rest' => true,
    );

    register_post_type('cat', $args);
}
add_action('init', 'dcm_register_cat_cpt');

// Add support for featured image (thumbnail)
function dcm_setup_theme_support() {
    add_theme_support('post-thumbnails', array('cat'));
}
add_action('after_setup_theme', 'dcm_setup_theme_support');

// Enqueue inline CSS styles with horizontal scroll
function dcm_enqueue_inline_styles() {
    if (!is_admin()) {
        $custom_css = "
        .dcm-cats-wrapper {
            display: flex;
            flex-wrap: nowrap; /* No wrapping */
            gap: 20px;
            overflow-x: auto; /* Horizontal scroll */
            padding: 10px 0;
            -webkit-overflow-scrolling: touch; /* Smooth scroll on iOS */
        }
        /* Optional: hide scrollbar for webkit browsers */
        .dcm-cats-wrapper::-webkit-scrollbar {
            height: 8px;
        }
        .dcm-cats-wrapper::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .dcm-cats-wrapper::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }
        .dcm-cats-wrapper::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .dcm-cat-item {
            flex: 0 0 auto; /* Fixed width, don’t shrink */
            border: 1px solid #000000ff;
            padding: 10px;
            width: 250px;
            background-color: #ffffff;
            box-sizing: border-box;
            transition: 0.3s;
            text-align: center;
        }
        .dcm-cat-item:hover {
            border-color: #f9f9f9ff;
            background-color: #dcdcdcff;
            color: #000000ff;
        }
        .dcm-cat-title {
            color: #e4afb0;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            font-family: Arial, sans-serif;
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
            margin-bottom: 10px;
        }
        .dcm-cat-image img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .dcm-cat-image img:hover {
            transform: scale(1.1);
        }
        .dcm-cat-date {
            font-size: 0.9rem;
            color: #555;
            margin-top: 5px;
            font-style: italic;
        }
        .dcm-cat-date:hover {
            color: #000000ff;
        }
        ";
        wp_add_inline_style('wp-block-library', $custom_css);
    }
}
add_action('wp_enqueue_scripts', 'dcm_enqueue_inline_styles');

// Shortcode to display cats
function dcm_display_cats_shortcode($atts) {
    $atts = shortcode_atts(array(
        'posts_per_page' => 10,  // increased default to show more cards in scroll
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
        $date_time = get_the_date('F j, Y \a\t g:i a');

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

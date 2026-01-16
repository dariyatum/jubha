
<?php

/* Classic Editor
 
 Plugin Name: Classic Editor
 Description: make a book appointment for petient to meet the doctor.
 Version:     1.0.0
 Author:      dariyatum */


add_action('wp_enqueue_scripts', 'jubha_load_css');
function mytheme_widgets_init() {

    register_sidebar(array(
        'name'          => 'Main Sidebar',
        'id'            => 'main-sidebar',
        'description'   => 'Widgets added here will appear in the sidebar.',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));

}
add_action('widgets_init', 'mytheme_widgets_init');
function baa_register_admin_menu() {

    add_menu_page(
        'Book an Appointment',     // Page Title
        'Book Appointment',        // Menu Title (shown in admin sidebar)
        'manage_options',          // Capability
        'book-an-appointment',     // Menu Slug
        'baa_main_admin_page',     // Function to show content
        'dashicons-calendar',      // Icon
        26                         // Position
    );

}
add_action('admin_menu', 'baa_register_admin_menu');
function baa_main_admin_page() {
    ?>
    <div class="wrap">
        <h1>Book an Appointment Plugin</h1>
        <p>Welcome to the Book an Appointment admin dashboard.</p>
    </div>
    <?php
}
function baa_register_submenus() {

    add_submenu_page(
        'book-an-appointment',
        'Appointments',
        'Appointments',
        'manage_options',
        'baa-appointments',
        'baa_appointments_page'
    );

    add_submenu_page(
        'book-an-appointment',
        'Settings',
        'Settings',
        'manage_options',
        'baa-settings',
        'baa_settings_page'
    );

}
add_action('admin_menu', 'baa_register_submenus');
function baa_appointments_page() {
    echo "<h2>Manage Appointments</h2>";
}

function baa_settings_page() {
    echo "<h2>Plugin Settings</h2>";
}
if ( is_admin() ) {
    add_action('admin_menu', 'baa_register_admin_menu');
}
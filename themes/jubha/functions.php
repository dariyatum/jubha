<?php
/* ------------------------------
Theme Setup
------------------------------ */
function mytheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => 'Primary Menu',
    ]);
}
add_action('after_setup_theme', 'mytheme_setup');

/* ------------------------------
Enqueue CSS & JS
------------------------------ */
function mytheme_assets() {
    wp_enqueue_style('mytheme-style', get_stylesheet_uri()); // main style
    wp_enqueue_style('nav-style', get_template_directory_uri() . '/nav.css'); // navigation
    wp_enqueue_style('doctor-style', get_template_directory_uri() . '/stylee/doctor-intro.css'); // doctor page
}
add_action('wp_enqueue_scripts', 'mytheme_assets');

/* ------------------------------
Register Doctor Post Type
------------------------------ */
function mytheme_register_doctors() {
    register_post_type('doctor', [
        'labels' => [
            'name' => 'Doctors',
            'singular_name' => 'Doctor',
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => ['title','editor','thumbnail']
    ]);
}
add_action('init','mytheme_register_doctors');

/* ------------------------------
Doctor Meta Boxes
------------------------------ */
function mytheme_doctor_meta() {
    add_meta_box('doctor_details','Doctor Details','mytheme_doctor_meta_callback','doctor');
}
add_action('add_meta_boxes','mytheme_doctor_meta');

function mytheme_doctor_meta_callback($post){
    $specialty = get_post_meta($post->ID,'_specialty',true);
    $experience = get_post_meta($post->ID,'_experience',true);
    $description = get_post_meta($post->ID,'_experience',true);

    ?>
    <label>Specialty:</label><br>
    <input type="text" name="specialty" value="<?php echo esc_attr($specialty); ?>"><br><br>
    <label>Experience (years):</label><br>
    <input type="number" name="experience" value="<?php echo esc_attr($experience); ?>"><br>
     <label>Description:</label><br>
    <input type="text" name="experience" value="<?php echo esc_attr($description); ?>"><br>
    <?php
}

function mytheme_save_doctor_meta($post_id){
    if(isset($_POST['specialty'])) update_post_meta($post_id,'_specialty',sanitize_text_field($_POST['specialty']));
    if(isset($_POST['experience'])) update_post_meta($post_id,'_experience',sanitize_text_field($_POST['experience']));
}
add_action('save_post','mytheme_save_doctor_meta');
?>

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
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());
    wp_enqueue_style('nav-style', get_template_directory_uri() . '/nav.css');
    wp_enqueue_style('doctor-style', get_template_directory_uri() . '/stylee/doctor-intro.css');
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
            'add_new_item' => 'Add New Doctor',
            'edit_item' => 'Edit Doctor',
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-businessperson',
        'supports' => ['title','editor','thumbnail'],
        'rewrite' => ['slug' => 'doctors'],
    ]);
}
add_action('init','mytheme_register_doctors');


/* ------------------------------
Doctor Meta Box
------------------------------ */
function mytheme_doctor_meta() {
    add_meta_box(
        'doctor_details',
        'Doctor Information',
        'mytheme_doctor_meta_callback',
        'doctor',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes','mytheme_doctor_meta');


function mytheme_doctor_meta_callback($post){

    $specialty   = get_post_meta($post->ID,'_specialty',true);
    $experience  = get_post_meta($post->ID,'_experience',true);
    $description = get_post_meta($post->ID,'_description',true);
    ?>

    <p>
        <label><strong>Specialty</strong></label><br>
        <input type="text" name="specialty" value="<?php echo esc_attr($specialty); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Experience (Years)</strong></label><br>
        <input type="number" name="experience" value="<?php echo esc_attr($experience); ?>" style="width:100%;">
    </p>

    <p>
        <label><strong>Description</strong></label><br>
        <textarea name="description" style="width:100%;height:100px;"><?php echo esc_textarea($description); ?></textarea>
    </p>

    <?php
}


/* ------------------------------
Save Doctor Meta
------------------------------ */
function mytheme_save_doctor_meta($post_id){

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if(isset($_POST['specialty']))
        update_post_meta($post_id,'_specialty',sanitize_text_field($_POST['specialty']));

    if(isset($_POST['experience']))
        update_post_meta($post_id,'_experience',sanitize_text_field($_POST['experience']));

    if(isset($_POST['description']))
        update_post_meta($post_id,'_description',sanitize_textarea_field($_POST['description']));
}
add_action('save_post','mytheme_save_doctor_meta');

?>
<?php 

function jubha_display_doctors() {

    $doctors = new WP_Query([
        'post_type' => 'doctor',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'ASC'
    ]);

    if(!$doctors->have_posts()){
        return '<p>No doctors found.</p>';
    }

    ob_start(); ?>

    <div class="doctor-grid">

        <?php while($doctors->have_posts()): $doctors->the_post();

            $specialty   = get_post_meta(get_the_ID(), '_specialty', true);
            $experience  = get_post_meta(get_the_ID(), '_experience', true);
            $description = get_post_meta(get_the_ID(), '_description', true);
        ?>

        <div class="doctor-card">
            <div class="doctor-photo">
                <?php if(has_post_thumbnail()) the_post_thumbnail('medium'); ?>
            </div>

            <div class="doctor-info">
                <h3><?php the_title(); ?></h3>
                <p class="doctor-specialty"><?php echo esc_html($specialty); ?></p>
                <p class="doctor-experience"><?php echo esc_html($experience); ?> Years Experience</p>
                <p class="doctor-description"><?php echo esc_html($description); ?></p>
            </div>
        </div>

        <?php endwhile; wp_reset_postdata(); ?>

    </div>

    <?php
    return ob_get_clean();
}

function jubha_enqueue_styles() {
    // Main theme style
    wp_enqueue_style(
        'jubha-style',
        get_stylesheet_uri()
    );

    // Header CSS
    wp_enqueue_style(
        'jubha-header',
        get_template_directory_uri() . '/stylesheet/header.css',
        array('jubha-style'),
        filemtime(get_template_directory() . '/stylesheet/header.css')
    );

    // Footer CSS
    wp_enqueue_style(
        'jubha-footer',
        get_template_directory_uri() . '/stylesheet/footer.css',
        array('jubha-style'),
        filemtime(get_template_directory() . '/stylesheet/footer.css')
    );
}
add_action('wp_enqueue_scripts', 'jubha_enqueue_styles');

function register_doctor_cpt() {
    $args = [
        'label' => 'Doctors',
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'doctor'], // this defines URL /doctor/{slug}
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true, // optional if using Gutenberg
    ];
    register_post_type('doctor', $args);
}
add_action('init', 'register_doctor_cpt');
function jubha_assets() {
    wp_enqueue_style(
        'find-doctor',
        get_template_directory_uri() . '/stylesheet/find-the-doctor.css',
        [],
        time()
    );
}
add_action('wp_enqueue_scripts', 'jubha_assets');
function jubha_load_css() {
    wp_enqueue_style(
        'jubha-doctor',
        get_template_directory_uri() . '/stylesheet/find-the-doctor.css',
        [],
        time()
    );
    function baa_frontend_styles() {
    wp_enqueue_style(
        'baa-appointment-style',
        get_template_directory_uri() . '/stylesheet/appointment.css',
        [],
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'baa_frontend_styles');
function baa_frontend_styles() {
    wp_enqueue_style(
        'baa-appointment-style',
        get_template_directory_uri() . '/stylesheet/appointment.css',
        [],
        '1.0'
    );
}
add_action('wp_enqueue_scripts', 'baa_frontend_styles');


}
<?php
/*
Plugin Name: Classic Editor
Description: Make a book appointment for patient to meet the doctor.
Version: 1.0.0
Author: dariyatum
*/

/* ======================================================
   CREATE PATIENT TABLE (ON PLUGIN ACTIVATION AND ADMIN LOAD)
====================================================== */
function baa_create_patient_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'baa_patients';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        phone varchar(20) NOT NULL,
        dob date NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}

// Run on plugin activation
register_activation_hook(__FILE__, 'baa_create_patient_table');

// Also run every admin load to ensure table exists
add_action('admin_init', 'baa_create_patient_table');

/* ======================================================
   SIDEBAR WIDGET
====================================================== */
function mytheme_widgets_init() {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'main-sidebar',
    ));
}
add_action('widgets_init', 'mytheme_widgets_init');

/* ======================================================
   MAIN ADMIN MENU
====================================================== */
function baa_register_admin_menu() {
    add_menu_page(
        'Book an Appointment',
        'Book Appointment',
        'manage_options',
        'book-an-appointment',
        'baa_main_admin_page',
        'dashicons-calendar',
        26
    );
}
add_action('admin_menu', 'baa_register_admin_menu');

function baa_main_admin_page() {
    echo '<div class="wrap"><h1>Book an Appointment</h1></div>';
}

/* ======================================================
   SUB MENUS
====================================================== */
function baa_register_submenus() {

    add_submenu_page(
        'book-an-appointment',
        'Doctor',
        'Doctor',
        'manage_options',
        'baa-doctor',
        'baa_doctor_page'
    );

    add_submenu_page(
        'book-an-appointment',
        'Patient',
        'Patient',
        'manage_options',
        'baa-patient',
        'baa_patient_page'
    );

    add_submenu_page(
        'book-an-appointment',
        'Appointment',
        'Appointment',
        'manage_options',
        'baa-appointment',
        'baa_appointment_page'
    );
}
add_action('admin_menu', 'baa_register_submenus');

/* ======================================================
   SUBMENU PAGES
====================================================== */
function baa_doctor_page() {
    echo '<div class="wrap"><h2>Doctor Management</h2></div>';
}

/* ------------------ PATIENT PAGE + FORM + LIST ------------------ */
function baa_patient_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'baa_patients';
    $patients = $wpdb->get_results("SELECT * FROM $table_name ORDER BY id DESC");

    ?>
    <div class="wrap">
        <h2>Patient Management</h2>

        <!-- SUCCESS MESSAGE -->
        <?php if (isset($_GET['success'])) : ?>
            <div class="notice notice-success">
                <p>Patient saved successfully!</p>
            </div>
        <?php endif; ?>

        <!-- PATIENT FORM -->
        <form method="post">
            <?php wp_nonce_field('baa_add_patient', 'baa_patient_nonce'); ?>

            <table class="form-table">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td><input type="text" name="phone" required></td>
                </tr>
                <tr>
                    <th>DOB</th>
                    <td><input type="date" name="dob" required></td>
                </tr>
            </table>

            <input type="submit" name="baa_submit_patient" class="button button-primary" value="Create Patient">
        </form>

        <hr>

        <!-- PATIENT LIST -->
        <h2>All Patients</h2>

        <table class="widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($patients) : ?>
                    <?php foreach ($patients as $patient) : ?>
                        <tr>
                            <td><?php echo esc_html($patient->id); ?></td>
                            <td><?php echo esc_html($patient->name); ?></td>
                            <td><?php echo esc_html($patient->phone); ?></td>
                            <td><?php echo esc_html($patient->dob); ?></td>
                            <td><?php echo esc_html($patient->created_at); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No patients found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

/* ------------------ APPOINTMENT PAGE ------------------ */
function baa_appointment_page() {
    echo '<div class="wrap"><h2>Appointment Management</h2></div>';
}

/* ======================================================
   HANDLE PATIENT FORM SUBMIT
====================================================== */
add_action('admin_init', 'baa_handle_patient_form');

function baa_handle_patient_form() {

    if (!isset($_POST['baa_submit_patient'])) {
        return;
    }

    if (!isset($_POST['baa_patient_nonce']) ||
        !wp_verify_nonce($_POST['baa_patient_nonce'], 'baa_add_patient')) {
        return;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'baa_patients';

    $wpdb->insert(
        $table_name,
        array(
            'name'  => sanitize_text_field($_POST['name']),
            'phone' => sanitize_text_field($_POST['phone']),
            'dob'   => sanitize_text_field($_POST['dob']),
        )
    );

    wp_redirect(admin_url('admin.php?page=baa-patient&success=1'));
    exit;
}

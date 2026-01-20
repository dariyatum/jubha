<?php
/*
Plugin Name: Book an Appointment
Description: Appointment booking system for doctors and patients.
Version: 1.0.0
Author: dariyatum
*/

if (!defined('ABSPATH')) exit;

/* ======================================================
   CREATE TABLES
====================================================== */
function baa_create_tables() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $patients = $wpdb->prefix . 'baa_patients';
    $doctors = $wpdb->prefix . 'baa_doctors';
    $appointments = $wpdb->prefix . 'baa_appointments';

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    dbDelta("CREATE TABLE $patients (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        phone varchar(20) NOT NULL,
        dob date NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;");

    dbDelta("CREATE TABLE $doctors (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(100) NOT NULL,
        specialty varchar(100) NOT NULL,
        phone varchar(20),
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;");

    dbDelta("CREATE TABLE $appointments (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        patient_id mediumint(9) NOT NULL,
        doctor_id mediumint(9) NOT NULL,
        appointment_date datetime NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;");
    
}

register_activation_hook(__FILE__, 'baa_create_tables');
add_action('admin_init', 'baa_create_tables');

/* ======================================================
   ADMIN MENU
====================================================== */
add_action('admin_menu', function () {

    add_menu_page(
        'Book Appointment',
        'Book Appointment',
        'manage_options',
        'baa-dashboard',
        'baa_dashboard',
        'dashicons-calendar',
        26
    );

    add_submenu_page(
        'baa-dashboard',
        'Doctors',
        'Doctors',
        'manage_options',
        'baa-doctors',
        'baa_doctor_page'
    );

    add_submenu_page(
        'baa-dashboard',
        'Patients',
        'Patients',
        'manage_options',
        'baa-patients',
        'baa_patient_page'
    );

    add_submenu_page(
        'baa-dashboard',
        'Appointments',
        'Appointments',
        'manage_options',
        'baa-appointments',
        'baa_appointment_page'
    );
});

function baa_dashboard() {
    echo '<div class="wrap"><h1>Appointment System</h1></div>';
}

/* ======================================================
   PATIENT PAGE
====================================================== */
function baa_patient_page() {
    global $wpdb;
    $table = $wpdb->prefix . 'baa_patients';
    $patients = $wpdb->get_results("SELECT * FROM $table ORDER BY id DESC");
    ?>
    <div class="wrap">
        <h1>Patients</h1>

        <?php if (isset($_GET['success'])) : ?>
            <div class="notice notice-success"><p>Saved successfully!</p></div>
        <?php endif; ?>

        <form method="post">
            <?php wp_nonce_field('baa_add_patient'); ?>
            <table class="form-table">
                <tr><th>Name</th><td><input name="name" required></td></tr>
                <tr><th>Phone</th><td><input name="phone" required></td></tr>
                <tr><th>DOB</th><td><input type="date" name="dob" required></td></tr>
            </table>
            <input type="submit" name="add_patient" class="button button-primary" value="Add Patient">
        </form>

        <hr>

        <table class="widefat striped">
            <thead><tr><th>ID</th><th>Name</th><th>Phone</th><th>DOB</th></tr></thead>
            <tbody>
                <?php foreach ($patients as $p) : ?>
                <tr>
                    <td><?= $p->id ?></td>
                    <td><?= esc_html($p->name) ?></td>
                    <td><?= esc_html($p->phone) ?></td>
                    <td><?= esc_html($p->dob) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php }

/* HANDLE PATIENT */
add_action('admin_init', function () {
    if (!isset($_POST['add_patient'])) return;
    check_admin_referer('baa_add_patient');

    global $wpdb;
    $wpdb->insert($wpdb->prefix . 'baa_patients', [
        'name' => sanitize_text_field($_POST['name']),
        'phone' => sanitize_text_field($_POST['phone']),
        'dob' => sanitize_text_field($_POST['dob']),
    ]);

    wp_redirect(admin_url('admin.php?page=baa-patients&success=1'));
    exit;
});

/* ======================================================
   DOCTOR PAGE
====================================================== */
function baa_doctor_page() {
    global $wpdb;
    $table = $wpdb->prefix . 'baa_doctors';
    $doctors = $wpdb->get_results("SELECT * FROM $table ORDER BY id DESC");
    ?>
    <div class="wrap">
        <h1>Doctors</h1>

        <?php if (isset($_GET['success'])) : ?>
            <div class="notice notice-success"><p>Saved successfully!</p></div>
        <?php endif; ?>

        <form method="post">
            <?php wp_nonce_field('baa_add_doctor'); ?>
            <table class="form-table">
                <tr><th>Name</th><td><input name="name" required></td></tr>
                <tr><th>Specialty</th><td><input name="specialty" required></td></tr>
                <tr><th>Phone</th><td><input name="phone"></td></tr>
            </table>
            <input type="submit" name="add_doctor" class="button button-primary" value="Add Doctor">
        </form>

        <hr>

        <table class="widefat striped">
            <thead><tr><th>ID</th><th>Name</th><th>Specialty</th><th>Phone</th></tr></thead>
            <tbody>
                <?php foreach ($doctors as $d) : ?>
                <tr>
                    <td><?= $d->id ?></td>
                    <td><?= esc_html($d->name) ?></td>
                    <td><?= esc_html($d->specialty) ?></td>
                    <td><?= esc_html($d->phone) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php }

/* HANDLE DOCTOR */
add_action('admin_init', function () {
    if (!isset($_POST['add_doctor'])) return;
    check_admin_referer('baa_add_doctor');

    global $wpdb;
    $wpdb->insert($wpdb->prefix . 'baa_doctors', [
        'name' => sanitize_text_field($_POST['name']),
        'specialty' => sanitize_text_field($_POST['specialty']),
        'phone' => sanitize_text_field($_POST['phone']),
    ]);

    wp_redirect(admin_url('admin.php?page=baa-doctors&success=1'));
    exit;
});

/* ======================================================
   APPOINTMENT PAGE
====================================================== */
function baa_appointment_page() {
    global $wpdb;

    $patients = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}baa_patients");
    $doctors = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}baa_doctors");

    $appointments = $wpdb->get_results("
        SELECT a.*, p.name AS patient, d.name AS doctor
        FROM {$wpdb->prefix}baa_appointments a
        JOIN {$wpdb->prefix}baa_patients p ON p.id = a.patient_id
        JOIN {$wpdb->prefix}baa_doctors d ON d.id = a.doctor_id
        ORDER BY a.id DESC
    ");
    ?>
    <div class="wrap">
        <h1>Appointments</h1>

        <?php if (isset($_GET['success'])) : ?>
            <div class="notice notice-success"><p>Appointment booked!</p></div>
        <?php endif; ?>

        <form method="post">
            <?php wp_nonce_field('baa_add_appointment'); ?>
            <table class="form-table">
                <tr>
                    <th>Patient</th>
                    <td>
                        <select name="patient_id" required>
                            <?php foreach ($patients as $p) : ?>
                                <option value="<?= $p->id ?>"><?= esc_html($p->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Doctor</th>
                    <td>
                        <select name="doctor_id" required>
                            <?php foreach ($doctors as $d) : ?>
                                <option value="<?= $d->id ?>"><?= esc_html($d->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><input type="datetime-local" name="date" required></td>
                </tr>
            </table>
            <input type="submit" name="add_appointment" class="button button-primary" value="Book Appointment">
        </form>

        <hr>

        <table class="widefat striped">
            <thead><tr><th>ID</th><th>Patient</th><th>Doctor</th><th>Date</th></tr></thead>
            <tbody>
                <?php foreach ($appointments as $a) : ?>
                <tr>
                    <td><?= $a->id ?></td>
                    <td><?= esc_html($a->patient) ?></td>
                    <td><?= esc_html($a->doctor) ?></td>
                    <td><?= esc_html($a->appointment_date) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php }

/* HANDLE APPOINTMENT */
add_action('admin_init', function () {
    if (!isset($_POST['add_appointment'])) return;
    check_admin_referer('baa_add_appointment');

    global $wpdb;
    $wpdb->insert($wpdb->prefix . 'baa_appointments', [
        'patient_id' => intval($_POST['patient_id']),
        'doctor_id' => intval($_POST['doctor_id']),
        'appointment_date' => sanitize_text_field($_POST['date']),
    ]);

    wp_redirect(admin_url('admin.php?page=baa-appointments&success=1'));
    exit;
});
register_activation_hook(__FILE__, 'daa_create_table');
add_action('baa_user_registered', function ($account_id) {
    global $wpdb;

    // Example: auto-create patient record
    $account = $wpdb->get_row(
        $wpdb->prepare(
            "SELECT * FROM {$wpdb->prefix}baa_accounts WHERE id = %d",
            $account_id
        )
    );

    if ($account) {
        $wpdb->insert($wpdb->prefix . 'baa_patients', [
            'name'  => $account->name,
            'phone' => $account->phone,
            'dob'   => '2000-01-01', // placeholder
        ]);
    }
});

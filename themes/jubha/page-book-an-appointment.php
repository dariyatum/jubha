<?php
/* Template Name: Book Appointment */
get_header();
global $wpdb;

if (!session_id()) session_start();

$user_id = $_SESSION['baa_user_id'] ?? null;

// Get all appointments
$appointments = $wpdb->get_results("
    SELECT a.id, p.name AS patient, p.dob AS dob, d.name AS doctor, a.appointment_date
    FROM {$wpdb->prefix}baa_appointments a
    JOIN {$wpdb->prefix}baa_patients p ON p.id = a.patient_id
    JOIN {$wpdb->prefix}baa_doctors d ON d.id = a.doctor_id
    ORDER BY a.id DESC
");

// Get logged-in user's patient info
if ($user_id) {
    $account = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}baa_accounts WHERE id=%d",
        $user_id
    ));

    $patient = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}baa_patients WHERE name=%s",
        $account->name
    ));
}

// Handle booking
if (isset($_POST['book']) && $patient) {
    $wpdb->insert($wpdb->prefix.'baa_appointments', [
        'patient_id' => $patient->id,
        'doctor_id'  => intval($_POST['doctor_id']),
        'appointment_date' => sanitize_text_field($_POST['date']),
    ]);
    $appointments = $wpdb->get_results("
        SELECT a.id, p.name AS patient, p.dob AS dob, d.name AS doctor, a.appointment_date
        FROM {$wpdb->prefix}baa_appointments a
        JOIN {$wpdb->prefix}baa_patients p ON p.id = a.patient_id
        JOIN {$wpdb->prefix}baa_doctors d ON d.id = a.doctor_id
        ORDER BY a.id DESC
    ");
}
?>

<div class="baa-container">
    <h2>Appointment List</h2>
    <table>
        <tr><th>ID</th><th>Patient</th><th>DOB</th><th>Doctor</th><th>Date</th></tr>
        <?php foreach ($appointments as $a): ?>
        <tr>
            <td><?= $a->id ?></td>
            <td><?= esc_html($a->patient) ?></td>
            <td><?= esc_html($a->dob) ?></td>
            <td><?= esc_html($a->doctor) ?></td>
            <td><?= esc_html($a->appointment_date) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php if (!$user_id): ?>
        <div class="baa-locked">
            <p>You must <a href="<?= site_url('/signup') ?>">register</a> to book an appointment.</p>
        </div>
    <?php else: ?>
        <h2>Book Appointment</h2>
        <form method="post">
            <p><strong>Patient:</strong> <?= esc_html($patient->name) ?></p>
            <p><strong>DOB:</strong> <?= esc_html($patient->dob) ?></p>

            <select name="doctor_id" required>
                <?php
                $doctors = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}baa_doctors");
                foreach ($doctors as $d):
                ?>
                    <option value="<?= $d->id ?>"><?= esc_html($d->name) ?></option>
                <?php endforeach; ?>
            </select>

            <input type="datetime-local" name="date" required>
            <button type="submit" name="book">Book Appointment</button>
        </form>
    <?php endif; ?>
</div>

<style>
.baa-container {
    max-width: 900px;
    margin: 40px auto;
    padding: 30px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    font-family: "Segoe UI", Arial, sans-serif;
}
.baa-container h2 { text-align: center; color: #222; margin-bottom: 25px; }
.baa-container table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
.baa-container th, .baa-container td { padding: 12px; border-bottom: 1px solid #eee; text-align: left; }
.baa-container tr:hover { background: #f9fbff; }
.baa-container select, .baa-container input[type="datetime-local"] { width: 100%; padding: 12px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #ddd; }
.baa-container button { background: #0073aa; color: #fff; border: none; padding: 14px; border-radius: 8px; cursor: pointer; font-weight: 600; width: 100%; }
.baa-container button:hover { background: #005177; }
.baa-locked { background: #fff3cd; padding: 20px; border-radius: 10px; text-align: center; color: #664d03; margin-top: 20px; }
.baa-locked a { background: #0073aa; color: #fff; padding: 10px 15px; border-radius: 8px; text-decoration: none; font-weight: 600; }
.baa-locked a:hover { background: #005177; }
</style>

<?php get_footer(); ?>

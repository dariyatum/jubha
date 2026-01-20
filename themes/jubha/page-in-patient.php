<?php
/*
Template Name: Book an Appointment
*/

get_header();
global $wpdb;
session_start();

// Fetch doctors
$doctors = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}baa_doctors ORDER BY name ASC");

// Handle booking submission
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_appointment'])) {
    if (!isset($_SESSION['visitor_id'])) {
        $error = "You must register first before booking.";
    } else {
        $patient_id = intval($_SESSION['visitor_id']);
        $doctor_id = intval($_POST['doctor_id']);
        $date = sanitize_text_field($_POST['date']);

        if (!$doctor_id || !$date) {
            $error = "Please select doctor and date.";
        } else {
            $wpdb->insert($wpdb->prefix . 'baa_appointments', [
                'patient_id' => $patient_id,
                'doctor_id' => $doctor_id,
                'appointment_date' => $date,
            ]);
            $success = "Appointment booked successfully!";
        }
    }
}

// Get visitor info
$patient = null;
if (isset($_SESSION['visitor_id'])) {
    $patient = $wpdb->get_row($wpdb->prepare(
        "SELECT * FROM {$wpdb->prefix}baa_accounts WHERE id = %d",
        $_SESSION['visitor_id']
    ));
}

// Get visitor appointments
$appointments = [];
if ($patient) {
    $appointments = $wpdb->get_results("
        SELECT a.id, d.name AS doctor, a.appointment_date AS date
        FROM {$wpdb->prefix}baa_appointments a
        JOIN {$wpdb->prefix}baa_doctors d ON d.id = a.doctor_id
        WHERE a.patient_id = {$patient->id}
        ORDER BY a.appointment_date ASC
    ");
}
?>

<style>
.baa-container { max-width: 700px; margin: 40px auto; font-family: Arial, sans-serif; }
.baa-section { background: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 30px;}
.baa-section h2 { margin-top: 0; }
.baa-form input, .baa-form select { width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 4px; border: 1px solid #ccc; }
.baa-form input[type="submit"] { background: #0073aa; color: #fff; border: none; cursor: pointer; transition: 0.3s; }
.baa-form input[type="submit"]:hover { background: #005177; }
.baa-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
.baa-table th, .baa-table td { border: 1px solid #ccc; padding: 10px; text-align: left; }
.baa-table th { background: #eee; }
.baa-success { padding: 10px; background: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 15px; }
.baa-error { padding: 10px; background: #f8d7da; color: #721c24; border-radius: 5px; margin-bottom: 15px; }
</style>

<div class="baa-container">

<?php if (!$patient): ?>
    <div class="baa-error">
        You must <a href="<?= get_permalink( get_page_by_path('signup') ) ?>">register</a> before booking an appointment.
    </div>
<?php else: ?>

    <div class="baa-section">
        <h2>Book an Appointment</h2>

        <?php if ($success) echo "<div class='baa-success'>{$success}</div>"; ?>
        <?php if ($error) echo "<div class='baa-error'>{$error}</div>"; ?>

        <form method="post" class="baa-form">
            <label>Name</label>
            <input type="text" value="<?= esc_html($patient->name) ?>" readonly>

            <label>Email</label>
            <input type="email" value="<?= esc_html($patient->email) ?>" readonly>

            <label>Doctor</label>
            <select name="doctor_id" required>
                <option value="">-- Select Doctor --</option>
                <?php foreach ($doctors as $d): ?>
                    <option value="<?= $d->id ?>"><?= esc_html($d->name) ?></option>
                <?php endforeach; ?>
            </select>

            <label>Date & Time</label>
            <input type="datetime-local" name="date" required>

            <input type="submit" name="book_appointment" value="Book Appointment">
        </form>
    </div>

    <?php if (!empty($appointments)): ?>
    <div class="baa-section">
        <h2>My Appointments</h2>
        <table class="baa-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $a): ?>
                    <tr>
                        <td><?= $a->id ?></td>
                        <td><?= esc_html($a->doctor) ?></td>
                        <td><?= esc_html($a->date) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>

<?php endif; ?>

</div>

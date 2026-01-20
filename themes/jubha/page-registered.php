<?php
/*
Template Name: Book an Appointment
*/

get_header();
global $wpdb;

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['add_patient'])) {
        $wpdb->insert($wpdb->prefix . 'baa_patients', [
            'name' => sanitize_text_field($_POST['name']),
            'phone' => sanitize_text_field($_POST['phone']),
            'dob' => sanitize_text_field($_POST['dob']),
        ]);
        echo '<div class="baa-success">Patient added successfully!</div>';
    }

    if (isset($_POST['add_doctor'])) {
        $wpdb->insert($wpdb->prefix . 'baa_doctors', [
            'name' => sanitize_text_field($_POST['name']),
            'specialty' => sanitize_text_field($_POST['specialty']),
            'phone' => sanitize_text_field($_POST['phone']),
        ]);
        echo '<div class="baa-success">Doctor added successfully!</div>';
    }

    if (isset($_POST['add_appointment'])) {
        $wpdb->insert($wpdb->prefix . 'baa_appointments', [
            'patient_id' => intval($_POST['patient_id']),
            'doctor_id' => intval($_POST['doctor_id']),
            'appointment_date' => sanitize_text_field($_POST['date']),
        ]);
        echo '<div class="baa-success">Appointment booked successfully!</div>';
    }
}

// Fetch data
$patients = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}baa_patients ORDER BY id DESC");
$doctors = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}baa_doctors ORDER BY id DESC");
$appointments = $wpdb->get_results("
    SELECT a.*, p.name AS patient, d.name AS doctor
    FROM {$wpdb->prefix}baa_appointments a
    JOIN {$wpdb->prefix}baa_patients p ON p.id = a.patient_id
    JOIN {$wpdb->prefix}baa_doctors d ON d.id = a.doctor_id
    ORDER BY a.id DESC
");
?>

<style>
.baa-container { max-width: 1000px; margin: 20px auto; font-family: Arial, sans-serif; }
.baa-section { background: #f9f9f9; padding: 20px; margin-bottom: 30px;margin-top:100px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);}
.baa-section h2 { margin-top: 0; color: #333; }
.baa-form table { width: 100%; margin-bottom: 10px; }
.baa-form th { text-align: left; padding: 8px; width: 150px; }
.baa-form td { padding: 8px; }
.baa-form input, .baa-form select { width: 100%; padding: 6px 8px; border-radius: 4px; border: 1px solid #ccc; }
.baa-form input[type="submit"] { width: auto; background: #9a7787; color: white; border: none; cursor: pointer; transition: 0.3s; }
.baa-form input[type="submit"]:hover { background: #6c525eff; }
.baa-table { width: 100%; border-collapse: collapse; margin-top: 10px; }
.baa-table th, .baa-table td { border: 1px solid #ccc; padding: 8px; text-align: left; }
.baa-table th { background: #eee; }
.baa-success { padding: 10px; background: #d4edda; color: #155724; border-radius: 5px; margin-bottom: 15px; }
</style>

<div class="baa-container">

    <!-- Patients Section -->
    <div class="baa-section">
        <h2>Patients</h2>
        <form method="post" class="baa-form">
            <table>
                <tr><th>Name</th><td><input name="name" required></td></tr>
                <tr><th>Phone</th><td><input name="phone" required></td></tr>
                <tr><th>DOB</th><td><input type="date" name="dob" required></td></tr>
            </table>
            <input type="submit" name="add_patient" value="Add Patient">
        </form>

        
    </div>

    <!-- Appointments Section -->
    <div class="baa-section">
        <h2>Appointments</h2>
        <form method="post" class="baa-form">
            <table>
                <tr>
                    <th>Patient</th>
                    <td>
                        <select name="patient_id" required>
                            <?php foreach ($patients as $p): ?>
                                <option value="<?= $p->id ?>"><?= esc_html($p->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Doctor</th>
                    <td>
                        <select name="doctor_id" required>
                            <?php foreach ($doctors as $d): ?>
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
            <input type="submit" name="add_appointment" value="Book Appointment">
        </form>

        <table class="baa-table">
            <thead><tr><th>ID</th><th>Patient</th><th>Doctor</th><th>Date</th></tr></thead>
            <tbody>
            <?php foreach ($appointments as $a): ?>
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

</div>

<?php get_footer(); ?>

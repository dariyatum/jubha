
<?php get_header();?>
<div class="baa-container">
    <h2>Register Account</h2>

    <?php if ($error): ?>
        <div class="baa-error"><?= esc_html($error) ?></div>
    <?php endif; ?>
        <!-- Patients Section -->
    <div class="baa-section">
        <h2>Registered</h2>
    <form method="post">
            <table>
                <tr><th>Name</th><td><input name="user-name"></td></tr>
                <tr><th>Phone</th><td><input name="user-phone"></td></tr>
                <tr><th>DOB</th><td><input type="date" name="user-dob"></td></tr>
            </table>
            <input type="submit" name="add_patient">
        </form>

        
    </div>
</div>
<?php
/* Template Name: Signup */
global $wpdb;
// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_patient'])) {
        $wpdb->insert($wpdb->prefix . 'baa_patients', [
            'name' => sanitize_text_field($_POST['user-name']),
            'phone' => sanitize_text_field($_POST['user-phone']),
            'dob' => sanitize_text_field($_POST['user-dob']),
        ]);

    wp_redirect(home_url('registered'));
    }
    
}

if (!session_id()) session_start();

$error = '';


?>
<style>
.baa-container {
    max-width: 500px;
    margin: 50px auto;
    padding: 30px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    font-family: Arial, sans-serif;
}
.baa-container h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #222;
}
.baa-container input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}
.baa-container input[type="submit"] {
    background: #0073aa;
    color: #fff;
    border: none;
    cursor: pointer;
    font-weight: 600;
    transition: 0.3s;
}
.baa-container input[type="submit"]:hover {
    background: #005177;
}
.baa-error {
    background: #fdecea;
    color: #842029;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
    text-align: center;
}
</style>

<?php get_footer(); ?>

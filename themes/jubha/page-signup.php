<?php

/*
Template Name: Signup
*/


get_header();
global $wpdb;
session_start();

$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        $error = "Please fill in all required fields.";
    } elseif (!is_email($email)) {
        $error = "Invalid email address.";
    } else {
        // Check if email already exists
        $exists = $wpdb->get_var($wpdb->prepare(
            "SELECT COUNT(*) FROM {$wpdb->prefix}baa_accounts WHERE email = %s",
            $email
        ));

        if ($exists) {
            $error = "This email is already registered.";
        } else {
            // Hash the password and insert account
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $wpdb->insert($wpdb->prefix . 'baa_accounts', [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'password' => $hashed_password,
            ]);

            // Set session for the visitor
            $_SESSION['visitor_id'] = $wpdb->insert_id;
            // Get inserted user ID
$account_id = $wpdb->insert_id;

// 🔥 CUSTOM ACTION HOOK (THIS IS WHAT YOU ASKED FOR)
do_action('baa_user_registered', $account_id);

// Save login session
$_SESSION['visitor_id'] = $account_id;

// Redirect to Book Appointment page
$book_page = get_permalink(get_page_by_path('book-an-appointment'));var_dump($book_page);
wp_redirect($book_page);

            // Redirect to book-an-appointment page
            $book_page = get_permalink( get_page_by_path('book-an-appointment') );
            if ($book_page) {
                wp_redirect($book_page);
                
                exit;
            }
        }
    }
}
?>

<style>
.baa-container { max-width: 500px; margin: 50px auto; font-family: Arial, sans-serif; background: #f9f9f9; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); margin-top:100px;}
.baa-container h2 { margin-top: 0; }
.baa-container input { width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 4px; border: 1px solid #ccc; }
.baa-container .btn { background: #9a7787; color: #fff; border: none; cursor: pointer; transition: 0.3s; padding:8px 5px; border-radius:5px;}
.baa-container .btn:hover { background: #725a65ff; padding:8px 5px; border-radius:5px;}
.baa-error { padding: 10px; background: #f8d7da; color: #721c24; border-radius: 5px; margin-bottom: 15px; }
</style>

<div class="baa-container">
    <h2>Register Account</h2>

    <?php if ($error): ?>
        <div class="baa-error"><?= esc_html($error) ?></div>
    <?php endif; ?>

   <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone (optional)">
    <input type="password" name="password" placeholder="Password" required>

    <?php wp_nonce_field('baa_register_user', 'baa_nonce'); ?>

<a href="<?php echo get_permalink(get_page_by_path('registered')); ?>" class="btn">
    Register
</a>


    
</form>
</div>

<?php get_footer(); ?>

<?php
/**
 * Simple Sign-up Form with Honeypot
 * Handles form submission and validation
 */

function handle_signup_form_submission() {
    if (isset($_POST['signup_submit'])) {
        // Check honeypot (should be empty)
        if (!empty($_POST['website'])) {
            wp_die('Spam detected.');
        }

        // Validate required fields
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);

        if (empty($name) || empty($email) || empty($phone)) {
            echo '<div class="error-message">Please fill in all fields.</div>';
            return;
        }

        if (!is_email($email)) {
            echo '<div class="error-message">Please enter a valid email address.</div>';
            return;
        }

        // Process signup (e.g., save to database or send email)
        // For demo, we'll just show a success message
        echo '<div class="success-message">Thank you for signing up! We\'ll be in touch soon.</div>';

        // In a real implementation, you might:
        // - Save to a custom table or use a plugin like Mailchimp
        // - Send confirmation email
        // - Add to a mailing list
    }
}
add_action('init', 'handle_signup_form_submission');

/**
 * Display the sign-up form
 */
function display_signup_form() {
    ?>
    <form method="post" action="" class="signup-form">
        <div class="form-group">
            <label for="name">שם מלא (Full Name):</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">כתובת אימייל (Email):</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">מספר טלפון (Phone Number):</label>
            <input type="tel" id="phone" name="phone" required>
        </div>

        <!-- Honeypot field (hidden from users) -->
        <div class="honeypot" style="display: none;">
            <label for="website">Website (leave empty):</label>
            <input type="text" id="website" name="website">
        </div>

        <button type="submit" name="signup_submit" class="signup-btn">הרשמה למפגש הראשון – חינם (Sign Up for Free Session)</button>
    </form>
    <?php
}
?>

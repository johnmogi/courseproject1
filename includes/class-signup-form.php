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
        $name  = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $notes = isset($_POST['notes']) ? sanitize_textarea_field($_POST['notes']) : '';
        $source = isset($_POST['form_source']) ? sanitize_text_field($_POST['form_source']) : 'course-landing';

        if (empty($name) || empty($email) || empty($phone)) {
            echo '<div class="error-message">Please fill in all fields.</div>';
            return;
        }

        if (!is_email($email)) {
            echo '<div class="error-message">Please enter a valid email address.</div>';
            return;
        }

        $post_id = wp_insert_post(array(
            'post_type'   => 'course_signup',
            'post_status' => 'publish',
            'post_title'  => $name . ' – ' . current_time('Y-m-d H:i'),
            'meta_input'  => array(
                'signup_name'   => $name,
                'signup_email'  => $email,
                'signup_phone'  => $phone,
                'signup_notes'  => $notes,
                'signup_source' => $source,
            ),
        ));

        if (is_wp_error($post_id)) {
            echo '<div class="error-message">אירעה שגיאה בשמירת הפרטים. נסו שוב.</div>';
            return;
        }

        echo '<div class="success-message">תודה! הפרטים נקלטו ונחזור אליך עם כל המידע.</div>';
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

        <div class="form-group">
            <label for="notes">כמה מילים על המטרה שלך:</label>
            <textarea id="notes" name="notes" rows="3" placeholder="למשל: אתר ללקוח קיים, פרויקט חדש, או חיזוק יכולת עם AI"></textarea>
        </div>

        <!-- Honeypot field (hidden from users) -->
        <div class="honeypot" style="display: none;">
            <label for="website">Website (leave empty):</label>
            <input type="text" id="website" name="website">
        </div>

        <input type="hidden" name="form_source" value="course-landing" />
        <button type="submit" name="signup_submit" class="signup-btn">הרשמה למפגש הראשון – חינם (Sign Up for Free Session)</button>
    </form>
    <?php
}

function display_hero_lead_form() {
    ?>
    <form method="post" action="" class="hero-lead-form">
        <label class="sr-only" for="hero-phone">מספר טלפון</label>
        <input type="tel" id="hero-phone" name="phone" placeholder="מספר טלפון" required>
        <input type="hidden" name="name" value="חבר קהילה (שם יגיע בהמשך)">
        <input type="hidden" name="email" value="pending@example.com">
        <input type="hidden" name="form_source" value="hero-mini-form">
        <div class="honeypot" style="display:none;">
            <label for="hero-website">Website (leave empty):</label>
            <input type="text" id="hero-website" name="website">
        </div>
        <button type="submit" name="signup_submit" class="hero-submit-btn">להתחיל חינם – ללא התחייבות</button>
        <p class="mini-form-note">* נחזור אליך עם פרטי ההתחברות למפגש הקרוב.</p>
    </form>
    <?php
}

function display_appointment_modal_form() {
    ?>
    <form method="post" action="" class="appointment-modal-form">
        <div class="form-group">
            <label for="modal-name">שם מלא</label>
            <input type="text" id="modal-name" name="name" placeholder="שם מלא" required>
        </div>
        <div class="form-group">
            <label for="modal-email">אימייל</label>
            <input type="email" id="modal-email" name="email" placeholder="name@example.com" required>
        </div>
        <div class="form-group">
            <label for="modal-phone">טלפון</label>
            <input type="tel" id="modal-phone" name="phone" placeholder="050-0000000" required>
        </div>
        <input type="hidden" id="appointment-modal-notes" name="notes" value="">
        <input type="hidden" name="form_source" value="appointment-modal">
        <div class="honeypot" style="display:none;">
            <label for="modal-website">Website (leave empty):</label>
            <input type="text" id="modal-website" name="website">
        </div>
        <button type="submit" name="signup_submit" class="appointment-modal-submit">לתאם שיחה</button>
    </form>
    <?php
}
?>

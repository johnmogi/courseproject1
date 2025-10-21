<?php
/**
 * Template Name: Course Landing Page
 * Description: Homepage for the WordPress course with AI
 */

// Include the sign-up form handler
require_once get_stylesheet_directory() . '/includes/class-signup-form.php';

get_header();
?>

<div class="course-landing-page">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>🎓 קורס: פיתוח אתרי WordPress בעזרת בינה מלאכותית</h1>
            <p class="hero-subtitle">בהנחיית ג'ון מוגי</p>
            <p>להעניק למשתתפים שליטה מלאה בתהליך בניית אתר WordPress — מהתקנה נקייה, דרך עקרונות קוד וארכיטקטורה, ועד עבודה יעילה עם בינה מלאכותית שתומכת בפיתוח, בבדיקות ובאוטומציה.</p>
            <p>הקורס בנוי משיעורים חיים אונליין, משימות קצרות, וקבוצת תמיכה פעילה בוואטסאפ.</p>
        </div>
    </section>

    <!-- Course Objectives -->
    <section class="objectives-section">
        <div class="container">
            <h2>🌐 מטרת הקורס</h2>
            <p>להעניק למשתתפים שליטה מלאה בתהליך בניית אתר WordPress — מהתקנה נקייה, דרך עקרונות קוד וארכיטקטורה, ועד עבודה יעילה עם בינה מלאכותית שתומכת בפיתוח, בבדיקות ובאוטומציה.</p>
        </div>
    </section>

    <!-- Schedule Section -->
    <section class="schedule-section">
        <div class="container">
            <h2>📅 לוח מפגשים קרוב</h2>
            <table class="schedule-table">
                <thead>
                    <tr>
                        <th>תאריך</th>
                        <th>שעה (שעון ישראל)</th>
                        <th>סוג מפגש</th>
                        <th>נושא</th>
                        <th>עלות</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>חמישי, 24.10</td>
                        <td>10:00–13:00</td>
                        <td>🟢 חינמי</td>
                        <td>היכרות עם WordPress למפתחים, התקנה מקומית, הכנה לעבודה עם AI</td>
                        <td>חינם</td>
                    </tr>
                    <tr>
                        <td>שני, 27.10</td>
                        <td>16:00–18:30</td>
                        <td>🔵 בתשלום</td>
                        <td>שידור חוזר + ליווי אישי ושאלות חיות</td>
                        <td>250 ₪</td>
                    </tr>
                    <tr>
                        <td>חמישי, 31.10</td>
                        <td>10:00–13:00</td>
                        <td>🟢 חינמי</td>
                        <td>המשך עבודה עם קוד, טפסים חכמים, ו-AI Form Builder</td>
                        <td>חינם</td>
                    </tr>
                    <tr>
                        <td>שלישי, 4.11 (מותנה בביקוש)</td>
                        <td>10:00–13:00 או 16:00–18:30</td>
                        <td>🟢 חינמי / 🔵 בתשלום</td>
                        <td>שיעור ריענון + מענה על שאלות</td>
                        <td>חינם / 250 ₪</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- First Session Details -->
    <section class="session-details-section">
        <div class="container">
            <h2>🧱 תוכן המפגש הראשון (24.10)</h2>
            <p><strong>נושא:</strong> מבוא לעבודה עם WordPress מזווית של מפתח</p>
            <p><strong>משך:</strong> 3 שעות</p>
            <p><strong>נושאים עיקריים:</strong></p>
            <ul>
                <li>התקנת WordPress מקומית (ללא שרת) בעזרת Local by Flywheel</li>
                <li>הכרות עם מבנה הקבצים, wp-config, וـ.env</li>
                <li>הפעלת מצב debug, ניהול זיכרון PHP והבנת מגבלות סביבת הפיתוח</li>
                <li>עבודה עם תבניות בת וכתיבת קוד נקי</li>
                <li>עקרונות KISS וـDRY – פיתוח פשוט, נקי ולא כפול</li>
                <li>שימוש בגיט לניהול גרסאות</li>
                <li>איך להסביר לבינה מלאכותית מה אנחנו רוצים שיקרה – יסודות Prompt Engineering</li>
                <li>תרגול: בנייה של סביבת פיתוח משלך והכנת פרויקט ראשון</li>
            </ul>
        </div>
    </section>

    <!-- Principles Section -->
    <section class="principles-section">
        <div class="container">
            <h2>💡 עקרונות יסוד שילוו את כל הקורס</h2>
            <ul>
                <li><strong>Keep It Simple</strong> – קוד ברור לפני הכל</li>
                <li><strong>Keep It DRY</strong> – לא לחזור על עצמך</li>
                <li><strong>Work Smart with AI</strong> – שימוש נכון ב-AI כעוזר פיתוח, לא כתחליף לחשיבה</li>
                <li><strong>Clean Architecture</strong> – שימוש ב-MVC (Model, View, Controller) להפרדת שכבות</li>
                <li><strong>Real-World Practice</strong> – כל פרויקט ותרגיל יתבסס על מקרים אמיתיים: תיקון אתרים קיימים, אופטימיזציה של קוד, ויצירת מערכות מותאמות אישית.</li>
            </ul>
        </div>
    </section>

    <!-- Technologies Section -->
    <section class="technologies-section">
        <div class="container">
            <h2>🧰 טכנולוגיות וכלים בהם נשתמש</h2>
            <ul>
                <li>PHP (כולל OOP – Object Oriented Programming)</li>
                <li>SQL (בסיסי + חיבור ל-WP Query)</li>
                <li>WordPress Core APIs</li>
                <li>Local by Flywheel</li>
                <li>Git / GitHub</li>
                <li>ChatGPT, Copilot וכלים נוספים לתמיכה ב-AI</li>
            </ul>
        </div>
    </section>

    <!-- Advanced Topics Section -->
    <section class="advanced-topics-section">
        <div class="container">
            <h2>🧠 נושאים מתקדמים שייכללו בהמשך הקורס</h2>
            <ul>
                <li>פיתוח תוספים חכמים עם AI</li>
                <li>בניית טפסים חכמים (AI Form Builder)</li>
                <li>אופטימיזציה של אתרים קיימים (מהירות, אבטחה, SEO טכני)</li>
                <li>ניהול פרויקטים בזמן אמת – תיקון באגים, עבודה בצוותים</li>
                <li>גישת Specification First – איך לכתוב אפיון שמבין מתכנת אמיתי</li>
                <li>חיבור בין WordPress לכלים חיצוניים (API Integrations, Zapier, OpenAI API)</li>
            </ul>
        </div>
    </section>

    <!-- Community Section -->
    <section class="community-section">
        <div class="container">
            <h2>💬 קהילת הלמידה</h2>
            <p>כל משתתף מקבל גישה ל:</p>
            <ul>
                <li>קבוצת וואטסאפ סגורה לשאלות, עזרה, ועדכונים</li>
                <li>מענה שבועי מרוכז על כל השאלות בקבוצה</li>
                <li>הקלטות שיעורים ביוטיוב (למשתתפי הבוקר בלבד, לצפייה חופשית)</li>
            </ul>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <div class="container">
            <h2>⚡ קריאה לפעולה</h2>
            <p>מוכן להתחיל לבנות את האתר שלך בעזרת בינה מלאכותית?</p>
            <p>הצטרף למפגש הפתיחה ביום חמישי הקרוב ופתח איתנו את הסביבה שלך לעולם הפיתוח החכם.</p>

            <!-- Sign-up Form -->
            <div class="signup-form-container">
                <h3>הרשמה למפגש הראשון</h3>
                <?php display_signup_form(); ?>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <a href="#signup" class="btn-primary">להרשמה למפגש הראשון – חינם</a>
                <a href="https://wa.me/your-number" class="btn-secondary">להצטרפות לקבוצת הוואטסאפ</a>
                <a href="#paid-session" class="btn-tertiary">למפגש הערב – הרשמה בתשלום</a>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?>

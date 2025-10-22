<?php
/**
 * Course Landing Page Shortcode
 * Displays the course landing page content
 */

// Include the sign-up form handler
require_once get_stylesheet_directory() . '/includes/class-signup-form.php';

function course_landing_shortcode($atts) {
    $appointments_query = new WP_Query(array(
        'post_type'      => 'course_appointment',
        'posts_per_page' => 6,
        'meta_key'       => 'appointment_datetime',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
        'meta_query'     => array(
            array(
                'key'     => 'appointment_datetime',
                'value'   => current_time('timestamp'),
                'compare' => '>=',
                'type'    => 'NUMERIC',
            ),
        ),
    ));

    ob_start();
    ?>
    <div class="course-landing-page">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-card">
                    <span class="hero-tag">Freemium Learning Path</span>
                    <h1>🚀 ללמוד לבנות אתרי WordPress עם בינה מלאכותית – בזמן אמת</h1>
                    <p class="hero-subtitle">בוקר חינם ללמידה ותרגול • ערב בתשלום לליווי אישי • קהילה שמקדמת אותך לפרויקטים אמיתיים</p>
                    <div class="hero-summary">
                        <p>מסלול מדורג בהנחיית ג'ון מוגי: מתחילים בבוקר חינמי, מעמיקים בערב בתשלום, וממשיכים למסלול פרטי שמוביל לפרויקטים אמיתיים. הצטרפו עכשיו, התחילו חינם — ללא אותיות קטנות.</p>
                    </div>
                    <div class="hero-mini-form" id="hero-form">
                        <?php display_hero_lead_form(); ?>
                    </div>
                    <p class="hero-note">מתחילים בחינם, ולומדים בלייב עם קהילה שתומכת בך.</p>
                </div>
            </div>
        </section>

        <!-- Lead Capture -->
        <section class="lead-capture-section" id="lead">
            <div class="container">
                <div class="lead-grid">
                    <div class="lead-copy">
                        <h2>🎯 מתחילים כאן – הרשמה קצרה למפגש הבוקר</h2>
                        <p>המפגש הראשון חינם לחלוטין וכולל תרגול חי, הקלטות ושאלות בזמן אמת. השאר פרטים ונשמור לך מקום.</p>
                        <ul>
                            <li>גישה לטופס משימות ומעקב אחר ההתקדמות.</li>
                            <li>קישור לקבוצת הוואטסאפ עם עדכונים לפני כל מפגש.</li>
                            <li>אפשרות מעבר מהירה למסלול הערב והקבוצות הפרטיות.</li>
                        </ul>
                    </div>
                    <div class="lead-form-wrapper">
                        <div class="signup-form-container">
                            <h3>הרשמה למפגש הבוקר (חינם)</h3>
                            <?php display_signup_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Freemium Overview -->
        <section class="freemium-overview" id="model">
            <div class="container">
                <h2>🔀 מודל הלמידה הפרימיום</h2>
                <p>המסלול משלב למידה פתוחה עם ליווי מתקדם. המטרה: להכניס משתתפים חדשים בקצב נוח, ולאפשר למתקדמים להתקדם לפרויקטים אמיתיים עם תמיכה אישית.</p>
                <div class="pricing-grid">
                    <div class="pricing-card free">
                        <div class="tag">🟢 חינם</div>
                        <h3>מפגשי בוקר</h3>
                        <p class="price">₪0</p>
                        <p class="summary">שיעור חי בין 10:00–13:00 עם תרגולים בזמן אמת, הקלטות וקהילה פתוחה.</p>
                        <ul>
                            <li>התקנה מקומית, Debug, מבנה קבצים</li>
                            <li>עקרונות קוד נקי + שימוש ב־AI</li>
                            <li>גישה לרשימת התרגילים וההקלטות</li>
                        </ul>
                        <a href="#signup" class="card-link">להירשם לשיעור הראשון</a>
                    </div>
                    <div class="pricing-card paid" id="evening">
                        <div class="tag">🔵 200 ₪</div>
                        <h3>מפגשי ערב בתשלום</h3>
                        <p class="price">₪200</p>
                        <p class="summary">ליווי אישי, דיונים טכניים מתקדמים, Debug בלייב ותשובות לכל שאלה.</p>
                        <ul>
                            <li>תרגול Git, Prompt Engineering וניהול קוד</li>
                            <li>העמקה בבדיקות, פרפורמנס ו־WooCommerce</li>
                            <li>זכאות לסדנאות המשך והמלצות אישיות</li>
                        </ul>
                        <a href="https://wa.me/972509382456" class="card-link">לקבלת קישור תשלום</a>
                    </div>
                    <div class="pricing-card private" id="private">
                        <div class="tag">🟣 400–600 ₪</div>
                        <h3>קבוצות פרטיות</h3>
                        <p class="price">₪400–600<br><span>לחודש</span></p>
                        <p class="summary">קבוצה מצומצמת בהתאם לרמתך – פרויקטים אמיתיים, ישיבות צוות ויעדים שבועיים.</p>
                        <ul>
                            <li>שידרוג לאתרים קיימים או פיתוח מאפס</li>
                            <li>מנטורינג אישי וקוד־ריוויו</li>
                            <li>התאמה למסלול הפרילנס או לחברת מוצר</li>
                        </ul>
                        <a href="https://wa.me/972509382456" class="card-link">דברו איתי על התאמה</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Upcoming Schedule -->
        <section class="schedule-section" id="schedule">
            <div class="container">
                <h2>📅 לוח מפגשים קרוב</h2>
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th>תאריך</th>
                            <th>שעה</th>
                            <th>סוג מפגש</th>
                            <th>נושא מרכזי</th>
                            <th>עלות</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>חמישי · 24.10</td>
                            <td>10:00–13:00</td>
                            <td>🟢 חינם</td>
                            <td>התקנה מקומית, Debug, מבנה פרויקט + היכרות עם AI</td>
                            <td>₪0</td>
                        </tr>
                        <tr>
                            <td>שני · 27.10</td>
                            <td>16:00–18:30</td>
                            <td>🔵 בתשלום</td>
                            <td>Git, שיתוף פעולה עם AI, ניהול תקלות בלייב</td>
                            <td>₪200</td>
                        </tr>
                        <tr>
                            <td>חמישי · 31.10</td>
                            <td>10:00–13:00</td>
                            <td>🟢 חינם</td>
                            <td>Forms חכמים, ולידציה ו־AI Form Builder</td>
                            <td>₪0</td>
                        </tr>
                        <tr>
                            <td>שלישי · 04.11</td>
                            <td>16:00–18:30</td>
                            <td>🔵 בתשלום</td>
                            <td>אופטימיזציה, פרפורמנס ו־WooCommerce</td>
                            <td>₪200</td>
                        </tr>
                        <tr>
                            <td>בהמשך · גמיש</td>
                            <td>נקבע אישית</td>
                            <td>🟣 פרטי</td>
                            <td>פרויקט לקוח אמיתי או פיתוח תוסף</td>
                            <td>₪400–600</td>
                        </tr>
                    </tbody>
                </table>
                <p class="recording-note">* המפגש החינמי משודר ומוקלט. ההצטרפות מהווה אישור לשיתוף ההקלטה בקהילה ובמאגר הקורס.</p>
            </div>
        </section>

        <!-- First Session Details -->
        <section class="session-details-section">
            <div class="container">
                <h2>🧱 המפגש הראשון – הבסיס שלך לפרודוקטיביות</h2>
                <p><strong>נושא:</strong> הקמה מהירה, Debug מקצועי ו־AI שמסביר לך כל שורה.</p>
                <p>נתמקד ב־<strong>מבוא והתקנה מקומית:</strong> היכרות עם WordPress מנקודת מבט של מפתח, יציבות זיכרון, Debug חכם והבנת מבנה הקבצים. נבצע התקנה נקייה של סביבת WordPress ונכין קובץ הגדרות מסודר — בדיוק כפי שעובדים בצוותים מקצועיים.</p>
                <p><strong>משך:</strong> שלוש שעות עם דגש על יישום בזמן אמת.</p>
                <div class="highlight-box">
                    <p><strong>מה עושים ביחד?</strong></p>
                    <ul>
                        <li>מתקינים WordPress מקומית, מסדרים `.env`, זיכרון ושגיאות.</li>
                        <li>חוקרים את מבנה הקבצים – מה מותר, מה אסור, איך לא לשבור.</li>
                        <li>לומדים לנסח פקודות ל־AI כדי להסביר קוד ולא רק לייצר אותו, לצאת מלולאות ולשבור תקיעות במהירות.</li>
                        <li>מסיימים עם סביבת פיתוח נקייה ועם משימה קצרה להמשך.</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Syllabus Section -->
        <section class="syllabus-section" id="syllabus">
            <div class="container">
                <h2>🗺️ סילבוס מלא – 8 מפגשים חיים</h2>
                <table class="syllabus-table">
                    <thead>
                        <tr>
                            <th>מפגש</th>
                            <th>נושא</th>
                            <th>מטרות למידה</th>
                            <th>תרגול</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>מבוא והתקנה מקומית</td>
                            <td>היכרות עם WordPress מנקודת מבט של מפתח. Debug, Memory, מבנה קבצים.</td>
                            <td>התקנה נקייה של סביבת WordPress + קובץ הגדרות.</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>קוד נקי ותבנית בת</td>
                            <td>KISS, DRY, MVC בסיסי, שמירה על אתרים קיימים.</td>
                            <td>בניית תבנית בת נקייה + פונקציות שירות.</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>עבודה עם Git ו־GitHub</td>
                            <td>ניהול גרסאות, צוות, שחזור גרסאות והבנת HEAD.</td>
                            <td>פתיחת ריפו, commit נכון וריסטור בזמן אמת.</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>בינה מלאכותית בפיתוח</td>
                            <td>AI כמתעד, מבקר קוד ומחולל בדיקות. prompt מדויק.</td>
                            <td>שימוש ב־ChatGPT לכתיבת פונקציות ו־debug מודרך.</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>טפסים חכמים</td>
                            <td>ולידציה, שמירה במסד, שליחת מיילים ו־AI Form Builder.</td>
                            <td>בניית טופס דינמי עם PHP + SQL.</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>אופטימיזציה ותיקונים</td>
                            <td>איתור צווארי בקבוק, שגיאות PHP/JS וקונפליקטים.</td>
                            <td>ניתוח ושיפור אתר אמיתי יחד עם AI.</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>אפיון ו־Specification First</td>
                            <td>כתיבת אפיון שמפתח ואוטומציה מבינים.</td>
                            <td>הגשת אפיון לפרויקט אישי וקבלת משוב.</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>פרויקט מסכם בזמן אמת</td>
                            <td>עבודה על פרויקט קיים או חדש בלייב עם הקבוצה.</td>
                            <td>הצגת פרויקט סיום עם קוד נקי ותיעוד.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Highlights -->
        <section class="highlights-section">
            <div class="container">
                <h2>💡 למה המסלול הזה עובד</h2>
                <div class="highlights-grid">
                    <div class="highlight-item">
                        <h3>“בינה מלמדת אדם”</h3>
                        <p>אנחנו משתמשים ב־AI כדי להבין קוד, לפרק בעיות ולהסביר החלטות – לא רק לייצר פלט אוטומטי.</p>
                    </div>
                    <div class="highlight-item">
                        <h3>Git כמקור אמת</h3>
                        <p>כל שינוי מתועד. אתה לומד לעבוד בצוות, להגיש Pull Request ולשמור על היסטוריית קוד ברורה.</p>
                    </div>
                    <div class="highlight-item">
                        <h3>למידה בזמן אמת</h3>
                        <p>אין שקופיות. הכל מתרחש בלייב: תקלות, פתרונות, שיפורים וצחוקים – ממש כמו בחיים האמיתיים.</p>
                    </div>
                    <div class="highlight-item">
                        <h3>קהילה תומכת</h3>
                        <p>קבוצת וואטסאפ, סיכומי שבוע, ומנטורינג פרטני למי שמתקדם למסלול בתשלום או הפרטי.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technologies Section -->
        <section class="technologies-section">
            <div class="container">
                <h2>🧰 טכנולוגיות וכלים</h2>
                <ul>
                    <li>WordPress Core, PHP, SQL + OOP</li>
                    <li>MVC, Child Themes ו־Plugin Architecture</li>
                    <li>Git / GitHub, GitHub Actions ו־CI פשוט</li>
                    <li>ChatGPT, Copilot, Windsurf / Cursor</li>
                    <li>Local by Flywheel, כלי Debug ו־Performance</li>
                </ul>
            </div>
        </section>

        <!-- Journey Section -->
        <section class="journey-section">
            <div class="container">
                <h2>🛠️ איך זה עובד בפועל?</h2>
                <div class="journey-steps">
                    <div class="journey-step">
                        <span class="step-number">1</span>
                        <h3>הצטרף לבוקר חינם</h3>
                        <p>פתח סביבת פיתוח, למד את עקרונות היסוד וקבל גישה למשימות העצמאיות.</p>
                    </div>
                    <div class="journey-step">
                        <span class="step-number">2</span>
                        <h3>עבור לליווי ערב</h3>
                        <p>ב־200 ₪ בלבד אתה מקבל מענה אישי, Debug משותף וצעדים שאי אפשר לכסות בשיעור פתוח.</p>
                    </div>
                    <div class="journey-step">
                        <span class="step-number">3</span>
                        <h3>בחר קבוצת פרימיום</h3>
                        <p>למי שרוצה להאיץ את ההתקדמות: פרויקטים אמיתיים, הצבת יעדים שבועית ומשוב פרטני.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Appointments Section -->
        <section class="appointments-section" id="appointments">
            <div class="container">
                <h2>📆 קביעת מפגש המשך</h2>
                <p class="appointments-intro">בחרו את המועד שמתאים לכם ונצרף אתכם למפגש הערב או לקבוצה הפרטית המתאימה. אם אין מועד שמתאים כרגע – מלאו את הטופס ונחזור אליכם עם הצעות חדשות.</p>

                <?php if ($appointments_query->have_posts()) : ?>
                    <div class="appointments-grid">
                        <?php while ($appointments_query->have_posts()) : $appointments_query->the_post();
                            $appointment_id = get_the_ID();
                            $timestamp      = (int) get_post_meta($appointment_id, 'appointment_datetime', true);
                            $duration       = (int) get_post_meta($appointment_id, 'appointment_duration', true);
                            $mode           = get_post_meta($appointment_id, 'appointment_mode', true);
                            $join_link      = get_post_meta($appointment_id, 'appointment_join_link', true);

                            $date_label = $timestamp ? date_i18n('l · j.n', $timestamp) : __('תאריך יתעדכן', 'twentytwentyfive-child');
                            $time_label = $timestamp ? date_i18n('H:i', $timestamp) : '';
                        ?>
                            <article class="appointment-card">
                                <header>
                                    <h3><?php echo esc_html(get_the_title()); ?></h3>
                                    <p class="appointment-date"><?php echo esc_html($date_label); ?><?php echo $time_label ? ' · ' . esc_html($time_label) : ''; ?></p>
                                </header>
                                <ul class="appointment-meta">
                                    <?php if ($mode) : ?><li><strong><?php _e('מיקום:', 'twentytwentyfive-child'); ?></strong> <?php echo esc_html($mode); ?></li><?php endif; ?>
                                    <?php if ($duration) : ?><li><strong><?php _e('משך:', 'twentytwentyfive-child'); ?></strong> <?php echo esc_html($duration); ?> דק'</li><?php endif; ?>
                                    <li><strong><?php _e('סטטוס:', 'twentytwentyfive-child'); ?></strong> <?php _e('פתוח להצטרפות', 'twentytwentyfive-child'); ?></li>
                                </ul>
                                <div class="appointment-actions">
                                    <?php if ($join_link) : ?>
                                        <a href="<?php echo esc_url($join_link); ?>" target="_blank" rel="noopener" class="btn-primary">להצטרפות למפגש</a>
                                    <?php else : ?>
                                        <button class="btn-primary" data-appointment-title="<?php echo esc_attr(get_the_title()); ?>" data-appointment-time="<?php echo esc_attr($date_label . ($time_label ? ' · ' . $time_label : '')); ?>" data-open-modal="appointment">לתאם שיחה</button>
                                        <a href="#contact" class="btn-secondary">להשאיר פרטים מלאים</a>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <p class="appointments-empty">אין כרגע מועד פתוח להצטרפות. השאירו פרטים בטופס ונעדכן אתכם מייד כשהתאריך הבא ייפתח.</p>
                <?php endif; ?>

                <div class="appointments-footer">
                    <p>צריך שעה אחרת או מפגש פרטני? מלאו את הטופס בתחתית העמוד ונחזור אליכם עם הצעה מותאמת.</p>
                    <a href="#contact" class="btn-outline">למילוי טופס התאמה אישי</a>
                </div>
            </div>
        </section>

        <!-- Community Section -->
        <section class="community-section">
            <div class="container">
                <h2>💬 קהילה וליווי שוטף</h2>
                <ul>
                    <li>קבוצת וואטסאפ סגורה עם תשובות שבועיות.</li>
                    <li>ניוזלטר עם סיכום למידה, קישורים ותרגולים.</li>
                    <li>שידורים חיים נוספים לפי בקשת התלמידים.</li>
                </ul>
            </div>
        </section>

        <div class="appointment-modal" data-modal="appointment" hidden>
            <div class="appointment-modal-overlay" data-close-modal="appointment"></div>
            <div class="appointment-modal-content">
                <button class="appointment-modal-close" data-close-modal="appointment" aria-label="סגירת חלון">×</button>
                <h3>תיאום שיחה למפגש</h3>
                <p class="appointment-modal-summary"></p>
                <?php display_appointment_modal_form(); ?>
            </div>
        </div>
    </div>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}

// Register the shortcode
add_shortcode('course_landing', 'course_landing_shortcode');

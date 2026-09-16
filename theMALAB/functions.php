<?php
defined('ABSPATH') || exit;

/* ============================================================
   BUSINESS CONTACT EMAIL
   Used for the contact form recipient, booking notifications,
   and outgoing mail "From" address. Override in wp-config.php
   if needed.
   ============================================================ */
if ( ! defined('MALAB_BUSINESS_EMAIL') ) {
    define('MALAB_BUSINESS_EMAIL', 'info@themalab.com.au');
}

/* ============================================================
   MA LAB THEME SETUP
   ============================================================ */
function malab_setup() {
    load_theme_textdomain('malab', get_template_directory() . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','script','style']);
    add_theme_support('custom-logo', [
        'height'      => 60,
        'width'       => 160,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('customize-selective-refresh-widgets');

    register_nav_menus([
        'primary'  => __('Primary Navigation', 'malab'),
        'footer'   => __('Footer Navigation', 'malab'),
    ]);
}
add_action('after_setup_theme', 'malab_setup');

/* ============================================================
   REQUIRED PAGES — auto-create Portfolio & Booking
   The header/hero links point to /portfolio/ and /booking/, which
   only resolve if a Page exists at that slug with the matching
   page template assigned. Create (or repair) them automatically
   so those links never 404.
   ============================================================ */
function malab_create_required_pages() {
    $pages = [
        'portfolio' => [
            'title'    => __('Portfolio', 'malab'),
            'template' => 'page-portfolio.php',
        ],
        'booking' => [
            'title'    => __('Booking', 'malab'),
            'template' => 'page-booking.php',
        ],
    ];

    foreach ( $pages as $slug => $data ) {
        $page = get_page_by_path( $slug );

        if ( ! $page ) {
            $page_id = wp_insert_post([
                'post_title'  => $data['title'],
                'post_name'   => $slug,
                'post_status' => 'publish',
                'post_type'   => 'page',
            ]);
        } else {
            $page_id = $page->ID;
            if ( 'publish' !== $page->post_status ) {
                wp_update_post([ 'ID' => $page_id, 'post_status' => 'publish' ]);
            }
        }

        if ( $page_id && ! is_wp_error( $page_id ) ) {
            update_post_meta( $page_id, '_wp_page_template', $data['template'] );
        }
    }
}
add_action('after_switch_theme', 'malab_create_required_pages');

/** Self-heal on existing installs where the theme was already active before these pages existed. */
add_action('admin_init', 'malab_create_required_pages');

/* ============================================================
   SCRIPTS & STYLES
   ============================================================ */
function malab_enqueue() {
    // Google Fonts
    wp_enqueue_style(
        'malab-fonts',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap',
        [],
        null
    );

    // Theme stylesheet
    wp_enqueue_style(
        'malab-style',
        get_stylesheet_uri(),
        ['malab-fonts'],
        wp_get_theme()->get('Version')
    );

    // Main JS
    wp_enqueue_script(
        'malab-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );

    // Localize AJAX
    wp_localize_script('malab-main', 'malabAjax', [
        'url'   => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('malab_contact'),
    ]);
}
add_action('wp_enqueue_scripts', 'malab_enqueue');

/* ============================================================
   CONTACT FORM AJAX HANDLER
   ============================================================ */
function malab_handle_contact() {
    check_ajax_referer('malab_contact', 'nonce');
    if ( ! malab_rate_limit( 'contact', 5, HOUR_IN_SECONDS ) ) {
        wp_send_json_error(['message' => __('Too many messages sent. Please try again later.', 'malab')]);
    }

    $name    = sanitize_text_field($_POST['name'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $type    = sanitize_text_field($_POST['business_type'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message) || !is_email($email)) {
        wp_send_json_error(['message' => __('Please fill in all required fields.', 'malab')]);
    }

    $to      = MALAB_BUSINESS_EMAIL;
    $subject = sprintf('[MA LAB] New enquiry from %s', $name);
    $body    = sprintf(
        "Name: %s\nEmail: %s\nBusiness Type: %s\n\nMessage:\n%s",
        $name, $email, $type, $message
    );
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        sprintf('Reply-To: %s <%s>', $name, $email),
    ];

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(['message' => __('Message sent! We\'ll be in touch within 24 hours.', 'malab')]);
    } else {
        wp_send_json_error(['message' => __('Could not send message. Please try emailing us directly.', 'malab')]);
    }
}
add_action('wp_ajax_malab_contact',        'malab_handle_contact');
add_action('wp_ajax_nopriv_malab_contact', 'malab_handle_contact');

/* ============================================================
   GMAIL SMTP — routes wp_mail() through Gmail
   Set MALAB_GMAIL_APP_PASSWORD in wp-config.php
   ============================================================ */
add_filter('wp_mail_from', fn() => MALAB_BUSINESS_EMAIL);
add_filter('wp_mail_from_name', fn() => 'MA LAB');

add_action('phpmailer_init', function( $phpmailer ) {
    $pass = defined('MALAB_GMAIL_APP_PASSWORD') ? MALAB_GMAIL_APP_PASSWORD : '';
    if ( ! $pass ) return; // skip until password is configured

    // The SMTP account used to authenticate with Gmail/Google Workspace.
    // Defaults to the business email; override in wp-config.php if mail
    // is actually relayed through a different mailbox.
    $smtp_user = defined('MALAB_GMAIL_SMTP_USER') ? MALAB_GMAIL_SMTP_USER : MALAB_BUSINESS_EMAIL;

    $phpmailer->isSMTP();
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Port       = 587;
    $phpmailer->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $phpmailer->Username   = $smtp_user;
    $phpmailer->Password   = $pass;
    $phpmailer->From       = MALAB_BUSINESS_EMAIL;
    $phpmailer->FromName   = 'MA LAB';

    // Local XAMPP/Windows dev environments often lack a working CA bundle,
    // causing "self-signed certificate in certificate chain" on SMTP TLS.
    // Safe to relax verification for local dev only.
    if ( in_array( $_SERVER['HTTP_HOST'] ?? '', ['localhost', '127.0.0.1'], true )
        || php_sapi_name() === 'cli' ) {
        $phpmailer->SMTPOptions = [
            'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true,
            ],
        ];
    }
});

/* ============================================================
   BOOKING AJAX
   ============================================================ */

/** Return available time slots for a date */
/** Simple per-IP rate limiter using transients. Returns true if allowed. */
function malab_rate_limit( string $bucket, int $max, int $window_seconds ): bool {
    $ip  = sanitize_text_field( $_SERVER['REMOTE_ADDR'] ?? 'unknown' );
    $key = 'malab_rl_' . $bucket . '_' . md5( $ip );
    $count = (int) get_transient( $key );
    if ( $count >= $max ) return false;
    set_transient( $key, $count + 1, $window_seconds );
    return true;
}

function malab_ajax_get_slots(): void {
    check_ajax_referer('malab_slots', 'nonce');
    if ( ! malab_rate_limit( 'slots', 30, MINUTE_IN_SECONDS ) ) {
        wp_send_json_error(['message' => 'Too many requests. Please slow down.']);
    }
    $date = sanitize_text_field($_GET['date'] ?? '');
    if (!$date || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        wp_send_json_error(['message' => 'Invalid date.']);
    }
    require_once get_template_directory() . '/includes/google-calendar.php';
    wp_send_json_success(['slots' => malab_available_slots($date)]);
}
add_action('wp_ajax_malab_get_slots',        'malab_ajax_get_slots');
add_action('wp_ajax_nopriv_malab_get_slots', 'malab_ajax_get_slots');

/** Process a booking submission */
function malab_ajax_create_booking(): void {
    check_ajax_referer('malab_booking', 'booking_nonce');
    if ( ! malab_rate_limit( 'booking', 5, HOUR_IN_SECONDS ) ) {
        wp_send_json_error(['message' => 'Too many booking attempts. Please try again later.']);
    }

    $booking = [
        'service' => sanitize_text_field($_POST['service'] ?? ''),
        'date'    => sanitize_text_field($_POST['date']    ?? ''),
        'time'    => sanitize_text_field($_POST['time']    ?? ''),
        'name'    => sanitize_text_field($_POST['name']    ?? ''),
        'email'   => sanitize_email($_POST['email']        ?? ''),
        'phone'   => sanitize_text_field($_POST['phone']   ?? ''),
        'notes'   => sanitize_textarea_field($_POST['notes'] ?? ''),
    ];

    if (!$booking['service'] || !$booking['date'] || !$booking['time']
        || !$booking['name'] || !is_email($booking['email'])) {
        wp_send_json_error(['message' => 'Please complete all required fields.']);
    }
    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $booking['date'])) {
        wp_send_json_error(['message' => 'Invalid date format.']);
    }
    if (!preg_match('/^\d{2}:\d{2}$/', $booking['time'])) {
        wp_send_json_error(['message' => 'Invalid time format.']);
    }

    require_once get_template_directory() . '/includes/google-calendar.php';
    $result = malab_create_calendar_event($booking);

    if ($result['success']) {
        $services    = malab_services();
        $service_lbl = $services[$booking['service']] ?? $booking['service'];
        $date_fmt    = date('l, F j, Y', strtotime($booking['date']));
        $time_fmt    = date('g:i A', strtotime($booking['date'] . ' ' . $booking['time']));
        wp_send_json_success([
            'service' => $service_lbl,
            'date'    => $date_fmt,
            'time'    => $time_fmt,
            'name'    => $booking['name'],
            'email'   => $booking['email'],
            'method'  => $result['method'],
        ]);
    }
    wp_send_json_error(['message' => 'Booking failed. Please try again.']);
}
add_action('wp_ajax_malab_create_booking',        'malab_ajax_create_booking');
add_action('wp_ajax_nopriv_malab_create_booking', 'malab_ajax_create_booking');

/* ============================================================
   CUSTOM EXCERPT
   ============================================================ */
function malab_excerpt_length($length) { return 20; }
add_filter('excerpt_length', 'malab_excerpt_length');

function malab_excerpt_more($more) { return ' &hellip;'; }
add_filter('excerpt_more', 'malab_excerpt_more');

/* ============================================================
   PORTFOLIO — MA LAB CLIENT PROJECT SHOWCASE
   ============================================================ */
function malab_portfolio_items(): array {
    $uri = get_template_directory_uri() . '/assets/images/portfolio/';
    // 'url' is only for a project that is actually deployed somewhere live —
    // leave it null until there's a real URL to put here. These previously
    // all pointed at a local dev path (http://localhost/malab-projects/...)
    // that was never uploaded anywhere, so every card 404'd for every
    // visitor. Once a project has a real hosted URL, set 'url' to it and
    // the card will link straight out to it.
    return [
        [
            'slug'     => 'sparklepro-cleaning',
            'name'     => 'SparklePro Cleaning',
            'category' => 'Cleaning',
            'desc'     => 'A 10-page residential & commercial cleaning services site with trust badges, service breakdowns, and online booking positioning.',
            'image'    => $uri . 'sparklepro-cleaning.png',
            'accent'   => '#00c2a8',
            'url'      => null,
        ],
        [
            'slug'     => 'cleanora-cleaning',
            'name'     => 'Cleanora Cleaning',
            'category' => 'Cleaning',
            'desc'     => 'An alternate cleaning-brand concept — "A Cleaner Space. A Better Day." — with quote requests and WhatsApp-first contact.',
            'image'    => null,
            'accent'   => '#00685f',
            'url'      => null,
        ],
        [
            'slug'     => 'volt-line-electrical',
            'name'     => 'Volt Line Electrical',
            'category' => 'Electrical',
            'desc'     => 'A licensed residential & commercial electrical contractor site with 24/7 emergency service positioning.',
            'image'    => null,
            'accent'   => '#ff6a00',
            'url'      => null,
        ],
        [
            'slug'     => 'studio-nova',
            'name'     => 'Studio Nova',
            'category' => 'Branding &amp; Design',
            'desc'     => 'A bold, editorial freelance graphic designer portfolio — branding, logo, print &amp; packaging, and digital design work.',
            'image'    => null,
            'accent'   => '#ff4e1f',
            'url'      => null,
        ],
        [
            'slug'     => 'greenscape-landscaping',
            'name'     => 'GreenScape Landscaping',
            'category' => 'Landscaping',
            'desc'     => 'Premium Australian landscape design &amp; outdoor living — architectural photography, before/after gallery, service areas.',
            'image'    => null,
            'accent'   => '#2f7a4d',
            'url'      => null,
        ],
        [
            'slug'     => 'hpainter-studio',
            'name'     => 'HPainter Studio',
            'category' => 'Arts &amp; Portfolio',
            'desc'     => 'An artist &amp; muralist atelier site — fine art gallery, studio story, and commission enquiries.',
            'image'    => $uri . 'hpainter-studio.png',
            'accent'   => '#b5622e',
            'url'      => null,
        ],
        [
            'slug'     => 'sophia-personal-trainer',
            'name'     => 'Sophia — Personal Trainer',
            'category' => 'Fitness &amp; Coaching',
            'desc'     => 'A bold, energetic fitness coaching site built to convert visitors into strength-training clients.',
            'image'    => $uri . 'sophia-personal-trainer.png',
            'accent'   => '#c6ff3d',
            'url'      => null,
        ],
        [
            'slug'     => 'morano-builder',
            'name'     => 'Morano Builder',
            'category' => 'Construction &amp; Architecture',
            'desc'     => 'A design-build/construction company site — custom homes &amp; renovations, grounded in modern architectural photography.',
            'image'    => $uri . 'morano-builder.png',
            'accent'   => '#9c6b43',
            'url'      => null,
        ],
    ];
}

/**
 * Best available link for a portfolio card: a real deployed URL if one is
 * set, otherwise the bundled preview screenshot, otherwise none at all.
 * Never falls back to a guessed path that isn't guaranteed to exist —
 * that's what caused every project card to 404.
 */
function malab_portfolio_link( array $item ): ?string {
    return $item['url'] ?: $item['image'] ?: null;
}

function malab_portfolio_link_label( array $item ): string {
    if ( $item['url'] )   return 'View Live Site';
    if ( $item['image'] ) return 'View Preview';
    return 'Case Study Coming Soon';
}

/* ============================================================
   REMOVE UNWANTED DEFAULTS
   ============================================================ */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');

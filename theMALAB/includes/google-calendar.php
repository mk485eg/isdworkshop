<?php
defined('ABSPATH') || exit;

/**
 * MA LAB Booking — Google Calendar via ICS email invite.
 *
 * Sends an RFC-5545-compliant .ics file to:
 *  - The admin email (MALAB_BUSINESS_EMAIL) — Gmail auto-detects and offers "Add to Calendar"
 *  - The client — gets a calendar invite they can accept
 *
 * No Google API keys, no service account, no OAuth needed.
 * Bookings are also stored in the WordPress DB for admin review.
 */

/* ── Service Definitions ─────────────────────────────────── */

function malab_services(): array {
    return [
        'consultation'  => 'Strategy Consultation',
        'web-design'    => 'Web Design & Development',
        'ecommerce'     => 'E-Commerce Setup',
        'hospitality'   => 'Hospitality Solutions',
        'startup'       => 'Startup Launch Package',
        'business-auto' => 'Business Automation',
    ];
}

/* ── Slot Engine ─────────────────────────────────────────── */

/**
 * Returns busy time blocks from Google Calendar API (optional).
 * Requires MALAB_GCAL_SERVICE_ACCOUNT to be set.
 * Falls back to empty array (all slots shown as available).
 */
function malab_gcal_busy_blocks( string $date ): array {
    $svc_json = defined('MALAB_GCAL_SERVICE_ACCOUNT') ? MALAB_GCAL_SERVICE_ACCOUNT : '';
    $cal_id   = defined('MALAB_GCAL_CALENDAR_ID')     ? MALAB_GCAL_CALENDAR_ID     : '';

    if ( empty($svc_json) || empty($cal_id) || ! file_exists($svc_json) ) {
        return [];
    }

    try {
        $token = malab_gcal_access_token($svc_json);
        if ( ! $token ) return [];

        $tz    = 'Australia/Sydney';
        $start = (new DateTime("{$date}T00:00:00", new DateTimeZone($tz)))->format(DateTime::RFC3339);
        $end   = (new DateTime("{$date}T23:59:59", new DateTimeZone($tz)))->format(DateTime::RFC3339);
        $url   = 'https://www.googleapis.com/calendar/v3/calendars/'
               . rawurlencode($cal_id) . '/events'
               . '?timeMin=' . urlencode($start)
               . '&timeMax=' . urlencode($end)
               . '&singleEvents=true'
               . '&fields=items(start,end)';

        $resp = wp_remote_get($url, [
            'headers' => ['Authorization' => "Bearer {$token}"],
            'timeout' => 8,
        ]);
        if ( is_wp_error($resp) || wp_remote_retrieve_response_code($resp) !== 200 ) return [];

        $body  = json_decode(wp_remote_retrieve_body($resp), true);
        $items = $body['items'] ?? [];
        return array_map(fn($e) => [
            'start' => $e['start']['dateTime'] ?? $e['start']['date'] . 'T00:00:00+10:00',
            'end'   => $e['end']['dateTime']   ?? $e['end']['date']   . 'T23:59:59+10:00',
        ], $items);
    } catch (Exception $e) {
        return [];
    }
}

/**
 * Build a JWT and exchange it for a short-lived access token.
 */
function malab_gcal_access_token( string $svc_json_path ): string {
    $sa = json_decode(file_get_contents($svc_json_path), true);
    if ( empty($sa['private_key']) ) return '';

    $header  = base64url_encode(json_encode(['alg' => 'RS256', 'typ' => 'JWT']));
    $now     = time();
    $claim   = base64url_encode(json_encode([
        'iss'   => $sa['client_email'],
        'scope' => 'https://www.googleapis.com/auth/calendar.readonly',
        'aud'   => 'https://oauth2.googleapis.com/token',
        'exp'   => $now + 3600,
        'iat'   => $now,
    ]));
    $sig = '';
    openssl_sign("{$header}.{$claim}", $sig, $sa['private_key'], 'SHA256withRSA');
    $jwt = "{$header}.{$claim}." . base64url_encode($sig);

    $resp = wp_remote_post('https://oauth2.googleapis.com/token', [
        'body'    => ['grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer', 'assertion' => $jwt],
        'timeout' => 10,
    ]);
    if ( is_wp_error($resp) || wp_remote_retrieve_response_code($resp) !== 200 ) return '';
    return json_decode(wp_remote_retrieve_body($resp), true)['access_token'] ?? '';
}

function base64url_encode( string $data ): string {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

/**
 * Returns time slots for a given date, marking booked ones.
 */
function malab_available_slots( string $date ): array {
    $slots = [];
    $busy  = malab_gcal_busy_blocks($date);
    $tz    = 'Australia/Sydney';

    // Also check DB bookings for the date
    $db_booked = malab_get_bookings_for_date($date);

    for ( $h = 9; $h < 18; $h++ ) {
        $time = sprintf('%02d:00', $h);
        $dt_s = new DateTime("{$date}T{$time}:00", new DateTimeZone($tz));
        $dt_e = (clone $dt_s)->modify('+1 hour');

        $is_busy = false;

        foreach ( $busy as $b ) {
            $bs = new DateTime($b['start'], new DateTimeZone($tz));
            $be = new DateTime($b['end'],   new DateTimeZone($tz));
            if ( $dt_s < $be && $dt_e > $bs ) { $is_busy = true; break; }
        }

        if ( ! $is_busy && in_array($time, $db_booked, true) ) {
            $is_busy = true;
        }

        $slots[] = [
            'time'      => $time,
            'label'     => $dt_s->format('g:i A') . ' – ' . $dt_e->format('g:i A'),
            'available' => ! $is_busy,
        ];
    }
    return $slots;
}

/**
 * Returns booked time strings for a date from the local DB.
 */
function malab_get_bookings_for_date( string $date ): array {
    global $wpdb;
    $table = $wpdb->prefix . 'malab_bookings';
    if ( $wpdb->get_var("SHOW TABLES LIKE '{$table}'") !== $table ) return [];
    $rows = $wpdb->get_col($wpdb->prepare(
        "SELECT booking_time FROM {$table} WHERE booking_date = %s AND status != 'cancelled'",
        $date
    ));
    // booking_time is stored as HH:MM:SS — trim to HH:MM to match slot keys
    return array_map(fn($t) => substr($t, 0, 5), $rows ?: []);
}

/* ── Booking Creation ────────────────────────────────────── */

function malab_create_calendar_event( array $booking ): array {
    return malab_send_ics_invite($booking);
}

/**
 * Generates an RFC-5545 ICS file and emails it to admin + client.
 * Gmail receives the .ics and automatically surfaces the event inline.
 */
function malab_send_ics_invite( array $b ): array {
    $tz          = 'Australia/Sydney';
    $services    = malab_services();
    $svc_lbl     = $services[$b['service']] ?? ucwords(str_replace('-', ' ', $b['service']));
    $admin_email = MALAB_BUSINESS_EMAIL;

    $dt_start = new DateTime("{$b['date']}T{$b['time']}:00", new DateTimeZone($tz));
    $dt_end   = (clone $dt_start)->modify('+1 hour');
    $utc      = new DateTimeZone('UTC');
    $stamp    = (new DateTime('now', $utc))->format('Ymd\THis\Z');
    $uid      = 'malab-' . wp_generate_uuid4() . '@malab.local';

    $notes_esc = str_replace(
        ["\r\n", "\n", "\r", ',',  ';' ],
        ['\\n',  '\\n', '\\n', '\\,', '\\;'],
        trim($b['notes'])
    );
    $svc_esc   = str_replace([',', ';'], ['\\,', '\\;'], $svc_lbl);
    $desc      = "Service: {$svc_esc}\\nClient: {$b['name']} <{$b['email']}>\\nPhone: {$b['phone']}\\n\\n{$notes_esc}";

    $ics = implode("\r\n", [
        'BEGIN:VCALENDAR',
        'VERSION:2.0',
        'PRODID:-//MA LAB//Booking System//EN',
        'CALSCALE:GREGORIAN',
        'METHOD:REQUEST',
        'BEGIN:VTIMEZONE',
        'TZID:Australia/Sydney',
        'BEGIN:STANDARD',
        'TZNAME:AEST',
        'TZOFFSETFROM:+1100',
        'TZOFFSETTO:+1000',
        'DTSTART:19710404T030000',
        'RRULE:FREQ=YEARLY;BYMONTH=4;BYDAY=1SU',
        'END:STANDARD',
        'BEGIN:DAYLIGHT',
        'TZNAME:AEDT',
        'TZOFFSETFROM:+1000',
        'TZOFFSETTO:+1100',
        'DTSTART:19711003T020000',
        'RRULE:FREQ=YEARLY;BYMONTH=10;BYDAY=1SU',
        'END:DAYLIGHT',
        'END:VTIMEZONE',
        'BEGIN:VEVENT',
        "UID:{$uid}",
        "DTSTAMP:{$stamp}",
        "DTSTART;TZID=Australia/Sydney:" . $dt_start->format('Ymd\THis'),
        "DTEND;TZID=Australia/Sydney:"   . $dt_end->format('Ymd\THis'),
        "SUMMARY:MA LAB — {$svc_esc}",
        "DESCRIPTION:{$desc}",
        'LOCATION:Video Call / MA LAB',
        "ORGANIZER;CN=MA LAB:MAILTO:{$admin_email}",
        "ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=CHAIR;PARTSTAT=ACCEPTED;CN=MA LAB:MAILTO:{$admin_email}",
        "ATTENDEE;CUTYPE=INDIVIDUAL;ROLE=REQ-PARTICIPANT;PARTSTAT=NEEDS-ACTION;RSVP=TRUE;CN={$b['name']}:MAILTO:{$b['email']}",
        'CLASS:PRIVATE',
        'STATUS:CONFIRMED',
        'TRANSP:OPAQUE',
        'SEQUENCE:0',
        'BEGIN:VALARM',
        'ACTION:DISPLAY',
        'DESCRIPTION:Upcoming booking — MA LAB',
        'TRIGGER:-PT30M',
        'END:VALARM',
        'END:VEVENT',
        'END:VCALENDAR',
    ]) . "\r\n";

    $date_fmt = $dt_start->format('l, F j, Y');
    $time_fmt = $dt_start->format('g:i A') . ' – ' . $dt_end->format('g:i A T');

    /* Admin email — Gmail will show the event inline and offer Add to Calendar */
    $admin_body = "New booking received via MA LAB.\n\n"
                . "Service:  {$svc_lbl}\n"
                . "Date:     {$date_fmt}\n"
                . "Time:     {$time_fmt}\n"
                . "Client:   {$b['name']}\n"
                . "Email:    {$b['email']}\n"
                . "Phone:    {$b['phone']}\n"
                . "Notes:\n{$b['notes']}\n\n"
                . "Open the attached .ics to accept the invite and add it to your Google Calendar.";

    malab_send_with_ics($admin_email, "New Booking: {$svc_lbl} – {$b['name']} on {$date_fmt}", $admin_body, $ics, $admin_email);

    /* Client confirmation email */
    $client_body = "Hi {$b['name']},\n\n"
                 . "Your booking with MA LAB is confirmed!\n\n"
                 . "Service:  {$svc_lbl}\n"
                 . "Date:     {$date_fmt}\n"
                 . "Time:     {$time_fmt}\n\n"
                 . "The calendar invite is attached — open it to save to your calendar.\n"
                 . "We will reach out with video call details before your session.\n\n"
                 . "Looking forward to connecting!\n"
                 . "The MA LAB Team";

    malab_send_with_ics($b['email'], "Your MA LAB Booking Confirmed — {$date_fmt}", $client_body, $ics, $admin_email);

    malab_save_booking($b, $uid);

    return ['success' => true, 'method' => 'ics_email'];
}

/**
 * Sends a multipart/mixed email with plain text + ICS attachment.
 */
function malab_send_with_ics(
    string $to, string $subject, string $text, string $ics, string $from
): bool {
    $boundary = 'malab_' . md5(uniqid('', true));

    add_filter('wp_mail_content_type', fn() => "multipart/mixed; boundary=\"{$boundary}\"");

    $raw  = "--{$boundary}\r\n";
    $raw .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $raw .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
    $raw .= $text . "\r\n\r\n";
    $raw .= "--{$boundary}\r\n";
    $raw .= "Content-Type: text/calendar; charset=UTF-8; method=REQUEST\r\n";
    $raw .= "Content-Transfer-Encoding: 8bit\r\n";
    $raw .= "Content-Disposition: attachment; filename=\"malab-booking.ics\"\r\n\r\n";
    $raw .= $ics;
    $raw .= "--{$boundary}--";

    $headers = [
        "From: MA LAB <{$from}>",
        "Reply-To: {$from}",
    ];

    $sent = wp_mail($to, $subject, $raw, $headers);
    remove_all_filters('wp_mail_content_type');
    return $sent;
}

/* ── DB Storage ──────────────────────────────────────────── */

function malab_maybe_create_bookings_table(): void {
    global $wpdb;
    $table   = $wpdb->prefix . 'malab_bookings';
    $charset = $wpdb->get_charset_collate();

    if ( $wpdb->get_var("SHOW TABLES LIKE '{$table}'") === $table ) return;

    $sql = "CREATE TABLE {$table} (
        id           INT UNSIGNED NOT NULL AUTO_INCREMENT,
        uid          VARCHAR(120) NOT NULL,
        service      VARCHAR(60)  NOT NULL,
        booking_date DATE         NOT NULL,
        booking_time TIME         NOT NULL,
        client_name  VARCHAR(120) NOT NULL,
        client_email VARCHAR(120) NOT NULL,
        client_phone VARCHAR(60)  DEFAULT '',
        notes        TEXT         DEFAULT '',
        status       VARCHAR(20)  NOT NULL DEFAULT 'confirmed',
        created_at   DATETIME     NOT NULL,
        PRIMARY KEY (id),
        KEY idx_date (booking_date),
        KEY idx_status (status)
    ) {$charset};";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}

function malab_save_booking( array $b, string $uid ): void {
    global $wpdb;
    malab_maybe_create_bookings_table();

    $wpdb->insert(
        $wpdb->prefix . 'malab_bookings',
        [
            'uid'          => $uid,
            'service'      => $b['service'],
            'booking_date' => $b['date'],
            'booking_time' => $b['time'] . ':00',
            'client_name'  => $b['name'],
            'client_email' => $b['email'],
            'client_phone' => $b['phone'] ?? '',
            'notes'        => $b['notes'] ?? '',
            'status'       => 'confirmed',
            'created_at'   => current_time('mysql'),
        ],
        ['%s','%s','%s','%s','%s','%s','%s','%s','%s','%s']
    );
}
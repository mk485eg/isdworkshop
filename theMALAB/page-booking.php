<?php
/**
 * Template Name: Booking
 * Template Post Type: page
 */
defined('ABSPATH') || exit;
require_once get_template_directory() . '/includes/google-calendar.php';
get_header();
$services = malab_services();
?>

<section class="booking-hero">
  <div class="booking-hero-glow" aria-hidden="true"></div>
  <div class="container booking-hero-inner">
    <p class="section-eyebrow">Schedule a Session</p>
    <h1 class="booking-headline">Book a <span class="gradient-text">Consultation</span></h1>
    <p class="booking-subline">Select a service, pick a time that works for you, and we'll confirm within the hour.</p>
  </div>
</section>

<section class="booking-section">
  <div class="container">
    <div class="booking-wizard" id="booking-wizard">

      <!-- ── Step Indicator ─────────────────────────────────── -->
      <div class="booking-steps" aria-label="Booking steps">
        <div class="booking-step active" data-step="1">
          <span class="step-num">01</span>
          <span class="step-label">SERVICE</span>
        </div>
        <div class="step-connector"></div>
        <div class="booking-step" data-step="2">
          <span class="step-num">02</span>
          <span class="step-label">DATE & TIME</span>
        </div>
        <div class="step-connector"></div>
        <div class="booking-step" data-step="3">
          <span class="step-num">03</span>
          <span class="step-label">YOUR DETAILS</span>
        </div>
        <div class="step-connector"></div>
        <div class="booking-step" data-step="4">
          <span class="step-num">04</span>
          <span class="step-label">CONFIRM</span>
        </div>
      </div>

      <!-- ── Step 1: Service ────────────────────────────────── -->
      <div class="booking-panel active" id="step-1">
        <h2 class="booking-panel-title">What do you need?</h2>
        <div class="service-grid">
          <?php foreach ( $services as $key => $label ) : ?>
          <button class="service-card" data-service="<?php echo esc_attr($key); ?>" type="button">
            <span class="service-icon material-symbols-outlined" aria-hidden="true">
              <?php echo match($key) {
                'consultation'  => 'chat',
                'web-design'    => 'web',
                'ecommerce'     => 'shopping_bag',
                'hospitality'   => 'restaurant',
                'startup'       => 'rocket_launch',
                'business-auto' => 'smart_toy',
                default         => 'calendar_month',
              }; ?>
            </span>
            <span class="service-label"><?php echo esc_html($label); ?></span>
          </button>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- ── Step 2: Date & Time ───────────────────────────── -->
      <div class="booking-panel" id="step-2">
        <h2 class="booking-panel-title">Pick a date & time</h2>
        <div class="datetime-grid">

          <!-- Calendar -->
          <div class="calendar-wrap">
            <div class="cal-header">
              <button class="cal-nav" id="cal-prev" aria-label="Previous month" type="button">
                <span class="material-symbols-outlined">chevron_left</span>
              </button>
              <span class="cal-month-label" id="cal-month-label"></span>
              <button class="cal-nav" id="cal-next" aria-label="Next month" type="button">
                <span class="material-symbols-outlined">chevron_right</span>
              </button>
            </div>
            <div class="cal-weekdays">
              <span>Su</span><span>Mo</span><span>Tu</span><span>We</span>
              <span>Th</span><span>Fr</span><span>Sa</span>
            </div>
            <div class="cal-days" id="cal-days"></div>
          </div>

          <!-- Time Slots -->
          <div class="slots-wrap">
            <p class="slots-date-label" id="slots-date-label">Select a date</p>
            <div class="slots-grid" id="slots-grid">
              <p class="slots-placeholder">Choose a date to see available times.</p>
            </div>
          </div>

        </div>
        <div class="booking-nav">
          <button class="btn-secondary booking-back" data-target="1" type="button">BACK</button>
          <button class="btn-primary booking-next" data-target="3" id="step2-next" disabled type="button">
            CONTINUE <span class="material-symbols-outlined icon">arrow_forward</span>
          </button>
        </div>
      </div>

      <!-- ── Step 3: Details ───────────────────────────────── -->
      <div class="booking-panel" id="step-3">
        <h2 class="booking-panel-title">Your details</h2>
        <form id="booking-form" class="booking-form" novalidate>
          <?php wp_nonce_field('malab_booking', 'booking_nonce'); ?>
          <input type="hidden" name="service"  id="f-service">
          <input type="hidden" name="date"     id="f-date">
          <input type="hidden" name="time"     id="f-time">

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="f-name">FULL NAME *</label>
              <input class="form-input" type="text" id="f-name" name="name" required placeholder="Mark Ayoub">
            </div>
            <div class="form-group">
              <label class="form-label" for="f-email">EMAIL *</label>
              <input class="form-input" type="email" id="f-email" name="email" required placeholder="you@company.com">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="f-phone">PHONE (optional)</label>
            <input class="form-input" type="tel" id="f-phone" name="phone" placeholder="+1 (555) 000-0000">
          </div>
          <div class="form-group">
            <label class="form-label" for="f-notes">PROJECT NOTES (optional)</label>
            <textarea class="form-input form-textarea" id="f-notes" name="notes" placeholder="Tell us about your project, goals, or any questions..."></textarea>
          </div>
          <div class="booking-nav">
            <button class="btn-secondary booking-back" data-target="2" type="button">BACK</button>
            <button class="btn-primary" type="submit">
              REVIEW BOOKING <span class="material-symbols-outlined icon">arrow_forward</span>
            </button>
          </div>
        </form>
      </div>

      <!-- ── Step 4: Confirm ───────────────────────────────── -->
      <div class="booking-panel" id="step-4">
        <div id="booking-result"></div>
      </div>

    </div><!-- /.booking-wizard -->
  </div>
</section>

<script>
(function(){
'use strict';

/* ── State ───────────────────────────────────────────────── */
const state = { service: null, date: null, time: null };
let calYear, calMonth;

/* ── Helpers ─────────────────────────────────────────────── */
function goTo(step) {
    document.querySelectorAll('.booking-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.booking-step').forEach((s,i) => {
        s.classList.toggle('active',    i + 1 <= step);
        s.classList.toggle('completed', i + 1 <  step);
    });
    document.getElementById('step-' + step).classList.add('active');
    window.scrollTo({ top: document.querySelector('.booking-wizard').offsetTop - 120, behavior: 'smooth' });
}

/* ── Step 1: Service ─────────────────────────────────────── */
document.querySelectorAll('.service-card').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.service-card').forEach(b => b.classList.remove('selected'));
        btn.classList.add('selected');
        state.service = btn.dataset.service;
        document.getElementById('f-service').value = state.service;
        setTimeout(() => goTo(2), 250);
    });
});

/* ── Step 2: Calendar ────────────────────────────────────── */
const now = new Date();
calYear  = now.getFullYear();
calMonth = now.getMonth();

function renderCalendar() {
    const label = new Date(calYear, calMonth, 1)
        .toLocaleString('en-US', { month: 'long', year: 'numeric' });
    document.getElementById('cal-month-label').textContent = label;

    const grid    = document.getElementById('cal-days');
    grid.innerHTML = '';
    const first   = new Date(calYear, calMonth, 1).getDay();
    const days    = new Date(calYear, calMonth + 1, 0).getDate();
    const todayTs = new Date(now.getFullYear(), now.getMonth(), now.getDate()).getTime();

    for (let i = 0; i < first; i++) {
        grid.insertAdjacentHTML('beforeend', '<span class="cal-day empty"></span>');
    }
    for (let d = 1; d <= days; d++) {
        const date   = new Date(calYear, calMonth, d);
        const ts     = date.getTime();
        const iso    = date.getFullYear() + '-'
                     + String(date.getMonth() + 1).padStart(2, '0') + '-'
                     + String(date.getDate()).padStart(2, '0');
        const dow    = date.getDay();
        const past   = ts < todayTs;
        const wkend  = dow === 0 || dow === 6;
        const cls    = ['cal-day', past || wkend ? 'disabled' : 'available',
                        state.date === iso ? 'selected' : ''].filter(Boolean).join(' ');
        grid.insertAdjacentHTML('beforeend',
            `<button class="${cls}" data-date="${iso}" type="button" ${past||wkend?'disabled':''}>${d}</button>`);
    }

    grid.querySelectorAll('.cal-day.available').forEach(btn => {
        btn.addEventListener('click', () => selectDate(btn.dataset.date));
    });
}

function selectDate(iso) {
    state.date = iso;
    state.time = null;
    document.getElementById('f-date').value = iso;
    document.getElementById('step2-next').disabled = true;
    document.querySelectorAll('.cal-day').forEach(b => b.classList.toggle('selected', b.dataset.date === iso));
    const d = new Date(iso + 'T12:00:00');
    document.getElementById('slots-date-label').textContent =
        d.toLocaleDateString('en-US', { weekday:'long', month:'long', day:'numeric' });
    loadSlots(iso);
}

function loadSlots(iso) {
    const grid = document.getElementById('slots-grid');
    grid.innerHTML = '<p class="slots-loading"><span class="material-symbols-outlined spin">progress_activity</span> Loading slots…</p>';

    fetch(`<?php echo admin_url('admin-ajax.php'); ?>?action=malab_get_slots&date=${iso}&nonce=<?php echo wp_create_nonce('malab_slots'); ?>`)
        .then(r => r.json())
        .then(data => {
            if (!data.success || !data.data.slots.length) {
                grid.innerHTML = '<p class="slots-none">No slots available for this date.</p>';
                return;
            }
            grid.innerHTML = data.data.slots.map(s =>
                `<button class="time-slot ${s.available ? 'available' : 'taken'}"
                         data-time="${s.time}" type="button"
                         ${s.available ? '' : 'disabled'}>${s.label}</button>`
            ).join('');
            grid.querySelectorAll('.time-slot.available').forEach(btn => {
                btn.addEventListener('click', () => {
                    grid.querySelectorAll('.time-slot').forEach(b => b.classList.remove('selected'));
                    btn.classList.add('selected');
                    state.time = btn.dataset.time;
                    document.getElementById('f-time').value = state.time;
                    document.getElementById('step2-next').disabled = false;
                });
            });
        })
        .catch(() => { grid.innerHTML = '<p class="slots-none">Could not load slots. Try again.</p>'; });
}

document.getElementById('cal-prev').addEventListener('click', () => {
    if (calMonth === 0) { calMonth = 11; calYear--; } else calMonth--;
    renderCalendar();
});
document.getElementById('cal-next').addEventListener('click', () => {
    if (calMonth === 11) { calMonth = 0; calYear++; } else calMonth++;
    renderCalendar();
});

/* ── Back buttons ────────────────────────────────────────── */
document.querySelectorAll('.booking-back').forEach(btn => {
    btn.addEventListener('click', () => goTo(parseInt(btn.dataset.target)));
});
document.getElementById('step2-next').addEventListener('click', () => goTo(3));

/* ── Step 3: Submit ──────────────────────────────────────── */
document.getElementById('booking-form').addEventListener('submit', async e => {
    e.preventDefault();
    const btn = e.target.querySelector('[type=submit]');
    btn.disabled = true;
    btn.innerHTML = '<span class="material-symbols-outlined spin">progress_activity</span> Booking…';

    const fd = new FormData(e.target);
    fd.append('action', 'malab_create_booking');
    fd.append('nonce', document.querySelector('[name=booking_nonce]').value);

    try {
        const res  = await fetch('<?php echo admin_url('admin-ajax.php'); ?>', { method:'POST', body:fd });
        const data = await res.json();
        goTo(4);
        const result = document.getElementById('booking-result');
        if (data.success) {
            result.innerHTML = `
              <div class="booking-success">
                <span class="material-symbols-outlined success-icon">check_circle</span>
                <h2>Booking Confirmed!</h2>
                <p>Your session has been added to the MA LAB calendar.</p>
                <div class="booking-summary-card glass">
                  <div class="summary-row"><span>Service</span><strong>${data.data.service}</strong></div>
                  <div class="summary-row"><span>Date</span><strong>${data.data.date}</strong></div>
                  <div class="summary-row"><span>Time</span><strong>${data.data.time}</strong></div>
                  <div class="summary-row"><span>Name</span><strong>${data.data.name}</strong></div>
                </div>
                <p class="booking-note">A confirmation email has been sent to <strong>${data.data.email}</strong>.</p>
                <a href="<?php echo home_url('/'); ?>" class="btn-primary" style="margin-top:32px;display:inline-flex;">
                  BACK TO SITE <span class="material-symbols-outlined icon">arrow_forward</span>
                </a>
              </div>`;
        } else {
            result.innerHTML = `<div class="booking-error"><p>${data.data.message}</p>
              <button class="btn-secondary" onclick="location.reload()" style="margin-top:24px">TRY AGAIN</button></div>`;
        }
    } catch {
        goTo(4);
        document.getElementById('booking-result').innerHTML =
            '<div class="booking-error"><p>Network error. Please try again.</p></div>';
    } finally {
        btn.disabled = false;
    }
});

/* ── Init ────────────────────────────────────────────────── */
renderCalendar();
})();
</script>

<?php get_footer(); ?>

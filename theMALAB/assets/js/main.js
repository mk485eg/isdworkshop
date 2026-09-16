/* MA LAB — main.js | Kinetic Lab Design System */
(function () {
  'use strict';

  /* ── Sticky nav ────────────────────────────────────── */
  const header = document.getElementById('site-header');
  window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 60);
  }, { passive: true });

  /* ── Mobile nav toggle ──────────────────────────────── */
  const toggle  = document.getElementById('nav-toggle');
  const navLinks = document.getElementById('primary-nav');

  if (toggle && navLinks) {
    toggle.addEventListener('click', () => {
      const open = navLinks.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open);
      document.body.style.overflow = open ? 'hidden' : '';

      // Animate hamburger → X
      const spans = toggle.querySelectorAll('span');
      if (open) {
        spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
        spans[1].style.opacity   = '0';
        spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
      } else {
        spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
      }
    });

    navLinks.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        navLinks.classList.remove('open');
        document.body.style.overflow = '';
        toggle.setAttribute('aria-expanded', 'false');
        toggle.querySelectorAll('span').forEach(s => {
          s.style.transform = '';
          s.style.opacity   = '';
        });
      });
    });
  }

  /* ── Smooth scroll offset for fixed nav ───────────── */
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const target = document.querySelector(this.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      const offset = (header ? header.offsetHeight : 80) + 16;
      const top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });

  /* ── Scroll-to-top button ───────────────────────────── */
  const scrollTop = document.getElementById('scroll-top');
  if (scrollTop) {
    window.addEventListener('scroll', () => {
      scrollTop.classList.toggle('visible', window.scrollY > 400);
    }, { passive: true });

    scrollTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ── Fade-up intersection observer ─────────────────── */
  const fadeEls = document.querySelectorAll('.fade-up');
  if ('IntersectionObserver' in window && fadeEls.length) {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

    fadeEls.forEach(el => io.observe(el));
  } else {
    fadeEls.forEach(el => el.classList.add('visible'));
  }

  /* ── Counter animation ──────────────────────────────── */
  function animateCounter(el, target, suffix) {
    let start   = 0;
    const dur   = 1800;
    const step  = 16;
    const inc   = target / (dur / step);
    const timer = setInterval(() => {
      start = Math.min(start + inc, target);
      el.textContent = Math.floor(start) + suffix;
      if (start >= target) {
        el.textContent = target + suffix;
        clearInterval(timer);
      }
    }, step);
  }

  const statsSection = document.querySelector('.stats');
  if (statsSection && 'IntersectionObserver' in window) {
    const statsIO = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          document.querySelectorAll('.stat-number[data-count]').forEach(el => {
            const count  = parseInt(el.dataset.count, 10);
            const suffix = el.textContent.includes('%') ? '%' : el.textContent.includes('+') ? '+' : '';
            animateCounter(el, count, suffix);
          });
          statsIO.disconnect();
        }
      });
    }, { threshold: 0.3 });
    statsIO.observe(statsSection);
  }

  /* ── Contact form AJAX ──────────────────────────────── */
  const form   = document.getElementById('contact-form');
  const status = document.getElementById('form-status');

  if (form && typeof malabAjax !== 'undefined') {
    form.addEventListener('submit', async function (e) {
      e.preventDefault();

      const submit = form.querySelector('[type="submit"]');
      submit.disabled    = true;
      submit.textContent = 'Sending…';
      status.style.display = 'none';

      const data = new FormData(form);
      data.append('action', 'malab_contact');
      data.append('nonce',  malabAjax.nonce);

      try {
        const res  = await fetch(malabAjax.url, { method: 'POST', body: data });
        const json = await res.json();

        status.style.display = 'block';
        status.style.padding = '14px 18px';
        status.style.borderRadius = '6px';
        status.style.marginBottom = '16px';
        status.style.fontSize = '14px';

        if (json.success) {
          status.style.background = 'rgba(0,82,255,0.12)';
          status.style.border     = '1px solid rgba(0,82,255,0.35)';
          status.style.color      = '#b7c4ff';
          status.textContent      = json.data.message;
          form.reset();
        } else {
          status.style.background = 'rgba(255,180,171,0.1)';
          status.style.border     = '1px solid rgba(255,180,171,0.3)';
          status.style.color      = '#ffb4ab';
          status.textContent      = json.data.message;
        }
      } catch {
        status.style.display    = 'block';
        status.style.background = 'rgba(255,180,171,0.1)';
        status.style.border     = '1px solid rgba(255,180,171,0.3)';
        status.style.color      = '#ffb4ab';
        status.textContent      = 'Connection error. Please try again.';
      } finally {
        submit.disabled    = false;
        submit.textContent = 'Send Message ›';
      }
    });
  }

  /* ── Active nav link on scroll ──────────────────────── */
  const sections  = document.querySelectorAll('section[id]');
  const navAnchors = document.querySelectorAll('.nav-links a[href^="#"]');

  if (sections.length && navAnchors.length) {
    window.addEventListener('scroll', () => {
      let current = '';
      sections.forEach(section => {
        if (window.scrollY >= section.offsetTop - 120) {
          current = section.id;
        }
      });
      navAnchors.forEach(a => {
        a.classList.toggle('active', a.getAttribute('href') === '#' + current);
      });
    }, { passive: true });
  }

})();

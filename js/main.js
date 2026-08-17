// Mobile navigation toggle
const hamburgerBtn = document.getElementById('hamburgerBtn');
const mobileNav = document.getElementById('mobileNav');

if (hamburgerBtn && mobileNav) {
  hamburgerBtn.addEventListener('click', () => {
    const isOpen = mobileNav.classList.toggle('open');
    hamburgerBtn.classList.toggle('open', isOpen);
    hamburgerBtn.setAttribute('aria-expanded', String(isOpen));
  });

  mobileNav.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
      mobileNav.classList.remove('open');
      hamburgerBtn.classList.remove('open');
      hamburgerBtn.setAttribute('aria-expanded', 'false');
    });
  });
}

// Quote form submission (front-end only demo — wire up to a backend/email service before launch)
const quoteForm = document.getElementById('quoteForm');
const formNote = document.getElementById('formNote');

if (quoteForm && formNote) {
  quoteForm.addEventListener('submit', (event) => {
    event.preventDefault();
    formNote.textContent = "Thanks — we've received your request and will be in touch shortly.";
    quoteForm.reset();
  });
}

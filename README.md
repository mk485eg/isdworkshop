# Southern Cross Plumbing — Website

A premium, conversion-focused static website for an Australian plumbing business, built from a detailed design brief covering brand feel, layout, colours, typography, and mobile UX.

## Structure

- `index.html` — full single-page site (header, hero, trust bar, services, emergency section, why-choose-us, how-it-works, about, reviews, service area, quote form, footer)
- `css/styles.css` — design system (navy/white/blue/orange palette, typography, responsive layout, mobile sticky CTA bar)
- `js/main.js` — mobile nav toggle and demo quote-form handling

## Running locally

No build step required — open `index.html` directly in a browser, or serve the folder:

```bash
python3 -m http.server 8000
```

Then visit `http://localhost:8000`.

## Placeholders to replace before launch

The brief specifically calls for placeholders rather than invented facts. Search for these before going live:

- Business name (currently "Southern Cross Plumbing" — a placeholder name)
- Phone number (`1300 000 000`) and email (`info@example.com.au`)
- Service area suburbs (`[Suburb 1]`–`[Suburb 6]`)
- Years in business / licence numbers (in the About section)
- Customer reviews (currently clearly marked sample reviews)
- Social media links (currently `#`)
- Real photography in place of the SVG placeholder graphics
- Wiring the quote form to a real backend or email service

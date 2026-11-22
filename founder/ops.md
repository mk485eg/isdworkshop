# Operations: MA Transport (Australia)

Inputs: `founder/idea.md`, `founder/offer.md`, `founder/numbers.json`. Supplier prices below are **not verified** (this session could not open vendor pages); get each from the linked official page or a quote. If real prices differ from `numbers.json`, update it and re-run the CFO.

## 1. The daily cycle (✱ = the customer sees it)

1. Monitoring check: uptime, overnight backups, failed SMS/emails.
2. ✱ Support inbox and phone (founder): answer within 1 business hour.
3. ✱ Migration and onboarding sessions with new founding operators.
4. Product work (contract developer): bug fixes first, then the roadmap.
5. ✱ Sales: 3 calls or depot visits a day (`marketing.md`).
6. ✱ Weekly: release notes to customers; Friday check that Xero sync is reconciled.
7. Monthly: invoices out (Stripe or Xero); review churn and support load.

## 2. Suppliers (get quotes or public prices)

| Need | Options | Notes |
|---|---|---|
| Cloud hosting, AU region | AWS (Sydney / Melbourne regions), Microsoft Azure (Australia East), Google Cloud (Sydney) | AU data residency is promised in the offer. Pick one with managed Postgres and backups |
| Card billing | Stripe (AU), GoCardless (direct debit) | Direct debit suits operators who dislike card fees |
| Accounting integration | Xero API (priority), MYOB API (later) | Check the Xero app partner programme's terms and any certification fees |
| SMS run sheets | MessageMedia (AU), Twilio | Per-message cost feeds the A$9/customer hosting estimate |
| Transactional email | Postmark, Amazon SES | |
| Helpdesk | Help Scout, Freshdesk, Zendesk | |
| Contract developer | Freelance or agency, AU time zone preferred | Get 2–3 quotes for the MVP scope in the report |

## 3. People

| Role | Hours (slow first months) | Hours (at ~25 customers) | Pay assumption |
|---|---|---|---|
| Founder: sales, support, migration | Full-time, unpaid | Full-time, unpaid | `numbers.json` |
| Contract developer | ~0.5 FTE | 0.5–1 FTE | A$6,500/month estimate at 0.5 FTE |
| Support hire | none | First hire at ~40–60 customers | ~A$95k + super + on-costs (estimate). Confirm award and super rates with an accountant |

## 4. Routines (SOPs)

**Onboarding a founding operator (target: live in 10 business days)**
1. Sign the agreement; take the first quarter's payment (60-day refund applies).
2. Collect their data: Excel, a CSV export from the current system, or photos of the whiteboard.
3. Import customers, vehicles (rego, inspection dates) and drivers (authority and licence expiry).
4. Import future bookings; run the clash report; review it with the owner.
5. Set up Xero and test-sync one invoice.
6. Send each driver a test run sheet by SMS.
7. Side-by-side for up to 60 days; weekly 15-minute check-in.

**Handling an incident (outage or wrong data)**
1. Acknowledge within 15 minutes by SMS to affected operators.
2. Give the workaround: printable run sheets for today (always available offline as a PDF).
3. Fix, write a plain-English cause-and-fix note within 24 hours, and credit the month if a run was affected.

**Leaving customer (the data guarantee)**
1. Full Excel/CSV export within 1 business day.
2. Confirm deletion in writing after 30 days.

## 5. Tools (smallest stack)

Hosting (one provider above), Stripe or GoCardless, Xero (own books), helpdesk, a CRM (HubSpot free tier or a spreadsheet at first), a status page.

## 6. Licences, legal and insurance (confirm with the authority or a professional; not legal advice)

- ABN and business or company registration: https://business.gov.au/registrations ; ASIC if you incorporate.
- GST registration once turnover reaches A$75,000: https://www.ato.gov.au/businesses-and-organisations/gst-excise-and-indirect-taxes/gst/registering-for-gst
- **Privacy Act 1988 / Australian Privacy Principles:** the small-business exemption may not apply in practice, and its removal is on the reform agenda. Driver licence numbers, Working With Children Check details and passenger names (including children) are sensitive. OAIC guidance: https://www.oaic.gov.au/privacy/privacy-guidance-for-organisations-and-government-agencies
- **Notifiable Data Breaches scheme**, if covered: https://www.oaic.gov.au/privacy/notifiable-data-breaches
- **Australian Consumer Law** on guarantees and refunds: https://www.accc.gov.au/business/consumer-rights-and-guarantees
- Insurance: professional indemnity plus cyber liability (quotes needed; A$250/month is an estimate).
- Customer terms: SaaS agreement, DPA, acceptable-use policy, SLA. Have a lawyer draft them (A$5k estimate in startup).

## 7. Risk register

| # | Risk | Likelihood | Impact | Plan |
|---|---|---|---|---|
| 1 | No operator pays (trust and habit) | High | Fatal | Deposits before build; stop rule in the launch test |
| 2 | Outage on a Saturday wedding or excursion run | Medium | High | Offline PDF run sheets; status page; founder phone |
| 3 | Data migration errors cause a real double-booking | Medium | High | Clash report signed off by the owner before go-live |
| 4 | Founder burnout (sales + support + migration) | High | High | Cap the founding program at 10 operators; hire support at ~40–60 |
| 5 | Contract developer leaves | Medium | High | Code in the founder's repo; documentation; second contractor identified |
| 6 | Data breach involving children's or driver data | Low–Medium | Critical | Minimal data, encryption, MFA, AU hosting, incident plan |
| 7 | Xero API change breaks sync | Medium | Medium | Monitoring and manual export fallback |
| 8 | An incumbent cuts price or copies features | Medium | Medium | Win on migration, support and compliance depth |
| 9 | Peak-season launch blocks adoption | High | Medium | Onboard Feb–Oct; freeze changes in Nov–Dec |
| 10 | Compliance warning wrong (expired authority missed) | Low | High | Present it as a reminder, not legal certification; terms of service; test suite |

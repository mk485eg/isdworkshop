# Pricing: MA Transport

Inputs:
- `founder/panel/answers` (20 simulated buyers), split by the tier each buyer would be on: `founder/panel/by_tier/`.
- `founder/competitors.md`.
- `founder/numbers.json`, run through the CFO tool.

The CFO model uses `days_per_month: 1`, so wherever the tool says "a day", read "paying customers".

## 1. What the panel said (Van Westendorp, by tier)

| Tier (current) | Buyers | Acceptable range (PMC–PME) | Indifference price | Median "getting expensive" | Median "too expensive" | Current price |
|---|---|---|---|---|---|---|
| Starter A$199 | 6 (thin) | A$49–199 | A$119 | A$199 | A$300 | **at the top edge** |
| Growth A$399 | 9 | A$102–450 | A$250 | A$399 | A$550 | inside, upper half |
| Fleet A$699 | 5 (thin) | A$151–650 | A$351 | A$650 | A$900 | **above the range** |

Curves: `founder/pricing-curve-starter.md`, `-growth.md`, `-fleet.md`. **These are simulated answers. They choose what to test; they prove nothing.** Note that 19 of the 20 buyers gave a reason other than price for passing (10 trust, 9 habit). Price is not the main blocker.

## 2. What competitors charge (`founder/competitors.md`)

- Coach Manager (AU): A$137.50 / A$220 at level 1; A$302.50 / A$385 unlimited (Express / Full), ex-GST, plus A$27.50 per user.
- eCoachManager: ~A$215–240 a month plus A$300–350 setup.
- Moovs: US$129–199 a month, with a free plan.
- Telematics (already paid by many operators): ~A$25–35 per vehicle per month. **Your A$20–30 extra-bus fee will be compared directly with this.**

## 3. What the business needs (CFO tool, same costs, three prices)

| Blended price per customer-month | Contribution | Break-even (paying customers) | Year 1 operating profit (ramp to 17 customers) |
|---|---|---|---|
| **A$414** (current tiers, weighted by panel mix) | A$245 (59%) | **38** | −A$91,510 |
| A$300 | A$131 (44%) | 71 | −A$100,858 |
| A$250 | A$81 (32%) | 115 | −A$104,958 |

**Cutting the price makes this business worse, not better.** Support is a per-customer cost (an estimate of about A$152 a month), so every A$50 off nearly doubles the break-even. The panel's "cheaper" signal has to be met with lower switching risk (migration, trial, references), not a lower price.

## 4. Decision

**The price.** Keep the blended price at about A$400, but restructure the tiers so each sits inside its acceptable range:

| Rung | Proposed test price | Why |
|---|---|---|
| **Starter** (≤5 vehicles) | **A$179** (test A$149 vs A$199) | Current A$199 sits on the panel's "too expensive" edge, and between Coach Manager Express and Full L1 |
| **Growth** (≤15) | **A$379** (test A$349 vs A$399) | Inside the range; near the median "getting expensive" point; must include a driver app plus compliance to justify being above Coach Manager Full (A$220–385) |
| **Fleet** (≤30) | **A$599** (test A$549 vs A$649) | A$699 is above the panel's PME (A$650) and ~82% above Coach Manager Full Unlimited |
| Extra vehicle | **A$15** | Below telematics, so it doesn't look like a second GPS bill |
| **Onboarding and migration** (one-off) | **A$750–1,500** by fleet size | The market already accepts setup fees (eCoachManager A$300–350). It recovers the support cost in month one, and it is the service the panel asked for |

**The ladder's reason to step up:** Starter = bookings, quotes, allocation, run sheets. Growth adds the driver app, compliance expiry blocking and Xero sync. Fleet adds multi-depot, the audit evidence pack and priority support.

**The opening offer (honest, dated):** "Founding operator" places for the first 10 operators only. A 12-month agreement at 30% off list, prepaid quarterly; migration included free; a 60-day exit with full data export. Offer ends 31 March 2027, or when 10 places fill, whichever comes first. No "was" prices.

## 5. What to test with real buyers

1. In discovery interviews, ask the four Van Westendorp questions for real (CSV → `van_westendorp.py`). Real answers replace the simulated ones.
2. Split the founding offer by deposit: half of prospects see Growth at A$349, half at A$399. Measure the deposit rate, not the "sounds good" rate.
3. Test the paid migration fee against free migration with a 12-month commitment.

## 6. Verbatim price objections from the panel (simulated, for marketing, never as testimonials)

- "Two hundred a month is near on two and a half grand a year for a handful of buses I already run fine with a diary, a spreadsheet and the phone." (P001)
- "Two hundred bucks a month is real money for me, nearly two and a half grand a year, for something I've managed without." (P002)
- From P016's answer, Fleet tier: A$8,400 a year to a new company with no customers was the sticking point.

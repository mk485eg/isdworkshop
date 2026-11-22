# MA Transport · Business plan

**Verdict: Not yet**

- ✓ Each customer-month earns $66.00 before fixed costs (25% contribution).
- ✗ Year 1 operating LOSS: $107,442.
- ✓ Break-even is 141 customer-months a day against a capacity of 2000.
- ✗ 0 of 20 simulated buyers buy (0%, the bar is 25%).

| key number | |
| --- | ---: |
| Price | $262.00 a customer-month |
| Profit margin at plan | -228% per customer-month |
| Break-even | 141 customer-months a day |
| Year 1 operating profit | $-107,442 |
| Startup spend | $73,000 |
| Cash needed before it pays for itself | $180,442 |
| Startup money earned back | not in year 1 |
| Buyer panel | 0 buy · 20 pass |

## The idea

- What it is: a cloud-based Transport Management System (TMS) for Australian passenger transport operators, covering fleet and bus records, drivers, bookings and customers, trip scheduling and allocation, trip status and tracking, maintenance and vehicle records, and operational, business and financial reporting.
- Who it is for: private bus operators, coach charter companies, passenger transport and shuttle bus businesses, small and medium fleet operators in Australia; larger transport operators as a future market.
- What it sells, at what price: a monthly SaaS subscription priced by fleet size (experimental, unvalidated): Starter A$199/month (up to 5 buses), Growth A$399/month (up to 15 buses), Fleet A$699/month (up to 30 buses); extra buses about A$20–30/month each. A per-trip fee was considered and set aside for now.
- Where and how: online (cloud web app) sold across Australia, possible international expansion later. Go-to-market channel not yet decided.
- Budget and constraints: early stage; no paying customers, letters of intent or interviews on file; no product in market. Budget not stated. Earlier internal modelling assumed a 15-bus operator with 13 active buses, 22 operating days a month and roughly 572–715 trips a month (unverified assumptions, not industry data).

## Summary

**Verdict: NOT YET** (computed by `compile.py`). Two of the four checks fail: **year 1 loses A$107,442 on operations**, and **0 of 20 simulated buyers bought the original pitch** (0%, against a 25% bar). The re-tested offer reached 2 of 20 (10%); that also fails.

**What has to change first, and which skill changes it:**
1. **Trust and evidence** (`/founder-launch`): real deposits from real operators. No offer wording can fake references.
2. **Scope** (the board's condition, `/founder-offer`): one workflow, not a complete TMS.
3. **Support cost per customer** (`/founder-cfo`): self-serve onboarding, or the margin never works.

**The business.** MA Transport is cloud software for Australian bus, coach and charter operators. The strongest version is a "Clash-Free Charter Desk" for independent operators with 3–30 vehicles: enquiry → quote → allocation → run sheet → Xero invoice, with double-booking and expired-authority blocking.

**The numbers behind the verdict** (all inputs are estimates; `cfo.md`):
- At the founding price (A$262 blended), contribution is **A$66 a customer-month (25%)**; at list price (A$374), **A$178 (48%)**.
- Break-even is **141 paying customers** at the founding price, or **53** at list.
- Year 1: **−A$107,442** operating, **−A$180,442** after the A$73,000 startup spend.

**Where the board and the panel agree:** no evidence of demand; "new company, nobody I know uses it" is the killer objection; the product is too broad. **Where they differ:** the board's Offers lens saw "not the cheapest" as a strength, but panel buyers in the 3–5 vehicle segment put the Starter price at or above their "too expensive" point. Fleet-tier buyers put A$699 above their acceptable range (PME A$650).

**Biggest risk:** operators won't switch from spreadsheets or their current system to an unproven vendor (trust 10, habit 9 of 20 passes). **Response:** a deposit test before building, aimed at growth-minded operators (the only behaviour group that bought: 2 of 3).

**To start:** about **A$180,000** of cash before it pays for itself if the MVP is built (`cfo.md`). The first test, the founding-operator deposits (`launch.md`), needs only a prototype, travel and association fees.

**This week:** book the first 5 operator phone interviews (20 minutes each) and ask the four price questions for real.

_The panel is simulated buyers and the numbers are projections from estimated inputs. Real operators and real quotes must confirm them. Not financial, legal or tax advice._

## What the board said

**Vote: 3 PASS (Offers, Monopoly, Product). Average score: 3.0 / 10.**

The memos are in `founder/board/offers.md`, `monopoly.md` and `product.md`.

### Risks raised by more than one member (most serious first)

1. **No evidence of demand** (all three). No interviews, letters of intent, prototype or customers. On the Offers lens's value equation, "perceived likelihood" is close to zero, and the Monopoly lens counts that as having no distribution.
2. **A suite with no single job to do, matching what incumbents already sell** (all three). The feature list overlaps with Coach Manager, eCoachManager, TransportMe and Busable. Nothing is described as ten times better (Monopoly), there is no named outcome (Offers), and there is no "one thing" (Product).
3. **Priced above the cheapest incumbent with no reason to pay more** (Offers, Monopoly). A$199–699 against Coach Manager's published A$137.50–385.
4. **No route to customers** (Offers, Monopoly). The market is small and fragmented, and the sales channel has not been chosen. Acquisition cost is an open question for `/founder-cfo` and `/founder-marketing`.
5. **Switching effort and the handover between systems** (Offers, Product). Data migration, telematics overlap, and accounting handover.

### Where the members disagree

- **Price.** The Offers lens counts "not the cheapest" as a strength, because it avoids a race to the bottom. The Monopoly lens counts the same fact as a weakness: neither cheaper nor yet better.
- **Sticky data.** The Monopoly lens sees high switching costs as future protection once a customer is won. The Offers and Product lenses see the same switching cost as the main reason operators won't move in the first place.
- **Network effect.** Only the Monopoly lens suggests one: a booking layer linking operators, schools, councils and charter brokers.

### Conditions to move to FUND IF (checklist for the rest of the pack)

- [ ] At least 10 operator conversations showing one specific, costly pain; at least 3 written intents to pay (Offers). *Real-world only: the consumer panel can surface objections but cannot tick this.*
- [ ] One named niche that can be owned within 18 months, with a count of its businesses (Monopoly). *Partly `/founder-competitors` and market research.*
- [ ] A one-sentence customer moment, with one workflow for version one and everything else cut (Product). *`/founder-offer`, then MVP scope in the report.*
- [ ] A named outcome with an affordable guarantee, for example migration done for the operator plus audit-ready records within a set time (Offers). *`/founder-offer` + `/founder-cfo`.*
- [ ] An offer stack that removes switching effort: import, setup, training (Offers, Product). *`/founder-offer`.*
- [ ] A chosen channel, plus a tested cost to acquire a customer (Offers, Monopoly). *`/founder-marketing` + `/founder-cfo`; real test in `/founder-launch`.*
- [ ] A secret, or a 10x improvement, backed by interviews (Monopoly). *Real-world interviews.*
- [ ] A clickable prototype of the one workflow, tested with operators (Product). *`/founder-launch`.*
- [ ] A plan for the GPS and accounting handovers (Product). *MVP and integration section.*

### The strongest version the board can see

This differs from the pitch. It is **not** a "complete TMS for every passenger operator, large operators included". It is one focused workflow for one small market the founder can own: **independent charter and coach operators with roughly 5–30 vehicles, starting in NSW, where accreditation and BOAS audits make good records unavoidable.** Version one does one job brilliantly: an enquiry becomes a quote, then an allocated vehicle and driver, then a run sheet, then an invoice. Compliance checks (expired driver authority, overdue vehicle inspection) block bad allocations, and an audit-ready record falls out as a by-product. Migration is done for the operator as part of the offer, and GPS and accounting are integrated (Xero first), not rebuilt. Distribution comes through the people operators already trust: BusNSW and the other state associations, accreditation auditors, and telematics partners. The memos agree that none of this has evidence yet. Until real operators confirm the pain and pay, the board's answer stays PASS.

## The competition

Sources: web-search results, 22 November 2026. **Direct page fetches were blocked by this session's network policy**, so every fact below comes from indexed snippets of the linked pages. Verbatim positioning lines could not be captured; they are marked "not captured", not guessed. NPD = not publicly disclosed. Full rows: `founder/competitors.csv`.

### 1. The table (most direct first)

| Competitor | Type | Comparable price | What it sells | Rating (reviews) |
|---|---|---|---|---|
| [Coach Manager](https://distinctive-systems.com/au/products/coach-manager/australian-pricing/) | Direct, AU-priced | **A$137.50–385/mo** ex-GST (Express L1 137.50; Full L1 220; Express/Full Unlimited 302.50/385); +A$27.50 per user | Charter reservations, quoting, dispatch, contracts; sister maintenance and driver-compliance systems. Windows-based ([featuredcustomers](https://www.featuredcustomers.com/vendor/distinctive-systems-ltd)) | NPD |
| [eCoachManager](https://ecoachmanager.com/packages-price-list-nz/) | Direct, markets to AU | ~A$215–240/mo + A$300–350 setup | Cloud coach/minibus hire quoting, booking, dispatch, driver app, invoicing | No reviews on [G2](https://www.g2.com/products/ecoachmanager/reviews) |
| [TransportMe](https://www.transportme.com.au) | Direct, AU | NPD | Ticketing, smartcards, GPS, compliance, maintenance, passenger app; claims 150+ companies, 3,500+ vehicles | NPD |
| [Busable](https://busable.app/about) | Direct, AU regional | NPD | Timetables, reported rostering, charter, tracking, maintenance | NPD |
| [RouteStra](https://www.capterra.com.au/software/1113395/RouteStra) | Direct | NPD (per user) | Scheduling, compliance, private hire, rosters | NPD |
| [Coach & Charter Manager](https://www.capterra.com.au/software/201842/coach-charter-manager) | Direct | from US$100/mo | Charter management | 4.8 (21) |
| [Moovs](https://www.moovsapp.com/en-au/charter-bus-software) | Direct, US-centric | US$129–199/mo + free plan (sources conflict) | Quoting, dispatch, driver app, payments, customer portal | 4.8 (33) [Capterra](https://www.capterra.com/p/209139/moovs/) |
| [Busify](https://www.busify.com/) / [Busie](https://www.getbusie.com/) / [CoachRail](https://www.itqlick.com/coachrail/pricing) | Direct, US | NPD / NPD / ~US$50 per user | Charter dispatch suites | NPD |
| [Sengerio](https://www.softwareadvice.com.au/software/166261/sengerio) / [CIS-BUS Charter](https://www.capterra.com.au/software/1016965/cis-bus-charter) | Direct, intl | €7.60/mo (unverified) / NPD | Charter booking and planning | NPD |
| [BusMinder](https://apps.apple.com/app/id1364797036), [RollCall](https://rollcall.com.au/bus-companies) | Indirect (school bus) | NPD | Student tracking, duty of care | NPD |
| [Trapeze](https://trapezegroup.com.au/bus/planning-scheduling/), [Optibus](https://blog.optibus.com/buslines-brings-optibus-to-new-south-wales-australia-to-improve-public-transportation) | Indirect (enterprise route) | NPD | Scheduling and rostering for large operators | NPD |
| [Teletrac Navman](https://www.expertmarket.com/au/vehicle-tracking/teletrac-navman-review), [EROAD](https://eroad.com/?p=84), [Fleetio](https://fleetio.com/pricing) | Indirect (telematics and maintenance) | A$25–30/vehicle (aggregator); $25–35/vehicle; US$4–10/vehicle | GPS, EWD/fatigue, maintenance | NPD |
| [BusCharter.com.au](https://www.aap.com.au/aapreleases/globenewswire9727742/) | Indirect (broker) | NPD (commission) | Routes charter bookings to local operators | NPD |
| Spreadsheets, whiteboard, Xero/MYOB | Substitute | ~A$0 extra | Everything, by hand | n/a |

### 2. Price range for the comparable item (charter ops software, monthly, published)

- **Lowest:** Coach Manager Express L1, A$137.50 (AU-published). A US$100 listing and an unverified €7.60 also exist.
- **Median of the published AU-relevant prices** (137.50, 220, 240, 302.50, 385): **A$240**.
- **Highest published:** Coach Manager Full Unlimited, A$385.
- **MA Transport:** A$199 / 399 / 699. **Growth and Fleet sit above the highest published direct competitor price.**

### 3. Positioning map (axes: published price × modern cloud and mobile experience)

```
            modern / mobile-first
                    ^
   Moovs (US$129-199, AU compliance absent)     MA Transport Growth/Fleet (A$399-699, unbuilt)
   eCoachManager (~A$220-240 + setup)
                    |
 cheap <------------+------------------------------------> expensive
                    |
   Coach Manager (A$137-385, Windows-based)     TransportMe (NPD, hardware + govt)
   Spreadsheets (A$0)                           Trapeze / Optibus (enterprise)
                    v
            legacy / manual
```

### 4. What customers complain about

**Evidence is thin; every theme below has fewer than three reviews.** Independent reviews barely exist for this niche:

- Moovs: "at first there was some downtime" and "initial setup took some time to customize for our mixed fleet and event-heavy schedule" (paraphrased in the search summary of [Capterra/SoftwareFinder reviews](https://softwarefinder.com/fleet-management-software/moovs/reviews); not verbatim from the page). Theme: **setup and onboarding effort** (thin, 1–2 reviews).
- Coach Manager: no Capterra or G2 review text found; one locked review ([G2 seller page](https://www.g2.com/sellers/distinctive-systems)). Theme: **none observable**.
- eCoachManager: "This product hasn't been reviewed yet" on [G2](https://www.g2.com/products/ecoachmanager/reviews). TransportMe: only vendor-site testimonials.

**What thin reviews mean:** buyers don't talk about this software in public. Complaints can only be found through **direct operator interviews**, not desk research.

### 5. The gap

There is **no proven gap**. Several products already cover charter quote-to-dispatch at A$137–385. What the evidence supports, as hypotheses only:

1. **Modern cloud UX with Australian compliance built in.** The cheapest AU-priced incumbent is Windows-based; the modern cloud players (Moovs and others) are North American and show no Australian accreditation features.
2. **Switching done for the operator.** The only recurring complaint theme (thin) is setup effort.
3. **Accreditation evidence as a by-product of daily dispatch** (NSW BOAS audit tool, Oct 2025). No competitor in the results positions on it.

None of these is a moat. Each can be copied.

### 6. The threat (who could copy fastest)

- **eCoachManager**: already cloud-based and marketing to Australia; could add AU compliance fields in a release cycle.
- **Moovs**: a modern product with payments and an `en-au` site; localising would make it the strongest UX option.
- **Coach Manager**: could cut prices or ship a cloud UI; already cheapest on published price.
- **Teletrac Navman / EROAD**: already in the vehicle with bus fatigue rule sets; a booking add-on would bundle against MA Transport.

## The buyer panel

**0 buy · 20 pass** (0% buy) out of 20 simulated buyers. Seed 2026, so the same cards can be dealt again.

These are simulated buyers, not customers. Use this to find objections and weak spots, then confirm the big ones with real people before you spend.

### By segment

| group | buyers | buy rate |
| --- | ---: | ---: |
| Owner of a small charter/shuttle business with 3-5 vehicles (would be on the A$199 Starter plan) | 6 | 0%  (thin) |
| Owner-manager of a 6-15 vehicle coach and charter business (would be on the A$399 Growth plan) | 9 | 0% |
| Managing director of a 16-30 vehicle family coach company (would be on the A$699 Fleet plan) | 5 | 0%  (thin) |

### By buying behaviour

| group | buyers | buy rate |
| --- | ---: | ---: |
| Cost-cutter | 3 | 0%  (thin) |
| Spreadsheet and whiteboard loyalist | 5 | 0%  (thin) |
| Asks other operators first | 3 | 0%  (thin) |
| Growth-minded operator | 3 | 0%  (thin) |
| Compliance worrier | 2 | 0%  (thin) |
| Locked in to an existing system | 4 | 0%  (thin) |

### By income

| group | buyers | buy rate |
| --- | ---: | ---: |
| $108,000 to $166,000 | 7 | 0%  (thin) |
| under $108,000 | 6 | 0%  (thin) |
| $166,000 and up | 7 | 0%  (thin) |

### Why they pass

| reason | buyers | in their words |
| --- | ---: | --- |
| trust | 10 | "Nobody I know is using it. It's brand new with zero customers, and I don't touch software until another operator at the association tells me it actually works. I also don't have time to learn a new system and move all my bookings over on a stranger's word." (P003) · "I do need something better as I add buses, but I'm not moving all my bookings, quotes and driver records onto a brand-new company with zero customers. If it falls over on a Saturday wedding run while I'm behind the wheel, that's my reputation, not theirs." (P004) |
| habit | 9 | "My spreadsheet, whiteboard and Xero do the job for a handful of buses, and I don't have the evenings to learn a whole new system and move everything across. Two hundred bucks a month is real money for me, nearly two and a half grand a year, for something I've managed without." (P002) · "I already pay for a charter package that does my quoting and holds years of bookings and customer history. I'm not tearing that out for a brand-new company with no customers, especially heading into school excursion and end-of-year season." (P006) |
| price | 1 | "Two hundred a month is near on two and a half grand a year for a handful of buses I already run fine with a diary, a spreadsheet and the phone. With fuel, rego and insurance eating me alive, I'm not adding another bill." (P001) |

### Why they buy

| reason | buyers | in their words |
| --- | ---: | --- |

### What would flip a no

- A free trial over a quiet stretch and an operator my size I know telling me it actually saved them time, at closer to a hundred bucks a month.
- A free trial where they set it up for me, load my existing bookings, and it flags clashes so I never double-book a regular client again, plus an operator like me who's actually using it.
- An operator I know and trust, running a fleet my size, telling me they've used it for a few months, it saves them time, and setting it up wasn't a headache.
- A free month or two with them loading my existing data for me, plus a couple of other small operators I can ring who are actually using it day to day.
- A few operators like mine who've used it for six months and come through an accreditation audit on it, plus a written guarantee that my data is stored in Australia and I can export the lot whenever I want, even if they shut down.
- If they moved all my existing data across for free, ran it side by side with my current system through a quiet period, and showed me charter quoting and accreditation records working the way an Australian operator actually needs, with a couple of operators my size already on it.
- Another independent coach operator my size, in my state, telling me it handles their charter quotes and accreditation records and that they got their data in from Excel without losing a week - plus a free trial and a way to pull my data back out.
- If they migrated all my existing spreadsheets for me in the quiet season, gave me a free first few months, and I could talk to another coach operator my size already running on it.
- If they migrated all my existing data across for free and I could talk to a few operators my size who'd been running it smoothly for six months or more.
- A few operators my size that I know from the bus association running it for six months and telling me it works, plus a free trial and help moving my data over.
- Them moving all my existing data across for me at no cost, with a couple of operators I know from the bus association meetings already running on it for a year without dramas.
- A free trial on a few of my buses, plus hearing from a couple of operators my size at the bus association meeting that their drivers actually use it.

20 buyers gave all four price answers. Run founder-pricing's van_westendorp.py on the answers folder.

## Pricing

Inputs:
- `founder/panel/answers` (20 simulated buyers), split by the tier each buyer would be on: `founder/panel/by_tier/`.
- `founder/competitors.md`.
- `founder/numbers.json`, run through the CFO tool.

The CFO model uses `days_per_month: 1`, so wherever the tool says "a day", read "paying customers".

### 1. What the panel said (Van Westendorp, by tier)

| Tier (current) | Buyers | Acceptable range (PMC–PME) | Indifference price | Median "getting expensive" | Median "too expensive" | Current price |
|---|---|---|---|---|---|---|
| Starter A$199 | 6 (thin) | A$49–199 | A$119 | A$199 | A$300 | **at the top edge** |
| Growth A$399 | 9 | A$102–450 | A$250 | A$399 | A$550 | inside, upper half |
| Fleet A$699 | 5 (thin) | A$151–650 | A$351 | A$650 | A$900 | **above the range** |

Curves: `founder/pricing-curve-starter.md`, `-growth.md`, `-fleet.md`. **These are simulated answers. They choose what to test; they prove nothing.** Note that 19 of the 20 buyers gave a reason other than price for passing (10 trust, 9 habit). Price is not the main blocker.

### 2. What competitors charge (`founder/competitors.md`)

- Coach Manager (AU): A$137.50 / A$220 at level 1; A$302.50 / A$385 unlimited (Express / Full), ex-GST, plus A$27.50 per user.
- eCoachManager: ~A$215–240 a month plus A$300–350 setup.
- Moovs: US$129–199 a month, with a free plan.
- Telematics (already paid by many operators): ~A$25–35 per vehicle per month. **Your A$20–30 extra-bus fee will be compared directly with this.**

### 3. What the business needs (CFO tool, same costs, three prices)

| Blended price per customer-month | Contribution | Break-even (paying customers) | Year 1 operating profit (ramp to 17 customers) |
|---|---|---|---|
| **A$414** (current tiers, weighted by panel mix) | A$245 (59%) | **38** | −A$91,510 |
| A$300 | A$131 (44%) | 71 | −A$100,858 |
| A$250 | A$81 (32%) | 115 | −A$104,958 |

**Cutting the price makes this business worse, not better.** Support is a per-customer cost (an estimate of about A$152 a month), so every A$50 off nearly doubles the break-even. The panel's "cheaper" signal has to be met with lower switching risk (migration, trial, references), not a lower price.

### 4. Decision

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

### 5. What to test with real buyers

1. In discovery interviews, ask the four Van Westendorp questions for real (CSV → `van_westendorp.py`). Real answers replace the simulated ones.
2. Split the founding offer by deposit: half of prospects see Growth at A$349, half at A$399. Measure the deposit rate, not the "sounds good" rate.
3. Test the paid migration fee against free migration with a 12-month commitment.

### 6. Verbatim price objections from the panel (simulated, for marketing, never as testimonials)

- "Two hundred a month is near on two and a half grand a year for a handful of buses I already run fine with a diary, a spreadsheet and the phone." (P001)
- "Two hundred bucks a month is real money for me, nearly two and a half grand a year, for something I've managed without." (P002)
- From P016's answer, Fleet tier: A$8,400 a year to a new company with no customers was the sticking point.

## The offer

Method: the Offers lens (`founder-board/lenses.md`), a summary of a published framework, not anyone's words. Inputs: `founder/panel/results.md` (v1), `founder/competitors.md`, `founder/numbers.json`, `founder/board.md`.

### 1. Problem list (in the buyer's words, mostly from the panel)

**Before buying**
1. "It's brand new with zero customers." (trust; 10 of 20 in v1)
2. "Nobody I know is using it." (needs a peer reference)
3. "What I have works well enough." (habit; 9 of 20)
4. "Moving all my bookings, drivers and vehicle history across sounds like a nightmare in peak season."
5. "If it folds, my data goes with it."
6. "Is it generic, or does it handle charter quoting and Australian accreditation?"
7. "Coach Manager or my telematics already does half of this for less."
8. "That's a lot per month on top of fuel, rego, insurance and wages."
9. "I don't have time to learn new software."

**During**
10. "My drivers aren't tech people; they won't use another app."
11. "I don't want to run two systems in my busy season."
12. "Who picks up the phone when it breaks on a Saturday wedding run?"
13. "My office manager doesn't want to type invoices twice." (Xero)
14. "Does it work with the GPS trackers I already have?"

**After**
15. "Will the records actually stand up in an accreditation audit?"
16. "Can I get everything out if I leave?"
17. "Will the price jump after year one?"
18. "Where is my data stored?"

### 2. Solutions, scored (value to the buyer 1–5; cost to deliver 1–5, from `numbers.json` estimates)

| # | Solution | Answers | Value | Cost | Keep? |
|---|---|---|---|---|---|
| A | **One workflow done well**: enquiry, quote, allocation, run sheet, Xero invoice | 6, 7, 9, 13 | 5 | 3 (it's the product) | Core |
| B | **Clash and compliance blocking** (double-bookings, expired authority, licence or inspection) | 6, 15 | 5 | 2 | Core |
| C | **Migration done for the operator** (Excel or current system) | 4, 9 | 5 | 3 (~8 hours per operator, est.) | Bonus 1 |
| D | **60-day side-by-side run plus 60-day money-back** | 1, 3, 11 | 4 | 2 (refund risk modelled below) | Guarantee |
| E | **Written data guarantee**: AU hosting, full Excel export at any time, including on closure | 5, 16, 18 | 4 | 1 | Guarantee |
| F | **Founding price lock**: 30% off for 12 months, then list price published in advance | 8, 17 | 3 | 2 (revenue given up) | Urgency |
| G | **Driver run sheet on the phone, no install** (web link by SMS) | 10 | 4 | 2 | Core |
| H | **Peer references** | 1, 2 | 5 | n/a | **Cannot be offered honestly yet.** It has to be earned with the first 3–5 operators |
| I | Phone support line in business hours plus a weekend emergency number | 12 | 4 | 4 (founder on call) | Founding-only bonus |
| J | Telematics integration | 14 | 3 | 5 | **Cut from v1** (high cost) |
| K | Audit evidence pack mapped to the TfNSW BOAS audit tool | 15 | 4 | 3 | Phase 2 |

### 3. The stack

- **Core:** "Never double-book a coach or send out an unqualified driver again: from enquiry to Xero invoice in one place." (A + B + G)
- **Bonus 1:** the move done for you (C). Answers "nightmare to switch".
- **Bonus 2:** founder-run support line for founding operators (I). Answers "who picks up on Saturday".
- **Guarantee:** 60 days side by side; leave within 60 days for a full refund; data in Australia, fully exportable at any time (D + E).
- **Urgency (true):** 10 founding places, closing 31 March 2027. This is real capacity: one founder can migrate and support about 10 operators.
- **Name:** "Clash-Free Charter Desk: founding operator program".

### 4. Value equation (1–10, before → after)

| Element | Before (pitch v1) | After | What moved it |
|---|---|---|---|
| Dream outcome | 4 (a feature list) | 7 | Core named as an outcome: no clashes, no unqualified drivers, invoice in Xero |
| Perceived likelihood | 1 (new, no proof) | 3 | Guarantees and export; **still low with no references** |
| Time to result | 3 | 6 | Migration done for them; 60-day side-by-side |
| Effort and sacrifice | 2 | 5 | Done-for-you move, phone run sheet; still needs learning time during busy season |

### 5. Re-test (`/founder-consumer --quick`, same seed 2026, same 20 cards)

- **v1 (old pitch): 0 buy · 20 pass (0%)**: trust 10, habit 9, price 1.
- **v2 (this offer): 2 buy · 18 pass (10%)**: habit 10, trust 7, price 1. Results in `founder/panel-v2/results.md`.
- **Who flipped:** P004 (3–5 vehicles) and P012 (6–15 vehicles). **Both are "growth-minded operators"** (2 of 3 in that behaviour group). No spreadsheet loyalist, locked-in user, peer-asker, cost-cutter or compliance worrier flipped.
- **What didn't move:** "no customers yet / nobody I know uses it" is still the dominant objection. Several buyers also said "not in excursion and end-of-year season", so **timing matters: launch after the summer peak.**
- **Confound to disclose:** the buyer cards' segment labels still name the old tier prices (A$199 / 399 / 699), while the v2 pitch shows A$179 / 379 / 599. Several buyers noticed and answered against the pitch.
- **Reading:** the offer helps at the margin, and only for growing operators. **The blocker is the market's trust in a new vendor, not the offer.** Only real references fix that, and they have to be earned one operator at a time.

### 6. Cost of the stack (fed to `/founder-cfo`)

- Migration about 8 hours per operator at an estimated A$60/hour ≈ A$480 per operator; spread over an estimated 24-month life ≈ **A$20 per customer-month** [estimate].
- Refunds: assume 20% of founding operators leave within 60 days and are refunded 2 months [estimate] ≈ **A$7 per customer-month** spread over a 24-month life [estimate].
- Founding price: 30% off list for 12 months. Blended list A$374 (panel mix at A$179 / 379 / 599) → **A$262** in year 1.

Guarantee wording must comply with the Australian Consumer Law (guarantees cannot remove statutory rights). This is not legal advice; have it reviewed.

## The numbers

**How to read the tool's output:** this is a subscription business, so the model sets `days_per_month: 1`. Read every "a day" in the tool's tables as **"paying customers"**. Prices are in AUD before GST (10% GST is added on top in Australia). Not financial, tax or legal advice: have an accountant check the structure, contractor and payroll costs, and GST before money moves.

- **The margin.** At the founding-offer price (blended **A$262** per customer-month in year 1, which is 70% of the A$374 blended list), each customer leaves **A$66 (25%)** after support, hosting, card fees, migration and refunds. Break-even is **141 paying customers**. The year-1 plan reaches 14, which gives a **margin of -228%**. At list price (A$374), contribution is **A$178 (48%)** and break-even is **53 customers**.
- **The line to watch: support cost per customer (estimated A$152 a month).** It is the largest cost line, larger than all hosting combined. Cutting it to A$100 at the founding price takes contribution from A$66 to A$118 and break-even from 141 to 79 customers. At list price, break-even falls from 53 to 41. Price −10% raises break-even from 141 to 234. **Do not compete on price.**
- **Cash.** The founder needs about **A$180,000** before this pays for itself: A$73,000 startup (an MVP built by a contractor, all estimates) plus about A$107,000 of year-1 operating losses. The founder takes no salary. Even ramping to 100 customers at list price inside year 1 would still lose about A$31,000 (what-if `--price 374 --volume 7.15`).
- **Three ways to improve the margin (each one run, not guessed):**
  1. **Move to list price after the founding year** (A$262 → A$374): break-even falls from 141 to **53** customers.
  2. **Self-serve onboarding and help content to cut support from A$152 to A$100 a month:** at A$262, break-even 141 → **79**; at A$374, 53 → **41**.
  3. **Charge for migration instead of giving it away** (removes A$20 a month): contribution A$66 → **A$86**, break-even 141 → **109**. This trades against the panel's top flip condition (free migration), so test it.
- **The board's money conditions (`founder/board.md`):** "a tested cost to acquire a customer" is **not met**. Acquisition is only an assumed A$1,500 a month of fixed spend, with no per-customer figure. "An affordable guarantee" is **met on paper**: the 60-day refund costs an estimated A$7 per customer-month. Every input is an estimate (see `founder/cfo-sources.md`). Nothing is a quote.

---

## Unit economics: MA Transport (fleet-based SaaS for Australian bus/coach operators)

Every number below comes from the input file. Nothing is looked up or guessed.

### One customer-month

| line | per customer-month |
| --- | ---: |
| Price | $262.00 |
| Support time per customer (1 support FTE at ~A$9,100/mo loaded handles ~60 customers) [estimate] | -$152.00 |
| Hosting per customer: AU-region compute, storage, backups, email/SMS [estimate] | -$9.00 |
| Card/payment processing ~2% of the subscription [estimate] | -$8.00 |
| Migration done for the operator (~8h x A$60) spread over a 24-month life [estimate] | -$20.00 |
| 60-day refund guarantee: 20% of operators refunded 2 months, spread over 24 months [estimate] | -$7.00 |
| **Contribution** (what each customer-month leaves to pay the fixed costs) | **$66.00** (25%) |

### The margin that matters

Fixed costs: $9,300 a month (Contract developer, 0.5 FTE (founder unpaid) [estimate] $6,500, Base cloud platform, monitoring, backups [estimate] $450, SaaS tools: CRM, email, helpdesk, accounting [estimate] $400, Insurance: professional indemnity + cyber [estimate, get a quote] $250, Bookkeeping/accountant [estimate] $200, Customer acquisition: association memberships, depot visits, events [estimate] $1,500).

- **Break-even: 141 customer-months a day.** Below that you lose money every month.
- **Profit margin at your plan** (14 a day): **-228%** of every sale, after every cost.
- Capacity: 2000 a day.

### Year 1, month by month

| month | customer-months a day | revenue | profit | cumulative (after $73,000 startup) |
| ---: | ---: | ---: | ---: | ---: |
| 1 | 0 | $0 | -$9,300 | -$82,300 |
| 2 | 0 | $0 | -$9,300 | -$91,600 |
| 3 | 0 | $0 | -$9,300 | -$100,900 |
| 4 | 1 | $262 | -$9,234 | -$110,134 |
| 5 | 2 | $524 | -$9,168 | -$119,302 |
| 6 | 3 | $786 | -$9,102 | -$128,404 |
| 7 | 5 | $1,310 | -$8,970 | -$137,374 |
| 8 | 7 | $1,834 | -$8,838 | -$146,212 |
| 9 | 9 | $2,358 | -$8,706 | -$154,918 |
| 10 | 10 | $2,620 | -$8,640 | -$163,558 |
| 11 | 12 | $3,144 | -$8,508 | -$172,066 |
| 12 | 14 | $3,668 | -$8,376 | -$180,442 |

- **Year 1 operating profit: -$107,442** on $16,506 of revenue.
- After the $73,000 startup spend: -$180,442.
- Startup money earned back: not within year 1.
- Cash you need before it pays for itself: **$180,442**.

### What if

| scenario | margin at plan | break-even a day | year 1 profit |
| --- | ---: | ---: | ---: |
| Base plan | -228% | 141 | -$107,442 |
| Price -10% | -265% | 234 | -$109,093 |
| Volume -20% | -292% | 141 | -$108,274 |
| Unit costs +15% | -240% | 255 | -$109,294 |

### Red flags

- Year 1 loses money on operations (-$107,442).
- The startup spend is not earned back within year 1.

## Marketing

Evidence used:
- `founder/panel/results.md` and `founder/panel-v2/results.md`: simulated buyers.
- `founder/competitors.md`.
- `founder/pricing.md` and `founder/offer.md`.
- `founder/numbers.json` and `founder/cfo.md`.

The panel is simulated. Its quotes are research and **must never appear in ads or as testimonials**.

### 1. Who to market to first

Segment that responded: **growth-minded operators**. 2 of the 3 in this group bought on the v2 offer; every other behaviour group bought 0%. These are owners adding vehicles or contracts who feel the admin outgrowing the spreadsheet. The objection every message must answer is **"new company, no customers, nobody I know uses it"** (17 of 20 passes were trust or habit).

### 2. Positioning

1. For growing charter operators who are outgrowing the whiteboard, MA Transport is the charter desk that makes double-bookings and unqualified-driver allocations impossible, unlike spreadsheets or older desktop charter systems.
2. For coach operators facing accreditation audits, MA Transport is the dispatch tool that keeps audit-ready records as a by-product of everyday booking, unlike generic fleet software.
3. For owner-drivers taking bookings between runs, MA Transport turns an enquiry into a quote, an allocated run sheet and a Xero invoice from your phone, unlike juggling a diary, Excel and Xero.

**Recommended: #1.** It matches the only segment that bought, and it matches the most-cited concrete pain in the flip answers ("flags clashes so I never double-book a regular client again", P002 v1). #2 is a strong second message for compliance worriers, but neither compliance worrier bought on v2. They want proof from an audit first.

### 3. Channels (pick 3)

| Channel | Why it fits | Rough cost | How you'll know |
|---|---|---|---|
| **State bus associations** (BusNSW, BusVic, QBIC): regional meetings, newsletter, member offer | 11 of 20 flip answers mention "an operator I know" or "the bus association". This is where trust travels | Membership or associate fees and travel: get quotes | Meetings booked per event |
| **Founder-led depot visits and calls** to the prospect list in the report | Small-operator owners buy face to face; the founder can migrate a spreadsheet on the spot | Fuel and time | Conversations → demos → deposits |
| **Referral from the first founding operators** (one free month per referred operator who pays) | The only honest fix for "nobody I know uses it" | One month's subscription per success | Referred demos |
| *Not yet:* paid search or social | Tiny, relationship-driven audience; no reviews to point to | | Revisit after 10 customers |
| *Not yet:* Australasian Bus & Coach Expo stand | Expensive before there is a reference customer | | Attend as a visitor only |

### 4. 30-day campaign (founding program opens Tue 2 Feb 2027, after the summer peak)

| Date | Channel | What goes out |
|---|---|---|
| Tue 19 Jan 2027 (L−14) | Email/phone to the 20-operator list | "We're opening 10 founding places for growing charter operators. Can I show you 15 minutes on a real booking of yours?" |
| Thu 21 Jan | LinkedIn (founder) | Hook 1, plus a 45-second screen recording: a clash being blocked |
| Mon 25 Jan | Association newsletter (if accepted) | Short note: the founding program, migration done for you, 60-day side-by-side |
| Wed 27 Jan | Depot visits (Sydney metro, 3 operators) | Bring a laptop; import one week of their bookings live |
| Fri 29 Jan | Follow-up email to everyone visited | Their own week, imported, with the clashes found highlighted |
| **Tue 2 Feb (L)** | Phone + email | Founding places open: written guarantees, data-export promise, price lock, 31 March close |
| Thu 4 Feb | LinkedIn | Hook 4 (a story about the data-export guarantee) |
| Mon 8 – Fri 12 Feb | Depot visits (Central Coast, Illawarra) | Same live-import demo |
| Tue 16 Feb | Association regional meeting (if available) | 5-minute talk: "What a double-booking really costs", no pitch |
| Thu 18 Feb (L+16) | Email to all prospects | Places left (true number only), plus what the first operators are using it for (only with their written permission) |

Weeks with nothing new to say: post one short "how it works" clip (quote → run sheet, the expiry warning, the Xero sync).

### 5. Ten hooks (each answers a real panel objection)

1. "One double-booking can lose you a regular client. This software makes it impossible." (answers "what I have works")
2. "We move your bookings in for you, from Excel or your current system, before you pay a cent." (switching nightmare)
3. "Run it next to your whiteboard for 60 days. Don't like it? Full refund." (habit, risk)
4. "Your data stays in Australia and you can export all of it to Excel any time, even if we close." (new company, data loss)
5. "Your drivers get a link by SMS. No app to install." (drivers aren't tech people)
6. "It won't let you send a driver whose authority has expired." (generic or compliance?)
7. "Quote to Xero invoice without typing it twice." (Friday invoicing)
8. "Built for charter work, not trucks." (generic fleet software)
9. "10 founding places for growing operators; we start after your summer rush." (timing; true scarcity)
10. "Ring the founder. Seriously." (who picks up on Saturday)

### 6. Budget and the most to pay for a customer

- **Max acquisition cost:** at list price, contribution is A$178 a month (`cfo.md`). Over an estimated 24-month life that is ~A$4,270. For a 3:1 return on acquisition, spend **at most ~A$1,400 per customer**. In the founding year (A$66 contribution) it is far lower, so **year 1 must be founder time, not paid spend.**
- **Split of the A$1,500 a month in `numbers.json`:** ~50% association fees and events, ~40% travel to depots, ~10% demo tools.
- **Watch weekly:**
  - **Conversations held.** Target 15 a week; below 8, change the list or the channel.
  - **Demo → deposit rate.** Below 1 in 10 after 30 demos, revisit offer and price.
  - **Referral demos.** If zero after the first 3 customers, ask why.

## Brand

Inputs: `founder/marketing.md` (positioning #1), `founder/competitors.md`, `founder/panel*/results.md`.

### 1. The name problem first

"MA Transport" **sounds like a bus operator, not a software company.** A buyer searching "MA Transport" may expect a transport company, and an existing operator with a similar name could confuse customers or object. It also says nothing about the job. Keep it as the company name if you like, but **consider a product name that says what it does.**

### 2. Ten candidates

| Name | Style | What it says | Risk |
|---|---|---|---|
| MA Transport | Founder/current | A company | Reads as an operator; generic |
| Clash-Free | Descriptive | The core outcome | Generic phrase; hard to trademark alone |
| CharterDesk | Descriptive | Charter booking desk | Check for existing software use |
| RunSheet | Descriptive | The driver's daily sheet | Common industry term; weak mark |
| Depot | Evocative | Where operators work | Very generic |
| Kerbside | Evocative, Australian spelling | Pickup moment | Used by other businesses |
| Coachline | Evocative | Coaches | Close to many operator names (confusion risk) |
| Allocato | Invented | Allocation | Sounds foreign; needs explaining |
| Busbook | Descriptive | Bus booking | Consumer-sounding |
| MA Dispatch | Hybrid | Keeps MA, adds the job | Still generic |

**Shortlist:** CharterDesk · Clash-Free (as the offer or tagline name) · MA Dispatch.

### 3. Checks to run (I can only run public searches; a trademark attorney confirms; nothing is registered until you register it)

- **Trademark (Australia):** search IP Australia's trade mark search (https://search.ipaustralia.gov.au/trademarks/search/quick) in **class 9** (downloadable software) and **class 42** (SaaS). Also check classes 39 (transport) and 35, for confusion with operators. For later export: USPTO, UKIPO, EUIPO, IPONZ.
- **Domain:** check `.com.au` and `.com` availability for each shortlisted name (not checked here; this session had no web access to registrars).
- **Handles:** LinkedIn page first (B2B), then YouTube for demo clips. Instagram and TikTok are low priority for this buyer.
- **Confusion:** stay clear of "Coach Manager" / "eCoachManager" (`competitors.md`) and of existing operator names.

### 4. Voice and promise

- **One-line promise:** "Every booking has a vehicle, a qualified driver and an invoice, with no clashes."
- **Taglines:** "No clashes. No surprises." · "From enquiry to invoice, without the whiteboard." · "Charter work, sorted."
- **Voice:**
  - **Plain.** Do: "It blocks double-bookings." Don't: "AI-powered fleet orchestration."
  - **Straight about being new.** Do: "We're new. Here's how we protect your data." Don't: imply customers you don't have.
  - **Depot-floor practical.** Do: talk in runs, rego and authorities. Don't: talk in SaaS jargon.
- **Rewrite of a pitch line.** Before: "It keeps your bookings and customers, quotes, vehicle and driver allocation, trip status…" After: "Take the booking, send the quote, allocate a coach and a qualified driver, and invoice in Xero, all in one place."

### 5. The look (brief)

| Colour | Hex | Job | Contrast checked (WCAG) |
|---|---|---|---|
| Depot navy | `#0F3D5E` | Primary, headers | White on navy **11.35:1** (AA/AAA) |
| Signal amber | `#F2A900` | Warnings and clash alerts | Near-black `#1A1A1A` on amber **8.66:1**. **White on amber 2.01:1 fails: never use white text on amber** |
| Go green | `#1E7A4C` | "Allocated / OK" states | White on green **5.33:1** (AA) |
| Background | `#F5F7FA` | App background | Navy on background **10.58:1** |

- **Type:** Inter (SIL Open Font License, Google Fonts) for UI and text; Inter Display or Atkinson Hyperlegible (free) for large headings. Both are readable on depot screens and phones.
- **Logo brief:** must work at 32px as an app icon, on a hi-vis-style invoice header and on a phone run sheet. One idea: a calendar tile with a tick, or two route lines that don't cross ("no clashes"). Avoid buses with motion lines, which every operator already uses.
- **First five touchpoints:** (1) the founder's LinkedIn and one-page site with the written guarantees; (2) the live-import demo on the operator's own data; (3) the welcome email with the data-export link; (4) the driver's first SMS run sheet; (5) the reply to the first complaint, from the founder, within an hour.

## Operations

Inputs: `founder/idea.md`, `founder/offer.md`, `founder/numbers.json`. Supplier prices below are **not verified** (this session could not open vendor pages); get each from the linked official page or a quote. If real prices differ from `numbers.json`, update it and re-run the CFO.

### 1. The daily cycle (✱ = the customer sees it)

1. Monitoring check: uptime, overnight backups, failed SMS/emails.
2. ✱ Support inbox and phone (founder): answer within 1 business hour.
3. ✱ Migration and onboarding sessions with new founding operators.
4. Product work (contract developer): bug fixes first, then the roadmap.
5. ✱ Sales: 3 calls or depot visits a day (`marketing.md`).
6. ✱ Weekly: release notes to customers; Friday check that Xero sync is reconciled.
7. Monthly: invoices out (Stripe or Xero); review churn and support load.

### 2. Suppliers (get quotes or public prices)

| Need | Options | Notes |
|---|---|---|
| Cloud hosting, AU region | AWS (Sydney / Melbourne regions), Microsoft Azure (Australia East), Google Cloud (Sydney) | AU data residency is promised in the offer. Pick one with managed Postgres and backups |
| Card billing | Stripe (AU), GoCardless (direct debit) | Direct debit suits operators who dislike card fees |
| Accounting integration | Xero API (priority), MYOB API (later) | Check the Xero app partner programme's terms and any certification fees |
| SMS run sheets | MessageMedia (AU), Twilio | Per-message cost feeds the A$9/customer hosting estimate |
| Transactional email | Postmark, Amazon SES | |
| Helpdesk | Help Scout, Freshdesk, Zendesk | |
| Contract developer | Freelance or agency, AU time zone preferred | Get 2–3 quotes for the MVP scope in the report |

### 3. People

| Role | Hours (slow first months) | Hours (at ~25 customers) | Pay assumption |
|---|---|---|---|
| Founder: sales, support, migration | Full-time, unpaid | Full-time, unpaid | `numbers.json` |
| Contract developer | ~0.5 FTE | 0.5–1 FTE | A$6,500/month estimate at 0.5 FTE |
| Support hire | none | First hire at ~40–60 customers | ~A$95k + super + on-costs (estimate). Confirm award and super rates with an accountant |

### 4. Routines (SOPs)

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

### 5. Tools (smallest stack)

Hosting (one provider above), Stripe or GoCardless, Xero (own books), helpdesk, a CRM (HubSpot free tier or a spreadsheet at first), a status page.

### 6. Licences, legal and insurance (confirm with the authority or a professional; not legal advice)

- ABN and business or company registration: https://business.gov.au/registrations ; ASIC if you incorporate.
- GST registration once turnover reaches A$75,000: https://www.ato.gov.au/businesses-and-organisations/gst-excise-and-indirect-taxes/gst/registering-for-gst
- **Privacy Act 1988 / Australian Privacy Principles:** the small-business exemption may not apply in practice, and its removal is on the reform agenda. Driver licence numbers, Working With Children Check details and passenger names (including children) are sensitive. OAIC guidance: https://www.oaic.gov.au/privacy/privacy-guidance-for-organisations-and-government-agencies
- **Notifiable Data Breaches scheme**, if covered: https://www.oaic.gov.au/privacy/notifiable-data-breaches
- **Australian Consumer Law** on guarantees and refunds: https://www.accc.gov.au/business/consumer-rights-and-guarantees
- Insurance: professional indemnity plus cyber liability (quotes needed; A$250/month is an estimate).
- Customer terms: SaaS agreement, DPA, acceptable-use policy, SLA. Have a lawyer draft them (A$5k estimate in startup).

### 7. Risk register

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

## Launch plan

Today is 22 November 2026. Every panel buyer who mentioned timing said "not during excursion and end-of-year season", so **no real onboarding before February 2027.** The test below starts now and costs almost nothing.

### 1. Test before you spend (subscription → a founding-member offer, paid up front)

**The test:** sell the founding-operator offer (`offer.md`) **before the MVP is built**, using a clickable prototype and a live import of the operator's own week of bookings into a spreadsheet mock-up.

- **Ask:** a refundable deposit of one month at the founding price (~A$125–420 depending on tier), credited to the first quarter. Fully refundable if the product isn't live by 30 June 2027.
- **Success line (written before running it):** **at least 5 deposits from at least 30 operator conversations by 31 March 2027.** The simulated panel bought at 10% (20 buyers, an upper bound). Real buyers are expected to come in lower, so 5 of 30 (17%) would be a strong real signal.
- **Stop or pivot line:** fewer than 2 deposits from 30 conversations means **do not build the MVP.** Go back to `/founder-offer` or narrow the segment (growth-minded operators only), or pivot (see the report).
- **Compare with the panel:** if real deposits fall well short of 10%, trust the real buyers.

### 2. Countdown (owner: founder unless stated)

| Week | Dates | Tasks | Critical path? |
|---|---|---|---|
| 1 | 23–29 Nov 2026 | Interview script with the four price questions; CRM with 60 prospects; contact BusNSW/BusVic/QBIC about membership and meetings | ✔ |
| 2–4 | 30 Nov – 20 Dec | 15 problem interviews by phone (peak season: phone only, 20 minutes) | ✔ |
| 5–6 | 21 Dec – 10 Jan | Holiday break; build the clickable prototype (quote → allocate → run sheet → invoice); draft terms and the refund wording with a lawyer | ✔ |
| 7–8 | 11–24 Jan 2027 | Get 3 contract-developer quotes; brand checks (`brand.md`); one-page site with the written guarantees | |
| 9 | 25–31 Jan | Pre-campaign (`marketing.md` from L−14) | |
| **10** | **Tue 2 Feb** | **Founding program opens (deposits)** | ✔ |
| 11–17 | Feb – 31 Mar | Depot visits, live-import demos, deposit asks; association meeting talk | ✔ |
| 18 | 1–7 Apr | **Go/no-go on building the MVP** using the success/stop line | ✔ |
| 19–40 | Apr – Sep | If go: build the MVP with 3–5 deposit holders as design partners; onboard from about July | ✔ |

The critical path is interviews → prototype → deposits → go/no-go. A slip in any of these moves the build decision.

### 3. Launch day run sheet (Tue 2 Feb 2027)

| Time | What |
|---|---|
| 07:00 | Final check: site live, deposit link (Stripe) tested with a A$1 test charge, refunded |
| 08:00 | Email to the 20-operator list + everyone interviewed: founding places open, the guarantees, the close date |
| 09:00–12:00 | Phone the 10 warmest interviewees personally |
| 12:00 | LinkedIn post (hook 1 with clip) |
| 13:00–16:00 | Two depot visits with the live-import demo |
| 17:00 | Log conversations and deposits in the CRM |
| If the deposit link fails | Fall back to a Xero invoice; email an apology with the corrected link |

### 4. The first 30 days (2 Feb – 4 Mar 2027)

| Number | Target per week | Change trigger |
|---|---|---|
| Operator conversations | 15 | under 8 two weeks running → change the list or channel |
| Live-import demos | 5 | under 2 → the prototype or the pitch is not landing |
| Deposits | cumulative 5 by 31 March | 0 by 2 March → review the offer and price with `/founder-pricing` |
| Referral demos | ≥1 after the first deposit | 0 → ask depositors why |

**Reviews:**
- **Day 7:** Who said yes and why, who said no and why (in their words)?
- **Day 14:** Are growing operators really the segment, or someone else?
- **Day 30:** Is the 5-deposit line reachable? If not, which objection is unanswered: trust, habit or price?

_The panel is simulated buyers and the numbers are projections from your inputs. Confirm demand with real customers and costs with real quotes before you spend. Not financial, legal or tax advice._

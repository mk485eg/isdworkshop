# MA Transport: Founder Skill Re-Evaluation and Startup Validation

**Date:** 22 November 2026 · **Scope:** business and startup evaluation only. No application code was changed or built.
**Framework:** the Founder Skill pack ([github.com/Jakeschincariol/founder-skill](https://github.com/Jakeschincariol/founder-skill), v1.0.0, MIT), installed into this session and run end to end.
**Founder-plan verdict (computed): NOT YET** · **Overall score: 40 / 100** · **Recommendation: PIVOT** (narrow it hard, then validate with deposits before building)

---

## 0. How this evaluation was done

### 0.1 The Founder Skill: what it is and how it was applied

The skill is a pack of **eleven skills** run in order, each reading the files the previous ones wrote into `founder/`:

```
board → competitors → consumer → pricing → offer → cfo → marketing → brand → ops → launch → plan
```

I installed it (`~/.claude/skills/founder-*`), ran its own test suite (**29 tests, all passing**), and ran every step. Four steps use the pack's own Python tools, unmodified. Their outputs are quoted, not retyped:

| Step | What ran | Output (in this repo) |
|---|---|---|
| `/founder-board` | 3 independent sub-agents, one per lens (Offers, Monopoly, Product), each reading only a neutral brief | `founder/board/*.md`, `founder/board.md` |
| `/founder-competitors` | Public-source map of direct, indirect and substitute competitors, with links | `founder/competitors.csv`, `founder/competitors.md` |
| `/founder-consumer --quick` | `panel.py` dealt **20 simulated buyers** (seed 2026); one sub-agent per buyer; tallied by the tool | `founder/panel/` |
| `/founder-pricing` | `van_westendorp.py` on the panel's price answers, per tier | `founder/pricing-curve-*.md`, `founder/pricing.md` |
| `/founder-offer` | Problem list → offer stack → **re-test on the same 20 buyers** | `founder/offer.md`, `founder/panel-v2/` |
| `/founder-cfo` | `unit_economics.py` on `numbers.json` | `founder/cfo.md`, `founder/cfo-sources.md` |
| `/founder-marketing`, `/founder-brand`, `/founder-ops`, `/founder-launch` | Positioning, channels and campaign; name and brand checks; operations and risk; a dated test-first launch | `founder/*.md` |
| `/founder-plan` | `compile.py` computes the verdict from the numbers and the panel | `founder/business-plan.md`, `summary.md`, `one-pager.md` |

**The skill's own limits, stated once (as it requires):** the consumer panel is **simulated buyers, not customers**. Language models lean agreeable, so its buy rate is an **upper bound**. The CFO numbers are projections from **estimated** inputs; nothing is a quote. None of this is financial, legal or tax advice.

**Deviations from the skill, disclosed:**
- I used the 20-buyer `--quick` panel, not 100. The skill recommends this for a first look.
- I did not stop to ask you to correct the customer profile before dealing the cards. It was built from your brief; check it in `founder/customer.json`.
- For the subscription model, the CFO tool was run with `days_per_month: 1`, so wherever the tool prints "a day", read it as "paying customers".
- In the offer re-test, the buyer cards' segment labels still named the old prices (A$199 / 399 / 699) while the new pitch showed A$179 / 379 / 599. Several buyers noticed and answered against the pitch.

### 0.2 Evidence labels and research limits

**[V]** a vendor's or regulator's own page (seen via a search snippet) · **[V-vendor]** a claim a vendor makes about itself · **[S]** a secondary or aggregator source · **[E]** an estimate or assumption · **[SIM]** a simulated-panel result · **NPD** not publicly disclosed.

This session's network policy **blocked direct page fetches**: every vendor, review and government host failed to resolve. All market facts come from **web-search results with links**, and every price should be confirmed on the linked page before you rely on it. Verbatim competitor taglines could not be captured and were not guessed.

### 0.3 About the previous report

This report replaces the earlier version of this file, which was written without the Founder Skill (it wasn't installed then). New evidence changed the conclusion:
- The board voted **3 PASS**.
- The simulated panel bought at **0%**.
- The computed plan verdict is **Not yet**.

The recommendation therefore moves from "Validate first" to **"Pivot"**.

---

## 1. Executive Summary

**The verdict in one line:** the complete, every-operator TMS described in your brief is **not a viable startup as pitched**. A much narrower product, a **"Clash-Free Charter Desk"** for independent charter operators with 3–30 vehicles, *might* be. It has to earn paying deposits before any serious build money is spent.

**What the Founder Skill found:**

1. **The board voted 3 PASS, average 3.0/10** (`founder/board.md`). All three lenses named the same killers: no evidence of demand; a suite with no single job, matching what incumbents already sell; and no route to customers.
2. **The simulated panel bought 0 of 20 on your current pitch** **[SIM]** (`founder/panel/results.md`). Reasons for passing: **trust 10**, **habit 9**, **price 1**. Price is not the main blocker. **"New company, no customers, nobody I know uses it"** is.
3. **A rebuilt offer moved it to 2 of 20 (10%)** **[SIM]** (`founder/panel-v2/results.md`). The offer was migration done for the operator, 60 days side by side, a 60-day refund, AU data and full export, and a single named outcome. **Both buyers were "growth-minded operators"**; no other behaviour group moved. That is the beachhead, and it is still below the skill's 25% bar.
4. **The CFO model loses money in year 1 under every tested price** (`founder/cfo.md`):
   - At the founding price (A$262 blended): contribution A$66 (25%), **break-even 141 customers**, year 1 **−A$107,442**, **cash needed A$180,442**.
   - At list price (A$374 blended): contribution A$178 (48%), break-even 53 customers (72 once the cost of replacing churned customers is included; Section 8).
5. **Pricing:** your **Fleet tier at A$699 is above the panel's acceptable range** (Van Westendorp PME A$650) **[SIM]**, and about 82% above Coach Manager's published A$385 unlimited plan **[V]**. Starter at A$199 sits on the edge of "too expensive" for 3–5 vehicle owners. **Cutting prices makes the economics worse**: support is a per-customer cost, so a 10% price cut raises break-even from 141 to 234 customers.
6. **The market is served, not empty.** Coach Manager sells Australian-priced charter software from A$137.50 a month **[V]**. eCoachManager markets to Australian operators from about A$215–240 a month plus setup **[V]**. TransportMe claims 150+ contracted companies **[V-vendor]**. The large operators (Kinetic, CDC, Transdev and others) run enterprise systems and are **not a realistic market** for this product.
7. **Market size caps the outcome.** About 618 interurban, rural and charter bus businesses (IBISWorld 2025) **[S]** and about 950 accredited NSW operators (BusNSW) **[S]**. A realistic serviceable market is 1,500–2,500 operators **[E]**. That supports a bootstrapped business at best, not a venture-scale one.

**Recommendation: PIVOT.** Drop the complete-TMS and every-operator scope. Rebuild around one workflow (enquiry → quote → allocation → phone run sheet → Xero invoice, with clash and expiry blocking) for growth-minded independent charter operators. **Sell founding places with refundable deposits before building.** If fewer than 2 of 30 operators pay a deposit by 31 March 2027, **stop**.

---

## 2. Founder Skill Assessment (the 12 questions)

| # | Question | Answer from the pack | Evidence |
|---|---|---|---|
| 1 | Real and expensive problem? | **Real but chronic, and not proven expensive.** Buyers cited double-bookings, peak-season admin and audit stress, yet 9 of 20 said what they have "works well enough". No real operator has put a dollar figure on the pain. | Panel v1 **[SIM]**; board: "no proof of pain" |
| 2 | Market large enough? | **Large enough for a small bootstrapped business; too small for venture scale.** SAM about A$6.7–11.2M ARR at A$374 blended **[E]** | IBISWorld, BusNSW **[S]**; Section 4 |
| 3 | Ideal initial customer? | **A growth-minded owner-manager of a 3–15 vehicle charter business** who is outgrowing spreadsheets. The only group that bought (2 of 3) **[SIM]** | `panel-v2/results.md` |
| 4 | Strongest competitors? | **Coach Manager** (AU-priced, cheap), **eCoachManager** (cloud, targets AU), **TransportMe** (AU, government contracts), **Busable** (AU regional), **Moovs** (modern UX, could localise). Plus spreadsheets, the strongest of all. | `competitors.md` |
| 5 | What do they do better? | They exist and have customers and history; Coach Manager is cheaper; TransportMe has hardware and government relationships; telematics is already in the bus. | Board (Monopoly): "competition by design" |
| 6 | What would make an operator switch? | **The panel's flip answers, in order:** (1) an operator they know vouching for it (11 of 20 v1 answers); (2) migration done for them; (3) a free or side-by-side trial; (4) proof of charter quoting and accreditation fit; (5) a data-export guarantee; (6) starting after peak season. | `panel/results.md` "What would flip a no" **[SIM]** |
| 7 | Subscription model viable? | **Structurally yes, at A$374+ blended and support ≤A$152 per customer.** It fails in the conservative case (never breaks even). | Section 8 |
| 8 | Prices too low, high or reasonable? | **Starter: on the edge. Growth: OK. Fleet: too high.** Do not cut overall; restructure to A$179 / 379 / 599, +A$15 per vehicle, plus a paid or bundled onboarding fee. | `pricing.md`, Van Westendorp **[SIM]** |
| 9 | Acquisition strategy? | **Trust-led:** state bus associations, founder depot visits with a live import of the operator's data, referrals from founding operators. No paid ads until there are references. Maximum acquisition cost ~A$1,400 per customer at list price. | `marketing.md` |
| 10 | Biggest risks? | No operator pays (trust and habit); support cost destroys margin; founder burnout; outage on a live run; migration errors; incumbents copy. | `ops.md` risk register |
| 11 | Can it scale profitably? | **Only to a small business in Australia.** Realistic case: break-even at 72 customers bootstrapped, 313 with a funded team. Beyond that requires NZ, UK or US, where Moovs, Busify and Busie are already present. | Section 8 |
| 12 | Viable startup or software project? | **As pitched: a software project without demonstrated demand** (board 3 PASS; panel 0%; plan Not yet). **As pivoted:** a testable niche business. Only paid deposits will tell. | `business-plan.md` |

---

## 3. Problem and Market Validation

### 3.1 What the board said (`founder/board.md`)

| Lens | Score | Vote | Top killer |
|---|---|---|---|
| Offers | 3 | PASS | "No proof of pain or likelihood… likelihood is close to zero today" |
| Monopoly | 3 | PASS | "Crowded market, incremental product… competition by design" |
| Product | 3 | PASS | "No one thing… a suite, not a product" |

**Where the board disagreed:** whether being "not the cheapest" is a strength (Offers) or a weakness (Monopoly), and whether sticky data protects you once a customer is won (Monopoly) or stops operators from moving in the first place (Offers, Product).

### 3.2 What the simulated buyers said (`founder/panel/results.md`) **[SIM]**

**0 buy · 20 pass.** Examples of reasons given (simulated research, not testimonials):

- Trust: *"It's brand new with zero customers, and I don't touch software until another operator at the association tells me it actually works."* (P003)
- Habit: *"I already pay for a charter package that does my quoting and holds years of bookings and customer history. I'm not tearing that out for a brand-new company with no customers."* (P006)
- Price: *"Two hundred a month is near on two and a half grand a year for a handful of buses I already run fine with a diary, a spreadsheet and the phone."* (P001)

### 3.3 Real-world facts that support the problem

- NSW requires accreditation for public bus services under the *Passenger Transport Act 1990*, with penalties of up to A$110,000, and a BOAS audit regime (audit tool updated October 2025) **[V]**: [TfNSW accreditation](https://www.transport.nsw.gov.au/operations/roads-and-waterways/business-and-industry/buses/operators/applying-for-bus-operator) · [BOAS audit tool](https://www.transport.nsw.gov.au/system/files/media/documents/2025/boas-audit-tool-october-2025.pdf) · [Accreditation package June 2025](https://www.transport.nsw.gov.au/system/files/media/documents/2025/bus-operator-accreditation-package-v1.1-june-2025.pdf).
- Operators do replace legacy tools. Kangaroo Bus Lines (QLD) was described as using "an outdated application for scheduling bus routes, charter management, and maintenance" **[S]** ([Telstra Purple](https://purple.telstra.com.au/case-studies/delivering-a-superior-transport-experience-for-queensland)). Buslines (NSW) moved to Optibus **[S]** ([Optibus](https://blog.optibus.com/buslines-brings-optibus-to-new-south-wales-australia-to-improve-public-transportation)).

### 3.4 Not validated (needs real operators)

The cost of the pain in dollars and hours; willingness to pay; switching triggers; your earlier model of a 15-bus operator, 13 active buses, 22 days and 572–715 trips a month (**unverified [E]**; ask interviewees for real trip counts).

---

## 4. Australian Market Opportunity

| Metric | Figure | Label / source |
|---|---|---|
| Registered buses (Jan 2023) | ~97,400; NSW ~26,660 | [S] [Statista citing BITRE](https://statista.com/statistics/824830/australia-number-of-registered-buses); BITRE Jan 2025 edition [not openable here](https://www.bitre.gov.au/sites/default/files/documents/BITRE-Road-vehicles-Australia-January-2025--september2025--pdf.pdf) |
| Interurban and rural bus businesses (incl. charter), 2025 | 618 (−1.6%) | [S] [IBISWorld](https://www.ibisworld.com/australia/number-of-businesses/interurban-and-rural-bus-transport/458) |
| That segment's revenue, 2025 | ~A$2.4bn | [S] [IBISWorld](https://www.ibisworld.com/australia/market-size/interurban-and-rural-bus-transport/458) |
| Accredited bus operators, NSW | ~950 | [S] [BusNSW](https://busnsw.com.au/about-us/) |
| Bus and coach industry employment | >85,000 | [S] [BIC submission](https://infrastructure.gov.au/sites/default/files/documents/lclf2024-bus-industry-confederation.pdf) |
| Operator-level fleet lists | Dataset exists | [V] [Australian Bus Fleet Lists](https://opendata.transport.nsw.gov.au/data/dataset/australian-bus-fleet-lists) |

**Large operators (verified context, not targets):** Kinetic says it is "Australia & NZ's biggest bus operator" **[V-vendor]** ([site](https://wearekinetic.com/)). Kinetic Melbourne has 602 buses, Transdev John Holland 472, CDC Melbourne 387, CDC Ballarat 76 and Kinetic Townsville 81 **[S]** ([Wikipedia: Kinetic Melbourne](https://en.wikipedia.org/wiki/Kinetic_Melbourne), [Transdev JH](https://en.wikipedia.org/wiki/Transdev_John_Holland), [CDC Melbourne](https://en.wikipedia.org/wiki/CDC_Melbourne), [CDC Ballarat](https://en.wikipedia.org/wiki/CDC_Ballarat), [Kinetic Townsville](https://en.wikipedia.org/wiki/Kinetic_Townsville)). Ventura's fleet was absorbed into Transdev Melbourne **[S]** ([Wikipedia](https://en.wikipedia.org/wiki/Transdev_Melbourne)). Dysons: ~A$245M 2025 revenue (IBISWorld) **[S]**. **Busways and Transit Systems current fleets: NPD.** These operators use enterprise scheduling (Trapeze, Optibus, GIRO). **Remove "larger operators" from the plan.**

**Sizing [E]:** TAM about 3,000–4,000 accredited operators nationally (extrapolated from NSW's ~950 and NSW's ~27% share of buses). **SAM** is 1,500–2,500 independent operators with 3–30 vehicles; at A$374 a month that is **A$6.7–11.2M ARR**. **SOM** is 5–10% of SAM in 5 years, 75–250 operators, **about A$0.3–1.1M ARR**. **Next step:** count operators by fleet size from the Australian Bus Fleet Lists to replace this estimate.

---

## 5. Competitor Analysis

From `founder/competitors.md` (21 entries in `founder/competitors.csv`). Direct competitors are separated from general fleet software.

### 5.1 Direct competitors (charter, coach and bus operations software)

| Competitor | Target market | Main features | Pricing | Strengths | Weaknesses |
|---|---|---|---|---|---|
| [Coach Manager](https://distinctive-systems.com/au/products/coach-manager/australian-pricing/) | Coach/charter operators; AU office | Reservations, quoting, dispatch, contracts; sister maintenance and driver-compliance systems | **[V] A$137.50–385/mo** ex-GST; +A$27.50/user | Cheapest AU-published; mature; capacity-based | Windows-based **[S]**; public reviews NPD |
| [eCoachManager](https://ecoachmanager.com/packages-price-list-nz/) | Coach/minibus hire (AU/UK/NZ) | Cloud quoting, booking, dispatch, driver app, invoicing | **[V]** ~A$215–240/mo + A$300–350 setup | Cloud; targets AU | No G2 reviews **[V]**; pricing page ambiguous |
| [TransportMe](https://www.transportme.com.au) | AU operators, govt, schools | Ticketing, GPS, compliance, maintenance, passenger app | NPD | 150+ companies, 3,500+ vehicles, Qld TMR contract **[V-vendor]**; ISO 27001 | Hardware/school-centric; charter depth unverified |
| [Busable](https://busable.app/about) | Regional AU operators | Timetables; reported rostering, charter, tracking | NPD | Australian, regional | Charter depth unconfirmed |
| [RouteStra](https://www.capterra.com.au/software/1113395/RouteStra) | Bus/coach operators | Scheduling, compliance, private hire, rosters | NPD (per user) | Compliance + charter | Customer base NPD |
| [Coach & Charter Manager](https://www.capterra.com.au/software/201842/coach-charter-manager) | Charter operators | Charter management | **[S]** from US$100/mo | 4.8/5 (21) **[S]** | Details unclear |
| [Moovs](https://www.moovsapp.com/en-au/charter-bus-software) | N. American charter/limo; `en-au` site | Quoting, dispatch, driver app, payments, portal | **[S]** US$129–199/mo + free plan | Modern UX; 4.8/5 (33) [Capterra](https://www.capterra.com/p/209139/moovs/) | No AU compliance; setup effort mentioned **[S]** |
| [Busify](https://www.busify.com/) | US charter | Quotes, dispatch, driver app, maintenance | NPD | Charter-specific | US-focused |
| [Busie](https://www.getbusie.com/) | US charter | All-in-one + marketplace | NPD | Marketplace angle | US-focused |
| [CoachRail](https://www.itqlick.com/coachrail/pricing) | US charter/limo | Dispatch, mobile app | **[S]** ~US$50/user/mo | Mobile | US-focused |
| [Sengerio](https://www.softwareadvice.com.au/software/166261/sengerio) | Charter/tour (EU) | Booking, fleet, driver planning | **[S, unverified]** €7.60/mo | Multi-module | AU presence unverified |
| [CIS-BUS Charter](https://www.capterra.com.au/software/1016965/cis-bus-charter) | Charter providers | Cloud charter management | NPD | Charter-specific | Little public info |

### 5.2 Indirect competitors and general fleet software

| Competitor | Target market | Main features | Pricing | Strengths | Weaknesses |
|---|---|---|---|---|---|
| [BusMinder](https://apps.apple.com/app/id1364797036) | AU school buses | GPS/smartcard student tracking | NPD | Owns school safety | Not charter |
| [RollCall](https://rollcall.com.au/bus-companies) | AU/NZ schools and operators | Student scans, parent alerts | NPD | 300+ schools/operators **[V-vendor]** | Not charter |
| [Trapeze](https://trapezegroup.com.au/bus/planning-scheduling/) / [Optibus](https://blog.optibus.com/buslines-brings-optibus-to-new-south-wales-australia-to-improve-public-transportation) | Govt and large route operators | Timetabling, scheduling, rostering | NPD | Entrenched in enterprise | Out of SMB range |
| [Teletrac Navman](https://www.expertmarket.com/au/vehicle-tracking/teletrac-navman-review) | All AU commercial fleets | GPS, EWD incl. bus fatigue rules, maintenance | **[S]** ~A$25–30/vehicle/mo | Already in the vehicle | No charter booking |
| [EROAD](https://eroad.com/?p=84) | AU/NZ fleets | Telematics, compliance | **[V]** $25–35/vehicle/mo | In-vehicle data | No charter booking |
| [Fleetio](https://fleetio.com/pricing) | Global fleets | Maintenance, inspections | **[V]** US$4–10/vehicle/mo | Cheap maintenance | No passenger logic |
| [BusCharter.com.au](https://www.aap.com.au/aapreleases/globenewswire9727742/) | End customers (broker) | Marketplace to local operators | NPD | Owns demand | Channel *or* threat |
| Spreadsheets + whiteboard + Xero | Every small operator | Everything, by hand | ~A$0 extra | Free, familiar | Error-prone; not audit-ready |

**Price range for the comparable item (published AU-relevant):** lowest A$137.50, **median A$240**, highest A$385. **MA Transport's current Growth and Fleet tiers sit above the highest.**

**Customer complaints:** independent reviews barely exist for this niche. Every complaint theme found has fewer than three reviews, so all are thin. The only one found is setup and onboarding effort (Moovs **[S]**). **Real complaints will only come from operator interviews.**

**The gap:** **no proven gap.** The hypotheses supported by evidence:
1. Modern cloud UX with Australian compliance built in. The cheapest AU-priced incumbent is Windows-based; the modern cloud players are North American.
2. Switching done for the operator.
3. Accreditation evidence produced as a by-product of daily dispatch.

**None is a moat.** Fastest to copy: eCoachManager (cloud, AU-facing), Moovs (localise), Coach Manager (price or a cloud UI), and telematics vendors (bundle a booking add-on).

---

## 6. Ideal Customer Profile

| Attribute | Beachhead ICP |
|---|---|
| Who | Owner-manager of an independent charter/coach business |
| Fleet | **3–15 vehicles** first (both v2 buyers were in this band) **[SIM]**; 16–30 later |
| Behaviour | **Growth-minded**: adding vehicles or contracts, feels the admin outgrowing the setup |
| Work | Charter, school excursions, corporate, weddings, transfers; not government route contracts |
| Today | Excel + whiteboard + Xero, or an older package |
| Region | NSW, then VIC and SE QLD |
| Trigger | A recent double-booking, growth past ~8 vehicles, an upcoming accreditation audit, a new office manager |
| Timing | **Approach and onboard February–October**, never during the Nov–Dec excursion and end-of-year peak (raised repeatedly in the panel) **[SIM]** |

**Not now:** spreadsheet loyalists, cost-cutters, operators locked in to an incumbent, compliance worriers (who want audit proof first), large route operators, and non-transport bus owners. The current target list (private, charter, shuttle, SME, *and* large operators) is **too broad**.

---

## 7. Pricing Strategy

From `founder/pricing.md`.

| Tier | Current | Panel acceptable range **[SIM]** | Competitor anchor **[V]** | Recommendation |
|---|---|---|---|---|
| Starter (≤5) | A$199 | A$49–199 (at the top edge) | Coach Manager A$137.50–220 | **A$179** (test A$149 vs A$199) |
| Growth (≤15) | A$399 | A$102–450 (inside) | Coach Manager Full A$220–385 | **A$379** (test A$349 vs A$399) |
| Fleet (≤30) | A$699 | A$151–650 (**above**) | Coach Manager Full Unlimited A$385 | **A$599** (test A$549 vs A$649) |
| Extra vehicle | A$20–30 | n/a | Telematics A$25–35 | **A$15** |
| Onboarding/migration | none | n/a | eCoachManager setup A$300–350 | **A$750–1,500**, or bundled free with a 12-month term (test both) |

**Why not cut prices** (CFO tool, `pricing.md`, run before the offer's migration and refund costs were added): at the current tiers' blended A$414, break-even is 38 customers. At A$300 it is 71; at A$250 it is 115. Support is per customer, so discounts multiply break-even.

**Per-trip pricing:** keep it parked. It suits seasonal revenue but makes revenue unpredictable, and operators already compare everything per vehicle.

---

## 8. Financial Projections

### 8.1 Verified versus assumed

| Item | Status |
|---|---|
| Competitor prices | **[V]/[S]**, Section 5 |
| Every cost input (support A$152 per customer, hosting A$9 per customer + A$450 base, card fees 2%, migration A$20, refunds A$7, contractor A$6,500 a month, tools, insurance, accountant, acquisition A$1,500 a month, startup A$73,000) | **[E] all estimates**, reasoning in `founder/cfo-sources.md`. AU cloud prices were not verified (blocked pages) |
| SMB SaaS benchmarks (CAC ~US$1,100–1,400; payback 9–16 months; churn wide-ranging) | **[S]** secondary summaries: [Tidemark](https://www.tidemarkcap.com/post/2025-vertical-smb-saas-benchmark-report), [Kyle Poyar](https://kylepoyar.substack.com/p/2025-saas-benchmarks-report) |

### 8.2 Year 1 as planned (Founder CFO tool, `founder/cfo.md`)

Founding price A$262 blended. The ramp is 0 customers in months 1–3, then 1, 2, 3, 5, 7, 9, 10, 12 and 14 by month 12. This was checked against the panel: 10% is an upper bound, so 14 customers needs about 280 real conversations at a 5% conversion.

| Key number | Value |
|---|---|
| Contribution per customer-month | **A$66 (25%)** |
| Break-even | **141 paying customers** |
| Year 1 operating result | **−A$107,442** on A$16,506 revenue |
| After the A$73,000 startup spend | −A$180,442 |
| Cash needed before it pays for itself | **A$180,442** |
| What-ifs (tool) | Price −10% → break-even 234; volume −20% → year 1 −A$108,274; unit costs +15% → break-even 255 |

### 8.3 Steady-state scenarios at list price (5 / 10 / 25 / 50 / 100 customers)

Same cost structure as `numbers.json`. "Operating result" is after the bootstrapped fixed costs (A$8,850 + A$450 hosting base) and after the cost of replacing churned customers. The realistic contribution matches the CFO tool within A$1 (A$179 vs A$178, card-fee rounding).

**Conservative**: ARPA A$300, support A$180, CAC A$4,000, churn 3% a month [E]

| Customers | MRR | ARR | Hosting/mo | Support/mo | Other direct | Gross margin | CAC (one-off) | Churn CAC/mo | Operating result/mo |
|---:|---:|---:|---:|---:|---:|---:|---:|---:|---:|
| 5 | 1,500 | 18,000 | 510 | 900 | 180 | −6% | 20,000 | 600 | −9,540 |
| 10 | 3,000 | 36,000 | 570 | 1,800 | 360 | 9% | 40,000 | 1,200 | −9,780 |
| 25 | 7,500 | 90,000 | 750 | 4,500 | 900 | 18% | 100,000 | 3,000 | −10,500 |
| 50 | 15,000 | 180,000 | 1,050 | 9,000 | 1,800 | 21% | 200,000 | 6,000 | −11,700 |
| 100 | 30,000 | 360,000 | 1,650 | 18,000 | 3,600 | 22% | 400,000 | 12,000 | −14,100 |

**Never breaks even.** Contribution A$72 is less than the A$120 a month it costs to replace churned customers. LTV:CAC 0.6.

**Realistic**: ARPA A$374, support A$152, CAC A$2,500, churn 2% a month [E]

| Customers | MRR | ARR | Hosting/mo | Support/mo | Other direct | Gross margin | CAC (one-off) | Churn CAC/mo | Operating result/mo |
|---:|---:|---:|---:|---:|---:|---:|---:|---:|---:|
| 5 | 1,870 | 22,440 | 495 | 760 | 172 | 24% | 12,500 | 250 | −8,657 |
| 10 | 3,740 | 44,880 | 540 | 1,520 | 345 | 36% | 25,000 | 500 | −8,015 |
| 25 | 9,350 | 112,200 | 675 | 3,800 | 862 | 43% | 62,500 | 1,250 | −6,087 |
| 50 | 18,700 | 224,400 | 900 | 7,600 | 1,724 | 45% | 125,000 | 2,500 | −2,874 |
| 100 | 37,400 | 448,800 | 1,350 | 15,200 | 3,448 | 47% | 250,000 | 5,000 | +3,552 |

**Break-even: 72 customers bootstrapped** (MRR ~A$27k); **313 customers with a funded three-person team** (MRR ~A$117k, 13–21% of the whole SAM). LTV:CAC 3.6; CAC payback 14 months.

**Optimistic**: ARPA A$450, support A$100, CAC A$1,500, churn 1.2% a month [E]

| Customers | MRR | ARR | Hosting/mo | Support/mo | Other direct | Gross margin | CAC (one-off) | Churn CAC/mo | Operating result/mo |
|---:|---:|---:|---:|---:|---:|---:|---:|---:|---:|
| 5 | 2,250 | 27,000 | 485 | 500 | 145 | 50% | 7,500 | 90 | −7,820 |
| 10 | 4,500 | 54,000 | 520 | 1,000 | 290 | 60% | 15,000 | 180 | −6,340 |
| 25 | 11,250 | 135,000 | 625 | 2,500 | 725 | 66% | 37,500 | 450 | −1,900 |
| 50 | 22,500 | 270,000 | 800 | 5,000 | 1,450 | 68% | 75,000 | 900 | +5,500 |
| 100 | 45,000 | 540,000 | 1,150 | 10,000 | 2,900 | 69% | 150,000 | 1,800 | +20,300 |

**Break-even: 31 customers bootstrapped; 136 funded.** LTV:CAC 17.4; payback 5 months.

**What this says:**
1. **Support cost, not hosting, decides the business.** Hosting is under 5% of revenue at 25+ customers.
2. **Do not raise venture money for a team now.** A funded team needs 136–313 customers just to break even.
3. **100 customers in the realistic case is about A$449k ARR.** That is a good small business, not a venture outcome.

---

## 9. MVP Recommendations

**Is the feature list too big? Yes.** The Product lens called it "a suite, not a product". The pack's strongest version is one workflow.

**Essential MVP ("Clash-Free Charter Desk"):**
1. Enquiries and customers.
2. A fast quote builder (rules by distance and time; PDF or email; online acceptance).
3. A calendar allocation of vehicles and drivers with **clash blocking**.
4. **Expiry blocking** for driver authority or licence, Working With Children Check where relevant, and vehicle registration or inspection.
5. A driver run sheet **sent by SMS link (no app install)**, with a printable PDF fallback.
6. Invoices with **Xero sync**.
7. A simple monthly dashboard.
8. **Full Excel/CSV export** (it is a written guarantee).

**Postpone:** live GPS (integrate later), full workshop maintenance (service reminders only), route timetabling, ticketing and passenger apps, advanced BI, multi-depot, AI optimisation, MYOB.

**Differentiators to validate:**
- **Done-for-you migration** (the most-cited flip condition).
- Clash and compliance blocking.
- An accreditation evidence pack mapped to the TfNSW BOAS audit tool **[V]** (phase 2).
- An SMS run sheet for non-technical drivers.

**Expensive to maintain:**
- Telematics integrations across many vendors.
- Payments (PCI scope, chargebacks).
- Accounting APIs.
- Compliance rules for every state, which change.
- Fatigue/EWD logic. **Never build it**; integrate with approved vendors.
- Offline mobile sync.

**Integrations, in order:** Xero → email and SMS → Stripe or GoCardless deposits → read-only telematics (Teletrac Navman, EROAD, MTData) → MYOB.

**Security and privacy:**
- **Host in Australia**, and say so in writing (the panel asked).
- MFA, per-tenant isolation, encryption, audit logs, tested backups.
- Collect minimal sensitive data: licence numbers, WWCC, police checks, and **children's names** on excursions.
- Design to the APPs even if the small-business exemption applies; its removal is on the reform agenda **[S]** ([SmartCompany](https://www.smartcompany.com.au/business-advice/privacy-act-small-business-exemption-government-report/), [IAPP](https://www.iapp.org/news/a/amending-australias-privacy-act-small-businesses-bigger-responsibilities)).
- Prepare for the Notifiable Data Breaches scheme.
- Guarantees must respect the Australian Consumer Law (`founder/ops.md`).

**Scalability:** technically modest (≤2,500 tenants). A plain multi-tenant web app is enough; no microservices before about 100 customers.

**Phased roadmap:**

| Phase | When | Scope | Exit criterion |
|---|---|---|---|
| 0: Deposit test | Nov 2026 – Mar 2027 | Interviews, clickable prototype, founding-place deposits | **≥5 deposits from 30 conversations by 31 March 2027** (stop if <2) |
| 1: MVP with design partners | Apr – Sep 2027 | Section 9 essentials only | 3–5 depositors run real charter jobs in it for 4 weeks |
| 2: Paid founding cohort | Jul 2027 – Jan 2028 | Xero hardening, audit pack v1, self-serve onboarding | 10–25 paying customers, monthly churn ≤2%, support ≤A$152 per customer |
| 3: Expand | 2028 | Telematics read, service reminders, deposits/payments, MYOB | 50–75 customers; CAC payback ≤14 months |
| 4: Optional | 2029+ | NZ; adjacent segments (shuttle, tour) | Only if phase 3 holds |

---

## 10. Customer Acquisition Strategy

From `founder/marketing.md` and `founder/launch.md`.

- **Positioning (recommended):** *"For growing charter operators who are outgrowing the whiteboard, MA Transport is the charter desk that makes double-bookings and unqualified-driver allocations impossible, unlike spreadsheets or older desktop charter systems."*
- **Channels:**
  1. State bus associations (BusNSW, BusVic, QBIC).
  2. Founder depot visits with a **live import of the operator's own week**.
  3. Referrals from founding operators.
  Not yet: paid ads or an expo stand.
- **Maximum acquisition cost:** about A$1,400 per customer at list price. In year 1 (A$66 contribution), acquisition must be **founder time, not paid spend**.
- **Campaign:** the founding program opens **Tuesday 2 February 2027**, after peak season. A dated plan runs from 19 January to 18 February in `marketing.md`. Ten hooks each answer a panel objection.
- **Brand note** (`founder/brand.md`): "MA Transport" reads like a bus operator, not software. Consider a product name such as **CharterDesk** (run the IP Australia class 9/42 search and domain checks first).

### 10.1 First 20 potential customers (prospects only; none committed)

Fleet sizes are self-reported in directories or on websites unless marked. Decision-makers are **assumed** to be the owner/MD and the operations or charter manager; confirm by phone or LinkedIn. Likely problems are **[E]**.

| # | Operator | Location | Fleet (as found) | Likely problem | Approach |
|---|---|---|---|---|---|
| 1 | [Alura Coaches](https://www.theleader.com.au/story/9351766/alura-coaches-100-years-of-trusted-service-in-the-shire/) | Caringbah NSW | NPD; family-owned since 1926 | Excursion peaks, legacy processes | BusNSW intro |
| 2 | [AusCoach](https://www.sydney.com/destinations/sydney/inner-sydney/alexandria-and-rosebery/transport/auscoach) | Alexandria NSW | NPD | School and corporate allocation | Direct call |
| 3 | [Marulan Coaches](https://www.visitnsw.com/id/destinations/country-nsw/goulburn-area/goulburn/transport/marulan-coaches) | Marulan NSW | NPD; Hale family | Camps and excursions | Depot visit |
| 4 | [Coastal Liner](https://ccmariners.com.au/?p=885) | Central Coast NSW | "Large fleet", NPD | Touring + charter mix | Direct |
| 5 | [North Sydney Bus Charters](https://northsydneybuscharters.com.au/services/school-bus/) | Sydney NSW | NPD | School booking volume | Direct |
| 6 | [Destination Coaches](https://www.sydney.com/destinations/sydney/inner-sydney/marrickville/transport/destination-coaches) | Marrickville NSW | NPD | Event allocation | Direct |
| 7 | [Prestige Coach Hire](https://www.visitnsw.com/destinations/blue-mountains/katoomba-area/springwood/transport/prestige-coach-hire) | Springwood NSW | NPD | Tour quoting | Direct |
| 8 | [Bathurst Coach Travel](https://www.visitnsw.com/destinations/country-nsw/bathurst-area/bathurst/transport/bathurst-coach-travel) | Bathurst NSW | NPD | Regional event peaks | Direct |
| 9 | [Austwide Coaches](https://austwidecoaches.com.au/about/) | NSW | NPD | Multi-region charter | Direct |
| 10 | [Victoria Coaches](https://www.yellowpages.com.au/north-melbourne-vic/bpp/victoria-coaches-577768230) | North Melbourne VIC | **14 vehicles, 21–57 seats** (self-reported) | Weddings and corporate scheduling | **Best ICP fit**: visit |
| 11 | [Crown Coaches](https://www.yellowpages.com.au/nationwide/bpp/crown-coaches-pty-ltd-580288844) | VIC | NPD; since 1967 | School + charter compliance | BusVic |
| 12 | [Alston Coaches](https://australiasguide.com/vic/transport-hire/kingston/braeside/alston-coaches/) | Braeside VIC | NPD | Corporate events | Direct |
| 13 | [Quince's Coaches](https://quinces.com.au/bus-charter-melbourne) | Melbourne VIC | NPD | Event peaks | Direct |
| 14 | [Harlan Transport](https://www.easyweddings.com.au/HensParty/Melbourne/HarlanTransport/) | Melbourne VIC | NPD; mixed fleet | Mixed-fleet allocation | Direct |
| 15 | [Sunstate Charters](https://australia.com/en/atdw/product.56b262682cbcbe7073adcce9.html) | Pinkenba QLD | NPD; 30+ years | Transfers and tours | QBIC |
| 16 | [Aries Queensland](https://experiencegoldcoast.com/places-to-go/central-gold-coast/transport/aries-queensland--seqs-corporate-travel-specialist-au0958331) | Molendinar QLD | NPD; corporate/MICE | Many-vehicle events | Direct |
| 17 | [Belbaker Bus Charter](https://www.easyweddings.com.au/WeddingCars/SunshineCoast/BelbakerBusCharter) | Sunshine Coast QLD | NPD | Wedding/event bookings | Direct |
| 18 | [Pinnacle Coachlines](https://pinnacle-coachlines.squarespace.com) | Perth WA | **30+ vehicles, 10–61 seats** (self-reported) | Metro + regional dispatch | Video (phase 2) |
| 19 | [Rove Charters](https://australiasguide.com/wa/transport-hire/joondalup/greenwood/rove-charters) | Greenwood WA | NPD; est. 2017 | Young, growing; likely spreadsheets | Video |
| 20 | [Adelaide Coachlines](https://www.yellowpages.com.au/edwardstown-sa/bpp/adelaide-coaches-bus-hire-581360820) | Edwardstown SA | NPD; since 1960 | Local + interstate charter | Video |

18 of 20 fleet sizes are **not publicly disclosed**. Look them up in the [Australian Bus Fleet Lists](https://opendata.transport.nsw.gov.au/data/dataset/australian-bus-fleet-lists) or ask in the first call. **Screen for "growing" first**: ask "how many vehicles did you add in the last two years?"

### 10.2 Validating willingness to pay before building (from `/founder-launch`)

1. **Interviews (from now):** 20-minute phone calls during peak season, with the **four Van Westendorp price questions asked for real** (feed the CSV into `van_westendorp.py`).
2. **Clickable prototype plus a live import** of the operator's real week into a mock-up.
3. **A refundable deposit** of one month at the founding price, refundable if the product isn't live by 30 June 2027.
4. **Success line:** ≥5 deposits from ≥30 conversations by 31 March 2027. **Stop line:** <2. Trust the real buyers over the panel.

---

## 11. Risk Assessment

From `founder/ops.md` plus the board.

| Risk | Likelihood | Impact | Mitigation |
|---|---|---|---|
| **No operator pays (trust and habit)** | **High** | **Fatal** | Deposits before build; the stop line |
| Support cost per customer above A$152 | High | High | Self-serve onboarding; paid setup; cap the founding cohort at 10 |
| Founder burnout (sales, support, migration) | High | High | Cap the cohort; hire support at ~40–60 customers |
| Outage on a live run | Medium | High | Offline PDF run sheets, status page, founder phone |
| Migration errors cause a real double-booking | Medium | High | Clash report signed off by the owner before go-live |
| An incumbent cuts price or copies features | Medium | Medium | Win on migration, support, AU compliance |
| International player localises (Moovs) | Medium | High | AU compliance depth and association relationships |
| Peak-season timing blocks adoption | High | Medium | Onboard Feb–Oct only |
| Data breach (children's, driver data) | Low–Medium | Critical | Minimal data, AU hosting, MFA, incident plan |
| Compliance warning wrong | Low | High | Present it as a reminder, not certification; tests; terms |
| Small market caps growth | High (structural) | High | Accept a bootstrapped path or plan NZ early |

---

## 12. 90-Day Execution Roadmap (23 November 2026 – 28 February 2027)

| Weeks | Dates | Focus | Deliverable | Metric |
|---|---|---|---|---|
| 1 | 23–29 Nov | Set-up | Interview script with the 4 price questions; CRM of 60 prospects; association enquiries | 60 prospects with an owner name |
| 2–4 | 30 Nov – 20 Dec | Peak-season phone interviews | 15 interviews; pain in A$ and hours; current tools and costs | 15 done; top 3 pains ranked |
| 5–6 | 21 Dec – 10 Jan | Prototype and legal | Clickable prototype of the one workflow; terms and refund wording reviewed | Prototype shown to 3 operators |
| 7–8 | 11–24 Jan | Competitor teardown and brand | Trials/demos of Coach Manager, eCoachManager, Moovs; quotes from TransportMe and Busable; IP Australia/domain checks; developer quotes | Written comparison; 3 developer quotes |
| 9 | 25 Jan – 1 Feb | Pre-campaign | L−14 to L−1 activities (`marketing.md`) | 10 demos booked |
| 10–13 | 2 – 28 Feb | **Founding program open** | Depot visits with live imports; deposit asks; association talk | **≥15 conversations a week; first deposits** |
| 14 (just after) | by 31 Mar | **Go/no-go** | Build decision on the deposit line | ≥5 deposits → build; <2 → stop |

---

## 13. Final Investment Recommendation

### 13.1 Scores

| Category | /10 | Reason (pack evidence) |
|---|---|---|
| Market opportunity | **4** | 618 businesses (IBISWorld) and ~950 NSW operators; SAM ~A$7–11M; bootstrap-sized |
| Problem severity | **4** | Real but chronic; 9 of 20 simulated buyers say current tools "work well enough"; no dollar figure from any operator |
| Product differentiation | **2** | Board unanimous: no one thing, nothing 10x better; no gap proven |
| Competitive positioning | **3** | Late entrant against cheaper AU incumbents; no references; "nobody I know uses it" |
| Business model | **5** | Per-fleet SaaS is sound; onboarding fees and annual terms help; churn-replacement cost is high |
| Pricing | **4** | Fleet above the panel's range and ~82% above Coach Manager; Starter on the edge; price cuts hurt economics |
| Technical feasibility | **7** | Standard SaaS; the hard parts (GPS, EWD) can be integrated or postponed |
| Customer acquisition | **3** | Trust-gated, relationship-driven, no channel tested; panel 0% → 10% even with a strong offer |
| Scalability | **4** | Technically easy; commercially capped in AU |
| Financial viability | **4** | Plan verdict Not yet; year 1 −A$107k; needs ~A$180k cash; conservative case never breaks even |
| **Overall** | **40 / 100** | |

### 13.2 Recommendation: **PIVOT**

**Why PIVOT and not VALIDATE FIRST:** validation only makes sense for the current concept if its assumptions are plausible. The pack says they are not, as pitched:
- **The board voted 3 PASS.**
- **0 of 20 simulated buyers bought** the "complete TMS for every operator" pitch, even though the panel is an upper bound.
- **The computed plan verdict is Not yet.**

The direction needs significant changes, which is your definition of PIVOT:
- **From** a complete TMS for all passenger operators, including large ones, **to** one workflow for growth-minded independent charter operators.
- **From** "build, then sell" **to** "sell founding places with deposits, then build".
- **From** A$199 / 399 / 699 **to** A$179 / 379 / 599, plus onboarding.

**Why not STOP:** the offer re-test showed the objections *can* move. Migration done for the operator, a side-by-side trial and data guarantees took the panel from 0% to 10%, and a clear segment (growing operators) responded. The deposit test costs a few thousand dollars, not A$180,000. **If the deposit test fails (<2 deposits from 30 conversations by 31 March 2027), the right answer becomes STOP.**

**What evidence would make it promising:** ≥5 real deposits; real operators putting a dollar figure on clash and admin pain; at least one operator willing to be a named reference after 60 days.

### 13.3 The five most important next actions

1. **This week, book the first 5 operator phone interviews.** Twenty minutes each, peak-season friendly. Ask the four price questions for real and record the pain in dollars and hours. Screen for growing operators.
2. **Do not commission the MVP build.** Spend only on the deposit test (prototype, association fees, travel) until the go/no-go on 31 March 2027.
3. **Cut the scope in writing** to the "Clash-Free Charter Desk" workflow (Section 9), with a "not now" list covering GPS, maintenance, ticketing, route scheduling and large operators.
4. **Change the price card and the offer** to A$179 / 379 / 599 and A$15 per extra vehicle, with migration done for the operator, a 60-day side-by-side run and refund, a written AU-hosting and export guarantee, and 10 founding places closing 31 March 2027. Get the guarantee wording checked against the Australian Consumer Law.
5. **Open the founding program on 2 February 2027** through BusNSW, BusVic and QBIC plus depot visits with live imports. Measure deposits against the success line, and stop if the stop line is hit.

---

## Appendix A: Founder pack files (all in `founder/`)

`idea.md` · `board/brief.md`, `board/offers.md`, `board/monopoly.md`, `board/product.md`, `board.md` · `competitors.csv`, `competitors.md` · `customer.json`, `pitch-v1.md`, `pitch.md` · `panel/` (v1: cards, briefs, 20 answers, `results.md`) · `panel-v2/` (offer re-test) · `pricing-curve-starter.md`, `-growth.md`, `-fleet.md`, `pricing.md` · `offer.md` · `numbers.json`, `cfo.md`, `cfo-sources.md` · `marketing.md` · `brand.md` · `ops.md` · `launch.md` · `summary.md`, `business-plan.md`, `one-pager.md`.

## Appendix B: Sources

Government and industry: [TfNSW accreditation](https://www.transport.nsw.gov.au/operations/roads-and-waterways/business-and-industry/buses/operators/applying-for-bus-operator) · [BOAS audit tool Oct 2025](https://www.transport.nsw.gov.au/system/files/media/documents/2025/boas-audit-tool-october-2025.pdf) · [Accreditation package Jun 2025](https://www.transport.nsw.gov.au/system/files/media/documents/2025/bus-operator-accreditation-package-v1.1-june-2025.pdf) · [Australian Bus Fleet Lists](https://opendata.transport.nsw.gov.au/data/dataset/australian-bus-fleet-lists) · [BITRE Road Vehicles Jan 2025](https://www.bitre.gov.au/sites/default/files/documents/BITRE-Road-vehicles-Australia-January-2025--september2025--pdf.pdf) · [Statista registered buses](https://statista.com/statistics/824830/australia-number-of-registered-buses) · [BusNSW](https://busnsw.com.au/about-us/) · [BIC LCLF 2024](https://infrastructure.gov.au/sites/default/files/documents/lclf2024-bus-industry-confederation.pdf) · [IBISWorld businesses](https://www.ibisworld.com/australia/number-of-businesses/interurban-and-rural-bus-transport/458) · [IBISWorld market size](https://www.ibisworld.com/australia/market-size/interurban-and-rural-bus-transport/458) · [OAIC privacy guidance](https://www.oaic.gov.au/privacy/privacy-guidance-for-organisations-and-government-agencies) · [ACCC consumer guarantees](https://www.accc.gov.au/business/consumer-rights-and-guarantees) · [ATO GST registration](https://www.ato.gov.au/businesses-and-organisations/gst-excise-and-indirect-taxes/gst/registering-for-gst)

Competitors and reviews: see the links in Section 5 and `founder/competitors.csv`; plus [G2 Distinctive Systems](https://www.g2.com/sellers/distinctive-systems) · [featuredcustomers](https://www.featuredcustomers.com/vendor/distinctive-systems-ltd) · [G2 eCoachManager](https://www.g2.com/products/ecoachmanager/reviews) · [SoftwareFinder Moovs reviews](https://softwarefinder.com/fleet-management-software/moovs/reviews).

Benchmarks and regulation: [Tidemark](https://www.tidemarkcap.com/post/2025-vertical-smb-saas-benchmark-report) · [Kyle Poyar](https://kylepoyar.substack.com/p/2025-saas-benchmarks-report) · [SmartCompany](https://www.smartcompany.com.au/business-advice/privacy-act-small-business-exemption-government-report/) · [IAPP](https://www.iapp.org/news/a/amending-australias-privacy-act-small-businesses-bigger-responsibilities).

Framework: [Jakeschincariol/founder-skill](https://github.com/Jakeschincariol/founder-skill) (MIT). The board lenses summarise published frameworks (*$100M Offers*, *Zero to One*, Isaacson's *Steve Jobs*). They are not those authors' words or endorsements.

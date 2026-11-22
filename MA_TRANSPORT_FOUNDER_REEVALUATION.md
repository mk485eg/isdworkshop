# MA Transport: Founder Re-Evaluation and Startup Validation

**Date:** 22 November 2026
**Scope:** A fresh business and startup evaluation. No application code was changed or built.
**Verdict:** **VALIDATE FIRST**, with a strong push to **narrow the scope**. Overall score: **45 / 100**.

---

## 0. Method, evidence rules, and limitations (read first)

### 0.1 About the "Founder Skill"

You asked me to use the Founder Skill you installed and tested. **I could not find it in this environment.** I checked:

- the project repository, which holds only `README.md`;
- `~/.claude/skills`;
- every installed plugin's skill list.

None of them contains a skill named "founder", or any skill about startup evaluation or venture assessment. It may have been installed in another session, on another machine, or in a project this cloud container does not have.

So that the evaluation is still structured and not generic, I applied the closest installed frameworks:

| Framework applied | Source in this environment | How it was used |
|---|---|---|
| Competitive landscape mapping (direct, indirect, adjacent, substitute) | `product-management:competitive-brief` skill | Section 5 |
| Multi-source research with each claim labelled by evidence | `deep-research` skill (method only) | Sections 3–5 |
| VC-style scorecard and the 12 founder questions | Taken from your brief | Sections 2 and 13 |

**Action for you:** if the Founder Skill has its own rubric (category weights, kill criteria, scoring scale), send me the `SKILL.md`, or install it into this repository under `.claude/skills/`. I will re-score against its rubric. The evidence and the financial model below will not change; only the weights and the format might.

### 0.2 Research limitation

This session's network policy blocked direct page fetches. Every vendor and government site (bitre.gov.au, capterra.com.au, distinctive-systems.com and others) failed to resolve. **All research below comes from web-search results**: indexed page snippets and summaries, with links. I could not open the pages themselves, so I could not confirm a figure inside a PDF table. Each figure is labelled:

- **[V]** Verified from the vendor's or regulator's own indexed page (search snippet of the primary source).
- **[S]** Secondary source: an aggregator, Wikipedia, a review site or trade press.
- **[A]** My assumption or estimate. Not a fact.
- **NPD** Not Publicly Disclosed. Nothing was found.

Before you rely on any **[V]** or **[S]** price in a decision, open the link and confirm it. Prices change.

### 0.3 No previous report available

The repository holds no earlier report and no application code, so nothing was reused. The earlier operating assumptions (15 buses, 13 active, 22 days, 572–715 trips a month) are treated below as **unverified [A]**.

---

## 1. Executive Summary

**What MA Transport is today:** a plan for an all-in-one cloud TMS covering fleet, drivers, bookings, scheduling, tracking, maintenance and finance, for "all Australian passenger transport operators", priced at A$199, A$399 or A$699 a month by fleet size.

**The honest headline:** the problem is real, but the product as scoped is **too broad, priced above the nearest established Australian competitor, and aimed at a market too small for venture-scale returns.** In its present form this is a credible **bootstrapped niche SaaS** business, not a high-growth startup. It becomes investable only if early customers show **strong willingness to pay** and **low churn** in one narrow segment.

**Key findings:**

1. **Charter and coach operations software already exists in Australia, and it is cheap.** Coach Manager (Distinctive Systems) publishes Australian prices from **A$137.50 to A$385 a month** (ex-GST), with unlimited capacity at the top tier **[V]**. eCoachManager markets to Australian operators from roughly **A$220–240 a month plus setup fees** **[V, partly ambiguous]**. Your Fleet tier at A$699 costs about **1.8 times** Coach Manager's unlimited plan.
2. **The large operators you listed (Kinetic, CDC, Busways, Transit Systems, Transdev and others) are not your market.** They run government route contracts on enterprise scheduling systems: Trapeze, Optibus, GIRO HASTUS and Omnibus **[S]**. Drop them from the go-to-market plan entirely.
3. **The reachable market is small.** IBISWorld counts **618 businesses** in Interurban and Rural Bus Transport (which includes charter) in 2025 **[S]**. BusNSW cites about **950 accredited operators in NSW** across all service types **[S]**. A realistic **serviceable** market is **roughly 1,500–2,500 operators** with 3–30 buses nationally **[A]**. At about A$4,300 a year per customer, the whole serviceable market is worth **about A$6–11 million in ARR** **[A]**, and you will win only part of it.
4. **The unit economics work only at the realistic-to-optimistic end.** With support costs counted honestly, the conservative scenario (A$260 ARPA, 3% monthly churn, A$4,000 CAC) **never breaks even**. The realistic scenario breaks even at **about 52 customers if you bootstrap**, or **about 269 customers with a funded three-person team**, which is a large share of the whole serviceable market.
5. **The single biggest risk is not technical.** It is that small operators are satisfied with spreadsheets, whiteboards, Xero and cheap existing tools, so **switching costs exceed the value you offer.**

**Recommendation: VALIDATE FIRST.** Narrow to **one segment**: independent charter and coach operators with 5–30 vehicles on the NSW/VIC/QLD east coast. Narrow to **one painful workflow**: quote, booking, allocation, driver run sheet, invoice. Then prove that **at least 10 operators will pay** before you build the full TMS.

---

## 2. Founder Skill Assessment (the 12 questions)

| # | Question | Answer | Confidence |
|---|---|---|---|
| 1 | Is it solving a real and expensive problem? | **Real, moderately expensive.** Charter operators juggle quotes, bookings, vehicle and driver allocation, accreditation records and invoicing. Trade press shows operators replacing "outdated" and "manual" systems, for example Kangaroo Bus Lines' scheduling, charter and maintenance application **[S]**. But the cost of the pain (admin hours, double-bookings, missed invoices) has **not been quantified for any operator**. That is the critical gap. | Medium |
| 2 | Is the Australian market large enough? | **Large enough for a bootstrapped business; too small for venture capital on its own.** The serviceable market is about A$6–11M ARR **[A]**. Venture scale would need international expansion, or a broader product (payments, marketplace) that raises revenue per operator. | Medium |
| 3 | Ideal initial customer? | An independent, owner-run charter and coach operator with **5–30 vehicles**, mostly charter, school excursion and corporate work (not government route contracts), on the east coast, currently on spreadsheets or a legacy desktop tool. See Section 6. | Medium–High |
| 4 | Strongest competitors? | **Coach Manager** (cheap, Australian-priced, mature), **eCoachManager** (markets directly to Australian operators), **TransportMe** (Australian, 150+ contracted companies and 3,500+ vehicles per vendor claim **[V-vendor]**), **Busable** (Australian, regional operators). Telematics incumbents such as Teletrac Navman, EROAD and MTData own the in-vehicle layer. | High |
| 5 | What do they do better? | Years of domain logic, published pricing, existing integrations, established reference customers, hardware and telematics (TransportMe, telematics vendors), and government contracts (TransportMe with Queensland TMR **[V-vendor]**). | High |
| 6 | What would make an operator switch? | Only a **clearly better day-to-day workflow** at **similar or lower total cost**, plus **painless migration**: you import their customers, vehicles, drivers and future bookings for them. Specific triggers: a legacy system end-of-life, growth past what spreadsheets can handle, an accreditation audit failure, or a new operations manager. | Medium |
| 7 | Is the subscription model viable? | **Yes in structure.** Per-fleet tiers are standard and easy to understand. **Not yet proven in level.** See Section 7. | Medium |
| 8 | Are prices too low, too high, or reasonable? | **Starter A$199 is reasonable to slightly high. Growth A$399 is at the top of the market. Fleet A$699 is high** against Coach Manager's A$385 unlimited plan. Defensible only if you replace more tools (for example telematics-lite plus a driver app plus maintenance). | Medium |
| 9 | Customer acquisition strategy? | Founder-led direct sales, industry associations (BusNSW, BusVic, QBIC, BIC), the Australasian Bus & Coach Expo, and referrals. Paid digital ads alone will not work for this audience. See Section 10. | Medium |
| 10 | Biggest risks? | Low willingness to pay; incumbent price competition; high support load per customer; a long sales cycle for a low price; scope creep across the "complete TMS"; integration demands (Xero/MYOB, telematics); and liability around safety and compliance data. See Section 11. | High |
| 11 | Can it scale profitably? | **Within Australia, to roughly A$0.5–1.5M ARR [A].** Beyond that it needs international markets (NZ, UK, US), where Moovs, Busify, Busie, CoachRail and Distinctive Systems already compete. | Low–Medium |
| 12 | Viable startup or software project? | **At present it is a software project with a plausible but unproven niche business behind it.** There is no evidence yet of demand at these prices: no letters of intent, no paying pilots, no interviews on file. It becomes a startup when 10 operators pay. | High |

---

## 3. Problem and Market Validation

### 3.1 What we can say with evidence

- **Operators do replace legacy systems.** Kangaroo Bus Lines (QLD) was described as using "an outdated application for scheduling bus routes, charter management, and maintenance" **[S]** ([Telstra Purple case study](https://purple.telstra.com.au/case-studies/delivering-a-superior-transport-experience-for-queensland)). Buslines (NSW) moved from manual shift and roster creation to Omnibus, and later to Optibus **[S]** ([Optibus blog](https://blog.optibus.com/buslines-brings-optibus-to-new-south-wales-australia-to-improve-public-transportation); [ABC Bus News](https://www.busnews.com.au/industry-news/2012/buslines-nsw-automates-processes-for-business-growth)).
- **Compliance creates a real paperwork burden.** NSW requires accreditation for all public bus services under the *Passenger Transport Act 1990*, with penalties of up to A$110,000 for operating without it. Requirements include fit-and-proper checks, a Bus Operator Accreditation Scheme (BOAS) audit regime, and vehicle roadworthiness obligations **[V]** ([TfNSW accreditation](https://www.transport.nsw.gov.au/operations/roads-and-waterways/business-and-industry/buses/operators/applying-for-bus-operator); [BOAS audit tool Oct 2025](https://www.transport.nsw.gov.au/system/files/media/documents/2025/boas-audit-tool-october-2025.pdf); [Accreditation package June 2025](https://www.transport.nsw.gov.au/system/files/media/documents/2025/bus-operator-accreditation-package-v1.1-june-2025.pdf)). **Audit-ready records** (driver checks, vehicle maintenance, incidents) are a stronger buying trigger than "nice dashboards".
- **Competitors exist and have customers.** That is evidence the problem is real and that people pay for software to solve it. It also means the market is **contested**.

### 3.2 What has *not* been validated (critical gaps)

| Assumption | Status | How to test |
|---|---|---|
| Operators lose meaningful money or time to admin | **Unvalidated** | 15–20 structured interviews; time-and-motion on 3 operators |
| Operators will pay A$199–699 a month | **Unvalidated** | Pricing interviews (Van Westendorp), paid pilots, deposits |
| Operators will switch from existing tools | **Unvalidated** | Ask what they use now, what it costs, what made them try something new |
| 15 buses, 13 active, 22 days, 572–715 trips a month | **Unverified model input [A]** | Ask interviewees for real monthly trip counts and fleet utilisation |
| Larger operators are a future market | **Contradicted by evidence** | They use enterprise scheduling; see Section 5 |

### 3.3 Problem severity verdict

The problem is **real but "chronic", not "acute"**. Operators have muddled through with spreadsheets for decades. Chronic problems sell slowly. The acute moments to target are a **failed or upcoming accreditation audit**, **a double-booking that cost a contract**, **the operations manager leaving**, and **a legacy system being discontinued**.

---

## 4. Australian Market Opportunity

### 4.1 Market size facts

| Metric | Figure | Label | Source |
|---|---|---|---|
| Registered buses, Australia (Jan 2023) | ~97,400 (NSW ~26,660 highest) | [S] (Statista citing BITRE) | [Statista](https://statista.com/statistics/824830/australia-number-of-registered-buses); [BITRE Road Vehicles Jan 2025](https://www.bitre.gov.au/sites/default/files/documents/BITRE-Road-vehicles-Australia-January-2025--september2025--pdf.pdf) (could not open) |
| Interurban and rural bus transport businesses (ANZSIC 4621, includes charter), 2025 | 618 (down 1.6% on 2024) | [S] | [IBISWorld number of businesses](https://www.ibisworld.com/australia/number-of-businesses/interurban-and-rural-bus-transport/458) |
| Interurban and rural bus transport revenue, 2025 | ~A$2.4bn | [S] | [IBISWorld market size](https://www.ibisworld.com/australia/market-size/interurban-and-rural-bus-transport/458) |
| Accredited bus operators, NSW | ~950 | [S] (industry body) | [BusNSW About](https://busnsw.com.au/about-us/) |
| Bus and coach industry employment | >85,000 | [S] (BIC submission) | [BIC LCLF 2024](https://infrastructure.gov.au/sites/default/files/documents/lclf2024-bus-industry-confederation.pdf) |
| Victorian diesel bus fleet (route) | ~4,500 | [V] | [Vic Zero Emissions Bus plan](https://www.vic.gov.au/zero-emissions-bus-trial) |
| Fleet lists by operator, all states | Dataset exists | [V] | [Australian Bus Fleet Lists (TfNSW Open Data)](https://opendata.transport.nsw.gov.au/data/dataset/australian-bus-fleet-lists) |

**Important caveat:** the 97,400 registered buses include many small buses owned by schools, churches, aged care, clubs, mines and hire firms that are **not** commercial passenger transport operators. That number is **not** your market.

### 4.2 TAM / SAM / SOM (all estimates [A])

| Layer | Definition | Operators | ARPA/yr | Value |
|---|---|---|---|---|
| TAM | All accredited commercial bus/coach operators in Australia | ~3,000–4,000 [A], extrapolated from ~950 in NSW, NSW holding ~27% of registered buses | ~A$4,300 | ~A$13–17M |
| SAM | Independent operators with 3–30 vehicles, mostly charter, school and tour work, not on enterprise systems | ~1,500–2,500 [A] | ~A$4,300 | **~A$6–11M** |
| SOM (5 years) | A realistic share for a new entrant against Coach Manager, eCoachManager, TransportMe and Busable | 5–10% of SAM: ~75–250 operators | ~A$4,300 | **~A$0.3–1.1M ARR** |

**Interpretation:** a good **lifestyle or bootstrapped SaaS** outcome (around A$1M ARR, 50–70% margins, small team) is possible. A **venture-scale** outcome (over A$10M ARR) is not possible from Australian passenger transport alone.

**Action:** download the [Australian Bus Fleet Lists dataset](https://opendata.transport.nsw.gov.au/data/dataset/australian-bus-fleet-lists) and count operators by fleet size. This would turn the SAM from an estimate into a verified number. I could not open it from this environment.

### 4.3 Large operators: verified context (not targets)

| Operator | Data point | Label | Source |
|---|---|---|---|
| Kinetic | Calls itself "Australia & NZ's biggest bus operator"; 37,400+ people; 300+ electric buses across 10 depots (Australasia, including UK/NZ group figures) | [V-vendor] | [wearekinetic.com](https://wearekinetic.com/); [Our story](https://www.wearekinetic.com/our-story) |
| Kinetic Melbourne | 602 buses (June 2024) | [S] | [Wikipedia](https://en.wikipedia.org/wiki/Kinetic_Melbourne) |
| Kinetic Townsville | 81 buses (Jan 2025) | [S] | [Wikipedia](https://en.wikipedia.org/wiki/Kinetic_Townsville) |
| CDC Melbourne | 387 buses (Aug 2024); absorbed Kastoria/Broadmeadows fleet 1 July 2025 | [S] | [Wikipedia](https://en.wikipedia.org/wiki/CDC_Melbourne) |
| CDC Ballarat | 76 buses and coaches (June 2024) | [S] | [Wikipedia](https://en.wikipedia.org/wiki/CDC_Ballarat) |
| Transdev John Holland (Sydney) | 472 buses incl. 25 electric (July 2026) | [S] | [Wikipedia](https://en.wikipedia.org/wiki/Transdev_John_Holland) |
| Ventura | Its routes and fleet were absorbed into Transdev Melbourne (~500 buses inherited from MBL, Ventura and SmartBus operators) | [S] | [Wikipedia](https://en.wikipedia.org/wiki/Transdev_Melbourne) |
| Dyson Group | 2025 revenue ~A$245.4M (IBISWorld, Interurban/Rural segment); Melbourne charter since 1952 | [S] | [IBISWorld](https://www.ibisworld.com/australia/industry/interurban-and-rural-bus-transport-in-australia/458/); [Dysons](https://dysongroup.com.au/node/25) |
| Busways | Current fleet size: **NPD** (not found) | NPD | none |
| Transit Systems | Current fleet size: **NPD** (not found) | NPD | none |

**Conclusion:** these operators run hundreds of buses each under government contracts, with enterprise scheduling, ticketing and AVL systems. **A new SaaS with tiers capped at 30 buses has no realistic route into them within 3–5 years.** Remove "larger transport operators" from the plan.

---

## 5. Competitor Analysis

### 5.1 Competitive map

- **Direct:** charter/coach booking, dispatch and operations software sold to small and medium operators.
- **Indirect:** school-bus and route operations tools, and broker marketplaces.
- **Adjacent:** telematics and fleet maintenance platforms that could add booking modules.
- **Enterprise:** public-transport scheduling suites. Not competitors for SMB charter, but they block the "large operator" ambition.
- **Substitutes:** Excel, Google Sheets and Calendar, whiteboards, Xero/MYOB, email and phone.

### 5.2 Competitor table (19 named products, plus substitutes)

| # | Competitor | Type | Target market | Main features | Pricing | Strengths | Weaknesses |
|---|---|---|---|---|---|---|---|
| 1 | **Coach Manager** (Distinctive Systems) | Direct | Coach and charter operators; AU and US offices | Charter reservations, quoting, dispatch, recurring contracts; sister Vehicle Maintenance System | **[V] A$137.50/mo** (Express L1, 1,000 movements) to **A$220** (Full L1), **A$247.50/330** (L5), **A$302.50/385** (Unlimited); +A$27.50/user; +A$110/company; ex-GST. [AU pricing](https://distinctive-systems.com/au/products/coach-manager/australian-pricing/) | Mature, Australian pricing published, cheap, capacity-based (not per bus) | Interface age and UX not verified; per-user fees add up; review data NPD |
| 2 | **eCoachManager** | Direct | Coach and minibus hire operators, AU/UK/NZ | Cloud quoting, booking, dispatch, driver app, invoicing | **[V, ambiguous]** "From $215/mo" in one listing; tier snippets show from $220–240/mo plus $300–350 setup, and annual prepay options. One tier figure ($1,670/mo) looks like a parsing error. [Price list (NZ)](https://ecoachmanager.com/packages-price-list-nz/); [AU costs article](https://ecoachmanager.com/e-coach-manager/ecoachmanager-understanding-fleet-software-costs-in-australia/) | Markets directly to Australia; unlimited users | Pricing page unclear; content-marketing heavy; independent reviews NPD |
| 3 | **TransportMe (TMe)** | Direct / indirect | AU bus operators, governments, schools | Ticketing, smartcards, GPS, driver console, compliance, maintenance, passenger app, student manifests | **NPD** ("free quote") | Australian; ISO 27001/9001; claims 150+ contracted companies, 3,500+ vehicles, Qld TMR contract **[V-vendor]**. [Site](https://www.transportme.com.au); [ABC article](https://www.busnews.com.au/transportme-transit-management-system-brings-unique-perspective-to-fleet-management/) | Hardware-centric; skews to school/route; charter depth unverified |
| 4 | **Busable** | Direct | Regional AU bus operators | Route/timetable publishing; reported planning, rostering, charter, tracking, maintenance | **NPD** | Australian, regional focus, "affordable" mission **[V-vendor]**. [About](https://busable.app/about) | Charter/rostering depth not confirmed in sources |
| 5 | **RouteStra** | Direct | Bus and coach operators | Scheduling, compliance, private hire, rosters, timetables | **NPD**; per user, free trial **[S]** | Combines compliance and private hire | Young product; customer base NPD. [Capterra AU](https://www.capterra.com.au/software/1113395/RouteStra) |
| 6 | **Coach & Charter Manager** (Capterra listing) | Direct | Coach and charter operators | Charter management | **[S] from US$100/mo**; 4.8/5 (21 reviews) per search summary. Listing details ambiguous. | Well reviewed | Identity and features need confirming. [Capterra AU](https://www.capterra.com.au/software/201842/coach-charter-manager) |
| 7 | **Moovs** | Direct (international) | North American charter, limo and shuttle operators; has an `en-au` site | Quoting, booking, dispatch, driver app, payments, customer portal | **[S, conflicting]** US$129–199/mo flat tiers, plus a free plan. [Capterra](https://www.capterra.com/p/209139/moovs/pricing/); [Moovs AU page](https://www.moovsapp.com/en-au/charter-bus-software) | Modern UX, payments built in, freemium | US-centric; no Australian compliance |
| 8 | **Busify** | Direct (international) | US charter/motorcoach | Quotes, dispatch, driver app, maintenance | **NPD** | Purpose-built for charter. [busify.com](https://www.busify.com/) | US-focused |
| 9 | **Busie** | Direct (international) | US charter/motorcoach | All-in-one charter ops, marketplace | **NPD** | Modern, marketplace angle. [getbusie.com](https://www.getbusie.com/) | US-focused |
| 10 | **CoachRail** | Direct (international) | Charter bus, motorcoach, limo | Cloud dispatch, mobile app | **[S] ~US$50/user/mo** (ITQlick); a $199/mo figure was not confirmed. [ITQlick](https://www.itqlick.com/coachrail/pricing) | Mobile app | US-focused; aggregator pricing |
| 11 | **Sengerio** | Direct (international) | Bus charter, tour operators, group travel | Charter booking, fleet, driver planning | **[S, unverified]** from €7.60/mo per Software Advice; otherwise NPD. [Software Advice AU](https://www.softwareadvice.com.au/software/166261/sengerio) | European, multi-module | Pricing unclear; AU presence unverified |
| 12 | **CIS-BUS Charter** | Direct | Charter providers | Cloud charter management | **NPD**. [Capterra AU](https://www.capterra.com.au/software/1016965/cis-bus-charter) | Charter-specific | Little public information |
| 13 | **BusMinder** | Indirect | AU school bus operators, schools, parents | GPS and smartcard student tracking, driver app | **NPD**. [App Store](https://apps.apple.com/app/id1364797036) | Owns the school-safety workflow | Not charter ops |
| 14 | **RollCall** | Indirect | AU/NZ schools and bus operators | Student scans, parent notifications, duty of care | **NPD**; claims 300+ schools and operators **[V-vendor]**. [rollcall.com.au](https://rollcall.com.au/bus-companies) | Strong in school duty of care | Not charter ops |
| 15 | **Trapeze** | Enterprise | Government and large route operators | Timetabling, driver scheduling, rostering | **NPD**. [Trapeze AU](https://trapezegroup.com.au/bus/planning-scheduling/) | Deep, entrenched | Out of SMB price range |
| 16 | **Optibus** | Enterprise | Route operators (e.g. Buslines NSW) | Planning, scheduling, rostering, AI optimisation | **NPD** | Modern, AI-led | Out of SMB price range |
| 17 | **GIRO HASTUS** / **Omnibus** | Enterprise | Transit agencies, route operators | Scheduling | **NPD** | Incumbents | Not charter |
| 18 | **Teletrac Navman / EROAD / MTData** | Adjacent (telematics) | Commercial fleets including bus | GPS, EWD/fatigue (Teletrac supports a "Bus" rule set), maintenance, cameras | **[S]** Teletrac ~A$25–30/vehicle/mo (aggregators); **[V]** EROAD "from $25/vehicle/mo" with hardware purchase, or $35 without (currency and GST unstated); MTData **NPD**. [ExpertMarket AU](https://www.expertmarket.com/au/vehicle-tracking/teletrac-navman-review); [EROAD pricing](https://eroad.com/?p=84) | Already in the vehicle; data source | No charter booking workflow |
| 19 | **Samsara / Geotab / Fleetio** | Adjacent (fleet) | General fleets | Telematics, maintenance, inspections | **[S]** Samsara ~US$27–50/vehicle/mo plus hardware (US third parties); **[V]** Fleetio US$4–10/vehicle/mo, 5-vehicle minimum. [Fleetio pricing](https://fleetio.com/pricing) | Strong maintenance and inspections | No passenger booking or charter logic |
| – | **BusCharter.com.au** and other brokers | Indirect / channel | End customers booking charters | Marketplace connecting buyers to local operators (Qld launch May 2026) | Commission: **NPD** | Owns demand | Could become a channel *or* a competitor. [AAP release](https://www.aap.com.au/aapreleases/globenewswire9727742/) |
| – | **Spreadsheets, whiteboards, Xero/MYOB** | Substitute | Every small operator | Everything, badly | ~A$0 extra | Free, familiar, flexible | Error-prone, not audit-ready, does not scale |

### 5.3 What competitors do better than MA Transport today

1. **They exist and have customers.** MA Transport has no product in market and no reference customers.
2. **Coach Manager is cheaper** at every tier above Starter, and has no per-bus cap.
3. **TransportMe owns hardware, ticketing and government relationships**, which a software-only start-up cannot copy quickly.
4. **Telematics vendors are already installed in the buses.** Operators will expect MA Transport to integrate with them, not replace them.
5. **International players (Moovs and others) have modern UX, payments and freemium plans.** If one of them localises for Australia, it competes on product quality and price at the same time.

### 5.4 Where a gap may exist (hypotheses to test)

- **Modern, mobile-first UX built for Australian compliance.** Hypothesis: the incumbents are either older (Coach Manager) or hardware/school-centric (TransportMe, BusMinder, RollCall).
- **Accreditation audit readiness in one place**: driver checks, vehicle maintenance, incident logs and BOAS evidence, matched to the TfNSW BOAS audit tool.
- **Quote-to-cash speed**: instant online quotes, deposits and Xero sync, for operators who lose work by quoting slowly.

These are **hypotheses**. None is proven.

---

## 6. Ideal Customer Profile (ICP)

### 6.1 Beachhead ICP

| Attribute | Definition |
|---|---|
| Segment | Independent, owner-operated **charter and coach** businesses |
| Fleet | **5–30 vehicles** (minibuses up to 57-seat coaches) |
| Work mix | Mostly charter: school excursions, corporate, weddings, events, airport and tour transfers. Little or no government route contract work. |
| Geography | NSW, VIC, SE QLD first (density; NSW has ~950 accredited operators **[S]**) |
| Current tools | Spreadsheets, whiteboard, email, Xero/MYOB, or a legacy desktop tool |
| Buyer | Owner/MD (economic buyer); operations or charter manager (daily user) |
| Trigger events | Growth past ~8 vehicles, an accreditation audit, a new ops manager, legacy software end-of-life, a costly booking error |

### 6.2 Who is *not* the ICP (for now)

- Government route operators of any size, which are contract-driven and on enterprise systems.
- Operators with 1–3 vehicles, who cannot justify A$199 a month and churn heavily.
- School-only operators whose need is student tracking (BusMinder and RollCall serve them).
- Non-transport organisations that own buses (churches, schools, aged care).

**Verdict on breadth:** your current target list (private, charter, passenger transport, shuttle, SME, *and* large operators) is **too broad**. Each segment has different workflows, buyers and compliance needs.

---

## 7. Pricing Strategy

### 7.1 Your tiers against the market

| | Starter | Growth | Fleet | Extra bus |
|---|---|---|---|---|
| MA Transport (hypothesis) | A$199 (≤5) | A$399 (≤15) | A$699 (≤30) | A$20–30 |
| Implied per bus at the cap | A$39.80 | A$26.60 | A$23.30 | A$20–30 |
| Coach Manager Full [V] | A$220 (L1) | A$330 (L5) | A$385 (Unlimited) | n/a (capacity by movements) |
| Coach Manager Express [V] | A$137.50 | A$247.50 | A$302.50 | n/a |
| eCoachManager [V, ambiguous] | ~A$220–240 + setup | NPD | NPD | n/a |
| Telematics only (EROAD [V] / Teletrac [S]) | ~A$25–35/vehicle/mo | | | |
| Fleetio maintenance [V] | US$4–10/vehicle/mo | | | |

### 7.2 Verdict

- **Starter (A$199): reasonable.** It sits between Coach Manager Express and Full. Keep it, or test A$149 with annual prepayment.
- **Growth (A$399): at the top of the market.** Justified only if it includes a driver app plus maintenance plus compliance, so it replaces two tools.
- **Fleet (A$699): too high against the direct competitor.** A 25-bus operator would pay A$699 to MA Transport against A$385 to Coach Manager Full Unlimited. You need a clear reason for an 82% premium. **Test A$499–549.**
- **Extra bus at A$20–30 is about the same as a telematics subscription.** Operators will compare the two. Set the add-on at **A$15–20**.

### 7.3 Recommended pricing experiments (for validation, not launch)

1. **Founding-customer offer:** 12 months at 40% off, **prepaid** or with a deposit, in return for weekly feedback and a case study. Prepayment is the strongest willingness-to-pay signal you can get.
2. **Van Westendorp price-sensitivity questions** in every discovery interview.
3. **Charge for migration and onboarding** (A$500–1,500 one-off). eCoachManager charges setup fees **[V]**, so the market accepts them, and they filter out tyre-kickers.
4. **Keep per-trip pricing as a later option.** It aligns cost with seasonal revenue, but makes revenue unpredictable. Revisit once you have trip data.
5. **Payments revenue (later):** taking customer deposits through MA Transport, with a fee on payments, can raise revenue per operator without raising the subscription price. Moovs uses payments **[S]**.

---

## 8. Financial Projections

### 8.1 Verified versus assumed inputs

| Input | Value | Label |
|---|---|---|
| Competitor price anchors | Section 7 | [V]/[S] |
| SMB SaaS CAC median ~US$1,100–1,400; payback 9–16 months | benchmark | [S], secondary blog summaries of OpenView/High Alpha; [Kyle Poyar 2025](https://kylepoyar.substack.com/p/2025-saas-benchmarks-report), [Tidemark VSKP](https://www.tidemarkcap.com/post/2025-vertical-smb-saas-benchmark-report) |
| SMB churn: wide disagreement (annual 11–25%; monthly 2–5%) | benchmark | [S] |
| Average revenue per account (ARPA) | A$260 / 360 / 480 a month | [A] |
| Monthly logo churn | 3.0% / 2.0% / 1.2% | [A] |
| Blended CAC | A$4,000 / 2,500 / 1,500 | [A] |
| Hosting (AU region, managed database, backups, monitoring) | A$350–600 a month fixed + A$7–12 per customer | [A] (AWS/Azure Sydney prices not verified in this session) |
| Support cost | 1 FTE per 40 / 60 / 90 customers at A$95k + 15% on-costs; founder covers at least 0.15 FTE early | [A] |
| Payment processing | 2% of revenue | [A] |
| SaaS tools | A$400 a month | [A] |
| Bootstrapped fixed cost | Founder unpaid + 0.5 contract developer ≈ A$6,500 a month | [A] |
| Funded fixed cost | Founder + 2 developers at A$130k + 15% ≈ A$37,375 a month | [A] |

Model script: `model.py` (kept in the session scratchpad, not committed). It reproduces every number below.

### 8.2 Scenario results by customer count (AUD a month unless stated)

**Conservative:** ARPA A$260, churn 3% a month, CAC A$4,000

| Customers | MRR | ARR | Infra | Support | Pay fees | COGS | Gross margin | CAC for cohort |
|---|---|---|---|---|---|---|---|---|
| 5 | 1,300 | 15,600 | 660 | 1,366 | 26 | 2,052 | −58% | 20,000 |
| 10 | 2,600 | 31,200 | 720 | 2,276 | 52 | 3,048 | −17% | 40,000 |
| 25 | 6,500 | 78,000 | 900 | 5,690 | 130 | 6,720 | −3% | 100,000 |
| 50 | 13,000 | 156,000 | 1,200 | 11,380 | 260 | 12,840 | 1% | 200,000 |
| 100 | 26,000 | 312,000 | 1,800 | 22,760 | 520 | 25,080 | 4% | 400,000 |

Contribution per customer ≈ A$15 a month; LTV ≈ A$507; LTV:CAC 0.1. **Never breaks even.** Low ARPA plus heavy support makes the business structurally unprofitable.

**Realistic:** ARPA A$360, churn 2% a month, CAC A$2,500

| Customers | MRR | ARR | Infra | Support | Pay fees | COGS | Gross margin | CAC for cohort |
|---|---|---|---|---|---|---|---|---|
| 5 | 1,800 | 21,600 | 495 | 1,366 | 36 | 1,897 | −5% | 12,500 |
| 10 | 3,600 | 43,200 | 540 | 1,517 | 72 | 2,129 | 41% | 25,000 |
| 25 | 9,000 | 108,000 | 675 | 3,793 | 180 | 4,648 | 48% | 62,500 |
| 50 | 18,000 | 216,000 | 900 | 7,587 | 360 | 8,847 | 51% | 125,000 |
| 100 | 36,000 | 432,000 | 1,350 | 15,174 | 720 | 17,244 | 52% | 250,000 |

Contribution ≈ A$192 a month; LTV ≈ A$9,600; CAC payback ≈ 13 months; LTV:CAC ≈ 3.8.
**Break-even:** about **52 customers** bootstrapped (MRR about A$18.6k); about **269 customers** funded (MRR about A$97k). **269 customers is roughly 11–18% of the estimated SAM.**

**Optimistic:** ARPA A$480, churn 1.2% a month, CAC A$1,500

| Customers | MRR | ARR | Infra | Support | Pay fees | COGS | Gross margin | CAC for cohort |
|---|---|---|---|---|---|---|---|---|
| 5 | 2,400 | 28,800 | 385 | 1,366 | 48 | 1,799 | 25% | 7,500 |
| 10 | 4,800 | 57,600 | 420 | 1,366 | 96 | 1,882 | 61% | 15,000 |
| 25 | 12,000 | 144,000 | 525 | 2,529 | 240 | 3,294 | 73% | 37,500 |
| 50 | 24,000 | 288,000 | 700 | 5,058 | 480 | 6,238 | 74% | 75,000 |
| 100 | 48,000 | 576,000 | 1,050 | 10,116 | 960 | 12,126 | 75% | 150,000 |

Contribution ≈ A$362 a month; LTV ≈ A$30,200; CAC payback ≈ 4 months; LTV:CAC ≈ 20.
**Break-even:** about **21 customers** bootstrapped; about **111 customers** funded.

### 8.3 What the numbers say

1. **Support cost decides profitability, more than hosting.** Hosting is under 5% of revenue in every scenario. Support for non-technical operators running a business-critical dispatch tool is the real cost of goods. **Build self-service onboarding and in-app guidance early.**
2. **ARPA below about A$300 does not work** at realistic support ratios. That argues *against* cutting prices to win deals, and *for* charging setup fees and annual prepayment.
3. **Raising venture funding to build a large team is the wrong move now.** A funded team needs about 111–269 customers to break even, which is about 4–18% of the whole SAM. Stay bootstrapped until the realistic scenario's metrics (churn ≤2%, CAC ≤A$2,500) are proven.
4. **100 customers in the realistic case is A$432k ARR.** That is a good small business, not a venture outcome.

---

## 9. MVP Recommendations

### 9.1 Is the feature list too big? **Yes.**

The proposed scope covers fleet, drivers, bookings, customers, scheduling, operations, tracking, reporting, maintenance, performance and finance. That is **five or more products**. Each competitor took years to build its depth. A solo or small team trying to ship all of it will ship nothing good.

### 9.2 Essential MVP (one workflow, done excellently)

**Quote → Booking → Allocation → Run sheet → Completion → Invoice**

1. Customer and booking records (with an enquiry pipeline).
2. Fast quote builder (distance and time rules, PDF/email quote, online acceptance).
3. Calendar-based vehicle and driver allocation with **clash detection** (double-booked vehicle, driver unavailable, licence or accreditation expired).
4. Driver run sheet on mobile (web app is fine): job details, contacts, pickup times, check-in/complete.
5. Basic vehicle and driver register with **expiry alerts** (registration, inspection, driver authority or licence, Working With Children Check where relevant).
6. Invoice generation and **Xero sync** (MYOB second).
7. Simple dashboard: bookings, revenue and utilisation for the month.

### 9.3 Postpone

- Live GPS tracking (integrate with existing telematics later; don't build it).
- Full maintenance and workshop management (start with service-due reminders only).
- Route and timetable scheduling for route services.
- Passenger-facing apps and ticketing.
- Advanced BI and financial reporting.
- Multi-depot and enterprise permissions.
- AI optimisation.

### 9.4 Potential differentiators (to validate)

- **Accreditation audit pack:** one-click export of the evidence the BOAS audit tool asks for **[V]**. Map it to the TfNSW audit tool first, then the Victorian and Queensland equivalents.
- **Speed to quote:** a public quote form that turns into a priced quote in minutes.
- **Clash-proof allocation** with compliance checks built into dispatch.
- **Fixed-price onboarding with data migration** done for the customer.

### 9.5 Features that become expensive to maintain

- **Live GPS and telematics hardware:** device support, connectivity and integrations with many vendors.
- **Payments:** PCI scope, chargebacks, reconciliation. Use Stripe-hosted flows only.
- **Accounting integrations:** Xero and MYOB API changes, mapping edge cases.
- **Compliance rules for every state:** rules differ between NSW, VIC, QLD, WA and others, and they change (the TfNSW BOAS guidance was updated in 2025 **[V]**).
- **Fatigue and EWD logic:** heavy-vehicle fatigue rules carry legal liability. Integrate with an approved EWD vendor; do not build one.
- **Offline driver apps** for regional areas with poor reception.

### 9.6 Integration requirements (priority order)

1. Xero (most important), then MYOB.
2. Email/SMS (transactional providers).
3. Stripe or another payment gateway for deposits.
4. Telematics read-only (Teletrac Navman, EROAD, MTData) via their APIs, in phase 3.
5. Calendar export (ICS) for drivers and customers.

### 9.7 Security and privacy

- **Privacy Act 1988:** many small operators are currently exempt under the A$3M turnover threshold. The Government has **agreed in principle to remove the small-business exemption**, and that change is expected in a later tranche of reforms **[S]** ([SmartCompany](https://www.smartcompany.com.au/business-advice/privacy-act-small-business-exemption-government-report/); [IAPP](https://www.iapp.org/news/a/amending-australias-privacy-act-small-businesses-bigger-responsibilities)). **Design as though the APPs apply**, because your enterprise-grade customers and schools will require it.
- Sensitive data: driver licences, Working With Children Check numbers, police check results, passenger names (including **children** on school excursions), and medical or accessibility notes. Collect the minimum. Encrypt at rest. Use role-based access. Keep audit logs.
- **Host in Australia** (AU region). Schools and government-linked customers will ask.
- Multi-factor authentication for admins; per-tenant data isolation; daily backups with tested restores.
- Notifiable Data Breaches scheme readiness: an incident response plan.
- In the longer term: SOC 2 or ISO 27001 for larger customers. TransportMe already holds ISO 27001 **[V-vendor]**.

### 9.8 Scalability requirements

The technical scale is modest: about 2,500 tenants, each with tens of vehicles. A standard multi-tenant web stack on managed cloud services handles this easily. **Scalability is a commercial problem, not a technical one.** Do not over-engineer (no microservices, no Kubernetes) before about 100 customers.

### 9.9 Phased roadmap

| Phase | Timing | Scope | Exit criterion |
|---|---|---|---|
| 0: Validate | Months 0–3 | Interviews, clickable prototype, pricing tests, pre-sales | 10 operators commit with a deposit or prepayment |
| 1: MVP | Months 3–6 | Section 9.2 scope for 3–5 design partners | Design partners run all real charter jobs in the system for 4 weeks |
| 2: Paid launch | Months 6–12 | Xero, quote form, compliance alerts, audit pack v1 | 25 paying customers, monthly churn ≤2%, NPS ≥30 |
| 3: Expand | Months 12–24 | Telematics read integration, service-due maintenance, deposits/payments, MYOB | 75–100 customers; CAC payback ≤12 months |
| 4: Optional | Months 24+ | NZ, adjacent segments (shuttles, tour operators), analytics | Only if Phases 2–3 metrics hold |

---

## 10. Customer Acquisition Strategy

### 10.1 Channels (ranked)

1. **Founder-led direct outreach:** phone, then visit the depot. Small operators buy from people they trust. Expect 20–40 conversations per paying customer early on **[A]**.
2. **Industry associations:** BusNSW (~950 accredited operators in its state **[S]**), BusVic, QBIC (Queensland), BIC (national, 160+ members **[S]**). Sponsor a regional meeting and offer a member discount.
3. **Australasian Bus & Coach Expo** and state conferences. eCoachManager exhibits there **[V-vendor]**, so the buyers attend.
4. **Accreditation and compliance consultants and auditors:** a referral partnership in return for the audit pack.
5. **Referrals:** one free month for each referral that converts.
6. **Content and SEO:** "how to prepare for a BOAS audit", "bus charter quote template". Slow, but compounding.
7. **Broker marketplaces (BusCharter.com.au and similar):** a possible integration partner that sends bookings into MA Transport.

**Not recommended early:** broad paid search or social ads. The audience is small and niche, so cost per lead will be high.

### 10.2 First 20 potential customers (prospects only, none committed)

Fleet sizes are **self-reported by the operator in directories or on their own websites**, unless marked otherwise. None is a committed customer. Decision-makers are **assumed** to be the owner/MD and the operations or charter manager; confirm on LinkedIn or by phone.

| # | Operator | Location | Fleet (as found) | Likely problems [A] | Approach |
|---|---|---|---|---|---|
| 1 | Alura Coaches | Caringbah, NSW | NPD; family-owned since 1926 [S] ([The Leader](https://www.theleader.com.au/story/9351766/alura-coaches-100-years-of-trusted-service-in-the-shire/)) | Legacy processes, excursion peaks | Warm intro via BusNSW; centenary angle |
| 2 | AusCoach | Alexandria, NSW | "Fleet of coaches", NPD [S] ([Sydney.com](https://www.sydney.com/destinations/sydney/inner-sydney/alexandria-and-rosebery/transport/auscoach)) | School and corporate scheduling | Direct call to owner |
| 3 | Marulan Coaches | Marulan, NSW | NPD; family-run (Hale family) [S] ([VisitNSW](https://www.visitnsw.com/id/destinations/country-nsw/goulburn-area/goulburn/transport/marulan-coaches)) | Regional excursion and camp logistics | Depot visit |
| 4 | Coastal Liner | Central Coast, NSW | "Large fleet", NPD [S] ([CC Mariners](https://ccmariners.com.au/?p=885)) | Touring plus charter mix | Direct |
| 5 | North Sydney Bus Charters | Sydney, NSW | NPD [S] ([site](https://northsydneybuscharters.com.au/services/school-bus/)) | School booking volume | Direct |
| 6 | Destination Coaches | Marrickville, NSW | NPD [S] ([Sydney.com](https://www.sydney.com/destinations/sydney/inner-sydney/marrickville/transport/destination-coaches)) | Corporate and event allocation | Direct |
| 7 | Prestige Coach Hire | Springwood, NSW | NPD [S] ([VisitNSW](https://www.visitnsw.com/destinations/blue-mountains/katoomba-area/springwood/transport/prestige-coach-hire)) | Tour and charter quoting | Direct |
| 8 | Bathurst Coach Travel | Bathurst, NSW | NPD [S] ([VisitNSW](https://www.visitnsw.com/destinations/country-nsw/bathurst-area/bathurst/transport/bathurst-coach-travel)) | Regional events peaks | Direct |
| 9 | Austwide Coaches | NSW | NPD [S] ([site](https://austwidecoaches.com.au/about/)) | Multi-region charter | Direct |
| 10 | Victoria Coaches | North Melbourne, VIC | **14 buses and coaches**, 21–57 seats [S, self-reported] ([Yellow Pages](https://www.yellowpages.com.au/north-melbourne-vic/bpp/victoria-coaches-577768230)) | Weddings and corporate scheduling | **Ideal ICP fit.** Direct visit |
| 11 | Crown Coaches | VIC | NPD; family-run since 1967; accredited [S] ([Yellow Pages](https://www.yellowpages.com.au/nationwide/bpp/crown-coaches-pty-ltd-580288844)) | School plus charter compliance | Via BusVic |
| 12 | Alston Coaches | Braeside, VIC | NPD [S] ([Australia's Guide](https://australiasguide.com/vic/transport-hire/kingston/braeside/alston-coaches/)) | Corporate events | Direct |
| 13 | Quince's Coaches | Melbourne, VIC | NPD [S] ([site](https://quinces.com.au/bus-charter-melbourne)) | Event charter peaks | Direct |
| 14 | Harlan Transport | Melbourne, VIC | NPD; coaches, midis, minibuses [S] ([Easy Weddings](https://www.easyweddings.com.au/HensParty/Melbourne/HarlanTransport/)) | Mixed fleet allocation | Direct |
| 15 | Sunstate Charters | Pinkenba, QLD | NPD; 30+ years [S] ([Australia.com](https://australia.com/en/atdw/product.56b262682cbcbe7073adcce9.html)) | Transfers and tours, airport volume | Via QBIC |
| 16 | Aries Queensland | Molendinar, QLD | NPD; corporate/MICE focus, 30 years [S] ([Experience Gold Coast](https://experiencegoldcoast.com/places-to-go/central-gold-coast/transport/aries-queensland--seqs-corporate-travel-specialist-au0958331)) | Event logistics with many vehicles | Direct |
| 17 | Belbaker Bus Charter | Sunshine Coast, QLD | NPD [S] ([Easy Weddings](https://www.easyweddings.com.au/WeddingCars/SunshineCoast/BelbakerBusCharter)) | Wedding and event bookings | Direct |
| 18 | Pinnacle Coachlines | Perth, WA | **30+ vehicles**, 10–61 seats [S, self-reported] ([site](https://pinnacle-coachlines.squarespace.com)) | Metro plus regional WA dispatch | Phone/video (phase 2 geography) |
| 19 | Rove Charters | Greenwood, WA | NPD; 13–57 seat vehicles; est. 2017 [S] ([Australia's Guide](https://australiasguide.com/wa/transport-hire/joondalup/greenwood/rove-charters)) | Growing young business, likely spreadsheets | Phone/video |
| 20 | Adelaide Coachlines | Edwardstown, SA | NPD; 21 and 57 seaters; family-run since 1960 [S] ([Yellow Pages](https://www.yellowpages.com.au/edwardstown-sa/bpp/adelaide-coaches-bus-hire-581360820)) | Local and interstate charter | Phone/video |

Reserves: Goldrush Tours (WA), Perth Bus and Coach Charter (WA), Cooee Tours (multi-depot QLD/NSW), VicBus (Mount Evelyn, minibuses), Kangaroo Bus Lines (QLD, a known legacy-system replacement, though it may already have chosen a vendor).

**Fleet sizes:** 18 of the 20 are not publicly disclosed. Ask in the first call, or look them up in the [Australian Bus Fleet Lists](https://opendata.transport.nsw.gov.au/data/dataset/australian-bus-fleet-lists).

### 10.3 How to validate willingness to pay before building heavily

1. **Problem interviews (weeks 1–4):** 20 operators. Do not pitch. Ask: "Walk me through the last charter from enquiry to payment." Record the tools used, the time spent and the errors, and what they currently pay for software.
2. **Quantify the pain:** admin hours per week × wage, lost quotes, double-bookings per year, audit findings.
3. **Clickable prototype demo (weeks 4–8):** show the core workflow only.
4. **Ask for money:** a founding-customer deal with a **refundable deposit** (for example one month in advance) or a 12-month prepay at a discount. **A verbal "I'd use that" counts for nothing.**
5. **Concierge MVP:** for 2–3 operators, run their bookings in your prototype plus a spreadsheet, so you learn the edge cases before you code them.
6. **Kill criteria:** if fewer than **5 of 20** interviewed operators agree to a paid pilot or deposit at A$149 or more a month, **stop or pivot**.

---

## 11. Risk Assessment

| Risk | Likelihood | Impact | Mitigation |
|---|---|---|---|
| Operators won't pay (spreadsheets are "good enough") | **High** | **Critical** | Deposits and prepayment before building; target trigger events |
| An incumbent undercuts (Coach Manager at A$137–385) | High | High | Differentiate on UX, compliance pack and migration, not price |
| Support load destroys margin (Section 8) | High | High | Self-serve onboarding, paid setup, templates, knowledge base |
| Scope creep into a "complete TMS" | **High** | High | Strict MVP; a written "not now" list |
| Long sales cycles for a low price | Medium–High | Medium | Associations, referrals, short trials with clear success criteria |
| International player localises (Moovs, Busie) | Medium | High | Win AU compliance depth and local relationships first |
| Telematics vendors add booking modules | Medium | High | Integrate with them; consider partnering |
| Small market caps growth | **High** (structural) | High | Accept a bootstrapped path, or plan NZ/UK expansion early |
| Data breach (children, driver checks) | Low–Medium | Critical | Security basics, AU hosting, minimal data, incident plan |
| Compliance logic errors creating liability | Medium | High | Present alerts as reminders, not legal advice; terms of service; no fatigue/EWD calculation |
| Key-person dependency (solo founder) | High | High | Documentation; a co-founder with industry sales credibility |
| Seasonality (school terms, wedding season) causes churn in quiet months | Medium | Medium | Annual billing discount |

### Technical risks specifically

- Mobile driver experience with poor regional coverage (offline sync is hard).
- Data migration from varied spreadsheets and legacy tools.
- Accounting integration edge cases (GST, partial payments, credit notes).
- Calendar and allocation logic: multi-day tours, split shifts, vehicle swaps.

---

## 12. 90-Day Execution Roadmap

| Week | Focus | Deliverables | Success metric |
|---|---|---|---|
| 1–2 | Setup | Interview script, CRM of 60 prospects (Section 10.2 plus fleet-list research), BusNSW/BusVic membership enquiries, price-sensitivity questions | 60 prospects listed with phone and owner name |
| 3–6 | Problem discovery | 20 interviews (recorded with consent), pain quantified per operator, current-tools inventory, competitor mentions | 20 interviews done; top 3 pains ranked by frequency × cost |
| 5–6 | Competitive teardown | Trial or demo of Coach Manager, eCoachManager, Moovs; ask TransportMe and Busable for quotes; document gaps | Written comparison of 5 products |
| 7–8 | Solution design | Clickable prototype of quote → allocate → run sheet → invoice; pricing page with 2–3 variants | Prototype tested with 8+ operators |
| 9–10 | Monetisation test | Founding-customer offer: deposit or annual prepay | **≥5 paid commitments**, at least A$149/mo equivalent |
| 11–12 | Go/no-go | Decision memo: build MVP / pivot segment / stop. If go: MVP spec limited to Section 9.2 | Decision made on evidence, not effort already spent |
| 13 | Start MVP (if go) | Sprint 1 with 3 design partners | Design partners onboarded |

**Budget for 90 days [A]:** about A$3–8k (association memberships, travel to depots, prototype tools, the expo if timing allows). No significant development spend until week 12.

---

## 13. Final Investment Recommendation

### 13.1 Scorecard

| Category | Score /10 | Reasoning |
|---|---|---|
| Market opportunity | **4** | SAM ≈ A$6–11M ARR [A]; 618 interurban/rural businesses [S]; fine for bootstrapping, too small for VC |
| Problem severity | **5** | Real, recurring, compliance-linked; but chronic, and spreadsheets "work" |
| Product differentiation | **3** | Nothing built; the proposed scope matches what competitors already offer; differentiators are only hypotheses |
| Competitive positioning | **3** | Late entrant against cheaper Australian incumbents and well-funded international players |
| Business model | **6** | Per-fleet SaaS is sound, predictable and familiar; setup fees and payments can add revenue |
| Pricing | **5** | Starter fine; Growth and Fleet above the main competitor; extra-bus price matches telematics |
| Technical feasibility | **8** | Standard multi-tenant SaaS; the hard parts (telematics, EWD) can be postponed or integrated |
| Customer acquisition | **4** | Small, relationship-driven, low-tech audience; associations help; CAC unproven |
| Scalability | **4** | Technically easy; commercially capped in Australia; international means new competitors |
| Financial viability | **4** | Conservative case never profitable; realistic case is profitable only bootstrapped (~52 customers) |
| **Total** | **46 / 100** | Rounded to **45** to reflect zero customer evidence to date |

### 13.2 Recommendation: **VALIDATE FIRST** (narrow scope; be ready to pivot)

**Why not BUILD:** there is no evidence of willingness to pay, cheaper incumbents exist, and building the full scope risks 12–18 months of development for a market that may not switch.

**Why not STOP:** the problem is real, competitors prove that people pay, Australian compliance creates room for a locally focused product, technical risk is low, and a bootstrapped A$0.5–1M ARR business is achievable *if* validation succeeds.

**Why not PIVOT yet:** the core idea (SMB charter operations SaaS) is sound. What needs to change is **scope, segment and pricing**, which is a narrowing, not a new direction. If the 90-day validation fails, the most likely pivots are:

- (a) a compliance and accreditation audit tool sold across all bus operators, horizontally;
- (b) a booking and quote front end that integrates with existing telematics and accounting tools;
- (c) selling to brokers and marketplaces instead of operators.

### 13.3 Brutal founder review

- **Why MA Transport could fail:** it tries to build a "complete TMS" against 15+ existing products, without a reference customer, priced above the cheapest established Australian option, in a market of about 2,000 reachable businesses that change slowly.
- **Why customers might refuse to pay:** spreadsheets cost nothing; switching risks their busiest season; they already pay for telematics; and Coach Manager does the core job for A$137–385.
- **Why competitors could defeat you:** they have years of edge cases encoded, existing customers, government relationships (TransportMe), and the ability to cut prices or copy a nicer UI.
- **Does the pricing leave enough profit?** Only above about A$300 ARPA, and only with low support needs. Below that, as in the conservative case, every customer loses money once support is counted.
- **Is the market saturated?** Not saturated, but **served**. The question is not "is there room?" but "why you instead of a cheaper incumbent?". That answer does not exist yet.
- **Is the target segment too broad?** **Yes.** Charter, route, school, shuttle, SME and enterprise are six different businesses. Choose one.
- **Should you narrow the product?** **Yes, firmly.** One workflow (quote to invoice), one segment (5–30-vehicle charter operators), one region (east coast) to start.

### 13.4 The five most important next actions

1. **Run 20 operator interviews in the next 6 weeks**, using the Section 10.2 list and BusNSW/BusVic/QBIC introductions. Quantify the cost of the pain in dollars and hours.
2. **Do a hands-on teardown of Coach Manager, eCoachManager and Moovs** (trials or demos), and get quotes from TransportMe and Busable. Write down exactly what you will do better, and confirm every price in Section 7 from the vendor's own page.
3. **Re-scope to the quote → allocate → run sheet → invoice MVP**, with a written "not now" list (GPS, maintenance, ticketing, route scheduling, enterprise).
4. **Test pricing with real money:** a founding-customer offer at about A$149–399 a month with a deposit or annual prepay, and a paid setup fee. Proceed only if **5 or more of 20** commit.
5. **Get the real market count:** download the Australian Bus Fleet Lists and count operators with 5–30 vehicles by state, replacing the [A] SAM estimate. In parallel, send me the Founder Skill file so this report can be re-scored against its own rubric.

---

## Appendix A: Sources

**Government and industry**
- TfNSW: [Applying for bus operator accreditation](https://www.transport.nsw.gov.au/operations/roads-and-waterways/business-and-industry/buses/operators/applying-for-bus-operator) · [Accreditation package v1.1 (June 2025)](https://www.transport.nsw.gov.au/system/files/media/documents/2025/bus-operator-accreditation-package-v1.1-june-2025.pdf) · [BOAS audit tool (Oct 2025)](https://www.transport.nsw.gov.au/system/files/media/documents/2025/boas-audit-tool-october-2025.pdf) · [BOAS guideline update](https://www.transport.nsw.gov.au/system/files/media/documents/2025/boas-guideline-update.pdf)
- [Australian Bus Fleet Lists (TfNSW Open Data)](https://opendata.transport.nsw.gov.au/data/dataset/australian-bus-fleet-lists)
- [BITRE Road Vehicles Australia Jan 2025](https://www.bitre.gov.au/sites/default/files/documents/BITRE-Road-vehicles-Australia-January-2025--september2025--pdf.pdf) (not openable from this session) · [Statista registered buses](https://statista.com/statistics/824830/australia-number-of-registered-buses)
- [BusNSW About](https://busnsw.com.au/about-us/) · [BIC LCLF 2024 submission](https://infrastructure.gov.au/sites/default/files/documents/lclf2024-bus-industry-confederation.pdf) · [BIC FLCB 2026 submission](https://www.ntc.gov.au/system/files/webform/2026_flcb_submission/1946/BIC%20submission%20-%20FLCB%20consultation.pdf)
- [Victoria Zero Emissions Bus plan](https://www.vic.gov.au/zero-emissions-bus-trial) · [Vic Bus Safety Regulations RIS](https://www.vic.gov.au/sites/default/files/2019-11/Bus-safety-Regulations-2010-RIS.pdf)
- IBISWorld: [Interurban & Rural Bus – businesses](https://www.ibisworld.com/australia/number-of-businesses/interurban-and-rural-bus-transport/458) · [market size](https://www.ibisworld.com/australia/market-size/interurban-and-rural-bus-transport/458) · [industry](https://www.ibisworld.com/australia/industry/interurban-and-rural-bus-transport-in-australia/458/)

**Competitors**
- [Coach Manager AU pricing](https://distinctive-systems.com/au/products/coach-manager/australian-pricing/) · [Distinctive Systems VMS AU pricing](https://distinctive-systems.com/au/products/vehicle-maintenance-system/australian-pricing/)
- [eCoachManager price list](https://ecoachmanager.com/packages-price-list-nz/) · [eCoachManager AU cost article](https://ecoachmanager.com/e-coach-manager/ecoachmanager-understanding-fleet-software-costs-in-australia/)
- [TransportMe](https://www.transportme.com.au) · [ABC Bus News on TransportMe](https://www.busnews.com.au/transportme-transit-management-system-brings-unique-perspective-to-fleet-management/)
- [Busable](https://busable.app/about) · [RouteStra](https://www.capterra.com.au/software/1113395/RouteStra) · [Coach & Charter Manager](https://www.capterra.com.au/software/201842/coach-charter-manager) · [CIS-BUS Charter](https://www.capterra.com.au/software/1016965/cis-bus-charter) · [Sengerio](https://www.softwareadvice.com.au/software/166261/sengerio)
- [Moovs AU](https://www.moovsapp.com/en-au/charter-bus-software) · [Moovs pricing (Capterra)](https://www.capterra.com/p/209139/moovs/pricing/) · [Busify](https://www.busify.com/) · [Busie](https://www.getbusie.com/) · [CoachRail (ITQlick)](https://www.itqlick.com/coachrail/pricing)
- [BusMinder](https://apps.apple.com/app/id1364797036) · [RollCall](https://rollcall.com.au/bus-companies)
- [Trapeze AU](https://trapezegroup.com.au/bus/planning-scheduling/) · [Optibus / Buslines](https://blog.optibus.com/buslines-brings-optibus-to-new-south-wales-australia-to-improve-public-transportation) · [GIRO / TransLink](https://www.metro-magazine.com/news/australias-translink-taps-giro-program-to-improve-service)
- [Teletrac Navman review (ExpertMarket AU)](https://www.expertmarket.com/au/vehicle-tracking/teletrac-navman-review) · [EROAD pricing](https://eroad.com/?p=84) · [Fleetio pricing](https://fleetio.com/pricing) · [Samsara pricing (tech.co)](https://tech.co/fleet-management/samsara-fleet-management-review)
- [BusCharter.com.au launch (AAP)](https://www.aap.com.au/aapreleases/globenewswire9727742/)

**Operators**
- [Kinetic](https://wearekinetic.com/) · [Kinetic Melbourne](https://en.wikipedia.org/wiki/Kinetic_Melbourne) · [Kinetic Townsville](https://en.wikipedia.org/wiki/Kinetic_Townsville) · [CDC Melbourne](https://en.wikipedia.org/wiki/CDC_Melbourne) · [CDC Ballarat](https://en.wikipedia.org/wiki/CDC_Ballarat) · [Transdev John Holland](https://en.wikipedia.org/wiki/Transdev_John_Holland) · [Transdev Melbourne](https://en.wikipedia.org/wiki/Transdev_Melbourne) · [Dysons](https://dysongroup.com.au/node/25)
- [Kangaroo Bus Lines case (Telstra Purple)](https://purple.telstra.com.au/case-studies/delivering-a-superior-transport-experience-for-queensland)
- Prospect links: see the table in Section 10.2.

**Benchmarks and regulation**
- [Tidemark 2025 Vertical SMB SaaS benchmarks](https://www.tidemarkcap.com/post/2025-vertical-smb-saas-benchmark-report) · [Kyle Poyar 2025 SaaS benchmarks](https://kylepoyar.substack.com/p/2025-saas-benchmarks-report) · [Stripe Vertical SaaS benchmark](https://stripe.com/nz/lp/vertical-saas-benchmark-2025)
- [SmartCompany: Privacy Act small business exemption](https://www.smartcompany.com.au/business-advice/privacy-act-small-business-exemption-government-report/) · [IAPP](https://www.iapp.org/news/a/amending-australias-privacy-act-small-businesses-bigger-responsibilities)

## Appendix B: Label legend

**[V]** vendor or regulator primary page (seen through a search snippet) · **[V-vendor]** a claim the vendor makes about itself, not independently verified · **[S]** secondary or aggregator source · **[A]** assumption or estimate · **NPD** not publicly disclosed.

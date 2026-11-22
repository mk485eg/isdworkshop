# CFO note (read this first)

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

# Unit economics: MA Transport (fleet-based SaaS for Australian bus/coach operators)

Every number below comes from the input file. Nothing is looked up or guessed.

## One customer-month

| line | per customer-month |
| --- | ---: |
| Price | $262.00 |
| Support time per customer (1 support FTE at ~A$9,100/mo loaded handles ~60 customers) [estimate] | -$152.00 |
| Hosting per customer: AU-region compute, storage, backups, email/SMS [estimate] | -$9.00 |
| Card/payment processing ~2% of the subscription [estimate] | -$8.00 |
| Migration done for the operator (~8h x A$60) spread over a 24-month life [estimate] | -$20.00 |
| 60-day refund guarantee: 20% of operators refunded 2 months, spread over 24 months [estimate] | -$7.00 |
| **Contribution** (what each customer-month leaves to pay the fixed costs) | **$66.00** (25%) |

## The margin that matters

Fixed costs: $9,300 a month (Contract developer, 0.5 FTE (founder unpaid) [estimate] $6,500, Base cloud platform, monitoring, backups [estimate] $450, SaaS tools: CRM, email, helpdesk, accounting [estimate] $400, Insurance: professional indemnity + cyber [estimate, get a quote] $250, Bookkeeping/accountant [estimate] $200, Customer acquisition: association memberships, depot visits, events [estimate] $1,500).

- **Break-even: 141 customer-months a day.** Below that you lose money every month.
- **Profit margin at your plan** (14 a day): **-228%** of every sale, after every cost.
- Capacity: 2000 a day.

## Year 1, month by month

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

## What if

| scenario | margin at plan | break-even a day | year 1 profit |
| --- | ---: | ---: | ---: |
| Base plan | -228% | 141 | -$107,442 |
| Price -10% | -265% | 234 | -$109,093 |
| Volume -20% | -292% | 141 | -$108,274 |
| Unit costs +15% | -240% | 255 | -$109,294 |

## Red flags

- Year 1 loses money on operations (-$107,442).
- The startup spend is not earned back within year 1.

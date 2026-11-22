# CFO sources: MA Transport

None of the inputs are quotes or invoices; there are no customers or suppliers yet. Each one is an **estimate**, with its reasoning.

| Input | Value | Source / reasoning |
|---|---|---|
| Price A$262 | founding year 1 | Blended list price A$374 (pricing.md tiers A$179/379/599, weighted by the panel segment mix 30/45/25%) × 0.7 founding discount |
| Support A$152/customer-month | estimate | One support person at ~A$95k + 15% on-costs ≈ A$9,100/month, handling ~60 customers. Non-technical operators running live dispatch need a lot of support. **Biggest uncertainty.** |
| Hosting A$9/customer-month + A$450/month base | estimate | Small multi-tenant web app in an AU cloud region, with backups, email and SMS. AWS/Azure Sydney prices were **not verified** in this session (no web access to the vendor price pages) |
| Card fees 2% | estimate | Typical AU card processing rates; confirm against the chosen gateway's published fees |
| Migration A$20/customer-month | estimate | ~8 hours × A$60/hour, spread over a 24-month customer life (offer.md) |
| Refund A$7/customer-month | estimate | 20% of operators refunded 2 months, spread over 24 months (offer.md) |
| Contract developer A$6,500/month | estimate | 0.5 FTE contractor; founder unpaid |
| Tools A$400, insurance A$250, accountant A$200, acquisition A$1,500 per month | estimates | Get quotes: professional indemnity + cyber insurance especially |
| Startup A$73,000 | estimate | MVP about 6 months × A$10k contract dev; legal A$5k; brand/website A$3k; launch/travel A$5k |
| Ramp 0→14 customers in 12 months | estimate | Sanity check: the re-tested panel bought at 10%, which is an upper bound because simulated buyers lean agreeable. At a real conversion of ~5% of operators spoken to, 14 customers means ~280 conversations in 9 selling months |
| Capacity 2,000 | estimate | Upper end of the serviceable market estimate (independent operators with 3–30 vehicles), not a verified count |

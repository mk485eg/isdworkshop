# MA Transport API

Multi-tenant backend API for the MA Transport MVP: one Node.js/Express service exposing the endpoints needed to prove the core workflow —

**Company → Driver → Vehicle → Job → Assign → Accept → Start → Complete**

## Stack

- Node.js + Express + TypeScript
- PostgreSQL + Prisma (schema, migrations, client)
- JWT auth, `bcryptjs` password hashing
- `zod` request validation
- Jest + Supertest integration tests

## Multi-tenancy

Every company's data (`users`, `drivers`, `vehicles`, `jobs`, `notifications`) is scoped by `companyId`. The JWT issued at login/register embeds `companyId`, and every query in every module is filtered by the authenticated user's `companyId` — one company can never read or modify another company's records (see `tests/workflow.test.ts` for isolation tests).

## Getting started

```bash
cp .env.example .env      # set DATABASE_URL / JWT_SECRET
npm install
npm run prisma:migrate    # create schema in your dev database
npm run seed              # optional: sample company/driver/vehicle/job
npm run dev                # start on http://localhost:3000
```

Health check: `GET /health`

### Tests

Tests run against a separate database (`.env.test`), because they exercise real Postgres transactions and constraints (multi-tenant uniqueness, status transitions, etc.):

```bash
createdb ma_transport_test   # once, if it doesn't exist
npm test
```

## API overview

All endpoints below (except register/login) require `Authorization: Bearer <token>` and only ever operate on the caller's own company.

| Module | Endpoints | Count |
|---|---|---|
| Auth | register, login, current user | 3 |
| Company | view, update | 2 |
| Drivers | list, get, create, update, activate, deactivate | 6 |
| Vehicles | list, get, create, update, activate, deactivate | 6 |
| Jobs | list, get, create, update, delete, assign | 6 |
| Job workflow | accept, start, complete, fail, cancel | 5 |
| Dashboard | stats | 1 |
| Reports | daily | 1 |
| Notifications | list, mark read, mark all read | 3 |
| **Total** | | **33** |

### Auth — `/api/auth`

| Method | Path | Description |
|---|---|---|
| POST | `/register` | Create a company + its first admin user, returns a JWT |
| POST | `/login` | Authenticate, returns a JWT |
| GET | `/me` | Current authenticated user + company |

### Company — `/api/company`

| Method | Path | Description |
|---|---|---|
| GET | `/` | View the caller's company |
| PATCH | `/` | Update name/phone/address |

### Drivers — `/api/drivers`

| Method | Path | Description |
|---|---|---|
| GET | `/` | List drivers |
| GET | `/:id` | Get a driver |
| POST | `/` | Create a driver |
| PATCH | `/:id` | Update a driver |
| POST | `/:id/activate` | Mark driver ACTIVE |
| POST | `/:id/deactivate` | Mark driver INACTIVE |

### Vehicles — `/api/vehicles`

Same shape as Drivers (list, get, create, update, activate, deactivate).

### Jobs — `/api/jobs`

| Method | Path | Description |
|---|---|---|
| GET | `/` | List jobs (optional `?status=`) |
| GET | `/:id` | Get a job |
| POST | `/` | Create a job (status `PENDING`) |
| PATCH | `/:id` | Update a job (only while `PENDING`/`ASSIGNED`) |
| DELETE | `/:id` | Delete a job (only while `PENDING`/`CANCELLED`) |
| POST | `/:id/assign` | Assign an active driver + vehicle → `ASSIGNED` |
| POST | `/:id/accept` | `ASSIGNED` → `ACCEPTED` |
| POST | `/:id/start` | `ACCEPTED` → `IN_PROGRESS` |
| POST | `/:id/complete` | `IN_PROGRESS` → `COMPLETED` |
| POST | `/:id/fail` | `IN_PROGRESS` → `FAILED` (optional `reason`) |
| POST | `/:id/cancel` | Any non-terminal status → `CANCELLED` (optional `reason`) |

Every workflow transition creates a notification and is only valid from the expected prior status (invalid transitions return `409 Conflict`).

### Dashboard — `/api/dashboard`

| Method | Path | Description |
|---|---|---|
| GET | `/stats` | Driver/vehicle/job counts, jobs scheduled today, unread notifications |

### Reports — `/api/reports`

| Method | Path | Description |
|---|---|---|
| GET | `/daily?date=YYYY-MM-DD` | Jobs scheduled on a given day (defaults to today) with a status summary |

### Notifications — `/api/notifications`

| Method | Path | Description |
|---|---|---|
| GET | `/?unread=true` | List notifications |
| PATCH | `/:id/read` | Mark one notification read |
| PATCH | `/read-all` | Mark all notifications read |

## Deliberately out of scope for this MVP

Passenger system, payments, GPS tracking, Google Maps, SMS, AI, accounting, route optimisation — these are future integrations layered on top of this API, not requirements for the first milestone.

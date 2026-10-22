# TCSG Coaches — Milestone 1

Local Laravel 12 app for The Career Strategy Group coach directory. Imports a
published Google Sheet (fed by a Jotform submission), shows approved coaches
on a public directory and profile pages, and provides a read-only admin
dashboard.

Out of scope for this milestone: Stripe, Calendly, Acuity, quiz matching,
booking.

## Client-confirmed decisions (Laura Labovich, 2026-10-21)

- **Price:** coach rate $350 → client sees **$450** (marketplace fee +$100). ✓
- **Approvals:** `Status` column on the sheet; `Pending` by default, only
  `Active` rows appear publicly. ✓
- **Scheduling:** both Calendly and Acuity to be supported in a future
  milestone (data model already status-filtered — the booking button on the
  profile currently links to `#`).

## Requirements

- PHP ≥ 8.2
- Composer
- SQLite (default — nothing to install, uses `database/database.sqlite`)

## Local run

```bash
composer create-project laravel/laravel tcsg-coaches "^12.0"
# or, if you cloned this repo:
composer install
```

1. Copy `.env.example` to `.env` and set:

   ```
   DB_CONNECTION=sqlite
   GOOGLE_SHEET_CSV_URL=<the published CSV link to the "Form responses 3" tab>
   ```

   In Google Sheets: `File → Share → Publish to web → Entire document → CSV`.
   Use the URL for the `Form responses 3` tab.

2. Create the database and run migrations:

   ```bash
   touch database/database.sqlite
   php artisan migrate
   ```

3. Pull the sheet into the DB:

   ```bash
   php artisan coaches:sync
   ```

   Prints `read / created / updated / skipped` counts.

4. Serve:

   ```bash
   php artisan serve
   ```

   Open http://127.0.0.1:8000/coaches

## Pages

### Public
- `GET /` → full marketing home page (hero, trust band, manifesto, coach
  grid, how-it-works, pricing, press, FAQ, final CTA). The coach grid pulls
  from the DB and only shows `Status = active` coaches.
- `GET /coaches` → directory-only listing of all active coaches.
- `GET /coaches/{slug}` → profile; 404 for non-active coaches.

### Admin (read-only, sheet-wins)
- `GET /admin/login` → login form.
- `GET /admin` → dashboard listing all coaches regardless of status with
  counts, status badges, and a link to each coach's detail page.
- `GET /admin/coaches/{coach}` → full internal view of one coach (bio,
  tags, certifications, and the private links). Status changes still happen
  in the Google Sheet; `coaches:sync` is the source of truth.

#### Admin credentials
Single hardcoded admin in `.env`:
```
ADMIN_EMAIL=admin@tcsg.local
ADMIN_PASSWORD_HASH="<bcrypt hash>"
```
Generate the hash with:
```bash
php -r "echo password_hash('your-password', PASSWORD_BCRYPT), PHP_EOL;"
```
Dev default: `admin@tcsg.local` / `tcsg-admin-2026`.

## Sync schedule

`routes/console.php` registers `coaches:sync` to run hourly. To actually
dispatch it, run Laravel's scheduler:

```bash
php artisan schedule:work
```

Or wire it to cron:

```
* * * * * cd /path/to/tcsg-coaches && php artisan schedule:run >> /dev/null 2>&1
```

## Parsing rules (summary)

- **Bio:** blank lines separate paragraphs; each paragraph becomes a `<p>`.
- **Certifications:** split on newlines OR commas; shown comma-separated at the bottom of the profile.
- **Client levels / topics / specializations:** split on newlines; shown as red tag boxes.
- **Coaching style:** case-insensitive keyword match:
  - `action` → fast-track ("Fast Track")
  - `compassion` → heart-first ("Heart-First")
  - `research` or `data` → game-plan ("Game Plan")
  - `structure` → deep-dive ("Deep Dive")
  - no match → `null` + warning in `storage/logs/laravel.log`
- **Rate:** strips `$` and commas, cast to integer. Client price shown on
  the profile = rate + 100 marketplace fee.
- **Slug:** `first-last`, lowercased, hyphenated. If already taken, the
  submission ID is appended.

## Fields never rendered

Email, phone, IP, years of experience, client count, media/publications,
client-example answers, Jotform edit URLs, submission URLs, upload URLs,
last update timestamps. Covered by a regression test
(`CoachSyncTest::test_hidden_fields_do_not_appear_on_any_public_page`).

## Tests

```bash
php artisan test
```

Uses in-memory SQLite. Fixture: `tests/fixtures/coaches.csv` (one Active
row, one Pending row).

## Design

The original design lives in `resources/design/index.html` (unmodified
reference). The CSS from it was extracted into
`resources/views/layouts/app.blade.php`, and the home page sections were
ported to `resources/views/home.blade.php` with the coach grid now
dynamic (Blade `@foreach`). The modal/quiz JS was removed since quiz
matching is out of scope for Milestone 1.

Admin panel uses its own small, self-contained CSS in
`resources/views/admin/layout.blade.php`.

# Graph Report - tcsg-coaches  (2026-10-22)

## Corpus Check
- Corpus is ~12,057 words - fits in a single context window. You may not need a graph.

## Summary
- 249 nodes · 282 edges · 30 communities (15 shown, 3 thin omitted)
- Extraction: 97% EXTRACTED · 3% INFERRED · 0% AMBIGUOUS · INFERRED: 9 edges (avg confidence: 0.84)
- Token cost: 19,629 input · 3,464 output

## Community Hubs (Navigation)
- Composer Autoload Config
- Composer Lifecycle Scripts
- Parsing Rules & Tests
- Coach Model
- Frontend Build (Vite/NPM)
- User & Auth
- Sync Command & Importer
- Default Framework Migrations
- Coach Controllers
- Shared Facades & Config
- Composer Plugin Config
- App Service Provider
- App Bootstrap
- Feature Test Base
- Logging Config
- Console Routes & Schedule
- Unit Test Base
- Blade Layout & Design

## God Nodes (most connected - your core abstractions)
1. `Coach` - 23 edges
2. `CoachSheetImporter` - 13 edges
3. `CoachSyncTest` - 13 edges
4. `coaches:sync Artisan command` - 11 edges
5. `User` - 9 edges
6. `scripts` - 9 edges
7. `require-dev` - 8 edges
8. `setup` - 7 edges
9. `TestCase` - 6 edges
10. `CoachController` - 5 edges

## Surprising Connections (you probably didn't know these)
- `robots.txt allow-all policy` --conceptually_related_to--> `GET /coaches directory`  [INFERRED]
  public/robots.txt → README.md
- `CoachController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/CoachController.php → app/Http/Controllers/Controller.php
- `CoachSyncTest` --inherits--> `TestCase`  [EXTRACTED]
  tests/Feature/CoachSyncTest.php → tests/TestCase.php
- `ExampleTest` --inherits--> `TestCase`  [EXTRACTED]
  tests/Feature/ExampleTest.php → tests/TestCase.php

## Import Cycles
- None detected.

## Hyperedges (group relationships)
- **Jotform to public directory pipeline** — readme_jotform_submission, readme_google_sheet_source, readme_coaches_sync_command, readme_sqlite_database, readme_route_coaches_index [EXTRACTED 1.00]
- **Scheduled sync flow** — readme_routes_console_php, readme_schedule_work, readme_cron_wiring, readme_coaches_sync_command [EXTRACTED 1.00]
- **CSV field parsing rules** — readme_bio_parsing, readme_certifications_parsing, readme_client_levels_topics_parsing, readme_coaching_style_mapping, readme_rate_parsing, readme_slug_rule [EXTRACTED 1.00]

## Communities (30 total, 3 thin omitted)

### Community 0 - "Composer Autoload Config"
Cohesion: 0.06
Nodes (34): autoload, autoload-dev, psr-4, psr-4, description, extra, laravel, keywords (+26 more)

### Community 1 - "Composer Lifecycle Scripts"
Cohesion: 0.08
Nodes (26): scripts, dev, post-autoload-dump, post-create-project-cmd, post-root-package-install, post-update-cmd, pre-package-uninstall, setup (+18 more)

### Community 2 - "Parsing Rules & Tests"
Cohesion: 0.09
Nodes (25): robots.txt allow-all policy, Active status visibility filter, Bio parsing (paragraphs), Certifications parsing, Client levels/topics/specializations parsing, CoachSyncTest regression test, tests/fixtures/coaches.csv, coaches:sync Artisan command (+17 more)

### Community 3 - "Coach Model"
Cohesion: 0.16
Nodes (5): Coach, Illuminate\Database\Eloquent\Builder, Illuminate\Database\Eloquent\Model, Illuminate\Foundation\Testing\RefreshDatabase, CoachSyncTest

### Community 4 - "Frontend Build (Vite/NPM)"
Cohesion: 0.10
Nodes (19): axios, concurrently, laravel-vite-plugin, devDependencies, axios, concurrently, laravel-vite-plugin, tailwindcss (+11 more)

### Community 5 - "User & Auth"
Cohesion: 0.15
Nodes (11): User, UserFactory, DatabaseSeeder, Illuminate\Database\Console\Seeds\WithoutModelEvents, Illuminate\Database\Eloquent\Factories\Factory, Illuminate\Database\Eloquent\Factories\HasFactory, Illuminate\Database\Seeder, Illuminate\Foundation\Auth\User (+3 more)

### Community 6 - "Sync Command & Importer"
Cohesion: 0.22
Nodes (4): SyncCoaches, CoachSheetImporter, Illuminate\Console\Command, Illuminate\Support\Facades\Http

### Community 7 - "Default Framework Migrations"
Cohesion: 0.19
Nodes (3): Illuminate\Database\Migrations\Migration, Illuminate\Database\Schema\Blueprint, Illuminate\Support\Facades\Schema

### Community 8 - "Coach Controllers"
Cohesion: 0.24
Nodes (5): CoachController, Controller, Illuminate\Support\Facades\Route, Illuminate\View\View, Symfony\Component\HttpKernel\Exception\NotFoundHttpException

### Community 9 - "Shared Facades & Config"
Cohesion: 0.25
Nodes (4): Illuminate\Support\Facades\Log, Illuminate\Support\Str, League\Csv\Reader, Pdo\Mysql

### Community 10 - "Composer Plugin Config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 12 - "App Bootstrap"
Cohesion: 0.33
Nodes (4): Illuminate\Foundation\Application, Illuminate\Foundation\Configuration\Exceptions, Illuminate\Foundation\Configuration\Middleware, Illuminate\Http\Request

### Community 13 - "Feature Test Base"
Cohesion: 0.40
Nodes (3): Illuminate\Foundation\Testing\TestCase, ExampleTest, TestCase

### Community 14 - "Logging Config"
Cohesion: 0.40
Nodes (4): Monolog\Handler\NullHandler, Monolog\Handler\StreamHandler, Monolog\Handler\SyslogUdpHandler, Monolog\Processor\PsrLogMessageProcessor

### Community 15 - "Console Routes & Schedule"
Cohesion: 0.50
Nodes (3): Illuminate\Foundation\Inspiring, Illuminate\Support\Facades\Artisan, Illuminate\Support\Facades\Schedule

## Knowledge Gaps
- **66 isolated node(s):** `$schema`, `name`, `type`, `description`, `laravel` (+61 more)
  These have ≤1 connection - possible missing edges or undocumented components. (Counts symbols only; 129 node(s) total have ≤1 connection when file, concept and rationale nodes are included.)
- **3 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Coach` connect `Coach Model` to `Coach Controllers`, `Shared Facades & Config`, `Sync Command & Importer`?**
  _High betweenness centrality (0.060) - this node is a cross-community bridge._
- **Why does `scripts` connect `Composer Lifecycle Scripts` to `Composer Autoload Config`?**
  _High betweenness centrality (0.043) - this node is a cross-community bridge._
- **Why does `CoachSheetImporter` connect `Sync Command & Importer` to `Shared Facades & Config`, `Coach Model`?**
  _High betweenness centrality (0.029) - this node is a cross-community bridge._
- **Are the 7 inferred relationships involving `coaches:sync Artisan command` (e.g. with `CoachSyncTest regression test` and `Bio parsing (paragraphs)`) actually correct?**
  _`coaches:sync Artisan command` has 7 INFERRED edges - model-reasoned connections that need verification._
- **What connects `$schema`, `name`, `type` to the rest of the system?**
  _66 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `Composer Autoload Config` be split into smaller, more focused modules?**
  _Cohesion score 0.05714285714285714 - nodes in this community are weakly interconnected._
- **Should `Composer Lifecycle Scripts` be split into smaller, more focused modules?**
  _Cohesion score 0.08 - nodes in this community are weakly interconnected._
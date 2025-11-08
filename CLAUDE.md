# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 12 API project named "neuro-educa" using PHP 8.2+, PostgreSQL as the default database, and Vite for asset building. The project uses database-based sessions, cache, and queue connections.

## Development Commands

### Setup
```bash
composer setup
```
Runs full setup: installs dependencies, creates .env, generates app key, runs migrations, installs npm packages, and builds assets.

### Development Server
```bash
composer dev
```
Starts concurrent processes:
- Laravel development server (port 8000)
- Queue worker (with 1 retry)
- Log viewer (Pail)
- Vite dev server for hot module replacement

Individual components:
```bash
php artisan serve           # Development server only
php artisan queue:listen    # Queue worker only
php artisan pail           # Log viewer only
npm run dev                # Vite dev server only
```

### Testing
```bash
composer test              # Run all tests
php artisan test           # Alternative way to run tests
php artisan test --filter=TestName  # Run specific test
```

### Code Quality
```bash
./vendor/bin/pint          # Laravel Pint - code style fixer
```

### Database
```bash
php artisan migrate                    # Run migrations
php artisan migrate:fresh --seed       # Fresh migration with seeding
php artisan db:seed                    # Run seeders
php artisan tinker                     # Interactive REPL
```

### Build
```bash
npm run build              # Production build with Vite
```

## Architecture

### Layered Architecture Pattern
The project follows a strict layered architecture with dependency injection:

**Controller → Service → Repository**

- **Controllers** (`app/Http/Controllers/`): Handle HTTP requests and inject Services via constructor
- **Services** (`app/Services/`): Contain business logic and inject Repositories via constructor
- **Repositories** (`app/Repositories/`): Handle data access and database operations
- **Models** (`app/Models/`): Eloquent models representing database tables

All layers use constructor dependency injection with readonly properties:
```php
public function __construct(private readonly ServiceName $serviceName) {}
```

### Domain Entities
The application manages educational/pedagogical entities including:
- Secretarias (Secretariats), Escolas (Schools), Educadores (Educators)
- Alunos (Students), Responsaveis (Guardians)
- Diagnosticos (Diagnostics), EntrevistaFamiliar (Family Interview)
- Habilidades (Skills), InventarioHabilidades (Skills Inventory)
- Planejamento (Planning), PlanoTrimestral (Quarterly Plan)
- OrientacaoPedagogica (Pedagogical Guidance), RegistroPedagogico (Pedagogical Record)
- Metas (Goals), Anexos (Attachments)

Each entity has its own Controller, Service, and Repository.

### Database Configuration
- Default connection: PostgreSQL
- Database name: `api`
- Alternative: Can use SQLite for local development
- Queue, cache, and sessions are database-backed

### Queue System
The project uses database queues. Jobs are processed by `php artisan queue:listen` which is included in the `composer dev` command. Queue configuration is in `config/queue.php`.

### Autoloading
- `App\` → `app/`
- `Database\Factories\` → `database/factories/`
- `Database\Seeders\` → `database/seeders/`
- `Tests\` → `tests/`

### Frontend Integration
Uses Vite with Laravel plugin and Tailwind CSS v4. Frontend assets are in the standard Laravel structure with Vite configuration in `vite.config.js`.

### Testing Structure
- Feature tests: `tests/Feature/`
- Unit tests: `tests/Unit/`
- Base test case: `tests/TestCase.php`
- Uses PHPUnit 11.5+

## Key Files
- `composer.json`: Contains custom scripts for setup, dev, and test workflows
- `.env.example`: Template with PostgreSQL defaults
- `phpunit.xml`: PHPUnit configuration
- `vite.config.js`: Asset bundling configuration

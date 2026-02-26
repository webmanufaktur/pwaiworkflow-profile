# PW AI Workflow

A ProcessWire testing environment for AI coding tools. This demo site provides a ready-to-use setup for developing and testing AI-powered ProcessWire workflows.

## Quick Start

### 1. Clone the Repository

```bash
git clone https://github.com/webmanufaktur/pwaiworkflow-profile.git
cd pwaiworkflow-profile
```

### 2. Start DDEV

```bash
ddev start
```

### 3. Import the Database

```bash
ddev import-db --file=site/assets/backups/database/clean-start.sql
```

### 4. Access the Site

- **URL**: https://pwaiworkflow--pw.ddev.site/
- **Admin**: https://pwaiworkflow--pw.ddev.site/processwire/

### 5. Login

| Field    | Value               |
| -------- | ------------------- |
| Username | `admin`             |
| Password | `adminadmin`        |
| Email    | `admin@example.com` |

## What's Included

### 3rd Party Modules

- AutoTemplateStubs
- RockDevTools
- RockMigrations
- CronjobDatabaseBackup
- ProcessDatabaseBackup
- AutocompleteModuleClassName

### Core Modules (enabled)

- Select Options, Repeater, Page Auto Complete
- Lazy Cron, Page Path History, Page Clone
- Markdown/Parsedown Extra

### Agent Skills

Project includes `.agents/skills/` with ProcessWire-specific guidance for AI tools like opencode, Cursor, and GitHub Copilot.

## For AI Agents

See `AGENTS.md` or `AGENTS.toon` for technical details including:

- Code style guidelines
- DDEV commands
- Available skills

## License

MIT

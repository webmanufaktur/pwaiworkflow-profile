# AGENTS.md - ProcessWire AI Workflow Development Guide

## Overview

ProcessWire CMS project with DDEV. Codebase: modules in `site/modules/`, templates in `site/templates/`, page classes in `site/classes/`.

## Project Structure

```
/pwaiworkflow--pw/
├── .ddev/              # DDEV config
├── site/
│   ├── assets/         # Uploaded files, cache
│   ├── classes/       # Page classes ($config->usePageClasses)
│   ├── config.php     # Site config
│   ├── modules/       # Custom modules (AutoTemplateStubs, RockDevTools, RockMigrations)
│   └── templates/     # Template files
├── wire/              # ProcessWire 3.0.256
├── composer.json
└── index.php
```

## Development Environment

- **DDEV**: `ddev` command
- **PHP**: 8.4, **Database**: MariaDB 11.8, **Webserver**: Apache-FPM
- **Debug**: `$config->debug = true` in `site/config.php`

### Common DDEV Commands

```bash
ddev start          # Start environment
ddev stop           # Stop environment
ddev logs           # View logs
ddev ssh            # SSH into container
ddev php -l file.php
ddev import-db --file=dump.sql
ddev export-db --file=dump.sql
```

## Build/Lint/Test Commands

No PHPUnit. For quality checks:

```bash
php -l site/modules/Module/Module.module.php      # Single file
find site -name "*.php" -exec php -l {} \;         # Recursive
ddev php -l site/config.php                        # Via DDEV
php -v                                             # PHP version
ddev composer install                              # Via DDEV only
ddev composer update
```

## Code Style Guidelines

### General

- Follow [ProcessWire Coding Style Guide](https://processwire.com/api/coding-style-guide/)
- PHP 8.4 features: typed properties, named arguments, attributes
- `declare(strict_types=1);` at top of PHP files

### Naming

- **Classes**: PascalCase (`RockDevTools`)
- **Methods/Properties**: camelCase (`getModuleConfigInputfields`, `$debugAssetTools`)
- **Constants**: UPPER_SNAKE_CASE
- **Files**: Match class name (`RockDevTools.module.php`)
- **Hooks**: Prefix with event type (`HookAfter`, `HookBefore`)

### Imports

```php
namespace ProcessWire;
use RockDevTools\Assets;
use RockDevTools\LiveReload;
```

Use `wire()` or `$this->wire()` for ProcessWire API.

### Formatting

- 2 spaces indentation
- Brace on same line for classes/functions
- Max 120 chars/line
- Single quotes unless interpolating
- Concatenation: `'string ' . $var . ' more'`

### Types

```php
public string $name = '';
public ?string $description = null;
public int $count = 0;
public string|int $value;
public function init(): void
```

### Error Handling

- try/catch for exceptions
- `$this->error()` for user errors
- `$this->log()` for logging
- Early returns, null coalescing: `$input ?? $default`

### ProcessWire Patterns

- **Modules**: Extend `WireData` or `Module`, implement `ConfigurableModule`
- **Page Classes**: Create in `site/classes/` matching template names
- **Hooks**: `$this->addHookAfter()` / `$this->addHookBefore()`
- **API Vars**: `$pages`, `$templates`, `$fields`, `$users`

### Documentation

Docblocks with `@param`, `@return`, `@var`. Include `@author` and `@license`.

```php
/**
 * My custom module.
 *
 * @author Your Name, 2025
 * @license MIT
 */
```

### Common Patterns

```php
// Module constructor
public function __construct() {
  if (!wire()->config->yourModule) return;
}

// Init method
public function init() {
  wire()->addHookAfter('Page::render', $this, 'myHook');
}

// Config inputfields
public function getModuleConfigInputfields(InputfieldWrapper $inputfields) {
  $inputfields->add([
    'type' => 'checkbox',
    'name' => 'my_setting',
    'label' => 'My Setting',
    'value' => 1,
  ]);
  return $inputfields;
}
```

## Installed Modules

### 3rd Party
- AutocompleteModuleClassName, AutoTemplateStubs, CronjobDatabaseBackup, ProcessDatabaseBackup, RockDevTools, RockMigrations

### Core (enabled)
- Select Options, Repeater, Page Auto Complete, Lazy Cron, Page Path History, Page Clone, Markdown/Parsedown Extra

### Core Tweaks
- Page Name: ä→ae, ö→oe, ü→ue

## Agent Skills

### Local vs Global
- **Local**: `.agents/skills/` - Project-specific
- **Global**: `~/.agents/skills/` - Cross-project

Used by **opencode**, **Cursor**, **GitHub Copilot**.

### ProcessWire Skills (Local)

| Skill | Description | File |
|-------|-------------|------|
| processwire/api | Core API variables, functions | .agents/skills/processwire/api/SKILL.md |
| processwire/fields | Field creation/config | .agents/skills/processwire/fields/SKILL.md |
| processwire/field-configuration | Complex field settings | .agents/skills/processwire/field-configuration/SKILL.md |
| processwire/modules | Module development | .agents/skills/processwire/modules/SKILL.md |
| processwire/advanced-modules | Advanced patterns | .agents/skills/processwire/advanced-modules/SKILL.md |
| processwire/hooks | Hook system | .agents/skills/processwire/hooks/SKILL.md |
| processwire/templates | Template files | .agents/skills/processwire/templates/SKILL.md |
| processwire/custom-page-classes | Page classes | .agents/skills/processwire/custom-page-classes/SKILL.md |
| processwire/selectors | Selectors | .agents/skills/processwire/selectors/SKILL.md |
| processwire/user-access | User/permissions | .agents/skills/processwire/user-access/SKILL.md |
| processwire/security | Security best practices | .agents/skills/processwire/security/SKILL.md |
| processwire/multi-language | i18n | .agents/skills/processwire/multi-language/SKILL.md |
| processwire/rockmigrations | RockMigrations | .agents/skills/processwire/rockmigrations/SKILL.md |
| processwire/getting-started | Onboarding | .agents/skills/processwire/getting-started/SKILL.md |
| processwire/best-practices | Best practices | .agents/skills/processwire/best-practices/SKILL.md |

### General Skills (Local)

| Skill | Description |
|-------|-------------|
| git/commit-generator | Intelligent commits |
| markdown/alerts | Alert markdown |
| general/prompt-rephraser | Prompt improvement |
| general/prompt-optimizer | Optimize prompts |

### Global Skills

In `~/.agents/skills/`: php-pro, htmx, tailwindcss-advanced-layouts, twig-guide, git-commit

### Skill Usage

AI: `skill name="processwire/api"` | Humans: Read `.agents/skills/*/SKILL.md`

### Compatibility
- **opencode**: All skills
- **Cursor**: Local skills
- **Copilot**: Reference in `.github/copilot-instructions.md`

## Resources

- [ProcessWire Docs](https://processwire.com/docs/)
- [Coding Style](https://processwire.com/api/coding-style-guide/)
- [API Reference](https://processwire.com/api/wire-methods/)
- [RockMigrations](https://github.com/baumrock/RockMigrations)
- [RockDevTools](https://github.com/baumrock/RockDevTools)

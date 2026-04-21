# Sage Scaffold CLI

> This is an unofficial community tool. It is not affiliated with or endorsed by the Roots team.

A zero-dependency CLI scaffolding tool for [Roots/Sage](https://roots.io/sage/) projects to automate block generation and improve Developer Experience.

## About

The `generate.php` script takes a block name from the user and automatically generates the corresponding **View Composer** (using PascalCase naming convention) and **Blade template** (using kebab-case). It ensures naming consistency across the project and eliminates repetitive boilerplate coding.

## Requirements

- PHP 8.0+

## Usage

You can pass the block name as an argument. The script handles spaces, dashes, and underscores to properly format class names and file paths.

```bash
php generate.php "hero section"
# or
php generate.php hero-section
```

Based on the command above, the tool will automatically create:

1. `app/View/Composers/HeroSection.php` (based on `stubs/composer.stub`)
2. `resources/views/sections/hero-section.blade.php` (based on `stubs/blade.stub`)

## Structure

```
├── BlockGenerator.php    # Core logic handling string manipulation and file generation
├── generate.php          # CLI entry point
├── readme.md             # Documentation
└── stubs/
    ├── blade.stub        # Template for Blade views (uses {{ KEBAB_NAME }})
    └── composer.stub     # Template for Composers (uses {{ PASCAL_NAME }})
```

## Roadmap

- [ ] Add support for generating Advanced Custom Fields (ACF) files using `log1x/acf-composer`.
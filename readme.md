# Sage Scaffold CLI

> This is an unofficial community tool. It is not affiliated with or endorsed by the Roots team.

Proof of concept for a CLI scaffolding tool for [Roots/Sage](https://roots.io/sage/) projects.

## About

`generate.php` is the initial version of the tool — it takes a name from the user, loads a template (`template.stub`), replaces the placeholder with the given name and saves the result to `output.txt`.

The target tool (`sage-cli`) will automatically generate View Composers and Blade templates based on the provided block name.

## Requirements

- PHP 8.0+
- Composer

## Installation

```bash
composer install
```

## Usage

```bash
php generate.php SectionName
```

The result will be saved to `output.txt`.

## Structure

```
├── generate.php       # main file
├── template.stub      # example template with {{ NAME }} placeholder
├── composer.json
└── README.md
```
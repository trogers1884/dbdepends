# Changelog

All notable changes to `dbdepends` will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [1.0.1] - 2024-12-07

### Added
- Support for Laravel 11
- Updated composer dependencies for Laravel 11 compatibility
- Added orchestra/testbench v9.0 support

### Changed
- Updated documentation to reflect Laravel 11 support
- Updated development requirements in composer.json

## [1.0.0] - 2024-12-07

### Added
- Initial release
- Created PostgreSQL view for database dependency analysis
- Added support for Laravel 10+
- Added migration to create dependency map view
- Added basic test suite
- Added documentation

### Requirements
- PHP 8.1+
- Laravel 10+
- PostgreSQL 12+
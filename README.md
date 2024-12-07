# DBDepends

A Laravel package that creates a PostgreSQL view for analyzing database dependencies in your project. This view helps you understand the relationships and dependencies between your database objects.

## Requirements

- Laravel 10.0 or higher
- PostgreSQL 12.0 or higher
- PHP 8.1 or higher

## Installation

You can install the package via composer:

```bash
composer require trogers1884/dbdepends
```

After installation, run your migrations:

```bash
php artisan migrate
```

This will create a view named `tr1884_v_dbdepends_dependency_map` in your PostgreSQL database.

## Usage

Once installed, the view `tr1884_v_dbdepends_dependency_map` will be available in your PostgreSQL database. The view provides information about dependencies between tables, views, and materialized views in your database.

### View Columns

- `relation`: The fully qualified name of the database object
- `object_type`: The type of object (TABLE, VIEW, MATV)
- `owner`: The owner of the object
- `deps`: Number of direct dependencies
- `add_deps`: Number of indirect dependencies
- `reqs`: Number of direct requirements
- `add_reqs`: Number of indirect requirements
- `dependents`: List of direct dependent objects
- `add_dependents`: List of indirect dependent objects
- `requirements`: List of direct required objects
- `add_requirements`: List of indirect required objects

## Uninstallation

To completely remove this package from your project:

1. First, remove the view from your database:
```bash
php artisan migrate:rollback --path=vendor/trogers1884/dbdepends/src/database/migrations
```

2. Remove the package from your composer.json:
```bash
composer remove trogers1884/dbdepends
```

3. Remove the service provider from config/app.php if you manually added it:
```php
// Remove this line if it exists
Trogers1884\DBDepends\DBDependsServiceProvider::class,
```

4. Clear your configuration cache:
```bash
php artisan config:clear
```

## Development and Testing

> Note: This section is for package developers only. If you're just using the package in your project, you can ignore these steps.

To set up a development environment for contributing to this package:

1. Clone the repository
2. Copy the package's phpunit configuration file:
```bash
cp phpunit.xml.dist phpunit.xml
```

3. Update the database configuration in your `phpunit.xml`:
```xml
<php>
    <env name="DB_CONNECTION" value="pgsql"/>
    <env name="DB_HOST" value="127.0.0.1"/>
    <env name="DB_PORT" value="5432"/>
    <env name="DB_DATABASE" value="dbdepends_test"/>
    <env name="DB_USERNAME" value="your_username"/>
    <env name="DB_PASSWORD" value="your_password"/>
</php>
```

4. Create a PostgreSQL database for testing:
```sql
CREATE DATABASE dbdepends_test;
```

5. Run the tests:
```bash
vendor/bin/phpunit
```

## Disclaimer

This package is provided "as is" without warranty of any kind, either expressed or implied. The author is not responsible for any damages, data loss, or issues that may arise from using this package. It is the user's responsibility to:

- Properly back up their database before installing or using this package
- Test the package in a non-production environment first
- Ensure their database meets the minimum requirements
- Monitor and maintain their own database performance and security
- Verify the accuracy of dependency information provided by the view

This package simply provides a PostgreSQL view for analyzing SQL dependencies in your project. How you use this information and maintain your database is entirely your responsibility.

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## Contributors

We appreciate all contributions, big and small! See [CONTRIBUTORS.md](CONTRIBUTORS.md) for a full list of all contributors.

## Credits

- Jeremy Gleed
- [Tom Rogers](https://github.com/trogers1884)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
<?php

namespace Trogers1884\DBDepends\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Trogers1884\DBDepends\DBDependsServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            DBDependsServiceProvider::class,
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../src/database/migrations');
    }
}
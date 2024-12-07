<?php

namespace Trogers1884\DBDepends;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class DBDependsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->shouldRunMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        }
    }

    public function register()
    {
        //
    }

    protected function shouldRunMigrations(): bool
    {
        try {
            $databaseType = DB::connection()->getDriverName();
            $version = DB::select('SHOW server_version')[0]->server_version;

            return $databaseType === 'pgsql' && version_compare($version, '12.0', '>=');
        } catch (\Exception $e) {
            return false;
        }
    }
}
<?php

namespace Trogers1884\DBDepends\Tests\Unit;

use Trogers1884\DBDepends\Tests\TestCase;
use Illuminate\Support\Facades\DB;

class DBDependsTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Run migrations for each test
        $this->artisan('migrate:fresh');
    }

    /**
     * @group postgres
     */
    public function test_migration_creates_view()
    {
        // Test that the view exists
        $viewExists = DB::select("
            SELECT EXISTS (
                SELECT FROM pg_views
                WHERE viewname = 'tr1884_v_dbdepends_dependency_map'
            )
        ")[0]->exists;

        $this->assertTrue($viewExists, 'The dependency map view was not created');

        // Test that the view has the correct structure
        $viewDefinition = DB::select("
            SELECT view_definition 
            FROM information_schema.views 
            WHERE table_name = 'tr1884_v_dbdepends_dependency_map'
        ");

        $this->assertNotEmpty($viewDefinition, 'View definition should not be empty');
    }

    /**
     * @group postgres
     */
    public function test_view_returns_expected_columns()
    {
        $columns = DB::select("
            SELECT column_name, data_type
            FROM information_schema.columns
            WHERE table_name = 'tr1884_v_dbdepends_dependency_map'
            ORDER BY ordinal_position
        ");

        $this->assertNotEmpty($columns, 'View should have columns defined');

        // Test for specific expected columns
        $expectedColumns = ['relation', 'object_type', 'owner'];
        foreach ($expectedColumns as $columnName) {
            $this->assertTrue(
                collect($columns)->contains(fn($column) => $column->column_name === $columnName),
                "View should contain column '{$columnName}'"
            );
        }
    }
}
<?php

namespace App\Upgrades;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use LaravelLiberu\Menus\Models\Menu;
use LaravelLiberu\Permissions\Models\Permission;
use LaravelLiberu\Upgrade\Contracts\MigratesData;
use LaravelLiberu\Upgrade\Contracts\MigratesPostDataMigration;

class DumpActivityLog implements MigratesData, MigratesPostDataMigration
{
    public function isMigrated(): bool
    {
        return $this->menu()->doesntExist();
    }

    public function migrateData(): void
    {
        DB::table('migrations')->whereIn('migration', [
            '2018_08_09_100000_create_activity_logs_table',
            '2018_08_09_101000_create_structure_for_activity_logs',
        ])->delete();

        $this->menu()->delete();

        Permission::whereName('core.activityLogs.index')->delete();
    }

    public function migratePostDataMigration(): void
    {
        Schema::dropIfExists('activity_logs');
    }

    private function menu(): Builder
    {
        return Menu::whereName('Activity Log');
    }
}

<?php

namespace App\Tables\Builders\enso\DataImport;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use LaravelEnso\Tables\Contracts\Table;
use App\Models\enso\dataimport\DataImport;
use App\Models\enso\dataimport\RejectedImport;
class DataImportTable implements Table
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/dataimport/dataImports.json';

    public function query(): Builder
    {
        return DataImport::selectRaw("
            data_imports.id, data_imports.type, data_imports.status, files.original_name as name,
            data_imports.successful, data_imports.failed, data_imports.created_at,
            TIME(data_imports.created_at) as time, people.name as createdBy,
            rejected_imports.id as rejectedId, {$this->rawDuration()} as duration
        ")->join('files', fn ($join) => $join
            ->on('files.attachable_id', 'data_imports.id')
            ->where('files.attachable_type', DataImport::morphMapKey()))
            ->join('users', 'files.created_by', '=', 'users.id')
            ->join('people', 'users.person_id', '=', 'people.id')
            ->leftJoin('rejected_imports', 'data_imports.id', '=', 'rejected_imports.data_import_id')
            ->leftJoin('files as rejected_files', fn ($join) => $join
                ->on('rejected_files.attachable_id', 'rejected_imports.id')
                ->where('rejected_files.attachable_type', RejectedImport::morphMapKey()));
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }

    private function rawDuration(): string
    {
        switch (DB::getDriverName()) {
            case 'sqlite':
                return $this->sqliteDuration();
            case 'mysql':
                return $this->mysqlDuration();
            default:
                return 'N/A';
        }
    }

    private function sqliteDuration()
    {
        $days = 'julianday(data_imports.updated_at) - julianday(data_imports.created_at)';
        $seconds = "({$days}) * 86400.0";

        return "time({$seconds}, 'unixepoch')";
    }

    private function mysqlDuration()
    {
        $seconds = 'timestampdiff(second, data_imports.created_at, data_imports.updated_at)';

        return "sec_to_time({$seconds})";
    }
}

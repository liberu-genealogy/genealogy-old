<?php

namespace App\Http\Controllers\enso\people;

use App\Tables\Builders\PersonTable;
use App\Tables\Builders\PersonTableIndi;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use LaravelEnso\Tables\Services\Data\Builders\Data as DataBuilder;
use LaravelEnso\Tables\Services\Data\Builders\Meta as MetaBuilder;
use Illuminate\Support\Facades\App;
use LaravelEnso\Tables\Services\Data\Config;
use LaravelEnso\Tables\Services\TemplateLoader;
use LaravelEnso\Tables\Traits\ProvidesData;
use App\Traits\ConnectionTrait;

class TableData extends Controller
{
    use ConnectionTrait;
    use ProvidesData;

    protected $tableClass;

    public function __invoke(Request $request)
    {
        $this->tableClass = PersonTable::class;
        $conn =  $this->getConnection();
        if($conn == 'tenant') {
            $this->tableClass = PersonTableIndi::class;
        }

        ['table' => $table, 'config' => $config] = $this->data($request);

        return (new DataBuilder($table, $config))->toArray()
            + (new MetaBuilder($table, $config))->toArray();
    }
}

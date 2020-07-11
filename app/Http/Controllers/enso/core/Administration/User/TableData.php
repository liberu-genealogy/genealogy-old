<?php

namespace App\Http\Controllers\enso\core\Administration\User;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\core\UserTable;
use App\Tables\Builders\enso\core\UserTableIndi;
use LaravelEnso\Tables\Traits\Data;
use Illuminate\Http\Request;
use LaravelEnso\Tables\Services\Data\Builders\Data as DataBuilder;
use LaravelEnso\Tables\Services\Data\Builders\Meta as MetaBuilder;
use Illuminate\Support\Facades\App;
use LaravelEnso\Tables\Services\Data\Config;
use LaravelEnso\Tables\Services\TemplateLoader;
use LaravelEnso\Tables\Services\Data\FilterAggregator;
use LaravelEnso\Tables\Services\Data\Request as TableRequest;
use App\Traits\ConnectionTrait;

class TableData extends Controller
{
    use ConnectionTrait;
    
    protected $tableClass;

    public function __invoke(Request $request)
    {
        $this->tableClass = UserTable::class;
        $conn =  $this->getConnection();
        if($conn == 'tenant') {
            $this->tableClass = UserTableIndi::class;
        }

        ['table' => $table, 'config' => $config] = $this->data($request);

        return (new DataBuilder($table, $config))->toArray()
            + (new MetaBuilder($table, $config))->toArray();
    }

    public function data(Request $request)
    {
        $request = $this->request($request);
        $table = App::make($this->tableClass, ['request' => $request]);
        $template = (new TemplateLoader($table))->handle();
        $config = new Config($request, $template);

        return ['table' => $table, 'config' => $config];
    }

    public function request(Request $request)
    {
        $aggregator = new FilterAggregator(
            $request->get('internalFilters'),
            $request->get('filters'),
            $request->get('intervals'),
            $request->get('params')
        );

        return new TableRequest($request->get('columns'), $request->get('meta'), $aggregator);
    }
}

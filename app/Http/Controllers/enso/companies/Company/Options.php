<?php

namespace App\Http\Controllers\enso\companies\Company;

use App\Models\enso\companies\Company;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use LaravelEnso\Select\Services\Options as EOptions;
use App\Traits\ConnectionTrait;
use Auth;
class Options extends Controller
{
    use OptionsBuilder, ConnectionTrait;

    protected $model = Company::class;

    protected $queryAttributes = ['name', 'fiscal_code', 'phone'];

    public function __invoke(Request $request)
    {
        $conn = $this->getConnection();
        if($conn == 'tenant') {
            // $companies = Auth::user()->person->companies;
            // return $companies;
            // $company_ids = [];
            // foreach($companies as $item) {
            //     array_push($company_ids, $item->id);
            // }
            // $request->query = $company_ids;
        }
        return $this->response($request);
    }

    private function response(Request $request)
    {
        $query = method_exists($this, 'query') ? $this->query($request) : App::make($this->model)::query();

        return (new EOptions($query))
            ->when($request->has('trackBy'), fn ($options) => $options->trackBy($request->get('trackBy')))
            ->when($request->has('searchMode'), fn ($options) => $options->searchMode($request->get('searchMode')))
            ->when(isset($this->queryAttributes), fn ($options) => $options->queryAttributes($this->queryAttributes))
            ->when(isset($this->resource), fn ($options) => $options->resource($this->resource))
            ->when(isset($this->appends), fn ($options) => $options->appends($this->appends));
    }
}

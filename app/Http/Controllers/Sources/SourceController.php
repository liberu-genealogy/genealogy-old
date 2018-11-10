<?php

namespace App\Http\Controllers\Sources;

use App\Source;
use App\Forms\Builders\SourceForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateSourceRequest;


class SourceController extends Controller
{
    public function create(SourceForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateSourceRequest $request)
    {
        $source = new Source($request->all());

        $source->save();

        return [
            'message' => __('The source was successfully created'),
            'redirect' => 'sources.edit',
            'param' => ['source' => $source->id],
        ];
    }

    public function show(Source $source)
    {
        return ['source' => $source];
    }

    public function edit(Source $source, SourceForm $form)
    {
        return ['form' => $form->edit($source)];
    }

    public function update(ValidateSourceRequest $request, Source $source)
    {
        $source->fill($request->all());

        $source->save();

        return ['message' => __('The source was successfully updated')];
    }

    public function destroy(Source $source)
    {
        $source->delete();

        return [
            'message' => __('The source was successfully deleted'),
            'redirect' => 'sources.index',
        ];
    }
}

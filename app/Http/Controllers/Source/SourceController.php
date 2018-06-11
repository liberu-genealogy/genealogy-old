<?php

namespace App\Http\Controllers\Source;

use App\Forms\Builders\SourceForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateSourceRequest;
use App\Source;

class SourceController extends Controller
{
    public function create(SourceForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateSourceRequest $request, Source $source)
    {
        $source = $source->storeWithCitations(
            $request->all(),
            $request->get('citationList')
        );

        return [
            'message'  => __('The Source was successfully created'),
            'redirect' => 'sources.edit',
            'id'       => $source->id,
        ];
    }

    public function show(Source $source)
    {
        return $source->citations()->get(['citations.id', 'citations.name', 'citations.description']);
    }

    public function edit(Source $source, SourceForm $form)
    {
        return ['form' => $form->edit($source)];
    }

    public function update(ValidateSourceRequest $request, Source $source)
    {
        $source->updateWithCitations(
            $request->all(),
            $request->get('citationList')
        );

        return ['message' => __('The Source was successfully updated')];
    }

    public function destroy(Source $source)
    {
        $source->delete();

        return [
            'message'  => __('The Source was successfully deleted'),
            'redirect' => 'sources.index',
        ];
    }
}

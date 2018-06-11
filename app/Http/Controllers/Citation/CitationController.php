<?php

namespace App\Http\Controllers\Citation;

use App\Citation;
use App\Forms\Builders\CitationForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCitationRequest;

class CitationController extends Controller
{
    public function create(CitationForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateCitationRequest $request)
    {
        $citation = new Citation($request->all());

        $citation->save();

        return [
            'message'  => __('The Citation was successfully created'),
            'redirect' => 'citations.edit',
            'id'       => $citation->id,
        ];
    }

    public function show(Citation $citation)
    {
        return ['Citation' => $citation];
    }

    public function edit(Citation $citation, CitationForm $form)
    {
        return ['form' => $form->edit($citation)];
    }

    public function update(ValidateCitationRequest $request, Citation $citation)
    {
        $citation->fill($request->all());

        $citation->save();

        return ['message' => __('The Citation was successfully updated')];
    }

    public function destroy(Citation $citation)
    {
        $citation->delete();

        return [
            'message'  => __('The Citation was successfully deleted'),
            'redirect' => 'citations.index',
        ];
    }
}

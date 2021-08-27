<?php

namespace App\Forms\Builders;

use App\Models\Author;
use App\Models\Publication;
use App\Models\Repository;
use App\Models\Source;
use App\Models\Type;
use LaravelEnso\Forms\Services\Form;

class SourceForm
{
    protected const TemplatePath = __DIR__.'/../Templates/sources.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form
    ->options('type_id', Type::all())
    ->options('author_id', Author::all())
    ->options('publication_id', Publication::all())
    ->options('repository_id', Repository::all())
    ->create();
    }

    public function edit(Source $source)
    {
        return $this->form
    ->options('type_id', Type::all())
    ->options('author_id', Author::all())
    ->options('publication_id', Publication::all())
    ->options('repository_id', Repository::all())
    ->append('source_id', $source->id)
    ->edit($source);
    }
}

<?php

namespace App\Tables\Builders;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Builder;
use LaravelLiberu\Tables\Contracts\Table;

class TopicTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/topics.json';

    public function query(): Builder
    {
        return Topic::selectRaw('
            topics.id, topics.title
        ');
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}

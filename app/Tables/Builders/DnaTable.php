<?php

namespace App\Tables\Builders;

use App\Models\Dna;
use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Tables\Contracts\Table;

class DnaTable implements Table
{
    protected const TemplatePath = __DIR__.'/../Templates/dna.json';

    public function query(): Builder
    {
        $role = \Auth::user()->role_id;
        $userId = \Auth::user()->id;

        if (in_array($role, [1, 2])) {
        return Dna::selectRaw('
            dnas.id, dnas.name, dnas.file_name, dnas.variable_name, dnas.created_at
        ');

	}
	else {
        return Dna::selectRaw('
            dnas.id, dnas.name, dnas.file_name, dnas.variable_name, dnas.created_at, dnas.user_id
        ')->where('dnas.user_id', $userId);

	}
    }

    public function templatePath(): string
    {
        return static::TemplatePath;
    }
}

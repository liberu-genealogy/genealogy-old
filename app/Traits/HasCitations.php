<?php

namespace App\Traits;

use App\Source;

trait HasCitations
{
    public function sources()
    {
        return $this->belongsToMany(Source::class);
    }

    public function getSourceListAttribute()
    {
        return $this->sources()->pluck('id');
    }

    public function updateWithSources(array $attributes, array $sources)
    {
        tap($this)->update($attributes)
            ->sources()
            ->sync($sources);
    }

    public function storeWithSources(array $attributes, array $sources)
    {
        $this->fill($attributes);

        tap($this)->save()
            ->sources()
            ->sync($sources);

        return $this;
    }
}

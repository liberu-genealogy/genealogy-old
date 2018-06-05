<?php
namespace App\Traits;

use App\Individual;

trait HasIndividuals
{
    public function individuals()
    {
        return $this->belongsToMany(Individual::class);
    }

    public function getIndividualListAttribute()
    {
        return $this->individuals()->pluck('id');
    }

    public function updateWithIndividuals(array $attributes, array $individuals)
    {
        tap($this)->update($attributes)
            ->individuals()
            ->sync($individuals);
    }

    public function storeWithIndividuals(array $attributes, array $individuals)
    {
        $this->fill($attributes);

        tap($this)->save()
            ->individuals()
            ->sync($individuals);

        return $this;
    }
}

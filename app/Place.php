<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Tables\App\Traits\TableCache;

class Place extends Model
{
    use TableCache;

    protected $fillable = ['description', 'title', 'date'];

    public static function getIdByTitle($title)
    {
        $id = null;
        if (empty($title)) {
            return $id;
        }
        $place = self::where('title', $title)->first();
        if ($place !== null) {
            $id = $place->id;
        } else {
            $place = self::create(compact('title'));
            $id = $place->id;
        }

        return $id;
    }
}
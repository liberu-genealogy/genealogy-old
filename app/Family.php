<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\People\App\Models\Person;
use LaravelEnso\Tables\App\Traits\TableCache;

class Family extends Model
{
    use TableCache;
    protected $fillable = ['description', 'is_active', 'husband_id', 'wife_id', 'type_id', 'chan', 'nchi'];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function events()
    {
        return $this->hasMany(FamilyEvent::class);
    }

    public function children()
    {
        return $this->hasMany(Person::class, 'child_in_family_id');
    }

    public function husband()
    {
        return $this->hasOne(Person::class, 'id', 'husband_id');
    }

    public function wife()
    {
        return $this->hasOne(Person::class, 'id', 'wife_id');
    }

    public function title()
    {
        return (($this->husband) ? $this->husband->fullname() : '?').
            ' + '.
            (($this->wife) ? $this->wife->fullname() : '?');
    }

    public static function getList()
    {
        $families = self::get();
        $result = [];
        foreach ($families as $family) {
            $result[$family->id] = $family->title();
        }

        return collect($result);
    }

    public function addEvent($title, $date, $place, $description = '')
    {
        $place_id = Place::getIdByTitle($place);
        $event = FamilyEvent::updateOrCreate(
            [
                'family_id' => $this->id,
                'title' => $title,
            ],
            [
                'family_id' => $this->id,
                'title' => $title,
                'description' => $description,
            ]);
        if ($date) {
            $event->date = $date;
            $event->save();
        }
        if ($place) {
            $event->places_id = $place_id;
            $event->save();
        }
    }

    public function getWifeName()
    {
        if ($this->wife) {
            return $this->wife->fullname();
        } else {
            return 'unknown woman';
        }
    }

    public function getHusbandName()
    {
        if ($this->husband) {
            return $this->husband->fullname();
        } else {
            return 'unknown man';
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends \LaravelEnso\People\App\Models\Person
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'birthday'];

    protected $fillable = [
        'givn',
        'surn',
        'sex',
        'child_in_family_id',
        'description',
        'title', 'name', 'appellative', 'uid', 'email', 'phone', 'birthday',
        'bank', 'bank_account', 'obs',
        'uid','chan', 'rin', 'resn', 'rfn', 'afn'
    ];

    public function events()
    {
        return $this->hasMany(PersonEvent::class);
    }

    public function child_in_family()
    {
        return $this->belongsTo(Family::class, 'child_in_family_id');
    }

    public function husband_in_family()
    {
        return $this->hasMany(Family::class, 'husband_id');
    }

    public function wife_in_family()
    {
        return $this->hasMany(Family::class, 'wife_id');
    }

    public function fullname()
    {
        return $this->givn.' '.$this->surn;
    }

    public function getSex()
    {
        if ($this->sex == 'F') {
            return 'Female';
        }

        return 'Male';
    }

    public static function getList()
    {
        $persons = self::get();
        $result = [];
        foreach ($persons as $person) {
            $result[$person->id] = $person->fullname();
        }

        return collect($result);
    }

    public function addEvent($title, $date, $place, $description = '')
    {
        $place_id = Place::getIdByTitle($place);
        $event = PersonEvent::updateOrCreate(
            [
                'person_id' => $this->id,
                'title' => $title,
            ],
            [
            'person_id' => $this->id,
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

    public function birth()
    {
        return $this->events->where('title', '=', 'BIRT')->first();
    }

    public function death()
    {
        return $this->events->where('title', '=', 'DEAT')->first();
    }

    public function appellative()
    {
        return $this->givn;
    }


}

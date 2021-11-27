<?php

namespace App\Models;

use App\Models\Family;
use App\Models\PersonEvent;
use App\Models\Place;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Multitenancy\Traits\TenantConnection;
use LaravelEnso\People\Models\Person as CorePerson;
use function Symfony\Component\Translation\t;

class Person extends CorePerson
{
    use TenantConnection, HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'birthday', 'deathday', 'burial_day', 'chan'];

    protected $guarded = ['id'];

    protected $fillable = [
        'gid',
        'givn',
        'surn',
        'sex',
        'child_in_family_id',
        'description',
        'title', 'name', 'appellative', 'uid', 'email', 'phone', 'birthday',
        'deathday', 'burial_day', 'bank', 'bank_account',
        'uid', 'chan', 'rin', 'resn', 'rfn', 'afn',
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

        // add birthyear to person table ( for form builder )
        if ($title == 'BIRT' && ! empty($date)) {
            $this->birthday = date('Y-m-d', strtotime($date));
        }
        // add deathyear to person table ( for form builder )
        if ($title == 'DEAT' && ! empty($date)) {
            $this->deathday = date('Y-m-d', strtotime($date));
        }
        $this->save();

        return $event;
    }

    public function birth()
    {
        return $this->events->where('title', '=', 'BIRT')->first();
    }

    public function death()
    {
        return $this->events->where('title', '=', 'DEAT')->first();
    }

    public static function bootUpdatedBy()
    {
        self::creating(fn ($model) => $model->setUpdatedBy());

        self::updating(fn ($model) => $model->setUpdatedBy());
    }

    public function setUpdatedBy()
    {
        file_put_contents(storage_path('app/public/file.txt'), $this->connection);
        if ($this->connection !== 'tenant') {
            if (Auth::check()) {
                $this->updated_by = Auth::id();
            }
        }
    }
}

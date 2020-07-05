<?php

namespace App;

use App\Models\enso\companies\Company;
use App\Models\User;
use App\Traits\enso\DynamicMethods\Relations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\RoutesNotifications;
use Illuminate\Support\Collection;
use LaravelEnso\Addresses\Traits\Addressable;
use LaravelEnso\Helpers\Traits\AvoidsDeletionConflicts;
use LaravelEnso\Helpers\Traits\CascadesMorphMap;
use LaravelEnso\Multitenancy\Traits\SystemConnection;
use LaravelEnso\People\Enums\Genders;
use LaravelEnso\People\Enums\Titles;
use LaravelEnso\Rememberable\Traits\Rememberable;
use LaravelEnso\Tables\Traits\TableCache;
use LaravelEnso\TrackWho\Traits\CreatedBy;
use LaravelEnso\TrackWho\Traits\UpdatedBy;

class Person extends Model
{
    use Addressable,
        AvoidsDeletionConflicts,
        CascadesMorphMap,
        CreatedBy,
        Relations,
        Rememberable,
        RoutesNotifications,
        TableCache,
        UpdatedBy,
        SoftDeletes,
        SystemConnection;

        public function __construct(Array $attributes = [])
        {
            parent::__construct($attributes);
    
            $this->setConnection('mysql'); // see config/database.php where you have specified this second connection to a different DB
        }
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'birthday'];

    protected $fillable = [
        'gid',
        'givn',
        'surn',
        'sex',
        'child_in_family_id',
        'description',
        'title', 'name', 'appellative', 'uid', 'email', 'phone', 'birthday',
        'deathday', 'bank', 'bank_account', 'obs',
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

    public function appellative()
    {
        return $this->givn;
    }

    protected $touches = ['user'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class)
            ->withPivot(['position', 'is_main']);
    }

    public function hasUser()
    {
        return $this->user()->exists();
    }

    public function company()
    {
        return $this->companies()->wherePivot('is_main', true)->first();
    }

    public function gender()
    {
        if (! $this->title) {
            return;
        }

        return $this->title === Titles::Mr
            ? Genders::Male
            : Genders::Female;
    }

    public function position(Company $company)
    {
        return $this->companies()
            ->wherePivot('company_id', $company->id)
            ->first()->pivot->position;
    }

    public function syncCompanies($companyIds, $mainCompanyId)
    {
        $pivotIds = (new Collection($companyIds))
            ->reduce(fn ($pivot, $value) => $pivot->put($value, [
                'is_main' => $value === $mainCompanyId,
                'is_mandatary' => false,
            ]), new Collection());

        $this->companies()->sync($pivotIds->toArray());
    }
}

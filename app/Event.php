<?php

namespace App;

use App\Classes\EventConfigMapper;
use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Helpers\app\Traits\IsActive;
use LaravelEnso\CommentsManager\app\Traits\Commentable;
use LaravelEnso\AddressesManager\app\Traits\Addressable;
use LaravelEnso\DocumentsManager\app\Traits\Documentable;

class Event extends Model
{
    use Commentable, Documentable, Addressable;
    use IsActive;

    protected $fillable = [
        'event_id', 'event_type', 'event_type_id', 'name', 'description', 'date', 'is_active',
    ];

    protected $attributes = ['is_active' => false];

    protected $casts = ['is_active' => 'boolean'];

    public function event()
    {
        return $this->morphTo();
    }

    public function store(array $attributes, array $params)
    {
        $this->create(
            $attributes + [
                'event_id' => $params['event_id'],
                'event_type' => (new EventConfigMapper($params['event_type']))
                    ->class(),
            ]
        );
    }

    public function scopeFor($query, array $request)
    {
        $query->whereEventId($request['event_id'])
            ->whereEventType(
                (new EventConfigMapper($request['event_type']))
                    ->class()
            );
    }
}

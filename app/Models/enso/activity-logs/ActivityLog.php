<?php

namespace App\Models\enso\activitylogs;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use LaravelEnso\TrackWho\Traits\CreatedBy;

class ActivityLog extends Model
{
    use CreatedBy;

    protected $guarded = ['id'];

    protected $casts = ['meta' => 'object'];

    public function scopeBetween($query, $startDate, $endDate)
    {
        $query->when($startDate, fn ($query) => $query
            ->where('created_at', '>=', Carbon::parse($startDate)))->when($endDate, fn ($query) => $query
            ->where('created_at', '<', Carbon::parse($endDate)));
    }

    public function scopeForUsers($query, array $userIds)
    {
        $query->when(count($userIds) > 0, fn ($query) => $query
            ->whereIn('created_by', $userIds));
    }

    public function scopeForEvents($query, array $events)
    {
        $query->when(count($events) > 0, fn ($query) => $query
            ->whereIn('event', $events));
    }

    public function scopeForRoles($query, array $roleIds)
    {
        $query->when(count($roleIds) > 0, fn ($query) => $query
            ->whereHas('createdBy', fn ($query) => $query
                ->whereIn('role_id', $roleIds)));
    }    
}

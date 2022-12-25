<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use LaravelEnso\Api\Models\Log;

trait CreatedBy
{
    public static function bootCreatedBy()
    {
        self::creating(fn ($model) => $model->setCreatedBy());
    }

    public function createdBy(): Relation
    {
        $userModel = Config::get('auth.providers.users.model');

        return $this->belongsTo($userModel, 'created_by');
    }

    private function setCreatedBy($value = 1)
    {
//        if($value==''){
//            if (Auth::check()) {
//                $this->created_by = Auth::id();
//            }
//        }else{
        $this->created_by = null;
//        }
    }

    public static function bootUpdatedBy()
    {
        self::creating(fn ($model) => $model->setUpdatedBy());
    }

    public function UpdatedBy(): Relation
    {
        $userModel = Config::get('auth.providers.users.model');

        return $this->belongsTo($userModel, 'updated_by');
    }

    private function setUpdatedBy($value = 1)
    {
//        if($value==''){
//            if (Auth::check()) {
//                $this->updated_by = Auth::id();
//            }
//        }else{
        $this->updated_by = null;
//        }
    }
}

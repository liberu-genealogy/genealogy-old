<?php

namespace App\Providers;

use App\Http\Requests\ValidatePersonStoreRequest as LocalPersonStore;
use App\Http\Requests\ValidatePersonUpdateRequest as LocalPersonUpdate;
use Illuminate\Support\ServiceProvider;
use LaravelEnso\People\app\Http\Requests\ValidatePersonStore;
use LaravelEnso\People\app\Http\Requests\ValidatePersonUpdate;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(ValidatePersonStore::class, function () {
            return new LocalPersonStore();
        });
        $this->app->bind(ValidatePersonUpdate::class, function () {
            return new LocalPersonUpdate();
        });
        $this->app->bind(EnsoPerson::class, function () {
            return new Person();
        });
    }

    public function register()
    {
    }
}

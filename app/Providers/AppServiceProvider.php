<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelEnso\People\app\Http\Requests\ValidatePersonStore;
use App\Http\Requests\ValidatePersonStoreRequest as LocalPersonStore;
use LaravelEnso\People\app\Http\Requests\ValidatePersonUpdate;
use App\Http\Requests\ValidatePersonUpdateRequest as LocalPersonUpdate;

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

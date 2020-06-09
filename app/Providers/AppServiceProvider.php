<?php

namespace App\Providers;

use App\Http\Requests\ValidatePersonStoreRequest as LocalPersonStore;
use App\Http\Requests\ValidatePersonUpdateRequest as LocalPersonUpdate;
use App\Forms\Builders\PersonForm as LocalPersonForm;
use App\Tables\Builders\PersonTable as LocalPersonTable;
use Illuminate\Support\ServiceProvider;
use LaravelEnso\People\app\Http\Requests\ValidatePersonStore;
use LaravelEnso\People\app\Http\Requests\ValidatePersonUpdate;
use LaravelEnso\People\app\Tables\Builders\PersonTable;
use LaravelEnso\People\app\Forms\Builders\PersonForm;

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
        $this->app->bind(PersonTable::class, function () {
            return new LocalPersonTable();
        });
        $this->app->bind(PersonForm::class, function () {
            return new LocalPersonForm();
        });
    }

    public function register()
    {
    }
}

<?php

namespace App\Providers;

use App\Forms\Builders\PersonForm as LocalPersonForm;
use App\Http\Requests\ValidatePersonStoreRequest as LocalPersonStore;
use App\Http\Requests\ValidatePersonUpdateRequest as LocalPersonUpdate;
use App\Tables\Builders\PersonTable as LocalPersonTable;
use Illuminate\Support\ServiceProvider;
use LaravelEnso\People\App\Forms\Builders\PersonForm;
use LaravelEnso\People\App\Http\Requests\ValidatePersonStore;
use LaravelEnso\People\App\Http\Requests\ValidatePersonUpdate;
use LaravelEnso\People\App\Tables\Builders\PersonTable;

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

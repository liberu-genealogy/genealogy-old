<?php

namespace App\Providers;

use App\Person as LocalPerson;
use App\Forms\Builders\PersonForm as LocalPersonForm;
use App\Http\Requests\ValidatePersonStoreRequest as LocalPersonStore;
use App\Http\Requests\ValidatePersonUpdateRequest as LocalPersonUpdate;
use App\Http\Requests\ValidatePersonRequest as LocalPersonRequest;
use App\Tables\Builders\PersonTable as LocalPersonTable;
use Illuminate\Support\ServiceProvider;
use LaravelEnso\People\App\Models\Person;
use LaravelEnso\People\App\Forms\Builders\PersonForm;
use LaravelEnso\People\App\Http\Requests\ValidatePersonStore;
use LaravelEnso\People\App\Http\Requests\ValidatePersonUpdate;
use LaravelEnso\People\App\Http\Requests\ValidatePersonRequest;
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
        $this->app->bind(ValidatePersonRequest::class, function () {
            return new LocalPersonRequest();
        });
        $this->app->bind(EnsoPerson::class, function () {
            return new LocalPerson();
        });
        $this->app->bind(Person::class, function () {
            return new LocalPerson();
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

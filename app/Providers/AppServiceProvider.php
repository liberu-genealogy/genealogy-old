<?php

namespace App\Providers;

use App\DynamicRelations\Company\Comments;
use App\DynamicRelations\Company\Discussions;
use App\DynamicRelations\Company\Documents;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use LaravelEnso\Companies\Models\Company;
use LaravelEnso\DynamicMethods\Services\Methods;
use LaravelEnso\Users\Models\User as BaseUser;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        BaseUser::class => User::class,
    ];

    public function boot()
    {
        Schema::defaultStringLength(191);
        /**
         * @docs https://stackoverflow.com/questions/49746440/laravel-artisan-use-of-undefined-constant-stdin-assumed-stdin-infinite-loop
         */
        // if (!defined('STDIN')) {
        //     define('STDIN', fopen('php://stdin', 'r'));
        // }
    }

    public function register()
    {
        Methods::bind(Company::class, [Comments::class, Discussions::class, Documents::class]);
    }
}

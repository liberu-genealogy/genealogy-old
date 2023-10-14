<?php

namespace App\Providers;

use LaravelLiberu\Calendar\Calendars\BirthdayCalendar;
use LaravelLiberu\Calendar\CalendarServiceProvider as ServiceProvider;
use LaravelLiberu\Calendar\Facades\Calendars;

class CalendarServiceProvider extends ServiceProvider
{
    protected $register = [
        BirthdayCalendar::class,
    ];

    public function boot()
    {
        Calendars::register($this->register);
    }
}

<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\App;
use LaravelLiberu\Helpers\Exceptions\LiberuException;
use LaravelLiberu\Sentry\Exceptions\Handler as Sentry;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontReport = [
        LiberuException::class,
    ];

    protected $dontFlash = [
        'password', 'password_confirmation',
    ];

    public function report(Throwable $exception)
    {
        if (App::bound('sentry') && $this->shouldReport($exception)) {
            Sentry::report($exception);
        }

        parent::report($exception);
    }

    // public function register()
    // {
    //     $this->reportable(function (Throwable $e) {
    //
    //     });
    // }
}

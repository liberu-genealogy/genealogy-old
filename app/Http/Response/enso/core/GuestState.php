<?php

namespace App\Http\Response\enso\core;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class GuestState implements Responsable
{
    public function toResponse($request): array
    {
        if ($request->has('locale')) {
            App::setLocale($request->get('locale'));
        }

        return [
            'meta' => $this->meta(),
            'i18n' => $this->i18n(),
            'routes' => $this->routes(),
        ];
    }

    protected function meta(): array
    {
        return [
            'appName' => config('app.name'),
            'appUrl' => url('/').'/',
            'extendedDocumentTitle' => config('enso.config.extendedDocumentTitle'),
            'showQuote' => config('enso.config.showQuote'),
        ];
    }

    protected function i18n(): array
    {
        return [
            App::getLocale() => [
                'Email' => __('Email'),
                'Password' => __('Password'),
                'Remember me' => __('Remember me'),
                'Forgot password' => __('Forgot password'),
                'Login' => __('Login'),
                'Send a reset password link' => __('Send a reset password link'),
                'Repeat Password' => __('Repeat Password'),
                'Success' => __('Success'),
                'Error' => __('Error'),
            ],
        ];
    }

    protected function routes(): Collection
    {
        $authRoutes = new Collection(['login', 'password.email', 'password.reset']);

        return (new Collection(Route::getRoutes()->getRoutesByName()))
            ->filter(fn ($route, $name) => $authRoutes->contains($name))
            ->map(fn ($route) => (new Collection($route))
                ->only(['uri', 'methods'])
                ->put('domain', $route->domain()));
    }
}

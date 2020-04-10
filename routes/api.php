<?php

use Illuminate\Support\Facades\Route;

// example data for the dashboard
Route::middleware(['web', 'auth'])
    ->namespace('Dashboard')
    ->prefix('dashboard')->as('dashboard.')
    ->group(function () {
        Route::get('line', 'ChartController@line')
            ->name('line');
        Route::get('bar', 'ChartController@bar')
            ->name('bar');
        Route::get('pie', 'ChartController@pie')
            ->name('pie');
        Route::get('doughnut', 'ChartController@doughnut')
            ->name('doughnut');
        Route::get('radar', 'ChartController@radar')
            ->name('radar');
        Route::get('polar', 'ChartController@polar')
            ->name('polar');
        Route::get('bubble', 'ChartController@bubble')
            ->name('bubble');
    });

Route::middleware(['web', 'auth', 'core'])
    ->group(function () {
        Route::namespace('Citations')
            ->prefix('citations')
            ->as('citations.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{citation}/edit', 'Edit')->name('edit');

                Route::patch('{citation}', 'Update')->name('update');

                Route::delete('{citation}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{citation}', 'Show')->name('show');


        });
    });

Route::middleware(['web', 'auth', 'core'])
    ->group(function () {
        Route::namespace('Families')
            ->prefix('families')
            ->as('families.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{family}/edit', 'Edit')->name('edit');

                Route::patch('{family}', 'Update')->name('update');

                Route::delete('{family}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{family}', 'Show')->name('show');


        });
    });

Route::middleware(['web', 'auth', 'core'])
    ->group(function () {
        Route::namespace('Notes')
            ->prefix('notes')
            ->as('notes.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{note}/edit', 'Edit')->name('edit');

                Route::patch('{note}', 'Update')->name('update');

                Route::delete('{note}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{note}', 'Show')->name('show');


        });
    });

Route::middleware(['web', 'auth', 'core'])
    ->group(function () {
        Route::namespace('Places')
            ->prefix('places')
            ->as('places.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{place}/edit', 'Edit')->name('edit');

                Route::patch('{place}', 'Update')->name('update');

                Route::delete('{place}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{place}', 'Show')->name('show');


        });
    });

Route::middleware(['web', 'auth', 'core'])
    ->group(function () {
        Route::namespace('Repositories')
            ->prefix('repositories')
            ->as('repositories.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{repository}/edit', 'Edit')->name('edit');

                Route::patch('{repository}', 'Update')->name('update');

                Route::delete('{repository}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{repository}', 'Show')->name('show');


        });
    });

Route::middleware(['web', 'auth', 'core'])
    ->group(function () {
        Route::namespace('Sources')
            ->prefix('sources')
            ->as('sources.')
            ->group(function () {

                Route::get('', 'Index')->name('index');
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{source}/edit', 'Edit')->name('edit');

                Route::patch('{source}', 'Update')->name('update');

                Route::delete('{source}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
                Route::get('{source}', 'Show')->name('show');


        });
    });


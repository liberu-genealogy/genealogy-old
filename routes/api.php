<?php

Route::middleware(['auth', 'core'])
    ->group(function () {
        Route::namespace('Events')
    ->prefix('events')->as('events.')
    ->group(function () {
        Route::get('initTable', 'EventsTableController@init')
           ->name('initTable');
        Route::get('tableData', 'EventsTableController@data')
           ->name('tableData');
        Route::get('exportExcel', 'EventsTableController@excel')
           ->name('exportExcel');

        Route::get('options', 'EventsSelectController@options')
           ->name('options');
    });

        Route::namespace('Events')

    ->group(function () {
        Route::resource('events', 'EventsController'); // if it's the case, use `except` or `only` to avoid generating unused routes
    });
        Route::namespace('Individuals')
    ->prefix('individuals')->as('individuals.')
    ->group(function () {
        Route::get('initTable', 'IndividualsTableController@init')
           ->name('initTable');
        Route::get('tableData', 'IndividualsTableController@data')
           ->name('tableData');
        Route::get('exportExcel', 'IndividualsTableController@excel')
           ->name('exportExcel');

        Route::get('options', 'IndividualsSelectController@options')
           ->name('options');
    });

        Route::namespace('Individuals')

    ->group(function () {
        Route::resource('individuals', 'IndividualsController'); // if it's the case, use `except` or `only` to avoid generating unused routes
    });
    });
